@props([
    'title'    => '',
    'complete' => false,
])

<!-- Checked: "bg-indigo-50 border-indigo-200 z-10", Not Checked: "border-gray-200" -->
<div class="{{ $complete ? 'border-indigo-200' : 'border-gray-200' }} relative p-4 flex">
    <div class="flex items-center justify-between w-full">
        <span class="flex-grow flex flex-col" id="availability-label">
            <span class="text-sm font-medium text-gray-900">{{ $title }}</span>
            <div class="text-gray-500 prose-sm">
                {{ $slot }}
            </div>
        </span>

        <div class="{{ $complete ? 'bg-indigo-600' : 'bg-gray-200' }} relative inline-flex flex-shrink-0 h-6 w-11 border-2 border-transparent rounded-full" role="switch" aria-checked="false" aria-labelledby="availability-label">
            <span aria-hidden="true" class="{{ $complete ? 'translate-x-5' : 'translate-x-0' }} inline-block h-5 w-5 rounded-full bg-white shadow transform ring-0 transition ease-in-out duration-200"></span>
        </div>
    </div>
</div>