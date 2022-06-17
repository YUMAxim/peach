@extends('app')

@section('content')
    <div>
        <form action="{{ route('recruits.create') }}" method="POST" enctype="multipart/form-data">
            @csrf
            {{ Form::submit('入力内容修正', ['action' => "view('recruits.create')",'method' => 'POST','enctype' => 'multipart/form-data','name' => 'action','value' => 'back']) }}
        </form>
        <form action="{{ route('recruits.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <label>募集タイトル</label>
            {{ $inputs['title'] }}
            {{ Form::hidden('title', $inputs['title']) }}
            {{-- {{ Form::hidden('title', {{ $inputs['title'] }}) }} --}}
            {{-- {{ $inputs[''] }}
        {{ Form::hidden('', '{{ $inputs[''] }}') }} --}}


            <label>募集内容の詳細</label>
            {!! nl2br(e($inputs['body'])) !!}
            {{ Form::hidden('body', $inputs['body']) }}
            {{-- {{ Form::hidden('body', '{{ $inputs['body'] }}') }} --}}


            {{ Form::label('category', 'カテゴリー') }}
            {{ $inputs['category'] }}
            {{-- {{ Form::hidden('category', $inputs['category']) }} --}}


            {{ Form::label('page', 'ページ数') }}
            {{ $inputs['page'] }}
            {{ Form::hidden('page', $inputs['page']) }}

            {{ Form::label('booksize', 'サイズ') }}
            {{ $inputs['booksize'] }}
            {{ Form::hidden('booksize', $inputs['booksize']) }}

            {{ Form::label('file_format', 'ファイル形式') }}
            {{-- {{ Form::hidden('file_format', $inputs['file_format']) }} --}}

            {{ Form::label('my_role', 'あなたの担当') }}
            {{ $inputs['my_role'] }}
            {{ Form::hidden('my_role', $inputs['my_role']) }}

            {{ Form::label('recruits_role', '募集する担当') }}
            {{ $inputs['recruits_role'] }}
            {{ Form::hidden('recruits_role', $inputs['recruits_role']) }}

            {{ Form::label('desired_color_Impression', '希望の色のイメージ') }}
            {{ $inputs['desired_color_Impression'] }}
            {{ Form::hidden('desired_color_Impression', $inputs['desired_color_Impression']) }}

            {{ Form::label('desired_content_Impression', '希望イメージ') }}
            {{ $inputs['desired_content_Impression'] }}
            {{ Form::hidden('desired_content_Impression', $inputs['desired_content_Impression']) }}

            {{ Form::label('budget', '予算') }}
            {{ $inputs['budget'] }}
            {{ Form::hidden('budget', $inputs['budget']) }}

            {{ Form::label('application-deadline', '募集締切') }}
            {{ $inputs['application_deadline_year'] .'年' .$inputs['application_deadline_month'] .'月' .$inputs['application_deadline_day'] .'日' }}
            {{-- {{ Form::hidden('', {{ $inputs[''] }}) }} --}}

            {{ Form::label('deadline', '納品希望日') }}
            {{ $inputs['deadline_year'] . '年' . $inputs['deadline_month'] . '月' . $inputs['deadline_day'] . '日' }}
            {{-- {{ Form::hidden('', {{ $inputs[''] }}) }} --}}


            {{ Form::submit('submit') }}
        </form>
    </div>

    @php
    dd($inputs);
    @endphp
@endsection
