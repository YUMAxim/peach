<h1>契約者を決める</h1>
@foreach ($offers as $offer)
    <h2>{{ $offer['category'] }}</h2>
    <div>
        @foreach ($offer['roles'] as $role)
            <div>{{ $role->role->name }}</div>
            <div>{{ $role->reward }}</div>
            @foreach ($role->role->rolesRecruitRole as $recruitRoles)
                @dump($recruitRoles)
                @foreach ($recruitRoles as $recruitRole)
                    @if ($recruitRole)
                        <div>{{ $recruitRole }}</div>
                    @endif
                @endforeach
            @endforeach
        @endforeach
    </div>
@endforeach
