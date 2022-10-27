<?= validation_errors(); ?>
<?= form_open('matkul/update/' . $matkul['id_matkul']) ?>
	<p>ID Matkul</p>
	<input type="text" name="id_matkul" value="<?= $matkul['id_matkul'] ?>"><br>

	<p>Nama Matkul</p>
	<input type="text" name="nama_matkul" value="<?= $matkul['nama_matkul'] ?>"><br>

	<p>Nama Matkul B. Inggris</p>
	<input type="text" name="nama_matkul_inggris" value="<?= $matkul['nama_matkul_inggris'] ?>"><br>

	<p>Jenis Matkul</p>
	<input type="text" name="jenis_matkul" value="<?= $matkul['jenis_matkul'] ?>"><br>

	<p>SKS</p>
	<input type="text" name="sks" value="<?= $matkul['sks'] ?>"><br>

	<p>SKS Praktikum</p>
	<input type="text" name="sks_praktikum" value="<?= $matkul['sks_praktikum'] ?>"><br>

	<p>NIK Dosen</p>
	<input type="text" name="nik_dosen" value="<?= $matkul['nik_dosen'] ?>"><br>

	<p>ID Prodi</p>
	<select name="id_prodi">
		<option selected disabled>Pilih Prodi</option>
		<?php foreach ($listp as $prodi) : ?>
			<?php if ($prodi['id_prodi'] === $matkul['id_prodi']) : ?>
				<option selected value="<?= $prodi['id_prodi'] ?>">
					<?= $prodi['id_prodi'] . ' - ' . $prodi['nama'] ?>
				</option>
			<?php else : ?>
				<option value="<?= $prodi['id_prodi'] ?>">
					<?= $prodi['id_prodi'] . ' - ' . $prodi['nama'] ?>
				</option>
			<?php endif ?>
		<?php endforeach ?>
	</select><br>

	<br><input type="submit" value="Simpan">
</form>
