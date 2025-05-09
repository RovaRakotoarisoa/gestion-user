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
                    <thead class="bg-blue-300 shadow-lg">
                        <tr>
                            <x-table-head-column class="!w-10">
                                User
                            </x-table-head-column>

                            <x-table-head-column>
                                Email
                            </x-table-head-column>

                            <x-table-head-column class="!w-8">
                                Role
                            </x-table-head-column>
                            <x-table-head-column class="!w-2">
                                Action
                            </x-table-head-column>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach($users as $user)
                            <tr class="hover:bg-gray-50 hover:shadow-md transition">
                                <td class="px-4 py-3 flex  items-center gap-4">
                                    <span>
                                        @if ($user->profile_photo_path)
                                            <img src="{{ asset('storage/' . $user->profile_photo_path) }}" alt="Avatar" class="w-10 h-10 rounded-full">
                                        @else
                                            <img src="{{ Vite::asset('resources/images/user-circle.svg') }}" alt="default img user" class="w-10 h-10 drop-shadow-xl">
                                        @endif
                                    </span>
                                    <span class="text-sm text-gray-800 truncate">
                                        {{ $user->name }}
                                    </span>
                                </td>
                                <td class="px-4 py-3 text-sm text-gray-600 truncate" title="{{ $user->email }}">
                                    {{ $user->email }}
                                </td>
                                <td class="py-3 text-sm text-gray-500 capitalize">
                                    @if( $user->role === 'User')
                                        <span class="bg-yellow-300 rounded-lg p-1 text-white">{{ $user->role }}</span>
                                    @else
                                        <span class="bg-purple-300 rounded-lg p-1 text-white">{{ $user->role }}</span>
                                    @endif
                                </td>
                                <td class="pl-0 pr-4 py-4 flex items-center justify-end gap-4">
                                    {{-- <a href="{{ route('users.show', $user->id) }}" class="text-blue-500">Voir</a> --}}
                                    <a href="{{ route('users.edit', $user->id) }}" class="text-green-500 ml-2">
                                        <img src="{{ Vite::asset('resources/images/pencil.svg') }}" width="25px" alt="modify icon" class="drop-shadow-xl">
                                    </a>
                                    <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 ml-2">
                                            <img src="{{ Vite::asset('resources/images/trash.svg') }}" width="25px" alt="delete icon" class="drop-shadow-xl">
                                        </button>
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
