<?= validation_errors(); ?>
<?= form_open('dosen/update/' . $dosen['nik']) ?>
    <p>NIK</p>
    <input type="text" name="nik" value="<?= $dosen['nik'] ?>"><br>

	<p>Nama</p>
	<input type="text" name="nama" value="<?= $dosen['nama'] ?>"><br>

	<p>Jenis Kelamin</p>
	<input type="radio" name="jenis_kelamin" value="L">Laki-laki<br>
	<input type="radio" name="jenis_kelamin" value="P">Perempuan<br>

	<p>Tempat Lahir</p>
	<input type="text" name="tempat_lahir" value="<?= $dosen['tempat_lahir'] ?>"><br>

	<p>Tanggal Lahir</p>
	<input type="date" name="tanggal_lahir" value="<?= $dosen['tanggal_lahir'] ?>"><br>

    <p>Email</p>
	<input type="email" name="email" value="<?= $dosen['email'] ?>"><br>

    <p>No Hp</p>
	<input type="text" name="no_hp" value="<?= $dosen['no_hp'] ?>"><br>

	<p>Kewarganegaraan</p>
	<input type="radio" name="kewarganegaraan" value="wni">WNI<br>
	<input type="radio" name="kewarganegaraan" value="wna">WNA<br>

    <p>Agama</p>
	<input type="text" name="agama" value="<?= $dosen['agama'] ?>"><br>

    <p>Alamat</p>
	<input type="text" name="alamat" value="<?= $dosen['alamat'] ?>"><br>

	<input type="submit" value="Simpan">
</form>
