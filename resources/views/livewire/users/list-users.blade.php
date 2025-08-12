<div class="p-4 bg-white dark:bg-gray-800 rounded shadow">
    <h2 class="text-xl font-semibold mb-4 dark:text-white">Users List</h2>

    @if (session()->has('message'))
        <div class="mb-4 p-3 bg-green-200 text-green-800 rounded dark:bg-green-900 dark:text-green-300">
            {{ session('message') }}
        </div>
    @endif

    <input
        type="text"
        placeholder="Search users..."
        wire:model.live.debounce.1000ms="search"
        class="mb-6 w-full border rounded px-3 py-2 border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100"
    />

    @if($this->users()->count())
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
        @foreach($this->users() as $user)
            <div class="bg-gray-50 dark:bg-gray-900 rounded-lg shadow p-5 flex flex-col space-y-4">
                <div class="flex items-center space-x-4">
                    <div class="flex-shrink-0">
                        @if($user->photo)
                            <img src="{{ asset('storage/' . $user->photo) }}" alt="{{ $user->name }}" class="h-16 w-16 rounded-full object-cover border border-gray-300 dark:border-gray-600">
                        @else
                           @php
                   $defaultImage = $user->gender == "female" ? asset('images/female-doctor.png') : asset('images/male-doctor.png');

            if (strtolower($user->position) === 'doctor') {
                if (strtolower($user->gender) === 'male') {
                    $defaultImage = asset('images/male-doctor.png');
                } elseif (strtolower($user->gender) === 'female') {
                    $defaultImage = asset('images/female-doctor.png');
                }
            }
        @endphp
                            <img src="{{ asset($defaultImage) }}" alt="Default profile" class="h-16 w-16 rounded-full object-cover border border-gray-300 dark:border-gray-600">
                        @endif
                    </div>
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">{{ $user->name }}</h3>
                        <p class="text-sm text-gray-600 dark:text-gray-400">{{ $user->email }}</p>
                        <p class="text-sm font-medium text-blue-600 dark:text-blue-400">{{ $user->position }}</p>
                        @if($user->is_blocked)
                            <p class="text-xs text-red-600 font-semibold mt-1">Blocked</p>
                        @endif
                    </div>
                </div>

                <div>
                    <p class="text-sm dark:text-gray-300">
                        Academic Document:
                        @if($user->accademic_document)
                            <a href="{{ asset('storage/' . $user->accademic_document) }}" target="_blank" class="text-blue-600 hover:underline">View Document</a>
                        @else
                            <span class="text-gray-500 dark:text-gray-400">Not uploaded</span>
                        @endif
                    </p>
                </div>

               <div class="flex space-x-3">
   
    <button
        wire:click="viewPermissions({{ $user->id }})"
        class="px-3 py-1 text-white bg-indigo-600 hover:bg-indigo-700 rounded text-sm"
    >
        View Permissions
    </button>

    <button
        wire:click="deleteUser({{ $user->id }})"
        onclick="confirm('Are you sure you want to delete this user?') || event.stopImmediatePropagation()"
        class="px-3 py-1 text-white bg-red-600 hover:bg-red-700 rounded text-sm"
    >
        Delete
    </button>

    <button
        wire:click="blockUser({{ $user->id }})"
        class="px-3 py-1 text-white {{ $user->is_blocked ? 'bg-green-600 hover:bg-green-700' : 'bg-gray-600 hover:bg-gray-700' }} rounded text-sm"
    >
        {{ $user->is_blocked ? 'Unblock' : 'Block' }}
    </button>
</div>

            </div>
        @endforeach
    </div>

    <div class="mt-6">
        {{ $users->links() }}
    </div>

    @else
        <p class="text-center text-gray-500 dark:text-gray-400">No users found.</p>
    @endif

    @if($showPermissionsModal)
<div
  class="fixed inset-0 z-80 bg-black bg-opacity-50 flex items-center justify-center overflow-y-auto"
  role="dialog"
  aria-modal="true"
  aria-labelledby="permissions-modal-label"
>
  <div
    class="mt-7 opacity-100 transition-all ease-out duration-500 md:max-w-2xl md:w-full m-3 md:mx-auto max-h-[90vh] flex flex-col bg-white border border-gray-200 shadow-2xs rounded-xl dark:bg-neutral-800 dark:border-neutral-700 dark:shadow-neutral-700/70"
  >
    <!-- Modal Header -->
    <div
      class="flex justify-between items-center py-3 px-4 border-b border-gray-200 dark:border-neutral-700"
    >
      <h3
        id="permissions-modal-label"
        class="font-bold text-gray-800 dark:text-gray-100 text-lg"
      >
        Edit Permissions for {{ $permissionUserName }}
      </h3>
      <button
        type="button"
        class="w-8 h-8 inline-flex justify-center items-center rounded-full bg-gray-100 text-gray-800 hover:bg-gray-200 dark:bg-neutral-700 dark:text-neutral-400 dark:hover:bg-neutral-600 focus:outline-none transition"
        aria-label="Close"
        wire:click="$set('showPermissionsModal', false)"
      >
        <svg
          class="w-6 h-6"
          fill="none"
          stroke="currentColor"
          stroke-width="2"
          stroke-linecap="round"
          stroke-linejoin="round"
          viewBox="0 0 24 24"
        >
          <path d="M18 6 6 18" />
          <path d="M6 6l12 12" />
        </svg>
      </button>
    </div>

    <!-- Modal Body -->
    <form
      wire:submit.prevent="updatePermissions"
      class="p-4 flex flex-col flex-grow overflow-hidden"
    >
      <!-- Check/Uncheck All Buttons -->
   

      <!-- Permissions Grid -->
      <div
        class="flex-grow overflow-y-auto border border-gray-200 rounded p-3 dark:border-neutral-700"
      >
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-3">
         @foreach($allPermissions as $permission)
  @php
    $isChecked = in_array($permission->name, $selectedPermissions);
  @endphp
  <label for="perm_{{ $permission->name }}" ...>
    <input
      type="checkbox"
      id="perm_{{ $permission->name }}"
      value="{{ $permission->name }}"
      wire:model="selectedPermissions"
      ...
    />
    <span>{{ $permission->label ?? $permission->name }}</span>
  </label>
@endforeach

        </div>
      </div>

      <!-- Modal Footer -->
      <div
        class="flex justify-end items-center gap-x-2 py-3 px-4 border-t border-gray-200 dark:border-neutral-700 mt-4"
      >
        <button
          type="button"
          wire:click="$set('showPermissionsModal', false)"
          class="py-2 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-2xs hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700 transition"
        >
          Cancel
        </button>
        <button
          type="submit"
          class="py-2 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none transition"
        >
          Save
        </button>
      </div>
    </form>
  </div>
</div>
@endif





</div>
