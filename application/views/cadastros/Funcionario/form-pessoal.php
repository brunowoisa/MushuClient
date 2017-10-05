<div class="row">
  <div class="col-sm-3">
    <label>Data de Nascimento</label>
    <div class="prepend-icon">
      <input class="form-control b-datepicker <?php echo form_status('data_nascimento'); ?>" type="text" maxlength="10" data-mask="99/99/9999" name="data_nascimento" placeholder="Informe a Data..." value="<?php echo set_form_value($editar,$form,'data_nascimento'); ?>">
      <i class="icon-calendar"></i>
    </div>
  </div>
  <div class="col-sm-4">
    <label>Cidade de Nascimento</label>
    <input class="form-control <?php echo form_status('cidade_nascimento'); ?>" type="text"  name="cidade_nascimento" maxlength="45" placeholder="Informe a Cidade..." value="<?php echo set_form_value($editar,$form,'cidade_nascimento'); ?>">
  </div>
  <div class="col-sm-2">
    <label>UF de Nascimento</label>
    <input class="form-control <?php echo form_status('estado_nascimento'); ?>" type="text"  name="estado_nascimento" maxlength="2" placeholder="Informe o Estado..." value="<?php echo set_form_value($editar,$form,'estado_nascimento'); ?>">
  </div>
  <div class="col-sm-3">
    <label>País de Nascimento</label>
    <input class="form-control <?php echo form_status('pais_nascimento'); ?>" type="text"  name="pais_nascimento" maxlength="45" placeholder="Informe o País..." value="<?php echo set_form_value($editar,$form,'pais_nascimento'); ?>">
  </div>
  <div class="col-sm-3">
    <label>Estado Civil</label>
    <select class="form-control  form-white <?php echo form_status('estado_civil'); ?>" name="estado_civil">
      <option value="">--Selecione--</option>
      <option value="S" <?php echo set_form_select($editar,$form,'estado_civil', 'S'); ?>>Solteiro</option>
      <option value="C" <?php echo set_form_select($editar,$form,'estado_civil', 'C'); ?>>Casado</option>
      <option value="D" <?php echo set_form_select($editar,$form,'estado_civil', 'D'); ?>>Divorciado</option>
      <option value="V" <?php echo set_form_select($editar,$form,'estado_civil', 'V'); ?>>Viúvo</option>
    </select> 
  </div>
  <div class="col-sm-3">
    <label>Raça/Cor</label>
    <select class="form-control  form-white <?php echo form_status('cor'); ?>" name="cor">
      <option value="">--Selecione--</option>
      <option value="B" <?php echo set_form_select($editar,$form,'cor', 'B'); ?>>Branco</option>
      <option value="N" <?php echo set_form_select($editar,$form,'cor', 'N'); ?>>Negro</option>
      <option value="I" <?php echo set_form_select($editar,$form,'cor', 'I'); ?>>Indígena</option>
      <option value="P" <?php echo set_form_select($editar,$form,'cor', 'P'); ?>>Pardo</option>
      <option value="M" <?php echo set_form_select($editar,$form,'cor', 'M'); ?>>Mulato</option>
      <option value="C" <?php echo set_form_select($editar,$form,'cor', 'C'); ?>>Caboclo</option>
      <option value="F" <?php echo set_form_select($editar,$form,'cor', 'F'); ?>>Cafuzo</option>
    </select> 
  </div>
  <div class="col-sm-3">
    <label>Sexo</label>
    <select class="form-control  form-white <?php echo form_status('sexo'); ?>" name="sexo">
      <option value="">--Selecione--</option>
      <option value="M" <?php echo set_form_select($editar,$form,'sexo', 'M'); ?>>Masculino</option>
      <option value="F" <?php echo set_form_select($editar,$form,'sexo', 'F'); ?>>Feminino</option>
    </select> 
  </div>
  <div class="col-sm-3">
    <label>Escolaridade</label>
    <select class="form-control  form-white <?php echo form_status('escolaridade'); ?>" name="escolaridade">
      <option value="">--Selecione--</option>
      <option value="1" <?php echo set_form_select($editar,$form,'escolaridade', '1'); ?>>Fundamental - Incompleto</option>
      <option value="2" <?php echo set_form_select($editar,$form,'escolaridade', '2'); ?>>Fundamental - Completo</option>
      <option value="3" <?php echo set_form_select($editar,$form,'escolaridade', '3'); ?>>Médio - Incompleto</option>
      <option value="4" <?php echo set_form_select($editar,$form,'escolaridade', '4'); ?>>Médio - Completo</option>
      <option value="5" <?php echo set_form_select($editar,$form,'escolaridade', '5'); ?>>Superior - Incompleto</option>
      <option value="6" <?php echo set_form_select($editar,$form,'escolaridade', '6'); ?>>Superior - Completo</option>
      <option value="7" <?php echo set_form_select($editar,$form,'escolaridade', '7'); ?>>Pós-graduação - Incompleto</option>
      <option value="8" <?php echo set_form_select($editar,$form,'escolaridade', '8'); ?>>Pós-graduação - Completo</option>
    </select> 
  </div>
  <div class="col-sm-12">
    <label>Nome do Pai</label>
    <input class="form-control <?php echo form_status('nome_pai'); ?>" type="text"  name="nome_pai" maxlength="75" placeholder="Informe o Nome..." value="<?php echo set_form_value($editar,$form,'nome_pai'); ?>">
  </div>
  <div class="col-sm-12">
    <label>Nome da Mãe</label>
    <input class="form-control <?php echo form_status('nome_mae'); ?>" type="text"  name="nome_mae" maxlength="75" placeholder="Informe o Nome..." value="<?php echo set_form_value($editar,$form,'nome_mae'); ?>">
  </div>
</div>