            <!-- component -->
            <div class="mt-5 flex flex-col gap-4 items-center justify-center bg-white">
                <!-- Card -->
                <div class="w-[30rem] border-2 border-b-4 border-gray-200 rounded-xl hover:bg-gray-50">

                    <div class="grid grid-cols-6 p-5 gap-y-2">

                        <!-- Profile Picture -->
                        <div>
                            <img src="https://picsum.photos/seed/2/200/200" class="max-w-16 max-h-16 rounded-full" />
                        </div>

                        <!-- Description -->
                        <div class="col-span-5 md:col-span-4 ml-4">

                            <p class="text-gray-600 font-bold"> {{ $recruit->title }} </p>

                            <p class="text-gray-600 font-bold text-xs"> {!! nl2br(e($recruit->body)) !!} </p>

                            {{-- <p class="text-gray-500"> {{ $recruit->category }} </p> --}}

                            <p class="text-gray-500"> {{ $recruit->page }} </p>

                            <p class="text-gray-500"> {{ $recruit->booksize }} </p>

                            <p class="text-gray-500"> {{ $recruit->file_format }} </p>

                            <p class="text-gray-500"> {{ $recruit->my_role }} </p>

                            <p class="text-gray-500"> {{ $recruit->recruits_role }} </p>

                            <p class="text-gray-500"> {{ $recruit->desired_color_impression }} </p>

                            <p class="text-gray-500"> {{ $recruit->desired_content_impression }} </p>

                            <p class="text-gray-500"> {{ $recruit->budget }} </p>
                            {{-- <p class="text-gray-500"> {{ $recruit-> }} </p> --}}

                            <p class="text-gray-500"> {{ $recruit->application_deadline }} </p>

                            <p class="text-gray-500"> {{ $recruit->deadline }} </p>

                        </div>

                    </div>
                </div>
            </div>
