<side class="w-64 bg-blue-500 shadow-md fixed left-0 top-0 h-full p-4">
    {{-- Logo de l'app --}}
    <h2 class="text-xl text-white font-bold mb-4 pb-4 border-b-2 border-white/30">GESTION USER</h2>

    <ul class="space-y-6">
        <li class="mb-2">
            <a href="{{ url('home') }}" class="text-white flex items-center ">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                </svg>
                Utilisateurs
            </a>
        </li>
        <li class="mb-2 flex gap-3 text-white">
            <img src="{{ Vite::asset('resources/images/laravel-2.svg') }}" width="20px" alt="image user">                
                {{ Auth::user()->name }}
        </li>
        <li class="mb-2 flex gap-3 text-white">
            <form method="POST" action="{{route('logout')}}">
                @csrf
                <button>
                    <span class="flex">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6-10a9 9 0 11-6.219 15.219"></path>
                        </svg>
                        Deconnexion
                    </span>
                </button>
            </form>
        </li>
    </ul>
</side>