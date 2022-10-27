<?= validation_errors(); ?>
<?= form_open('dosen/create') ?>
    NIK<br>
    <input type="text" name="nik"><br><br>

    Nama<br>
    <input type="text" name="nama"><br><br>

    Jenis Kelamin<br>
    <input type="radio" name="jenis_kelamin" value="L">Laki-laki<br>
    <input type="radio" name="jenis_kelamin" value="P">Perempuan<br><br>

    Tempat Lahir<br>
    <input type="text" name="tempat_lahir"><br><br>

    Tanggal Lahir<br>
    <input type="date" name="tanggal_lahir"><br><br>

    Email<br>
    <input type="email" name="email"><br><br>

    No Hp<br>
    <input type="text" name="no_hp"><br><br>

    Kewarganegaraan<br>
    <input type="radio" name="kewarganegaraan" value="wni">WNI<br>
    <input type="radio" name="kewarganegaraan" value="wna">WNA<br><br>

    Agama<br>
    <input type="text" name="agama"><br><br>

    Alamat<br>
    <input type="text" name="alamat"><br><br>

    <input type="submit" value="simpan">
</form>