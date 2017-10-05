<div class="row">
  <div class="col-sm-2">
    <label>Código</label>
    <input class="form-control bg-aero" type="text" value="<?php echo set_form_value($editar,$form,'id'); ?>" disabled placeholder="Automático">
  </div>
  <div class="col-sm-4">
    <label>Tipo</label>
    <select class="form-control <?php echo form_status('tipo'); ?>" name="tipo" id="tipo">
      <option value="">--Selecione--</option>
      <option value="V" <?php echo set_form_select($editar,$form,'tipo', 'V'); ?>>Venda</option>
      <option value="C" <?php echo set_form_select($editar,$form,'tipo', 'C'); ?>>Custo</option>
      <option value="M" <?php echo set_form_select($editar,$form,'tipo', 'M'); ?>>Custo Médio</option>
    </select>
  </div>
  <div class="col-sm-6">
    <label>Descrição</label>
    <input class="form-control <?php echo form_status('descricao'); ?>" type="text"  name="descricao" maxlength="45" placeholder="Informe a descrição..." value="<?php echo set_form_value($editar,$form,'descricao'); ?>">
  </div>
  <div class="col-sm-3">
    <label>Ativo</label>
    <select class="form-control <?php echo form_status('ativo'); ?>" name="ativo" >
      <option value="">--Selecione--</option>
      <option value="S" <?php echo set_form_select($editar,$form,'ativo', 'S'); ?>>Sim</option>
      <?php if (($editar && $id_tabela_preco > 3) || ! $editar): ?>
        <option value="N" <?php echo set_form_select($editar,$form,'ativo', 'N'); ?>>Não</option>
      <?php endif ?>
    </select>
  </div>
  <div class="col-sm-3 esconde_tipo">
    <label>Desconto Máx. Produtos<sup>%</sup></label>
    <input class="form-control <?php echo form_status('desconto_maximo_produto'); ?> casa_decimal_2" type="text"  name="desconto_maximo_produto"  placeholder="Informe o desconto máximo..." value="<?php echo set_form_value($editar,$form,'desconto_maximo_produto'); ?>">
  </div>
  <div class="col-sm-3 esconde_tipo">
    <label>Desconto Máx. Serviços<sup>%</sup></label>
    <input class="form-control <?php echo form_status('desconto_maximo_servico'); ?> casa_decimal_2" type="text"  name="desconto_maximo_servico"  placeholder="Informe o desconto máximo..." value="<?php echo set_form_value($editar,$form,'desconto_maximo_servico'); ?>">
  </div>
  <div class="col-sm-3 esconde_tipo">
    <label>Markup<sup>%</sup></label>
    <input class="form-control <?php echo form_status('markup'); ?> casa_decimal_2" type="text"  name="markup"  placeholder="Informe o markup..." value="<?php echo set_form_value($editar,$form,'markup'); ?>">
  </div>
</div>