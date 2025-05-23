<div id="search-bar">
    {{-- A revoir sur ce form due au non reponse Au requte ( ? ) --}}
    <form class="flex" role="search">
        <input wire:model.live.debounce.500ms="search"type="search" placeholder="Search">
    </form>

    @if(sizeof($users) > 0)
    <div>
        @foreach($users as $user)
            <p>{{ $user->name }}</p>
            <small>{{ $user->email }}</small>
        @endforeach
    </div>
    @endif
    
</div>
