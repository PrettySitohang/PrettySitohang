<h1>Tambah Data Rute</h1>
<form action="" method="post">
    <label for="destination">Tujuan:</label><br>
    <input type="text" name="destination" id="destination" required><br><br>

    <label for="total_teams">Jumlah Tim:</label><br>
    <input type="text" name="total_teams" id="total_teams" required><br><br>

    <label for="from">Berangkat Dari:</label><br>
    <input type="text" name="from" id="from" required><br><br>

    <label for="quantity_of_cpo">Jumlah CPO (liter):</label><br>
    <input type="number" name="quantity_of_cpo" id="quantity_of_cpo" required><br><br>

    <label for="departure_date">Tanggal Berangkat:</label><br>
    <input type="datetime-local" name="departure_date" id="departure_date" required><br><br>

    <label for="estimation_arrival_date">Estimasi Tiba:</label><br>
    <input type="datetime-local" name="estimation_arrival_date" id="estimation_arrival_date" required><br><br>

    <label for="status">Status:</label><br>
    <select name="status" id="status" required>
        <option value="">--Pilih Status--</option>
        <option value="on the way">On The Way</option>
        <option value="arrived">Arrived</option>
    </select><br><br>

    <button type="submit" name="submit">Simpan Rute</button>
</form>
