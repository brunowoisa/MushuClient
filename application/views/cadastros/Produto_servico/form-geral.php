<div class="row">
  <div class="col-sm-2">
    <label>Código</label>
    <input class="form-control bg-aero" type="text" value="<?php echo set_form_value($editar,$form,'id'); ?>" disabled placeholder="Automático">
  </div>
  <div class="col-sm-2">
    <label>Tipo</label>
    <select class="form-control <?php echo form_status('tipo'); ?>" name="tipo">
      <option value="P" <?php echo set_form_select($editar,$form,'tipo', 'P'); ?>>Produto</option>
      <option value="S" <?php echo set_form_select($editar,$form,'tipo', 'S'); ?>>Serviço</option>
    </select>
  </div>
  <div class="col-sm-8">
    <label>Descrição</label>
    <input class="form-control <?php echo form_status('descricao'); ?>" type="text"  name="descricao" maxlength="120" value="<?php echo set_form_value($editar,$form,'descricao'); ?>">
  </div>
  <div class="col-sm-4">
    <label>Unidade de Venda</label>
    <select class="form-control <?php echo form_status('id_unidade_de_venda'); ?>" name="id_unidade_de_venda">
      <option value="">--Selecione--</option>
      <?php foreach ($unidades_de_venda as $key): ?>
        <option value="<?php echo $key->id ?>" <?php echo set_form_select($editar,$form,'id_unidade_de_venda', $key->id); ?>><?php echo $key->descricao; ?></option>
      <?php endforeach ?>
    </select>
  </div>
  <div class="col-sm-4">
    <label>Fabricante</label>
    <select class="form-control <?php echo form_status('id_fabricante'); ?>" name="id_fabricante">
      <option value="">--Selecione--</option>
      <?php foreach ($fabricantes as $key): ?>
        <option value="<?php echo $key->id ?>" <?php echo set_form_select($editar,$form,'id_fabricante', $key->id); ?>><?php echo $key->descricao; ?></option>
      <?php endforeach ?>
    </select>
  </div>
  <div class="col-sm-4">
    <label>Ativo</label>
    <select class="form-control <?php echo form_status('ativo'); ?>" name="ativo">
      <option value="S" <?php echo set_form_select($editar,$form,'ativo', 'S'); ?>>Sim</option>
      <option value="N" <?php echo set_form_select($editar,$form,'ativo', 'N'); ?>>Não</option>
    </select>
  </div>
  <div class="col-sm-4">
    <label>Código de Barras (EAN)</label>
    <input class="form-control <?php echo form_status('codigo_ean'); ?>" type="text"  name="codigo_ean" maxlength="14" value="<?php echo set_form_value($editar,$form,'codigo_ean'); ?>">
  </div>
  <div class="col-sm-4">
    <label>Código Adicional 1</label>
    <input class="form-control <?php echo form_status('codigo_adicional_1'); ?>" type="text"  name="codigo_adicional_1" maxlength="14" value="<?php echo set_form_value($editar,$form,'codigo_adicional_1'); ?>">
  </div>
  <div class="col-sm-4">
    <label>Código Adicional 2</label>
    <input class="form-control <?php echo form_status('codigo_adicional_2'); ?>" type="text"  name="codigo_adicional_2" maxlength="14" value="<?php echo set_form_value($editar,$form,'codigo_adicional_2'); ?>">
  </div>
  <div class="col-sm-4">
    <label>Código Adicional 3</label>
    <input class="form-control <?php echo form_status('codigo_adicional_3'); ?>" type="text"  name="codigo_adicional_3" maxlength="14" value="<?php echo set_form_value($editar,$form,'codigo_adicional_3'); ?>">
  </div>
  <div class="col-sm-4">
    <label>Código Adicional 4</label>
    <input class="form-control <?php echo form_status('codigo_adicional_4'); ?>" type="text"  name="codigo_adicional_4" maxlength="14" value="<?php echo set_form_value($editar,$form,'codigo_adicional_4'); ?>">
  </div>
  <div class="col-sm-4">
    <label>Código Adicional 5</label>
    <input class="form-control <?php echo form_status('codigo_adicional_5'); ?>" type="text"  name="codigo_adicional_5" maxlength="14" value="<?php echo set_form_value($editar,$form,'codigo_adicional_5'); ?>">
  </div>
  <div class="col-sm-8">
    <label>Observações</label>
    <textarea name="observacoes" class="form-control <?php echo form_status('observacoes'); ?>" rows="10"><?php echo set_form_value($editar,$form,'observacoes'); ?></textarea>
  </div>
  <div class="col-sm-4">
    <label class="c-blue">Situações</label><br>
    
    <label>
      <input type="checkbox" name="lista[cotacao][]" value="" data-checkbox="icheckbox_minimal-blue">
      Movimentação Bloqueada
    </label>
    <br>
    <label>
      <input type="checkbox" name="lista[cotacao][]" value="" data-checkbox="icheckbox_minimal-blue">
      Venda Bloqueada
    </label>
    <br>
    <label>
      <input type="checkbox" name="lista[cotacao][]" value="" data-checkbox="icheckbox_minimal-blue">
      Produto Fracionado
    </label>
    <br>
    
  </div>
  
</div>