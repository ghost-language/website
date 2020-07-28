<x-layout title="Blog">
    <div class="relative pb-16 bg-white overflow-hidden">
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
                <h1 class="mt-2 mb-8 text-4xl text-center leading-8 font-extrabold tracking-tight text-gray-900 sm:text-5xl sm:leading-10">
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
    </div>
</x-layout>