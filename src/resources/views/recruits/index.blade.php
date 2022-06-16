<x-app>
    <x-slot name="title">募集一覧</x-slot>
    <x-nav></x-nav>
    {{-- @include('sample') --}}
    @dump($recruits)
    @foreach ($recruits as $recruit)
        @include('recruits.card')
    @endforeach
    {{ $recruits->onEachSide(0)->links() }}
</x-app>
