<?= validation_errors(); ?>
<?= form_open('dosen/update/' . $dosen['nik']) ?>
    NIK<br>
    <input type="text" name="nik" value="<?= $dosen['nik'] ?>"><br><br>

	Nama<br>
	<input type="text" name="nama" value="<?= $dosen['nama'] ?>"><br><br>

	Jenis Kelamin<br>
	<input type="radio" name="jenis_kelamin" value="L">Laki-laki<br>
	<input type="radio" name="jenis_kelamin" value="P">Perempuan<br><br>

	Tempat Lahir<br>
	<input type="text" name="tempat_lahir" value="<?= $dosen['tempat_lahir'] ?>"><br><br>

	Tanggal Lahir<br>
	<input type="date" name="tanggal_lahir" value="<?= $dosen['tanggal_lahir'] ?>"><br><br>

    Email<br>
	<input type="email" name="email" value="<?= $dosen['email'] ?>"><br><br>

    No Hp<br>
	<input type="text" name="no_hp" value="<?= $dosen['no_hp'] ?>"><br><br>

	Kewarganegaraan<br>
	<input type="radio" name="kewarganegaraan" value="wni">WNI<br>
	<input type="radio" name="kewarganegaraan" value="wna">WNA<br><br>

    Agama<br>
	<input type="text" name="agama" value="<?= $dosen['agama'] ?>"><br><br>

    Alamat<br>
	<input type="text" name="alamat" value="<?= $dosen['alamat'] ?>"><br><br>

	<input type="submit" value="Simpan">
</form>