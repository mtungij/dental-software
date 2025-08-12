<!-- Sidebar -->
<div id="hs-application-sidebar" class="hs-overlay [--auto-close:lg] hs-overlay-open:translate-x-0 -translate-x-full transition-all duration-300 transform hidden fixed top-0 start-0 bottom-0 z-60 w-64 bg-white border-e border-gray-200 pt-7 pb-10 overflow-y-auto lg:block lg:translate-x-0 lg:end-auto lg:bottom-0 [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300 dark:bg-gray-800 dark:border-gray-700 dark:[&::-webkit-scrollbar-track]:bg-gray-700 dark:[&::-webkit-scrollbar-thumb]:bg-gray-500">
    <div class="px-6">
        <a class="flex-none text-xl font-semibold dark:text-white" href="{{ route('dashboard') }}" aria-label="Brand">Acme Inc.</a>
    </div>

    <nav class="hs-accordion-group p-6 w-full flex flex-col flex-wrap" data-hs-accordion-always-open>
        <ul class="space-y-1.5">
            {{-- Dashboard --}}
             @can('dashboard')
            <li>
                <a @class([
                        'flex items-center gap-x-3.5 py-2 px-2.5 text-sm rounded-lg',
                        'bg-gray-100 text-gray-800 dark:bg-gray-900 dark:text-white' => request()->routeIs('dashboard'),
                        'text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-900 dark:text-gray-400 dark:hover:text-gray-300' => !request()->routeIs('dashboard')
                    ])
                   href="{{ route('dashboard') }}" >
                    <svg class="size-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" /></svg>
                    Dashboard
                </a>
            </li>
            @endcan


                <li class="hs-accordion" id="favorites-accordion">
                <button type="button" class="hs-accordion-toggle w-full text-start flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-gray-700 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-900 dark:text-gray-400 dark:hover:text-gray-300">
                    <svg class="size-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" /></svg>
                    Setup
                    <svg class="hs-accordion-active:block ms-auto hidden size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m18 15-6-6-6 6"/></svg>
                    <svg class="hs-accordion-active:hidden ms-auto block size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m6 9 6 6 6-6"/></svg>
                </button>
                <div id="favorites-accordion-child" class="hs-accordion-content w-full overflow-hidden transition-[height] duration-300 hidden">
                    <ul class="pt-2 ps-2">

                        @can('treatment.manage')
                        <li>
                            <a href="{{ route('treatment.manage') }}"
                               @class([
                                   'flex items-center gap-x-3.5 py-2 px-2.5 text-sm rounded-lg',
                                   'bg-gray-100 text-gray-800 dark:bg-gray-900 dark:text-white' => request()->routeIs('treatment.manage'),
                                   'text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-900 dark:text-gray-400 dark:hover:text-gray-300' => !request()->routeIs('treatment.manage'),
                               ])>
                                Services Lists
                            </a>
                        </li>
                        @endcan

                        @can('consultation-fees')
                        <li>
                            <a href="{{ route('consultation-fees') }}"
                               class="flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-gray-700 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-900 dark:text-gray-400 dark:hover:text-gray-300">
                                Register Service
                            </a>
                        </li>
                        @endcan

                    </ul>
                </div>
            </li>


                <li class="hs-accordion" id="favorites-accordion">
                <button type="button" class="hs-accordion-toggle w-full text-start flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-gray-700 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-900 dark:text-gray-400 dark:hover:text-gray-300">
                    <svg class="size-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" /></svg>
                    Staffs
                    <svg class="hs-accordion-active:block ms-auto hidden size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m18 15-6-6-6 6"/></svg>
                    <svg class="hs-accordion-active:hidden ms-auto block size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m6 9 6 6 6-6"/></svg>
                </button>
                <div id="favorites-accordion-child" class="hs-accordion-content w-full overflow-hidden transition-[height] duration-300 hidden">
         <ul class="pt-2 ps-2">

                        @can('users.create')
                        <li>
                            <a href="{{ route('users.create') }}"
                               @class([
                                   'flex items-center gap-x-3.5 py-2 px-2.5 text-sm rounded-lg',
                                   'bg-gray-100 text-gray-800 dark:bg-gray-900 dark:text-white' => request()->routeIs('users.create'),
                                   'text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-900 dark:text-gray-400 dark:hover:text-gray-300' => !request()->routeIs('users.create'),
                               ])>
                                Register Staff
                            </a>
                        </li>
                        @endcan

                        @can('users.list')
                        <li>
                            <a href="{{ route('users.list') }}"
                               class="flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-gray-700 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-900 dark:text-gray-400 dark:hover:text-gray-300">
                                View Staffs
                            </a>
                        </li>
                        @endcan

                     

                    </ul>
                </div>
            </li>



                <li class="hs-accordion" id="favorites-accordion">
                <button type="button" class="hs-accordion-toggle w-full text-start flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-gray-700 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-900 dark:text-gray-400 dark:hover:text-gray-300">
                    <svg class="size-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" /></svg>
                    Patients
                    <svg class="hs-accordion-active:block ms-auto hidden size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m18 15-6-6-6 6"/></svg>
                    <svg class="hs-accordion-active:hidden ms-auto block size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m6 9 6 6 6-6"/></svg>
                </button>
                <div id="favorites-accordion-child" class="hs-accordion-content w-full overflow-hidden transition-[height] duration-300 hidden">
                    <ul class="pt-2 ps-2">
