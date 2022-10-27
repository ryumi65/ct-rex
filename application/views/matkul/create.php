<?= validation_errors(); ?>
<?= form_open ('matkul/create'); ?>
	<p>ID Matkul</p>
	<input type="text" name="id_matkul"><br>

	<p>Nama</p>
	<input type="text" name="nama"><br>

	<p>SKS</p>
	<input type="text" name="sks"><br>

	<p>Status Matkul</p>
	<input type="radio" name="status_matkul" value="T">Teori<br>
	<input type="radio" name="status_matkul" value="P">Praktikum<br>

	<p>Level Matkul</p>
	<input type="text" name="level_matkul"><br>

	<p>NIK Dosen</p>
	<input type="text" name="nik_dosen"><br>

	<input type="submit" value="Simpan">
</form>
