@extends('app')

@section('title', '募集作成')

@include('nav')

@section('content')
    <div>
        <form action="{{ route('requests.confirm') }}" method="POST">
            <h3>募集作成フォーム</h3>
            @include('requests.form')
        </form>
    </div>
@endsection