<li>
    <a href="{{ route('patients.create') }}"
       @class(['flex items-center gap-x-3.5 py-2 px-2.5 text-sm rounded-lg', 'bg-gray-100 text-gray-800 dark:bg-gray-900 dark:text-white' => request()->routeIs('components'), 'text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-900 dark:text-gray-400 dark:hover:text-gray-300' => !request()->routeIs('components')])>
        Register Patient
    </a>
</li>

<li>
    <a href="{{ route('patients.index') }}"
       class="flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-gray-700 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-900 dark:text-gray-400 dark:hover:text-gray-300">
        View Patients
    </a>
</li>
<li>
    <a href="#" {{-- Replace with appropriate route --}}
       class="flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-gray-700 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-900 dark:text-gray-400 dark:hover:text-gray-300">
        Patient Reports
    </a>
</li>

                    </ul>
                </div>
            </li>

          <li>
    <a
        @class([
            'flex items-center gap-x-3.5 py-2 px-2.5 text-sm rounded-lg',
            'bg-gray-100 text-gray-800 dark:bg-gray-900 dark:text-white' => request()->routeIs('queue.manage'),
            'text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-900 dark:text-gray-400 dark:hover:text-gray-300' => !request()->routeIs('queue.manage')
        ])
        href="{{ route('queue.manage') }}"
    >
        <svg class="size-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" d="M21 7.5l-9-5.25L3 7.5m18 0l-9 5.25m9-5.25v9l-9 5.25M3 7.5l9 5.25M3 7.5v9l9 5.25m0-9v9" />
        </svg>
        <!-- Optionally add link text here -->
        <span>Queue Manager</span>
    </a>
</li>


<li>
    <a
        @class([
            'flex items-center gap-x-3.5 py-2 px-2.5 text-sm rounded-lg',
            'bg-gray-100 text-gray-800 dark:bg-gray-900 dark:text-white' => request()->routeIs('diagnosis.patients'),
            'text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-900 dark:text-gray-400 dark:hover:text-gray-300' => !request()->routeIs('diagnosis.patients')
        ])
        href="{{ route('diagnosis.patients') }}"
    >
        <svg class="size-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" >
            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2-10H7a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2V8a2 2 0 00-2-2z" />
        </svg>
        <span>Diagnosis Patients</span>
    </a>
</li>


<a
    @class([
        'flex items-center gap-x-3.5 py-2 px-2.5 text-sm rounded-lg',
        'bg-gray-100 text-gray-800 dark:bg-gray-900 dark:text-white' => request()->routeIs('treatment.approval'),
        'text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-900 dark:text-gray-400 dark:hover:text-gray-300' => !request()->routeIs('treatment.approval'),
    ])
    href="{{ route('treatment.approval') }}"
>
    <svg class="size-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" d="M21 7.5l-9-5.25L3 7.5m18 0l-9 5.25m9-5.25v9l-9 5.25M3 7.5l9 5.25M3 7.5v9l9 5.25m0-9v9" />
    </svg>
    Payment Approval
