<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" x-data="tallstackui_darkTheme({ default: 'dark' })">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>{{ $title ?? 'Page Title' }}</title>

        <tallstackui:script />
        @vite(entrypoints: ['resources/css/app.css', 'resources/js/app.js'])
    </head>

    <body x-cloak class="font-noto flex min-h-screen justify-content-between" 
        x-bind:class="{'dark bg-gray-900 text-gray-100': darkTheme, 'bg-gray-100 text-gray-900': !darkTheme }"
    > 
        <x-sidebar.sidebar />

        <div class="w-full px-6 bg-gradient-to-br from-gray-50 to-gray-200 dark:from-gray-950 dark:to-gray-800">
            <x-theme-switch only-icons />
        
            {{ $slot }}
        </div>
    </body>
</html>
