<div x-data="{open: false}" class="hidden sm:hidden md:block lg:block xl:block">

    <div class="rounded bg-white  max-w-md mx-auto overflow-hidden shadow-xl" x-on:click.prevent="open = true"
        class="cursor-pointer">
        <header class=" flex pt-1 pb-0 mb-0  pr-3 pl-3 my-1 cursor-pointer ">
            <a class="py-2">
                <img class="w-10 h-10 m-1 mr-3 float-left rounded-full" src="{{ Auth::user()->profile_photo_url }}"
                    alt="{{ Auth::user()->name }}" />
            </a>

            <a class="my-auto text-lg font-bold">
                {{ Auth::user()->name }}
            </a>
            <p class="my-auto mr-2 mx-auto text-sm text-gray-600">
                00:00:00
            </p>
            <p>
                <x-jet-dropdown>
                    <x-slot name="trigger">
                        <i class="ml-2 py-6 text-gray-600 fa fa-ellipsis-v" aria-hidden="true"></i>
                    </x-slot>
                    <x-slot name="content">
                        <x-jet-dropdown-link class="cursor-pointer">
                            {{ __('Edit') }}
                        </x-jet-dropdown-link>

                        <x-jet-dropdown-link class="cursor-pointer">
                            {{ __('Delete') }}
                        </x-jet-dropdown-link>
                    </x-slot>
                </x-jet-dropdown>
            </p>
        </header>
        <hr class="w-full mb-3 mt-1">
        <div class="flex p-3  justify-start cursor-pointer ">
            <h1 class="text-gray-600 w-full" id="element"></h1>
        </div>
        <div class="flex justify-between cursor-pointer -mt-3 ">
            <section class="grid justify-items-start my-auto p-2 pt-0">
                <img src="storage/svg/Placeholder.webp" class="rounded" alt="Image" />
            </section>
            <h1 class="my-auto text-lg font-bold text-gray-600">vs</h1>
            <section class="p-2 my-auto pt-0">
                <img src="storage/svg/Placeholder.webp" class="rounded" alt="Image" />
            </section>
        </div>
        <footer class="flex justify-around p-2 pb-3 cursor-pointer ">
            <p class="text-center -ml-2 text-sm text-gray-600">
                Name
            </p>
            <p class="text-center text-sm text-gray-600">
                Name
            </p>
        </footer>
        <hr class="w-full mb-2 ">
        <footer class="flex justify-around p-2 pb-3 pt-0 cursor-pointer ">
            <a class="uppercase font-bold text-sm  hover:no-underline mr-3">Like</a>
            <a class="uppercase font-bold text-sm  hover:no-underline mr-3">Comments</a>
            <a class="uppercase font-bold text-sm  hover:no-underline mr-3">Like</a>
        </footer>
    </div>

    <div x-show.transition="open" x-show.transition.opacity="open" x-on:click.away="open = false"
        class="w-full flex items-center inset-0 bg-black bg-opacity-75 z-50  fixed mx-auto justify-center" x-cloak>

        <div class="p-5 bg-white w-11/12 rounded mx-auto sm:px-6 lg:px-8 pr-7 overflow-hidden shadow-xl">
            <i x-on:click.prevent="open = false" class="cursor-pointer fa fa-times float-right text-gray-300 text-2xl"
                aria-hidden="true"></i>
            <form wire:submit.prevent="submit" class="mb-4">

                <div class="flex justify-around">
                    <div class="w-56 my-auto">
                        <section class="p-2 pt-0 ">
                            @if($Photo1)
                            <img src="{{ $Photo1->temporaryUrl() }}" class="object-contain h-48 w-full" />
                            @else
                            <img src="storage/svg/Placeholder.webp" class="mt-3  border-2 border-gray-300"
                                alt="Image" />
                            @endif
                        </section>
                        <div>
                            <input wire:model="Photo1" type="file"
                                class="opacity-0 cursor-pointer absolute mt-11 -ml-12 w-56" required autofocus>
                            <div class="flex flex-col space-y-2 items-center justify-center">

                                <i class="fas fa-cloud-upload-alt fa-2x text-gray-800" wire:target="Photo1"
                                    wire:loading.remove></i>
                                <h1 wire:target="Photo1" wire:loading>
                                    <img src="storage/svg/Loadingbar.svg" class="w-12" alt="Loading...">
                                </h1>
                                <x-jet-button class="cursor-pointer">
                                    Select a file
                                </x-jet-button>

                            </div>
                        </div>

                        <div class="pl-2 mt-2">
                            <x-jet-label for="name1" value="Name" />
                            <x-jet-input class="block mt-1  w-full" type="text" wire:model="name1" required autofocus />
                        </div>
                        <div class="text-sm mt-3 pl-3 mb-5 flex text-gray-600">
                            <div class="absolute">
                                @error('Photo1') <span class="error">{{ $message }}</span> @enderror
                            </div>
                            <div class="absolute mt-5">
                                @error('name1') <span class="error">{{ $message }}</span> @enderror
                            </div>
                        </div>

                    </div>

                    <div>
                        <h1 class="text-5xl text-gray-300 my-24">vs</h1>
                    </div>


                    <div class="w-56 my-auto">
                        <section class="p-2 pt-0">
                            @if($Photo2)
                            <img src="{{ $Photo2->temporaryUrl() }}" class="object-contain h-48 w-full rounded" />
                            @else
                            <img src="storage/svg/Placeholder.webp" class="mt-4 border-2 border-gray-300" alt="Image" />
                            @endif
                        </section>
                        <div>
                            <input wire:model="Photo2" type="file"
                                class="opacity-0 cursor-pointer absolute mt-11 -ml-12 w-56" required autofocus>
                            <div class="flex flex-col space-y-2 items-center justify-center">
                                <i class="fas fa-cloud-upload-alt fa-2x text-gray-800" wire:target="Photo2"
                                    wire:loading.remove></i>
                                <h1 wire:target="Photo2" wire:loading>
                                    <img src="storage/svg/Loadingbar.svg" class="w-12" alt="Loading...">
                                </h1>
                                <x-jet-button class="cursor-pointer">
                                    Select a file
                                </x-jet-button>

                            </div>
                        </div>

                        <div class="pl-2 mt-2">
                            <x-jet-label for="name2" value="Name" />
                            <x-jet-input class="block mt-1 w-full" type="text" wire:model="name2" required autofocus />
                        </div>
                        <div class="text-sm mt-3 pl-3  mb-5 flex text-gray-600">
                            <div class="absolute">
                                @error('Photo2') <span class="error">{{ $message }}</span> @enderror
                            </div>
                            <div class="absolute mt-5">
                                @error('name2') <span class="error">{{ $message }}</span> @enderror
                            </div>
                        </div>
                    </div>


                </div>

                <div class="text-sm mb-3 flex justify-center text-gray-600">
                    <div class="absolute">
                        @error('about') <span class="error">{{ $message }}</span> @enderror
                    </div>
                    <div class="absolute">
                        @if (session()->has('msg1'))
                        <div>
                            <script>
                                Swal.fire(
                                 'Good job!',
                                 'Post added succesfully!',
                                 'success'
                               )
                            </script>
                        </div>
                        @endif
                    </div>

                </div>
                <div class="flex pl-20 ">
                    <div class="flex w-full mt-3">
                        <textarea
                            class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm w-11/12 mx-auto"
                            Placeholder="Write something about it..." type="text" wire:model="about"></textarea>
                    </div>

                    <div>
                        <x-jet-button class="mt-8" type="submit" wire:target="submit" wire:loading.remove>Send
                        </x-jet-button>
                        <span wire:target="submit" wire:loading>
                            <img src="storage/svg/Loading.svg" class="w-12 mt-7 mr-6" alt="Loading...">
                        </span>
                    </div>

                </div>


            </form>

        </div>
    </div>
</div>

<script>
    new TypeIt("#element",{
    strings: "Write something about it...",
     speed: 75,
     loop: true
     }).go();
</script>