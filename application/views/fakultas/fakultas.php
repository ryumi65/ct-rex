<h1> Selamat datang di halaman fakultas! </h1>

<a href="<?= site_url('mahasiswa') ?>">Mahasiswa</a></td>
<a href="<?= site_url('dosen') ?>">Dosen</a></td>
<a href="<?= site_url('prodi') ?>">Prodi</a></td>
<a href="<?= site_url('fakultas') ?>">Fakultas</a></td>
<a href="<?= site_url('matkul') ?>">Mata Kuliah</a></td>

<table border = 10>
    <tr>
        <td>id_fakultas</td>
        <td>nama</td>
		<td>Aksi</td>
    </tr>
<?php foreach ($list as $fakultas) : ?> <!--foreach adalah perulangan-->
    <tr>
        <td><?= $fakultas['id_fakultas'] ?></td>
        <td><?= $fakultas['nama'] ?></td>
        <td><a href="<?= site_url('fakultas/update/' . $fakultas['id_fakultas']) ?>">Edit</a>
			<a href="<?= site_url('fakultas/delete/' . $fakultas['id_fakultas']) ?>">Hapus</a></td>
    </tr>

<?php endforeach ?>
</table>
