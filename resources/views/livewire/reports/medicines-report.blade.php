<!DOCTYPE html>
<html>
<head>
    <title>Medicines Report</title>
    <style>
        body { font-family: sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #000; padding: 4px; }
        th { background: #eee; }
        tfoot td { font-weight: bold; background: #f2f2f2; }
    </style>
</head>
<body>
    <h2>Medicines Report</h2>
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Quantity per Container</th>
                <th>Containers</th>
                <th>Total Quantity</th>
                <th>Buy Price</th>
                <th>Sell Price</th>
            </tr>
        </thead>
        <tbody>
            @php
                $totalQtyPerContainer = 0;
                $totalContainers = 0;
                $totalQuantity = 0;
                $totalBuyPrice = 0;
                $totalSellPrice = 0;
            @endphp

            @foreach ($medicines as $medicine)
                @php
                    $totalQtyPerContainer += $medicine->quantity_per_container;
                    $totalContainers += $medicine->container;
                    $totalQuantity += $medicine->total_quantity;
                    $totalBuyPrice += $medicine->buy_price;
                    $totalSellPrice += $medicine->sell_price;
                @endphp
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $medicine->name }}</td>
                    <td>{{ $medicine->quantity_per_container }}</td>
                    <td>{{ $medicine->container }}</td>
                    <td>{{ $medicine->total_quantity }}</td>
                    <td>{{ number_format($medicine->buy_price, 2) }}</td>
                    <td>{{ number_format($medicine->sell_price, 2) }}</td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="2">Totals</td>
                <td>{{ $totalQtyPerContainer }}</td>
                <td>{{ $totalContainers }}</td>
                <td>{{ $totalQuantity }}</td>
                <td>{{ number_format($totalBuyPrice, 2) }}</td>
                <td>{{ number_format($totalSellPrice, 2) }}</td>
            </tr>
        </tfoot>
    </table>
</body>
</html>
