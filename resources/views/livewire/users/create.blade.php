<div class=" mx-auto bg-white dark:bg-gray-900 shadow-xl rounded-xl p-8">
    <!-- Header -->
    <h3 class="mb-1 text-3xl font-extrabold text-gray-900 dark:text-white">Staff Registration</h3>
    <p class="mb-8 text-sm text-gray-500 dark:text-gray-400">
        Please fill in the details below to register a new staff member.
    </p>

    <form wire:submit.prevent="save" class="space-y-8">
        <!-- Grid Inputs -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

           <!-- Name -->
<div>
    <div class="flex items-center border rounded-lg px-3 py-2 bg-white dark:bg-gray-800 dark:border-gray-700 shadow-sm">
        <i class="fa-solid fa-user text-gray-400 mr-3"></i>
        <input
            type="text"
            wire:model="name"  {{-- live update --}}
            placeholder="Full Name"
            class="w-full bg-transparent border-none focus:ring-0 focus:outline-none text-gray-900 dark:text-white"
        />
    </div>
    @error('name')
        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
    @enderror
</div>

<!-- Email -->
<div>
    <div class="flex items-center border rounded-lg px-3 py-2 bg-white dark:bg-gray-800 dark:border-gray-700 shadow-sm">
        <i class="fa-solid fa-envelope text-gray-400 mr-3"></i>
        <input
            type="email"
            wire:model="email" {{-- live update --}}
            placeholder="Email Address"
            class="w-full bg-transparent border-none focus:ring-0 focus:outline-none text-gray-900 dark:text-white"
        />
    </div>
    @error('email')
        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
    @enderror
</div>

<!-- Password -->
<div>
    <div class="flex items-center border rounded-lg px-3 py-2 bg-white dark:bg-gray-800 dark:border-gray-700 shadow-sm">
        <i class="fa-solid fa-lock text-gray-400 mr-3"></i>
        <input
            type="password"
            wire:model="password" {{-- live update --}}
            placeholder="Password"
            class="w-full bg-transparent border-none focus:ring-0 focus:outline-none text-gray-900 dark:text-white"
        />
    </div>
    @error('password')
        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
    @enderror
</div>

            <!-- Confirm Password -->
            <x-input-icon label="Confirm Password" type="password" wire:model="password_confirmation"
                icon="M12 11c0-..." error="password_confirmation" />
            {!! $this->passwordMatchMessage !!}

            <!-- Phone -->
            <x-input-icon label="Phone" type="number" wire:model="phone"
                icon="M3 8l7.89 5.26..." error="phone" />

            <!-- Academic Document -->
            <x-input-icon label="Academic Document" type="file" wire:model="accademic_document"
                icon="M4 4v16..." error="accademic_document" />

            <!-- Photo -->
            <x-input-icon label="Photo" type="file" wire:model="photo"
                icon="M12 4v16..." error="photo"
                note="Upload a profile photo (optional)" />

            <!-- Gender -->
            <x-select-icon label="Gender" wire:model="gender"
                icon="M17 20h5v-2..." error="gender">
                <option value="">Select Gender</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
                <option value="other">Other</option>
            </x-select-icon>

            <!-- Position -->
            <x-select-icon label="Position" wire:model="position"
                icon="M6 3h12..." error="position">
                <option value="">Select Position</option>
                <option value="Doctor">Doctor</option>
                <option value="Receptionist">Receptionist</option>
                <option value="Admin">Admin</option>
            </x-select-icon>

        </div>

        <!-- Permissions -->
        <div>
            <label class="block mb-2 font-semibold text-gray-800 dark:text-gray-200">Assign Permissions</label>
            <div class="flex flex-wrap gap-4 max-h-64 overflow-y-auto p-4 border border-gray-300 dark:border-gray-700 rounded-lg bg-white dark:bg-gray-800 shadow-inner">
                @forelse ($permissions as $permission)
                    <label class="inline-flex items-center space-x-2 cursor-pointer">
                        <input type="checkbox" wire:model="selectedPermissions" value="{{ $permission->name }}"
                            class="h-5 w-5 text-blue-600 rounded focus:ring-2 focus:ring-blue-500">
                        <span class="text-gray-800 dark:text-gray-200">{{ $permission->label ?? $permission->name }}</span>
                    </label>
                @empty
                    <p class="text-gray-500 dark:text-gray-400 italic">No permissions available.</p>
                @endforelse
            </div>
            @error('selectedPermissions') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
        </div>

        <!-- Submit Button -->
        <div class="text-right">
            <button type="submit"
                class="px-8 py-3 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-lg shadow focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-1">
                Register Staff
            </button>
        </div>
    </form>
</div>
