<?= validation_errors(); ?>
<?= form_open('prodi/create'); ?>
    <p>ID Prodi</p>
    <input type="text" name="id_prodi"><br>

    <p>Nama</p>
    <input type="text" name="nama"><br>

    <p>ID Fakultas</p>
	<select name="id_fakultas">
		<option selected disabled>Pilih Fakultas</option>
		<?php foreach ($listf as $fakultas) : ?>
			<option value="<?= $fakultas['id_fakultas'] ?>">
				<?= $fakultas['id_fakultas'] . ' - ' . $fakultas['nama'] ?>
			</option>
		<?php endforeach ?>
	</select><br>

    <br><input type="submit" value="Simpan">
</form>
