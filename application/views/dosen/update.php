<?= validation_errors() ?>
<?= form_open('dosen/update') ?>
    <p>NIK</p>
    <input type="text" name="nik" value="<?= $dosen['nik'] ?>"><br>

	<p>Nama</p>
	<input type="text" name="nama" value="<?= $dosen['nama'] ?>"><br>

	<p>Jenis Kelamin</p>
	<?php if ($dosen['jenis_kelamin'] === 'l') : ?>
		<input type="radio" name="jenis_kelamin" value="l" checked>Laki-laki<br>
		<input type="radio" name="jenis_kelamin" value="p">Perempuan<br>
	<?php else : ?>
		<input type="radio" name="jenis_kelamin" value="l">Laki-laki<br>
		<input type="radio" name="jenis_kelamin" value="p" checked>Perempuan<br>
	<?php endif ?>

	<p>Tempat Lahir</p>
	<input type="text" name="tempat_lahir" value="<?= $dosen['tempat_lahir'] ?>"><br>

	<p>Tanggal Lahir</p>
	<input type="date" name="tanggal_lahir" value="<?= $dosen['tanggal_lahir'] ?>"><br>

    <p>Email</p>
	<input type="email" name="email" value="<?= $dosen['email'] ?>"><br>

    <p>No Hp</p>
	<input type="text" name="no_hp" value="<?= $dosen['no_hp'] ?>"><br>

	<p>Kewarganegaraan</p>
	<?php if ($dosen['kewarganegaraan'] === 'wni') : ?>
		<input type="radio" name="kewarganegaraan" value="wni" checked>WNI<br>
		<input type="radio" name="kewarganegaraan" value="wna">WNA<br>
	<?php else : ?>
		<input type="radio" name="kewarganegaraan" value="wni">WNI<br>
		<input type="radio" name="kewarganegaraan" value="wna" checked>WNA<br>
	<?php endif ?>

    <p>Agama</p>
	<input type="text" name="agama" value="<?= $dosen['agama'] ?>"><br>

    <p>Alamat</p>
	<input type="text" name="alamat" value="<?= $dosen['alamat'] ?>"><br>

	<p>ID Prodi</p>
	<select name="id_prodi">
		<option selected disabled>Pilih Prodi</option>
		<?php foreach ($listp as $prodi) : ?>
			<?php if ($prodi['id_prodi'] === $dosen['id_prodi']) : ?>
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

    <p>Kode Dosen</p>
	<input type="text" name="kode_dosen" value="<?= $dosen['kode_dosen'] ?>"><br>

	<p>Password Dosen</p>
	<input type="text" name="password_dosen" value="<?= $dosen['password_dosen'] ?>"><br>

    <p>NIDN Dosen</p>
	<input type="text" name="nidn_dosen" value="<?= $dosen['nidn_dosen'] ?>"><br>

	<p>Status Dosen</p>
	<input type="text" name="status_dosen" value="<?= $dosen['status_dosen'] ?>"><br>

    <p>Status Kerja</p>
	<input type="text" name="status_kerja" value="<?= $dosen['status_kerja'] ?>"><br>

	<br><input type="submit" value="Simpan">
</form>
