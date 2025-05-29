@props([
    'route',
    'text',
    'icon' => 'slash',
    'badgeValue' => null,
    'badgeColor' => 'bg-green-400',
])

@php
    $active = request()->routeIs($route);
@endphp

<a {{ $attributes }}
    x-data="tooltip"
    x-on:mouseover="show = true"
    x-on:mouseleave="show = false"
    class="relative flex justify-between items-center text-gray-700 dark:text-gray-400 hover:text-gray-950 hover:dark:text-gray-200 hover:bg-gray-300 hover:dark:bg-gray-700 rounded-md p-2 cursor-pointer {{ $active ? 'text-gray-700 dark:text-gray-200 bg-gray-50 dark:bg-gray-700' : '' }}"
    x-bind:class="{'justify-start space-x-2': $store.sidebar.full, 'sm:justify-center':!$store.sidebar.full}">

    <div class="flex items-center" x-bind:class="{'space-x-2': $store.sidebar.full}">
        <x-icon name="{{ $icon }}" class="h-5 w-5" x-bind:class="{'w-6 h-6': !$store.sidebar.full}"/>

        <span x-cloak x-bind:class="!$store.sidebar.full && show ? visibleClass :'' || !$store.sidebar.full && !show ? 'sm:hidden':''">
            {{ __($text) }}
        </span>
    </div>

    @if ($badgeValue !== null)
        <span x-cloak x-bind:class="$store.sidebar.full ? '' :'sm:hidden'" class="w-5 h-5 p-1 {{ $badgeColor }} rounded-sm text-sm leading-3 text-center text-gray-50 font-bold antialiased">
            {{ $badgeValue }}
        </span>
    @endif
</a>
