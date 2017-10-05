<div class="row">

  <div class="col-sm-4">
    <label>Estoque Mínimo</label>
    <input class="form-control <?php echo form_status('estoque_minimo'); ?>" type="number" step="1" min="0" id="estoque_minimo" name="estoque_minimo" maxlength="5" value="<?php echo set_form_value($editar,$form,'estoque_minimo'); ?>">
  </div>

  <div class="col-sm-4">
    <label>Estoque Atual</label>
    <input class="form-control <?php echo form_status('estoque_atual'); ?>" type="number" step="1" name="estoque_atual" maxlength="5" value="<?php echo set_form_value($editar,$form,'estoque_atual'); ?>">
  </div>

  <div class="col-sm-4">
    <label>Localização</label>
    <select class="form-control <?php echo form_status('id_localizacao'); ?>" name="id_localizacao">
      <option value="">--Selecione--</option>
      <?php foreach ($localizacoes as $key): ?>
        <option value="<?php echo $key->id ?>" <?php echo set_form_select($editar,$form,'id_localizacao', $key->id); ?>><?php echo $key->descricao; ?></option>
      <?php endforeach ?>
    </select>
  </div>

  <script>
    $("#estoque_minimo").blur(function() {
      if($("#estoque_minimo").val() < 0){
        swal(
          'Atenção!',
          'O campo estoque mínimo não pode ser negativo.',
          'warning',
          'reverseButtons'
        );
        $("#estoque_minimo").val(0);
      }
    });
  </script>

</div>