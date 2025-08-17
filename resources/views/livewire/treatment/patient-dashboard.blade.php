
<div class="w-full p-6 bg-gray-50 dark:bg-gray-900 min-h-screen">

  <!-- Patient Header -->
  <div class="w-full mb-8 dark:bg-gray-800 rounded shadow-xl overflow-hidden">
    <div class="h-[100px] bg-gradient-to-r from-green-500 to-blue-500"></div>
    <div class="px-5 py-4 flex items-center gap-6 -mt-14">
      <div class="w-[90px] h-[90px] shadow-md rounded-full border-4 border-white overflow-hidden">
        <img class="w-full h-full object-cover" src="{{ asset('images/patient.png') }}" alt="Patient Image">
      </div>
      <div>
        @if ($selectedQueue)
          <h3 class="uppercase text-xl text-slate-900 font-bold leading-6 dark:text-white">{{ $selectedQueue->patient->name }}</h3>
          <p class="text-sm text-gray-600 dark:text-gray-300">{{ $selectedQueue->patient->patient_number }}</p>
        @else
          <p class="text-center text-gray-500 dark:text-gray-400">Select a patient to start treatment</p>
        @endif
      </div>
    </div>
  </div>

  <!-- Tabs -->
  <div class="bg-white dark:bg-gray-800 rounded shadow-md">
    <nav class="flex space-x-1 border-b border-gray-200 dark:border-gray-700 px-4">
      <button
        class="tab-btn flex items-center gap-1 py-3 px-4 text-sm font-medium text-blue-600 border-blue-600"
        data-tab="vitals"
        type="button"
      >
        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M5.121 17.804A3 3 0 017 17h10a3 3 0 011.879.804M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
        </svg>
        Vital Signs
      </button>

      <button
        class="tab-btn flex items-center gap-1 py-3 px-4 text-sm font-medium text-gray-600 hover:text-blue-600 hover:border-blue-600 border-transparent"
        data-tab="chief-complain"
        type="button"
      >
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M9 17v-6h13V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10h6z" />
        </svg>
        Chief Complaint
      </button>

      <button
        class="tab-btn flex items-center gap-1 py-3 px-4 text-sm font-medium text-gray-600 hover:text-blue-600 hover:border-blue-600 border-transparent"
        data-tab="history"
        type="button"
      >
        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-9a9 9 0 00-9 9 9 9 0 0018 0 9 9 0 00-9-9z" />
        </svg>
        History of Present Illness
      </button>

      <button
        class="tab-btn flex items-center gap-1 py-3 px-4 text-sm font-medium text-gray-600 hover:text-blue-600 hover:border-blue-600 border-transparent"
        data-tab="investigation"
        type="button"
      >
        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M9 17v-2h6v2a2 2 0 01-2 2H11a2 2 0 01-2-2zM9 5a2 2 0 012-2h2a2 2 0 012 2v2H9V5z" />
        </svg>
        Investigation
      </button>

      <button
        class="tab-btn flex items-center gap-1 py-3 px-4 text-sm font-medium text-gray-600 hover:text-blue-600 hover:border-blue-600 border-transparent"
        data-tab="examination"
        type="button"
      >
        🦷 Examination
      </button>

      <button
  class="tab-btn flex items-center gap-1 py-3 px-4 text-sm font-medium text-gray-600 hover:text-blue-600 hover:border-blue-600 border-transparent"
  data-tab="appointment"
  type="button"
>
  📅 Appointment
</button>

<!-- Treatment -->
<button
  class="tab-btn flex items-center gap-1 py-3 px-4 text-sm font-medium text-gray-600 hover:text-blue-600 hover:border-blue-600 border-transparent"
  data-tab="treatment"
  type="button"
>
  🧾 Treatment
</button>

<!-- Family Social History -->
<button
  class="tab-btn flex items-center gap-1 py-3 px-4 text-sm font-medium text-gray-600 hover:text-blue-600 hover:border-blue-600 border-transparent"
  data-tab="family-social"
  type="button"
>
  👨‍👩‍👧 Family/Social History
</button>

