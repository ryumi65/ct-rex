<h1>Selamat datang di halaman Prodi!</h1>

<a href="<?= site_url('prodi/create') ?>">Tambah</a>
<a href="<?= site_url('akun/logout') ?>">Logout</a><br><br>
<a href="<?= site_url('mahasiswa') ?>">Mahasiswa</a>
<a href="<?= site_url('dosen') ?>">Dosen</a>
<a href="<?= site_url('prodi') ?>">Prodi</a>
<a href="<?= site_url('fakultas') ?>">Fakultas</a>
<a href="<?= site_url('matkul') ?>">Mata Kuliah</a><br><br>

<table border="3">
	<tr>
		<td>ID Prodi</td>
		<td>Nama</td>
		<td>ID Fakultas</td>
		<td>Aksi</td>
	</tr>

	<?php foreach ($list as $prodi) : ?>
		<tr>
			<td><?= $prodi['id_prodi'] ?></td>
			<td><?= $prodi['nama'] ?></td>
			<td><?= $prodi['id_fakultas'] ?></td>
			<td><a href="<?= site_url('prodi/update/' . $prodi['id_prodi']) ?>">Edit</a>
				<a href="<?= site_url('prodi/delete/' . $prodi['id_prodi']) ?>">Hapus</a>
			</td>
		</tr>
	<?php endforeach ?>
</table>
