@if($showReceipt && $lastRegisteredPatient)
<div id="receiptWrapper" class="p-4 bg-gray-50 dark:bg-gray-900 rounded-md shadow-md">
    <div id="receiptContent">
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <title>Investigation Invoice</title>
            <style>
                body { width: 80mm; font-family: Arial,sans-serif; font-size: 12px; margin: 0; padding:0; position: relative; }
                body::before { content: "PAID"; position:absolute; top:50%; left:50%; transform:translate(-50%,-50%) rotate(-45deg); font-size:48px; color: rgba(0,0,0,0.1); z-index:0; pointer-events:none;}
                .header, .footer { text-align:center; position:relative; z-index:1; }
                .header h2 { margin:0; font-size:16px; }
                .header p { margin:2px 0; font-size:10px; }
                .content { margin-top:10px; position:relative; z-index:1; }
                table { width:100%; border-collapse:collapse; margin-top:5px; }
                table th, table td { text-align:left; padding:3px 0; }
                table th { border-bottom:1px dashed #000; }
                table td { border-bottom:1px dotted #ccc; }
                .total { margin-top:5px; font-weight:bold; text-align:right; }
                .footer p { margin-top:10px; font-size:10px; }
            </style>
        </head>
        <body>
            <div class="header">
                <h2>Vunja Dental Clinic</h2>
                <p>Morogoro, Madizini Road Turiani</p>
                <p>Phone: 0787261617 | 0652595979</p>
            </div>

            <div class="content">
                <p><strong>Patient Number:</strong> {{ $lastRegisteredPatient->patient_number }}</p>
                <p><strong>Name:</strong> {{ $lastRegisteredPatient->name }}</p>
                <p><strong>Date:</strong> {{ now()->format('d-m-Y H:i') }}</p>

                <table>
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Type</th>
                            <th>Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($treatments as $t)
                        <tr>
                            <td>{{ $t['name'] }}</td>
                            <td>{{ $t['price_type'] }}</td>
                            <td>{{ number_format($t['price'], 2) }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                <p class="total">Total: {{ number_format(array_sum(array_column($treatments,'price')), 2) }}</p>
            </div>

            <div class="footer">
                <p>God will heal you</p>
            </div>
        </body>
        </html>
    </div>

    <div class="mt-4 text-right">
        <button 
            onclick="printStyledReceipt()"
            class="px-4 py-2 bg-cyan-600 text-white rounded hover:bg-cyan-700 transition"
        >Print</button>
    </div>
</div>
@endif
