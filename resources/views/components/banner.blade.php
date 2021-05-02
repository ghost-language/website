@props([
    'fullWidth' => false
])

<div class="h-12 bg-gray-800 text-white text-sm flex items-center leading-none font-semibold font-mono border-t-4 border-indigo-500">
    <div class="mx-auto {{ !$fullWidth ? 'max-w-7xl' : '' }} w-full flex flex-row-reverse justify-between items-center px-6 leading-none">
        <span class="leading-none">
            {{ LATEST_VERSION }}
        </span>
    </div>
</div>