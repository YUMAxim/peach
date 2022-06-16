@csrf

<div class="mb-5">
    <label>募集タイトル</label>
    <input type="text" name="title"
        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" placeholder="タイトル"
        value="{{ old('title', $recruit->title) }}" required>
</div>

<x-body :body="$recruit->body"></x-body>

<div class="mb-5">
    <label>カテゴリー</label>
    {{-- hidden isn't displayed --}}
    <select name="book_category_id" class="rounded-sm">
        <option hidden>選択してください</option>
        @foreach ($bookCategories as $key => $bookCategory)
            <option value="{{ $key }}"
                {{ old('book_category_id', $recruit->book_category_id) == $key ? 'selected' : '' }}>{{ $bookCategory }}</option>
        @endforeach
    </select>
</div>

<div class="">
    <label class="font-bold text-xl">募集する担当</label>
    <div class="">
        @foreach ($rolesCategories as $rolesCategory)
            @if ($rolesCategory->id !== 99)
                <div class="text-lg mb-3">
                    {{ $rolesCategory->name }}
                </div>
            @endif
            @foreach ($rolesCategory->roles as $role)
                <div class="flex flex-col mb-3 ml-5">
                    <div class="list-none mb-2">
                        <li>{{ $role->name }}</li>
                    </div>
                    @php
                        // Accespt null: "?->"
                        $reward = $role->getRecruitRole($recruit->id)?->reward;
                    @endphp
                    <div class="flex flex-row">
                        <input type="number" name="rewards[{{ $role->id }}]" class="mr-3 text-lg text-right rounded-lg w-1/2"
                            value="{{ old('rewards[$role->id]', $reward) }}">
                        <div class="text-lg">
                            円
                        </div>
                    </div>
                </div>
            @endforeach
        @endforeach
        <br>
    </div>
</div>
@dump($select_roles)
</div> --}}

<div class="mb-5">
    <label for="budget">予算</label>
    <select name="budget" class="rounded-sm">
        @for ($i = 500000; $i >= 150000; $i -= 10000)
            <option value="{{ $i }}" {{ old('budget', $recruit->budget) == $i ? 'selected' : '' }}>
                {{ number_format($i) }}円</option>
        @endfor
        @for ($i = 150000; $i >= 50000; $i -= 5000)
            <option value="{{ $i }}" {{ old('budget', $recruit->budget) == $i ? 'selected' : '' }}>
                {{ number_format($i) }}円</option>
        @endfor
        @for ($i = 510000; $i <= 2000000; $i += 10000)
            <option value="{{ $i }}" {{ old('budget', $recruit->budget) == $i ? 'selected' : '' }}>
                {{ number_format($i) }}円</option>
        @endfor
    </select>
</div>

<x-file :name="$recruit->file_name"></x-file>

@php
$today = \Carbon\Carbon::now();
@endphp
{{-- change to select box --}}
<div class="mb-5 flex flex-col">
    <label for="application_deadline" class="mb-1">募集締切</label>
    <div>
        @if (!$recruit->application_deadline)
            <select name="applicationDeadlineYear" class="rounded-sm">
                @for ($year = $today->year; $year <= $today->year + 1; ++$year)
                    <option value="{{ $year }}" {{ old('applicationDeadlineYear') == $year ? 'selected' : '' }}>
                        {{ $year }}</option>
                @endfor
            </select>年
            <select name="applicationDeadlineMonth" class="rounded-sm">
                @for ($month = 1; $month <= 12; ++$month)
                    <option value="{{ $month }}"
                        {{ old('applicationDeadlineMonth', $today->month) == $month ? 'selected' : '' }}>
                        {{ $month }}</option>
                @endfor
            </select>月
            <select name="applicationDeadlineDay" class="rounded-sm">
                @for ($day = 1; $day <= 31; ++$day)
                    <option value="{{ $day }}"
                        {{ old('applicationDeadlineDay', $today->day) == $day ? 'selected' : '' }}>
                        {{ $day }}</option>
                @endfor
            </select>日
        @else
            <select name="applicationDeadlineYear" class="rounded-sm">
                @for ($year = $today->year; $year <= $today->year + 1; ++$year)
                    <option value="{{ $year }}"
                        {{ old('applicationDeadlineYear', $recruit->application_deadline->year) == $year ? 'selected' : '' }}>
                        {{ $year }}</option>
                @endfor
            </select>年
            <select name="applicationDeadlineMonth" class="rounded-sm">
                @for ($month = 1; $month <= 12; ++$month)
                    <option value="{{ $month }}"
                        {{ old('applicationDeadlineMonth', $recruit->application_deadline->month) == $month ? 'selected' : '' }}>
                        {{ $month }}</option>
                @endfor
            </select>月
            <select name="applicationDeadlineDay" class="rounded-sm">
                @for ($day = 1; $day <= 31; ++$day)
                    <option value="{{ $day }}"
                        {{ old('applicationDeadlineDay', $recruit->application_deadline->day) == $day ? 'selected' : '' }}>
                        {{ $day }}</option>
                @endfor
            </select>日
        @endif
    </div>
</div>

<div class="mb-5 flex flex-col">
    <label for="deadline" class="mb-1">完成希望日</label>
    <div>
        @if (!$recruit->deadline)
            <select name="deadlineYear" class="rounded-sm">
                @for ($year = $today->year; $year <= $today->year + 1; ++$year)
                    <option value="{{ $year }}" {{ old('deadlineYear') == $year ? 'selected' : '' }}>
                        {{ $year }}</option>
                @endfor
            </select>年
            <select name="deadlineMonth" class="rounded-sm">
                @for ($month = 1; $month <= 12; ++$month)
                    <option value="{{ $month }}"
                        {{ old('deadlineMonth', $today->month) == $month ? 'selected' : '' }}>
                        {{ $month }}</option>
                @endfor
            </select>月
            <select name="deadlineDay" class="rounded-sm">
                @for ($day = 1; $day <= 31; ++$day)
                    <option value="{{ $day }}" {{ old('DeadlineDay', $today->day) == $day ? 'selected' : '' }}>
                        {{ $day }}</option>
                @endfor
            </select>日
        @else
            <select name="deadlineYear" class="rounded-sm">
                @for ($year = $today->year; $year <= $today->year + 1; ++$year)
                    <option value="{{ $year }}"
                        {{ old('deadlineYear', $recruit->deadline->year) == $year ? 'selected' : '' }}>
                        {{ $year }}</option>
                @endfor
            </select>年
            <select name="deadlineMonth" class="rounded-sm">
                @for ($month = 1; $month <= 12; ++$month)
                    <option value="{{ $month }}"
                        {{ old('deadlineMonth', $recruit->deadline->month) == $month ? 'selected' : '' }}>
                        {{ $month }}</option>
                @endfor
            </select>月
            <select name="deadlineDay" class="rounded-sm">
                @for ($day = 1; $day <= 31; ++$day)
                    <option value="{{ $day }}"
                        {{ old('deadlineDay', $recruit->deadline->day) == $day ? 'selected' : '' }}>
                        {{ $day }}</option>
                @endfor
            </select>日
        @endif
    </div>
</div>

@php
    $deadline = 'deadline';
@endphp
{{-- <x-deadline :deadlineLabel="$deadline" :deadline="$recruit->deadline"></x-deadline> --}}

@dump($rolesCategories)
