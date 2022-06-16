@php
use App\Models\User;
use App\Models\Message;
use App\Models\Room;
use Illuminate\Support\Carbon;

// $thisUserId = \Auth::id();
$room = new Room();
$histories = $room->histories();

$histories->map(function ($history) {
    $history->partner();
});
// dd($histories);
@endphp
<x-app>
    <x-slot name="title">message</x-slot>
    <x-nav></x-nav>
    message lists
    <div>
        {{-- {{ $histories[2]->partner->id }} --}}
        @foreach ($histories as $history)
            @if ($history->latestMessage)
                {{-- @dd($history['latestMessage'], $history["partner"]) --}}
                @php
                    $sentDate = $history["latestMessage"]->created_at;
                    // $sentDate = '2022-06-01 17:36:44';
                    $sentDaysAgo = Carbon::now()->diffInDays($sentDate);
                    $sentHoursAgo = Carbon::now()->diffInHours($sentDate);
                    $sentMinutesAgo = Carbon::now()->diffInMinutes($sentDate);
                    @endphp
                <a href="{{ route('message.index', ['id' => $history->partner->id]) }}">
                    <div class="flex flex-row bg-pink-300">
                        <div class="text-lg mr-5">
                            {{ $history->partner->name }}
                        </div>
                        <div class="mr-5">
                            {{ $history['latestMessage']->message }}
                        </div>
                        <div>
                            {{-- @dump($sentDate,$sentDaysAgo) --}}
                            @if ($sentDaysAgo > 1)
                            {{ $sentDate }}
                            @endif
                            @if ($sentDaysAgo == 1)
                                昨日
                            @endif
                            @if ($sentDaysAgo < 1 && $sentMinutesAgo >= 60)
                                {{ $sentHoursAgo }}時間前
                            @endif
                            @if ($sentMinutesAgo > 0 && $sentMinutesAgo < 60)
                                {{ $sentMinutesAgo }}分前
                            @endif
                            @if ($sentMinutesAgo < 1)
                                数秒前
                            @endif
                        </div>
                    </div>
                </a>
            @endif
        @endforeach
    </div>
</x-app>
