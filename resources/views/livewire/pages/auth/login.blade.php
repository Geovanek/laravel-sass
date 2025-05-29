<div>
    <x-auth.base 
        wirefunction="login"
        title="{{ __('Welcome back') }}"
        description="{{ __('Sign in to your account') }}"
        footerDescription="{{ __('Not a member?') }}" 
    >
        <div class="space-y-5">
            <x-input label="{{ __('Email address') }}" 
                wire:model="email" type="email" 
                icon="envelope"
                class="block w-full dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300" 
                placeholder="your@email.com" 
                required 
            />

            @if ($showMessage)
                <x-alert text="{{ __('You will receive an email with a link to login.') }}" 
                    icon="exclamation-triangle" 
                    color="green" 
                    outline />
            @endif
        </div>

        <div class="flex items-center justify-between">
            <x-link href="{{ route('password.request') }}"
                class="text-sm font-medium text-primary-600 hover:text-primary-500 dark:text-primary-400 dark:hover:text-primary-300">
                {{ __('Forgot your password?') }}
            </x-link>
        </div>

        <div>
            <x-button 
                class="w-full flex justify-center py-2 font-medium" 
                text="{{ __('Sign In') }}"
                icon="arrow-right-on-rectangle" 
                type="submit" 
                primary spinner 
            />
        </div>

        <x-slot:action>
            <x-link href="{{ route('register') }}"
                class="font-medium text-primary-600 hover:text-primary-500 dark:text-primary-400 dark:hover:text-primary-300">
                {{ __('Create your account') }}
            </x-link>
        </x-slot:action>
    </x-auth.base>
</div>
