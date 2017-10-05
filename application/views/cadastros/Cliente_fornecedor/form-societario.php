<div class="row">
  <div class="col-sm-4">
    <label>Fundação</label>
    <div class="prepend-icon">
      <input class="form-control b-datepicker <?php echo form_status('data_fundacao'); ?>" type="text" maxlength="10" data-mask="99/99/9999" name="data_fundacao" placeholder="Informe a Data..." value="<?php echo set_form_value($editar,$form,'data_fundacao'); ?>">
      <i class="icon-calendar"></i>
    </div>
  </div>
  <div class="col-sm-12">
    <label>Quadro Societário</label>
    <textarea name="quadro_societario" class="form-control <?php echo form_status('quadro_societario'); ?>" rows="10"><?php echo set_form_value($editar,$form,'quadro_societario'); ?></textarea>
  </div>
</div>
