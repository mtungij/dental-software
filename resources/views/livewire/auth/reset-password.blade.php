<div>
    <div class="text-center">
        <h1 class="block text-2xl font-bold text-gray-800 dark:text-white">{{ __('Reset password') }}</h1>
        <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Please enter your new password below') }}</p>
    </div>

    <div class="mt-5">
        <!-- Session Status -->
        <x-auth-session-status class="mb-4 text-center" :status="session('status')" />

        <!-- Form -->
        <form wire:submit="resetPassword">
            <div class="grid gap-y-4">
                <!-- Email Form Group -->
                <div>
                    <label for="email" class="block text-sm mb-2 dark:text-white">{{ __('Email') }}</label>
                    <div class="relative">
                        <input type="email"
                               id="email"
                               wire:model="email"
                               name="email"
                               class="py-2.5 sm:py-3 px-4 block w-full border-gray-200 rounded-lg sm:text-sm focus:border-cyan-500 focus:ring-cyan-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-gray-900 dark:border-gray-700 dark:text-gray-400 dark:placeholder-gray-500 dark:focus:ring-gray-600"
                               required
                               autocomplete="email"
                               aria-describedby="email-error"
                        >
                        @error('email')
                            <div class="absolute inset-y-0 end-0 flex items-center pointer-events-none pe-3">
                                <svg class="size-5 text-red-500" width="16" height="16" fill="currentColor" viewBox="0 0 16 16" aria-hidden="true">
                                  <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
                                </svg>
                            </div>
                        @enderror
                    </div>
                    @error('email')
                        <p class="text-xs text-red-600 mt-2" id="email-error">{{ $message }}</p>
                    @enderror
                </div>
                <!-- End Email Form Group -->

                <!-- Password Form Group -->
                <div>
                    <label for="password" class="block text-sm mb-2 dark:text-white">{{ __('Password') }}</label>
                    <div class="relative">
                        <input type="password"
                               id="password"
                               wire:model="password"
                               name="password"
                               class="py-2.5 sm:py-3 px-4 block w-full border-gray-200 rounded-lg sm:text-sm focus:border-cyan-500 focus:ring-cyan-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-gray-900 dark:border-gray-700 dark:text-gray-400 dark:placeholder-gray-500 dark:focus:ring-gray-600"
                               required
                               autocomplete="new-password"
                               placeholder="{{ __('Password') }}"
                               aria-describedby="password-error"
                        >
                        @error('password')
                            <div class="absolute inset-y-0 end-0 flex items-center pointer-events-none pe-3">
                                <svg class="size-5 text-red-500" width="16" height="16" fill="currentColor" viewBox="0 0 16 16" aria-hidden="true">
                                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
                                </svg>
                            </div>
                        @enderror
                    </div>
                     @error('password')
                        <p class="text-xs text-red-600 mt-2" id="password-error">{{ $message }}</p>
                    @enderror
                </div>
                <!-- End Password Form Group -->

                <!-- Confirm Password Form Group -->
                <div>
                    <label for="password_confirmation" class="block text-sm mb-2 dark:text-white">{{ __('Confirm password') }}</label>
                    <div class="relative">
                        <input type="password"
                               id="password_confirmation"
                               wire:model="password_confirmation"
                               name="password_confirmation"
                               class="py-2.5 sm:py-3 px-4 block w-full border-gray-200 rounded-lg sm:text-sm focus:border-cyan-500 focus:ring-cyan-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-gray-900 dark:border-gray-700 dark:text-gray-400 dark:placeholder-gray-500 dark:focus:ring-gray-600"
                               required
                               autocomplete="new-password"
                               placeholder="{{ __('Confirm password') }}"
                        >
                    </div>
                </div>
                <!-- End Confirm Password Form Group -->

                <button type="submit" class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-cyan-600 text-white hover:bg-cyan-700 focus:outline-hidden focus:bg-cyan-700 disabled:opacity-50 disabled:pointer-events-none">
                    {{ __('Reset password') }}
                </button>
            </div>
        </form>
        <!-- End Form -->
    </div>
</div>