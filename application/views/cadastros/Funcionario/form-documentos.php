<div class="row">
  <div class="col-sm-4">
    <label>RG</label>
    <input class="form-control <?php echo form_status('rg_numero'); ?>" type="text"  name="rg_numero" maxlength="20" placeholder="Informe o RG..." value="<?php echo set_form_value($editar,$form,'rg_numero'); ?>">
  </div>
  <div class="col-sm-4">
    <label>RG Emissão</label>
    <div class="prepend-icon">
      <input class="form-control b-datepicker <?php echo form_status('rg_emissao'); ?>" type="text" maxlength="10" data-mask="99/99/9999" name="rg_emissao" placeholder="Informe a Data..." value="<?php echo set_form_value($editar,$form,'rg_emissao'); ?>">
      <i class="icon-calendar"></i>
    </div>
  </div>
  <div class="col-sm-4">
    <label>RG Emissor</label>
    <input class="form-control <?php echo form_status('rg_emissor'); ?>" type="text"  name="rg_emissor" maxlength="10" placeholder="Informe o Emissor..." value="<?php echo set_form_value($editar,$form,'rg_emissor'); ?>">
  </div>
  <div class="col-sm-3">
    <label>Título</label>
    <input class="form-control <?php echo form_status('titulo_numero'); ?>" type="text"  name="titulo_numero" maxlength="20" placeholder="Informe o Título..." value="<?php echo set_form_value($editar,$form,'titulo_numero'); ?>">
  </div>
  <div class="col-sm-3">
    <label>Título Emissão</label>
    <div class="prepend-icon">
      <input class="form-control b-datepicker <?php echo form_status('titulo_emissao'); ?>" type="text" maxlength="10" data-mask="99/99/9999" name="titulo_emissao" placeholder="Informe a Data..." value="<?php echo set_form_value($editar,$form,'titulo_emissao'); ?>">
      <i class="icon-calendar"></i>
    </div>
  </div>
  <div class="col-sm-3">
    <label>Título Zona</label>
    <input class="form-control <?php echo form_status('titulo_zona'); ?>" type="text"  name="titulo_zona" maxlength="10" placeholder="Informe a Zona..." value="<?php echo set_form_value($editar,$form,'titulo_zona'); ?>">
  </div>
  <div class="col-sm-3">
    <label>Título Seção</label>
    <input class="form-control <?php echo form_status('titulo_secao'); ?>" type="text"  name="titulo_secao" maxlength="10" placeholder="Informe a Seção..." value="<?php echo set_form_value($editar,$form,'titulo_secao'); ?>">
  </div>
  <div class="col-sm-3">
    <label>CTPS</label>
    <input class="form-control <?php echo form_status('ctps_numero'); ?>" type="text"  name="ctps_numero" maxlength="20" placeholder="Informe a CTPS..." value="<?php echo set_form_value($editar,$form,'ctps_numero'); ?>">
  </div>
  <div class="col-sm-3">
    <label>CTPS Série</label>
    <input class="form-control <?php echo form_status('ctps_serie'); ?>" type="text"  name="ctps_serie" maxlength="10" placeholder="Informe a Série..." value="<?php echo set_form_value($editar,$form,'ctps_serie'); ?>">
  </div>
  <div class="col-sm-3">
    <label>CTPS Expedição</label>
    <div class="prepend-icon">
      <input class="form-control b-datepicker <?php echo form_status('ctps_expedicao'); ?>" type="text" maxlength="10" data-mask="99/99/9999" name="ctps_expedicao" placeholder="Informe a Data..." value="<?php echo set_form_value($editar,$form,'ctps_expedicao'); ?>">
      <i class="icon-calendar"></i>
    </div>
  </div>
  <div class="col-sm-3">
    <label>CTPS UF</label>
    <input class="form-control <?php echo form_status('ctps_uf'); ?>" type="text"  name="ctps_uf" maxlength="2" placeholder="Informe a UF..." value="<?php echo set_form_value($editar,$form,'ctps_uf'); ?>">
  </div>
  <div class="col-sm-4">
    <label>CPF</label>
    <input class="form-control <?php echo form_status('cpf'); ?>" type="text"  name="cpf" maxlength="14" data-mask="999.999.999-99" placeholder="Informe o CPF..." value="<?php echo set_form_value($editar,$form,'cpf'); ?>">
  </div>
  <div class="col-sm-4">
    <label>PIS</label>
    <input class="form-control <?php echo form_status('pis_numero'); ?>" type="text"  name="pis_numero" maxlength="20" placeholder="Informe o PIS..." value="<?php echo set_form_value($editar,$form,'pis_numero'); ?>">
  </div>
  <div class="col-sm-4">
    <label>PIS Emissão</label>
    <div class="prepend-icon">
      <input class="form-control b-datepicker <?php echo form_status('pis_emissao'); ?>" type="text" maxlength="10" data-mask="99/99/9999" name="pis_emissao" placeholder="Informe a Data..." value="<?php echo set_form_value($editar,$form,'pis_emissao'); ?>">
      <i class="icon-calendar"></i>
    </div>
  </div>
</div>