<?php $this->load->view('include/top'); ?>
  <div class="panel">
    <div class="panel-header">
      <h3><i class="fa fa-money"></i>Cadastro de Bancos</h3>
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
                <div class="col-sm-2">
                  <label>Cód. Febraban</label>
                  <input class="form-control <?php echo form_status('cod_febraban'); ?>" type="text"  name="cod_febraban" maxlength="7" placeholder="Informe o código..." value="<?php echo set_form_value($editar,$form,'cod_febraban'); ?>">
                </div>
                <div class="col-sm-8">
                  <label>Descrição</label>
                  <input class="form-control <?php echo form_status('nome'); ?>" type="text"  name="nome" maxlength="75" placeholder="Informe a descrição..." value="<?php echo set_form_value($editar,$form,'nome'); ?>">
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