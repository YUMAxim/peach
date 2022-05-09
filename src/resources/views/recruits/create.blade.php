@extends('app')

@section('title', '募集作成')

@section('content')
    <div class="container">
        @include('nav')
        {{-- mx 効かない --}}
        <div class="content flex flex-col ml-2 mr-2">
            <form action="{{ route('recruits.store') }}" method="POST" enctype="multipart/form-data">
                <h2>募集作成フォーム</h2>
                @include('recruits.form')
            </form>
        </div>
    </div>
@endsection
