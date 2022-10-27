<h1>Selamat datang di halaman Dosen!</h1>

<a href="<?= site_url('dosen/create') ?>">Tambah</a><br><br>
<a href="<?= site_url('mahasiswa') ?>">Mahasiswa</a>
<a href="<?= site_url('dosen') ?>">Dosen</a>
<a href="<?= site_url('prodi') ?>">Prodi</a>
<a href="<?= site_url('fakultas') ?>">Fakultas</a>
<a href="<?= site_url('matkul') ?>">Mata Kuliah</a><br><br>

<table border="3">
	<tr>
		<td>NIK</td>
		<td>Nama</td>
		<td>Jenis Kelamin</td>
		<td>Tempat Tanggal Lahir</td>
		<td>Email</td>
		<td>No Hp</td>
		<td>Kewarganegaraan</td>
		<td>Agama</td>
		<td>Alamat</td>
		<td>ID Prodi</td>
		<td>Kode Dosen</td>
		<td>Password Dosen</td>
		<td>NIDN Dosen</td>
		<td>Status Dosen</td>
		<td>Status Kerja</td>
		<td>Aksi</td>
	</tr>

	<?php foreach ($list as $dosen) : ?>
		<tr>
			<td><?= $dosen['nik'] ?></td>
			<td><?= $dosen['nama'] ?></td>
			<td><?= $dosen['jenis_kelamin'] ?></td>
			<td><?= $dosen['tempat_lahir'] ?>,
				<?= $dosen['tanggal_lahir'] ?></td>
			<td><?= $dosen['email'] ?></td>
			<td><?= $dosen['no_hp'] ?></td>
			<td><?= $dosen['kewarganegaraan'] ?></td>
			<td><?= $dosen['agama'] ?></td>
			<td><?= $dosen['alamat'] ?></td>
			<td><?= $dosen['id_prodi'] ?></td>
			<td><?= $dosen['kode_dosen'] ?></td>
			<td><?= $dosen['password_dosen'] ?></td>
			<td><?= $dosen['nidn_dosen'] ?></td>
			<td><?= $dosen['status_dosen'] ?></td>
			<td><?= $dosen['status_kerja'] ?></td>
			<td><a href="<?= site_url('dosen/update/' . $dosen['nik']) ?>">Edit</a>
				<a href="<?= site_url('dosen/delete/' . $dosen['nik']) ?>">Hapus</a>
			</td>
		</tr>
	<?php endforeach ?>
</table>
