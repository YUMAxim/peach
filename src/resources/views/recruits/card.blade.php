<div class="card-body d-flex flex-row">
    <div class="">
        <!-- component -->
        <a href="{{ route('recruits.show', ['recruit' => $recruit]) }}"
            class="w-[30rem] border-2 border-b-4 border-gray-200 rounded-xl hover:bg-gray-50">
            <div class="mt-5 flex flex-col gap-4 items-center justify-center bg-white">
                <!-- Card 2 -->

                <div class="grid grid-cols-6 p-5 gap-y-2">

                    <!-- Profile Picture -->
                    <div>
                        <img src="https://picsum.photos/seed/2/200/200" class="max-w-16 max-h-16 rounded-full" />
                    </div>

                    <!-- Description -->
                    <div class="col-span-5 md:col-span-4 ml-4">

                        <a href="{{ route('users.show', ['name' => $recruit->user->name]) }}">
                            <div class="container">
                                <p class="text-gray-600 font-bold"> {{ $recruit->user->name }} </p>
                        </a>
                    </div>

                    <p class="text-gray-600 font-bold"> {{ $recruit->title }} </p>

                    <p class="text-gray-600 font-bold text-xs"> {!! nl2br(e($recruit->body)) !!} </p>

                    <p class="text-gray-500">
                        {{ $recruit->recruits_role }} </p>

                    {{-- <p class="text-gray-500"> {{ $recruit->category }} </p> --}}

                    <p class="text-gray-500"> {{ $recruit->application_deadline }} </p>

                </div>

                <!-- Price -->
                <div class="flex col-start-2 ml-4 md:col-start-auto md:ml-0 md:justify-end">
                    <p class="rounded-lg text-sky-500 font-bold bg-sky-100  py-1 px-3 text-sm w-fit h-fit">
                        {{ $recruit->budget }}円
                    </p>
                </div>
            </div>
        </a>

    </div>

    @if (Auth::id() === $recruit->user_id)
        <!-- dropdown -->
                <div class="">
                    <a class="" href="{{ route('recruits.edit', ['recruit' => $recruit]) }}">
                        <i class=""></i>記事を更新する
                    </a>
                    <a class="" data-toggle="modal"
                        data-target="#modal-delete-{{ $recruit->id }}">
                        <i class=""></i>記事を削除する
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
                        <div class="modal-footer justify-content-between">
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
</div>
