<div id="user-table" class="space-y-4">
    <div
        x-data="{open: false}" x-cloak 
        class="bg-white p-6 rounded-lg flex-col space-y-10"
    >
        <div class="flex justify-between items-center">
            <div class="flex justify-between items-center">
                <input
                    wire:model.live.debounce.250ms="search"
                    type="search" 
                    name="search" 
                    placeholder="Search User..."
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-100">
            </div>
            <div class="flex justify-between items-center gap-4">
                <button
                        x-transition
                        x-on:click ="open = !open" 
                        class="flex justify-center font-bold !text-gray-600 !bg-[#f9fafb] !border !border-gray-300 !py-[10px] inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-50 transition ease-in-out duration-150"
                        type="button"
                    >
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon" class="w-4 h-4 gap-1">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M12 3c2.755 0 5.455.232 8.083.678.533.09.917.556.917 1.096v1.044a2.25 2.25 0 0 1-.659 1.591l-5.432 5.432a2.25 2.25 0 0 0-.659 1.591v2.927a2.25 2.25 0 0 1-1.244 2.013L9.75 21v-6.568a2.25 2.25 0 0 0-.659-1.591L3.659 7.409A2.25 2.25 0 0 1 3 5.818V4.774c0-.54.384-1.006.917-1.096A48.32 48.32 0 0 1 12 3Z"/>
                    </svg>
                    Filter
                </button>
                <div class="flex justify-center items-center">
                    @can('can-crud')
                        <a href="{{ route('users.create') }}"> 
                            <x-secondary-button class="w-100 rounded text-white py-2 float-right !bg-purple-300">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" data-slot="icon" class="w-5 h-5 gap-1">
                                  <path fill-rule="evenodd" d="M12 3.75a.75.75 0 0 1 .75.75v6.75h6.75a.75.75 0 0 1 0 1.5h-6.75v6.75a.75.75 0 0 1-1.5 0v-6.75H4.5a.75.75 0 0 1 0-1.5h6.75V4.5a.75.75 0 0 1 .75-.75Z" clip-rule="evenodd"/>
                                </svg>
                                Ajouter Utilisateur
                            </x-secondary-button>
                        </a>
                    @endcan
                </div>
            </div>
        </div>
        <div
            x-show="open" x-transition 
            class="flex items-center gap-3">
            <div class="flex items-center gap-1">
                {{-- <label class="text-sm font-medium text-gray-600">Perpage: </label> --}}
                <select 
                    wire:model.live='perpage'
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-100">
                    <option value="">Page Number to display</option>
                    {{-- <option value="5">5</option> --}}
                    <option value="10">10</option>
                    <option value="20">20</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                </select>
            </div>
            <div class="flex items-center gap-1">
                {{-- <label class="text-sm font-medium text-gray-900">Role :</label> --}}
                <select 
                    wire:model.live='is_admin'
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-100">
                    <option value="">All user Role</option>
                    <option value="User">User</option>
                    <option value="Admin">Admin</option>
                </select>
            </div>
        </div>
    </div>
    <div>
        <table class="min-w-full table-fixed border-collapse bg-white p-6">
            @can('can-crud')
                <x-button 
                        x-show="is_bulkAction"
                        x-cloak
                        form="bulkDelete" 
                        class="space-y-6 bg-red-500 hover:bg-red-400 transition mb-5"
                >
                    Supprimer la selection
                </x-button>
            @endcan
            <thead class="">
                <tr>
                    <x-table-head-column class="!w-[5px]">
                        
                    </x-table-head-column>

                    <x-table-head-column wire:click="setSortBy('name')" class="!w-[0.5rem]">
                        <button type="button" class="flex items-center">
                             User
                             @if($sortBy !== 'name')
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" data-slot="icon" class="w-4 h-4">
                                  <path fill-rule="evenodd" d="M11.47 4.72a.75.75 0 0 1 1.06 0l3.75 3.75a.75.75 0 0 1-1.06 1.06L12 6.31 8.78 9.53a.75.75 0 0 1-1.06-1.06l3.75-3.75Zm-3.75 9.75a.75.75 0 0 1 1.06 0L12 17.69l3.22-3.22a.75.75 0 1 1 1.06 1.06l-3.75 3.75a.75.75 0 0 1-1.06 0l-3.75-3.75a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd"/>
                                </svg>
                             @elseif($sortDir === 'ASC')
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" data-slot="icon" class="w-4 h-4">
                                  <path fill-rule="evenodd" d="M11.47 4.72a.75.75 0 0 1 1.06 0l3.75 3.75a.75.75 0 0 1-1.06 1.06L12 6.31 8.78 9.53a.75.75 0 0 1-1.06-1.06l3.75-3.75Zm-3.75 9.75a.75.75 0 0 1 1.06 0L12 17.69l3.22-3.22a.75.75 0 1 1 1.06 1.06l-3.75 3.75a.75.75 0 0 1-1.06 0l-3.75-3.75a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd"/>
                                </svg>

                             @else
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" data-slot="icon" class="w-4 h-4">
                                  <path fill-rule="evenodd" d="M12.53 16.28a.75.75 0 0 1-1.06 0l-7.5-7.5a.75.75 0 0 1 1.06-1.06L12 14.69l6.97-6.97a.75.75 0 1 1 1.06 1.06l-7.5 7.5Z" clip-rule="evenodd"/>
                                </svg>
                             @endif
                        </button> 
                    </x-table-head-column>

                    <x-table-head-column  wire:click="setSortBy('email')" class="!w-[2rem]"> 
                        Email
                    </x-table-head-column>

                    <x-table-head-column class="!w-[5px]">
                        Role
                    </x-table-head-column>
                    
                    <x-table-head-column class="!w-[20px] text-right pr-6">
                        Action
                    </x-table-head-column>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach($users as $user)
                    <tr class="hover:bg-gray-50 hover:shadow-md transition">
                        <td class="px-1 py-3">
                            <input  x-transition
                                    x-on:click ="is_bulkAction = !is_bulkAction"
                                    type="checkbox" 
                                    name="user_ids[]" 
                                    value="{{ $user->id }}" 
                                    class="rounded border border-blue-600/20 text-purple-300 shadow-lg"
                            >
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
                                <a href="{{ route('users.edit', $user->id) }}" class="text-[#62679F] ml-2 p-1 rounded flex gap-1">
                                    <img src="{{ Vite::asset('resources/images/pencil-square.svg') }}" width="20px" alt="modify icon" class="drop-shadow-xl">
                                    Edit
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
        <div class="p-6 bg-white paginator-selector">
            {{ $users->links() }}
        </div>
    </div>
</div>
