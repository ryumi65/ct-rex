<h1>Selamat datang di halaman Mata Kuliah!</h1>
<a href="<?= site_url('matkul/create') ?>">Tambah</a><br><br>
<table border=1>
    <tr>
        <td>id matkul</td>
        <td>nama</td>
        <td>sks</td>
        <td>status matkul</td>
        <td>level matkul</td>
        <td>nik dosen</td>
		<td>Aksi</td>
    </tr>

    <?php foreach ($list as $matkul):?>
        <tr>
            <td><?=$matkul['id_matkul']?></td>
            <td><?=$matkul['nama']?></td>
            <td><?=$matkul['sks']?></td>
            <td><?=$matkul['status_matkul']?></td>
            <td><?=$matkul['level_matkul']?></td>
            <td><?=$matkul['nik_dosen']?></td>
            <td><a href="<?= site_url('matkul/update/' . $matkul['id_matkul']) ?>">Edit</a>
				<a href="<?= site_url('matkul/delete/' . $matkul['id_matkul']) ?>">Hapus</a></td>
        </tr>
    <?php endforeach ?>
    </table>
