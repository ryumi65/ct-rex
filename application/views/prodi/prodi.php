<h1>selamat datang di halaman prodi</h1>

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