<?= validation_errors(); ?>
<?= form_open('fakultas/update/' . $fakultas['id_fakultas']) ?>
	ID Fakultas<br>
	<input type="text" name="id_fakultas" value="<?= $fakultas['id_fakultas'] ?>"><br><br>

	Nama<br>
	<input type="text" name="nama" value="<?= $fakultas['nama'] ?>"><br><br>

    <input type="submit" value="Simpan">
</form>
