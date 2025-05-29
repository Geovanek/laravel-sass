@props([
    'route',
    'text',
])

@php
    $active = request()->routeIs($route);
@endphp

<a {{ $attributes }} class="flex hover:text-gray-900 hover:dark:text-gray-300 cursor-pointer {{ $active ? 'text-gray-700 dark:text-gray-200 bg-gray-300 dark:bg-gray-700/50 px-2 py-1 rounded-md' : '' }}">
    {{ __($text) }}
</a>
