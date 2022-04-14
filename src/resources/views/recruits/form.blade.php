@csrf
<label>募集タイトル</label>
<input type="text" name="title" required value="{{ $recruit->title ?? old('title') }}">

<label>募集内容の詳細</label>
<textarea name="body" required rows="16" placeholder="募集内容の詳細を入力してください">{{ $recruit->body ?? old('body') }}</textarea>

<label>カテゴリー</label>
{{Form::select('category', ['category_A' => 'A', 'category_B' => 'B', 'category_C' => 'C'])}}

<label>予算</label>
{{Form::select('budget', ['予算を選択してください', '10' => '10,000円', '20' => '20,000円', '30' => '30,000円']), 0}}

<label>ページ数</label>
{{Form::select('page', ['10' => '10', '20' => '20', '30' => '30'])}}

<label>サイズ</label>
{{Form::select('booksize', ['a4' => 'A4', 'b5' => 'B5', 'a5' => 'A5'])}}

{{Form::label('fileFormat','ファイル形式')}}
<div>
    {{Form::label('pdf','PDF')}}
    {{Form::checkbox('pdf','aa', false, ['id'=>'pdf'])}}
</div>
<div>
    {{Form::label('jpg','JPG')}}
    {{Form::checkbox('jpg','aa', false, ['id'=>'jpg'])}}
</div>
<div>
    {{Form::label('png','PNG')}}
    {{Form::checkbox('png','aa', false, ['id'=>'png'])}}
</div>

<div>
    <label>あなたの担当</label>
{{Form::select('my_role', ['role_A' => 'A', 'role_B' => 'B', 'role_C' => 'C'])}}
</div>

<div>
    <label>募集する担当</label>
{{Form::select('recruits_role', ['role_A' => 'A', 'role_B' => 'B', 'role_C' => 'C'])}}
</div>

</div>
    {{ Form::label('desiredColorImpression', '希望の色のイメージ') }}
    <input type="range" min="1" max="5">
<div>

<div>
    {{ Form::label('desiredContentImpression', '希望イメージ') }}
    <input type="range" min="1" max="5">
</div>


<label>募集締切</label>
{{Form::select('application-deadline', ['' => '', '' => '', '' => ''])}}

<label>納品希望日</label>
{{Form::select('deadline', ['' => '', '' => '', '' => ''])}}

{{ Form::submit('確認画面へ') }}
