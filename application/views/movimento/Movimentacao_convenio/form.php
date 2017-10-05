<?php $this->load->view('include/top'); ?>
  <div class="panel">
    <div class="panel-header">
      <h3><i class="fa fa-star"></i>Movimentação de Convênios</h3>
    </div>
    <div class="panel-content">
      <form action="<?php echo $url_form; ?>" method="POST">

        <div class="row">
          <div class="col-sm-2">
            <label>Código</label>
            <input class="form-control bg-aero" type="text" value="<?php echo set_form_value($editar,$form,'id'); ?>" disabled placeholder="Automático">
          </div>
          <div class="col-sm-10">
            <label>Cliente</label>
            <select class="form-control <?php echo form_status('id_cliente'); ?>" name="id_cliente" id="id_cliente">
              <option value="">--Selecione--</option>
              <?php foreach ($clientes as $key): ?>
                <option value="<?php echo $key->id; ?>" <?php echo set_form_select($editar,$form,'id_cliente', $key->id); ?>><?php echo $key->nome; ?></option>
              <?php endforeach ?>
            </select>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-4">
            <label>Veículo</label>
            <select class="form-control <?php echo form_status('id_veiculo'); ?>" name="id_veiculo" id="id_veiculo" style="width: 100%;">
              <option value="">--Selecione--</option>
            </select>
          </div>
          <div class="col-sm-4">
            <label>Autorizado</label>
            <select class="form-control <?php echo form_status('id_autorizado'); ?>" name="id_autorizado" id="id_autorizado" style="width: 100%;">
              <option value="">--Selecione--</option>
            </select>
          </div>
          <div class="col-sm-4">
            <label>Técnico</label>
            <select class="form-control <?php echo form_status('id_tecnico'); ?>" name="id_tecnico">
              <option value="">--Selecione--</option>
              <?php foreach ($tecnicos as $key): ?>
                <option value="<?php echo $key->id; ?>" <?php echo set_form_select($editar,$form,'id_tecnico', $key->id); ?>><?php echo $key->nome; ?></option>
              <?php endforeach ?>
            </select>
          </div>
          <div class="col-sm-4">
            <label>Sequência Shop9</label>
            <input class="form-control <?php echo form_status('seq_shop9'); ?>" type="number" min="0" max="99999999999" step="1" name="seq_shop9" maxlength="11" value="<?php echo set_form_value($editar,$form,'seq_shop9'); ?>">
          </div>
          <div class="col-sm-4">
            <label>Quilometragem Atual</label>
            <input class="form-control <?php echo form_status('km'); ?>" type="number" min="0" max="99999999999" step="1" name="km" maxlength="11" value="<?php echo set_form_value($editar,$form,'km'); ?>">
          </div>
          <div class="col-sm-4">
            <label>Trocou o Óleo?</label>
            <select class="form-control <?php echo form_status('trocou_oleo'); ?>" name="trocou_oleo">
              <option value="">--Selecione--</option>
              <option value="S" <?php echo set_form_select($editar,$form,'trocou_oleo', "S"); ?>>Sim</option>
              <option value="N" <?php echo set_form_select($editar,$form,'trocou_oleo', "N"); ?>>Não</option>
            </select>
          </div>
          <div class="col-sm-12">
            <label>Descrição</label>
            <textarea name="descricao" rows="5" class="form-control <?php echo form_status('descricao'); ?>"><?php echo set_form_value($editar,$form,'descricao'); ?></textarea>
          </div>
        </div>
        <?php $this->load->view('include/botoes-form'); ?>
      </form>
    </div>
  </div>
  <script>

    <?php if (isset($form->id_cliente)): ?>
      $(document).ready(function() {
        busca_veiculos_do_cliente(<?php echo $form->id_cliente; ?>,true);
        busca_autorizados_do_cliente(<?php echo $form->id_cliente; ?>,true);
      });
    <?php elseif (isset($_POST['id_cliente'])): ?>
      $(document).ready(function() {
        busca_veiculos_do_cliente(<?php echo $_POST['id_cliente']; ?>,true);
        busca_autorizados_do_cliente(<?php echo $_POST['id_cliente']; ?>,true);
      });
    <?php endif ?>

    $('#id_cliente').change(function() {
      var id_cliente = $('#id_cliente').val();
      if (id_cliente != '') {
        busca_veiculos_do_cliente(id_cliente,false);
        busca_autorizados_do_cliente(id_cliente,false);
      }
    });

    function busca_veiculos_do_cliente(id_cliente,recarga){
      $.ajax({
        url: '<?php echo base_url(); ?>/Ajax/busca_veiculos_do_cliente/'+id_cliente,
        type: 'POST',
        dataType: 'json',
      })
      .done(function(data) {
        var append = '<option value="--Selecione--">--Selecione--</option>';
        for (var i = data.length - 1; i >= 0; i--) {
          append += '<option value="'+data[i].id+'">'+data[i].placa+'</option>';
        }
        $('#id_veiculo').html(append);
        $("#id_veiculo").select2();
        if (recarga) {
          <?php if (isset($_POST['id_veiculo']) && $_POST['id_veiculo'] != ''): ?>
            $('#id_veiculo').val('<?php echo $_POST['id_veiculo']; ?>');
          <?php endif ?>
          <?php if (isset($form->id_veiculo) && $form->id_veiculo != ''): ?>
            $('#id_veiculo').val('<?php echo $form->id_veiculo; ?>');
          <?php endif ?>
          $("#id_veiculo").select2();
        }
      });
    }

    function busca_autorizados_do_cliente(id_cliente,recarga){
      $.ajax({
        url: '<?php echo base_url(); ?>/Ajax/busca_autorizados_do_cliente/'+id_cliente,
        type: 'POST',
        dataType: 'json',
      })
      .done(function(data) {
        var append = '<option value="--Selecione--">--Selecione--</option>';
        for (var i = data.length - 1; i >= 0; i--) {
          append += '<option value="'+data[i].id+'">'+data[i].nome+'</option>';
        }
        $('#id_autorizado').html(append);
        $("#id_autorizado").select2();
        if (recarga) {
          <?php if (isset($_POST['id_autorizado']) && $_POST['id_autorizado'] != ''): ?>
            $('#id_autorizado').val('<?php echo $_POST['id_autorizado']; ?>');
          <?php endif ?>
          <?php if (isset($form->id_autorizado) && $form->id_autorizado != ''): ?>
            $('#id_autorizado').val('<?php echo $form->id_autorizado; ?>');
          <?php endif ?>
          $("#id_autorizado").select2();
        }
      });
    }

  </script>
<?php $this->load->view('include/footer'); ?>