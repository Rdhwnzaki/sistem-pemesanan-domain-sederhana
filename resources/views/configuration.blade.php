<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konfigurasi</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .card {
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        .total-value {
            font-size: 1.5rem;
            font-weight: bold;
            color: #ffffff;
            padding: 10px;
            border-radius: 5px;
            background-color: #007bff;
            text-align: center;
        }

        .hidden {
            display: none;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .header h2 {
            font-size: 2rem;
            color: #007bff;
        }

        .header p {
            color: #555;
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

        @media (max-width: 576px) {
            .header h2 {
                font-size: 1.5rem;
            }
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <div class="header">
            <h2>Konfigurasi Domain</h2>
            <p>Silakan isi informasi berikut untuk melanjutkan.</p>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h5 class="card-title" id="domainNameTitle"></h5>
                    <select class="form-select w-50" id="durationSelect">
                        <option selected>Pilih durasi</option>
                        <option value="1">1 tahun</option>
                        <option value="2">2 tahun</option>
                        <option value="3">3 tahun</option>
                    </select>
                </div>
                <div class="d-flex justify-content-end">
                    <h6 class="total-value" id="totalValues">Rp. 0</h6>
                </div>

                <form id="userInfoForm" class="mt-4 hidden">
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="name" placeholder="Masukkan nama Anda" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" placeholder="Masukkan email Anda" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" placeholder="Masukkan password Anda" required>
                    </div>
                    <div class="d-flex justify-content-start">
                        <button type="submit" class="btn btn-primary">Checkout</button>
                    </div>
                </form>

                <div id="userInfoMessage" class="mt-4 hidden">
                    <p id="userNames" class="mt-2"></p>
                    <p id="userEmails" class="mt-2"></p>
                </div>

                <div id="checkoutSection" class="hidden">
                    <button id="checkoutButton" class="btn btn-primary">Checkout</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        function updateDomainName() {
            const storedDomainName = localStorage.getItem('domainName') || 'Tidak ada domain yang disimpan';
            document.getElementById('domainNameTitle').innerText = storedDomainName;
        }

        function updateTotalValue(selectedValue) {
            const totalValue = selectedValue * 100000;
            document.getElementById("totalValues").innerText = "Rp. " + totalValue.toLocaleString();
        }

        updateDomainName();

        const storedUserName = localStorage.getItem('userName');
        const storedUserEmail = localStorage.getItem('userEmail');
        const storedUserPassword = localStorage.getItem('userPassword');

        if (storedUserName && storedUserEmail && storedUserPassword) {
            document.getElementById('userInfoForm').classList.add('hidden');
            document.getElementById('userInfoMessage').classList.remove('hidden');
            document.getElementById('checkoutSection').classList.remove('hidden');
            document.getElementById('userNames').innerText = `Nama: ${storedUserName}`;
            document.getElementById('userEmails').innerText = `Email: ${storedUserEmail}`;
        } else {
            document.getElementById('userInfoForm').classList.remove('hidden');
            document.getElementById('checkoutSection').classList.add('hidden');
        }

        document.getElementById('durationSelect').addEventListener('change', function() {
            const selectedValue = this.value || 1;
            localStorage.setItem('selectedDuration', selectedValue);
            updateTotalValue(selectedValue);
        });

        const savedDuration = localStorage.getItem('selectedDuration');
        if (savedDuration) {
            document.getElementById('durationSelect').value = savedDuration;
            updateTotalValue(savedDuration);
        }

        document.getElementById('userInfoForm').addEventListener('submit', function(event) {
            event.preventDefault();

            const name = document.getElementById('name').value;
            const email = document.getElementById('email').value;
            const password = document.getElementById('password').value;

            const invoiceNumber = Date.now();

            localStorage.setItem('userName', name);
            localStorage.setItem('userEmail', email);
            localStorage.setItem('userPassword', password);
            localStorage.setItem('invoiceNumber', invoiceNumber);
            window.location.href = '/invoice';
        });

       
        document.getElementById('checkoutButton').addEventListener('click', function() {
            if (localStorage.getItem('userName') && localStorage.getItem('userEmail') && localStorage.getItem('selectedDuration')) {
                window.location.href = '/invoice';
            } else {
                alert('Silakan isi data pengguna terlebih dahulu.');
            }
        });
    </script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.6/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>

</html>
