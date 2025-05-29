@props([
    'tab',
    'text',
    'icon' => 'slash',
    'badgeValue' => null,
    'badgeColor' => 'bg-green-400',
])

<li x-data="dropdown" class="relative">
                <!-- Dropdown head -->
    <div @click="toggle('{{ $tab }}')"
        x-data="tooltip"
        x-on:mouseover="show = true"
        x-on:mouseleave="show = false"
        class="flex justify-between text-gray-700 dark:text-gray-400 hover:text-gray-950 hover:dark:text-gray-200 hover:bg-gray-300 hover:dark:bg-gray-700 items-center rounded-md p-2 cursor-pointer"
        x-bind:class="{'justify-start space-x-2': $store.sidebar.full, 'sm:justify-center':!$store.sidebar.full, 'text-gray700 dark:text-gray-200 bg-gray-50 dark:bg-gray-700':$store.sidebar.active == '{{ $tab }}','text-gray-300 ':$store.sidebar.active != '{{ $tab }}'}">
        <div class="relative flex items-center" x-bind:class="{'space-x-2': $store.sidebar.full}">
            <x-icon name="{{ $icon }}" class="h-5 w-5" x-bind:class="{'w-6 h-6': !$store.sidebar.full}"/>
            
            <span x-cloak x-bind:class="!$store.sidebar.full && show ? visibleClass :'' || !$store.sidebar.full && !show ? 'sm:hidden':''">
                {{ __($text) }}
            </span>
        </div>

        <x-icon x-cloak name="chevron-right" class="h-3 w-3" x-bind:class="{'sm:hidden':!$store.sidebar.full, 'transform rotate-90':$store.sidebar.active == '{{ $tab }}', 'transform rotate-0':$store.sidebar.active != '{{ $tab }}'}" />
    </div>
    <!-- Dropdown content -->
    <ul x-cloak x-show="open"
        @click.outside="open = false"
        x-bind:class="$store.sidebar.full ? expandedClass : shrinkedClass"
        class="text-gray-500 space-y-3 ">
        
        {{ $slot }}
    </ul>
</li>