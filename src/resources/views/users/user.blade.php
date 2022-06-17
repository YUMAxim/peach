<x-app>
    <x-slot name="title">
        ユーザー情報
    </x-slot>
    <div class="">
        <a href="{{ route('users.show', ['id' => $user->id]) }}">
            <img src="https://cdn.tuk.dev/assets/components/misc/doge-coin.png" alt="coin avatar"
                class="w-12 h-12 rounded-full" />
        </a>
    </div>
    <h2 class="h5 m-0 mt-2">
        <a href="{{ route('users.show', ['id' => $user->id]) }}" class="">
            {{ $user->name }}
        </a>
        <div>
            <a href="{{ route('recruits.index', ['to' => 'me']) }}">作成した募集</a>
        </div>
        <div>
            <a href="{{ route('message.index', ['id' => $user->id]) }}">メッセージ to this user</a>
        </div>
        <div>
            <a href="{{ route('messages.list') }}">MYメッセージLIST</a>
        </div>
    </h2>
</x-app>

@dump($user)
