<?php $this->load->view('include/top'); ?>
  <div class="panel">
    <div class="panel-header">
      <h3><i class="fa fa-wrench"></i>Movimentação</h3>
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
            <select class="form-control <?php echo form_status('id_cliente'); ?>" name="id_cliente" id="id_cliente" disabled>
              <option><?php echo $form->nome_cliente; ?></option>
            </select>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-3">
            <label>Veículo</label>
            <select class="form-control <?php echo form_status('id_veiculo'); ?>" name="id_veiculo" id="id_veiculo" style="width: 100%;" disabled>
              <option><?php echo formata_placa($form->placa); ?></option>
            </select>
          </div>
          <div class="col-sm-3">
            <label>Autorizado</label>
            <select class="form-control <?php echo form_status('id_autorizado'); ?>" name="id_autorizado" id="id_autorizado" style="width: 100%;" disabled>
              <option><?php echo $form->nome_autorizado; ?></option>
            </select>
          </div>
          <div class="col-sm-3">
            <label>Quilometragem Atual</label>
            <input class="form-control <?php echo form_status('km'); ?>" type="number" min="0" max="99999999999" step="1" name="km" maxlength="11" value="<?php echo set_form_value($editar,$form,'km'); ?>" disabled>
          </div>
          <div class="col-sm-3">
            <label>Trocou o Óleo?</label>
            <select class="form-control <?php echo form_status('trocou_oleo'); ?>" name="trocou_oleo" disabled>
              <option value="">--Selecione--</option>
              <option value="S" <?php echo set_form_select($editar,$form,'trocou_oleo', "S"); ?>>Sim</option>
              <option value="N" <?php echo set_form_select($editar,$form,'trocou_oleo', "N"); ?>>Não</option>
            </select>
          </div>
          <div class="col-sm-12">
            <label>Descrição</label>
            <textarea name="descricao" rows="10" class="form-control <?php echo form_status('descricao'); ?>" disabled><?php echo set_form_value($editar,$form,'descricao'); ?></textarea>
          </div>
        </div>
        <?php $this->load->view('include/botoes-form-cancelar'); ?>
      </form>
    </div>
  </div>
<?php $this->load->view('include/footer'); ?>