<div class="p-1.5 hidden md:block mr-3">
    <form>
        <div class="pt-2 relative mx-auto text-gray-600">
            <x-jet-input id="Search"
                class="border-2 border-gray-300 bg-white h-10 px-7 pr-16 rounded-lg text-sm hover:shadow" type="search"
                wire:model.debounce.300ms="search" placeholder="Search" />
            <i class="fa fa-search text-sm my-auto absolute text-gray-400 left-0 p-2.5 focus:outline-none"
                aria-hidden="true" wire:target="search" wire:loading.remove></i>

            <h1 >
                <img src="{{ URL::to('/') }}/storage/svg/Search.svg" wire:target="search" wire:loading class="w-8 absolute left-0 -mt-9 " alt="Loading...">
            </h1>
        </div>
        <div class="fixed text-sm bg-white text-gray-600 rounded w-64 mt-4">
            <ul class=" shadow-md rounded">
                @foreach ($results as $result)
                <li class="p-1">
                    <span class="hidden"> {{ $data='id='.base64_encode($result->id) }}</span>
                    <div class="p-1 rounded-md hover:bg-gray-100 active:bg-white">
                        <a @if ($result->id==Auth::user()->id)
                            href="{{ route('home.index') }}"
                            @else
                            href="{{ route('other.index',$data) }}"
                            @endif
                            >

                            <img class="cursor-pointer w-10 h-10 m-1 mr-3 float-left rounded-full"
                                src="{{ $result->profile_photo_url }}" />

                            <p class="block px-3 py-3">{{$result->name}}</p>
                            </p>
                        </a>
                    </div>
                </li>
                @endforeach
            </ul>
        </div>
    </form>
</div>

<style>
    #Search::-webkit-search-cancel-button {
        position: absolute;
        right: 20px;
        cursor: pointer;
    }
</style>