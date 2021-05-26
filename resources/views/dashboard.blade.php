<x-app-layout>
    @livewireStyles
    <div class="py-14">
        @livewire('upload-file')
        @livewire('upload-file-mobile')
        @livewire('post')
    </div>
    @livewireScripts
</x-app-layout>