@csrf
{{-- Form::select()
1st argument: name attribute of the selectbox menu
2nd argument: associative array format [ 'value' => 'choice'].
3rd argument: default selected
4th argument: additional attributes (associative array format) --}}

<label>募集タイトル</label>
<input type="text" name="title" required value="{{ $recruit->title ?? old('title') }}">

<label>募集内容の詳細</label>
<textarea name="body" required rows="16" placeholder="募集内容の詳細を入力してください">{{ $recruit->body ?? old('body') }}</textarea>

<label>カテゴリー</label>
{{ Form::select('category_id', $categories, old('category_id', $categories)) }}

<label>ページ数</label>
{{ Form::select('page', $select_options['pages']) }}

<label>サイズ</label>
{{ Form::select('booksize', $select_options['booksizes']) }}

<div>
    @for ($i = 0; $i < count($select_options['file_formats']); $i += 1)
        {{ Form::checkbox('file_format', $i, false) }}
        {{ Form::label('file_format', $select_options['file_formats'][$i]) }}
    @endfor
</div>
{{-- <div>
    {{ Form::label('pdf', 'PDF') }}
    {{ Form::checkbox('file_format', 'aa', false, ['id' => 'pdf']) }}
</div>
<div>
    {{ Form::label('jpg', 'JPG') }}
    {{ Form::checkbox('file_format', 'aa', false, ['id' => 'jpg']) }}
</div>
<div>
    {{ Form::label('png', 'PNG') }}
    {{ Form::checkbox('file_format', 'aa', false, ['id' => 'png']) }}
</div> --}}

<div>
    <label>あなたの担当</label>
    {{ Form::select('my_role', $select_options['my_roles']) }}
</div>

<div>
    <label>募集する担当</label>
    {{ Form::select('recruits_role', $select_options['recruits_roles']) }}
</div>

<div>
    @for ($i = 0; $i < count($select_options['desired_color_impressions']); $i += 1)
        {{ Form::checkbox('desired_color_impression', $i, false) }}
        {{ Form::label('desired_color_impression', $select_options['desired_color_impressions'][$i]) }}
    @endfor
</div>

<div>
    {{ Form::label('desired_content_impression', '希望イメージ') }}
    <input type="range" name="desired_content_impression" min="1" max="5">
</div>

{{ Form::label('budget', '予算') }}
<select name="budget">
    @for ($i = 500000; $i >= 150000; $i -= 10000)
        <option value="{{ $i }}">{{ number_format($i) }}円</option>
    @endfor
    @for ($i = 150000; $i >= 50000; $i -= 5000)
        <option value="{{ $i }}">{{ number_format($i) }}円</option>
    @endfor
    @for ($i = 510000; $i <= 2000000; $i += 10000)
        <option value="{{ $i }}">{{ number_format($i) }}円</option>
    @endfor
</select>

<div>
    {{ Form::label('file-attachment', '添付ファイル') }}
    {{ Form::file('file-attachment') }}
</div>

{{-- @php
$today = \Carbon\Carbon::now();
@endphp

{{ Form::label('application-deadline', '募集締切') }}
{{ Form::selectRange('application_deadline_year', $today->year, $today->year + 1, $today->year) }}年
{{ Form::selectRange('application_deadline_month', 1, 12, $today->month) }}月
{{ Form::selectRange('application_deadline_day', 1, 31, $today->day) }}日

{{ Form::label('deadline', '納品希望日') }}
{{ Form::selectRange('deadline_year', $today->year, $today->year + 1, $today->year) }}年
{{ Form::selectRange('deadline_month', 1, 12, $today->month) }}月
{{ Form::selectRange('deadline_day', 1, 31, $today->day) }}日 --}}

{{ Form::submit('募集する') }}

@php
dd($select_options);
// dd($categories);
@endphp
