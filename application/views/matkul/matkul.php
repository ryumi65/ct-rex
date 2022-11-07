<h1>Selamat datang di halaman Mata Kuliah!</h1>

<a href="<?= site_url('matkul/create') ?>">Tambah</a>
<a href="<?= site_url('akun/logout') ?>">Logout</a><br><br>
<a href="<?= site_url('mahasiswa') ?>">Mahasiswa</a>
<a href="<?= site_url('dosen') ?>">Dosen</a>
<a href="<?= site_url('prodi') ?>">Prodi</a>
<a href="<?= site_url('fakultas') ?>">Fakultas</a>
<a href="<?= site_url('matkul') ?>">Mata Kuliah</a><br><br>

<table border="3">
	<tr>
		<td>ID Matkul</td>
		<td>Nama Matkul</td>
		<td>Nama Matkul B. Inggris</td>
		<td>Jenis Matkul</td>
		<td>SKS</td>
		<td>SKS Praktikum</td>
		<td>NIK Dosen</td>
		<td>ID Prodi</td>
		<td>Aksi</td>
	</tr>

	<?php foreach ($list as $matkul) : ?>
		<tr>
			<td><?= $matkul['id_matkul'] ?></td>
			<td><?= $matkul['nama'] ?></td>
			<td><?= $matkul['nama_inggris'] ?></td>
			<td><?= $matkul['jenis'] ?></td>
			<td><?= $matkul['sks'] ?></td>
			<td><?= $matkul['sks_praktikum'] ?></td>
			<td><?= $matkul['nik_dosen'] ?></td>
			<td><?= $matkul['id_prodi'] ?></td>
			<td><a href="<?= site_url('matkul/update/' . $matkul['id_matkul']) ?>">Edit</a>
				<a href="<?= site_url('matkul/delete/' . $matkul['id_matkul']) ?>">Hapus</a>
			</td>
		</tr>
	<?php endforeach ?>
</table>
