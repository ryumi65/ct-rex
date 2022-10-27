<?= validation_errors(); ?>
<?= form_open('mahasiswa/update/' . $mahasiswa['nim']) ?>
	NIM<br>
	<input type="text" name="nim" value="<?= $mahasiswa['nim'] ?>"><br><br>

	Nama<br>
	<input type="text" name="nama" value="<?= $mahasiswa['nama'] ?>"><br><br>

	Jenis Kelamin<br>
	<input type="radio" name="jenis_kelamin" value="L">Laki-laki<br>
	<input type="radio" name="jenis_kelamin" value="P">Perempuan<br><br>

	Tempat Lahir<br>
	<input type="text" name="tempat_lahir" value="<?= $mahasiswa['tempat_lahir'] ?>"><br><br>

	Tanggal Lahir<br>
	<input type="date" name="tanggal_lahir" value="<?= $mahasiswa['tanggal_lahir'] ?>"><br><br>

	Tahun Angkatan<br>
	<input type="text" name="tahun_angkatan" value="<?= $mahasiswa['tahun_angkatan'] ?>"><br><br>

	<input type="submit" value="Simpan">
</form>
