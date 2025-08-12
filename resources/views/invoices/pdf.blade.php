<!-- resources/views/invoices/pdf.blade.php -->
<pre>{{ print_r($invoice->treatments, true) }}</pre>

<!DOCTYPE html>
<html>
<head>
    <title>Invoice #{{ $invoice->id }}</title>
    <style>
        body { font-family: sans-serif; font-size: 14px; }
        .header { text-align: center; font-weight: bold; font-size: 20px; }
        .content { margin-top: 20px; }
    </style>
</head>
<body>
    
    <div class="header">Invoice #{{ $invoice->id }}</div>

    <p><strong>Patient:</strong> {{ $invoice->queue->patient->name ?? '-' }}</p>
    <p><strong>Date:</strong> {{ $invoice->created_at->format('d M Y') }}</p>

    <div class="content">
        <h4>Treatments</h4>
        <ul>
            @foreach ($invoice->treatments as $treatment)
                <li>{{ $treatment['name'] }} - {{ number_format($treatment['price']) }}</li>
            @endforeach
        </ul>
        <p><strong>Total:</strong> {{ number_format($invoice->treatments_total ?? 0) }}</p>
    </div>
</body>
</html>
