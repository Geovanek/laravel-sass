<div class="mt-auto px-4 py-4 border-t border-gray-200 dark:border-gray-700">
    <div class="flex items-center justify-between">
        <div class="flex items-center min-w-0">
            <div class="flex-shrink-0">
                <div
                    class="h-10 w-10 rounded-full bg-primary-950 dark:bg-primary-300 flex items-center justify-center">
                    <span class="text-primary-700 dark:text-primary-300 font-medium text-sm">
                        {{ substr(auth()->user()?->email, 0, 2) }}
                    </span>
                </div>
            </div>
            <div class="ml-3 min-w-0">
                <p class="text-sm font-medium text-gray-700 dark:text-gray-300 truncate">
                    {{ auth()->user()?->email }}
                </p>
            </div>
        </div>

        <form method="POST" action="{{ route('logout') }}" class="flex">
            @csrf
            <button type="submit"
                class="text-sm text-gray-800 hover:text-primary-700 dark:text-gray-300 dark:hover:text-primary-400 flex items-center">
                <x-icon name="power" class="w-5 h-5 mr-2" />
                {{ __('Logout') }}
            </button>
        </form>
    </div>
</div>