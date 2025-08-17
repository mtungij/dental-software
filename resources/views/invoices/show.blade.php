

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Consultation fee Invoice</title>
    <style>
        body {
            width: 80mm;
            font-family: Arial, sans-serif;
            font-size: 12px;
            margin: 0;
            padding: 0;
            position: relative;
        }

        /* Watermark */
        body::before {
            content: "PAID";
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%) rotate(-45deg);
            font-size: 48px;
            color: rgba(0,0,0,0.1);
            z-index: 0;
            pointer-events: none;
        }

        .header, .footer {
            text-align: center;
            position: relative;
            z-index: 1;
        }

        .header h2 {
            margin: 0;
            font-size: 16px;
        }

        .header p {
            margin: 2px 0;
            font-size: 10px;
        }

        .content {
            margin-top: 10px;
            position: relative;
            z-index: 1;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 5px;
        }

        table th, table td {
            text-align: left;
            padding: 3px 0;
        }

        table th {
            border-bottom: 1px dashed #000;
        }

        table td {
            border-bottom: 1px dotted #ccc;
        }

        .total {
            margin-top: 5px;
            font-weight: bold;
            text-align: right;
        }

        .footer p {
            margin-top: 10px;
            font-size: 10px;
        }
    </style>
</head>
<body>
    <div class="header">
        <h2>Vunja Dental Clinic</h2>
        <p>Morogoro, Madizini Road Turiani</p>
        <p>Phone: 0787261617 | 0652595979</p>
    </div>

    <div class="content">
        <p><strong>Invoice Number:</strong> {{ $invoice->patient->patient_number }}</p>
        <p><strong>Patient Name:</strong> {{ $invoice->patient->name }}</p>
        <p><strong>Date:</strong> {{ now()->format('d-m-Y H:i') }}</p>

        <table>
            <thead>
                <tr>
                    <th>Consultation Fee Type</th>
                    <th>Amount</th>
                </tr>
            </thead>
            <tbody>
             
                <tr>
                    <td>{{ $invoice->type }}</td>
                    <td>{{ number_format($invoice->total_amount, 2) }}</td>
                </tr>
            <tr>
            <th>Total</th>
            <th>{{ number_format($invoice->total_amount, 2) }}</th>
        </tr>
            </tbody>
        </table>
    </div>

    <div class="footer">
        <p>Smile confidently with us</p>
    </div>

 <script>
        window.onafterprint = function() {
            window.location.href = '/patients/create';
        };
        window.print();
    </script>
</body>
</html>