<!-- Review of Other Systems -->
<button
  class="tab-btn flex items-center gap-1 py-3 px-4 text-sm font-medium text-gray-600 hover:text-blue-600 hover:border-blue-600 border-transparent"
  data-tab="review-systems"
  type="button"
>
  🩺 ROS
</button>

<!-- PMH -->
<button
  class="tab-btn flex items-center gap-1 py-3 px-4 text-sm font-medium text-gray-600 hover:text-blue-600 hover:border-blue-600 border-transparent"
  data-tab="pmh"
  type="button"
>
  🩻 PMH
</button>




    </nav>

    <!-- Tab Contents -->
    <div class="p-6">
      <!-- Vital Signs -->
      <div id="vitals" class="tab-content hidden">
              <form wire:submit.prevent="save" class="w-full">

  <div class="grid grid-cols-2 gap-4">
    <div>
      <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Temperature (°C)</label>
      <input wire:model.defer="vitals.temperature" type="number" step="0.1"
          class="mt-1 block w-full rounded-md border-gray-300 shadow-sm
              focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-700
              dark:border-gray-600 dark:text-gray-300" />
      @error('vitals.temperature') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
    </div>

    <div>
      <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Blood Pressure (mmHg)</label>
      <input wire:model.defer="vitals.blood_pressure" type="text" placeholder="e.g. 120/80"
          class="mt-1 block w-full rounded-md border-gray-300 shadow-sm
              focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-700
              dark:border-gray-600 dark:text-gray-300" />
      @error('vitals.blood_pressure') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
    </div>

    <div>
      <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Heart Rate (bpm)</label>
      <input wire:model.defer="vitals.heart_rate" type="number"
          class="mt-1 block w-full rounded-md border-gray-300 shadow-sm
              focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-700
              dark:border-gray-600 dark:text-gray-300" />
      @error('vitals.heart_rate') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
    </div>

    <div>
      <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Respiration Rate (breaths/min)</label>
      <input wire:model.defer="vitals.respiration_rate" type="number"
          class="mt-1 block w-full rounded-md border-gray-300 shadow-sm
              focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-700
              dark:border-gray-600 dark:text-gray-300" />
      @error('vitals.respiration_rate') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
    </div>

    <div>
      <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Oxygen Saturation (%) <small class="text-red-500">(optional)</small></label>
      <input wire:model.defer="vitals.oxygen_saturation" type="number" min="0" max="100"
          class="mt-1 block w-full rounded-md border-gray-300 shadow-sm
              focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-700
              dark:border-gray-600 dark:text-gray-300" />
      @error('vitals.oxygen_saturation') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
    </div>
  </div>

    <div wire:loading wire:target="save" class="mt-4">
    <x-spinner />
  </div>

  <button type="submit" class="mt-4 bg-blue-600 text-white px-4 py-2 rounded">
    Save Vital Signs
  </button>
