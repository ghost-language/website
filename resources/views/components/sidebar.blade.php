<div class="lg:hidden" x-show="isOpen">
    <div class="fixed inset-0 flex z-40">

        {{-- Off-canvas menu overlay --}}
        <div
            class="fixed inset-0"
            {{-- x-transition:enter="transition-opacity ease-linear duration-300"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100"
            x-transition:leave="transition-opacity ease-linear duration-300"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0" --}}
        >
            <div class="absolute inset-0 bg-gray-900 opacity-75"></div>
        </div>

        {{-- Off-canvas menu --}}
        <div
            class="relative flex-1 flex flex-col max-w-xs w-full bg-white"
            x-transition:enter="transition ease-in-out duration-300 transform"
            x-transition:enter-start="-translate-x-full"
            x-transition:enter-end="translate-x-0"
            x-transition:leave="transition ease-in-out duration-300 transform"
            x-transition:leave-start="translate-x-0"
            x-transition:leave-end="translate-x-full"
        >
            <div class="absolute top-0 right-0 -mr-14 p-1">
                <button @click="isOpen = false" class="flex items-center justify-center h-12 w-12 rounded-full focus:outline-none focus:bg-gray-600" aria-label="Close sidebar">
                    <svg class="h-6 w-6 text-white" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <div class="flex-1 h-0 pt-5 pb-4 overflow-y-auto">
                <div class="flex-shrink-0 flex items-center px-4">
                    <img class="logo" src="/img/ghost-logo-black.svg" alt="Ghost">
                </div>

                <nav class="mt-10 px-4">
                    <div class="sidebar">
                        {!! $index !!}
                    </div>
                </nav>
            </div>
        </div>
    </div>

    {{-- <div class="flex-shrink-0 w-14">
        </div> --}}
</div>