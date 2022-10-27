<?= validation_errors(); ?>
<?= form_open('matkul/update/' . $matkul['id_matkul']) ?>
	ID MATKUL<br>
	<input type="text" name="id_matkul" value="<?= $matkul['id_matkul'] ?>"><br><br>

	Nama<br>
	<input type="text" name="nama" value="<?= $matkul['nama'] ?>"><br><br>

	SKS<br>
	<input type="text" name="sks" value="<?= $matkul['sks'] ?>"><br><br>

	STATUS MATKUL<br>
	<input type="radio" name="status_matkul" value="T">TEORI<br>
	<input type="radio" name="status_matkul" value="P">PRAKTIKUM<br><br>

	LEVEL MATKUL<br>
	<input type="text" name="level_matkul" value="<?= $matkul['level_matkul'] ?>"><br><br>

	NIK DOSEN<br>
	<input type="text" name="nik_dosen" value="<?= $matkul['nik_dosen'] ?>"><br><br>

	<input type="submit" value="Simpan">
</form>
