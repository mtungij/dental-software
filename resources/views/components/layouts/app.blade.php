<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="light">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ ($title ?? '') . ' | ' . config('app.name', 'dental-clinic') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <!-- FullCalendar CSS -->
<!-- FullCalendar CSS -->
<!-- In <head> -->



    {!! ToastMagic::styles() !!}

    <script>
    // On page load or when changing themes, best to add inline in `head` to avoid FOUC
    if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
        document.documentElement.classList.add('dark');
    } else {
        document.documentElement.classList.remove('dark')
    }
</script>

</head>

  <style type="text/css">
    .apexcharts-tooltip.apexcharts-theme-light
    {
      background-color: transparent !important;
      border: none !important;
      box-shadow: none !important;
    }

  .fc {
        @apply text-sm;
    }

    .fc-toolbar-title {
        @apply text-lg font-semibold;
    }

    .fc-button {
        @apply bg-blue-600 text-white px-2 py-1 rounded hover:bg-blue-700;
    }

    .fc-daygrid-event {
        @apply bg-green-500 text-white px-1 rounded;
    }

    /* Hide the default checkbox */
input[type="checkbox"] {
  position: relative;
  width: 20px;
  height: 20px;
  -webkit-appearance: none;
  -moz-appearance: none;
  appearance: none;
  border: 2px solid #555;
  border-radius: 3px;
  cursor: pointer;
}

/* When checked, show the normal checkmark */
input[type="checkbox"]:checked {
  background-color: #3b82f6; /* blue */
  border-color: #3b82f6;
}

input[type="checkbox"]:checked::after {
  content: "✔";
  position: absolute;
  top: 0;
  left: 4px;
  color: white;
  font-size: 18px;
  font-weight: bold;
}

/* When unchecked, show an X */
input[type="checkbox"]:not(:checked)::after {
  content: "✗";
  position: absolute;
  top: 0;
  left: 4px;
  color: red;
  font-size: 18px;
  font-weight: bold;
}
    
  </style>



<body class="bg-gray-50 dark:bg-gray-900">

<!-- ========== HEADER ========== -->
<header class="sticky top-0 inset-x-0 flex flex-wrap md:justify-start md:flex-nowrap z-50 w-full bg-white border-b border-gray-200 text-sm py-3 sm:py-0 dark:bg-gray-800 dark:border-gray-700">
    <nav class="relative w-full mx-auto px-4 sm:flex sm:items-center sm:justify-end sm:gap-4 sm:px-6 lg:px-8 py-4" aria-label="Global">
        <div class="flex items-center gap-4">
            <a class="flex-none text-xl font-semibold dark:text-white" href="{{ route('dashboard') }}" aria-label="Brand">
                 <x-app-logo-icon class="h-8 w-auto fill-current text-black dark:text-white" />
            </a>
            <button id="theme-toggle" type="button" class="text-gray-500 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-2.5">
                <svg id="theme-toggle-dark-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path></svg>
                <svg id="theme-toggle-light-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" fill-rule="evenodd" clip-rule="evenodd"></path></svg>
            </button>
        </div>
        <div class="flex flex-row items-center justify-end gap-1">
             <div class="hs-dropdown [--placement:bottom-right] relative inline-flex">
                <button id="hs-dropdown-account" type="button" class="w-full flex items-center justify-center gap-x-2 text-sm font-semibold rounded-full border border-transparent text-gray-800 focus:outline-none disabled:opacity-50 disabled:pointer-events-none dark:text-white">
                    <span class="relative flex h-9 w-9 shrink-0 overflow-hidden rounded-full">
                        <span class="flex h-full w-full items-center justify-center rounded-full bg-gray-200 text-black dark:bg-gray-700 dark:text-white">
                            {{ auth()->user()->initials() }}
                        </span>
                    </span>
                </button>
                <div class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden min-w-60 bg-white shadow-md rounded-lg mt-2 dark:bg-gray-800 dark:border dark:border-gray-700" role="menu" aria-orientation="vertical" aria-labelledby="hs-dropdown-account">
                    <div class="py-3 px-5 bg-gray-100 rounded-t-lg dark:bg-gray-700">
                        <p class="text-sm text-gray-500 dark:text-gray-400">{{ __('Signed in as') }}</p>
                        <p class="text-sm font-medium text-gray-800 dark:text-gray-200">{{ auth()->user()->name }}</p>
                    </div>
                    <div class="p-1.5 space-y-0.5">
                        <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300 dark:focus:bg-gray-700" href="{{ route('settings.profile') }}" wire:navigate>
                           <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4"><path stroke-linecap="round" stroke-linejoin="round" d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.325.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 0 1 1.37.49l1.296 2.247a1.125 1.125 0 0 1-.26 1.431l-1.003.827c-.293.24-.438.613-.43.992a6.759 6.759 0 0 1 0 1.905c.008.379.137.75.43.99l1.004.827c.424.35.534.955.26 1.43l-1.298 2.247a1.125 1.125 0 0 1-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.512 6.512 0 0 1-.22.128c-.333.184-.582.496-.645.87l-.213 1.28c-.09.543-.56.941-1.11.941h-2.594c-.55 0-1.02-.398-1.11-.94l-.213-1.282c-.063-.374-.313-.686-.645-.87a6.52 6.52 0 0 1-.22-.127c-.325-.196-.72-.257-1.075-.124l-1.217.456a1.125 1.125 0 0 1-1.37-.49l-1.296-2.247a1.125 1.125 0 0 1 .26-1.431l1.004-.827c.292-.24.437-.613.43-.992a6.759 6.759 0 0 1 0-1.905c-.008-.379-.137-.75-.43-.99l-1.004-.828a1.125 1.125 0 0 1-.26-1.43l1.297-2.247a1.125 1.125 0 0 1 1.37-.49l1.217.456c.355.133.75.072 1.076-.124.072-.044.146-.087.22-.128.332-.184.582-.496.645-.87l.213-1.281z" /><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" /></svg>
                            {{ __('Settings') }}
                        </a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                             <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();" class="flex w-full items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300 dark:focus:bg-gray-700">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15m3 0 3-3m0 0-3-3m3 3H9" /></svg>
                                {{ __('Log Out') }}
                            </a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</header>
