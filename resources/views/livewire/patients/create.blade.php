<div class="p-6 bg-white dark:bg-gray-900 rounded-md shadow-md">

    @if ($errors->any())
    <div class="mb-4 bg-red-100 border border-red-300 text-red-700 px-4 py-3 rounded">
        <ul class="list-disc list-inside text-sm">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <!-- Registration Form -->
    <form wire:submit.prevent="submit" class="space-y-6">
        <div>
            <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-100 mb-4">1. Personal Information</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block mb-1 text-gray-700 dark:text-gray-300">Full Name <span class="text-red-500">*</span></label>
                    <input type="text" wire:model.defer="name" class="w-full px-4 py-2 border border-cyan-500 rounded-md text-gray-900 dark:text-white dark:bg-gray-800" autocomplete="off">
                    @error('name') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label class="block mb-1 text-gray-700 dark:text-gray-300">Patient Type <span class="text-red-500">*</span></label>
                    <select wire:model.defer="patient_type" class="w-full px-4 py-2 border border-cyan-500 rounded-md text-gray-900 dark:text-white dark:bg-gray-800">
                        <option value="">Select Patient Type</option>
                        <option value="standard">Standard</option>
                        <option value="fast_track">Fast Track</option>
                    </select>
                    @error('patient_type') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label class="block mb-1 text-gray-700 dark:text-gray-300">Date of Birth</label>
                    <input type="date" wire:model.defer="dob" class="w-full px-4 py-2 border border-cyan-500 rounded-md text-gray-900 dark:text-white dark:bg-gray-800">
                </div>
                <div>
                    <label class="block mb-1 text-gray-700 dark:text-gray-300">Gender <span class="text-red-500">*</span></label>
                    <select wire:model.defer="gender" class="w-full px-4 py-2 border border-cyan-500 rounded-md text-gray-900 dark:text-white dark:bg-gray-800">
                        <option value="">Select</option>
                        <option>Male</option>
                        <option>Female</option>
                        <option>Other</option>
                    </select>
                    @error('gender') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label class="block mb-1 text-gray-700 dark:text-gray-300">Marital Status</label>
                    <select wire:model.defer="marital_status" class="w-full px-4 py-2 border border-cyan-500 rounded-md text-gray-900 dark:text-white dark:bg-gray-800">
                        <option value="">Select</option>
                        <option>Single</option>
                        <option>Married</option>
                        <option>Divorced</option>
                        <option>Widowed</option>
                    </select>
                </div>
                <div>
                    <label class="block mb-1 text-gray-700 dark:text-gray-300">Phone Number <span class="text-red-500">*</span></label>
                    <input type="text" wire:model.defer="phone" class="w-full px-4 py-2 border border-cyan-500 rounded-md text-gray-900 dark:text-white dark:bg-gray-800">
                    @error('phone') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
                </div>
            </div>
        </div>

        <div class="text-right">
            <button type="submit" class="px-6 py-2 bg-cyan-600 text-white rounded-md hover:bg-cyan-700 transition duration-200">Submit</button>
        </div>
    </form>

    <!-- Payment Confirmation Modal -->
    @if ($showPaymentModal)
    <div class="fixed inset-0 flex items-center justify-center z-50">
        <div class="absolute inset-0 bg-opacity-20 backdrop-blur-sm"></div>
        <div class="relative bg-white dark:bg-gray-900 rounded-lg p-8 max-w-lg w-full shadow-xl border-t-4 border-yellow-500 transform scale-95 animate-scaleUp">
            <h2 class="text-2xl font-extrabold mb-4 text-yellow-600 dark:text-yellow-400 flex items-center">⚠️ Payment Confirmation</h2>
            <p class="mb-6 text-gray-800 dark:text-gray-300 leading-relaxed">
                Please confirm that <span class="px-2 py-1 rounded bg-yellow-100 text-yellow-800 font-bold">{{ $name }}</span>
                (a <strong>{{ ucfirst($patient_type) }}</strong> patient) is expected to pay the consultation fee of
                <strong class="text-cyan-700 dark:text-cyan-400 text-lg">{{ number_format($consultation_fee, 2) }} TZS</strong>.
            </p>
            <p class="mb-6 text-sm text-gray-600 dark:text-gray-400 italic">Note: This action will record the payment and register the patient.</p>
            <div class="flex justify-end space-x-4">
                <button wire:click="cancelPayment" class="px-5 py-2 rounded border border-gray-300 hover:bg-gray-100 dark:border-gray-600 dark:hover:bg-gray-700 text-gray-700 dark:text-gray-300 transition">Cancel</button>
                <button wire:click="confirmPayment" class="px-5 py-2 bg-yellow-600 text-white rounded hover:bg-yellow-700 transition">Confirm Payment</button>
            </div>
        </div>
    </div>
    <style>
        @keyframes scaleUp { from { transform: scale(0.95); opacity:0; } to { transform: scale(1); opacity:1; } }
        .animate-scaleUp { animation: scaleUp 0.3s ease-out forwards; }
    </style>
    @endif

    <!-- Receipt Section -->


</div>


