<div class="row">
  <div class="col-sm-3">
    <label>Conta Convênio</label>
    <select class="form-control <?php echo form_status('aceita_conta_convenio'); ?>" name="aceita_conta_convenio">
      <option value="">--Selecione--</option>
      <option value="S" <?php echo set_form_select($editar,$form,'aceita_conta_convenio', 'S'); ?>>Aceita</option>
      <option value="N" <?php echo set_form_select($editar,$form,'aceita_conta_convenio', 'N'); ?>>Não Aceita</option>
    </select>
  </div>
  <div class="col-sm-9">
    <br><br><br>
  </div>

  <div class="col-sm-3">
    <label>Cartão de Débito</label>
    <select class="form-control <?php echo form_status('aceita_cartao_debito'); ?>" name="aceita_cartao_debito">
      <option value="">--Selecione--</option>
      <option value="S" <?php echo set_form_select($editar,$form,'aceita_cartao_debito', 'S'); ?>>Aceita</option>
      <option value="N" <?php echo set_form_select($editar,$form,'aceita_cartao_debito', 'N'); ?>>Não Aceita</option>
    </select>
  </div>
  <div class="col-sm-9">
    <br><br><br>
  </div>

  <div class="col-sm-3">
    <label>Cartão de Crédito</label>
    <select class="form-control <?php echo form_status('aceita_cartao_credito'); ?>" name="aceita_cartao_credito">
      <option value="">--Selecione--</option>
      <option value="S" <?php echo set_form_select($editar,$form,'aceita_cartao_credito', 'S'); ?>>Aceita</option>
      <option value="N" <?php echo set_form_select($editar,$form,'aceita_cartao_credito', 'N'); ?>>Não Aceita</option>
    </select>
  </div>
  <div class="col-sm-3">
    <label>Máximo Parcelas</label>
    <input class="form-control <?php echo form_status('maximo_parcelas_cartao_credito'); ?>" type="number" min="0" max="99" name="maximo_parcelas_cartao_credito"  placeholder="Informe a quantidade..." value="<?php echo set_form_value($editar,$form,'maximo_parcelas_cartao_credito'); ?>">
  </div>
  <div class="col-sm-3">
    <label>Valor Mín. Parcela<sup>R$</sup></label>
    <input class="form-control <?php echo form_status('valor_minimo_parcela_cartao_credito'); ?> casa_decimal_2" type="text"  name="valor_minimo_parcela_cartao_credito"  placeholder="Informe o valor..." value="<?php echo set_form_value($editar,$form,'valor_minimo_parcela_cartao_credito'); ?>">
  </div>
  <div class="col-sm-3">
    <label>Máximo Dias</label>
    <input class="form-control <?php echo form_status('maximo_dias_cartao_credito'); ?>" type="number" min="0" max="1000" name="maximo_dias_cartao_credito"  placeholder="Informe a quantidade..." value="<?php echo set_form_value($editar,$form,'maximo_dias_cartao_credito'); ?>">
  </div>

  <div class="col-sm-3">
    <label>Boleto</label>
    <select class="form-control <?php echo form_status('aceita_boleto'); ?>" name="aceita_boleto">
      <option value="">--Selecione--</option>
      <option value="S" <?php echo set_form_select($editar,$form,'aceita_boleto', 'S'); ?>>Aceita</option>
      <option value="N" <?php echo set_form_select($editar,$form,'aceita_boleto', 'N'); ?>>Não Aceita</option>
    </select>
  </div>
  <div class="col-sm-3">
    <label>Máximo Parcelas</label>
    <input class="form-control <?php echo form_status('maximo_parcelas_boleto'); ?>" type="number" min="0" max="99" name="maximo_parcelas_boleto"  placeholder="Informe a quantidade..." value="<?php echo set_form_value($editar,$form,'maximo_parcelas_boleto'); ?>">
  </div>
  <div class="col-sm-3">
    <label>Valor Mín. Parcela<sup>R$</sup></label>
    <input class="form-control <?php echo form_status('valor_minimo_parcela_boleto'); ?> casa_decimal_2" type="text"  name="valor_minimo_parcela_boleto"  placeholder="Informe o valor..." value="<?php echo set_form_value($editar,$form,'valor_minimo_parcela_boleto'); ?>">
  </div>
  <div class="col-sm-3">
    <label>Máximo Dias</label>
    <input class="form-control <?php echo form_status('maximo_dias_boleto'); ?>" type="number" min="0" max="1000" name="maximo_dias_boleto"  placeholder="Informe a quantidade..." value="<?php echo set_form_value($editar,$form,'maximo_dias_boleto'); ?>">
  </div>

  <div class="col-sm-3">
    <label>Carteira</label>
    <select class="form-control <?php echo form_status('aceita_carteira'); ?>" name="aceita_carteira">
      <option value="">--Selecione--</option>
      <option value="S" <?php echo set_form_select($editar,$form,'aceita_carteira', 'S'); ?>>Aceita</option>
      <option value="N" <?php echo set_form_select($editar,$form,'aceita_carteira', 'N'); ?>>Não Aceita</option>
    </select>
  </div>
  <div class="col-sm-3">
    <label>Máximo Parcelas</label>
    <input class="form-control <?php echo form_status('maximo_parcelas_carteira'); ?>" type="number" min="0" max="99" name="maximo_parcelas_carteira"  placeholder="Informe a quantidade..." value="<?php echo set_form_value($editar,$form,'maximo_parcelas_carteira'); ?>">
  </div>
  <div class="col-sm-3">
    <label>Valor Mín. Parcela<sup>R$</sup></label>
    <input class="form-control <?php echo form_status('valor_minimo_parcela_carteira'); ?> casa_decimal_2" type="text"  name="valor_minimo_parcela_carteira"  placeholder="Informe o valor..." value="<?php echo set_form_value($editar,$form,'valor_minimo_parcela_carteira'); ?>">
  </div>
  <div class="col-sm-3">
    <label>Máximo Dias</label>
    <input class="form-control <?php echo form_status('maximo_dias_carteira'); ?>" type="number" min="0" max="1000" name="maximo_dias_carteira"  placeholder="Informe a quantidade..." value="<?php echo set_form_value($editar,$form,'maximo_dias_carteira'); ?>">
  </div>

  <div class="col-sm-3">
    <label>Cheque</label>
    <select class="form-control <?php echo form_status('aceita_cheque'); ?>" name="aceita_cheque">
      <option value="">--Selecione--</option>
      <option value="S" <?php echo set_form_select($editar,$form,'aceita_cheque', 'S'); ?>>Aceita</option>
      <option value="N" <?php echo set_form_select($editar,$form,'aceita_cheque', 'N'); ?>>Não Aceita</option>
    </select>
  </div>
  <div class="col-sm-9">
    <br><br><br>
  </div>

  <div class="col-sm-3">
    <label>Cheque Pré</label>
    <select class="form-control <?php echo form_status('aceita_cheque_pre'); ?>" name="aceita_cheque_pre">
      <option value="">--Selecione--</option>
      <option value="S" <?php echo set_form_select($editar,$form,'aceita_cheque_pre', 'S'); ?>>Aceita</option>
      <option value="N" <?php echo set_form_select($editar,$form,'aceita_cheque_pre', 'N'); ?>>Não Aceita</option>
    </select>
  </div>
  <div class="col-sm-3">
    <label>Máximo Parcelas</label>
    <input class="form-control <?php echo form_status('maximo_parcelas_cheque_pre'); ?>" type="number" min="0" max="99" name="maximo_parcelas_cheque_pre"  placeholder="Informe a quantidade..." value="<?php echo set_form_value($editar,$form,'maximo_parcelas_cheque_pre'); ?>">
  </div>
  <div class="col-sm-3">
    <label>Valor Mín. Parcela<sup>R$</sup></label>
    <input class="form-control <?php echo form_status('valor_minimo_parcela_cheque_pre'); ?> casa_decimal_2" type="text"  name="valor_minimo_parcela_cheque_pre"  placeholder="Informe o valor..." value="<?php echo set_form_value($editar,$form,'valor_minimo_parcela_cheque_pre'); ?>">
  </div>
  <div class="col-sm-3">
    <label>Máximo Dias</label>
    <input class="form-control <?php echo form_status('maximo_dias_cheque_pre'); ?>" type="number" min="0" max="1000" name="maximo_dias_cheque_pre"  placeholder="Informe a quantidade..." value="<?php echo set_form_value($editar,$form,'maximo_dias_cheque_pre'); ?>">
  </div>
  
</div>