<div>
  <section class="w-full bg-gray-50 dark:bg-gray-900 p-4 sm:p-6 lg:p-8">
    <div class="w-full space-y-6">

      {{-- Alerts --}}
      @if (session()->has('success'))
          <div class="bg-green-500 text-white px-4 py-3 rounded-lg shadow mb-4 text-center">
              {{ session('success') }}
          </div>
      @endif

      @if ($errors->any())
          <div class="bg-red-500 text-white px-4 py-3 rounded-lg shadow mb-4 text-center">
              {{ $errors->first() }}
          </div>
      @endif

      {{-- Total Paid Cards (Clickable) --}}
    {{-- Total Paid Cards --}}
<div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-6">
    <div wire:click="viewTotalInvoices('investigation')"
         class="cursor-pointer bg-green-100 dark:bg-green-900 p-4 rounded-lg shadow flex flex-col items-center justify-center hover:scale-105 transform transition">
        <span class="text-gray-800 dark:text-green-200 text-sm font-semibold">Total Investigation Paid Today</span>
        <span class="text-2xl font-bold text-green-700 dark:text-green-100 mt-2">
            {{ number_format($this->totalInvestigationPaidToday, 2) }}
        </span>
    </div>

    <div wire:click="viewTotalInvoices('medicine')"
         class="cursor-pointer bg-blue-100 dark:bg-blue-900 p-4 rounded-lg shadow flex flex-col items-center justify-center hover:scale-105 transform transition">
        <span class="text-gray-800 dark:text-blue-200 text-sm font-semibold">Total Medicine Paid Today</span>
        <span class="text-2xl font-bold text-blue-700 dark:text-blue-100 mt-2">
            {{ number_format($this->totalMedicinePaidToday, 2) }}
        </span>
    </div>

    <div wire:click="viewTotalInvoices('consultation')"
         class="cursor-pointer bg-purple-100 dark:bg-purple-900 p-4 rounded-lg shadow flex flex-col items-center justify-center hover:scale-105 transform transition">
        <span class="text-gray-800 dark:text-purple-200 text-sm font-semibold">Total Consultation Paid Today</span>
        <span class="text-2xl font-bold text-purple-700 dark:text-purple-100 mt-2">
            {{ number_format($this->totalConsultationPaidToday, 2) }}
        </span>
    </div>
</div>




      {{-- Investigation Invoices --}}
      <div class="overflow-x-auto bg-white dark:bg-gray-800 rounded-lg shadow p-4">
        <h3 class="text-xl font-semibold text-gray-800 dark:text-gray-100 mb-4">Investigation Invoices</h3>
        <table class="min-w-full border-collapse border border-gray-200 dark:border-gray-700 text-sm sm:text-base">
          <thead class="bg-cyan-500 text-white">
            <tr>
              <th class="border border-gray-300 px-3 py-2 text-left">#</th>
              <th class="border border-gray-300 px-3 py-2 text-left">Patient</th>
              <th class="border border-gray-300 px-3 py-2 text-left">Type</th>
              <th class="border border-gray-300 px-3 py-2 text-left">Amount</th>
              <th class="border border-gray-300 px-3 py-2 text-left">Actions</th>
            </tr>
          </thead>
          <tbody>
            @forelse ($investigationInvoices as $index => $invoice)
              <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
                <td class="border border-gray-300 px-3 py-2">{{ $index + 1 }}</td>
                <td class="border border-gray-300 px-3 py-2">{{ $invoice->queue->patient->name ?? '' }}</td>
                <td class="border border-gray-300 px-3 py-2">
                  @foreach($invoice->treatment_names as $t)
                      {{ $t['price_type'] === 'fast_track_price' ? 'Fast Track Patient' : 'Standard Patient' }}
                  @endforeach
                </td>
                <td class="border border-gray-300 px-3 py-2">{{ number_format($invoice->total_amount, 2) }}</td>
                <td class="border border-gray-300 px-3 py-2 space-x-2">
                  @if($invoice->status === 'paid')
                    <a href="{{ route('invoice.investigation.print', ['id' => $invoice->id]) }}" 
                       target="_blank"
                       class="bg-green-500 hover:bg-green-600 text-white px-3 py-1 rounded transition">
                        Print
                    </a>
                  @else
                    <button wire:click="viewInvestigationInvoice({{ $invoice->id }})" 
                            class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded transition">
                        View
                    </button>
                  @endif
                </td>
              </tr>
            @empty
              <tr><td colspan="5" class="text-center py-3 text-gray-500">No investigation invoices found.</td></tr>
            @endforelse
          </tbody>
        </table>

