@props(['label', 'type' => 'text', 'icon', 'error', 'note' => null])

<div>
    <label class="block mb-1 font-medium text-gray-700 dark:text-gray-300">{{ $label }}</label>
    <div class="relative">
        <svg class="w-5 h-5 text-gray-400 absolute left-3 top-1/2 -translate-y-1/2 pointer-events-none"
             xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $icon }}" />
        </svg>
        <input type="{{ $type }}" {{ $attributes }}
            class="w-full rounded-lg border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 pl-10 pr-3 py-2 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-blue-500 focus:outline-none">
    </div>
    @if($note)
        <span class="text-sm text-gray-500 dark:text-gray-400">{{ $note }}</span>
    @endif
    @error($error) <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
</div>
