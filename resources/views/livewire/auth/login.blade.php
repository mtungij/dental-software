<div class="mx-auto max-w-md">
    <div class="text-center">
        <h1 class="block text-2xl font-bold text-gray-800 dark:text-white">{{ __('Log in to your account') }}</h1>
       
    </div>

    <div class="mt-5">
      
@if ($errors->has('email'))
    <div class="mb-4 p-3 bg-red-200 text-red-800 rounded dark:bg-red-900 dark:text-red-300 text-sm text-center">
        {{ $errors->first('email') }}
    </div>
@endif

   
        <form wire:submit="login">
            <div class="grid gap-y-4">
               
                <div>
                    <label for="email" class="block text-sm mb-2 dark:text-white">{{ __('Email address') }}</label>
                    <div class="relative">
                        <input type="email"
                               id="email"
                               wire:model="email"
                               name="email"
                               class="py-2.5 sm:py-3 px-4 block w-full border-gray-200 rounded-lg sm:text-sm focus:border-cyan-500 focus:ring-cyan-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-gray-900 dark:border-gray-700 dark:text-gray-400 dark:placeholder-gray-500 dark:focus:ring-gray-600"
                               required
                               autofocus
                               autocomplete="email"
                               placeholder="email@example.com"
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
                  
                    <div class="relative">
                        <input type="password"
                               id="password"
                               wire:model="password"
                               name="password"
                               class="py-2.5 sm:py-3 px-4 block w-full border-gray-200 rounded-lg sm:text-sm focus:border-cyan-500 focus:ring-cyan-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-gray-900 dark:border-gray-700 dark:text-gray-400 dark:placeholder-gray-500 dark:focus:ring-gray-600"
                               required
                               autocomplete="current-password"
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

                <!-- Remember Me Checkbox -->
                <div class="flex items-center">
                    <div class="flex">
                        <input id="remember-me" wire:model="remember" name="remember-me" type="checkbox" class="shrink-0 mt-0.5 border-gray-200 rounded-sm text-cyan-600 focus:ring-cyan-500 dark:bg-gray-800 dark:border-gray-700 dark:checked:bg-cyan-500 dark:checked:border-cyan-500 dark:focus:ring-offset-gray-800">
                    </div>
                    <div class="ms-3">
                        <label for="remember-me" class="text-sm dark:text-white">{{ __('Remember me') }}</label>
                    </div>
                </div>
                <!-- End Remember Me Checkbox -->

                <button type="submit" class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-cyan-600 text-white hover:bg-cyan-700 focus:outline-hidden focus:bg-cyan-700 disabled:opacity-50 disabled:pointer-events-none">
                    {{ __('Log in') }}
                </button>
            </div>
        </form>
        <!-- End Form -->
    </div>
</div>