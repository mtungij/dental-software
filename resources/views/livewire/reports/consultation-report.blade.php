<div class="p-6 bg-white rounded shadow-md">

    <h2 class="text-2xl font-bold mb-6">Consultation Payments Report</h2>

    <div class="flex flex-wrap items-center gap-4 mb-6">
        <!-- Date Filter -->
        <div>
            <label for="date" class="block text-sm font-medium text-gray-700 mb-1">Date</label>
            <input type="date" id="date" wire:model="selectedDate" 
                class="border rounded px-3 py-2 w-full max-w-xs" />
        </div>

        <!-- Price Type Filter -->
        <div>
            <label for="priceType" class="block text-sm font-medium text-gray-700 mb-1">Price Type</label>
            <select id="priceType" wire:model="priceType" 
                class="border rounded px-3 py-2 w-full max-w-xs">
                <option value="all">All</option>
                <option value="standard">Standard</option>
                <option value="fast_track">Fast Track</option>
            </select>
        </div>

        <!-- Export PDF Button -->
        <div class="self-end">
            <button wire:click="generateReport" 
                class="bg-cyan-600 text-white px-5 py-2 rounded hover:bg-cyan-700 transition">
                Export PDF
            </button>
        </div>
    </div>

    <p class="mb-4 text-sm text-gray-600">
        Total Patients: {{ $consultations->count() }} | 
        Total Amount: <strong>{{ number_format($consultations->sum('total_amount'), 2) }} TZS</strong>
    </p>

    <table class="w-full border border-gray-300">
        <thead>
            <tr class="bg-gray-200">
                <th class="p-2 text-left">Patient Name</th>
                <th class="p-2 text-left">Price Type</th>
                <th class="p-2 text-left">Amount</th>
                <th class="p-2 text-left">Paid At</th>
            </tr>
        </thead>
        <tbody>
            @forelse($consultations as $invoice)
                <tr class="border-t">
                    <td class="p-2">{{ $invoice->patient ? $invoice->patient->name : 'N/A' }}</td>
                    <td class="p-2">{{ ucfirst(str_replace('_', ' ', $invoice->price_type)) }}</td>
                    <td class="p-2">{{ number_format($invoice->total_amount, 2) }}</td>
                    <td class="p-2">{{ $invoice->created_at->format('H:i') }}</td>
                </tr>
            @empty
                <tr><td colspan="4" class="p-4 text-center text-gray-500">No records found.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
