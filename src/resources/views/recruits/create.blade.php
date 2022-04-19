@extends('app')

@section('title', '募集作成')

@include('nav')

@section('content')
    <div>
        <form action="{{ route('recruits.store') }}" method="POST" enctype="multipart/form-data">
            <h3>募集作成フォーム</h3>
            @include('recruits.form')
        </form>
    </div>
@endsection
