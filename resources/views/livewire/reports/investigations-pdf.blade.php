<!DOCTYPE html>
<html>
<head>
    <title>Paid Investigations Report</title>
    <style>
        body { font-family: sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th, td { border: 1px solid #000; padding: 5px; text-align: left; }
        th { background-color: #f2f2f2; }
        h2 { text-align: center; }
    </style>
</head>
<body>
    <h2>Paid Investigations Report</h2>
    <p>From: {{ $from_date }} To: {{ $to_date }}</p>

    <table>
        <thead>
            <tr>
                <th>Invoice ID</th>
                <th>Patient</th>
                <th>Treatments</th>
                <th>Total Amount</th>
                <th>Date Paid</th>
            </tr>
        </thead>
        <tbody>
            @forelse($invoices as $invoice)
                <tr>
                    <td>{{ $invoice->id }}</td>
                    <td>{{ $invoice->queue->patient->name ?? 'N/A' }}</td>
                    <td>
                        @foreach($invoice->treatment_names as $t)
                            {{ $t['name'] }} - {{ number_format($t['price'], 2) }} ({{ $t['price_type'] }})<br>
                        @endforeach
                    </td>
                    <td>{{ number_format($invoice->total_amount, 2) }}</td>
                    <td>{{ $invoice->updated_at->format('Y-m-d H:i') }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" style="text-align:center;">No investigations found.</td>
                </tr>
            @endforelse
        </tbody>
        @if($invoices->count())
        <tfoot>
            <tr>
                <td colspan="3" style="text-align:right;"><strong>Total:</strong></td>
                <td colspan="2">{{ number_format($totalAmount, 2) }}</td>
            </tr>
        </tfoot>
        @endif
    </table>
</body>
</html>
