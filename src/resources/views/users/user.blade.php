<div class="">
    <a href="{{ route('users.show', ['name' => $user->name]) }}">
        <img src="https://cdn.tuk.dev/assets/components/misc/doge-coin.png" alt="coin avatar"
            class="w-12 h-12 rounded-full" />
    </a>
</div>
<h2 class="h5 m-0 mt-2">
    <a href="{{ route('users.show', ['name' => $user->name]) }}" class="">
        {{ $user->name }}
    </a>
</h2>