</form>

      </div>


     

      <!-- Chief Complaint -->
      <div id="chief-complain" class="tab-content hidden">
         <form wire:submit.prevent="saveChiefComplaint" class="space-y-4">
        <div>
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Chief Complaint (Describe the main issue)</label>
            <textarea wire:model.defer="chiefComplaint" rows="4"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300"
                placeholder="Describe the main issue"></textarea>
        </div>

        <div>
            <button type="submit"
                class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Save</button>
        </div>
    </form>
      </div>

      <!-- History of Present Illness -->
      <div id="history" class="tab-content hidden">
         <form wire:submit.prevent="saveHistory" class="space-y-4">
        <div>
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                History of Present Illness
            </label>
            <textarea wire:model.defer="historyOfIllness" rows="5"
              class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300"
              placeholder="Provide detailed history"></textarea>
        </div>

        <button type="submit"
          class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Save</button>

        @if (session()->has('message'))
            <p class="text-green-600 mt-2">{{ session('message') }}</p>
        @endif
    </form>
      </div>

      <!-- Investigation -->
     <div x-data @price-type-mix-error.window="alert('Mixed price types are not allowed!')" id="investigation" class="tab-content hidden">
    <h3 class="text-lg font-medium mb-4 text-gray-700 dark:text-gray-300">Select Treatments</h3>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
        @foreach ($treatments as $treatment)
            <div class="p-4 border rounded-md shadow-sm bg-white dark:bg-gray-900">
                <h4 class="font-semibold text-gray-900 dark:text-white">{{ $treatment->name }}</h4>

                <div class="text-sm text-gray-700 dark:text-gray-300 mt-2 space-y-2">
                    @if($patientType === 'standard')
                        <label class="flex items-center space-x-2">
                            <input type="radio"
                                   name="selectedTreatment_{{ $treatment->id }}"
                                   wire:model.defer="selectedTreatments.{{ $treatment->id }}"
                                   value="price">
                            <span>Normal Price: TZS {{ number_format($treatment->price, 0) }}</span>
                        </label>
                    @else
                        <label class="flex items-center space-x-2">
                            <input type="radio"
                                   name="selectedTreatment_{{ $treatment->id }}"
                                   wire:model.defer="selectedTreatments.{{ $treatment->id }}"
                                   value="fast_track_price">
                            <span>Fast Track Price: TZS {{ number_format($treatment->fast_track_price, 0) }}</span>
                        </label>
                    @endif

                    @if($treatment->description)
                        <p class="italic mt-2 text-gray-500 dark:text-gray-400">
                            {{ $treatment->description }}
                        </p>
                    @endif
                </div>
            </div>
        @endforeach
    </div>

    <div class="mt-6 text-right">
        <!-- <p class="text-lg font-semibold text-gray-800 dark:text-gray-200">
            Total: TZS 
        </p> -->

        <button wire:click="submitInvoice"
                class="mt-2 bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            Submit Invoice
        </button>
    </div>
</div>


      <!-- Examination -->
   <div id="examination" class="tab-content hidden p-6 bg-white rounded shadow-md space-y-6 dark:bg-gray-800">

    <form wire:submit.prevent="saveToothExamination" class="space-y-6">

        <!-- Section: General Oral Assessment -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Oral Hygiene -->
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-200">Oral Hygiene</label>
                <select wire:model="oral_hygiene" class="mt-1 w-full border-gray-300 rounded-md shadow-sm dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                    <option value="">-- Select --</option>
                    <option>Good</option>
                    <option>Fair</option>
                    <option>Poor</option>
                </select>
            </div>

            <!-- Gum Condition -->
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-200">Gum Condition</label>
                <select wire:model="gum_condition" class="mt-1 w-full border-gray-300 rounded-md shadow-sm dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                    <option value="">-- Select --</option>
                    <option>Healthy</option>
                    <option>Inflamed</option>
                    <option>Bleeding</option>
                    <option>Receding</option>
                </select>
            </div>
        </div>

        <!-- Section: Tooth Decay -->
        <div>
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-200 mb-2">Tooth Decay Present (Select teeth)</label>
            <div class="grid grid-cols-8 gap-2 text-sm">
                @foreach(range(1, 32) as $tooth)
                    <label class="inline-flex items-center space-x-1">
                        <input type="checkbox" wire:model="tooth_decay" value="{{ $tooth }}" class="text-blue-600">
                        <span class="text-gray-700 dark:text-gray-300">{{ $tooth }}</span>
                    </label>
                @endforeach
            </div>
        </div>

        <!-- Section: Conditions -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Missing Teeth -->
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-200">Missing Teeth (e.g., 8, 14, 30)</label>
                <input type="text" wire:model="missing_teeth" class="mt-1 w-full border-gray-300 rounded-md shadow-sm dark:bg-gray-700 dark:border-gray-600 dark:text-white">
            </div>

            <!-- Mobility -->
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-200">Mobility of Teeth</label>
                <input type="text" wire:model="mobility" class="mt-1 w-full border-gray-300 rounded-md shadow-sm dark:bg-gray-700 dark:border-gray-600 dark:text-white">
            </div>

            <!-- Occlusion -->
            <div class="md:col-span-2">
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-200">Occlusion (Bite)</label>
                <input type="text" wire:model="occlusion" class="mt-1 w-full border-gray-300 rounded-md shadow-sm dark:bg-gray-700 dark:border-gray-600 dark:text-white">
            </div>
        </div>

        <!-- Section: Notes -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Other Findings -->
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-200">Other Findings</label>
                <textarea wire:model="other_findings" rows="4" class="mt-1 w-full border-gray-300 rounded-md shadow-sm dark:bg-gray-700 dark:border-gray-600 dark:text-white"></textarea>
            </div>

            <!-- Recommendation / Diagnosis -->
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-200">Recommendation / Diagnosis</label>
                <textarea wire:model="recommendation" rows="4" class="mt-1 w-full border-gray-300 rounded-md shadow-sm dark:bg-gray-700 dark:border-gray-600 dark:text-white"></textarea>
            </div>
        </div>

        <!-- Save Button -->
        <div class="pt-4">
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-2 rounded shadow">
                Save Examination
            </button>
        </div>

    </form>
