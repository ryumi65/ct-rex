<h1> Selamat datang di halaman fakultas! </h1>

<table border = 10>
    <tr>
        <td>id_fakultas</td>
        <td>nama</td>
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