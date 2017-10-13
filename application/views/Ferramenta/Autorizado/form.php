<?php $this->load->view('include/top'); ?>
  <div class="panel">
    <div class="panel-header">
      <h3><i class="fa fa-users"></i>Cadastro de Autorizados</h3>
    </div>
    <div class="panel-content">
      <form action="<?php echo $url_form; ?>" method="POST">


        <div class="tab_left">
          <ul class="nav nav-tabs nav-blue">
            <li class="active"><a href="#geral" data-toggle="tab">Geral</a></li>
            <?php if ($editar): ?>
              <li class=""><a href="#sistema" data-toggle="tab">Sistema</a></li>
            <?php endif ?>
          </ul>
          <div class="tab-content">

            <!-- Geral -->
            <div class="tab-pane fade in active" id="geral"> <?php include('form-geral.php') ?> </div>
            
            <?php if ($editar): ?>
              <!-- Sistema -->
              <div class="tab-pane fade in" id="sistema"> <?php include('form-sistema.php') ?> </div>
            <?php endif ?>

          </div>
        </div>

        
        <?php $this->load->view('include/botoes-form'); ?>
      </form>
    </div>
  </div>
<?php $this->load->view('include/footer'); ?>