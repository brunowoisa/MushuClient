<div class="row">
  <div class="col-sm-2">
    <label>CEP</label>
    <input class="form-control <?php echo form_status('ent_cep'); ?>" id="cep_ent" onchange="busca_cep('ent');" type="text"  name="ent_cep" maxlength="9" data-mask="99999-999" value="<?php echo set_form_value($editar,$form,'ent_cep'); ?>">
  </div>
  <div class="col-sm-5">
    <label>Endereço</label>
    <input class="form-control <?php echo form_status('ent_endereco'); ?>" id="endereco_ent" type="text"  name="ent_endereco" maxlength="45" value="<?php echo set_form_value($editar,$form,'ent_endereco'); ?>">
  </div>
  <div class="col-sm-2">
    <label>Número</label>
    <input class="form-control <?php echo form_status('ent_numero'); ?>" id="numero_ent" type="text"  name="ent_numero" maxlength="7" value="<?php echo set_form_value($editar,$form,'ent_numero'); ?>">
  </div>
  <div class="col-sm-3">
    <label>Complemento</label>
    <input class="form-control <?php echo form_status('ent_complemento'); ?>" type="text"  name="ent_complemento" maxlength="15" value="<?php echo set_form_value($editar,$form,'ent_complemento'); ?>">
  </div>
  <div class="col-sm-3">
    <label>Bairro</label>
    <input class="form-control <?php echo form_status('ent_bairro'); ?>"  id="bairro_ent" type="text"  name="ent_bairro" maxlength="45" value="<?php echo set_form_value($editar,$form,'ent_bairro'); ?>">
  </div>
  <div class="col-sm-2">
    <label>Cidade</label>
    <input class="form-control <?php echo form_status('ent_id_cidade'); ?>" id="id_cidade_ent" onchange="preenche_cidade('id_cidade_ent','nome_cidade_ent');" type="text"  name="ent_id_cidade" maxlength="10" value="<?php echo set_form_value($editar,$form,'ent_id_cidade'); ?>">
  </div>
  <div class="col-sm-3">
    <label></label>
    <input class="form-control bg-aero"  id="nome_cidade_ent" type="text" value="<?php echo set_form_value($editar,$form,'cidade'); ?>" readonly>
  </div>
  <div class="col-sm-2">
    <label>País</label>
    <input class="form-control <?php echo form_status('ent_cpais'); ?>" id="cpais_ent" onchange="preenche_cpais('cpais_ent','xpais_ent');" type="text"  name="ent_cpais" value="<?php echo set_form_value($editar,$form,'ent_cpais'); ?>">
  </div>
  <div class="col-sm-2">
    <label></label>
    <input class="form-control bg-aero" id="xpais_ent" type="text" value="<?php echo set_form_value($editar,$form,'xpais'); ?>" readonly>
  </div>
  <div class="col-sm-12">
    <label>Ponto de Referência 1</label>
    <input class="form-control <?php echo form_status('ent_referencia1'); ?>" type="text"  name="ent_referencia1" maxlength="45" value="<?php echo set_form_value($editar,$form,'ent_referencia1'); ?>">
  </div>
  <div class="col-sm-12">
    <label>Ponto de Referência 2</label>
    <input class="form-control <?php echo form_status('ent_referencia2'); ?>" type="text"  name="ent_referencia2" maxlength="45" value="<?php echo set_form_value($editar,$form,'ent_referencia2'); ?>">
  </div>
</div>
