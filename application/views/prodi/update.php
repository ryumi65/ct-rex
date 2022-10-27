<?= validation_errors(); ?>
<?= form_open('prodi/update/' . $prodi['id_prodi']) ?>
	<p>ID Prodi</p>
	<input type="text" name="id_prodi" value="<?= $prodi['id_prodi'] ?>"><br>

	<p>Nama</p>
	<input type="text" name="Nama" value="<?= $prodi['Nama'] ?>"><br>

	<p>ID Fakultas</p>
	<input type="text" name="id_fakultas" value="<?=$prodi['id_fakultas'] ?>"><br>
	
	<input type="submit" value="Simpan">
</form>
