@extends('app')

@section('title', '記事更新')

@include('nav')

@section('content')
    <div class="container">
        {{-- @include('error_card_list') --}}
        <div class="">
            <form method="POST" action="{{ route('recruits.store') }}" enctype="multipart/form-data">
                @include('recruits.form')
            </form>
            <form action="">
                {{ Form::submit('更新する') }}
            </form>
        </div>
    </div>
@endsection
