<div class="row">
  <div class="col-sm-2">
    <label>Código</label>
    <input class="form-control bg-aero" type="text" value="<?php echo set_form_value($editar,$form,'id'); ?>" disabled>
  </div>
  <div class="col-sm-2">
    <p style="text-align: center;">
      <label>Cliente</label><br>
      <input type="checkbox" class="js-switch" name="vinculo[]" value="C" data-color-on="blue" <?php echo set_form_checkbox($editar,$form,'vinculo','C'); ?>/>
    </p>
  </div>
  <div class="col-sm-2">
    <p style="text-align: center;">
      <label>Fornecedor</label><br>
      <input type="checkbox" class="js-switch" name="vinculo[]" value="F" data-color-on="green"<?php echo set_form_checkbox($editar,$form,'vinculo','F'); ?>/>
    </p>
  </div>
  <div class="col-sm-2">
    <p style="text-align: center;">
      <label>Transportadora</label><br>
      <input type="checkbox" class="js-switch" name="vinculo[]" value="T" data-color-on="yellow"<?php echo set_form_checkbox($editar,$form,'vinculo','T'); ?>/>
    </p>
  </div>
  <div class="col-sm-4">
    <label>Apelido</label>
    <input class="form-control <?php echo form_status('apelido'); ?>" type="text" name="apelido" maxlength="35" value="<?php echo set_form_value($editar,$form,'apelido'); ?>">
  </div>
</div>
<div class="row">
  <div class="col-sm-4" id="box_pessoa">
    <label>Pessoa</label>
    <select class="form-control <?php echo form_status('pessoa'); ?>" name="pessoa" id="pessoa">
      <option value="">--Selecione--</option>
      <option value="F" <?php echo set_form_select($editar,$form,'pessoa', "F"); ?>>Física</option>
      <option value="J" <?php echo set_form_select($editar,$form,'pessoa', "J"); ?>>Jurídica</option>
      <option value="E" <?php echo set_form_select($editar,$form,'pessoa', "E"); ?>>Extrangeira</option>
    </select>
  </div>
  <div class="col-sm-4 pessoa_fisica">
    <label>CPF</label>
    <input class="form-control <?php echo form_status('cpf'); ?>" type="text" name="cpf" maxlength="14" data-mask="999.999.999-99" value="<?php echo set_form_value($editar,$form,'cpf'); ?>">
  </div>
  <div class="col-sm-4 pessoa_fisica">
    <label>RG</label>
    <input class="form-control <?php echo form_status('rg'); ?>" type="text" name="rg" maxlength="25" value="<?php echo set_form_value($editar,$form,'rg'); ?>">
  </div>
  <div class="col-sm-8 pessoa_extrangeira">
    <label>Documento Extrangeiro</label>
    <input class="form-control <?php echo form_status('doc_extrangeiro'); ?>" type="text" name="doc_extrangeiro" maxlength="25" value="<?php echo set_form_value($editar,$form,'doc_extrangeiro'); ?>">
  </div>
  <div class="col-sm-3 pessoa_juridica">
    <label>CNPJ</label>
    <input class="form-control <?php echo form_status('cnpj'); ?>" id="cnpj_geral" type="text" name="cnpj" onchange="busca_cnpj('geral');" maxlength="18" data-mask="99.999.999/9999-99" value="<?php echo set_form_value($editar,$form,'cnpj'); ?>">
  </div>
  <div class="col-sm-2 pessoa_juridica">
    <label>IM</label>
    <input class="form-control <?php echo form_status('im'); ?>" type="text" name="im" maxlength="20"Inscrição Municipal. value="<?php echo set_form_value($editar,$form,'im'); ?>">
  </div>
  <div class="col-sm-3 pessoa_juridica">
    <label>Indicador IE</label>
    <select class="form-control <?php echo form_status('indicador_ie'); ?>" name="indicador_ie" id="indicador_ie">
      <option value="">--Selecione--</option>
      <option value="C" <?php echo set_form_select($editar,$form,'indicador_ie', "C"); ?>>Contribuinte</option>
      <option value="N" <?php echo set_form_select($editar,$form,'indicador_ie', "N"); ?>>Não Contribuinte</option>
      <option value="I" <?php echo set_form_select($editar,$form,'indicador_ie', "I"); ?>>Isento</option>
    </select>
  </div>
  <div class="col-sm-2 pessoa_juridica" id="ie">
    <label>IE</label>
    <input class="form-control <?php echo form_status('ie'); ?>" type="text" name="ie" maxlength="20"Inscrição Estadual. value="<?php echo set_form_value($editar,$form,'ie'); ?>">
  </div>
</div>
<div class="row">
  <div class="col-sm-6">
    <label>Nome</label>
    <input class="form-control <?php echo form_status('nome'); ?>" type="text" id="razao_social_geral" name="nome" maxlength="75" value="<?php echo set_form_value($editar,$form,'nome'); ?>">
  </div>
  <div class="col-sm-6">
    <label>Fantasia</label>
    <input class="form-control <?php echo form_status('fantasia'); ?>" type="text" id="fantasia_geral" name="fantasia" maxlength="75" value="<?php echo set_form_value($editar,$form,'fantasia'); ?>">
  </div>
</div>
<div class="row">
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
</div>
<div class="row">
  <div class="col-sm-6">
    <label>E-mail</label>
    <input class="form-control <?php echo form_status('email'); ?>" id="email_geral" type="text" name="email" maxlength="95" value="<?php echo set_form_value($editar,$form,'email'); ?>">
  </div>
  <div class="col-sm-6">
    <label>Site</label>
    <input class="form-control <?php echo form_status('site'); ?>" type="text" name="site" maxlength="95" value="<?php echo set_form_value($editar,$form,'site'); ?>">
  </div>
  <div class="col-sm-3">
    <label>Telefone 1</label>
    <input class="form-control <?php echo form_status('telefone_fixo1'); ?>" type="text" name="telefone_fixo1" maxlength="14" data-mask="(99) 9999-9999" value="<?php echo set_form_value($editar,$form,'telefone_fixo1'); ?>">
  </div>
  <div class="col-sm-3">
    <label>Telefone 2</label>
    <input class="form-control <?php echo form_status('telefone_fixo2'); ?>" type="text" name="telefone_fixo2" maxlength="14" data-mask="(99) 9999-9999" value="<?php echo set_form_value($editar,$form,'telefone_fixo2'); ?>">
  </div>
  <div class="col-sm-3">
    <label>Celular 1</label>
    <input class="form-control <?php echo form_status('telefone_celular1'); ?>" type="text" name="telefone_celular1" maxlength="15" data-mask="(99) 99999-9999" value="<?php echo set_form_value($editar,$form,'telefone_celular1'); ?>">
  </div>
  <div class="col-sm-3">
    <label>Celular 2</label>
    <input class="form-control <?php echo form_status('telefone_celular2'); ?>" type="text" name="telefone_celular2" maxlength="15" data-mask="(99) 99999-9999" value="<?php echo set_form_value($editar,$form,'telefone_celular2'); ?>">
  </div>
  <div class="col-sm-12">
    <label>Observações</label>
    <textarea name="observacao" class="form-control <?php echo form_status('observacao'); ?>" rows="10"><?php echo set_form_value($editar,$form,'observacao'); ?></textarea>
  </div>
</div>