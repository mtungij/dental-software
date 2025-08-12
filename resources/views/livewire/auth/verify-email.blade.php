<div>
    <div class="text-center">
        <h1 class="block text-2xl font-bold text-gray-800 dark:text-white">{{ __('Verify Your Email Address') }}</h1>
        <p class="mt-3 text-gray-600 dark:text-gray-400">
            {{ __('Please verify your email address by clicking on the link we just emailed to you.') }}
        </p>
    </div>

    <div class="mt-5">
        {{-- Verification link sent status --}}
        @if (session('status') == 'verification-link-sent')
            <div class="mb-4 text-center p-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
                {{ __('A new verification link has been sent to the email address you provided during registration.') }}
            </div>
        @endif

        <div class="grid gap-y-4">
            <button type="button" wire:click="sendVerification" class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-cyan-600 text-white hover:bg-cyan-700 focus:outline-hidden focus:bg-cyan-700 disabled:opacity-50 disabled:pointer-events-none">
                {{ __('Resend verification email') }}
            </button>

            <button type="button" wire:click="logout" class="text-sm text-cyan-600 decoration-2 hover:underline focus:outline-hidden focus:underline font-medium dark:text-cyan-500">
                {{ __('Log out') }}
            </button>
        </div>
    </div>
</div>