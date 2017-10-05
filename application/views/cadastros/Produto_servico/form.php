<?php $this->load->view('include/top'); ?>
  <div class="panel">
    <div class="panel-header">
      <h3><i class="fa fa-cubes"></i>Cadastro de Produtos e Serviços</h3>
    </div>
    <div class="panel-content">
      <form action="<?php echo $url_form; ?>" method="POST">


        <div class="tab_left">
          <ul class="nav nav-tabs nav-blue">
            <li class="active"><a href="#geral" data-toggle="tab">Geral</a></li>
            <li class=""><a href="#adicionais" data-toggle="tab">Adicionais</a></li>
            <li class=""><a href="#precos" data-toggle="tab">Preços</a></li>
            <li class=""><a href="#estoque" data-toggle="tab">Estoque</a></li>
          </ul>
          <div class="tab-content">

            <!-- Geral -->
            <div class="tab-pane fade active in" id="geral" style="min-height: 100%;">
              <?php include('form-geral.php'); ?>
            </div>

            <!-- Adicionais -->
            <div class="tab-pane fade in" id="adicionais" style="min-height: 100%;">
              <?php include('form-adicionais.php'); ?>
            </div>

            <!-- Preços -->
            <div class="tab-pane fade in" id="precos" style="min-height: 100%;">
              <?php include('form-precos.php'); ?>
            </div>

            <!-- Estoque -->
            <div class="tab-pane fade in" id="estoque" style="min-height: 100%;">
              <?php include('form-estoque.php'); ?>
            </div>

          </div>
        </div>

        
        <?php $this->load->view('include/botoes-form'); ?>
      </form>
    </div>
  </div>
<?php $this->load->view('include/footer'); ?>