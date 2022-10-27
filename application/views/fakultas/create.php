<?php echo validation_errors(); ?>
<?php echo form_open ('fakultas/create') ?>
    <p>ID Fakultas</p>
    <input type= "text" name="id_fakultas"><br>
	
    <p>Nama Fakultas</p>
    <input type= "text" name= "nama"><br>

	<br><input type = "submit" value="simpan">
</form>
