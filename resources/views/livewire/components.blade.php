<div>
    {{-- Main Page Card --}}
    <div class="flex flex-col bg-white border shadow-sm rounded-xl dark:bg-gray-800 dark:border-gray-700">
        <div class="p-4 md:p-5">
            <h3 class="text-lg font-bold text-gray-800 dark:text-white">
                Component Showcase
            </h3>
            <p class="mt-2 text-gray-500 dark:text-gray-400">
                This is your dedicated page for testing and previewing Preline UI components.
            </p>
        </div>
        <div class="p-4 md:p-5 border-t border-gray-200 dark:border-gray-700 flex flex-col gap-6">
            {{-- Cards Section --}} 
             <div class="flex flex-col bg-white border shadow-sm rounded-xl dark:bg-gray-800 dark:border-gray-700">
                <div class="p-4 md:p-5"><h3 class="text-lg font-bold text-gray-800 dark:text-white">Toasts / Notifications</h3></div>
                <div class="p-4 md:p-5 border-t border-gray-200 dark:border-gray-700 flex items-center gap-x-4">
                    <button type="button" wire:click="showSuccessToast" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-green-600 text-white hover:bg-green-700 disabled:opacity-50 disabled:pointer-events-none">
                      Show Success Toast
                    </button>
                    <button type="button" wire:click="showInfoToast" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-cyan-600 text-white hover:bg-cyan-700 disabled:opacity-50 disabled:pointer-events-none">
                      Show Info Toast
                    </button>
                     <button type="button" wire:click="showErrorToast" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-red-600 text-white hover:bg-red-700 disabled:opacity-50 disabled:pointer-events-none">
                      Show Error Toast
                    </button>
                </div>
            </div>
            <!-- End Toasts Card -->

            {{-- Stepper Card --}}
            <div class="flex flex-col bg-white border shadow-sm rounded-xl dark:bg-gray-800 dark:border-gray-700">
                <div class="p-4 md:p-5"><h3 class="text-lg font-bold text-gray-800 dark:text-white">Stepper</h3></div>
                <div class="p-4 md:p-5 border-t border-gray-200 dark:border-gray-700">
                    <div data-hs-stepper="">
                        <ul class="relative flex flex-row gap-x-2">
                            <li class="flex items-center gap-x-2 shrink basis-0 flex-1 group" data-hs-stepper-nav-item='{ "index": 1 }'><span class="min-w-7 min-h-7 group inline-flex items-center text-xs align-middle"><span class="size-7 flex justify-center items-center shrink-0 bg-gray-100 font-medium text-gray-800 rounded-full group-focus:bg-gray-200 hs-stepper-active:bg-cyan-600 hs-stepper-active:text-white hs-stepper-success:bg-cyan-600 hs-stepper-success:text-white hs-stepper-completed:bg-green-500 hs-stepper-completed:group-focus:bg-green-600 dark:bg-gray-700 dark:text-white dark:group-focus:bg-gray-600 dark:hs-stepper-active:bg-cyan-500 dark:hs-stepper-success:bg-cyan-500 dark:hs-stepper-completed:bg-green-500 dark:hs-stepper-completed:group-focus:bg-green-600"><span class="hs-stepper-success:hidden hs-stepper-completed:hidden">1</span><svg class="hidden shrink-0 size-3 hs-stepper-success:block" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg></span><span class="ms-2 text-sm font-medium text-gray-800 dark:text-gray-200">Info</span></span><div class="w-full h-px flex-1 bg-gray-200 group-last:hidden hs-stepper-success:bg-cyan-600 hs-stepper-completed:bg-green-600 dark:bg-gray-700"></div></li>
                            <li class="flex items-center gap-x-2 shrink basis-0 flex-1 group" data-hs-stepper-nav-item='{ "index": 2 }'><span class="min-w-7 min-h-7 group inline-flex items-center text-xs align-middle"><span class="size-7 flex justify-center items-center shrink-0 bg-gray-100 font-medium text-gray-800 rounded-full group-focus:bg-gray-200 hs-stepper-active:bg-cyan-600 hs-stepper-active:text-white hs-stepper-success:bg-cyan-600 hs-stepper-success:text-white hs-stepper-completed:bg-green-500 hs-stepper-completed:group-focus:bg-green-600 dark:bg-gray-700 dark:text-white dark:group-focus:bg-gray-600 dark:hs-stepper-active:bg-cyan-500 dark:hs-stepper-success:bg-cyan-500 dark:hs-stepper-completed:bg-green-500 dark:hs-stepper-completed:group-focus:bg-green-600"><span class="hs-stepper-success:hidden hs-stepper-completed:hidden">2</span><svg class="hidden shrink-0 size-3 hs-stepper-success:block" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg></span><span class="ms-2 text-sm font-medium text-gray-800 dark:text-gray-200">Account</span></span><div class="w-full h-px flex-1 bg-gray-200 group-last:hidden hs-stepper-success:bg-cyan-600 hs-stepper-completed:bg-green-600 dark:bg-gray-700"></div></li>
                            <li class="flex items-center gap-x-2 shrink basis-0 flex-1 group" data-hs-stepper-nav-item='{ "index": 3 }'><span class="min-w-7 min-h-7 group inline-flex items-center text-xs align-middle"><span class="size-7 flex justify-center items-center shrink-0 bg-gray-100 font-medium text-gray-800 rounded-full group-focus:bg-gray-200 hs-stepper-active:bg-cyan-600 hs-stepper-active:text-white hs-stepper-success:bg-cyan-600 hs-stepper-success:text-white hs-stepper-completed:bg-green-500 hs-stepper-completed:group-focus:bg-green-600 dark:bg-gray-700 dark:text-white dark:group-focus:bg-gray-600 dark:hs-stepper-active:bg-cyan-500 dark:hs-stepper-success:bg-cyan-500 dark:hs-stepper-completed:bg-green-500 dark:hs-stepper-completed:group-focus:bg-green-600"><span class="hs-stepper-success:hidden hs-stepper-completed:hidden">3</span><svg class="hidden shrink-0 size-3 hs-stepper-success:block" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg></span><span class="ms-2 text-sm font-medium text-gray-800 dark:text-gray-200">Confirmation</span></span><div class="w-full h-px flex-1 bg-gray-200 group-last:hidden hs-stepper-success:bg-cyan-600 hs-stepper-completed:bg-green-600 dark:bg-gray-700"></div></li>
                        </ul>
                        <div class="mt-5 sm:mt-8">
                            <div data-hs-stepper-content-item='{ "index": 1 }'><div class="p-4 h-48 bg-gray-50 flex justify-center items-center border border-dashed border-gray-200 rounded-xl dark:bg-gray-900/50 dark:border-gray-700"><h3 class="text-gray-500 dark:text-gray-400">First content</h3></div></div>
                            <div data-hs-stepper-content-item='{ "index": 2 }' style="display: none;"><div class="p-4 h-48 bg-gray-50 flex justify-center items-center border border-dashed border-gray-200 rounded-xl dark:bg-gray-900/50 dark:border-gray-700"><h3 class="text-gray-500 dark:text-gray-400">Second content</h3></div></div>
                            <div data-hs-stepper-content-item='{ "index": 3 }' style="display: none;"><div class="p-4 h-48 bg-gray-50 flex justify-center items-center border border-dashed border-gray-200 rounded-xl dark:bg-gray-900/50 dark:border-gray-700"><h3 class="text-gray-500 dark:text-gray-400">Third content</h3></div></div>
                            <div data-hs-stepper-content-item='{ "isFinal": true }' style="display: none;"><div class="p-4 h-48 bg-gray-50 flex justify-center items-center border border-dashed border-gray-200 rounded-xl dark:bg-gray-900/50 dark:border-gray-700"><h3 class="text-gray-500 dark:text-gray-400">Final content</h3></div></div>
                            <div class="mt-5 flex justify-between items-center gap-x-2">
                                <button type="button" class="py-2 px-3 inline-flex items-center gap-x-1 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-gray-800 dark:border-gray-700 dark:text-white dark:hover:bg-gray-700" data-hs-stepper-back-btn=""><svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m15 18-6-6 6-6"></path></svg>Back</button>
                                <button type="button" class="py-2 px-3 inline-flex items-center gap-x-1 text-sm font-medium rounded-lg border border-transparent bg-cyan-600 text-white hover:bg-cyan-700 disabled:opacity-50 disabled:pointer-events-none" data-hs-stepper-next-btn="">Next<svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m9 18 6-6-6-6"></path></svg></button>
                                <button type="button" class="py-2 px-3 inline-flex items-center gap-x-1 text-sm font-medium rounded-lg border border-transparent bg-cyan-600 text-white hover:bg-cyan-700 disabled:opacity-50 disabled:pointer-events-none" data-hs-stepper-finish-btn="" style="display: none;">Finish</button>
                                <button type="reset" class="py-2 px-3 inline-flex items-center gap-x-1 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-gray-800 dark:border-gray-700 dark:text-white dark:hover:bg-gray-700" data-hs-stepper-reset-btn="" style="display: none;">Reset</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Dropdowns Card --}}
            <div class="flex flex-col bg-white border shadow-sm rounded-xl dark:bg-gray-800 dark:border-gray-700">
                <div class="p-4 md:p-5"><h3 class="text-lg font-bold text-gray-800 dark:text-white">Dropdowns</h3></div>
                <div class="p-4 md:p-5 border-t border-gray-200 dark:border-gray-700 flex items-center gap-x-4">
                    <div class="hs-dropdown relative inline-flex">
                        <button id="hs-dropdown-default" type="button" class="hs-dropdown-toggle py-3 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-gray-800 dark:border-gray-700 dark:text-white dark:hover:bg-gray-700">Actions<svg class="hs-dropdown-open:rotate-180 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m6 9 6 6 6-6"/></svg></button>
                        <div class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden min-w-60 bg-white shadow-md rounded-lg mt-2 dark:bg-gray-800 dark:border dark:border-gray-700 dark:divide-gray-700" role="menu" aria-orientation="vertical" aria-labelledby="hs-dropdown-default">
                            <div class="p-1 space-y-0.5"><a class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300 dark:focus:bg-gray-700" href="#">Newsletter</a><a class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300 dark:focus:bg-gray-700" href="#">Purchases</a><a class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300 dark:focus:bg-gray-700" href="#">Downloads</a><a class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300 dark:focus:bg-gray-700" href="#">Team Account</a></div>
                        </div>
                    </div>
                    <div class="hs-dropdown relative inline-flex">
                        <button id="hs-dropdown-with-icons" type="button" class="hs-dropdown-toggle py-3 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-gray-800 dark:border-gray-700 dark:text-white dark:hover:bg-gray-700">Actions<svg class="hs-dropdown-open:rotate-180 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m6 9 6 6 6-6"/></svg></button>
                        <div class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden min-w-60 bg-white shadow-md rounded-lg mt-2 divide-y divide-gray-200 dark:bg-gray-800 dark:border dark:border-gray-700 dark:divide-gray-700" role="menu" aria-orientation="vertical" aria-labelledby="hs-dropdown-with-icons">
                            <div class="p-1 space-y-0.5"><a class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300 dark:focus:bg-gray-700" href="#"><svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M6 8a6 6 0 0 1 12 0c0 7 3 9 3 9H3s3-2 3-9"/><path d="M10.3 21a1.94 1.94 0 0 0 3.4 0"/></svg>Newsletter</a><a class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300 dark:focus:bg-gray-700" href="#"><svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="8" cy="21" r="1"/><circle cx="19" cy="21" r="1"/><path d="M2.05 2.05h2l2.66 12.42a2 2 0 0 0 2 1.58h9.78a2 2 0 0 0 1.95-1.57l1.65-7.43H5.12"/></svg>Purchases</a><a class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300 dark:focus:bg-gray-700" href="#"><svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 14.899A7 7 0 1 1 15.71 8h1.79a4.5 4.5 0 0 1 2.5 8.242"/><path d="M12 12v9"/><path d="m8 17 4 4 4-4"/></svg>Downloads</a><a class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300 dark:focus:bg-gray-700" href="#"><svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>Team Account</a></div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Modals Card --}}
            <div class="flex flex-col bg-white border shadow-sm rounded-xl dark:bg-gray-800 dark:border-gray-700">
                <div class="p-4 md:p-5"><h3 class="text-lg font-bold text-gray-800 dark:text-white">Modal</h3></div>
                <div class="p-4 md:p-5 border-t border-gray-200 dark:border-gray-700">
                    <button type="button" class="py-3 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-cyan-600 text-white hover:bg-cyan-700 focus:outline-none focus:bg-cyan-700 disabled:opacity-50 disabled:pointer-events-none" aria-haspopup="dialog" aria-expanded="false" aria-controls="hs-slide-down-animation-modal" data-hs-overlay="#hs-slide-down-animation-modal">Open modal</button>
                </div>
            </div>

            <!-- NEW: Select Menus Card -->
            <div class="flex flex-col bg-white border shadow-sm rounded-xl dark:bg-gray-800 dark:border-gray-700">
                <div class="p-4 md:p-5"><h3 class="text-lg font-bold text-gray-800 dark:text-white">Select Menus</h3></div>
                <div class="p-4 md:p-5 border-t border-gray-200 dark:border-gray-700 grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    <!-- Standard Select -->
                    <div>
                        <label class="block text-sm font-medium mb-2 dark:text-white">Standard</label>
                        <select data-hs-select='{
                          "placeholder": "Select option...",
                          "toggleTag": "<button type=\"button\" aria-expanded=\"false\"></button>",
                          "toggleClasses": "hs-select-disabled:pointer-events-none hs-select-disabled:opacity-50 relative py-3 ps-4 pe-9 flex gap-x-2 text-nowrap w-full cursor-pointer bg-white border border-gray-200 rounded-lg text-start text-sm focus:outline-none focus:ring-2 focus:ring-cyan-500 dark:bg-gray-900 dark:border-gray-700 dark:text-gray-400 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600",
                          "dropdownClasses": "mt-2 z-50 w-full max-h-72 p-1 space-y-0.5 bg-white border border-gray-200 rounded-lg overflow-hidden overflow-y-auto [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300 dark:[&::-webkit-scrollbar-track]:bg-gray-700 dark:[&::-webkit-scrollbar-thumb]:bg-gray-500 dark:bg-gray-900 dark:border-gray-700",
                          "optionClasses": "py-2 px-4 w-full text-sm text-gray-800 cursor-pointer hover:bg-gray-100 rounded-lg focus:outline-none focus:bg-gray-100 dark:bg-gray-900 dark:hover:bg-gray-700 dark:text-gray-200 dark:focus:bg-gray-700",
                          "optionTemplate": "<div class=\"flex justify-between items-center w-full\"><span data-title></span><span class=\"hidden hs-selected:block\"><svg class=\"shrink-0 size-3.5 text-cyan-600 dark:text-cyan-500\" xmlns=\"http:.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><polyline points=\"20 6 9 17 4 12\"/></svg></span></div>",
                          "extraMarkup": "<div class=\"absolute top-1/2 end-3 -translate-y-1/2\"><svg class=\"shrink-0 size-3.5 text-gray-500 dark:text-gray-400\" xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><path d=\"m7 15 5 5 5-5\"/><path d=\"m7 9 5-5 5 5\"/></svg></div>"
                        }' class="hidden">
                          <option value="">Choose</option>
                          <option>Name</option>
                          <option disabled>Disabled</option>
                          <option>Description</option>
                          <option>User ID</option>
                        </select>
                    </div>

                    <!-- Multi-select -->
                    <div>
                        <label class="block text-sm font-medium mb-2 dark:text-white">Multi-select</label>
                        <select multiple data-hs-select='{
                          "placeholder": "Select multiple options...",
                          "toggleTag": "<button type=\"button\" aria-expanded=\"false\"></button>",
                          "toggleClasses": "hs-select-disabled:pointer-events-none hs-select-disabled:opacity-50 relative py-3 ps-4 pe-9 flex gap-x-2 text-nowrap w-full cursor-pointer bg-white border border-gray-200 rounded-lg text-start text-sm focus:outline-none focus:ring-2 focus:ring-cyan-500 dark:bg-gray-900 dark:border-gray-700 dark:text-gray-400 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600",
                          "dropdownClasses": "mt-2 z-50 w-full max-h-72 p-1 space-y-0.5 bg-white border border-gray-200 rounded-lg overflow-hidden overflow-y-auto [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300 dark:[&::-webkit-scrollbar-track]:bg-gray-700 dark:[&::-webkit-scrollbar-thumb]:bg-gray-500 dark:bg-gray-900 dark:border-gray-700",
                          "optionClasses": "py-2 px-4 w-full text-sm text-gray-800 cursor-pointer hover:bg-gray-100 rounded-lg focus:outline-none focus:bg-gray-100 dark:bg-gray-900 dark:hover:bg-gray-700 dark:text-gray-200 dark:focus:bg-gray-700",
                          "optionTemplate": "<div class=\"flex justify-between items-center w-full\"><span data-title></span><span class=\"hidden hs-selected:block\"><svg class=\"shrink-0 size-3.5 text-cyan-600 dark:text-cyan-500\" xmlns=\"http:.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><polyline points=\"20 6 9 17 4 12\"/></svg></span></div>",
                          "extraMarkup": "<div class=\"absolute top-1/2 end-3 -translate-y-1/2\"><svg class=\"shrink-0 size-3.5 text-gray-500 dark:text-gray-400\" xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><path d=\"m7 15 5 5 5-5\"/><path d=\"m7 9 5-5 5 5\"/></svg></div>"
                        }' class="hidden">
                          <option value="">Choose</option>
                          <option>Name</option>
                          <option>Email address</option>
                          <option>Description</option>
                          <option>User ID</option>
                        </select>
                    </div>

                    <!-- Searchable with Icons -->
                    {{-- NOTE: The flag icons require you to have the image assets in your public folder. --}}
                    <div>
                        <label class="block text-sm font-medium mb-2 dark:text-white">Searchable with Icons</label>
                        <select data-hs-select='{
                          "hasSearch": true,
                          "searchPlaceholder": "Search...",
                          "searchClasses": "block w-full sm:text-sm border-gray-200 rounded-lg focus:border-cyan-500 focus:ring-cyan-500 before:absolute before:inset-0 before:z-1 dark:bg-gray-900 dark:border-gray-700 dark:text-gray-400 dark:placeholder-gray-500 py-1.5 sm:py-2 px-3",
                          "searchWrapperClasses": "bg-white p-2 -mx-1 sticky top-0 dark:bg-gray-900",
                          "placeholder": "Select country...",
                          "toggleTag": "<button type=\"button\" aria-expanded=\"false\"><span class=\"me-2\" data-icon></span><span class=\"text-gray-800 dark:text-gray-200\" data-title></span></button>",
                          "toggleClasses": "hs-select-disabled:pointer-events-none hs-select-disabled:opacity-50 relative py-3 ps-4 pe-9 flex gap-x-2 text-nowrap w-full cursor-pointer bg-white border border-gray-200 rounded-lg text-start text-sm focus:outline-none focus:ring-2 focus:ring-cyan-500 dark:bg-gray-900 dark:border-gray-700 dark:text-gray-400 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600",
                          "dropdownClasses": "mt-2 max-h-72 pb-1 px-1 space-y-0.5 z-20 w-full bg-white border border-gray-200 rounded-lg overflow-hidden overflow-y-auto [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300 dark:[&::-webkit-scrollbar-track]:bg-gray-700 dark:[&::-webkit-scrollbar-thumb]:bg-gray-500 dark:bg-gray-900 dark:border-gray-700",
                          "optionClasses": "py-2 px-4 w-full text-sm text-gray-800 cursor-pointer hover:bg-gray-100 rounded-lg focus:outline-none focus:bg-gray-100 dark:bg-gray-900 dark:hover:bg-gray-700 dark:text-gray-200 dark:focus:bg-gray-700",
                          "optionTemplate": "<div><div class=\"flex items-center\"><div class=\"me-2\" data-icon></div><div class=\"text-gray-800 dark:text-gray-200\" data-title></div></div></div>",
                          "extraMarkup": "<div class=\"absolute top-1/2 end-3 -translate-y-1/2\"><svg class=\"shrink-0 size-3.5 text-gray-500 dark:text-gray-400\" xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><path d=\"m7 15 5 5 5-5\"/><path d=\"m7 9 5-5 5 5\"/></svg></div>"
                        }' class="hidden">
                          <option value="">Choose</option>
                          <option value="AF" data-hs-select-option='{"icon": "<img class=\"inline-block size-4 rounded-full\" src=\"/flags/af.png\" alt=\"Afghanistan\" />"}'>Afghanistan</option>
                          <option value="AX" data-hs-select-option='{"icon": "<img class=\"inline-block size-4 rounded-full\" src=\"/flags/ax.png\" alt=\"Aland Islands\" />"}'>Aland Islands</option>
                          <option value="AL" data-hs-select-option='{"icon": "<img class=\"inline-block size-4 rounded-full\" src=\"/flags/al.png\" alt=\"Albania\" />"}'>Albania</option>
                          {{-- Add more countries as needed --}}
                        </select>
                    </div>
                </div>
            </div>
            <!-- End Select Menus Card -->

        </div>
    </div>
    <!-- End Main Page Card -->

    <!-- Modal Markup -->
    <div id="hs-slide-down-animation-modal" class="hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto pointer-events-none" role="dialog" tabindex="-1" aria-labelledby="hs-slide-down-animation-modal-label">
        <div class="hs-overlay-animation-target hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all sm:max-w-lg sm:w-full m-3 sm:mx-auto">
            <div class="flex flex-col bg-white border border-gray-200 shadow-sm rounded-xl pointer-events-auto dark:bg-gray-800 dark:border-gray-700">
                <div class="flex justify-between items-center py-3 px-4 border-b dark:border-gray-700"><h3 id="hs-slide-down-animation-modal-label" class="font-bold text-gray-800 dark:text-white">Modal title</h3><button type="button" class="size-8 inline-flex justify-center items-center gap-x-2 rounded-full border border-transparent bg-gray-100 text-gray-800 hover:bg-gray-200 disabled:opacity-50 disabled:pointer-events-none dark:bg-gray-700 dark:hover:bg-gray-600 dark:text-gray-400" aria-label="Close" data-hs-overlay="#hs-slide-down-animation-modal"><span class="sr-only">Close</span><svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg></button></div>
                <div class="p-4 overflow-y-auto"><p class="mt-1 text-gray-800 dark:text-gray-400">This is a wider card with supporting text below as a natural lead-in to additional content.</p></div>
                <div class="flex justify-end items-center gap-x-2 py-3 px-4 border-t dark:border-gray-700">
                    <button type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-gray-800 dark:border-gray-700 dark:text-white dark:hover:bg-gray-700" data-hs-overlay="#hs-slide-down-animation-modal">Close</button>
                    <button type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-cyan-600 text-white hover:bg-cyan-700 disabled:opacity-50 disabled:pointer-events-none">Save changes</button>
                </div>
            </div>
        </div>
    </div>
</div>