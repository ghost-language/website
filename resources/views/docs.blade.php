<x-layout title="{{ $title }}" canonical="{{ $canonical }}">
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 pt-8 lg:gap-6">
        <div class="hidden lg:block lg:col-span-3 sidebar">
            {!! $index !!}
        </div>

        <div class="lg:col-span-9">
            <div class="text-lg mb-6">
                <h1 class="mt-2 mb-8 text-4xl leading-tight font-extrabold tracking-tight text-gray-900 sm:text-5xl">{{ $title }}</h1>
            </div>

            <div class="prose text-gray-700">
                {!! $content !!}
            </div>
        </div>
    </div>
</x-layout>