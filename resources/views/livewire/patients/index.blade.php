<section class="bg-gray-50 dark:bg-gray-900 p-3 sm:p-5">
    <div class="w-full">
        <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">

            <!-- Header: Search & Actions -->
            <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
                <div class="w-full md:w-1/2">
                    <form class="flex items-center">
                        <label for="simple-search" class="sr-only">Search</label>
                        <div class="relative w-full">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            <input type="text" id="simple-search"
                                   class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2
                                          dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                   placeholder="Search" required>
                        </div>
                    </form>
                </div>
             
            </div>

            <!-- Patients Table -->
            <div class="overflow-x-auto">
                <h1 class="text-2xl dark:text-gray-200 font-bold mb-4">Patients List</h1>
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-cyan-700 uppercase bg-gray-50 dark:bg-cyan-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-4 py-3">S/No</th>
                            <th scope="col" class="px-4 py-3">Patient Name</th>
                            <th scope="col" class="px-4 py-3">Phone Number</th>
                            <th scope="col" class="px-4 py-3">Patient Number</th>
                            <th scope="col" class="px-4 py-3">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($patients as $patient)
                        <tr class="border-b dark:border-gray-700 hover:bg-gray-100 dark:hover:bg-gray-700">
                            <th scope="row" class="px-4 py-3 font-medium text-gray-800 dark:text-white whitespace-nowrap">{{ $loop->iteration }}</th>
                            <td class="px-4 py-3 dark:text-gray-200">{{ $patient->name }}</td>
                            <td class="px-4 py-3 dark:text-gray-200">{{ $patient->phone }}</td>
                            <td class="px-4 py-3 dark:text-gray-200">{{ $patient->patient_number }}</td>
                            <td class="px-4 py-3 flex items-center justify-end">

                                <div class="flex flex-col bg-white border shadow-sm rounded-xl dark:bg-gray-800 dark:border-gray-700">
                                    <div class="hs-dropdown relative inline-flex">
                                        <button type="button"
                                                class="hs-dropdown-toggle py-3 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50
                                                       dark:bg-gray-800 dark:border-gray-700 dark:text-white dark:hover:bg-gray-700">
                                            Actions
                                            <svg class="hs-dropdown-open:rotate-180 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                <path d="m6 9 6 6 6-6" />
                                            </svg>
                                        </button>
                                        <div class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden min-w-60 bg-white shadow-md rounded-lg mt-2
                                                   dark:bg-gray-800 dark:border dark:border-gray-700 dark:divide-gray-700" role="menu" aria-orientation="vertical">
                                            <div class="p-1 space-y-0.5">
                                           <button wire:click.prevent="editPatient({{ $patient->id }})" 
        class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-600 w-full text-left">
    Edit
</button>

                                                <a href="#" class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700">
                                                    Patient History
                                                </a>
                                                <a href="#" wire:click.prevent="confirmDelete({{ $patient->id }})" class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-red-600 hover:bg-gray-100 dark:text-red-400 dark:hover:bg-gray-700">
                                                    Delete
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Delete Modal -->
                                @if($confirmingDeleteId === $patient->id)
                                <div class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
                                    <div class="bg-white dark:bg-gray-700 rounded-lg shadow p-6 max-w-md w-full text-center">
                                        <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">
                                            Are you sure you want to delete <strong>{{ $patient->name }}</strong>?
                                        </h3>
                                        <button wire:click="deletePatient({{ $patient->id }})"
                                                class="text-white bg-red-600 hover:bg-red-800 dark:bg-red-500 dark:hover:bg-red-700 font-medium rounded-lg text-sm px-5 py-2.5">
                                            Yes, delete
                                        </button>
                                        <button wire:click="$set('confirmingDeleteId', null)"
                                                class="ms-3 py-2.5 px-5 text-sm font-medium text-gray-900 bg-white rounded-lg border border-gray-200 hover:bg-gray-100 dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 dark:hover:bg-gray-700">
                                            No, cancel
                                        </button>
                                    </div>
                                </div>
                                @endif

                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                <!-- Edit Patient Modal -->
@if($editingPatient)
<div class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
    <div class="bg-white dark:bg-gray-700 rounded-xl shadow-lg p-6 max-w-md w-full">
        <h3 class="text-lg font-semibold text-gray-700 dark:text-gray-200 mb-4">Edit Patient</h3>
        <div class="space-y-4">
            <input type="text" wire:model="name" placeholder="Patient Name" class="w-full px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-600 dark:bg-gray-800 dark:text-white">
            <input type="text" wire:model="phone" placeholder="Phone" class="w-full px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-600 dark:bg-gray-800 dark:text-white">
            <input type="text" wire:model="patient_number" placeholder="Patient Number" class="w-full px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-600 dark:bg-gray-800 dark:text-white">
        </div>
        <div class="mt-6 flex justify-end gap-4">
            <button wire:click="updatePatient" class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg">Save</button>
            <button wire:click="$set('editingPatient', null)" class="px-4 py-2 bg-gray-300 hover:bg-gray-400 rounded-lg dark:bg-gray-600 dark:text-white">Cancel</button>
        </div>
    </div>
</div>
@endif

            </div>

        </div>
    </div>
</section>
