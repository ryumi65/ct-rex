<h1>Selamat datang di halaman Mata Kuliah!</h1>

<a href="<?= site_url('matkul/create') ?>">Tambah</a><br><br>
<a href="<?= site_url('mahasiswa') ?>">Mahasiswa</a></td>
<a href="<?= site_url('dosen') ?>">Dosen</a></td>
<a href="<?= site_url('prodi') ?>">Prodi</a></td>
<a href="<?= site_url('fakultas') ?>">Fakultas</a></td>
<a href="<?= site_url('matkul') ?>">Mata Kuliah</a></td>

<table border=1>
    <tr>
        <td>PROGRAM STUDI</td>
        <td>ID MATKUL</td>
        <td>NAMA MATKUL</td>
        <td>NAMA MATKUL B.INGGRIS</td>
        <td>JENIS MATKUL</td>
        <td>SKS</td>
        <td>SKS PRAKTIKUM</td>
        <td>NIK DOSEN</td>
		<td>AKSI</td>
    </tr>

    <?php foreach ($list as $matkul):?>
        <tr>
            <td><?=$matkul['program_studi']?></td>
            <td><?=$matkul['id_matkul']?></td>
            <td><?=$matkul['nama_matkul']?></td>
            <td><?=$matkul['nama_matkul_inggris']?></td>
            <td><?=$matkul['jenis_matkul']?></td>
            <td><?=$matkul['sks']?></td>
            <td><?=$matkul['sks_praktikum']?></td>
            <td><?=$matkul['nik_dosen']?></td>
            <td><a href="<?= site_url('matkul/update/' . $matkul['id_matkul']) ?>">Edit</a>
				<a href="<?= site_url('matkul/delete/' . $matkul['id_matkul']) ?>">Hapus</a></td>
        </tr>
    <?php endforeach ?>
    </table>
