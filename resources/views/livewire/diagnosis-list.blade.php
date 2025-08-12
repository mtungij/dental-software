<div>
    <h2 class="text-xl font-bold mb-4">Patients Awaiting Diagnosis</h2>

    @if (session()->has('message'))
        <div class="text-green-600 mb-2">
            {{ session('message') }}
        </div>
    @endif

    <table class="min-w-full divide-y divide-gray-200">
        <thead>
            <tr>
                <th class="px-4 py-2 text-left">Name</th>
                <th class="px-4 py-2 text-left">Patient Number</th>
                <th class="px-4 py-2 text-left">Status</th>
                <th class="px-4 py-2 text-left">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-100">
            @forelse($queues as $item)
                <tr>
                    <td class="px-4 py-2">{{ $item->patient->name }}</td>
                    <td class="px-4 py-2">{{ $item->patient->patient_number }}</td>
                    <td class="px-4 py-2">{{ $item->status }}</td>
                    <td class="px-4 py-2 space-x-2">
<button wire:click="callPatient('{{ $item->patient->name }}')"
                class="px-3 py-1 bg-blue-500 text-white rounded">Call Patient</button>



                        <button wire:click="startTreatment({{ $item->id }})" class="bg-blue-600 text-white px-2 py-1 rounded">Start Treatment</button>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="px-4 py-4 text-center text-gray-500">
                        No patients waiting for diagnosis.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

    
</div>