</a>


             <li>
                <a @class(['flex items-center gap-x-3.5 py-2 px-2.5 text-sm rounded-lg', 'bg-gray-100 text-gray-800 dark:bg-gray-900 dark:text-white' => request()->routeIs('components'), 'text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-900 dark:text-gray-400 dark:hover:text-gray-300' => !request()->routeIs('components')])
                   href="{{ route('components') }}"
                >
                    <svg class="size-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M21 7.5l-9-5.25L3 7.5m18 0l-9 5.25m9-5.25v9l-9 5.25M3 7.5l9 5.25M3 7.5v9l9 5.25m0-9v9" /></svg>
                    UI Components
                </a>
            </li>

            {{-- Inbox --}}
            <li>
                 <a class="flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-gray-700 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-900 dark:text-gray-400 dark:hover:text-gray-300" href="#">
                    <svg class="size-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 13.5h3.86a2.25 2.25 0 0 1 2.012 1.244l.256.512a2.25 2.25 0 0 0 2.013 1.244h3.218a2.25 2.25 0 0 0 2.013-1.244l.256-.512a2.25 2.25 0 0 1 2.012-1.244h3.86M4.5 3h15M4.5 7.5h15M4.5 12h15" /></svg>
                    Inbox
                     <span class="ms-auto inline-flex items-center gap-x-1.5 py-0.5 px-1.5 rounded-full text-xs font-medium bg-cyan-500 text-white">12</span>
                </a>
            </li>

          <li>
    <a 
        href="{{ route('medicines.manage') }}" 
        class="flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-gray-700 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-900 dark:text-gray-400 dark:hover:text-gray-300"
    >
        <svg class="size-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 13.5h3.86a2.25 2.25 0 0 1 2.012 1.244l.256.512a2.25 2.25 0 0 0 2.013 1.244h3.218a2.25 2.25 0 0 0 2.013-1.244l.256-.512a2.25 2.25 0 0 1 2.012-1.244h3.86M4.5 3h15M4.5 7.5h15M4.5 12h15" />
        </svg>
        Medicines
      <span class="ms-auto inline-flex items-center gap-x-1.5 py-0.5 px-1.5 rounded-full text-xs font-medium bg-cyan-500 text-white">
    {{ \App\Models\Medicine::sum('total_quantity') }}
</span>
    </a>
</li>


            {{-- 1-Level Accordion (Favorites) --}}
            <li class="hs-accordion" id="favorites-accordion">
                <button type="button" class="hs-accordion-toggle w-full text-start flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-gray-700 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-900 dark:text-gray-400 dark:hover:text-gray-300">
                    <svg class="size-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" /></svg>
                    Favorites
                    <svg class="hs-accordion-active:block ms-auto hidden size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m18 15-6-6-6 6"/></svg>
                    <svg class="hs-accordion-active:hidden ms-auto block size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m6 9 6 6 6-6"/></svg>
                </button>
                <div id="favorites-accordion-child" class="hs-accordion-content w-full overflow-hidden transition-[height] duration-300 hidden">
                    <ul class="pt-2 ps-2">
                        <li><a class="flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-gray-700 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-900 dark:text-gray-400 dark:hover:text-gray-300" href="#">Marketing Site</a></li>
                        <li><a class="flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-gray-700 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-900 dark:text-gray-400 dark:hover:text-gray-300" href="#">Android App</a></li>
                        <li><a class="flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-gray-700 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-900 dark:text-gray-400 dark:hover:text-gray-300" href="#">Brand Guidelines</a></li>
                    </ul>
                </div>
            </li>
        
                <li class="hs-accordion" id="favorites-accordion">
                <button type="button" class="hs-accordion-toggle w-full text-start flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-gray-700 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-900 dark:text-gray-400 dark:hover:text-gray-300">
                    <svg class="size-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" /></svg>
                    Reports
                    <svg class="hs-accordion-active:block ms-auto hidden size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m18 15-6-6-6 6"/></svg>
                    <svg class="hs-accordion-active:hidden ms-auto block size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m6 9 6 6 6-6"/></svg>
                </button>
                <div id="favorites-accordion-child" class="hs-accordion-content w-full overflow-hidden transition-[height] duration-300 hidden">
                    <ul class="pt-2 ps-2">
<li>
    <a href="{{ route('consultation.payment') }}"
       @class(['flex items-center gap-x-3.5 py-2 px-2.5 text-sm rounded-lg', 'bg-gray-100 text-gray-800 dark:bg-gray-900 dark:text-white' => request()->routeIs('components'), 'text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-900 dark:text-gray-400 dark:hover:text-gray-300' => !request()->routeIs('components')])>
        Consultation Payment
    </a>
</li>
<li>
    <a href="{{ route('patients.index') }}"
       class="flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-gray-700 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-900 dark:text-gray-400 dark:hover:text-gray-300">
        View Patients
    </a>
</li>
<li>
    <a href="#" {{-- Replace with appropriate route --}}
       class="flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-gray-700 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-900 dark:text-gray-400 dark:hover:text-gray-300">
        Patient Reports
    </a>
</li>

                    </ul>
                </div>
            </li>

        </ul>
    </nav>
</div>
<!-- End Sidebar -->