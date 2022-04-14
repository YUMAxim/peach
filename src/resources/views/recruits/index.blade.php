@extends('app')

@section('title', '募集一覧')

@section('content')
    @include('nav')
    @foreach ($recruits as $recruit)
    <div class="container">
        <div class="">
            {{ $recruit->user->name }}
        </div>
        <div class="">
            {{ $recruit->created_at->format('Y/m/d H:i') }}
        </div>
        <h3 class="">
            {{ $recruit->title }}
        </h3>
        <div class="">
            {!! nl2br(e( $recruit->body )) !!}
        </div>
        <div class="">
            {{ $recruit->category }}
        </div>
        <div class="">
            {{ $recruit->budget }}
        </div>
        <div class="">
            {{ $recruit->recruits_role }}
        </div>
    </div>
    @endforeach
@endsection
