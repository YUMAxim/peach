@extends('app')

@section('content')
    <div>
        <form action="{{ route('recruits.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <label>募集タイトル</label>
            {{ $inputs['title'] }}
            {{ Form::hidden('title', $inputs['title']) }}

            <label>募集内容の詳細</label>
            {!! nl2br(e($inputs['body'])) !!}
            {{ Form::hidden('body', $inputs['body']) }}

            {{ Form::label('category', 'カテゴリー') }}
            {{ $categories[$inputs['category_id']] }}
            {{ Form::hidden('category_id', $inputs['category_id']) }}

            {{ Form::label('page', 'ページ数') }}
            {{ $select_options['pages'][$inputs['page']] }}ページ
            {{ Form::hidden('page', $select_options['pages'][$inputs['page']]) }}

            {{ Form::label('booksize', 'サイズ') }}
            {{ $select_options['booksizes'][$inputs['booksize']] }}ページ
            {{ Form::hidden('booksize', $select_options['booksizes'][$inputs['booksize']]) }}

            {{ Form::label('file_format', 'ファイル形式') }}
            {{ $select_options['file_formats'][$inputs['file_format']] }}
            {{ Form::hidden('file_format', $select_options['file_formats'][$inputs['file_format']]) }}

            {{ Form::label('recruiter_role', 'あなたの担当') }}
            {{ $select_options['recruiter_roles'][$inputs['recruiter_role']] }}
            {{ Form::hidden('recruiter_role', $select_options['recruiter_roles'][$inputs['recruiter_role']]) }}

            {{ Form::label('recruits_role', '募集する担当') }}
            {{ $select_options['recruits_roles'][$inputs['recruits_role']] }}
            {{ Form::hidden('recruits_role', $select_options['recruits_roles'][$inputs['recruits_role']]) }}

            {{ Form::label('desired_color_impression', '希望の色のイメージ') }}
            {{ $select_options['desired_color_impressions'][$inputs['desired_color_impression']] }}
            {{ Form::hidden('desired_color_impression',$select_options['desired_color_impressions'][$inputs['desired_color_impression']]) }}

            {{ Form::label('desired_content_impression', '希望イメージ') }}
            {{ $inputs['desired_content_impression'] }}
            {{ Form::hidden('desired_content_impression', $inputs['desired_content_impression']) }}

            {{ Form::label('budget', '予算') }}
            {{ number_format($inputs['budget']) }}円
            {{ Form::hidden('budget', $inputs['budget']) }}

            {{ Form::label('application-deadline', '募集締切') }}

            {{-- Convert date format --}}
            @php
                $date = $inputs['application_deadline_year'] . '-' . $inputs['application_deadline_month'] . '-' . $inputs['application_deadline_day'];
            @endphp
            {{ date('Y年m月d日', strtotime($date)) }}
            {{ Form::hidden('application_deadline', $date) }}

            {{ Form::label('deadline', '納品希望日') }}

            {{-- Convert date format --}}
            @php
                $date = $inputs['deadline_year'] . '-' . $inputs['deadline_month'] . '-' . $inputs['deadline_day'];
            @endphp
            {{ date('Y年m月d日', strtotime($date)) }}
            {{ Form::hidden('deadline', $date) }}}

            {{ Form::submit('募集する') }}
        </form>
    </div>

    @php
    // dd($date);
    dd($inputs);
    @endphp
@endsection
