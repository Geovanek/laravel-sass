<div>
    <x-auth.base 
        wirefunction="login"
        title="{{ __('Welcome back') }}"
        description="{{ __('Sign in to your account') }}"
        footerDescription="{{ __('Not a member?') }}" 
    >

        <x-slot:action>
            <x-link href="{{ route('login') }}"
                class="font-medium text-primary-600 hover:text-primary-500 dark:text-primary-400 dark:hover:text-primary-300">
                {{ __('Have an account?') }}
            </x-link>
        </x-slot:action>
    </x-auth.base>
</div>
