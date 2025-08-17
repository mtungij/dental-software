<section class="p-4 bg-gray-50 dark:bg-gray-900">
    <div class="container mx-auto">
        <h2 class="text-2xl font-bold mb-4 text-gray-800 dark:text-white">
            Paid Medicine Fees
        </h2>

        <!-- Date Filter -->
        <div class="mb-4 flex flex-col sm:flex-row gap-2 items-end">
            <div>
                <label class="block text-gray-700 dark:text-gray-300">From Date</label>
                <input type="date" wire:model="from_date"
                    class="border rounded px-2 py-1 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-200">
            </div>
            <div>
                <label class="block text-gray-700 dark:text-gray-300">To Date</label>
                <input type="date" wire:model="to_date"
                    class="border rounded px-2 py-1 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-200">
            </div>
            <div class="flex gap-2">
                <button wire:click="filterInvoices"
                    class="px-4 py-1 bg-blue-500 text-white rounded hover:bg-blue-600">Submit</button>
                <button wire:click="resetFilters"
                    class="px-4 py-1 bg-red-500 text-white rounded hover:bg-red-600">Reset</button>
                <button wire:click="downloadPdf"
                    class="px-4 py-1 bg-green-500 text-white rounded hover:bg-green-600">Download PDF</button>
            </div>
        </div>

        @error('date_error')
            <div class="mb-2 text-red-600 dark:text-red-400">{{ $message }}</div>
        @enderror

        <!-- Table -->
        <table class="min-w-full table-auto border-collapse border border-gray-300 dark:border-gray-700">
            <thead>
                <tr class="bg-gray-200 dark:bg-gray-800 text-gray-700 dark:text-gray-300">
                    <th class="border px-4 py-2">Invoice ID</th>
                    <th class="border px-4 py-2">Patient</th>
                    <th class="border px-4 py-2">Medicine Details</th>
                    <th class="border px-4 py-2">Total Amount</th>
                    <th class="border px-4 py-2">Date Paid</th>
                </tr>
            </thead>
            <tbody>
                @forelse($totalInvoices as $invoice)
                    <tr class="text-gray-800 dark:text-gray-200">
                        <td class="border px-4 py-2">{{ $invoice->id }}</td>
                        <td class="border px-4 py-2">{{ $invoice->queue->patient->name ?? 'N/A' }}</td>
                        <td class="border px-4 py-2">
                            <ul>
                                @foreach($invoice->invoiceItems as $item)
                                    <li>{{ $item->medicine->name ?? 'N/A' }} - {{ number_format($item->price,2) }}</li>
                                @endforeach
                            </ul>
                        </td>
                        <td class="border px-4 py-2">{{ number_format($invoice->total_amount,2) }}</td>
                        <td class="border px-4 py-2">{{ $invoice->updated_at->format('Y-m-d H:i') }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="border px-4 py-2 text-center text-gray-500 dark:text-gray-400">
                            No medicine fees found for selected date.
                        </td>
                    </tr>
                @endforelse
            </tbody>
            @if($totalInvoices->count())
                <tfoot>
                    <tr class="bg-gray-100 dark:bg-gray-800 text-gray-800 dark:text-gray-200 font-bold">
                        <td colspan="3" class="border px-4 py-2 text-right">Total:</td>
                        <td class="border px-4 py-2">{{ number_format($this->totalAmount,2) }}</td>
                        <td class="border px-4 py-2"></td>
                    </tr>
                </tfoot>
            @endif
        </table>
    </div>
</section>
