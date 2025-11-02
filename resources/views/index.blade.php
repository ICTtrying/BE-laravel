@vite(['resources/css/app.css', 'resources/js/app.js'])
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Producten</title>
    <style>
        body {
            background: linear-gradient(135deg, #f5f7fa, #c3cfe2);
            font-family: "Inter", system-ui, sans-serif;
            color: #333;
            min-height: 100vh;
        }

        h1 {
            text-align: center;
            font-weight: 700;
            color: #2c3e50;
            margin-bottom: 1.5rem;
            letter-spacing: 0.5px;
        }

        .container {
            background: #fff;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
            padding: 2rem;
            margin-top: 2rem;
        }

        hr {
            border: none;
            height: 2px;
            background: linear-gradient(90deg, #74b9ff, #a29bfe);
            border-radius: 1px;
        }

        .table {
            border-radius: 10px;
            overflow: hidden;
        }

        .table thead {
            background: #0984e3;
            color: #fff;
            text-transform: uppercase;
            font-size: 0.9rem;
        }

        .table tbody tr {
            transition: background-color 0.2s ease;
        }

        .table tbody tr:hover {
            background-color: rgba(116, 185, 255, 0.1);
        }

        td,
        th {
            vertical-align: middle !important;
            text-align: center;
        }

        .btn {
            border: none;
            border-radius: 8px;
            transition: all 0.2s ease-in-out;
            font-weight: 600;
        }

        .btn-sm {
            padding: 6px 10px;
            font-size: 0.85rem;
        }

        .btn-danger {
            background: #e17055;
        }

        .btn-danger:hover {
            background: #d63031;
            transform: scale(1.05);
        }

        .btn-success {
            background: #00b894;
        }

        .btn-success:hover {
            background: #00a383;
            transform: scale(1.05);
        }
    </style>
</head>

<body class="mt-4">
    <div class="container d-flex justify-content-center ">
        <div class="col-md-10">
            <h1>{{ $title }}</h1>
            <hr class="my-4" />
            <table class="table table-hover table-striped">
                <thead>
                    <th>Barcode</th>
                    <th>Naam</th>
                    <th>VerpakkingsEenheid</th>
                    <th>AantalAanwezig</th>
                    <th>Allergenen Info</th>
                    <th>Leverantie Info</th>
                </thead>
                <tbody>
                    @forelse ($products as $product)
                        <tr>
                            <td>{{ $product->Barcode }}</td>
                            <td>{{ $product->Naam }}</td>
                            <td>{{ $product->VerpakkingsEenheid }}</td>
                            <td>{{ $product->AantalAanwezig }}</td>
                            <td class="text-center">
                                <form action="{{ route('products.allergenenInfo', $product->Id) }}" method="POST">
                                    @csrf
                                    @method('GET')
                                    <button type="submit" class="btn btn-danger btn-sm">Allergenen Info</button>
                                </form>
                            </td>
                            <td class="text-center">
                                <form action="{{ route('products.leveringsInfo', $product->Id) }}" method="POST">
                                    @csrf
                                    @method('GET')
                                    <button type="submit" class="btn btn-success btn-sm">Leverantie Info</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr colspan='3'>Geen producten bekend</tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>
