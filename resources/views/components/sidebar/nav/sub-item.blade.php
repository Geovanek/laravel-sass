@props([
    'text',
])

<li class="hover:text-gray-900 hover:dark:text-gray-300 cursor-pointer list-none">
    {{ __($text) }}
</li>
