@extends('app')

@section('content')
<div>
    <form method="POST" action="{{ route('requests.store') }}" enctype="multipart/form-data">
    @csrf
        <label>募集タイトル</label>
        {{ $inputs['title'] }}
        {{-- {{ Form::hidden('title', {{ $inputs['title'] }}) }} --}}
        {{-- {{ $inputs[''] }}
        {{ Form::hidden('', '{{ $inputs[''] }}') }} --}}


        <label>募集内容の詳細</label>
        {!! nl2br(e($inputs['body'])) !!}
        {{-- {{ Form::hidden('body', '{{ $inputs['body'] }}') }} --}}


        {{ Form::label('', 'カテゴリー') }}
        {{ $inputs['category'] }}
        {{ Form::label('budget', '予算') }}
        {{ Form::label('page', 'ページ数') }}
        {{ Form::label('booksize', 'サイズ') }}
        {{ Form::label('fileFormat','ファイル形式')}}
        {{ Form::label('my_role', 'あなたの担当') }}
        {{ Form::label('collaborator_role', '募集する担当') }}
        {{ Form::label('desiredColorImpression', '希望の色のイメージ') }}
        {{ Form::label('desiredContentImpression', '希望イメージ') }}
        {{-- {{ Form::label('', ) }}
        {{ Form::label('', ) }} --}}

        <button type="submit" name="action" value="back">
            入力内容修正
        </button>
        <button type="submit" name="action" value="submit">
            送信する
        </button>
    </form>

</div>
dd($inputs);
@endsection
