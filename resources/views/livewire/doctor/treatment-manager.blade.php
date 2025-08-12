<div class="p-4">
    <h2 class="text-xl font-bold mb-4">Doctor Dashboard - Treat Patients</h2>

    <h3>Patients Diagnosing</h3>
    <ul>
        @foreach ($queueDiagnosing as $item)
            <li>
                <button wire:click="selectPatient({{ $item->id }})">{{ $item->patient->name }}</button>
            </li>
        @endforeach
    </ul>

    @if ($queuePatient)
        <div class="mt-4 border p-4 rounded bg-white">
            <h4>Patient: {{ $queuePatient->patient->name }}</h4>

            <h5>Treatments</h5>
            <ul>
                @foreach ($treatments as $t)
                    <li>
                        {{ $t->name }} - <button wire:click="addTreatment({{ $t->id }})" class="bg-green-500 text-white px-2 py-1 rounded">Add</button>
                    </li>
                @endforeach
            </ul>

            <h5>Selected Treatments</h5>
            <ul>
                @foreach ($selectedTreatments as $id => $qty)
                    <li>{{ $treatments->find($id)->name ?? 'Unknown' }} x {{ $qty }}</li>
                @endforeach
            </ul>

            <button wire:click="submitInvoice" class="mt-4 bg-blue-600 text-white px-4 py-2 rounded">Send Invoice to Reception</button>
        </div>
    @endif

    @if (session()->has('success'))
        <div class="text-green-600 mt-3">{{ session('success') }}</div>
    @endif
</div>
