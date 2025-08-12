<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Consultation Report</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            margin: 40px;
            position: relative;
        }

        header {
            text-align: center;
            margin-bottom: 20px;
            border-bottom: 3px solid #22b8cf; /* cyan */
            padding-bottom: 10px;
            color: #0891b2; /* darker cyan */
        }

        header h1 {
            margin: 0;
            font-size: 28px;
            font-weight: bold;
        }

        header p {
            margin: 2px 0;
            font-size: 14px;
            font-weight: 600;
            color: #0c4a6e;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
            font-size: 14px;
        }

        table, th, td {
            border: 1px solid #22b8cf; /* cyan border */
        }

        th {
            background-color: #a5f3fc; /* light cyan */
            color: #0c4a6e;
            font-weight: bold;
            padding: 8px;
            text-align: left;
        }

        td {
            padding: 6px 8px;
        }

        /* Watermark */
        .watermark {
            position: fixed;
            top: 45%;
            left: 50%;
            transform: translate(-50%, -50%) rotate(-30deg);
            font-size: 72px;
            color: rgba(34, 184, 207, 0.12); /* very light cyan */
            user-select: none;
            pointer-events: none;
            z-index: 0;
            font-weight: bold;
            font-family: Arial, sans-serif;
        }

        footer {
            position: fixed;
            bottom: 20px;
            width: 100%;
            text-align: center;
            font-size: 12px;
            color: #666;
        }

    </style>
</head>
<body>

<div class="watermark">Vunja Dental Clinic</div>

<header>
    <h1>Vunja Dental Clinic</h1>
    <p>Morogoro</p>
    <p>Phone: 0748470980</p>
    <p>
        Consultation Payments Report <br>
        @if(!empty($fromDate) && !empty($toDate))
            From {{ \Carbon\Carbon::parse($fromDate)->format('d M Y') }} to {{ \Carbon\Carbon::parse($toDate)->format('d M Y') }}
        @endif
    </p>
</header>

<table>
    <thead>
        <tr>
            <th>Patient Name</th>
            <th>Price Type</th>
            <th>Amount (TZS)</th>
            <th>Paid At</th>
        </tr>
    </thead>
    <tbody>
        @forelse($consultations as $invoice)
            <tr>
                <td>{{ $invoice->patient ? $invoice->patient->name : 'N/A' }}</td>
                <td>{{ ucfirst(str_replace('_', ' ', $invoice->price_type)) }}</td>
                <td>{{ number_format($invoice->total_amount, 2) }}</td>
                <td>{{ \Carbon\Carbon::parse($invoice->created_at)->format('d M Y H:i') }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="4" style="text-align:center; padding: 15px;">No consultation payments found.</td>
            </tr>
        @endforelse
    </tbody>
</table>

<footer>
    Generated on {{ \Carbon\Carbon::now()->format('d M Y H:i') }}
</footer>

</body>
</html>
