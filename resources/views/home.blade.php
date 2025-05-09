<x-layout>
    <x-container>
        <div class="bg-white shadow-md rounded-2xl p-6">
            <h2 class="text-2xl font-bold mb-4 text-gray-800">Liste des utilisateurs</h2>

            <div class="overflow-x-auto">
               
                    <a href="{{ route('users.create') }}"> 
                        <x-secondary-button class="w-100 rounded text-white py-2 float-right mb-4">
                            Ajouter un utilisateur
                        </x-secondary-button>
                    </a>
                <table class="min-w-full table-fixed border-collapse">
                    <thead class="bg-gray-100">
                        <tr>
                            <x-table-head-column>
                                Avatar
                            </x-table-head-column>

                            <x-table-head-column>
                                Nom
                            </x-table-head-column>

                            <x-table-head-column>
                                Email
                            </x-table-head-column>

                            <x-table-head-column>
                                Role
                            </x-table-head-column>
                            <x-table-head-column>
                                Action
                            </x-table-head-column>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach($users as $user)
                            <tr class="hover:bg-gray-50 transition">
                                <td class="px-4 py-3">
                                    @if ($user->profile_photo_path)
                                        <img src="{{ asset('storage/' . $user->profile_photo_path) }}" alt="Avatar" class="w-10 h-10 rounded-full">
                                    @else
                                        Pas d'avatar
                                    @endif
                                </td>
                                <td class="px-4 py-3 text-sm text-gray-800 truncate" title="{{ $user->name }}">
                                    {{ $user->name }}
                                </td>
                                <td class="px-4 py-3 text-sm text-gray-600 truncate" title="{{ $user->email }}">
                                    {{ $user->email }}
                                </td>
                                <td class="px-4 py-3 text-sm text-gray-500 capitalize">{{ $user->role }}</td>
                                <td class="border px-4 py-2">
                                    <a href="{{ route('users.show', $user->id) }}" class="text-blue-500">Voir</a>
                                    <a href="{{ route('users.edit', $user->id) }}" class="text-green-500 ml-2">Modifier</a>
                                    <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 ml-2">Supprimer</button>
                                    </form>
                                </td>
                            </form>
                        </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @vite(['resources/js/resizerTable.js'])
    </x-container>
</x-layout>
