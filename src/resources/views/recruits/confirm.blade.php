@extends('app')

@section('content')
    <div>
        <form>
            @csrf
            <label>募集タイトル</label>
            {{ $inputs['title'] }}
            {{-- {{ Form::hidden('title', {{ $inputs['title'] }}) }} --}}
            {{-- {{ $inputs[''] }}
        {{ Form::hidden('', '{{ $inputs[''] }}') }} --}}


            <label>募集内容の詳細</label>
            {!! nl2br(e($inputs['body'])) !!}
            {{-- {{ Form::hidden('body', '{{ $inputs['body'] }}') }} --}}


            {{ Form::label('category', 'カテゴリー') }}
            {{ $inputs['category'] }}


            {{ Form::label('page', 'ページ数') }}
            {{ $inputs['page'] }}

            {{ Form::label('booksize', 'サイズ') }}
            {{ $inputs['booksize'] }}

            {{ Form::label('file_format', 'ファイル形式') }}

            {{ Form::label('my_role', 'あなたの担当') }}
            {{ $inputs['my_role'] }}

            {{ Form::label('recruits_role', '募集する担当') }}
            {{ $inputs['recruits_role'] }}

            {{ Form::label('desiredColorImpression', '希望の色のイメージ') }}
            {{ $inputs['desiredColorImpression'] }}

            {{ Form::label('desiredContentImpression', '希望イメージ') }}
            {{ $inputs['desiredContentImpression'] }}

            {{ Form::label('budget', '予算') }}
            {{ $inputs['budget'] }}

            {{ Form::label('application-deadline', '募集締切') }}
            {{ $inputs['application_deadline_year'] .'年' .$inputs['application_deadline_month'] .'月' .$inputs['application_deadline_day'] .'日' }}
            {{ Form::label('deadline', '納品希望日') }}
            {{ $inputs['deadline_year'] . '年' . $inputs['deadline_month'] . '月' . $inputs['deadline_day'] . '日' }}


            {{ Form::submit('入力内容修正', ['action' => "view('recruits.create')", 'method' => 'POST', 'enctype' => 'multipart/form-data','name' => 'action', 'value' => 'back']) }}
            {{ Form::submit('募集する', ['action' => "route('recruits.store')", 'method' => 'POST', 'enctype' => 'multipart/form-data', 'name' => 'action', 'value' => 'submit']) }}
        </form>

    </div>

    @php
    dd($inputs);
    @endphp
@endsection
