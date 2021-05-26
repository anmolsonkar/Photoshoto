<div class="max-w-7xl mx-auto shadow">
    <div class="grid  justify-items-center relative">
        <span class="hidden">{{ $data=request()->get('id') }}</span>
        <img src="storage/svg/Cover.webp" class="lg:rounded shadow-xl object-cover h-64 w-full" alt="cover">
        @foreach ($users as $user)
        @if ($user->user_id==base64_decode($data))
        <img src="storage/{{ $user->cover }}" class=" absolute lg:rounded shadow-xl object-cover h-64 w-full"
            alt="cover">
        @endif
        @endforeach

        @foreach ($mains as $main)
        @if ($main->id==base64_decode($data))
        <div class="absolute py-44 text-center">
            <img class="h-28 w-28 rounded-full object-cover  shadow-xl " src="{{ $main->profile_photo_url }}"
                alt="{{ $main->name }}" />
            <h3 class="my-2 text-lg font-bold">{{  $main->name}}</h3>
        </div>
        @endif
        @endforeach
    </div>
</div>