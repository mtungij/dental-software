<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Consultation Invoice</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; }
        h1 { text-align: center; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        td, th { border: 1px solid #ddd; padding: 8px; }
        th { background-color: #f4f4f4; }
    </style>
</head>
<body>
    <h1>Consultation Invoice</h1>

    <p><strong>Patient Name:</strong> {{ $patient->name }}</p>
    <p><strong>Patient Number:</strong> {{ $patient->patient_number }}</p>
    <p><strong>Patient Type:</strong> {{ ucwords(str_replace('_', ' ', $invoice->price_type)) }}</p>
    <p><strong>Date:</strong> {{ now()->format('Y-m-d') }}</p>

    <table>
        <thead>
            <tr>
                <th>Description</th>
                <th>Amount (TZS)</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Consultation Fee</td>
                <td>{{ number_format(floatval($invoice->total_amount), 2) }}</td>
            </tr>
        </tbody>
    </table>
</body>
</html>
