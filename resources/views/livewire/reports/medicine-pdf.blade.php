<!DOCTYPE html>
<html>
<head>
    <title>Medicine Fees Report</title>
    <style>
        body { font-family: sans-serif; font-size: 12px; margin:0; padding:0; }
        h2 { text-align:center; margin-bottom:5px; }
        p { text-align:center; margin:0; margin-bottom:10px; }
        table { width:100%; border-collapse: collapse; margin-top:10px; }
        th, td { border:1px solid #000; padding:5px; text-align:left; }
        th { background-color:#f2f2f2; font-weight:bold; }
        tfoot td { font-weight:bold; background-color:#e0e0e0; }
        .footer { position: fixed; bottom: -30px; left:0; right:0; height:30px; text-align:center; font-size:10px; color:#555; }
    </style>
</head>
<body>
    <h2>Paid Medicine Fees Report</h2>
    <p>From: {{ $from_date }} To: {{ $to_date }}</p>

    <table>
        <thead>
            <tr>
                <th>Invoice ID</th>
                <th>Patient</th>
                <th>Medicine Details</th>
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
                        <ul>
                            @foreach($invoice->invoiceItems as $item)
                                <li>{{ $item->medicine->name ?? 'N/A' }} - {{ number_format($item->price,2) }}</li>
                            @endforeach
                        </ul>
                    </td>
                    <td>{{ number_format($invoice->total_amount,2) }}</td>
                    <td>{{ $invoice->updated_at->format('Y-m-d H:i') }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" style="text-align:center;">No medicine fees found.</td>
                </tr>
            @endforelse
        </tbody>
        @if($invoices->count())
        <tfoot>
            <tr>
                <td colspan="3" style="text-align:right;">Total:</td>
                <td colspan="2" style="color:green;">{{ number_format($totalAmount,2) }}</td>
            </tr>
        </tfoot>
        @endif
    </table>

    <div class="footer">
        Page <span class="page-number"></span>
    </div>

    <script type="text/php">
        if (isset($pdf)) {
            $pdf->page_text(500, 820, "Page {PAGE_NUM} of {PAGE_COUNT}", null, 10);
        }
    </script>
</body>
</html>
