<x-app>
<x-slot name="title">{{ $user->name }}</x-slot>
    <x-nav></x-nav>
    <div class="container">
        @include('users.user')
        {{-- @include('users.tabs', ['hasArticles' => true, 'hasLikes' => false])
        @foreach($recruits as $recruit)
        @include('users.card')
        @endforeach --}}
    </div>
</x-app>
