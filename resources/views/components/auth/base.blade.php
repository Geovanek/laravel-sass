@props([
    'title',
    'description',
    'footerDescription',
    'wirefunction',
])

<div {{ $attributes->merge(["class" => "flex flex-col justify-center items-center"]) }}>
    <div class="w-full max-w-md px-4 py-8">
        <div class="text-center mb-10">
            <x-application-logo class="w-16 h-16 mx-auto mb-4" />
            
            <h2 class="text-3xl font-extrabold text-gray-900 dark:text-white">
                {{ __($title) }}
            </h2>
            <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">
                {{ __($description) }}
            </p>
        </div>

        <x-card class="bg-white/90 dark:bg-gray-800/90 rounded-xl">
            <form wire:submit="{{ $wirefunction }}" class="space-y-6">
                <div class="space-y-5">

                    {{ $slot }}

                </div>
            </form>

            <x-slot:footer>
                <p class="text-center text-sm text-gray-600 dark:text-gray-400">
                    {{ __($footerDescription) }}

                    {{ $action }}
                </p>
            </x-slot:footer>
        </x-card>
    </div>
</div>