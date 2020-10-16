<div class="banner">
    <div class="banner__container">
        <div>
            <button @click="isOpen = true" type="button" class="lg:hidden inline-flex items-center justify-center text-gray-400 hover:text-white focus:outline-none focus:text-white transition duration-150 ease-in-out">
                <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
            </button>
        </div>

        <span class="leading-none">
            {{ LATEST_VERSION }}
        </span>
    </div>
</div>

<div class="header">
    <div class="header__container">
        <div class="flex items-center">
            <a href="/">
                <img class="logo" src="/img/ghost-logo-black.svg" alt="Ghost">
            </a>


        </div>

        {{-- <button>toggle</button> --}}


        <nav class="flex space-x-10">
            {{-- <div class="relative"> --}}
                <a href="/docs" class="text-base leading-6 font-medium">
                    Documentation
                </a>

                <a href="/blog" class="text-base leading-6 font-medium">
                    Blog
                </a>
            {{-- </div> --}}
        </nav>
    </div>
</div>