<x-layout>
    <x-container>
        <div class="bg-white shadow-md rounded-2xl p-6">
            <h2 class="text-2xl font-bold mb-4 text-gray-800">Liste des utilisateurs</h2>

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
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-4 py-3">
                                <img src="https://i.pravatar.cc/40?u=1" alt="Jean Dupont" class="w-10 h-10 rounded-full object-cover">
                            </td>
                            <td class="px-4 py-3 text-sm text-gray-800 truncate" title="Jean Dupont">
                                TESt
                            </td>
                            <td class="px-4 py-3 text-sm text-gray-600 truncate" title="jean.dupont@example.com">
                                TESt.test@example.com
                            </td>
                            <td class="px-4 py-3 text-sm text-gray-500 capitalize">Administrateur</td>
                        </tr>
                        <!-- Ajoute d'autres lignes ici -->
                    </tbody>
                </table>
            </div>
        </div>
    @vite(['resources/js/resizerTable.js'])
    </x-container>
</x-layout>
