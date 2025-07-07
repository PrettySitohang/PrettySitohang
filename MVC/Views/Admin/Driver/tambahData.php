<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Tambah Driver</h1>
<form action="" method="post">
    <label for="name">Nama:</label><br>
    <input type="text" name="name" id="name" required><br><br>

    <label for="username">Username:</label><br>
    <input type="text" name="username" id="username" required><br><br>

    <label for="email">Email:</label><br>
    <input type="email" name="email" id="email" required><br><br>

    <label for="password">Password:</label><br>
    <input type="password" name="password" id="password" required><br><br>

    <input type="hidden" name="role" value="driver">

    <button type="submit" name="submit">Simpan</button>
</form>

</body>
</html>