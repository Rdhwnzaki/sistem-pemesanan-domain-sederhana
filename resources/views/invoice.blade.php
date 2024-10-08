<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }

        h1 {
            color: #343a40;
            margin-bottom: 20px;
            text-align: center;
        }

        h2 {
            color: #007bff;
            margin-top: 30px;
            margin-bottom: 10px;
        }

        .invoice-container {
            background: #ffffff;
            border-radius: 8px;
            padding: 30px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            margin: 0 auto;
            max-width: 600px;
        }

        .highlight {
            background-color: #e9ecef;
            padding: 10px;
            border-radius: 5px;
        }

        .footer-note {
            margin-top: 20px;
            font-weight: bold;
            text-align: center;
            color: #6c757d;
        }

        .table th {
            background-color: #007bff;
            color: #ffffff;
        }

        .table td {
            vertical-align: middle;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <div class="invoice-container">
            <h1>Invoice</h1>
            <div class="highlight">
                <p id="userName">Nama: <span></span></p>
                <p id="userEmail">Email: <span></span></p>
                <p id="invoiceNumber">Nomor Invoice: <span></span></p>
                <p id="selectedDuration">Durasi Terpilih: <span></span> tahun</p>
            </div>

            <h2>Detail Pembayaran</h2>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Deskripsi</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td id="description"></td>
                        <td id="total"></td>
                    </tr>
                </tbody>
            </table>
            <p class="footer-note">Silahkan bayar di no rekening berikut ini: <br>
                <strong>663721667321</strong></p>
        </div>
    </div>

    <script>
        const userName = localStorage.getItem('userName');
        const userEmail = localStorage.getItem('userEmail');
        const invoiceNumber = localStorage.getItem('invoiceNumber'); 
        const selectedDuration = localStorage.getItem('selectedDuration');
        const domainName = localStorage.getItem('domainName'); 

      
        document.querySelector('#userName span').textContent = userName || 'N/A';
        document.querySelector('#userEmail span').textContent = userEmail || 'N/A';
        document.querySelector('#invoiceNumber span').textContent = invoiceNumber || 'INV-' + Date.now();
        document.querySelector('#selectedDuration span').textContent = selectedDuration || '0';

       
        const total = selectedDuration ? (selectedDuration * 100000) : 0;

       
        document.querySelector('#description').textContent = `Pembelian domain ${domainName || 'tidak tersedia'}`;

        
        document.querySelector('#total').textContent = `Rp. ${total}`;
    </script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.6/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>

</html>
