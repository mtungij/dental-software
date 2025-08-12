<div class="w-full">
    <h2 class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Patient Queueing</h2>

   

    <label for="simple-search" class="sr-only">Search</label>
  <div class="relative w-full">
    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
      <svg class="w-4 h-4 text-cyan-500 dark:text-cyan-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 20">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5v10M3 5a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm0 10a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm12 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm0 0V6a3 3 0 0 0-3-3H9m1.5-2-2 2 2 2"/>
      </svg>
    </div>
    <input type="text" wire:model.live="search" id="simple-search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm w-full rounded-lg focus:ring-cyan-500 focus:border-cyan-500 block  ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-200 dark:placeholder-gray-300 dark:text-white dark:focus:ring-cyan-500 dark:focus:border-cyan-500" placeholder="Search patient..." required />
  </div>
    
@if ($search && count($patients))
    <div class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Found {{ count($patients) }} patients</div>
    <ul class="mb-4 border-cyan-500 rounded p-2 bg-white ">
        @foreach($patients as $p)
            <li class="flex justify-between items-center py-2 px-2 border-b last:border-b-0 hover:bg-cyan-500">
                <div >
                    <span class="font-medium uppercase">{{ $p->name }}</span>
                    <span class="text-sm text-gray-500 ml-2">( {{ $p->patient_number }})</span>
                </div>
                <button wire:click="addToQueue({{ $p->id }})" 
                        class="bg-teal-500 hover:bg-teal-600 text-white px-3 py-1 rounded text-sm font-medium">
                    Add to Queue
                </button>
            </li>
        @endforeach
    </ul>
@else
    @if($search)
        <div class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">No patients found for "{{ $search }}"</div>
    @endif
@endif

    @if (session()->has('success'))
        <div class="bg-green-100 text-green-700 p-2 mb-4 rounded">
            {{ session('success') }}
        </div>
    @endif

    

    

 
 
 


    <section class="bg-gray-50 dark:bg-gray-900 p-3 sm:p-5">
    <div class="w-full ">
        <!-- Start coding here -->
        <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
    
            
            <div class="overflow-x-auto">
             <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700" id="shareholder_table">
                                <thead class="bg-cyan-600 dark:bg-cyan-600">
                                    <tr>
                                        <th scope="col" class="py-3 px-6 text-start"><div class="inline-flex items-center gap-x-2"><span class="text-xs font-semibold uppercase text-gray-200 dark:text-white">Today Queue</span></div></th>
                                        <th scope="col" class="py-3 px-6 text-start"><div class="inline-flex items-center gap-x-2"><span class="text-xs font-semibold uppercase text-gray-500 dark:text-white"></span><svg class="size-3.5 text-gray-400 dark:text-gray-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path class="hs-datatable-ordering-desc:text-cyan-600 dark:hs-datatable-ordering-desc:text-cyan-500" d="m7 15 5 5 5-5"></path><path class="hs-datatable-ordering-asc:text-cyan-600 dark:hs-datatable-ordering-asc:text-cyan-500" d="m7 9 5-5 5 5"></path></svg></div></th>
                                        <th scope="col" class="py-3 px-6 text-start"><div class="inline-flex items-center gap-x-2"><span class="text-xs font-semibold uppercase text-gray-500 dark:text-white"></span><svg class="size-3.5 text-gray-400 dark:text-gray-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path class="hs-datatable-ordering-desc:text-cyan-600 dark:hs-datatable-ordering-desc:text-cyan-500" d="m7 15 5 5 5-5"></path><path class="hs-datatable-ordering-asc:text-cyan-600 dark:hs-datatable-ordering-asc:text-cyan-500" d="m7 9 5-5 5 5"></path></svg></div></th>
                                         <th scope="col" class="py-3 px-6 text-start"><div class="inline-flex items-center gap-x-2"><span class="text-xs font-semibold uppercase text-gray-500 dark:text-white"></span><svg class="size-3.5 text-gray-400 dark:text-gray-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path class="hs-datatable-ordering-desc:text-cyan-600 dark:hs-datatable-ordering-desc:text-cyan-500" d="m7 15 5 5 5-5"></path><path class="hs-datatable-ordering-asc:text-cyan-600 dark:hs-datatable-ordering-asc:text-cyan-500" d="m7 9 5-5 5 5"></path></svg></div></th>
                                         <th scope="col" class="px-4 py-3">
                                <span class="sr-only">Actions</span>
                            </th>

                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
  @foreach ($queue as $item)


                                            <tr>
    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">{{ $item->patient->name }}</td>
    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
   {{ $item->patient->patient_number }}
    </td>
<td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
  <span class="text-yellow-800 text-xs font-medium px-2.5 py-0.5 rounded border border-yellow-400 dark:text-yellow-300 dark:border-yellow-300">
    {{ $item->status }}
  </span>
</td>

    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">{{ $item->created_at->format('Y-m-d H:i:s') }}</td>
    
      <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
     <button 
    wire:click="sendToDoctor({{ $item->id }})"
    class="{{ $item->status === 'diagnosing' ? 'bg-gray-500' : 'bg-blue-600' }} text-white px-3 py-1 rounded disabled:opacity-50 disabled:cursor-not-allowed"
    @if($item->status === 'diagnosing') disabled @endif
  >
    {{ $item->status === 'diagnosing' ? 'Already Sent' : 'Send to Doctor' }}
  </button>
      </td>
    
 

</tr>
@endforeach
                                </tbody>
                            </table>
            </div>
         
        </div>
    </div>
    </section>








</div>






