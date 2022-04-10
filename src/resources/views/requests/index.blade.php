@extends('app')

@section('title', '募集一覧')

@section('content')
    @include('nav')
    @foreach ($requests as $request)
    <div class="container">
        <div class="">
            {{ $request->user->name }}
        </div>
        <div class="">
            {{ $request->created_at->format('Y/m/d H:i') }}
        </div>
        <h3 class="">
            {{ $request->title }}
        </h3>
        <div class="">
            {!! nl2br(e( $request->body )) !!}
        </div>
        <div class="">
            {{ $request->category }}
        </div>
        <div class="">
            {{ $request->budget }}
        </div>
        <div class="">
            {{ $request->collaborator_role }}
        </div>
    </div>
    @endforeach
@endsection
