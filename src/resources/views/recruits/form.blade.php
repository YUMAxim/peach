@php
use App\Models\Role;
@endphp

@csrf
{{-- Form::select()
1st argument: name attribute of the selectbox menu
2nd argument: associative array format [ 'value' => 'choice'].
3rd argument: default selected
4th argument: additional attributes (associative array format) --}}

<div class="mb-5">
    <label>募集タイトル</label>
    <input type="text" name="title"
        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700"
        placeholder="title" value="test" required>
</div>
{{-- {{ $recruit->title ?? old('title') }} --}}

<div class="mb-8 flex flex-col">
    <label>募集内容の詳細</label>
    <textarea name="body" rows="16" placeholder="募集内容の詳細を入力してください" required>this is test</textarea>
</div>
{{-- {{ $recruit->body ?? old('body') }} --}}
<div class="">
    <label>カテゴリー</label>
    {{ Form::select('category_id', $select_categories, old('category_id', $select_categories)) }}
</div>

{{-- <div class="">
    <h2>あなたの担当</h2>
    <div class="">
        @foreach ($select_roles as $role_category => $roles)
            <p>{{ $role_category }}</p>
            <div class="dropdown" data-control="checkbox-dropdown">
                <label class="dropdown-label"></label>
                <div class="dropdown-list">
                    @foreach ($roles as $role)
                        @php
                            $tmp = Role::where('name', $role)
                                ->pluck('id')
                                ->implode('id');
                            // dump($tmp);
                        @endphp
                        <label class="dropdown-option">
                            {{ Form::checkbox('recruiter_role[]', $tmp, false) }}
                            {{ $role }}
                        </label>
                    @endforeach
                </div>
            </div>
            @dump($roles)
        @endforeach
</div>
@dump($select_roles)
</div> --}}

<div class="">
    <label>募集する担当</label>
    <div class="">
        @foreach ($select_roles as $role_category => $roles)
            <p>{{ $role_category }}</p>
            @foreach ($roles as $role)
                @php
                    $tmp = Role::where('name', $role)
                        ->pluck('id')
                        ->implode('id');
                    // dump($tmp);
                @endphp
                <div class="flex flex-col">
                    <label class="">
                        {{ $role }}
                        <input type="number" name="rewards[{{ $tmp }}]">
                    </label>
                </div>
            @endforeach
            {{-- @dump($roles) --}}
        @endforeach
        <p>その他</p>
        <input type="number" name="rewards[6]" value="その他">
    </div>
</div>

<div class="">
    <label for="budget">予算</label>
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
</div>

<div class="">
    <label for="file_attachment">添付ファイル</label>
    <input id="file_attachment" name="file_attachment[]" type="file" multiple>
</div>

@php
$today = \Carbon\Carbon::now();
@endphp

<div class="">
    <label for="application-deadline">募集締切</label>
    {{ Form::selectRange('application_deadline_year', $today->year, $today->year + 1, $today->year) }}年
    {{ Form::selectRange('application_deadline_month', 1, 12, $today->month) }}月
    {{ Form::selectRange('application_deadline_day', 1, 31, $today->day) }}日
</div>

<div class="">
    <label for="deadline">完成希望日</label>
    {{ Form::selectRange('deadline_year', $today->year, $today->year + 1, $today->year) }}年
    {{ Form::selectRange('deadline_month', 1, 12, $today->month) }}月
    {{ Form::selectRange('deadline_day', 1, 31, $today->day) }}日
</div>

<input type="submit" value="募集する">
<br>
<br>
<br>
<br>
