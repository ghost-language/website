<x-layout title="Roadmap">
    <div>
        <div class="pt-6 pb-8 space-y-2 md:space-y-5 border-b border-gray-200">
            <h1 class="text-3xl leading-9 font-extrabold text-gray-900 tracking-tight sm:text-4xl sm:leading-10 md:text-6xl md:leading-14">
                Roadmap
            </h1>

            <p class="text-lg leading-7 text-gray-500">Keep up to date on the progress towards a stable 1.0 release.</p>
        </div>

        <div class="flex items-center flex-1 flex-col pt-6 max-w-2xl mx-auto">
            <dl class="mb-10">
                <dt class="sr-only">Last updated</dt>
                <dd>
                    <ul class="flex justify-center xl:block space-x-8 sm:space-x-12 xl:space-x-0 xl:space-y-8">
                        <li class="flex items-center space-x-2">
                            <div class="mr-2 text-gray-500 border rounded border-gray-300 p-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                                </svg>
                            </div>

                            <dl class="text-sm font-medium leading-5 whitespace-no-wrap">
                                <dt class="sr-only">Label</dt>
                                <dd class="text-gray-900">Last Updated</dd>
                                <dt class="sr-only">Date</dt>
                                <dd>
                                    <span class="text-indigo-500">April 21, 2021</span>
                                </dd>
                            </dl>
                        </li>
                    </ul>
                </dd>
            </dl>


                <div class="mb-10 w-full">
                    <h3 class="text-center pb-2 text-lg font-extrabold uppercase tracking-wide">Literals</h3>
                    <div class="bg-white rounded-md border border-gray-200 divide-y divide-gray-200 -space-y-px">
                        <x-feature title="Booleans" complete />
                        <x-feature title="Lists" complete />
                        <x-feature title="Maps" complete />
                        <x-feature title="Null" complete />
                        <x-feature title="Numbers" complete />
                        <x-feature title="Strings" complete />
                    </div>
                </div>

                <div class="mb-10 w-full">
                    <h3 class="text-center pb-2 text-lg font-extrabold uppercase tracking-wide">Operators</h3>
                    <div class="bg-white rounded-md border border-gray-200 divide-y divide-gray-200 -space-y-px">
                        <x-feature title="Addition (+)" complete />
                        <x-feature title="Subtraction (-)" complete />
                        <x-feature title="Multiplication (*)" complete />
                        <x-feature title="Division (/)" complete />
                        <x-feature title="Modulo (%)" complete />
                        <x-feature title="Greater Then (>)" complete />
                        <x-feature title="Less Then (<)" complete />
                        <x-feature title="Greater Then or Equal (>=)" complete />
                        <x-feature title="Less Then or Equal (<=)" complete />
                        <x-feature title="Equals (==)" complete />
                        <x-feature title="Not Equals (!=)" complete />
                        <x-feature title="Assign (:=)" complete />
                        <x-feature title="Range (..)" complete />
                        <x-feature title="Logical And" complete />
                        <x-feature title="Logical Or" complete />
                        <x-feature title="Negation (-)" complete />
                    </div>
                </div>

                <div class="mb-10 w-full">
                    <h3 class="text-center pb-2 text-lg font-extrabold uppercase tracking-wide">Control Flow</h3>
                    <div class="bg-white rounded-md border border-gray-200 divide-y divide-gray-200 -space-y-px">
                        <x-feature title="Logical Operators" complete />
                        <x-feature title="If Statements" complete />
                        <x-feature title="While Statements" complete />
                        <x-feature title="For Statements" complete />
                    </div>
                </div>

                <div class="mb-10 w-full">
                    <h3 class="text-center pb-2 text-lg font-extrabold uppercase tracking-wide">Structures</h3>
                    <div class="bg-white rounded-md border border-gray-200 divide-y divide-gray-200 -space-y-px">
                        <x-feature title="Native Functions" complete />
                        <x-feature title="User Defined Functions" complete />
                        <x-feature title="Native Classes" />
                        <x-feature title="User Defined Classes" />
                    </div>
                </div>

                <div class="mb-10 w-full">
                    <h3 class="text-center pb-2 text-lg font-extrabold uppercase tracking-wide">Features</h3>
                    <div class="bg-white rounded-md border border-gray-200 divide-y divide-gray-200 -space-y-px">
                        <x-feature title="Built-in Server" />
                        <x-feature title="Embeddable API" complete />
                        <x-feature title="Full Unicode Support" complete />
                        <x-feature title="REPL" complete />
                        <x-feature title="Scientific Number Notation" />
                    </div>
                </div>

                <div class="mb-10 w-full">
                    <h3 class="text-center pb-2 text-lg font-extrabold uppercase tracking-wide">Standard Library</h3>
                    <div class="bg-white rounded-md border border-gray-200 divide-y divide-gray-200 -space-y-px">
                        <x-feature title="csv" />
                        <x-feature title="file" />
                        <x-feature title="ghost" />
                        <x-feature title="http" />
                        <x-feature title="json" />
                        <x-feature title="math" />
                        <x-feature title="os" />
                    </div>
                </div>

                <div class="mb-10 w-full">
                    <h3 class="text-center pb-2 text-lg font-extrabold uppercase tracking-wide">Platforms</h3>
                    <div class="bg-white rounded-md border border-gray-200 divide-y divide-gray-200 -space-y-px">
                        <x-feature title="macOS" complete />
                        <x-feature title="Linux" complete />
                        <x-feature title="Windows" complete />
                        <x-feature title="Web (WASM)" />
                    </div>
                </div>
        </div>
    </div>
</x-layout>