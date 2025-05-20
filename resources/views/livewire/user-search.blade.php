<div>
    
    <input type="text" wire:model="search" placeholder="Efsfsf">

    <ul>
        @forelse($users as $user)
            <li>{{ $user->name }}</li>
        @empty
        <li>Aucun user trouver</li>
        @endforelse
    </ul>
</div>
