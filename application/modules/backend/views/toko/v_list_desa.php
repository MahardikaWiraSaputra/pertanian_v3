<select name="desa" id="desa" class="form-control select2">
    <?php foreach($detail as $data):?>
    <option value="<?=$data['kode_desa']?>"><?=$data['nama_desa']?></option>
    <?php endforeach;?>
</select>