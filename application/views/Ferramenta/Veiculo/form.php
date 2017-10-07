<?php $this->load->view('include/top'); ?>
  <div class="panel">
    <div class="panel-header">
      <h3><i class="fa fa-motorcycle"></i>Cadastro de Veículos</h3>
    </div>
    <div class="panel-content">
      <form action="<?php echo $url_form; ?>" method="POST">


        <div class="tab_left">
          <ul class="nav nav-tabs nav-blue">
            <li class="active"><a href="#geral" data-toggle="tab">Geral</a></li>
          </ul>
          <div class="tab-content">

            <div class="tab-pane fade active in" id="geral">
              
              <div class="row">
                <div class="col-sm-2">
                  <label>Placa</label>
                  <input class="form-control <?php echo form_status('placa'); ?>" style="text-transform: uppercase;" type="text"  name="placa" maxlength="8" value="<?php echo set_form_value($editar,$form,'placa'); ?>">
                </div>
                <div class="col-sm-3">
                  <label>Marca</label>
                  <input class="form-control <?php echo form_status('marca'); ?>" style="text-transform: uppercase;" type="text"  name="marca" maxlength="45" value="<?php echo set_form_value($editar,$form,'marca'); ?>">
                </div>
                <div class="col-sm-3">
                  <label>Modelo</label>
                  <input class="form-control <?php echo form_status('modelo'); ?>" style="text-transform: uppercase;" type="text"  name="modelo" maxlength="45" value="<?php echo set_form_value($editar,$form,'modelo'); ?>">
                </div>
                <div class="col-sm-2">
                  <label>Ano</label>
                  <input class="form-control <?php echo form_status('ano'); ?>" type="text" name="ano" maxlength="4" value="<?php echo set_form_value($editar,$form,'ano'); ?>">
                </div>
                <div class="col-sm-2">
                  <label>Cor</label>
                  <input class="form-control <?php echo form_status('cor'); ?>" type="text" style="text-transform: uppercase;" name="cor" maxlength="25" value="<?php echo set_form_value($editar,$form,'cor'); ?>">
                </div>
              </div>
              <div class="row">
                <div class="col-sm-6">
                  <label>Identificação</label>
                  <input class="form-control <?php echo form_status('identificacao'); ?>" type="text" name="identificacao" maxlength="25" value="<?php echo set_form_value($editar,$form,'identificacao'); ?>">
                </div>
                <div class="col-sm-6">
                  <label>Ativo</label>
                  <select class="form-control <?php echo form_status('ativo'); ?>" name="ativo">
                    <option value="">--Selecione--</option>
                    <option value="S" <?php echo set_form_select($editar,$form,'ativo', 'S'); ?>>Sim</option>
                    <option value="N" <?php echo set_form_select($editar,$form,'ativo', 'N'); ?>>Não</option>
                  </select>
                </div>
              </div>

            </div>
          </div>
        </div>

        
        <?php $this->load->view('include/botoes-form'); ?>
      </form>
    </div>
  </div>
<?php $this->load->view('include/footer'); ?>