<?= validation_errors(); ?>
<?= form_open('matkul/update/' . $matkul['id_matkul']) ?>

	<p>PROGRAM STUDI</p>
	<input type="text" name="program_studi" value="<?= $matkul['program_studi'] ?>"><br>

	<p>ID MATKUL</p>
	<input type="text" name="id_matkul" value="<?= $matkul['id_matkul'] ?>"><br>

	<p>NAMA MATKUL</p>
	<input type="text" name="nama_matkul" value="<?= $matkul['nama_matkul'] ?>"><br>

	<p>NAMA MATKUL INGGRIS</p>
	<input type="text" name="nama_matkul_inggris" value="<?= $matkul['nama_matkul_inggris'] ?>"><br>

	<p>JENIS MATKUL</p>
	<input type="text" name="jenis_matkul" value="<?= $matkul['jenis_matkul'] ?>"><br>

	<p>SKS</p>
	<input type="text" name="sks" value="<?= $matkul['sks'] ?>"><br>

	<p>SKS PRAKTIKUM</p>
	<input type="text" name="sks_praktikum" value="<?= $matkul['sks_praktikum'] ?>"><br>

	<p>NIK DOSEN</p>
	<input type="text" name="nik_dosen" value="<?= $matkul['nik_dosen'] ?>"><br>

	<input type="submit" value="Simpan">
</form>
