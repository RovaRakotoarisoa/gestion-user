<side class="w-64 bg-purple-300 shadow-md fixed left-0 top-0 h-full p-4 text-white">
    {{-- Logo de l'app --}}
    <h2 class="text-xl text-white font-bold mb-4 pb-4 border-b-2 border-gray-300/30">GESTION USER</h2>

    <ul class="space-y-6">
        <li class="mb-2">
            <a href="{{ url('home') }}" class="flex items-center text-white">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                </svg>
                Lists utilisateurs
            </a>
        </li>
        <li class="mb-2 flex gap-3">
            <img src="{{ Vite::asset('resources/images/user-circle.svg') }}" class="w-6 h-6 text-white" alt="image user">                
            <span class="first-letter:uppercase">{{ Auth::user()->name }}</span>
        </li>
        <li class="mb-2 flex gap-3">
            <form method="POST" action="{{route('logout')}}">
                @csrf
                <button>
                    <span class="flex gap-3 text-white">
                        <svg width="1.5rem" height="1.5rem" viewBox="0 0 20 20" fill="white" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M3 4.25C3 3.00736 4.00736 2 5.25 2H10.75C11.9926 2 13 3.00736 13 4.25V6.25C13 6.66421 12.6642 7 12.25 7C11.8358 7 11.5 6.66421 11.5 6.25V4.25C11.5 3.83579 11.1642 3.5 10.75 3.5H5.25C4.83579 3.5 4.5 3.83579 4.5 4.25V15.75C4.5 16.1642 4.83579 16.5 5.25 16.5H10.75C11.1642 16.5 11.5 16.1642 11.5 15.75V13.75C11.5 13.3358 11.8358 13 12.25 13C12.6642 13 13 13.3358 13 13.75V15.75C13 16.9926 11.9926 18 10.75 18H5.25C4.00736 18 3 16.9926 3 15.75V4.25Z" fill="white"/>
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M6 10C6 9.58579 6.33579 9.25 6.75 9.25H16.2955L15.2483 8.30747C14.9404 8.03038 14.9154 7.55616 15.1925 7.24828C15.4696 6.94039 15.9438 6.91543 16.2517 7.19253L18.7517 9.44253C18.9098 9.58476 19 9.78738 19 10C19 10.2126 18.9098 10.4152 18.7517 10.5575L16.2517 12.8075C15.9438 13.0846 15.4696 13.0596 15.1925 12.7517C14.9154 12.4438 14.9404 11.9696 15.2483 11.6925L16.2955 10.75H6.75C6.33579 10.75 6 10.4142 6 10Z" fill="white"/>
                        </svg>
                        Deconnexion
                    </span>
                </button>
            </form>
        </li>
    </ul>
</side>