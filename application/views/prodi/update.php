<?= validation_errors() ?>
<?= form_open('prodi/update/' . $prodi['id_prodi']) ?>
	<p>ID Prodi</p>
	<input type="text" name="id_prodi" value="<?= $prodi['id_prodi'] ?>"><br>

	<p>Nama</p>
	<input type="text" name="nama" value="<?= $prodi['nama'] ?>"><br>

	<p>ID Fakultas</p>
	<select name="id_fakultas">
		<option selected disabled>Pilih Fakultas</option>
		<?php foreach ($listf as $fakultas) : ?>
			<?php if ($fakultas['id_fakultas'] === $prodi['id_fakultas']) : ?>
				<option selected value="<?= $fakultas['id_fakultas'] ?>">
					<?= $fakultas['id_fakultas'] . ' - ' . $fakultas['nama'] ?>
				</option>
			<?php else : ?>
				<option value="<?= $fakultas['id_fakultas'] ?>">
					<?= $fakultas['id_fakultas'] . ' - ' . $fakultas['nama'] ?>
				</option>
			<?php endif ?>
		<?php endforeach ?>
	</select><br>
	
	<br><input type="submit" value="Simpan">
</form>
