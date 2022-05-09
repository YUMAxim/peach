@extends('app')

@section('title', '提案作成')

@section('content')
    <div class="container">
        @include('nav')
        {{-- mx 効かない --}}
        <div class="content flex flex-col ml-2 mr-2">
            <form action="{{ route('offers.store', ['recruit' => $recruit]) }}" method="POST" enctype="multipart/form-data">
                <h2>応募フォーム</h2>
                @include('offers.form')
            </form>
        </div>
    </div>
@endsection
