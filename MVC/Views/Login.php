<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = htmlspecialchars($_POST['nama']);
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);

    echo "<!DOCTYPE html>
    <html lang='id'>
    <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>Data Terverifikasi</title>
        <link href='https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap' rel='stylesheet'>
        <style>
            body {
                font-family: 'Nunito', sans-serif;
                background-color: #f5f5f5;
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
                margin: 0;
            }
            .output-container {
                background-color: white;
                padding: 50px;
                border-radius: 12px;
                box-shadow: 0 6px 16px rgba(0, 0, 0, 0.1);
                width: 480px;
                text-align: center;
            }
            .logo {
                width: 130px;
                margin-bottom: 20px;
            }
            .verification-title {
                font-size: 24px;
                font-weight: 700;
                color: #2c3e50;
                text-transform: uppercase;
                margin-bottom: 25px;
            }
            .data-output {
                text-align: left;
                margin-top: 20px;
                padding: 18px;
                background-color: #f0f0f0;
                border-radius: 6px;
            }
            .data-item {
                margin-bottom: 12px;
                font-size: 16px;
            }
            .data-label {
                font-weight: 600;
                color: #333;
            }
        </style>
    </head>
    <body>
        <div class='output-container'>
            <img src='../gambar/logo-cpo.jpg' alt='Logo' class='logo'>
            <div class='verification-title'>Data Terverifikasi</div>
            <div class='data-output'>
                <div class='data-item'><span class='data-label'>Nama:</span> $nama</div>
                <div class='data-item'><span class='data-label'>Email:</span> $email</div>
                <div class='data-item'><span class='data-label'>Password:</span> " . str_repeat('*', strlen($password)) . "</div>
            </div>
        </div>
    </body>
    </html>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Verifikasi</title>
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Nunito', sans-serif;
      background-color: #f2f2f2;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
    }
    .verification-container {
      background-color: white;
      padding: 50px;
      border-radius: 12px;
      box-shadow: 0 6px 16px rgba(0, 0, 0, 0.1);
      width: 480px;
      text-align: center;
    }
    .logo {
      width: 130px;
      margin-bottom: 20px;
    }
    .verification-title {
      font-size: 24px;
      font-weight: 700;
      color: #2c3e50;
      margin-bottom: 25px;
      text-transform: uppercase;
    }
    .form-group {
      margin-bottom: 22px;
      text-align: left;
    }
    .form-group label {
      display: block;
      font-weight: 600;
      color: #444;
      margin-bottom: 6px;
      font-size: 14px;
      text-transform: uppercase;
    }
    .form-group input {
      width: 100%;
      padding: 12px;
      font-size: 15px;
      border: 1px solid #ccc;
      border-radius: 6px;
      box-sizing: border-box;
    }
    .login-button {
      background-color:#1a8641;
      color: white;
      padding: 14px;
      width: 100%;
      border: none;
      font-size: 16px;
      font-weight: 700;
      border-radius: 6px;
      text-transform: uppercase;
      cursor: pointer;
      transition: background-color 0.3s;
    }
    .login-button:hover {
      background-color: #27ae60;
    }
  </style>
</head>
<body>
  <div class="verification-container">
    <img src="../gambar/logo-cpo.jpg" alt="Logo CPO" class="logo">
    <div class="verification-title">Verifikasi Data</div>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
      <div class="form-group">
        <label for="nama">Nama</label>
        <input type="text" id="nama" name="nama" required>
      </div>
      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" required>
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" required>
      </div>
      <button type="submit" class="login-button">Login</button>
    </form>
  </div>
</body>
</html>
