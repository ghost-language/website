@extends('layouts.default')

@section('content')
    <div class="lg:text-center">
        <h3 class="mt-2 text-3xl leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl sm:leading-10">
            A small, class-based scripting language
        </h3>

        <p class="mt-4 max-w-2xl text-xl leading-7 text-gray-600 lg:mx-auto">
            Ghost is a cross-platform, object-oriented general programming language with an emphasis on compact, clean and legible syntax.
        </p>
    </div>

    <div class="mt-32">
        <ul class="list-none md:grid md:grid-cols-2 md:col-gap-8 md:row-gap-10">
            <li>
                <div class="flex">
                    <div class="flex-shrink-0">
                        <div class="flex items-center justify-center h-12 w-12 rounded-md bg-indigo-500 text-white">
                            <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"/>
                            </svg>
                        </div>
                    </div>
                    <div class="ml-4">
                        <h4 class="mb-1 text-lg py-0 leading-6 font-medium text-gray-900">
                            Embeddable
                        </h4>
                        <p class="pt-0 text-base leading-6 text-gray-600">
                            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Maiores impedit perferendis suscipit eaque, iste dolor cupiditate blanditiis ratione.
                        </p>
                    </div>
                </div>
            </li>

            <li class="mt-10 md:mt-0">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <div class="flex items-center justify-center h-12 w-12 rounded-md bg-indigo-500 text-white">
                            <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"/>
                            </svg>
                        </div>
                    </div>
                    <div class="ml-4">
                        <h4 class="mb-1 text-lg py-0 leading-6 font-medium text-gray-900">
                            Game Development
                        </h4>
                        <p class="pt-0 text-base leading-6 text-gray-600">
                            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Maiores impedit perferendis suscipit eaque, iste dolor cupiditate blanditiis ratione.
                        </p>
                    </div>
                </div>
            </li>

            <li class="mt-10 md:mt-0">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <div class="flex items-center justify-center h-12 w-12 rounded-md bg-indigo-500 text-white">
                            <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"/>
                            </svg>
                        </div>
                    </div>
                    <div class="ml-4">
                        <h4 class="mb-1 text-lg py-0 leading-6 font-medium text-gray-900">
                            Machine Learning
                        </h4>
                        <p class="pt-0 text-base leading-6 text-gray-600">
                            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Maiores impedit perferendis suscipit eaque, iste dolor cupiditate blanditiis ratione.
                        </p>
                    </div>
                </div>
            </li>

            <li class="mt-10 md:mt-0">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <div class="flex items-center justify-center h-12 w-12 rounded-md bg-indigo-500 text-white">
                            <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"/>
                            </svg>
                        </div>
                    </div>
                    <div class="ml-4">
                        <h4 class="mb-1 text-lg py-0 leading-6 font-medium text-gray-900">
                            Scripting
                        </h4>
                        <p class="pt-0 text-base leading-6 text-gray-600">
                            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Maiores impedit perferendis suscipit eaque, iste dolor cupiditate blanditiis ratione.
                        </p>
                    </div>
                </div>
            </li>
        </ul>
    </div>
@endsection