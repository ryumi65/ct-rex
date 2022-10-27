<<<<<<< Updated upstream
<?= validation_errors(); ?>
<?= form_open('mahasiswa/create') ?>
	NIM<br>
	<input type="text" name="nim"><br><br>

	Nama<br>
	<input type="text" name="nama"><br><br>

	Jenis Kelamin<br>
	<input type="radio" name="jenis_kelamin" value="L">Laki-laki<br>
	<input type="radio" name="jenis_kelamin" value="P">Perempuan<br><br>

	Tempat Lahir<br>
	<input type="text" name="tempat_lahir"><br><br>

	Tanggal Lahir<br>
	<input type="date" name="tanggal_lahir"><br><br>

	Tahun Angkatan<br>
	<input type="text" name="tahun_angkatan"><br><br>

	<input type="submit" value="Simpan">
</form>
=======
<?= validation_errors(); ?>
<?= form_open('prodi/create'); ?>
    id_prodi<br>
    <input type="text" name="id_prodi"><br><br>

    Nama<br>
    <input type="text" name="Nama"><br><br>

    id_fakultas<br>
    <input type="text" name="id_fakultas"><br><br>

    <input type="submit" value="Simpan">
</form>
>>>>>>> Stashed changes
