<?php
// Memproses data ketika form di-submit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mengambil data dari form
    $nama = htmlspecialchars($_POST['nama']);
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']); // Dalam aplikasi nyata, password harus di-hash
    
    // Menampilkan output
    echo "<!DOCTYPE html>
    <html lang='en'>
    <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>Output Verifikasi Data</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                background-color: #f5f5f5;
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
                margin: 0;
            }
            .output-container {
                background-color: white;
                padding: 30px;
                border-radius: 10px;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                width: 350px;
                text-align: center;
            }
            .header {
                margin-bottom: 25px;
            }
            .digital-id {
                font-size: 18px;
                font-weight: bold;
                color: #333;
            }
            .verification-title {
                font-size: 24px;
                font-weight: bold;
                margin-top: 5px;
                color: #2c3e50;
            }
            .data-output {
                text-align: left;
                margin-top: 20px;
                padding: 15px;
                background-color: #f9f9f9;
                border-radius: 5px;
            }
            .data-item {
                margin-bottom: 10px;
            }
            .data-label {
                font-weight: bold;
                color: #555;
            }
        </style>
    </head>
    <body>
        <div class='output-container'>
            <div class='header'>
                <div class='digital-id'>Digital ID</div>
                <div class='verification-title'>DATA TERVERIFIKASI</div>
            </div>
            
            <div class='data-output'>
                <div class='data-item'>
                    <span class='data-label'>NAMA:</span> $nama
                </div>
                <div class='data-item'>
                    <span class='data-label'>EMAIL:</span> $email
                </div>
                <div class='data-item'>
                    <span class='data-label'>PASSWORD:</span> " . str_repeat('*', strlen($password)) . "
                </div>
            </div>
        </div>
    </body>
    </html>";
    exit; // Menghentikan eksekusi script setelah menampilkan output
}

// Jika tidak ada data yang di-submit, tampilkan form
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifikasi Data Digital</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .verification-container {
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 350px;
            text-align: center;
        }
        .header {
            margin-bottom: 25px;
        }
        .digital-id {
            font-size: 18px;
            font-weight: bold;
            color: #333;
        }
        .verification-title {
            font-size: 24px;
            font-weight: bold;
            margin-top: 5px;
            color: #2c3e50;
        }
        .form-group {
            margin-bottom: 20px;
            text-align: left;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #555;
        }
        .form-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-sizing: border-box;
        }
        .login-button {
            background-color: #3498db;
            color: white;
            border: none;
            padding: 12px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            width: 100%;
            transition: background-color 0.3s;
        }
        .login-button:hover {
            background-color: #2980b9;
        }
    </style>
</head>
<body>
    <div class="verification-container">
        <div class="header">
            <div class="digital-id">Digital ID</div>
            <div class="verification-title">VERIFIKASI DATA</div>
        </div>
        
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div class="form-group">
                <label for="nama">NAMA</label>
                <input type="text" id="nama" name="nama" required>
            </div>
            
            <div class="form-group">
                <label for="email">EMAIL</label>
                <input type="email" id="email" name="email" required>
            </div>
            
            <div class="form-group">
                <label for="password">PASSWORD</label>
                <input type="password" id="password" name="password" required>
            </div>
            
            <button type="submit" class="login-button">LOGIN</button>
        </form>
    </div>
</body>
</html>