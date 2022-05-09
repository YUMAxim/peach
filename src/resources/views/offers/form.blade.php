@php
use App\Models\Role;
use App\Models\RecruitRole;
@endphp
@csrf

<div class="mb-5">
    <label>応募する担当</label>
    @foreach ($select_roles as $role_category => $roles)
        <p>{{ $role_category }}</p>
        <div class="flex flex-col ml-3">
            @php
            $rolex = RecruitRole::select('role_id')->whereRecruitId($recruit->id);
            // dd($rolex);
            @endphp
            @foreach ($rolex as $a)
            {{ $a }}
            @endforeach
            @foreach ($roles as $role)
                @php
                    $tmp = Role::where('name', $role)
                        ->pluck('id')
                        ->implode('id');
                    // dump($tmp);
                @endphp
                <div class="flex flex-col">
                <label>
                    {{ Form::checkbox('recruit_roles[]', $tmp, false) }}
                    {{ $role }}
                    50,000yen
                </label>
                </div>
            @endforeach
        </div>
        @dump($roles)
    @endforeach
</div>

<div class="mb-8 flex flex-col">
<label>提案文</label>
<textarea name="body" rows="16" placeholder="提案文を入力してください" required>{{ $offer->body ?? old('body') }}</textarea>
</div>

<div class="">
    <label for="file_attachment">添付ファイル</label>
    <input id="file_attachment" name="file_attachment[]" type="file" multiple>
</div>

<div>
    @php
        $today = \Carbon\Carbon::now();
    @endphp
    <label for="completion_deadline">完成予定日</label>
    {{ Form::selectRange('completion_deadline_year', $today->year, $today->year + 1, $today->year) }}年
    {{ Form::selectRange('completion_deadline_month', 1, 12, $today->month) }}月
    {{ Form::selectRange('completion_deadline_day', 1, 31, $today->day) }}日
</div>

{{ Form::submit('応募する') }}

@dump($recruit)