<!-- ========== END HEADER ========== -->

<!-- ========== MAIN CONTENT ========== -->
@include('layouts.partials.sidebar')

<!-- Content -->
<div class="w-full px-4 sm:px-6 md:px-8 lg:ps-72">
    <main>
        @if (isset($title))
        <header>
            <h1 class="block text-2xl font-bold text-gray-800 sm:text-3xl dark:text-white">{{ $title }}</h1>
        </header>
        @endif
        <div class="w-full">
             {{ $slot }}
        </div>
    </main>
</div>
<!-- End Content -->
<!-- ========== END MAIN CONTENT ========== -->

@livewireScripts
{!! ToastMagic::scripts() !!}
{{-- Preline UI JS is required for accordions and dropdowns --}}
<script>
    // Manually trigger the init for components loaded via Livewire
    document.addEventListener('livewire:navigated', () => {
        // Re-initialize Preline components
        if (window.HSStaticMethods) {
            window.HSStaticMethods.autoInit();
        }
    });
</script>
<!-- FullCalendar JS -->


<script>
    var themeToggleDarkIcon = document.getElementById('theme-toggle-dark-icon');
var themeToggleLightIcon = document.getElementById('theme-toggle-light-icon');

// Change the icons inside the button based on previous settings
if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
    themeToggleLightIcon.classList.remove('hidden');
} else {
    themeToggleDarkIcon.classList.remove('hidden');
}

var themeToggleBtn = document.getElementById('theme-toggle');

themeToggleBtn.addEventListener('click', function() {

    // toggle icons inside button
    themeToggleDarkIcon.classList.toggle('hidden');
    themeToggleLightIcon.classList.toggle('hidden');

    // if set via local storage previously
    if (localStorage.getItem('color-theme')) {
        if (localStorage.getItem('color-theme') === 'light') {
            document.documentElement.classList.add('dark');
            localStorage.setItem('color-theme', 'dark');
        } else {
            document.documentElement.classList.remove('dark');
            localStorage.setItem('color-theme', 'light');
        }

    // if NOT set via local storage previously
    } else {
        if (document.documentElement.classList.contains('dark')) {
            document.documentElement.classList.remove('dark');
            localStorage.setItem('color-theme', 'light');
        } else {
            document.documentElement.classList.add('dark');
            localStorage.setItem('color-theme', 'dark');
        }
    }
    
});
</script>

<script>
 function speakPatient(message) {
    const utterance = new SpeechSynthesisUtterance(message);

    // Attempt to select a Swahili-compatible voice if available
    const voices = speechSynthesis.getVoices();
    const swahiliVoice = voices.find(voice => 
        voice.lang.toLowerCase().includes('sw') || voice.name.toLowerCase().includes('swahili')
    );

    if (swahiliVoice) {
        utterance.voice = swahiliVoice;
    }

    // Speak the message
    speechSynthesis.speak(utterance);
}

// Listen for Livewire event
window.addEventListener('call-patient', event => {
    const id = event.detail.patientId;
    // Replace this with your actual patient name lookup logic
    const message = `please patient  come to doctor room .`;
    speakPatient(message);
});

</script>


<script>
  document.addEventListener('DOMContentLoaded', () => {
    const tabs = document.querySelectorAll('.tab-btn');
    const contents = document.querySelectorAll('.tab-content');

    tabs.forEach(tab => {
      tab.addEventListener('click', () => {
        const target = tab.getAttribute('data-tab');

        // Remove active styles
        tabs.forEach(t => {
          t.classList.remove('text-blue-600', 'border-blue-600');
          t.classList.add('text-gray-600', 'border-transparent');
        });

        // Hide all contents
        contents.forEach(c => c.classList.add('hidden'));
        contents.forEach(c => c.classList.remove('block'));

        // Show target content
        document.getElementById(target).classList.remove('hidden');
        document.getElementById(target).classList.add('block');

        // Set active styles on clicked tab
        tab.classList.add('text-blue-600', 'border-blue-600');
        tab.classList.remove('text-gray-600', 'border-transparent');
      });
    });
  });
</script>


<script>
    window.addEventListener('open-modal', event => {
        document.getElementById(event.detail.modalId).classList.remove('hidden');
    });

    window.addEventListener('close-modal', event => {
        document.getElementById(event.detail.modalId).classList.add('hidden');
    });
</script>

<script>
    function printInvoice() {
        const printContents = document.getElementById("invoice-content").innerHTML;
        const originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
        location.reload(); // Optional: reload to restore JS functionality
    }
</script>

<script>
    window.addEventListener('price-type-mix-error', () => {
        alert('You cannot mix Normal Price and Fast Track Price. Please choose only one type.');
    });
</script>

<script>
    window.addEventListener('open-invoice-pdf', event => {
        window.open(event.detail.url, '_blank');
    });
</script>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>






<script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
</body>
</html>