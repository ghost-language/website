@extends('layouts.default')

@section('content')
    <div class="lg:text-center">
        <h3 class="mt-2 text-3xl leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl sm:leading-10">
            A small, class-based scripting language
        </h3>

        <p class="mt-4 max-w-2xl text-xl leading-7 text-gray-600 lg:mx-auto">
            Ghost is currently <b>under active development</b> with the following goals in mind.
        </p>
    </div>

    <div class="mt-32">
        <ul class="list-none md:grid md:grid-cols-2 md:col-gap-8 md:row-gap-10">
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

            <li class="mt-10 md:mt-0">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <div class="flex items-center justify-center h-12 w-12 rounded-md bg-indigo-500 text-white">
                            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M11.3 1.046A1 1 0 0112 2v5h4a1 1 0 01.82 1.573l-7 10A1 1 0 018 18v-5H4a1 1 0 01-.82-1.573l7-10a1 1 0 011.12-.38z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                    </div>
                    <div class="ml-4">
                        <h4 class="mb-1 text-lg py-0 leading-6 font-medium text-gray-900">
                            Fast
                        </h4>
                        <p class="pt-0 text-base leading-6 text-gray-600">
                            Ghost's underlying implementation is written in Go utilizing a bytecode compiler.
                        </p>
                    </div>
                </div>
            </li>

            <li class="mt-10 md:mt-0">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <div class="flex items-center justify-center h-12 w-12 rounded-md bg-indigo-500 text-white">
                            {{-- <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 20 20"><path d="M9 4.804A7.968 7.968 0 005.5 4c-1.255 0-2.443.29-3.5.804v10A7.969 7.969 0 015.5 14c1.669 0 3.218.51 4.5 1.385A7.962 7.962 0 0114.5 14c1.255 0 2.443.29 3.5.804v-10A7.968 7.968 0 0014.5 4c-1.255 0-2.443.29-3.5.804V12a1 1 0 11-2 0V4.804z"></path></svg> --}}
                            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M3 3a1 1 0 011-1h12a1 1 0 011 1v3a1 1 0 01-.293.707L12 11.414V15a1 1 0 01-.293.707l-2 2A1 1 0 018 17v-5.586L3.293 6.707A1 1 0 013 6V3z" clip-rule="evenodd"></path></svg>
                        </div>
                    </div>
                    <div class="ml-4">
                        <h4 class="mb-1 text-lg py-0 leading-6 font-medium text-gray-900">
                            Small
                        </h4>
                        <p class="pt-0 text-base leading-6 text-gray-600">
                            Relies on no outside dependencies, making Ghost portable and great for constrained devices.
                        </p>
                    </div>
                </div>
            </li>

            <li class="mt-10 md:mt-0">
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
@endsection