<div class="row">
  <div class="col-sm-4">
    <label>Forma de Pagamento</label>
    <select class="form-control  form-white <?php echo form_status('tipo_pagamento'); ?>" name="tipo_pagamento">
      <option value="">--Selecione--</option>
      <option value="D" <?php echo set_form_select($editar,$form,'tipo_pagamento', 'D'); ?>>Dinheiro</option>
      <option value="C" <?php echo set_form_select($editar,$form,'tipo_pagamento', 'C'); ?>>Conta Bancária</option>
    </select> 
  </div>
  <div class="col-sm-4">
    <label>Banco</label>
    <select class="form-control  form-white <?php echo form_status('id_banco_pagamento'); ?>" name="id_banco_pagamento">
      <option value="">--Selecione--</option>
      <?php foreach ($bancos as $key): ?>
        <option value="<?php echo $key->id; ?>" <?php echo set_form_select($editar,$form,'id_banco_pagamento', $key->id); ?>><?php echo $key->nome; ?></option>
      <?php endforeach ?>
    </select> 
  </div>
  <div class="col-sm-4">
    <label>Tipo de Conta</label>
    <select class="form-control  form-white <?php echo form_status('tipo_conta_pagamento'); ?>" name="tipo_conta_pagamento">
      <option value="">--Selecione--</option>
      <option value="S" <?php echo set_form_select($editar,$form,'tipo_conta_pagamento', 'S'); ?>>Conta Salário</option>
      <option value="C" <?php echo set_form_select($editar,$form,'tipo_conta_pagamento', 'C'); ?>>Conta Corrente</option>
      <option value="P" <?php echo set_form_select($editar,$form,'tipo_conta_pagamento', 'P'); ?>>Conta Poupança</option>
      <option value="N" <?php echo set_form_select($editar,$form,'tipo_conta_pagamento', 'N'); ?>>Não Aplicável</option>
    </select> 
  </div>
  <div class="col-sm-3">
    <label>Agência</label>
    <input class="form-control <?php echo form_status('agencia_pagamento'); ?>" type="text"  name="agencia_pagamento" maxlength="20" placeholder="Informe o Número..." value="<?php echo set_form_value($editar,$form,'agencia_pagamento'); ?>">
  </div>
  <div class="col-sm-5">
    <label>Conta</label>
    <input class="form-control <?php echo form_status('conta_pagamento'); ?>" type="text"  name="conta_pagamento" maxlength="20" placeholder="Informe o Número..." value="<?php echo set_form_value($editar,$form,'conta_pagamento'); ?>">
  </div>
</div>