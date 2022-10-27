<?= validation_errors(); ?>
<?= form_open ('matkul/create'); ?>
IDMATKUL<br>
<input type="text" name="id_matkul"><br><br>

NAMA<br>
<input type="text" name="nama"><br><br>

SKS<br>
<input type="text" name="sks"><br><br>

STATUS MATKUL<br>
<input type="radio" name="status_matkul" value="T">TEORI<br>
<input type="radio" name="status_matkul" value="P">PRAKTIKUM<br><br>

LEVEL MATKUL<br>
<input type="text" name="level_matkul"><br><br>

NIK DOSEN<br>
<input type="text" name="nik_dosen"><br><br>

<input type="submit" value="SIMPAN">
</form>
