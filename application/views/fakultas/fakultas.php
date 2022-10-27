<h1>Selamat datang di halaman Fakultas!</h1>

<a href="<?= site_url('fakultas/create') ?>">Tambah</a><br><br>
<a href="<?= site_url('mahasiswa') ?>">Mahasiswa</a>
<a href="<?= site_url('dosen') ?>">Dosen</a>
<a href="<?= site_url('prodi') ?>">Prodi</a>
<a href="<?= site_url('fakultas') ?>">Fakultas</a>
<a href="<?= site_url('matkul') ?>">Mata Kuliah</a><br><br>

<table border="3">
	<tr>
		<td>ID Fakultas</td>
		<td>Nama</td>
		<td>Aksi</td>
	</tr>

	<!--foreach adalah perulangan-->
	<?php foreach ($list as $fakultas) : ?>
		<tr>
			<td><?= $fakultas['id_fakultas'] ?></td>
			<td><?= $fakultas['nama'] ?></td>
			<td><a href="<?= site_url('fakultas/update/' . $fakultas['id_fakultas']) ?>">Edit</a>
				<a href="<?= site_url('fakultas/delete/' . $fakultas['id_fakultas']) ?>">Hapus</a>
			</td>
		</tr>
	<?php endforeach ?>
</table>
