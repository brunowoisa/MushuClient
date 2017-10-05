<?php $this->load->view('include/top'); ?>
  <div class="panel">
    <div class="panel-header">
      <h3><i class="fa fa-calculator"></i>Alíquotas e Impostos</h3>
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
                <div class="col-sm-3">
                  <label>ICMS<sup>%</sup></label>
                  <input class="form-control <?php echo form_status('icms'); ?> casa_decimal_2" type="text"  name="icms" maxlength="40" placeholder="Informe a alíquota..." value="<?php echo set_form_value($editar,$form,'icms'); ?>">
                </div>
                <div class="col-sm-3">
                  <label>Simples Nacional<sup>%</sup></label>
                  <input class="form-control <?php echo form_status('simples_nacional'); ?> casa_decimal_2" type="text"  name="simples_nacional" maxlength="40" placeholder="Informe a alíquota..." value="<?php echo set_form_value($editar,$form,'simples_nacional'); ?>">
                </div>
                <div class="col-sm-3">
                  <label>IPI<sup>%</sup></label>
                  <input class="form-control <?php echo form_status('ipi'); ?> casa_decimal_2" type="text"  name="ipi" maxlength="40" placeholder="Informe a alíquota..." value="<?php echo set_form_value($editar,$form,'ipi'); ?>">
                </div>
                <div class="col-sm-3">
                  <label>ISSQN<sup>%</sup></label>
                  <input class="form-control <?php echo form_status('issqn'); ?> casa_decimal_2" type="text"  name="issqn" maxlength="40" placeholder="Informe a alíquota..." value="<?php echo set_form_value($editar,$form,'issqn'); ?>">
                </div>
                <div class="col-sm-3">
                  <label>Despesas Fixas<sup>%</sup></label>
                  <input class="form-control <?php echo form_status('despesa_fixa'); ?> casa_decimal_2" type="text"  name="despesa_fixa" maxlength="40" placeholder="Informe a alíquota..." value="<?php echo set_form_value($editar,$form,'despesa_fixa'); ?>">
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