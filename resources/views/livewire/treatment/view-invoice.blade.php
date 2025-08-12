<div class="p-6 max-w-4xl mx-auto">
        <h2 class="text-2xl font-bold mb-4">Invoice #{{ $invoice->id }}</h2>

        <p><strong>Patient:</strong> {{ $invoice->queue->patient->name }}</p>

        <div class="mt-4">
            <h3 class="font-semibold">Treatments:</h3>
       <ul class="list-disc list-inside">
    @foreach ($invoice->treatments as $treatment)
        <li>
            <pre>{{ var_export($treatment, true) }}</pre>
            {{ is_array($treatment) ? ($treatment['name'] ?? 'No name') : 'Not an array' }} - Tsh {{ is_array($treatment) ? ($treatment['price'] ?? 0) : '?' }}
        </li>
    @endforeach
</ul>


        </div>
    </div>