@if($showTotalsModal)
<div class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 p-4">
    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg w-full max-w-4xl p-6">
        
        {{-- Modal Title --}}
        <h4 class="text-2xl font-bold text-gray-800 dark:text-gray-100 mb-5">
            @if($totalModalType === 'investigation') 🧪 Investigation Payments Today
            @elseif($totalModalType === 'medicine') 💊 Medicine Payments Today
            @else 💼 Consultation Payments Today
            @endif
        </h4>

        {{-- Table Container with Scroll Shadows --}}
        <div class="relative max-h-[28rem] overflow-y-auto rounded-lg border border-gray-200 dark:border-gray-700 shadow-inner">
            {{-- Top Shadow --}}
            <div class="absolute top-0 left-0 right-0 h-4 bg-gradient-to-b from-gray-200 dark:from-gray-700 to-transparent pointer-events-none z-10"></div>
            
            <table class="min-w-full text-sm sm:text-base">
                <thead class="bg-cyan-500 text-white sticky top-0 z-20 shadow">
                    <tr>
                        <th class="px-3 py-2 text-left">#</th>
                        <th class="px-3 py-2 text-left">Patient</th>
                        <th class="px-3 py-2 text-left">
                            @if($totalModalType === 'investigation') Treatments
                            @elseif($totalModalType === 'medicine') Medicines
                            @else Price Type
                            @endif
                        </th>
                        <th class="px-3 py-2 text-right">Total Amount</th>
                        <th class="px-3 py-2 text-left">Status</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                    @php $grandTotal = 0; @endphp
                    @forelse($totalInvoices as $index => $invoice)
                        @php $grandTotal += $invoice->total_amount; @endphp
                        <tr class="{{ $loop->even ? 'bg-gray-50 dark:bg-gray-900' : '' }} hover:bg-gray-100 dark:hover:bg-gray-700">
                            <td class="px-3 py-2">{{ $index + 1 }}</td>
                            <td class="px-3 py-2 font-semibold text-gray-800 dark:text-gray-200">
                                {{ $invoice->queue->patient->name ?? $invoice->patient->name ?? '' }}
                            </td>
                            <td class="px-3 py-2">
                                @if($totalModalType === 'investigation')
                                    <ul class="list-disc ml-5 space-y-1">
                                        @foreach($invoice->treatmentDetails ?? [] as $t)
                                            <li class="text-gray-700 dark:text-gray-300">
                                                {{ $t['name'] }} 
                                                <span class="text-xs text-gray-500">({{ $t['price_type'] }})</span>
                                                – {{ number_format($t['price'], 2) }}
                                            </li>
                                        @endforeach
                                    </ul>
                                @elseif($totalModalType === 'medicine')
                                    <ul class="list-disc ml-5 space-y-1">
                                        @foreach($invoice->invoiceItems ?? [] as $item)
                                            <li class="text-gray-700 dark:text-gray-300">
                                                {{ $item->medicine->name ?? '' }} 
                                                <span class="text-xs text-gray-500">x{{ $item->quantity }}</span>
                                                – {{ number_format($item->price, 2) }}
                                            </li>
                                        @endforeach
                                    </ul>
                                @elseif($totalModalType === 'consultation')
                                    <span class="px-2 py-1 bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200 rounded text-sm">
                                        {{ ucfirst($invoice->price_type) }}
                                    </span>
                                @endif
                            </td>
                            <td class="px-3 py-2 text-right font-medium">{{ number_format($invoice->total_amount, 2) }}</td>
                            <td class="px-3 py-2 capitalize">
                                <span class="{{ $invoice->status === 'paid' ? 'text-green-600 dark:text-green-400' : 'text-red-600 dark:text-red-400' }}">
                                    {{ $invoice->status }}
                                </span>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center py-3 text-gray-500">No payments found today.</td>
                        </tr>
                    @endforelse
                </tbody>
                @if($totalInvoices->count())
                <tfoot class="sticky bottom-0 bg-gray-200 dark:bg-gray-700 font-bold shadow-inner">
                    <tr>
                        <td colspan="3" class="px-3 py-2 text-right">Grand Total:</td>
                        <td class="px-3 py-2 text-right">{{ number_format($grandTotal, 2) }}</td>
                        <td></td>
                    </tr>
                </tfoot>
                @endif
            </table>

            {{-- Bottom Shadow --}}
            <div class="absolute bottom-0 left-0 right-0 h-4 bg-gradient-to-t from-gray-200 dark:from-gray-700 to-transparent pointer-events-none z-10"></div>
        </div>

        {{-- Close Button --}}
        <div class="mt-6 flex justify-end">
            <button wire:click="$set('showTotalsModal', false)" 
                    class="bg-gray-500 hover:bg-gray-600 text-white px-5 py-2 rounded-lg transition">
                Close
            </button>
        </div>
    </div>
</div>
@endif



      </div>

      {{-- Medicine Invoices --}}
      <div class="overflow-x-auto bg-white dark:bg-gray-800 rounded-lg shadow p-4">
        <h3 class="text-xl font-semibold text-gray-800 dark:text-gray-100 mb-4 mt-6">Medicine Invoices</h3>
        <table class="min-w-full border-collapse border border-gray-200 dark:border-gray-700 text-sm sm:text-base">
          <thead class="bg-cyan-500 text-white">
            <tr>
              <th class="border border-gray-300 px-3 py-2 text-left">#</th>
              <th class="border border-gray-300 px-3 py-2 text-left">Patient</th>
              <th class="border border-gray-300 px-3 py-2 text-left">Amount</th>
              <th class="border border-gray-300 px-3 py-2 text-left">Actions</th>
            </tr>
          </thead>
          <tbody>
            @forelse ($medicineInvoices as $index => $invoice)
              <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
                <td class="border border-gray-300 px-3 py-2">{{ $index + 1 }}</td>
                <td class="border border-gray-300 px-3 py-2">{{ $invoice->queue->patient->name ?? '' }}</td>
                <td class="border border-gray-300 px-3 py-2">{{ number_format($invoice->total_amount, 2) }}</td>
                <td class="border border-gray-300 px-3 py-2 space-x-2">
                  @if($invoice->status === 'paid')
                    <a href="{{ route('invoice.medicine.print', ['id' => $invoice->id]) }}" 
                       target="_blank"
                       class="bg-green-500 hover:bg-green-600 text-white px-3 py-1 rounded transition">
                        Print
                    </a>
                  @else
                    <button wire:click="viewMedicineInvoice({{ $invoice->id }})" 
                            class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded transition">
                        View
                    </button>
                  @endif
                </td>
              </tr>
            @empty
              <tr><td colspan="4" class="text-center py-3 text-gray-500">No medicine invoices found.</td></tr>
            @endforelse
          </tbody>
        </table>
      </div>

      {{-- Modals --}}
   

    </div>
  </section>
</div>
