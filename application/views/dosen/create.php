<?= validation_errors(); ?>
<?= form_open('dosen/create') ?>
    <p>NIK</p>
    <input type="text" name="nik"><br>

    <p>Nama</p>
    <input type="text" name="nama"><br>

    <p>Jenis Kelamin</p>
    <input type="radio" name="jenis_kelamin" value="L">Laki-laki<br>
    <input type="radio" name="jenis_kelamin" value="P">Perempuan<br>

    <p>Tempat Lahir</p>
    <input type="text" name="tempat_lahir"><br>

    <p>Tanggal Lahir</p>
    <input type="date" name="tanggal_lahir"><br>

    <p>Email</p>
    <input type="email" name="email"><br>

    <p>No Hp</p>
    <input type="text" name="no_hp"><br>

    <p>Kewarganegaraan</p>
    <input type="radio" name="kewarganegaraan" value="wni">WNI<br>
    <input type="radio" name="kewarganegaraan" value="wna">WNA<br>

    <p>Agama</p>
    <input type="text" name="agama"><br>

    <p>Alamat</p>
    <input type="text" name="alamat"><br>

    <p>ID Prodi</p>
    <input type="text" name="id_prodi"><br>

    <p>Kode Dosen</p>
    <input type="text" name="kode_dosen"><br>

    <p>Password Dosen</p>
    <input type="text" name="password_dosen"><br>

    <p>NIDN Dosen</p>
    <input type="text" name="nidn_dosen"><br>

    <p>Status Dosen</p>
    <input type="text" name="status_dosen"><br>

    <p>Status Kerja</p>
    <input type="text" name="status_kerja"><br>

    <input type="submit" value="Simpan">
</form>
