@csrf

@if ($errors->any())
    <div class="bg-pink-200 rounded-lg">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="mb-5">
    <input type="hidden" name="recruit_id" value="{{ $recruit->id }}">
    <label>応募する担当</label>
    <div>
        @dump($recruitRoles);
        @foreach ($recruitRoles as $recruitsRole)
            @if ($recruitsRole['roles'])
                <div class="flex flex-col">
                    <div class="font-bold">{{ $recruitsRole['name'] }}</div>
                    @foreach ($recruitsRole['roles'] as $role)
                        <div class="flex flex-row">
                            <div>
                                <input type="checkbox" name="recruitRoles[{{ $role['role_id'] }}]">
                            </div>
                            <div>{{ $role['role']['name'] }}</div>
                            <div>{{ $role['reward'] }}円</div>
                        </div>
                    @endforeach
                </div>
            @endif
        @endforeach
    </div>

<x-body :body="$offer->body"></x-body>

<x-file :name="$offer->file_name"></x-file>

    @php
        $today = \Carbon\Carbon::now();
    @endphp
    <div class="mb-5 flex flex-col">
        <label for="completion_deadline" class="mb-1">完成予定日</label>
        <div>
            @if (!$recruit->completion_deadline)
                <select name="completionDeadlineYear" class="rounded-sm">
                    @for ($year = $today->year; $year <= $today->year + 1; ++$year)
                        <option value="{{ $year }}"
                            {{ old('completionDeadlineYear') == $year ? 'selected' : '' }}>
                            {{ $year }}</option>
                    @endfor
                </select>年
                <select name="completionDeadlineMonth" class="rounded-sm">
                    @for ($month = 1; $month <= 12; ++$month)
                        <option value="{{ $month }}"
                            {{ old('completionDeadlineMonth', $today->month) == $month ? 'selected' : '' }}>
                            {{ $month }}</option>
                    @endfor
                </select>月
                <select name="completionDeadlineDay" class="rounded-sm">
                    @for ($day = 1; $day <= 31; ++$day)
                        <option value="{{ $day }}"
                            {{ old('completionDeadlineDay', $today->day) == $day ? 'selected' : '' }}>
                            {{ $day }}</option>
                    @endfor
                </select>日
            @else
                <select name="completionDeadlineYear" class="rounded-sm">
                    @for ($year = $today->year; $year <= $today->year + 1; ++$year)
                        <option value="{{ $year }}"
                            {{ old('completionDeadlineYear', $recruit->completion_deadline->year) == $year ? 'selected' : '' }}>
                            {{ $year }}</option>
                    @endfor
                </select>年
                <select name="completionDeadlineMonth" class="rounded-sm">
                    @for ($month = 1; $month <= 12; ++$month)
                        <option value="{{ $month }}"
                            {{ old('completionDeadlineMonth', $recruit->completion_deadline->month) == $month ? 'selected' : '' }}>
                            {{ $month }}</option>
                    @endfor
                </select>月
                <select name="completionDeadlineDay" class="rounded-sm">
                    @for ($day = 1; $day <= 31; ++$day)
                        <option value="{{ $day }}"
                            {{ old('completionDeadlineDay', $recruit->completion_deadline->day) == $day ? 'selected' : '' }}>
                            {{ $day }}</option>
                    @endfor
                </select>日
            @endif
        </div>

        {{ Form::submit('応募する') }}

        @dump($recruit)
