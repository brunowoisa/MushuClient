<?php $this->load->view('include/top'); ?>
  <div class="panel">
    <div class="panel-header">
      <h3><i class="fa fa-cubes"></i>Cadastro de Tabelas de Preço</h3>
    </div>
    <div class="panel-content">
      <form action="<?php echo $url_form; ?>" method="POST">


        <div class="tab_left">
          <ul class="nav nav-tabs nav-blue">
            <li class="active"><a href="#geral" data-toggle="tab">Geral</a></li>
            <?php if ($editar): ?>
              <li class=""><a href="#avancado" data-toggle="tab">Avançado</a></li>
            <?php endif ?>
          </ul>
          <div class="tab-content">

            <!-- Geral -->
            <div class="tab-pane fade active in" id="geral">
              <?php include('form-geral.php'); ?>
            </div>

            <!-- Avançado -->
            <div class="tab-pane fade in" id="avancado">
              <?php include('form-avancado.php'); ?>
            </div>

          </div>
        </div>

        <script>
          if ($('#tipo').val() == 'C' || $('#tipo').val() == 'M') {
            $('.esconde_tipo').hide();
          }
          
          $('#tipo').change(function() {
            tipo = $('#tipo').val();
            if(tipo == 'V'){
              $('.esconde_tipo').show();
            }
            else{
              $('.esconde_tipo').hide();
            }
          });
        </script> 
        
        <?php $this->load->view('include/botoes-form'); ?>
      </form>
    </div>
  </div>
<?php $this->load->view('include/footer'); ?>