<div>
    <x-auth.base 
        wirefunction="login"
        title="2FA Code"
        description="Enter the code sent to your email"
        footerDescription="Didn't receive the code?"
    >
        <div class="space-y-5">
            <x-pin label="{{ __('Code') }}" 
                wire:model="code" 
                length="6"
                class="block w-full dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300"
                required 
                clear
            />
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
            <x-button wire:click="resendCode" outline sm text="{{ __('Resend Code') }}" />
        </x-slot:action>
    </x-auth.base>
</div>
