<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cari Domain</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .header {
            background-color: #007bff;
            color: white;
            padding: 40px 0;
            text-align: center;
            border-bottom: 5px solid #0056b3;
        }

        .header h1 {
            font-size: 2.5rem;
            margin-bottom: 10px;
        }

        .header p {
            font-size: 1.2rem;
            margin-top: 0;
        }

        .container {
            max-width: 600px;
            margin: 40px auto;
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            background-color: white;
        }

        .form-control {
            border-radius: 30px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .btn-primary {
            border-radius: 30px;
            transition: background-color 0.3s ease, border-color 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #004085;
        }

        .card {
            margin-top: 20px;
        }

        .card-title {
            font-size: 1.5rem;
        }

        .alert {
            border-radius: 10px;
            margin: 0;
            padding: 20px;
        }

        @media (max-width: 576px) {
            .header h1 {
                font-size: 2rem;
            }

            .header p {
                font-size: 1rem;
            }
        }
    </style>
</head>

<body>
    <div class="header">
        <h1>Cari Domain</h1>
        <p>Temukan domain yang kamu inginkan dengan mudah</p>
    </div>

    <div class="container mt-5">
        <form action="/check-domain" method="GET" class="text-center">
            <div class="form-group">
                <label for="domain">Masukkan nama domain:</label>
                <input type="text" id="domain" name="domain" placeholder="Contoh: example.com" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">CARI</button>
        </form>

        @if (isset($message))
        <div class="card mt-4">
            <div class="card-body text-center @if($available) alert-success @else alert-danger @endif">
                <h5 class="card-title">{{ $message }}</h5>
                @if($available)
                <script>
                    localStorage.setItem('domainName', '{{ $domain }}');
                </script>
                <a href="/configuration" class="btn btn-outline-primary">Pesan</a>
                @endif
            </div>
        </div>
        @endif
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
