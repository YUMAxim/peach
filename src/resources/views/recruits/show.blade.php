@php
use Illuminate\Support\Carbon;
use App\Models\RolesCategory;
@endphp
<x-app>
    <x-slot name="title">個別募集</x-slot>
    <div class="container">
        <x-nav></x-nav>
        @if ($errors->any())
            <div class="bg-pink-200 rounded-lg">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        {{-- mx 効かない --}}
        <!-- component -->
        @php
            $fileName = $recruit->file_name;
            $filePath = $recruit->file_path;
            $filePath = ltrim($filePath, '/public');
            $str = ltrim('abcdefabc', 'abc');
            dump($fileName, $filePath, $str);
        @endphp
        <img src="{{ asset('storage/' . $filePath) }}">
        @if ($fileName)
            <div>
                <div>添付ファイル</div>
                <a href="{{ route('download', ['recruit' => $recruit]) }}" class="text-lg">ダウンロード</a>
            </div>
        @endif
        <div class="mt-5 flex flex-col gap-4 items-center justify-center bg-white">
            <!-- Card -->
            <div class="w-[30rem] border-2 border-b-4 border-gray-200 rounded-xl hover:bg-gray-50">

                <div class="grid grid-cols-6 p-5 gap-y-2">

                    <!-- Profile Picture -->
                    <div>
                        <img src="https://picsum.photos/seed/1/100/100" class="max-w-16 max-h-16 rounded-full" />
                    </div>

                    <!-- Description -->
                    <div class="col-span-5 md:col-span-4 ml-4">

                        <div class="text-gray-600 font-bold"> {{ $recruit->title }} </div>

                        <div class="text-gray-600 font-bold text-xs"> {!! nl2br(e($recruit->body)) !!} </div>

                        <div class="flex flex-row">
                            <div>カテゴリー</div>
                            <div>{{ $bookCategory }}</div>
                        </div>

                        <div>
                            @foreach ($recruitRoles as $recruitsRole)
                                @if ($recruitsRole['roles'])
                                    <div class="flex flex-col">
                                        <div class="font-bold">{{ $recruitsRole['name'] }}</div>
                                        @foreach ($recruitsRole['roles'] as $role)
                                            <div class="flex flex-row">
                                                <div>{{ $role['role']['name'] }}</div>
                                                <div>{{ $role['reward'] }}円</div>
                                            </div>
                                        @endforeach
                                    </div>
                                @endif
                            @endforeach
                        </div>
                        {{-- @dump($recruitRoles); --}}

                        <div class="flex flex-row">
                            <div>予算</div>
                            <div>{{ $recruit->budget }} 円</div>
                        </div>

                        @php
                            $applicationDeadline = $recruit->application_deadline;
                            $totalLeftHours = Carbon::now()->diffInHours($applicationDeadline);
                            $daysLeft = floor($totalLeftHours / 24);
                            $hoursLeft = $totalLeftHours - 24 * $daysLeft;
                            $minutesLeft = Carbon::now()
                                ->subMinute()
                                ->diffInMinutes($applicationDeadline);
                            $timeOut = Carbon::now()->greaterThan($applicationDeadline);
                        @endphp
                        <div class="flex flex-row">
                            @if (!$timeOut)
                                <div>残り時間：</div>
                                <div>
                                    @if ($daysLeft != 0)
                                        {{ $daysLeft }}日
                                    @endif
                                    @if ($hoursLeft != 0)
                                        {{ $hoursLeft }}時間
                                    @endif
                                    @if ($daysLeft == 0 && $hoursLeft == 0 && $minutesLeft != 0 && !$timeOut)
                                        {{ $minutesLeft }}分
                                    @endif
                                </div>
                            @else
                                <div>
                                    募集終了
                                </div>
                                @dump($daysLeft, $hoursLeft, $minutesLeft, $timeOut)
                            @endif
                        </div>
                        now:{{ Carbon::now() }}<br>
                        apd: {{ $applicationDeadline }}

                        <div class="flex flex-row text-gray-500">
                            <div>募集締切</div>
                            <div>{{ $applicationDeadline->format('Y/m/d') }}</div>
                        </div>

                        <div class="flex flex-row text-gray-500">
                            <div>完成希望日</div>
                            <div>{{ $recruit->deadline->format('Y/m/d') }}</div>
                        </div>

                        <div class="recruit-control">
                            <a href="{{ route('recruits.edit', $recruit) }}">編集</a>
                            <form action="{{ route('recruits.destroy', $recruit) }}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit">削除</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @php
                // $alreadyOffer =
            @endphp
            @if ($timeOut)
                募集が締め切られました
            @elseif (null)
                <a href="">
                    <div>提案済み</div>
                </a>
            @else
                <a href="{{ route('offers.create', ['recruit' => $recruit]) }}">
                    <div>提案する</div>
                </a>
            @endif

            @if ($recruit->user_id === \Auth::id())
                <a href="{{ route('contract.create', ['recruit' => $recruit]) }}">契約者を決める</a>
            @endif

        </div>

        <div>
            <div class="flex flex-row">
                <h3 class="text-lg mr-5">応募者一覧</h3>
                <div class="text-lg">計{{ count($offers) }}人</div>
            </div>
            <div class="flex flex-row">
                <div class="mr-5">応募者</div>
                <div>応募日時</div>
            </div>
            <div class="flex flex-col">
                @foreach ($offers as $offer)
                    <div class="flex flex-row">
                        {{-- <div>icon</div> --}}
                        <div class="mr-5">{{ $offer->user->name }}</div>
                        <div>
                            {{ $offer->created_at->format('Y/m/d G:i') }}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        @dump($recruit)
</x-app>
