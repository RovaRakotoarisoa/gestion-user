<div id="user-table" class="space-y-4">
    <div class="flex justify-between items-center">
        <div class="flex justify-between items-center">
            <input
                wire:model.live.debounce.250ms="search"
                type="search" 
                name="search" 
                placeholder="Search user"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-100">
        </div>

        {{-- This is the Filter By ROLE --}}
        {{-- <div class="flex justify-between items-center">
            <div class="flex">
                <div class="flex items-center gap-1">
                    <label class="text-sm font-medium text-gray-900">User Type:</label>
                    <select 
                        wire:model.live='is_admin'
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-100">
                        <option value="">All User</option>
                        <option value="User">User</option>
                        <option value="Admin">Admin</option>
                    </select>
                </div>
            </div>
        </div> --}}
        
        <div class="flex justify-between items-center gap-4">
            <x-button>Filter</x-button>
            <div class="flex justify-center items-center">
                @can('can-crud')
                    <a href="{{ route('users.create') }}"> 
                        <x-secondary-button class="w-100 rounded text-white py-2 float-right">
                            Ajouter un utilisateur
                        </x-secondary-button>
                    </a>
                @endcan
            </div>
        </div>
    </div>
    
    <table class="min-w-full table-fixed border-collapse">
        <thead class="bg-blue-300 shadow-lg">
            <tr>
                <x-table-head-column class="!w-[5px]">
                    
                </x-table-head-column>

                <x-table-head-column class="!w-[0.5rem]">
                    User
                </x-table-head-column>

                <x-table-head-column class="!w-[2rem]">
                    Email
                </x-table-head-column>

                <x-table-head-column class="!w-[5px]">
                    Role
                </x-table-head-column>
                
                <x-table-head-column class="!w-[20px]">
                    Action
                </x-table-head-column>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
            @foreach($users as $user)
                <tr class="hover:bg-gray-50 hover:shadow-md transition">
                    <td class="px-1 py-3">
                        <input type="checkbox" name="user_ids[]" value="{{ $user->id }}" class="rounded border border-blue-600/20 text-purple-300 shadow-lg">
                    </td>
                    <td class="py-3 flex items-center gap-4">
                        <span class="drop-shadow-xl">
                            @if ($user->profile_photo_path)
                                <img src="{{ asset('storage/' . $user->profile_photo_path) }}" alt="Avatar" class="w-10 h-10 rounded-full">
                            @else
                                <svg width="2.5rem" height="2.5rem" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M18 10C18 14.4183 14.4183 18 10 18C5.58172 18 2 14.4183 2 10C2 5.58172 5.58172 2 10 2C14.4183 2 18 5.58172 18 10ZM12.5 7.5C12.5 8.88071 11.3807 10 10 10C8.61929 10 7.5 8.88071 7.5 7.5C7.5 6.11929 8.61929 5 10 5C11.3807 5 12.5 6.11929 12.5 7.5ZM10 12C8.04133 12 6.30187 12.9385 5.20679 14.3904C6.39509 15.687 8.1026 16.5 10 16.5C11.8974 16.5 13.6049 15.687 14.7932 14.3904C13.6981 12.9385 11.9587 12 10 12Z" fill="#252626"/>
                                </svg>
                            @endif
                        </span>
                        <span class="text-sm text-gray-800 truncate first-letter:uppercase">
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
                        @can('can-crud')
                            <a href="{{ route('users.edit', $user->id) }}" class="text-green-500 ml-2">
                                <img src="{{ Vite::asset('resources/images/pencil-square.svg') }}" width="25px" alt="modify icon" class="drop-shadow-xl">
                            </a>

                            <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 ml-2">
                                    <img src="{{ Vite::asset('resources/images/trash.svg') }}" width="25px" alt="delete icon" class="drop-shadow-xl">
                                </button>
                            </form>
                        @endcan
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="py-4 px-3">
        <div class="flex">
            <div class="flex space-x-4 items-center mb-3">
                <label class="text-sm font-medium text-gray-900">Perpage: </label>
                <select 
                    wire:model.live='perpage'
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-100">
                    <option value="5">5</option>
                    <option value="10">10</option>
                    <option value="20">20</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                </select>
            </div>
        </div>
        {{ $users->links() }}
    </div>
</div>
