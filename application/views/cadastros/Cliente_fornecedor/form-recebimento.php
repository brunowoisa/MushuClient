<div class="row">
  <div class="col-sm-3">
    <label>Conta Convênio</label>
    <select class="form-control <?php echo form_status('conta_convenio'); ?>" name="conta_convenio">
      <option value="">--Selecione--</option>
      <option value="S" <?php echo set_form_select($editar,$form,'conta_convenio', 'S'); ?>>Aceita</option>
      <option value="N" <?php echo set_form_select($editar,$form,'conta_convenio', 'N'); ?>>Não Aceita</option>
    </select>
  </div>
  <div class="col-sm-3">
    <label>Limite de Crédito<sup>R$</sup></label>
    <input class="form-control <?php echo form_status('limite_credito'); ?> casa_decimal_2" type="text"  name="limite_credito"  placeholder="Informe o valor..." value="<?php echo set_form_value($editar,$form,'limite_credito'); ?>">
  </div>
  <div class="col-sm-3">
    <label>Cartão de Débito</label>
    <select class="form-control <?php echo form_status('cartao_debito'); ?>" name="cartao_debito">
      <option value="">--Selecione--</option>
      <option value="S" <?php echo set_form_select($editar,$form,'cartao_debito', 'S'); ?>>Aceita</option>
      <option value="N" <?php echo set_form_select($editar,$form,'cartao_debito', 'N'); ?>>Não Aceita</option>
    </select>
  </div>
  <div class="col-sm-3">
    <label>Cartão de Crédito</label>
    <select class="form-control <?php echo form_status('cartao_credito'); ?>" name="cartao_credito">
      <option value="">--Selecione--</option>
      <option value="S" <?php echo set_form_select($editar,$form,'cartao_credito', 'S'); ?>>Aceita</option>
      <option value="N" <?php echo set_form_select($editar,$form,'cartao_credito', 'N'); ?>>Não Aceita</option>
    </select>
  </div>
</div>
<div class="row">
  <div class="col-sm-3">
    <label>Boleto</label>
    <select class="form-control <?php echo form_status('boleto'); ?>" name="boleto">
      <option value="">--Selecione--</option>
      <option value="S" <?php echo set_form_select($editar,$form,'boleto', 'S'); ?>>Aceita</option>
      <option value="N" <?php echo set_form_select($editar,$form,'boleto', 'N'); ?>>Não Aceita</option>
    </select>
  </div>
  <div class="col-sm-3">
    <label>Carteira</label>
    <select class="form-control <?php echo form_status('carteira'); ?>" name="carteira">
      <option value="">--Selecione--</option>
      <option value="S" <?php echo set_form_select($editar,$form,'carteira', 'S'); ?>>Aceita</option>
      <option value="N" <?php echo set_form_select($editar,$form,'carteira', 'N'); ?>>Não Aceita</option>
    </select>
  </div>
  <div class="col-sm-3">
    <label>Cheque</label>
    <select class="form-control <?php echo form_status('cheque'); ?>" name="cheque">
      <option value="">--Selecione--</option>
      <option value="S" <?php echo set_form_select($editar,$form,'cheque', 'S'); ?>>Aceita</option>
      <option value="N" <?php echo set_form_select($editar,$form,'cheque', 'N'); ?>>Não Aceita</option>
    </select>
  </div>
  <div class="col-sm-3">
    <label>Cheque Pré</label>
    <select class="form-control <?php echo form_status('cheque_pre'); ?>" name="cheque_pre">
      <option value="">--Selecione--</option>
      <option value="S" <?php echo set_form_select($editar,$form,'cheque_pre', 'S'); ?>>Aceita</option>
      <option value="N" <?php echo set_form_select($editar,$form,'cheque_pre', 'N'); ?>>Não Aceita</option>
    </select>
  </div>
</div>
