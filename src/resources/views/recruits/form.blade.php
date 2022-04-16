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
{{ Form::select('category', $categories_name, old('category', $categories_name)) }}


<label>ページ数</label>
{{ Form::select('page', ['10' => '10', '20' => '20', '30' => '30']) }}

<label>サイズ</label>
{{ Form::select('booksize', ['a4' => 'A4', 'b5' => 'B5', 'a5' => 'A5']) }}

{{ Form::label('file_format', 'ファイル形式') }}
<div>
    {{ Form::label('pdf', 'PDF') }}
    {{ Form::checkbox('pdf', 'aa', false, ['id' => 'pdf']) }}
</div>
<div>
    {{ Form::label('jpg', 'JPG') }}
    {{ Form::checkbox('jpg', 'aa', false, ['id' => 'jpg']) }}
</div>
<div>
    {{ Form::label('png', 'PNG') }}
    {{ Form::checkbox('png', 'aa', false, ['id' => 'png']) }}
</div>

<div>
    <label>あなたの担当</label>
    {{ Form::select('my_role', ['role_A' => 'A', 'role_B' => 'B', 'role_C' => 'C']) }}
</div>

<div>
    <label>募集する担当</label>
    {{ Form::select('recruits_role', ['role_A' => 'A', 'role_B' => 'B', 'role_C' => 'C']) }}
</div>

</div>
{{ Form::label('desiredColorImpression', '希望の色のイメージ') }}

{{ Form::checkbox('desiredColorImpression', 'red', false) }}
{{ Form::label('desiredColorImpression', '赤系') }}

{{ Form::checkbox('desiredColorImpression', 'blue', false) }}
{{ Form::label('desiredColorImpression', '青系') }}

{{ Form::checkbox('desiredColorImpression', 'green', false) }}
{{ Form::label('desiredColorImpression', '緑系') }}

{{ Form::checkbox('desiredColorImpression', 'yellow', false) }}
{{ Form::label('desiredColorImpression', '黃・オレンジ系') }}

{{ Form::checkbox('desiredColorImpression', 'pink', false) }}
{{ Form::label('desiredColorImpression', 'ピンク系') }}

{{ Form::checkbox('desiredColorImpression', 'brown', false) }}
{{ Form::label('desiredColorImpression', '茶系') }}

{{ Form::checkbox('desiredColorImpression', 'black', false) }}
{{ Form::label('desiredColorImpression', '黒系') }}

{{ Form::checkbox('desiredColorImpression', 'none', true) }}
{{ Form::label('desiredColorImpression', '特になし') }}

{{ Form::checkbox('desiredColorImpression', 'other', false) }}
{{ Form::label('desiredColorImpression', 'その他') }}
<div>

    <div>
        {{ Form::label('desiredContentImpression', '希望イメージ') }}
        <input type="range" name="desiredContentImpression" min="1" max="5">
    </div>

    {{ Form::label('budget', '予算') }}
    <select name="budget">
        @for ($i = 500000; $i < 100000; $i -= 1000)
            <option value="{{ $i }}">{{ $i }}円</option>
        @endfor
        @for ($i = 501000; $i < 2000000; $i += 1000)
            <option value="{{ $i }}">{{ $i }}円</option>
        @endfor
    </select>

    <div>
        {{ Form::label('file-attachment', '添付ファイル') }}
        {{ Form::file('file-attachment') }}
    </div>

    @php
        $today = \Carbon\Carbon::now();
    @endphp
    {{ Form::label('application-deadline', '募集締切') }}
    {{ Form::selectRange('application_deadline_year', $today->year, $today->year + 1, $today->year) }}年
    {{ Form::selectRange('application_deadline_month', 1, 12, $today->month) }}月
    {{ Form::selectRange('application_deadline_day', 1, 31, $today->day) }}日

    {{ Form::label('deadline', '納品希望日') }}
    {{ Form::selectRange('deadline_year', $today->year, $today->year + 1, $today->year) }}年
    {{ Form::selectRange('deadline_month', 1, 12, $today->month) }}月
    {{ Form::selectRange('deadline_day', 1, 31, $today->day) }}日

    {{ Form::submit('確認画面へ') }}

    @php
        dd($categories_name);
    @endphp
