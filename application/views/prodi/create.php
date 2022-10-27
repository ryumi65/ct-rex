<?= validation_errors(); ?>
<?= form_open('prodi/create'); ?>
    <p>ID Prodi</p>
    <input type="text" name="id_prodi"><br>

    <p>Nama</p>
    <input type="text" name="Nama"><br>

    <p>ID Fakultas</p>
    <input type="text" name="id_fakultas"><br>

    <input type="submit" value="Simpan">
</form>
