@php
$today = \Carbon\Carbon::now();
@endphp
<div class="mb-5 flex flex-col">
    <label for="{{ $deadlineLabel }}" class="mb-1">完成希望日</label>
    <div>
        @if (!{{ $deadline }})
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
