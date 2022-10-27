<?= validation_errors(); ?>
<?= form_open('mahasiswa/update/' . $mahasiswa['nim']); ?>
	<p>NIM</p>
	<input type="text" name="nim" value="<?= $mahasiswa['nim'] ?>"><br>

	<p>Nama</p>
	<input type="text" name="nama" value="<?= $mahasiswa['nama'] ?>"><br>

	<p>Jenis Kelamin</p>
	<?php if ($mahasiswa['jenis_kelamin'] === 'l') : ?>
		<input type="radio" name="jenis_kelamin" value="l" checked>Laki-laki<br>
		<input type="radio" name="jenis_kelamin" value="p">Perempuan<br>
	<?php else : ?>
		<input type="radio" name="jenis_kelamin" value="l">Laki-laki<br>
		<input type="radio" name="jenis_kelamin" value="p" checked>Perempuan<br>
	<?php endif ?>

	<p>Tempat Lahir</p>
	<input type="text" name="tempat_lahir" value="<?= $mahasiswa['tempat_lahir'] ?>"><br>

	<p>Tanggal Lahir</p>
	<input type="date" name="tanggal_lahir" value="<?= $mahasiswa['tanggal_lahir'] ?>"><br>

	<p>Tahun Angkatan</p>
	<input type="text" name="tahun_angkatan" value="<?= $mahasiswa['tahun_angkatan'] ?>"><br>

	<p>ID Prodi</p>
	<select name="id_prodi">
		<option selected disabled>Pilih Prodi</option>
		<?php foreach ($listp as $prodi) : ?>
			<?php if ($prodi['id_prodi'] === $mahasiswa['id_prodi']) : ?>
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
