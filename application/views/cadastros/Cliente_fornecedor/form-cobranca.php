<div class="row">
  <div class="col-sm-2">
    <label>CEP</label>
    <input class="form-control <?php echo form_status('cob_cep'); ?>" id="cep_cob" onchange="busca_cep('cob');" type="text"  name="cob_cep" maxlength="9" data-mask="99999-999" value="<?php echo set_form_value($editar,$form,'cob_cep'); ?>">
  </div>
  <div class="col-sm-5">
    <label>Endereço</label>
    <input class="form-control <?php echo form_status('cob_endereco'); ?>" id="endereco_cob" type="text"  name="cob_endereco" maxlength="45" value="<?php echo set_form_value($editar,$form,'cob_endereco'); ?>">
  </div>
  <div class="col-sm-2">
    <label>Número</label>
    <input class="form-control <?php echo form_status('cob_numero'); ?>" id="numero_cob" type="text"  name="cob_numero" maxlength="7" value="<?php echo set_form_value($editar,$form,'cob_numero'); ?>">
  </div>
  <div class="col-sm-3">
    <label>Complemento</label>
    <input class="form-control <?php echo form_status('cob_complemento'); ?>" type="text"  name="cob_complemento" maxlength="15" value="<?php echo set_form_value($editar,$form,'cob_complemento'); ?>">
  </div>
  <div class="col-sm-3">
    <label>Bairro</label>
    <input class="form-control <?php echo form_status('cob_bairro'); ?>"  id="bairro_cob" type="text"  name="cob_bairro" maxlength="45" value="<?php echo set_form_value($editar,$form,'cob_bairro'); ?>">
  </div>
  <div class="col-sm-2">
    <label>Cidade</label>
    <input class="form-control <?php echo form_status('cob_id_cidade'); ?>" id="id_cidade_cob" onchange="preenche_cidade('id_cidade_cob','nome_cidade_cob');" type="text"  name="cob_id_cidade" maxlength="10" value="<?php echo set_form_value($editar,$form,'cob_id_cidade'); ?>">
  </div>
  <div class="col-sm-3">
    <label></label>
    <input class="form-control bg-aero"  id="nome_cidade_cob" type="text" value="<?php echo set_form_value($editar,$form,'cidade'); ?>" readonly>
  </div>
  <div class="col-sm-2">
    <label>País</label>
    <input class="form-control <?php echo form_status('cob_cpais'); ?>" id="cpais_cob" onchange="preenche_cpais('cpais_cob','xpais_cob');" type="text"  name="cob_cpais" value="<?php echo set_form_value($editar,$form,'cob_cpais'); ?>">
  </div>
  <div class="col-sm-2">
    <label></label>
    <input class="form-control bg-aero" id="xpais_cob" type="text" value="<?php echo set_form_value($editar,$form,'xpais'); ?>" readonly>
  </div>
</div>
