<x-app>
<x-slot name="title">
    募集作成
</x-slot>
    <div class="container">
        {{-- mx 効かない --}}
        <div class="content flex flex-col mx-2">
            <form action="{{ route('recruits.store', $recruit) }}" method="POST" enctype="multipart/form-data">
                <h2 class="font-bold text-xl text-yellow-300 mb-10">募集作成フォーム</h2>
                @include('recruits.form')
                <button type="submit" class="bg-pink-500 hover:bg-pink-700 text-white text-xl font-medium ml-30 mx-6 my-8 px-6 py-2 rounded-full">募集する</button>
<br>
<br>
<br>
            </form>
        </div>
    </div>
</x-app>