</div>

<!-- Appointment Booking -->
<div id="appointment" class="tab-content hidden">
  <!-- Placeholder for appointment calendar or booking form -->
  <h2 class="text-xl font-semibold mb-4 text-gray-800 dark:text-gray-100">Appointments</h2>

  <!-- New Appointment Booking Form --> 
  <form wire:submit.prevent="saveAppointment" class="mb-6 space-y-4 max-w-md">

    <div>
      <label for="scheduled_at" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Schedule Appointment</label>
      <input
        type="datetime-local"
        id="scheduled_at"
        wire:model="scheduled_at"
        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm
               focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50
               dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300"
      />
      @error('scheduled_at') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
    </div>

    <div>
      <label for="appointment_notes" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Notes (optional)</label>
      <textarea
        id="appointment_notes"
        wire:model="appointment_notes"
        rows="3"
        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm
               focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50
               dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300"
        placeholder="Additional notes or instructions"
      ></textarea>
      @error('appointment_notes') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
    </div>

    <button
      type="submit"
      class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700"
    >
      Book Appointment
    </button>
  </form>

  <!-- Appointment List -->
  <div>
    <h3 class="text-lg font-semibold mb-3 text-gray-700 dark:text-gray-200">Upcoming Appointments</h3>

    @if($appointments->isEmpty())
      <p class="text-gray-500 dark:text-gray-400">No appointments scheduled.</p>
    @else
      <ul class="space-y-2">
        @foreach($appointments as $appointment)
          <li
            class="p-3 border rounded-md bg-gray-50 dark:bg-gray-700 flex justify-between items-center"
          >
            <div>
              <p class="font-semibold text-gray-900 dark:text-white">
                {{ \Carbon\Carbon::parse($appointment->scheduled_at)->format('M d, Y - h:i A') }}
              </p>
              <p class="text-sm text-gray-600 dark:text-gray-300">
                Status: <span class="capitalize">{{ $appointment->status }}</span>
              </p>
              @if($appointment->notes)
                <p class="text-sm text-gray-600 dark:text-gray-300 mt-1">Notes: {{ $appointment->notes }}</p>
              @endif
            </div>
            <!-- Optional: Add buttons for Edit/Cancel etc. here -->
          </li>
        @endforeach
      </ul>
    @endif
  </div>
</div>

<!-- Treatment Tab Content -->
<div id="treatment" class="tab-content">

  <div class="p-4 md:p-6">
    <h3 class="text-xl font-semibold text-gray-800 dark:text-gray-200 mb-6">
      Search Medicine
    </h3>

    <div class="col-span-12 mb-4">
      <label for="medicineSelect" class="block text-sm font-medium mb-2 dark:text-gray-300">* Search Medicine:</label>
   <select wire:model="selectedMedicineId" required name="medicine_id"
    class=" select2-cat py-3 px-4 block w-full bg-cyan-600 border-gray-200 rounded-lg text-sm focus:border-cyan-500 focus:ring-cyan-500 dark:bg-gray-900 dark:border-gray-700 dark:text-gray-400">
    <option value="">Select Medicine</option>
    @foreach ($medicines as $medicine)
      <option value="{{ $medicine->id }}">
    {{ strtoupper($medicine->name) }} -
    TZS {{ number_format($medicine->sell_price) }}
