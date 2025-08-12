<div class="p-4 bg-white dark:bg-gray-800 rounded shadow  mx-auto">
    <h2 class="text-lg font-bold mb-4 text-gray-900 dark:text-gray-100">Manage Medicines</h2>

    @if (session()->has('success'))
        <div class="mb-4 text-green-600 dark:text-green-400">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
    <div class="mb-4 text-red-600">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


    {{-- Medicine Form --}}
 <div class="space-y-4">
    <div>
        <label class="text-gray-700 dark:text-gray-300">Name</label>
        <input type="text" wire:model="name"
               class="w-full border rounded px-3 py-2 border-gray-300 dark:border-gray-600
                      bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100">
    </div>

    <div class="flex gap-4">
        <div class="flex-1">
            <label class="text-gray-700 dark:text-gray-300">Quantity per Container</label>
            <input type="number" wire:model="quantity"
                   class="w-full border rounded px-3 py-2 border-gray-300 dark:border-gray-600
                          bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100">
        </div>
        <div class="flex-1">
            <label class="text-gray-700 dark:text-gray-300">Containers</label>
            <input type="number" wire:model="container"
                   class="w-full border rounded px-3 py-2 border-gray-300 dark:border-gray-600
                          bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100">
        </div>
    </div>

    <div class="flex gap-4">
        <div class="flex-1">
            <label class="text-gray-700 dark:text-gray-300">Buy Price</label>
            <input type="number" wire:model="buy_price" step="0.01"
                   class="w-full border rounded px-3 py-2 border-gray-300 dark:border-gray-600
                          bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100">
        </div>
        <div class="flex-1">
            <label class="text-gray-700 dark:text-gray-300">Sell Price</label>
            <input type="number" wire:model="sell_price" step="0.01"
                   class="w-full border rounded px-3 py-2 border-gray-300 dark:border-gray-600
                          bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100">
        </div>
    </div>

    <div>
        <label class="text-gray-700 dark:text-gray-300">Stock Limit</label>
        <input type="number" wire:model="stock_limit"
               class="w-full border rounded px-3 py-2 border-gray-300 dark:border-gray-600
                      bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100">
    </div>

    <div class="flex justify-center">
        <button
    wire:click="{{ $editId ? 'update' : 'save' }}"
    class="px-6 py-2 bg-cyan-500 border border-cyan-500 text-white rounded
           hover:bg-cyan-600 hover:border-cyan-600
           dark:bg-cyan-600 dark:hover:bg-cyan-500 dark:border-cyan-500
           transition-colors duration-200">
    {{ $editId ? 'Update Medicine' : 'Save Medicine' }}
</button>

    </div>
</div>

    {{-- Table Controls --}}
    <div class="mt-6 flex justify-between items-center">
        <input type="text" wire:model="search" placeholder="Search medicine..." class="border px-3 py-2 rounded border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-100">
        <button wire:click="exportPDF" class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600">Print PDF</button>
    </div>

    {{-- Table --}}
    <div class="mt-4 overflow-x-auto">
<table class="min-w-full border border-gray-300 dark:border-gray-600 mt-6">
  <thead class="bg-cyan-500 dark:text-white dark:bg-cyan-700">
    <tr>
        <th class="px-4 py-2 text-left">S/No</th>
        <th class="px-4 py-2 text-left">Name</th>
        <th class="px-4 py-2 text-left">Total Qty</th>
        <th class="px-4 py-2 text-left">Buy Price</th>
        <th class="px-4 py-2 text-left">Sell Price</th>
        <th class="px-4 py-2 text-left">Stock Limit</th>
        <th class="px-4 py-2 text-left">Status</th> <!-- new -->
        <th class="px-4 py-2 text-left">Actions</th>
    </tr>
</thead>
<tbody>
    @foreach ($medicines as $medicine)
        <tr class="border-t border-gray-300 dark:text-white dark:border-gray-600">
            <td class="px-4 py-2">{{ $loop->iteration }}</td>
            <td class="px-4 py-2">{{ $medicine->name }}</td>
            <td class="px-4 py-2">{{ $medicine->total_quantity }}</td>
            <td class="px-4 py-2">{{ number_format($medicine->buy_price, 2) }}</td>
            <td class="px-4 py-2">{{ number_format($medicine->sell_price, 2) }}</td>
            <td class="px-4 py-2">{{ $medicine->stock_limit }}</td>
            <td class="px-4 py-2">
                @if ($medicine->total_quantity <= $medicine->stock_limit)
                    <span class="inline-block bg-red-600 text-white text-xs px-2 py-0.5 rounded">
                        Out of Stock
                    </span>
                @else
                    <span class="inline-block bg-green-600 text-white text-xs px-2 py-0.5 rounded">
                        In Stock
                    </span>
                @endif
            </td>
            <td class="px-4 py-2 flex gap-2">
                <button wire:click="edit({{ $medicine->id }})"
                    class="px-3 py-1 bg-yellow-500 text-white rounded hover:bg-yellow-600">
                    Edit
                </button>
                <button wire:click="delete({{ $medicine->id }})"
                    onclick="return confirm('Are you sure?')"
                    class="px-3 py-1 bg-red-500 text-white rounded hover:bg-red-600">
                    Delete
                </button>
            </td>
        </tr>
    @endforeach
</tbody>

</table>


<div class="mt-4">
    {{ $medicines->links() }}
</div>


  
    </div>
    </div>
