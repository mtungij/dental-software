<div class=" px-4 py-8 mx-auto bg-white dark:bg-gray-900 rounded-lg shadow-lg lg:py-16">

  <h2 class="mb-6 text-xl font-bold text-gray-900 dark:text-white">Update Consultation Fees</h2>

  <form wire:submit.prevent="save" class="space-y-6 mb-12">
    <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
      
      <div class="w-full">
        <label for="standard_fee" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
          Standard Patient Consultation Fee
        </label>
        <input
          type="number"
          step="0.01"
          id="standard_fee"
          wire:model.defer="standard_fee"
          min="0"
          placeholder="Enter standard fee"
          class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg
                 focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5
                 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white
                 dark:focus:ring-cyan-500 dark:focus:border-cyan-500"
        />
        @error('standard_fee') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
      </div>

      <div class="w-full">
        <label for="fast_track_fee" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
          Fast Track Patient Consultation Fee
        </label>
        <input
          type="number"
          step="0.01"
          id="fast_track_fee"
          wire:model.defer="fast_track_fee"
          min="0"
          placeholder="Enter fast track fee"
          class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg
                 focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5
                 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white
                 dark:focus:ring-cyan-500 dark:focus:border-cyan-500"
        />
        @error('fast_track_fee') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
      </div>

    </div>

    <div class="flex items-center mx-8 space-x-4">
      <button
        type="submit"
        class="text-white bg-cyan-700 hover:bg-cyan-800 focus:ring-4 focus:outline-none focus:ring-cyan-300
               font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-cyan-600 dark:hover:bg-cyan-700 dark:focus:ring-cyan-800"
      >
        Save Fees
      </button>
      
    </div>
  </form>

  <div class="relative shadow-md sm:rounded-lg overflow-hidden">

    <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
      <h2 class="text-lg font-semibold text-gray-900 dark:text-white">Consultation Fees</h2>
    </div>

    <div class="overflow-x-auto">
      @if (!$fees)
        <p class="p-4 text-center text-gray-500 dark:text-gray-400">No consultation fees set yet.</p>
      @else
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
          <thead class="text-xs text-gray-700 uppercase bg-cyan-500 dark:bg-gray-700 dark:text-gray-400">
            <tr>
              <th scope="col" class="px-4 py-3">Consultation Fees Type</th>
              <th scope="col" class="px-4 py-3">Consultation Fee Amount</th>
            </tr>
          </thead>
          <tbody>
            <tr class="border-b dark:border-gray-700">
              <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">Standard Price</td>
              <td class="px-4 py-3">{{ number_format($fees->standard_fee) }}</td>
            </tr>
            <tr class="border-b dark:border-gray-700">
              <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">Fast Track Price</td>
              <td class="px-4 py-3">{{ number_format($fees->fast_track_fee) }}</td>
            </tr>
          </tbody>
        </table>
      @endif
    </div>

  </div>

</div>
