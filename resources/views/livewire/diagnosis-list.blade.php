<div class="p-6 bg-white dark:bg-gray-900 rounded-lg shadow-md">
    <h2 class="text-2xl font-bold mb-6 text-gray-800 dark:text-gray-200">Patients Awaiting Diagnosis</h2>

    @if (session()->has('message'))
        <div class="bg-green-100 dark:bg-green-800 text-green-800 dark:text-green-200 px-4 py-2 rounded mb-4">
            {{ session('message') }}
        </div>
    @endif

    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
            <thead class="bg-cyan-500 dark:bg-cyan-700">
                <tr>
                    <th class="px-4 py-3 text-left text-white uppercase text-sm font-medium">Name</th>
                    <th class="px-4 py-3 text-left text-white uppercase text-sm font-medium">Patient Number</th>
                    <th class="px-4 py-3 text-left text-white uppercase text-sm font-medium">Status</th>
                    <th class="px-4 py-3 text-left text-white uppercase text-sm font-medium">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white dark:bg-gray-900 divide-y divide-gray-100 dark:divide-gray-700">
                @forelse($queues as $item)
                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-800 transition-colors">
                        <td class="px-4 py-3 text-gray-800 dark:text-gray-200">{{ $item->patient->name }}</td>
                        <td class="px-4 py-3 text-gray-800 dark:text-gray-200">{{ $item->patient->patient_number }}</td>
                        <td class="px-4 py-3">
                            @php
                                $statusClasses = [
                                 
                                    'under_treatment' => 'bg-blue-100 text-blue-800 dark:bg-blue-800 dark:text-blue-100',
                                    'diagnosing' => 'bg-green-100 text-green-800 dark:bg-green-800 dark:text-green-100',
                                 
                                ];
                            @endphp
                            <span class="px-2 py-1 rounded-full text-sm font-semibold {{ $statusClasses[$item->status] ?? 'bg-gray-100 dark:bg-gray-700 text-gray-800 dark:text-gray-200' }}">
                                {{ $item->status }}
                            </span>
                        </td>
                        <td class="px-4 py-3 space-x-2 flex items-center">
                            <!-- Call Patient Button -->
                            <button wire:click="callPatient('{{ $item->patient->name }}')"
                                class="flex items-center px-3 py-1 bg-blue-500 hover:bg-blue-600 text-white rounded transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5h2l3.6 7.59-1.35 2.44A11.037 11.037 0 0014.09 20h3.91v-2h-3.91a9.03 9.03 0 01-7.64-4.09l1.35-2.44L3 5z" />
                                </svg>
                                Call
                            </button>

                            <!-- Start Treatment Button -->
                            <button wire:click="startTreatment({{ $item->id }})"
                                class="flex items-center px-3 py-1 bg-indigo-500 hover:bg-indigo-600 text-white rounded transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v2a2 2 0 104 0v-2m-4-6V7a2 2 0 114 0v4m-4 0h4" />
                                </svg>
                                Treat
                            </button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="px-4 py-6 text-center text-gray-500 dark:text-gray-400">
                            No patients waiting for diagnosis.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
