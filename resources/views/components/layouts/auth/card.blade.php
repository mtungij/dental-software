<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
<head>
    @include('partials.head')
</head>
<body class="min-h-screen antialiased flex items-center justify-center"
      style="background-image: url('{{ asset('images/dental.jpg') }}'); background-size: cover; background-position: center;">

    <div class="flex flex-col items-center gap-6 p-6 md:p-10 w-full max-w-md">
        
        <!-- Logo -->
        <a href="{{ route('home') }}" class="flex flex-col items-center gap-2" wire:navigate>
            <img src="{{ asset('images/logo.png') }}" alt="Logo" class="h-20 w-auto" />
            <span class="sr-only">{{ config('app.name', 'Laravel') }}</span>
        </a>

        <!-- Form Card -->
        <div class="w-full mt-7 bg-white/80 border border-gray-200 rounded-xl shadow-lg dark:bg-gray-900/80 dark:border-gray-700">
            <div class="p-4 sm:p-7">
                {{ $slot }}
            </div>
        </div>
    </div>

</body>
</html>
