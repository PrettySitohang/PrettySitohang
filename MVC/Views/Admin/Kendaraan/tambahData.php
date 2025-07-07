<h1>Tambah Data Armada</h1>
<form action="" method="post">
    <label for="name">Nama Kendaraan:</label><br>
    <input type="text" name="name" id="name" required><br><br>

    <label for="type">Tipe Kendaraan:</label><br>
    <select name="type" id="type" required>
        <option value="">--Pilih Tipe--</option>
        <option value="small">Small</option>
        <option value="big">Big</option>
        <option value="jumbo">Jumbo</option>
    </select><br><br>

    <label for="volume">Volume:</label><br>
    <input type="text" name="volume" id="volume" required><br><br>

    <label for="plat_number">Plat Nomor:</label><br>
    <input type="text" name="plat_number" id="plat_number" required><br><br>

    <label for="description">Deskripsi:</label><br>
    <textarea name="description" id="description"></textarea><br><br>

    <button type="submit" name="submit">Simpan</button>
</form>
