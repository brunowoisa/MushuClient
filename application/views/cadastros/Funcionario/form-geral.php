<div class="row">
  <div class="col-sm-12" style="text-align: center;">
    <?php if (isset($form->foto) && is_file('./assets/uploads/_funcionarios/foto/'.$form->foto)): ?>
      <img class="img-lg img-circle mCS_img_loaded" src="<?php echo base_url(); ?>assets/uploads/_funcionarios/foto/<?php echo $form->foto; ?>" alt="Foto de Perfil">
    <?php else: ?>
      <img class="img-lg img-circle mCS_img_loaded" src="<?php echo base_url(); ?>assets/images/noprofile.jpg" alt="Sem Foto de Perfil">
    <?php endif ?>
  </div>
  <div class="col-sm-2">
    <label>Código</label>
    <input class="form-control  bg-aero" type="text" value="<?php echo set_form_value($editar,$form,'id'); ?>" disabled  placeholder="Automático">
  </div>
  <div class="col-sm-7">
    <label>Nome</label>
    <input class="form-control <?php echo form_status('nome'); ?>" type="text"  name="nome" maxlength="75" placeholder="Informe o nome..." value="<?php echo set_form_value($editar,$form,'nome'); ?>">
  </div>
  <div class="col-sm-3">
    <label>Apelido</label>
    <input class="form-control <?php echo form_status('apelido'); ?>" type="text"  name="apelido" maxlength="15" placeholder="Informe o apelido..." value="<?php echo set_form_value($editar,$form,'apelido'); ?>">
  </div>
  <div class="col-sm-2">
    <label>CEP</label>
    <input class="form-control <?php echo form_status('cep'); ?>" id="cep_geral" onchange="busca_cep('geral');" type="text" name="cep" maxlength="9" data-mask="99999-999" value="<?php echo set_form_value($editar,$form,'cep'); ?>">
  </div>
  <div class="col-sm-5">
    <label>Endereço</label>
    <input class="form-control <?php echo form_status('endereco'); ?>" id="endereco_geral" type="text" name="endereco" maxlength="45" value="<?php echo set_form_value($editar,$form,'endereco'); ?>">
  </div>
  <div class="col-sm-2">
    <label>Número</label>
    <input class="form-control <?php echo form_status('numero'); ?>" id="numero_geral" type="text" name="numero" maxlength="7" value="<?php echo set_form_value($editar,$form,'numero'); ?>">
  </div>
  <div class="col-sm-3">
    <label>Complemento</label>
    <input class="form-control <?php echo form_status('complemento'); ?>" type="text" name="complemento" maxlength="15" value="<?php echo set_form_value($editar,$form,'complemento'); ?>">
  </div>
  <div class="col-sm-3">
    <label>Bairro</label>
    <input class="form-control <?php echo form_status('bairro'); ?>"  id="bairro_geral" type="text" name="bairro" maxlength="45" value="<?php echo set_form_value($editar,$form,'bairro'); ?>">
  </div>
  <div class="col-sm-2">
    <label>Cidade</label>
    <input class="form-control <?php echo form_status('id_cidade'); ?>" id="id_cidade_geral" onchange="preenche_cidade('id_cidade_geral','nome_cidade_geral');" type="text" name="id_cidade" maxlength="10" value="<?php echo set_form_value($editar,$form,'id_cidade'); ?>">
  </div>
  <div class="col-sm-3">
    <label></label>
    <input class="form-control bg-aero"  id="nome_cidade_geral" type="text" value="<?php echo set_form_value($editar,$form,'cidade'); ?>" readonly>
  </div>
  <div class="col-sm-2">
    <label>País</label>
    <input class="form-control <?php echo form_status('cpais'); ?>" id="cpais" onchange="preenche_cpais('cpais','xpais');" type="text" name="cpais" value="<?php echo set_form_value($editar,$form,'cpais'); ?>">
  </div>
  <div class="col-sm-2">
    <label></label>
    <input class="form-control bg-aero" id="xpais" type="text" value="<?php echo set_form_value($editar,$form,'xpais'); ?>" readonly>
  </div>
  <div class="col-sm-3">
    <label>Telefone Fixo</label>
    <input class="form-control <?php echo form_status('telefone1'); ?>" type="text" name="telefone1" maxlength="15" data-mask="(99)9999-9999" placeholder="(99)9999-9999"  value="<?php echo set_form_value($editar,$form,'telefone1'); ?>">
  </div>
  <div class="col-sm-3">
    <label>Telefone Móvel</label>
    <input class="form-control <?php echo form_status('telefone2'); ?>" type="text" name="telefone2" maxlength="15" data-mask="(99)99999-9999" placeholder="(99)99999-9999"  value="<?php echo set_form_value($editar,$form,'telefone2'); ?>">
  </div>
  <div class="col-sm-6">
    <label>E-mail</label>
    <input class="form-control <?php echo form_status('email'); ?>" id="email" type="text"  name="email" maxlength="95" placeholder="Informe o E-mail..." value="<?php echo set_form_value($editar,$form,'email'); ?>">
  </div>  
</div>