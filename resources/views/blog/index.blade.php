<x-layout title="Blog">
    <div class="divide-y divide-gray-200">
        <div class="pt-6 pb-8 space-y-2 md:space-y-5">
            <h1 class="text-3xl leading-9 font-extrabold text-gray-900 tracking-tight sm:text-4xl sm:leading-10 md:text-6xl md:leading-14">
                Blog
            </h1>

            <p class="text-lg leading-7 text-gray-500">All the latest Ghost news and deep dives, straight from the team.</p>
        </div>

        <ul class="divide-y divide-gray-200">
            @foreach ($posts as $months)
                @foreach ($months as $posts)
                    @foreach($posts as $post)
                        {{-- @dump($post) --}}
                        <li class="py-12">
                            <article class="space-y-2 xl:grid xl:grid-cols-4 xl:space-y-0 xl:items-baseline">
                                <dl>
                                    <dt class="sr-only">Published on</dt>
                                    <dd class="text-base leading-6 font-medium text-gray-500">
                                        {{ $post->date->format("F d, Y") }}
                                    </dd>
                                </dl>

                                <div class="space-y-5 xl:col-span-3">
                                    <div class="space-y-6">
                                        <h2 class="text-2xl leading-8 font-bold tracking-tight">
                                            <a href="{{ $post->url }}" class="text-gray-900">{{ $post->title }}</a>
                                        </h2>

                                        <div class="prose max-w-none text-gray-500">
                                            {!! $post->excerpt !!}
                                        </div>
                                    </div>

                                    <div class="text-base leading-6 font-medium">
                                        <a class="text-indigo-500 hover:text-indigo-600" href="{{ $post->url }}">Read more →</a>
                                    </div>
                                </div>
                            </article>
                        </li>
                    @endforeach
                @endforeach
            @endforeach
        </ul>
    </div>
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
            </div>
        </div>

        <div class="relative px-4 sm:px-6 lg:px-8">
            <div class="text-lg max-w-prose mx-auto mb-6">
                <h1 class="mt-2 mb-8 text-4xl text-center leading-tight font-extrabold tracking-tight text-gray-900 sm:text-5xl">
                    Blog
                </h1>
            </div>

            <div class="prose text-gray-700 mx-auto">
                @foreach ($posts as $year => $months)
                    @foreach ($months as $month => $posts)
                        @php
                            $date = DateTime::createFromFormat('!m', $month);
                            $month = $date->format('F');
                        @endphp

                        <div class="text-lg mb-1">{{ $month }} {{ $year }}</div>
                        <div class="mb-10">
                            @foreach ($posts as $post)
                                <div class="flex justify-between items-end leading-tight">
                                    <a href="{{ $post->url }}">{{ $post->title }}</a>
                                    <div class="border-b border-dotted mx-2 flex-1"></div>
                                    <span>{{ $post->day }}</span>
                                </div>
                            @endforeach
                        </div>
                    @endforeach
                @endforeach
            </div>
        </div>
    </div> --}}
</x-layout>