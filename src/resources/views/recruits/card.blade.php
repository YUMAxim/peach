<!-- component -->
<div aria-label="group of cards" tabindex="0" class="focus:outline-none py-8 w-full">

    <div class="lg:flex items-center justify-center w-full">
        <div tabindex="0" aria-label="card 1"
            class="focus:outline-none lg:w-4/12 lg:mr-7 lg:mb-0 mb-7 bg-white p-6 shadow rounded">
            <a href="{{ route('recruits.show', ['recruit' => $recruit]) }}">
                <div class="flex items-center border-b border-gray-200 pb-6">
                    <div class="flex flex-row">
                        <a href="{{ route('users.show', ['id' => $recruit->user->id]) }}">
                            <img src="https://cdn.tuk.dev/assets/components/misc/doge-coin.png" alt="coin avatar"
                                class="w-12 h-12 rounded-full" />
                            {{ $recruit->user->name }}
                        </a>
                    </div>

                    <div class="flex items-start justify-between w-full">
                        <div class="pl-3 w-full">
                            <a href="{{ route('recruits.show', ['recruit' => $recruit]) }}">
                                <p tabindex=" 0" class="focus:outline-none text-xl font-medium leading-5 text-gray-800">
                                    {{ $recruit->title }}
                                </p>
                            </a>
                        </div>
                        <div role="img" aria-label="bookmark">
                            <svg class="focus:outline-none" width="28" height="28" viewBox="0 0 28 28" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M10.5001 4.66667H17.5001C18.1189 4.66667 18.7124 4.9125 19.15 5.35009C19.5876 5.78767 19.8334 6.38117 19.8334 7V23.3333L14.0001 19.8333L8.16675 23.3333V7C8.16675 6.38117 8.41258 5.78767 8.85017 5.35009C9.28775 4.9125 9.88124 4.66667 10.5001 4.66667Z"
                                    stroke="#2C3E50" stroke-width="1.25" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="px-2">
                    <p tabindex="0" class="focus:outline-none text-sm leading-5 py-4 text-gray-600">
                        {{ $recruit->body }}
                    </p>
                    <div tabindex="0" class="focus:outline-none flex">
                        {{-- <div class="py-2 px-4 text-xs leading-3 text-indigo-700 rounded-full bg-indigo-100">#{{ $recruit->category }}</div> --}}
                        <div class="py-2 px-4 ml-3 text-xs leading-3 text-indigo-700 rounded-full bg-indigo-100">
                            #{{ $recruit->application_deadline }}
                        </div>

                        <!-- Price -->
                        <div class="flex col-start-2 ml-4 md:col-start-auto md:ml-0 md:justify-end">
                            <p class="rounded-lg text-pink-500 font-bold bg-pink-200  py-1 px-3 text-sm w-fit h-fit">
                                {{ $recruit->budget }}円
                            </p>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>
    @if (\Auth::id() === $recruit->user_id)
        <!-- dropdown -->
        <div class="">
            <a class="" href="{{ route('recruits.edit', ['recruit' => $recruit]) }}">
                <i class=""></i>募集を更新する
            </a>
            <a class="" href="">
                <i class=""></i>募集を削除する
            </a>
        </div>
</div>
</div>
<!-- dropdown -->

<!-- modal -->
<div id="modal-delete-{{ $recruit->id }}" class="modal" tabindex="-1" role="dialog">
    <div class="" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="閉じる">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="{{ route('recruits.destroy', ['recruit' => $recruit]) }}">
                @csrf
                @method('DELETE')
                <div class="modal-body">
                    {{ $recruit->title }}を削除します。よろしいですか？
                </div>
<<<<<<< HEAD
                <div class="">
=======
                <div class="modal-footer justify-content-between">
>>>>>>> origin/feature/recruit-form
                    <a class="btn btn-outline-grey" data-dismiss="modal">キャンセル</a>
                    <button type="submit" class="btn btn-danger">削除する</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- modal -->
@endif
</div>
<<<<<<< HEAD

@dump($recruit);
=======
>>>>>>> origin/feature/recruit-form
