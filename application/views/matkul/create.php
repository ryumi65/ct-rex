<?= validation_errors(); ?>
<?= form_open ('matkul/create'); ?>

	<p>Program Studi</p>
	<input type="text" name="program_studi"><br>

	<p>ID Matkul</p>
	<input type="text" name="id_matkul"><br>

	<p>Nama Matkul</p>
	<input type="text" name="nama_matkul"><br>

	<p>Nama Matkul Inggris</p>
	<input type="text" name="nama_matkul_inggris"><br>

	<p>Jenis Matkul</p>
	<input type="text" name="jenis_matkul"><br>

	<p>SKS</p>
	<input type="text" name="sks"><br>

	<p>SKS Praktikum</p>
	<input type="text" name="sks_praktikum"><br>

	<p>NIK Dosen</p>
	<input type="text" name="nik_dosen"><br>

	<input type="submit" value="Simpan">
</form>
