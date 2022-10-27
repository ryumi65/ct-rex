<h1>Selamat datang di halaman Mahasiswa!</h1>

<a href="<?= site_url('mahasiswa/create') ?>">Tambah</a><br><br>

<table border=1>
	<tr>
		<td>NIM</td>
		<td>Nama</td>
		<td>Jenis Kelamin</td>
		<td>Tempat Tanggal Lahir</td>
		<td>Tahun Angkatan</td>
		<td>Aksi</td>
	</tr>
	<?php foreach ($list as $mahasiswa) : ?>
		<tr>
			<td><?= $mahasiswa['nim'] ?></td>
			<td><?= $mahasiswa['nama'] ?></td>
			<td><?= $mahasiswa['jenis_kelamin'] ?></td>
			<td><?= $mahasiswa['tempat_lahir'] ?>,
				<?= $mahasiswa['tanggal_lahir'] ?></td>
			<td><?= $mahasiswa['tahun_angkatan'] ?></td>
			<td><a href="<?= site_url('mahasiswa/update/' . $mahasiswa['nim']) ?>">Edit</a>
				<a href="<?= site_url('mahasiswa/delete/' . $mahasiswa['nim']) ?>">Hapus</a></td>
		</tr>
	<?php endforeach ?>
</table>
