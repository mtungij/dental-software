<div class="mx-auto mt-6 bg-white dark:bg-gray-800 p-6 rounded shadow">

  {{-- Success Message --}}
  @if(session()->has('success'))
    <div class="mb-4 p-3 bg-green-200 text-green-800 rounded dark:bg-green-900 dark:text-green-300">
      {{ session('success') }}
    </div>
  @endif

  {{-- Form --}}
  <form wire:submit.prevent="save" class="space-y-6">
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
      <div>
        <label class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-200" for="name">Name</label>
        <input
          id="name"
          wire:model="name"
          type="text"
          class="block w-full rounded border border-cyan-700 dark:border-cyan-500 dark:bg-gray-700 dark:text-white px-3 py-2 focus:outline-none focus:ring-2 focus:ring-cyan-600"
          placeholder="Enter treatment name"
        />
        @error('name') <span class="text-red-600 text-xs">{{ $message }}</span> @enderror
      </div>

      <div>
        <label class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-200" for="price">Standard Price</label>
        <input
          id="price"
          wire:model="price"
          type="number"
          step="0.01"
          class="block w-full rounded border border-cyan-700 dark:border-cyan-500 dark:bg-gray-700 dark:text-white px-3 py-2 focus:outline-none focus:ring-2 focus:ring-cyan-600"
          placeholder="Enter standard price"
        />
        @error('price') <span class="text-red-600 text-xs">{{ $message }}</span> @enderror
      </div>

      <div>
        <label class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-200" for="fast_track_price">Fast Track Price</label>
        <input
          id="fast_track_price"
          wire:model="fast_track_price"
          type="number"
          step="0.01"
          class="block w-full rounded border border-cyan-700 dark:border-cyan-500 dark:bg-gray-700 dark:text-white px-3 py-2 focus:outline-none focus:ring-2 focus:ring-cyan-600"
          placeholder="Enter fast track price"
        />
        @error('fast_track_price') <span class="text-red-600 text-xs">{{ $message }}</span> @enderror
      </div>
    </div>

    <div class="flex justify-center">
      <button
        type="submit"
        class="bg-cyan-700 hover:bg-cyan-800 text-white px-6 py-2 rounded focus:outline-none focus:ring-4 focus:ring-cyan-500"
      >
        {{ $treatmentId ? 'Update Treatment' : 'Create Treatment' }}
      </button>
    </div>
  </form>

  {{-- PDF Download Button --}}


  {{-- PDF Download Button --}}
<div class="flex justify-end mt-8 mb-4">
  <button
    wire:click="downloadPdf"
    class="bg-cyan-700 hover:bg-cyan-800 text-white px-4 py-2 rounded focus:outline-none focus:ring-4 focus:ring-cyan-500"
  >
    Download PDF
  </button>
</div>



{{-- Table --}}
<div class="overflow-x-auto">
  <h2 class="text-2xl font-semibold text-gray-800 dark:text-gray-200 mb-4">Available Treatments</h2>

  @if($treatments->isEmpty())
    <p class="text-center text-gray-500 dark:text-gray-400">No treatments found.</p>
  @else
    <table class="min-w-full text-sm text-left text-gray-700 dark:text-gray-300">
      <thead class="bg-cyan-100 dark:bg-cyan-700 text-cyan-700 dark:text-cyan-200 uppercase text-xs font-semibold">
        <tr>
          <th class="px-4 py-3">S/N</th>
          <th class="px-4 py-3">Name</th>
          <th class="px-4 py-3">Standard Price</th>
          <th class="px-4 py-3">Fast Track Price</th>
          <th class="px-4 py-3">Actions</th>
        </tr>
      </thead>
      <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
        @foreach ($treatments as $index => $treatment)
          <tr class="hover:bg-cyan-50 dark:hover:bg-cyan-900 transition-colors duration-150">
            <td class="px-4 py-3 font-medium text-gray-900 dark:text-white">{{ $index + 1 }}</td>
            <td class="px-4 py-3 font-medium text-gray-900 dark:text-white">{{ $treatment->name }}</td>
            <td class="px-4 py-3">{{ number_format($treatment->price, 2) }}</td>
            <td class="px-4 py-3">{{ number_format($treatment->fast_track_price, 2) }}</td>
            <td class="px-4 py-3">
              <button
                wire:click="edit({{ $treatment->id }})"
                class="text-cyan-600 hover:text-cyan-800 dark:hover:text-cyan-300 font-semibold mr-3"
              >
                Edit
              </button>
              <button
                wire:click="delete({{ $treatment->id }})"
                class="text-red-600 hover:text-red-800 dark:hover:text-red-400 font-semibold"
                onclick="confirm('Are you sure you want to delete this treatment?') || event.stopImmediatePropagation()"
              >
                Delete
              </button>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  @endif
</div>

</div>