</option>
    @endforeach
</select>

    </div>

    <div>
      <button wire:click="addToCart"
        class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
        Add to Cart
      </button>
    </div>

    <!-- Cart Table -->
@if(!empty($cart))
    <div class="border-t border-gray-200 dark:border-gray-700 pt-6">
        <h4 class="text-lg font-semibold text-gray-800 dark:text-white mb-4">
            🛒 Selected Medicines
        </h4>

        <div class="overflow-x-auto rounded-lg shadow-sm">
            <table class="min-w-full bg-white dark:bg-gray-900 text-sm text-left text-gray-700 dark:text-gray-300">
                <thead class="bg-gray-100 dark:bg-gray-800">
    <tr>
        <th class="px-4 py-3">#</th>
        <th class="px-4 py-3">Name</th>
        <th class="px-4 py-3">Available Qty</th>
        <th class="px-4 py-3">Price</th>
        <th class="px-4 py-3">Qty</th>
        <th class="px-4 py-3">Dosage</th>
        <th class="px-4 py-3">Frequency</th>
        <th class="px-4 py-3">Subtotal</th>
        <th class="px-4 py-3">Action</th>
    </tr>
</thead>

             <tbody>
              @if (session()->has('error'))
    <div class="mb-4 p-3 bg-red-100 border border-red-400 text-red-700 rounded relative dark:bg-red-900 dark:border-red-700 dark:text-red-300" role="alert">
        <span class="block sm:inline">{{ session('error') }}</span>
    </div>
@endif

    @foreach ($this->cartWithSubtotals as $index => $item)
        <tr class="border-t border-gray-200 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-800">
            <td class="px-4 py-2">{{ $index + 1 }}</td>
            <td class="px-4 py-2 font-medium">{{ $item['name'] }}</td>
            <td class="px-4 py-2 text-center">{{ $item['total_quantity'] }}</td>

            <td class="px-4 py-2 text-green-700">TZS {{ number_format($item['sell_price'], 0) }}</td>

            <!-- Quantity -->
            <td class="px-4 py-2">
<input type="number" wire:model.lazy="cart.{{ $index }}.quantity" min="1" max="{{ $item['total_quantity'] }}"
    class="w-16 rounded border-gray-300 dark:bg-gray-700 dark:text-white dark:border-gray-600" />

            </td>

            <!-- Dosage -->
            <td class="px-4 py-2">
                <input type="text" wire:model.lazy="cart.{{ $index }}.dosage"
                    class="w-full rounded border-gray-300 dark:bg-gray-700 dark:text-white dark:border-gray-600"
                    placeholder="e.g. 500mg" />
            </td>

            <!-- Frequency -->
            <td class="px-4 py-2">
                <input type="text" wire:model.lazy="cart.{{ $index }}.frequency"
                    class="w-full rounded border-gray-300 dark:bg-gray-700 dark:text-white dark:border-gray-600"
                    placeholder="e.g. 3x/day" />
            </td>

            <!-- Subtotal -->
            <td class="px-4 py-2 text-blue-700">
                TZS {{ number_format($item['subtotal'], 0) }}
            </td>

            <!-- Action -->
            <td class="px-4 py-2">
                <button wire:click="removeFromCart({{ $index }})"
                    class="text-red-600 hover:text-red-800 font-medium transition">
                    ❌ Remove
                </button>
            </td>
        </tr>
    @endforeach
</tbody>

@if (session()->has('error'))
    <div class="mt-4 p-3 bg-red-100 text-red-700 rounded">
        {{ session('error') }}
    </div>
@endif

@if (session()->has('success'))
    <div class="mt-4 p-3 bg-green-100 text-green-700 rounded">
        {{ session('success') }}
    </div>
@endif

@if (session()->has('error'))
    <div class="mt-4 p-3 bg-red-100 text-red-700 rounded">
        {{ session('error') }}
    </div>
