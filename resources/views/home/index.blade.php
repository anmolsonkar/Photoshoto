<x-app-layout>
    @livewireStyles
    <div class="py-12">
        @livewire('cover')
    </div>
    <div class="py-2 lg:py-8">
        @livewire('home')
    </div>
    @livewireScripts
</x-app-layout>