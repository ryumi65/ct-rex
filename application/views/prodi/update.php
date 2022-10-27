<?= validation_errors(); ?>
<?= form_open('prodi/update/' . $prodi['id_prodi']) ?>
	id_prodi<br>
	<input type="text" name="id_prodi" value="<?= $prodi['id_prodi'] ?>"><br><br>

	Nama<br>
	<input type="text" name="Nama" value="<?= $prodi['Nama'] ?>"><br><br>

	id_fakultas<br>
	<input type="text" name="id_fakultas" value="<?=$prodi['id_fakultas'] ?>"><br><br>
	
	<input type="submit" value="Simpan">
</form>
