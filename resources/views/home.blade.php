<x-layout>
    <x-container>
        <h1 class="text-xl">List User</h1>
        

        {{-- <div class="bg-white shadow-md rounded-2xl p-6">
            <h2 class="text-2xl font-bold mb-4 text-gray-800">Liste des utilisateurs</h2>

            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-4 py-2 text-left text-sm font-medium text-gray-600">Avatar</th>
                            <th class="px-4 py-2 text-left text-sm font-medium text-gray-600">Nom</th>
                            <th class="px-4 py-2 text-left text-sm font-medium text-gray-600">Email</th>
                            <th class="px-4 py-2 text-left text-sm font-medium text-gray-600">Rôle</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-4 py-3">
                                <img src="https://i.pravatar.cc/40?u=1" alt="Jean Dupont" class="w-10 h-10 rounded-full object-cover">
                            </td>
                            <td class="px-4 py-3 text-sm text-gray-800 max-w-xs truncate" title="Jean Dupont">
                                Jean Dupont
                            </td>
                            <td class="px-4 py-3 text-sm text-gray-600 max-w-sm truncate" title="jean.dupont@example.com">
                                jean.dupont@example.com
                            </td>
                            <td class="px-4 py-3 text-sm text-gray-500 capitalize">Administrateur</td>
                        </tr>
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-4 py-3">
                                <img src="https://i.pravatar.cc/40?u=2" alt="Claire Fontaine" class="w-10 h-10 rounded-full object-cover">
                            </td>
                            <td class="px-4 py-3 text-sm text-gray-800 max-w-xs truncate" title="Claire Fontaine avec un nom très long pour tester">
                                Claire Fontaine avec un nom très long pour tester
                            </td>
                            <td class="px-4 py-3 text-sm text-gray-600 max-w-sm truncate" title="claire.fontaine.avec.un.email.vraiment.tres.long@example.com">
                                claire.fontaine.avec.un.email.vraiment.tres.long@example.com
                            </td>
                            <td class="px-4 py-3 text-sm text-gray-500 capitalize">Utilisateur</td>
                        </tr>
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-4 py-3">
                                <img src="https://i.pravatar.cc/40?u=3" alt="Rachid Ben Amar" class="w-10 h-10 rounded-full object-cover">
                            </td>
                            <td class="px-4 py-3 text-sm text-gray-800 max-w-xs truncate" title="Rachid Ben Amar">
                                Rachid Ben Amar
                            </td>
                            <td class="px-4 py-3 text-sm text-gray-600 max-w-sm truncate" title="rachid.amar@example.com">
                                rachid.amar@example.com
                            </td>
                            <td class="px-4 py-3 text-sm text-gray-500 capitalize">Modérateur</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div> --}}

<style>
    th.resizable {
        position: relative;
    }

    th.resizable .resizer {
        position: absolute;
        right: 0;
        top: 0;
        width: 5px;
        height: 100%;
        cursor: col-resize;
        user-select: none;
    }
</style>

<div class="bg-white shadow-md rounded-2xl p-6">
    <h2 class="text-2xl font-bold mb-4 text-gray-800">Liste des utilisateurs (colonnes redimensionnables)</h2>

    <div class="overflow-x-auto">
        <table class="min-w-full table-fixed border-collapse">
            <thead class="bg-gray-100">
                <tr>
                    <th class="resizable px-4 py-2 text-left text-sm font-medium text-gray-600 w-32">
                        Avatar
                        <div class="resizer"></div>
                    </th>
                    <th class="resizable px-4 py-2 text-left text-sm font-medium text-gray-600 w-64">
                        Nom
                        <div class="resizer"></div>
                    </th>
                    <th class="resizable px-4 py-2 text-left text-sm font-medium text-gray-600 w-96">
                        Email
                        <div class="resizer"></div>
                    </th>
                    <th class="resizable px-4 py-2 text-left text-sm font-medium text-gray-600 w-40">
                        Rôle
                        <div class="resizer"></div>
                    </th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                <tr class="hover:bg-gray-50 transition">
                    <td class="px-4 py-3">
                        <img src="https://i.pravatar.cc/40?u=1" alt="Jean Dupont" class="w-10 h-10 rounded-full object-cover">
                    </td>
                    <td class="px-4 py-3 text-sm text-gray-800 truncate" title="Jean Dupont">
                        Jean Dupont
                    </td>
                    <td class="px-4 py-3 text-sm text-gray-600 truncate" title="jean.dupont@example.com">
                        jean.dupont@example.com
                    </td>
                    <td class="px-4 py-3 text-sm text-gray-500 capitalize">Administrateur</td>
                </tr>
                <!-- Ajoute d'autres lignes ici -->
            </tbody>
        </table>
    </div>
</div>

<script>
    const resizers = document.querySelectorAll('.resizer');

    resizers.forEach(resizer => {
        const th = resizer.parentElement;
        let startX;
        let startWidth;

        resizer.addEventListener('mousedown', (e) => {
            startX = e.pageX;
            startWidth = th.offsetWidth;
            document.addEventListener('mousemove', onMouseMove);
            document.addEventListener('mouseup', onMouseUp);
        });

        function onMouseMove(e) {
            const newWidth = startWidth + (e.pageX - startX);
            th.style.width = newWidth + 'px';
        }

        function onMouseUp() {
            document.removeEventListener('mousemove', onMouseMove);
            document.removeEventListener('mouseup', onMouseUp);
        }
    });
</script>


    </x-container>
</x-layout>
