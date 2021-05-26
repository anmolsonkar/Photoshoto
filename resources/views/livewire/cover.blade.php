<div class="max-w-7xl mx-auto shadow ">
    <div class="grid  justify-items-center relative">
        
        <div class="absolute">
            @if (session()->has('msg3'))
            <div>
                <script>
                    Swal.fire(
                     'Good job!',
                     'Cover added succesfully!',
                     'success'
                   )
                </script>
            </div>
            @endif
        </div>

        @if ($cover)
        <img src="{{ $cover->temporaryUrl() }}" class="lg:rounded shadow-xl object-cover h-64 w-full" alt="cover">
        @else
        <img src="storage/svg/Cover.webp" class="lg:rounded shadow-xl object-cover h-64 w-full" alt="cover">
        @endif

        @foreach ($users as $user)
        @if ($cover)
        <img src="{{ $cover->temporaryUrl() }}" class="absolute lg:rounded shadow-xl object-cover h-64 w-full"
            alt="cover">
        @elseif($user)
        <img src="storage/{{ $user->cover }}" class=" absolute lg:rounded shadow-xl object-cover h-64 w-full"
            alt="cover">
        @else
        @endif
        @endforeach

        <span class="absolute right-0 focus:outline-none ">
            <x-jet-dropdown>
                <x-slot name="trigger">
                    <i class=" p-2 cursor-pointer text-white fa fa-ellipsis-v" aria-hidden="true"></i>
                </x-slot>
                <x-slot name="content">

                    <x-jet-dropdown-link class="cursor-pointer"
                    wire:click="ConfirmDeleteCover({{ Auth::user()->id}})">
                    {{ __('Delete') }}
                </x-jet-dropdown-link>

                    <x-jet-dropdown-link class="cursor-pointer" wire:click="cupload({{  Auth::user()->id }})"
                        wire:loading.attr="disabled">
                        {{ __('New upload') }}
                    </x-jet-dropdown-link>
                </x-slot>
            </x-jet-dropdown>
        </span>

        <span class="absolute">

            <!-- Upload cover photo-->
            <form wire:submit.prevent="upload" class="mb-4">

                <x-jet-dialog-modal wire:model="uploadcover">
                    <x-slot name="title">
                        {{ __('Upload Cover') }}
                    </x-slot>

                    <x-slot name="content">
                        <div class="flex justify-center">
                            <input wire:model="cover" type="file"
                                class="opacity-0 cursor-pointer absolute py-10 focus:outline-none -ml-2" required
                                autofocus>
                            <div class="flex flex-col items-center justify-center">
                                <i class="fas fa-cloud-upload-alt fa-2x text-gray-800" wire:target="cover"
                                    wire:loading.remove></i>
                                <h1 wire:target="cover" wire:loading>
                                    <img src="storage/svg/Loadingbar.svg" class="w-12" alt="Loading...">
                                </h1>
                                <x-jet-button class="py-2 cursor-pointer">
                                    Select a file
                                </x-jet-button>

                            </div>
                        </div>
                        <div class="text-sm mt-5 pl-3 mb-5 flex text-gray-600">
                            <div class="absolute">
                                @error('cover') <span class="error">{{ $message }}</span> @enderror
                            </div>
                        </div>

                    </x-slot>
                    <x-slot name="footer">
                        <x-jet-secondary-button wire:click="$set('uploadcover',false)" wire:loading.attr="disabled">
                            {{ __('Cancel') }}
                        </x-jet-secondary-button>

                        <x-jet-button class="ml-2" type="upload" onclick="save()" wire:loading.attr="disabled">
                            {{ __('Save') }}
                        </x-jet-button>
                    </x-slot>
                </x-jet-dialog-modal>
            </form>
        </span>

        <div class="absolute py-44 text-center">
            <img class=" h-28 w-28 rounded-full object-cover  shadow-xl " src="{{ Auth::user()->profile_photo_url }}"
                alt="{{ Auth::user()->name }}" />
            <h3 class="my-2 text-lg font-bold">{{ Auth::user()->name }}</h3>
        </div>


    </div>

</div>

<script>
    window.addEventListener('swal:confirmcover',event=>{
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
      'Your cover has been deleted.',
      'success'
    )
    window.livewire.emit('DeleteCover',event.detail.id);
  }
})
    })
</script>