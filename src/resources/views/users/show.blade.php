@extends('app')

@section('title', $user->name)

@section('content')
    @include('nav')
    <div class="container">
        @include('users.user')
        {{-- @include('users.tabs', ['hasArticles' => true, 'hasLikes' => false])
        @foreach($recruits as $recruit)
        @include('users.card')
        @endforeach --}}
    </div>
@endsection
