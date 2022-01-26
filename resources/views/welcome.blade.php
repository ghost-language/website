<x-layout>
    <div class="space-y-10">
        <div class="relative lg:grid lg:grid-cols-2 lg:gap-16 lg:items-center">
            <div class="relative">
                <h3 class="border-0 text-3xl mt-2 leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl sm:leading-10 p-0">
                    A small, class-based programming language that's a joy to use.
                </h3>

                <ul class="mt-10 p-0 list-none">
                    <li>
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <div class="flex items-center justify-center h-12 w-12 rounded-md bg-indigo-500 text-white">
                                    <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M6 2a2 2 0 00-2 2v12a2 2 0 002 2h8a2 2 0 002-2V7.414A2 2 0 0015.414 6L12 2.586A2 2 0 0010.586 2H6zm5 6a1 1 0 10-2 0v3.586l-1.293-1.293a1 1 0 10-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L11 11.586V8z" clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                            </div>
                            <div class="ml-4">
                                <h4 class="mb-1 text-lg py-0 leading-6 font-medium text-gray-900">
                                    Embeddable
                                </h4>
                                <p class="pt-0 text-base leading-6 text-gray-600">
                                    Extend and build applications in Go utilizing Ghost as your scripting language.
                                </p>
                            </div>
                        </div>
                    </li>

                    <li class="mt-10">
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <div class="flex items-center justify-center h-12 w-12 rounded-md bg-indigo-500 text-white">
                                    <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M3 3a1 1 0 011-1h12a1 1 0 011 1v3a1 1 0 01-.293.707L12 11.414V15a1 1 0 01-.293.707l-2 2A1 1 0 018 17v-5.586L3.293 6.707A1 1 0 013 6V3z" clip-rule="evenodd"></path></svg>
                                </div>
                            </div>
                            <div class="ml-4">
                                <h4 class="mb-1 text-lg py-0 leading-6 font-medium text-gray-900">
                                    Small
                                </h4>
                                <p class="pt-0 text-base leading-6 text-gray-600">
                                    Ghost maintains a small footprint (less than 10 MB), making it portable and great for single-board computers.
                                </p>
                            </div>
                        </div>
                    </li>

                    <li class="mt-10">
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <div class="flex items-center justify-center h-12 w-12 rounded-md bg-indigo-500 text-white">
                                    <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 20 20"><path d="M9 4.804A7.968 7.968 0 005.5 4c-1.255 0-2.443.29-3.5.804v10A7.969 7.969 0 015.5 14c1.669 0 3.218.51 4.5 1.385A7.962 7.962 0 0114.5 14c1.255 0 2.443.29 3.5.804v-10A7.968 7.968 0 0014.5 4c-1.255 0-2.443.29-3.5.804V12a1 1 0 11-2 0V4.804z"></path></svg>
                                </div>
                            </div>
                            <div class="ml-4">
                                <h4 class="mb-1 text-lg py-0 leading-6 font-medium text-gray-900">
                                    Class-based
                                </h4>
                                <p class="pt-0 text-base leading-6 text-gray-600">
                                    Ghost places classes front and center, fully embracing object-oriented programming.
                                </p>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>

            <div class="mt-10 relative lg:mt-0">
                <pre class="relative mx-auto language-dart rounded shadow"><code>class CoffeeMaker {
    function constructor(coffee) {
        this.coffee = coffee
    }

    function brew() {
        print('Enjoy your cup of %s'.format(this.coffee))
    }
}

maker := CoffeeMaker.new('espresso')

