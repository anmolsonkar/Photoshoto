<ul>
    <div class="sm:py-8 md:py-8 py-10">
        @foreach ($images as $user)
        <div class="max-w-lg p-2  py-7 mx-auto sm:px-6 lg:px-8">
            <div class="rounded overflow-hidden shadow-xl ">
                <div class="rounded bg-white  max-w-md mx-auto overflow-hidden shadow-xl">
                    <header class=" flex pt-1 pb-0 mb-0  pr-3 pl-3 my-3">
                        @foreach ($mains as $main)

                        @if($user->user_id == $main->id)

                        <span class="hidden"> {{ $data='id='.base64_encode($user->user_id) }}</span>

                        <a @if ($main->id==Auth::user()->id)
                            href="{{ route('home.index') }}"
                            @else
                            href="{{ route('other.index',$data) }}"

                            @endif
                            >
                            <img class="cursor-pointer w-10 h-10 m-1 mr-3 float-left rounded-full"
                                src="{{ $main->profile_photo_url }}" /></a>

                        <a @if ($main->id==Auth::user()->id)
                            href="{{ route('home.index') }}"
                            @else
                            href="{{ route('other.index',$data) }}"

                            @endif
                            class="cursor-pointer my-auto text-lg font-bold">
                            {{ 
                            $main->name 
                         }}
                            @endif
                            @endforeach
                        </a>
                        <p class="my-auto mr-2 mx-auto text-sm text-gray-600">

                            {{ $user->created_at->diffForHumans()}}

                        </p>
                        @if ($user->user_id==Auth::user()->id)
                        <p>
                            <x-jet-dropdown>
                                <x-slot name="trigger">
                                    <i class="ml-2 mt-4 cursor-pointer text-gray-600 fa fa-ellipsis-v"
                                        aria-hidden="true"></i></x-slot>
                                <x-slot name="content">
                                    <x-jet-dropdown-link class="cursor-pointer">
                                        {{ __('Edit') }}
                                    </x-jet-dropdown-link>

                                    <x-jet-dropdown-link class="cursor-pointer"
                                        wire:click="ConfirmDelete({{ $user->id }})">
                                        {{ __('Delete') }}
                                    </x-jet-dropdown-link>
                                </x-slot>
                            </x-jet-dropdown>
                        </p>
                        @endif

                    </header>
                    <hr class="w-full mb-3 mt-1">
                    <div class="flex p-3  justify-start">
                        <h1 class="text-gray-600 break-word">{{ $user->about }}</h1>
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
        @endforeach
    </div>
    <div class="flex justify-center">
        <h1 wire:loading>
            <img src="storage/svg/Loadmore.svg" class="w-12 opacity-50" alt="Loading...">
        </h1>
    </div>
</ul>


<script type="text/javascript">
    window.onscroll = function(ev) {
        if ((window.innerHeight + window.scrollY) >= document.body.offsetHeight) {
            window.livewire.emit('load-more');
        }
    };
</script>


<script>
    window.addEventListener('swal:confirm',event=>{
        Swal.fire({
  title: 'Are you sure?',
  text: "You won't be able to revert this!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, delete it!'
}).then((result) => {
  if (result.isConfirmed) {
    Swal.fire(
      'Deleted!',
      'Your post has been deleted.',
      'success'
    )
    window.livewire.emit('Delete',event.detail.id);
  }
})
    })
</script>