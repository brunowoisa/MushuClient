<div class="row">
  
  <div class="col-sm-8">
    <label>Nome</label>
    <input class="form-control <?php echo form_status('nome'); ?>" type="text"  name="nome" maxlength="75" value="<?php echo set_form_value($editar,$form,'nome'); ?>">
  </div>
  <div class="col-sm-4">
    <label>Apelido</label>
    <input class="form-control <?php echo form_status('apelido'); ?>" type="text"  name="apelido" maxlength="25" value="<?php echo set_form_value($editar,$form,'apelido'); ?>">
  </div>
  <div class="col-sm-3">
    <label>Data de Nascimento</label>
    <div class="prepend-icon">
      <input class="form-control b-datepicker <?php echo form_status('data_nascimento'); ?>" type="text" maxlength="10" data-mask="99/99/9999" name="data_nascimento" value="<?php echo set_form_value($editar,$form,'data_nascimento'); ?>">
      <i class="icon-calendar"></i>
    </div>
  </div>
  <div class="col-sm-3">
    <label>Ativo</label>
    <select class="form-control <?php echo form_status('ativo'); ?>" name="ativo">
      <option value="S" <?php echo set_form_select($editar,$form,'ativo', 'S'); ?>>Sim</option>
      <option value="N" <?php echo set_form_select($editar,$form,'ativo', 'N'); ?>>Não</option>
    </select>
  </div>
  <div class="col-sm-3">
    <label>Telefone Fixo</label>
    <input class="form-control <?php echo form_status('telefone'); ?>" type="text" name="telefone" maxlength="14" data-mask="(99) 9999-9999" value="<?php echo set_form_value($editar,$form,'telefone'); ?>">
  </div>
  <div class="col-sm-3">
    <label>Celular</label>
    <input class="form-control <?php echo form_status('celular'); ?>" type="text" name="celular" maxlength="15" data-mask="(99) 99999-9999" value="<?php echo set_form_value($editar,$form,'celular'); ?>">
  </div>
</div>