maker.brew()</code></pre>

                <pre class="relative mx-auto bg-gray-800 text-gray-200 p-6 rounded shadow">>>> Enjoy your cup of espresso</pre>
            </div>
        </div>

        <div class="bg-gray-900 rounded">
            <div class="max-w-7xl mx-auto text-center py-12 px-4 sm:px-6 lg:py-16 lg:px-8">
                <h2 class="text-3xl font-extrabold tracking-tight text-gray-100 sm:text-4xl">
                    <span class="block">Ready to dive in?</span>
                    <span class="block">Get started with our documentation.</span>
                </h2>

                <div class="mt-8 flex justify-center">
                    <div class="inline-flex rounded-md shadow">
                        <a href="/docs/nightly/getting-started" class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700">
                            Get started
                        </a>
                    </div>

                    <div class="ml-3 inline-flex">
                        <a href="/docs/nightly/syntax" class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-indigo-700 bg-indigo-100 hover:bg-indigo-200">
                            Learn more
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div>
            <h2 class="text-2xl tracking-tight font-extrabold text-gray-900 mt-10 mb-8">Get Involved</h2>

            <ul class="grid sm:grid-cols-2 gap-6 xl:gap-8">
                <li>
                    <a href="http://github.com/ghost-language" class="flex items-start space-x-4">
                        <svg fill="currentColor" class="flex-none text-gray-900 w-12 h-12"><rect width="48" height="48" rx="12"></rect><path d="M23.997 12a12 12 0 00-3.792 23.388c.6.12.816-.264.816-.576l-.012-2.04c-3.336.72-4.044-1.608-4.044-1.608-.552-1.392-1.332-1.764-1.332-1.764-1.08-.744.084-.72.084-.72 1.2.084 1.836 1.236 1.836 1.236 1.08 1.824 2.808 1.296 3.492.996.12-.78.42-1.308.756-1.608-2.664-.3-5.46-1.332-5.46-5.928 0-1.32.468-2.388 1.236-3.228a4.32 4.32 0 01.12-3.168s1.008-.324 3.3 1.224a11.496 11.496 0 016 0c2.292-1.56 3.3-1.224 3.3-1.224.66 1.644.24 2.88.12 3.168.768.84 1.236 1.92 1.236 3.228 0 4.608-2.808 5.616-5.484 5.916.432.372.816 1.104.816 2.22l-.012 3.3c0 .312.216.696.828.576A12 12 0 0023.997 12z" fill="currentColor" class="text-gray-50"></path></svg>
                        <div class="flex-auto">
                            <h3 class="font-bold text-gray-900">
                                GitHub
                            </h3>
                            <p class="text-gray-500">Clone, fork, review, download and contribute to Ghost's source code.</p>
                        </div>
                    </a>
                </li>

                <li>
                    <a href="/discord" class="flex items-start space-x-4">
                        <svg fill="currentColor" class="flex-none text-indigo-400 w-12 h-12"><rect width="48" height="48" rx="12"></rect><path d="M21.637 23.57c-.745 0-1.332.653-1.332 1.45 0 .797.6 1.45 1.332 1.45.744 0 1.332-.653 1.332-1.45.013-.797-.588-1.45-1.332-1.45zm4.767 0c-.744 0-1.332.653-1.332 1.45 0 .797.6 1.45 1.332 1.45.745 0 1.332-.653 1.332-1.45 0-.797-.587-1.45-1.332-1.45z" fill="currentColor" class="text-indigo-50"></path><path d="M32.75 12.613H15.248a2.684 2.684 0 00-2.678 2.69v17.66a2.684 2.684 0 002.678 2.69h14.811l-.692-2.416 1.672 1.554 1.58 1.463 2.809 2.482V15.304a2.684 2.684 0 00-2.678-2.69zm-5.042 17.058s-.47-.561-.862-1.058c1.711-.483 2.364-1.554 2.364-1.554-.535.353-1.045.6-1.502.77a8.591 8.591 0 01-1.894.562 9.151 9.151 0 01-3.383-.013 10.964 10.964 0 01-1.92-.561 7.652 7.652 0 01-.953-.445c-.04-.026-.078-.039-.117-.065-.027-.013-.04-.026-.053-.039-.235-.13-.365-.222-.365-.222s.627 1.045 2.285 1.541c-.392.497-.875 1.084-.875 1.084-2.886-.091-3.983-1.985-3.983-1.985 0-4.206 1.88-7.615 1.88-7.615C20.211 18.661 22 18.7 22 18.7l.131.157c-2.35.679-3.435 1.71-3.435 1.71s.287-.156.77-.378c1.398-.614 2.508-.784 2.965-.823.079-.013.144-.026.223-.026a10.647 10.647 0 016.57 1.228s-1.033-.98-3.253-1.66l.183-.208s1.79-.04 3.67 1.371c0 0 1.881 3.41 1.881 7.615 0 0-1.11 1.894-3.997 1.985z" fill="currentColor" class="text-indigo-50"></path></svg>
                        <div class="flex-auto">
                            <h3 class="font-bold text-gray-900">
                                Discord
                            </h3>
                            <p class="text-gray-500">Join our Discord group to chat with other Ghost developers. We're a small and friendly community!</p>
                        </div>
                    </a>
                </li>

                <li>
                    <a href="http://twitter.com/ghost___lang" class="flex items-start space-x-4">
                        <svg fill="currentColor" class="flex-none text-blue-400 w-12 h-12"><rect width="48" height="48" rx="12"></rect><path d="M37.127 15.989h-.001a11.04 11.04 0 01-3.093.836 5.336 5.336 0 002.37-2.932 10.815 10.815 0 01-3.421 1.284 5.42 5.42 0 00-3.933-1.679c-2.976 0-5.385 2.373-5.385 5.3-.003.406.044.812.138 1.207a15.351 15.351 0 01-11.102-5.54 5.235 5.235 0 00-.733 2.663c0 1.837.959 3.461 2.406 4.413a5.338 5.338 0 01-2.449-.662v.066c0 2.57 1.86 4.708 4.32 5.195a5.55 5.55 0 01-1.418.186c-.34 0-.68-.033-1.013-.099.684 2.106 2.676 3.637 5.034 3.68a10.918 10.918 0 01-6.69 2.269 11.21 11.21 0 01-1.285-.077 15.237 15.237 0 008.242 2.394c9.918 0 15.337-8.077 15.337-15.083 0-.23-.006-.459-.017-.683a10.864 10.864 0 002.686-2.746l.007.008z" fill="currentColor" class="text-blue-50"></path></svg>
                        <div class="flex-auto">
                            <h3 class="font-bold text-gray-900">
                                Twitter
                            </h3>
                            <p class="text-gray-500">Follow the Ghost Twitter account for news and updates.</p>
                        </div>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</x-layout>