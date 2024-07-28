<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konfirmasi Alamat</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }
        .container {
            max-width: 600px;
            margin-top: 50px;
            background-color: #ffffff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            border-radius: 8px;
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
        }
        .alamat {
            background-color: #f2f2f2;
            padding: 15px;
            border-radius: 5px;
        }
        .alamat h4 {
            margin-bottom: 10px;
        }
        .button-container {
            text-align: center;
            margin-top: 30px;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
        .btn-primary:hover {
            background-color: #0069d9;
            border-color: #0062cc;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Konfirmasi Alamat</h1>
        </div>
        <div class="content">
            <div class="alamat">
                <h4>Alamat Anda Adalah:</h4>
                <h2 id="alamat-text"></h2>
            </div>
            <div class="button-container">
                <a href="/delivery" class="btn btn-warning ml-2">Kembali ke Masukan Alamat</a>
                <a id="selanjutnya" href="#" class="btn btn-primary ml-2">Selanjutnya</a>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        $(document).ready(function() {
            // Get address from URL parameters
            var urlParams = new URLSearchParams(window.location.search);
            var address = urlParams.get('address');

            // Display address on the page
            $('#alamat-text').text(address);

            // Handle click event for "Selanjutnya" button
            $('#selanjutnya').click(function(e) {
                e.preventDefault(); // Prevent default behavior (optional)
                window.location.href = '/delivery/summary'; // Redirect to the summary page
            });
        });
    </script>

</body>
</html>