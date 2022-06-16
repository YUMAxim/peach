<x-app>
<x-slot name="title"></x-slot>
<x-nav></x-nav>
    <div class="container">
        {{-- @include('error_card_list') --}}
        <div class="">
            <form method="POST" action="{{ route('recruits.update', $recruit) }}" enctype="multipart/form-data">
                @method('patch')
                @include('recruits.form')
                <button type="submit">編集する</button>
                <a href="{{ route('recruits.show', $recruit) }}">キャンセル</a>
            </form>
        </div>
    </div>
</x-app>
