<?= validation_errors(); ?>
<?= form_open ('matkul/create'); ?>
	<p>ID Matkul</p>
	<input type="text" name="id_matkul"><br>

	<p>Nama Matkul</p>
	<input type="text" name="nama_matkul"><br>

	<p>Nama Matkul B. Inggris</p>
	<input type="text" name="nama_matkul_inggris"><br>

	<p>Jenis Matkul</p>
	<input type="text" name="jenis_matkul"><br>

	<p>SKS</p>
	<input type="text" name="sks"><br>

	<p>SKS Praktikum</p>
	<input type="text" name="sks_praktikum"><br>

	<p>NIK Dosen</p>
	<input type="text" name="nik_dosen"><br>

	<p>ID Prodi</p>
	<select name="id_prodi">
		<option selected disabled>Pilih Prodi</option>
		<?php foreach ($listp as $prodi) : ?>
			<option value="<?= $prodi['id_prodi'] ?>">
				<?= $prodi['id_prodi'] . ' - ' . $prodi['nama'] ?>
			</option>
		<?php endforeach ?>
	</select><br>

	<br><input type="submit" value="Simpan">
</form>
