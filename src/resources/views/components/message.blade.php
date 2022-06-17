@php
use App\Models\User;
use App\Models\Room;
$room = new Room;
$partner = $room->partner();
// dd($partner);
@endphp
<x-app>
    <x-slot name="title">
        Message
    </x-slot>
    <x-nav></x-nav>
    <div class="media">
        <div class="media-body message-body">
            @foreach ($messages as $message)
                @php
                    $user = User::find($message->user_id);
                    $userId = $user->id;
                    $userName = $user->name;
                @endphp
            <div class="mb-8">
                <div class="flex flex-row mb-3">
                    <a href="{{ route('users.show', ['id' => $userId]) }}">{{ $userName }}</a>
                    <div class=" ml-6">
                        {{ $message->created_at->format('Y年m月d日 H:i') }}
                    </div>
                </div>
                <p class="message-body-content">
                    {!! nl2br(e($message->message)) !!}
                </p>
            </div>
            @endforeach
        </div>
    </div>

    <div>
        #Room Id:
        @dump($roomId)

    </div>
    #Submit Form
    <form method="POST" action="{{ route('message.store', ['id' => \Auth::id()]) }}">
        @csrf
        <div class="flex flex-row">
            <input type="hidden" name="room_id" value="{{ $roomId }}">
            <textarea name="message" id="" cols="20" rows="5" placeholder="Input message"></textarea>
            <button type="submit" class="btn ">送信</button>
        </div>
    </form>

    @dump(Auth::id())

</x-app>
