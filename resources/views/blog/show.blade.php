<x-layout title="Blog">

    <article class="xl:divide-y xl:divide-gray-200">
        <header class="pt-6 xl:pb-10">
            <div class="space-y-1 text-center">
                <dl class="space-y-10">
                    <div>
                        <dt class="sr-only">Published on</dt>
                        <dd class="text-base leading-6 font-medium text-gray-500">{{ $post->date->format('l, F d, Y') }}</dd>
                    </div>
                </dl>

                <div>
                    <h1 class="text-3xl leading-9 font-extrabold text-gray-900 tracking-tight sm:text-4xl sm:leading-10 md:text-5xl md:leading-14">{{ $post->title }}</h1>
                </div>
            </div>
        </header>

        <div class="divide-y xl:divide-y-0 divide-gray-200 xl:grid xl:grid-cols-4 xl:gap-x-6 pb-16 xl:pb-20" style="grid-template-rows: auto 1fr;">
            <dl class="pt-6 pb-10 xl:pt-11 xl:border-b xl:border-gray-200">
                <dt class="sr-only">Authors</dt>
                <dd>
                    <ul class="flex justify-center xl:block space-x-8 sm:space-x-12 xl:space-x-0 xl:space-y-8">
                        <li class="flex items-center space-x-2">
                            <img src="https://avatars.githubusercontent.com/u/355659?v=4" alt class="w-10 h-10 rounded-full border border-gray-200">
                            <dl class="text-sm font-medium leading-5 whitespace-no-wrap">
                                <dt class="sr-only">Name</dt>
                                <dd class="text-gray-900">Shea "Kai" Lewis</dd>
                                <dt class="sr-only">Twitter</dt>
                                <dd>
                                    <a href="https://twitter.com/kai___desu" class="text-indigo-500 hover:text-indigo-600">@kai___desu</a>
                                </dd>
                            </dl>
                        </li>
                    </ul>
                </dd>
            </dl>

            <div class="divide-y divide-gray-200 xl:pb-0 xl:col-span-3 xl:row-span-2">
                <div class="prose max-w-none pt-10 pb-8">
                    {!! $post->content !!}
                </div>
            </div>
        </div>
    </article>

    {{-- <div class="relative pb-16 bg-white overflow-hidden">
        <div class="hidden lg:block lg:absolute lg:inset-y-0 lg:h-full lg:w-full">
            <div class="relative h-full text-lg max-w-prose mx-auto">
                <svg class="absolute top-12 left-full transform translate-x-32" width="404" height="384" fill="none" viewBox="0 0 404 384">
                    <defs>
                        <pattern id="74b3fd99-0a6f-4271-bef2-e80eeafdf357" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse">
                            <rect x="0" y="0" width="4" height="4" class="text-gray-200" fill="currentColor" />
                        </pattern>
                    </defs>
                    <rect width="404" height="384" fill="url(#74b3fd99-0a6f-4271-bef2-e80eeafdf357)" />
                </svg>

                <svg class="absolute top-1/2 right-full transform -translate-y-1/2 -translate-x-32" width="404" height="384" fill="none" viewBox="0 0 404 384">
                    <defs>
                        <pattern id="f210dbf6-a58d-4871-961e-36d5016a0f49" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse">
                            <rect x="0" y="0" width="4" height="4" class="text-gray-200" fill="currentColor" />
                        </pattern>
                    </defs>
                    <rect width="404" height="384" fill="url(#f210dbf6-a58d-4871-961e-36d5016a0f49)" />
                </svg>
            </div>
        </div>

        <div class="relative px-4 sm:px-6 lg:px-8">
            <div class="text-lg max-w-prose mx-auto mb-6">
                <h1 class="mt-2 mb-8 text-4xl text-center leading-tight font-extrabold tracking-tight text-gray-900 sm:text-5xl">{{ $post->title }}</h1>
            </div>

            <div class="prose text-gray-700 mx-auto">
               {!! $post->content !!}
            </div>
        </div>
    </div> --}}
</x-layout>