<?= validation_errors(); ?>
<?= form_open('mahasiswa/create'); ?>
	<p>NIM</p>
	<input type="text" name="nim"><br>

	<p>Nama</p>
	<input type="text" name="nama"><br>

	<p>Jenis Kelamin</p>
	<input type="radio" name="jenis_kelamin" value="l">Laki-laki<br>
	<input type="radio" name="jenis_kelamin" value="p">Perempuan<br>

	<p>Tempat Lahir</p>
	<input type="text" name="tempat_lahir"><br>

	<p>Tanggal Lahir</p>
	<input type="date" name="tanggal_lahir"><br>

	<p>Tahun Angkatan</p>
	<input type="text" name="tahun_angkatan"><br>

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