@endif



            </table>
            <div class="text-right mt-4 text-lg font-semibold text-gray-800 dark:text-gray-200">
    Total: 
    <span class="text-blue-700 dark:text-blue-400">
        TZS {{ number_format($this->cartWithSubtotals->sum('subtotal'), 0) }}
    </span>
</div>

@if(!empty($cart))
    <div class="mt-6 text-right">
       <button type="button" wire:click="saveTreatment"
    class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700 transition">
    💾 Save Treatment
</button>

    </div>
@endif

        </div>
    </div>
@endif


  

    <!-- Flash message -->
    @if (session()->has('success'))
      <div class="mt-4 text-green-600">
        {{ session('success') }}
      </div>
    @endif

  </div>
</div>

<!-- Family Social History Tab Content -->
<div id="family-social" class="tab-content hidden">
  <textarea
    wire:model.defer="family_social_history"
    rows="6"
    class="w-full rounded-md border-gray-300 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300"
    placeholder="Enter family/social history"
  ></textarea>

  <button
    wire:click="saveFamilySocialHistory"
    class="mt-4 bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700"
  >
    Save Family/Social History
  </button>

  @if (session()->has('message'))
    <div class="mt-2 text-green-600">
      {{ session('message') }}
    </div>
  @endif
</div>

<!-- Review of Other Systems Tab Content -->
<div id="review-systems" class="tab-content hidden">
  <textarea
    wire:model.defer="review_of_systems"
    rows="6"
    class="w-full rounded-md border-gray-300 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300"
    placeholder="Enter review of other systems"
  ></textarea>

  <button
    wire:click="saveReviewOfSystems"
    class="mt-4 bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700"
  >
    Save Review of Systems
  </button>

  @if (session()->has('message'))
    <div class="mt-2 text-green-600">
      {{ session('message') }}
    </div>
  @endif
</div>

<!-- PMH Tab Content -->
<div id="pmh" class="tab-content hidden">
   <textarea
    wire:model.defer="pmh"
    rows="6"
    class="w-full rounded-md border-gray-300 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300"
    placeholder="Enter past medical history"
  ></textarea>

  <button
    wire:click="savePMH"
    class="mt-4 bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700"
  >
    Save PMH
  </button>
</div>


      </div>
    </div>
  </div>

  
</div>
@script
<script type="text/javascript">
document.addEventListener("livewire:initialized", function () {

    function initSelect2() {
        $('.select2-cat').each(function () {
            let $el = $(this);
            let model = $el.attr('wire:model');

            // Destroy previous instance if exists
            if ($el.hasClass("select2-hidden-accessible")) {
                $el.select2('destroy');
            }

            // Determine mode
            let isDark = document.body.classList.contains('dark');

            // Initialize Select2
            $el.select2({
                width: '100%',
                dropdownCssClass: isDark ? 'select2-dark' : '',
                containerCssClass: isDark ? 'select2-dark' : ''
            }).on('change', function () {
                if (model) {
                    @this.set(model, $(this).val());
                }
            });
        });
    }

    initSelect2();

    // Re-init after Livewire DOM updates
    Livewire.hook("morphed", () => {
        initSelect2();
    });

    // Observe body class changes for dark mode toggle
    const observer = new MutationObserver(() => {
        initSelect2();
    });

    observer.observe(document.body, { attributes: true, attributeFilter: ['class'] });

});
</script>

<style>
/* Dark mode Select2 styling */
.select2-dark .select2-selection {
    background-color: #1f2937; /* Tailwind gray-800 */
    color: #f3f4f6; /* Tailwind gray-200 */
    border: 1px solid #374151; /* Tailwind gray-700 */
}

.select2-dark .select2-selection__placeholder {
    color: #9ca3af; /* Tailwind gray-400 */
}

.select2-dark .select2-dropdown {
    background-color: #1f2937; /* gray-800 */
    color: #f3f4f6; /* gray-200 */
}

.select2-dark .select2-results__option--highlighted {
    background-color: #2563eb; /* blue-600 */
    color: white;
}

.select2-dark .select2-selection__arrow b {
    border-color: #f3f4f6 transparent transparent transparent;
}
</style>
@endscript


