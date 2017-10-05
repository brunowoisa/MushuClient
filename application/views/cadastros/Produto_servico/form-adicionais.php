<div class="row">

  <div class="col-sm-4">
    <label>Desconto Máximo</label>
    <input class="form-control <?php echo form_status('desconto_maximo'); ?> casa_decimal_2" type="text"  name="desconto_maximo" maxlength="5" value="<?php echo set_form_value($editar,$form,'desconto_maximo'); ?>">
  </div>

</div>
<hr>
<div class="row">

  <div class="col-sm-4">
    <label>Peso Líquido <sup>(Kg)</sup></label>
    <input class="form-control <?php echo form_status('peso_liquido'); ?> casa_decimal_2" type="text"  name="peso_liquido" maxlength="5" value="<?php echo set_form_value($editar,$form,'peso_liquido'); ?>">
  </div>

  <div class="col-sm-4">
    <label>Peso Bruto <sup>(Kg)</sup></label>
    <input class="form-control <?php echo form_status('peso_bruto'); ?> casa_decimal_2" type="text"  name="peso_bruto" maxlength="5" value="<?php echo set_form_value($editar,$form,'peso_bruto'); ?>">
  </div>

  <div class="col-sm-4">
    <label>Volume <sup>(cm3)</sup></label>
    <input class="form-control <?php echo form_status('volume'); ?> casa_decimal_2" type="text"  name="volume" maxlength="5" value="<?php echo set_form_value($editar,$form,'volume'); ?>">
  </div>

  <div class="col-sm-4">
    <label>Altura <sup>(cm)</sup></label>
    <input class="form-control <?php echo form_status('altura'); ?> casa_decimal_2" type="text"  name="altura" maxlength="5" value="<?php echo set_form_value($editar,$form,'altura'); ?>">
  </div>

  <div class="col-sm-4">
    <label>Largura <sup>(cm)</sup></label>
    <input class="form-control <?php echo form_status('largura'); ?> casa_decimal_2" type="text"  name="largura" maxlength="5" value="<?php echo set_form_value($editar,$form,'largura'); ?>">
  </div>

  <div class="col-sm-4">
    <label>Comprimento <sup>(cm)</sup></label>
    <input class="form-control <?php echo form_status('comprimeto'); ?> casa_decimal_2" type="text"  name="comprimeto" maxlength="5" value="<?php echo set_form_value($editar,$form,'comprimeto'); ?>">
  </div>

</div>