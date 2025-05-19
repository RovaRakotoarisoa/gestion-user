<div>
    
    <input type="text" placeholder="Efsfsf">

    <ul>
        @forelse($users as user)
            <li>{{ $user->name }}</li>
        @empty
        <li>Aucun user trouver</li>
        @endforelse
    </ul>
</div>
