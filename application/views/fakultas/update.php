<?= validation_errors() ?>
<?= form_open('fakultas/update') ?>
	<p>ID Fakultas</p>
	<input type="text" name="id_fakultas" value="<?= $fakultas['id_fakultas'] ?>"><br>

	<p>Nama Fakultas</p>
	<input type="text" name="nama" value="<?= $fakultas['nama'] ?>"><br>

    <br><input type="submit" value="Simpan">
</form>
