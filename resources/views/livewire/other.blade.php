<ul>
    @foreach ($users as $user)
    <span class="hidden">{{ $data=request()->get('id') }}</span>
    @if ($user->user_id==base64_decode($data))
    <div class="my-10">
        <div class="max-w-lg p-2 mx-auto sm:px-6 lg:px-8 ">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="rounded bg-white shadow max-w-md mx-auto">
                    <header class=" flex pt-1 pb-0 mb-0  pr-3 pl-3 my-3">
                        @foreach ($mains as $main)
                        @if($user->user_id == $main->id)
                        <a>
                            <img class="cursor-pointer w-10 h-10 m-1 mr-3 float-left rounded-full"
                                src="{{ $main->profile_photo_url }}" /></a>
                        <a class="cursor-pointer my-auto text-lg font-bold">
                            {{ 
                                $main->name 
                             }}
                            @endif
                            @endforeach
                        </a>
                        <p class="my-auto mr-2 mx-auto text-sm text-gray-600">

                            {{ $user->created_at->diffForHumans()}}

                        </p>

                    </header>
                    <hr class="w-full mb-3 mt-1">
                    <div class="flex p-3  justify-start">
                        <h1 class="text-gray-600">{{ $user->about }}</h1>
                    </div>
                    <div class="flex justify-between">

                        <section class="grid justify-items-start my-auto p-2">
                            <img src="storage/{{ $user->Photo1 }}" class="rounded" />

                        </section>
                        <h1 class="my-auto text-lg font-bold text-gray-600">vs</h1>
                        <section class="p-2 my-auto">
                            <img src="storage/{{ $user->Photo2 }}" class="rounded" />
                        </section>
                    </div>
                    <footer class="flex justify-around p-2 pb-3">
                        <p class="text-center text-sm text-gray-600">
                            {{ $user->name1 }}
                        </p>
                        <p class="text-center text-sm text-gray-600">
                            {{ $user->name2 }}
                        </p>
                    </footer>
                    <hr class="w-full mb-2 ">

                    <footer class="flex justify-around p-2 pb-3 pt-0">
                        <a class="cursor-pointer uppercase font-bold text-sm  hover:no-underline mr-3">Like</a>
                        <a class="cursor-pointer uppercase font-bold text-sm  hover:no-underline mr-3">Comments</a>
                        <a class="cursor-pointer uppercase font-bold text-sm  hover:no-underline mr-3">Like</a>
                    </footer>

                </div>
            </div>
        </div>
    </div>
    @endif
    @endforeach
</ul>