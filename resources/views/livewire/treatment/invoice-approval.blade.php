<section class="w-full bg-gray-50 dark:bg-gray-900 p-4 sm:p-6 lg:p-8">
  <div class="w-full space-y-10">

    <!-- Investigation Invoices -->
    <div>
      <h2 class="text-2xl font-bold mb-4 text-gray-800 dark:text-gray-200 flex items-center gap-2">
        🧾 Investigation Invoices
      </h2>
      <div class="bg-white dark:bg-gray-800 shadow-lg rounded-lg overflow-hidden">
        <div class="overflow-x-auto">
          <table class="w-full text-sm text-left text-gray-600 dark:text-gray-300">
            <thead class="text-xs font-semibold uppercase bg-cyan-600 text-white dark:bg-cyan-700 rounded-t-lg">
              <tr class="rounded-t-lg">
                <th class="px-6 py-4 rounded-tl-lg">S/No</th>
                <th class="px-6 py-4">Patient Name</th>
                <th class="px-6 py-4">Patient Type</th>
                <th class="px-6 py-4">Total Invoice</th>
                <th class="px-6 py-4">Treatments</th>
                <th class="px-6 py-4 rounded-tr-lg text-right">Actions</th>
              </tr>
            </thead>
            <tbody>
              @forelse ($this->investigationInvoices() as $index => $invoice)
                <tr class="border-b dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-700/50 transition">
                  <td class="px-6 py-4 font-medium text-gray-900 dark:text-white">{{ $index + 1 }}</td>
                  <td class="px-6 py-4">{{ $invoice->queue->patient->name }}</td>
                  <td class="px-6 py-4">
                    @php
                      $patientType = 'Standard Patient';
                      if (!empty($invoice->treatment_names)) {
                        $firstPriceType = $invoice->treatment_names[0]['price_type'] ?? null;
                        if ($firstPriceType === 'fast_track_price') {
                          $patientType = 'Fast Track Patient';
                        }
                      }
                    @endphp
                    {{ $patientType }}
                  </td>
                  <td class="px-6 py-4 font-semibold text-cyan-700 dark:text-cyan-400">{{ number_format($invoice->total_amount) }}</td>
                  <td class="px-6 py-4">
                    <ul class="list-disc list-inside space-y-1">
                      @foreach($invoice->treatment_names ?? [] as $treatment)
                        <li>{{ $treatment['name'] }} — {{ number_format($treatment['price'] )}}</li>
                      @endforeach
                    </ul>
                  </td>
                  <td class="px-6 py-4 text-right space-x-2">
                    <button
                      wire:click="approveInvestigationPayment({{ $invoice->id }})"
                      class="bg-green-600 hover:bg-green-700 focus:ring-2 focus:ring-green-500 focus:ring-opacity-50 text-white px-5 py-2 rounded-lg text-sm shadow-sm transition"
                    >
                      Approve Payment & Print
                    </button>
                  </td>
                </tr>
              @empty
                <tr>
                  <td colspan="6" class="px-6 py-6 text-center text-gray-500 dark:text-gray-400">No investigation invoices found.</td>
                </tr>
              @endforelse
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <!-- Medicine Invoices -->
    <div>
      <h2 class="text-2xl font-bold mb-4 text-gray-800 dark:text-gray-200 flex items-center gap-2">
        💊 Medicine Invoices
      </h2>
      <div class="bg-white dark:bg-gray-800 shadow-lg rounded-lg overflow-hidden">
        <div class="overflow-x-auto">
          <table class="w-full text-sm text-left text-gray-600 dark:text-gray-300">
            <thead class="text-xs font-semibold uppercase bg-cyan-600 text-white dark:bg-cyan-700 rounded-t-lg">
              <tr class="rounded-t-lg">
                <th class="px-6 py-4 rounded-tl-lg">S/No</th>
                <th class="px-6 py-4">Patient Name</th>
                <th class="px-6 py-4">Total Invoice</th>
                <th class="px-6 py-4">Medicines</th>
                <th class="px-6 py-4 rounded-tr-lg text-right">Actions</th>
              </tr>
            </thead>
            <tbody>
              @forelse ($medicineInvoices as $index => $invoice)
                <tr class="border-b dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-700/50 transition align-top">
                  <td class="px-6 py-4 font-medium text-gray-900 dark:text-white">{{ $index + 1 }}</td>
                  <td class="px-6 py-4">{{ $invoice->queue->patient->name }}</td>
                  <td class="px-6 py-4 font-semibold text-cyan-700 dark:text-cyan-400">{{ number_format($invoice->total_amount) }}</td>
                  <td class="px-6 py-4">
                    <ul class="list-disc list-inside space-y-1">
                      @foreach($invoice->invoiceItems as $item)
                        <li>{{ $item->medicine->name ?? 'Unknown Medicine' }} — {{ number_format($item->price) }}</li>
                      @endforeach
                    </ul>
                  </td>
                  <td class="px-6 py-4 text-right space-x-2">
                  <button 
    wire:click="approveMedicinePayment({{ $invoice->id }})"  
    class="bg-green-600 hover:bg-green-700 text-white px-5 py-2 rounded-lg text-sm shadow-sm">
    Approve Payment & Print
</button>

<button class="bg-green-700 hover:bg-green-800 text-white px-5 py-2 rounded-lg text-sm shadow-sm" wire:click="testClick">Test Click</button>


                  </td>
                </tr>
              @empty
                <tr>
                  <td colspan="5" class="px-6 py-6 text-center text-gray-500 dark:text-gray-400">No medicine invoices found.</td>
                </tr>
              @endforelse
            </tbody>
          </table>
        </div>
      </div>
    </div>

  </div>
</section>
