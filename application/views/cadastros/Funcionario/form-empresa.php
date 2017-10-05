<div class="row">
  <div class="col-sm-3">
    <label>Cargo</label>
    <select class="form-control  form-white <?php echo form_status('id_cargo'); ?>" name="id_cargo">
      <option value="">--Selecione--</option>
      <?php foreach ($cargos as $key): ?>
        <option value="<?php echo $key->id; ?>" <?php echo set_form_select($editar,$form,'id_cargo', $key->id); ?>><?php echo $key->descricao; ?></option>
      <?php endforeach ?>
    </select> 
  </div>
  <div class="col-sm-3">
    <label>C.B.O.</label>
    <input class="form-control <?php echo form_status('cbo'); ?>" type="text"  name="cbo" maxlength="10" placeholder="Informe o CBO..." value="<?php echo set_form_value($editar,$form,'cbo'); ?>">
  </div>
  <div class="col-sm-3">
    <label>Data de Admissão</label>
    <div class="prepend-icon">
      <input class="form-control b-datepicker <?php echo form_status('data_admissao'); ?>" type="text" maxlength="10" data-mask="99/99/9999" name="data_admissao" placeholder="Informe a Data..." value="<?php echo set_form_value($editar,$form,'data_admissao'); ?>">
      <i class="icon-calendar"></i>
    </div>
  </div>
  <div class="col-sm-3">
    <label>Data de Rescisão</label>
    <div class="prepend-icon">
      <input class="form-control b-datepicker <?php echo form_status('data_demissao'); ?>" type="text" maxlength="10" data-mask="99/99/9999" name="data_demissao" placeholder="Informe a Data..." value="<?php echo set_form_value($editar,$form,'data_demissao'); ?>">
      <i class="icon-calendar"></i>
    </div>
  </div>
  <div class="col-sm-12">
    <label>Tipo de Rescisão</label>
    <select class="form-control  form-white <?php echo form_status('tipo_demissao'); ?>" name="tipo_demissao">
      <option value="">--Selecione--</option>
      <option value="01" <?php echo set_form_select($editar,$form,'tipo_demissao', '01'); ?>>Dispensa sem justa causa</option>
      <option value="02" <?php echo set_form_select($editar,$form,'tipo_demissao', '02'); ?>>Dispensa com justa causa</option>
      <option value="03" <?php echo set_form_select($editar,$form,'tipo_demissao', '03'); ?>>Rescisão indireta</option>
      <option value="04" <?php echo set_form_select($editar,$form,'tipo_demissao', '04'); ?>>Culpa recíproca</option>
      <option value="05" <?php echo set_form_select($editar,$form,'tipo_demissao', '05'); ?>>Pedido de demissão</option>
      <option value="06" <?php echo set_form_select($editar,$form,'tipo_demissao', '06'); ?>>Rescisão antecipada de contrato a prazo determinado sem justa causa</option>
      <option value="07" <?php echo set_form_select($editar,$form,'tipo_demissao', '07'); ?>>Rescisão antecipada de contrato a prazo determinado com justa causa</option>
      <option value="08" <?php echo set_form_select($editar,$form,'tipo_demissao', '08'); ?>>Rescisão antecipada de contrato a prazo determinado por pedido de demissão</option>
      <option value="09" <?php echo set_form_select($editar,$form,'tipo_demissao', '09'); ?>>Extinção do contrato por falecimento do empregado</option>
      <option value="10" <?php echo set_form_select($editar,$form,'tipo_demissao', '10'); ?>>Extinção do contrato por fechamento da empresa</option>
      <option value="11" <?php echo set_form_select($editar,$form,'tipo_demissao', '11'); ?>>Extinção de contrato a prazo determinado (inclusive o contrato de experiência)</option>
    </select> 
  </div>
  <div class="col-sm-6">
    <label>Tipo de Aviso Prévio</label>
    <select class="form-control  form-white <?php echo form_status('tipo_aviso'); ?>" name="tipo_aviso">
      <option value="">--Selecione--</option>
      <option value="I" <?php echo set_form_select($editar,$form,'tipo_aviso', 'I'); ?>>Aviso Prévio Indenizado</option>
      <option value="C" <?php echo set_form_select($editar,$form,'tipo_aviso', 'C'); ?>>Aviso Prévio Cumprido</option>
      <option value="N" <?php echo set_form_select($editar,$form,'tipo_aviso', 'N'); ?>>Não se aplica</option>
    </select> 
  </div>
  <div class="col-sm-6">
    <label>Motivo da Rescisão</label>
    <input class="form-control <?php echo form_status('motivo_demissao'); ?>" type="text"  name="motivo_demissao" maxlength="45" placeholder="Informe o Motivo..." value="<?php echo set_form_value($editar,$form,'motivo_demissao'); ?>">
  </div>
  <div class="col-sm-4">
    <label>Cumpriu Aviso Prévio?</label>
    <select class="form-control  form-white <?php echo form_status('cumpriu_aviso'); ?>" name="cumpriu_aviso">
      <option value="">--Selecione--</option>
      <option value="S" <?php echo set_form_select($editar,$form,'cumpriu_aviso', 'S'); ?>>Sim</option>
      <option value="N" <?php echo set_form_select($editar,$form,'cumpriu_aviso', 'N'); ?>>Não</option>
      <option value="A" <?php echo set_form_select($editar,$form,'cumpriu_aviso', 'A '); ?>>Não se aplica</option>
    </select> 
  </div>
  <div class="col-sm-4">
    <label>Recontrata?</label>
    <select class="form-control  form-white <?php echo form_status('recontrata'); ?>" name="recontrata">
      <option value="">--Selecione--</option>
      <option value="S" <?php echo set_form_select($editar,$form,'recontrata', 'S'); ?>>Sim</option>
      <option value="N" <?php echo set_form_select($editar,$form,'recontrata', 'N'); ?>>Não</option>
    </select> 
  </div>
  <div class="col-sm-4">
    <label>Número de Registro</label>
    <input class="form-control <?php echo form_status('numero_registro'); ?>" type="text"  name="numero_registro" maxlength="45" placeholder="Informe o Número..." value="<?php echo set_form_value($editar,$form,'numero_registro'); ?>">
  </div>
  <div class="col-sm-4">
    <label>Último Dia Trabalhado</label>
    <div class="prepend-icon">
      <input class="form-control b-datepicker <?php echo form_status('ultimo_dia_trabalhado'); ?>" type="text" maxlength="10" data-mask="99/99/9999" name="ultimo_dia_trabalhado" placeholder="Informe a Data..." value="<?php echo set_form_value($editar,$form,'ultimo_dia_trabalhado'); ?>">
      <i class="icon-calendar"></i>
    </div>
  </div>
  <div class="col-sm-4">
    <label>Início do Aviso Prévio</label>
    <div class="prepend-icon">
      <input class="form-control b-datepicker <?php echo form_status('data_inicio_aviso'); ?>" type="text" maxlength="10" data-mask="99/99/9999" name="data_inicio_aviso" placeholder="Informe a Data..." value="<?php echo set_form_value($editar,$form,'data_inicio_aviso'); ?>">
      <i class="icon-calendar"></i>
    </div>
  </div>
  <div class="col-sm-4">
    <label>Fim do Aviso Prévio</label>
    <div class="prepend-icon">
      <input class="form-control b-datepicker <?php echo form_status('data_final_aviso'); ?>" type="text" maxlength="10" data-mask="99/99/9999" name="data_final_aviso" placeholder="Informe a Data..." value="<?php echo set_form_value($editar,$form,'data_final_aviso'); ?>">
      <i class="icon-calendar"></i>
    </div>
  </div>
</div>