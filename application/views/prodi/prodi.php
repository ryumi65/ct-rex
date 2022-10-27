<h1>selamat datang di halaman prodi</h1>

<a href="<?= site_url('matkul/create') ?>">Tambah</a><br><br>
<a href="<?= site_url('mahasiswa') ?>">Mahasiswa</a></td>
<a href="<?= site_url('dosen') ?>">Dosen</a></td>
<a href="<?= site_url('prodi') ?>">Prodi</a></td>
<a href="<?= site_url('fakultas') ?>">Fakultas</a></td>
<a href="<?= site_url('matkul') ?>">Mata Kuliah</a></td>

<table border=1>
    <tr>
        <td>id_prodi</td>
        <td>Nama</td>
        <td>id_fakultas</td>
        <td>Aksi</td>
    </tr>
<?php foreach ($list as $prodi) : ?>
    <tr>
        <td><?= $prodi['id_prodi'] ?></td>
        <td><?= $prodi['Nama'] ?></td>
        <td><?= $prodi['id_fakultas'] ?></td>
        <td><a href="<?= site_url('prodi/update/' . $prodi['id_prodi']) ?>">Edit</a>
				<a href="<?= site_url('prodi/delete/' . $prodi['id_prodi']) ?>">Hapus</a></td>
    </tr>
<?php endforeach ?>
</table>