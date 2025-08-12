<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
    <head>
        @include('partials.head')
    </head>
    <body class="min-h-screen bg-gray-100 antialiased dark:bg-linear-to-b dark:from-gray-950 dark:to-gray-900">
        <div class="bg-muted flex min-h-svh flex-col items-center justify-center gap-6 p-6 md:p-10">
            <a href="{{ route('home') }}" class="flex flex-col items-center gap-2 font-medium" wire:navigate>
                <span class="flex h-9 w-9 items-center justify-center rounded-md">
                    <x-app-logo-icon class="size-9 fill-current text-black dark:text-white" />
                </span>
                <span class="sr-only">{{ config('app.name', 'Laravel') }}</span>
            </a>

            <div class="w-full max-w-md">
                <div class="mt-7 bg-white border border-gray-200 rounded-xl shadow-2xs dark:bg-gray-900 dark:border-gray-700">
                    <div class="p-4 sm:p-7">
                        {{ $slot }}
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>