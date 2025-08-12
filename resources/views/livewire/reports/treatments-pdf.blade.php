<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>VUNJA DENTAL Price List</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 40px;
            color: #111;
            background: #fff;
        }
        h1 {
            text-align: center;
            line-height: 1.2;
            margin-bottom: 30px;
            font-weight: 700;
            font-size: 28px;
            white-space: pre-line;
            letter-spacing: 1px;
            text-transform: uppercase;
            color: #222;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.05);
        }
        th, td {
            border: 2px solid #000;
            padding: 12px 15px;
            text-align: left;
            font-weight: 500;
            font-size: 16px;
        }
        th {
            font-weight: 700;
            background: none;
            color: #000;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }
        tbody tr:hover {
            background-color: #f5f5f5;
            transition: background-color 0.3s ease;
        }
    </style>
</head>
<body>
    <h1>VUNJA DENTAL
COMPREHENSIVE DENTAL CLINIC
PRICE LIST PROFILE</h1>

    <table>
        <thead>
            <tr>
                <th>S/N</th>
                <th>Name</th>
                <th>Standard Price</th>
                <th>Fast Track Price</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($treatments as $index => $treatment)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $treatment->name }}</td>
                <td>{{ number_format($treatment->price, 2) }}</td>
                <td>{{ number_format($treatment->fast_track_price, 2) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
