<?php $this->load->view('include/top'); ?>
  <div class="panel">
    <div class="panel-header">
      <h3><i class="fa fa-cubes"></i>Cadastro de Fabricantes</h3>
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
                  <label>Código</label>
                  <input class="form-control bg-aero" type="text" value="<?php echo set_form_value($editar,$form,'id'); ?>" disabled placeholder="Automático">
                </div>
                <div class="col-sm-10">
                  <label>Descrição</label>
                  <input class="form-control <?php echo form_status('descricao'); ?>" type="text"  name="descricao" maxlength="45" value="<?php echo set_form_value($editar,$form,'descricao'); ?>">
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