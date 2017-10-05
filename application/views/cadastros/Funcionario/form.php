<?php $this->load->view('include/top'); ?>
  <div class="panel">
    <div class="panel-header">
      <h3><i class="fa fa-user"></i>Cadastro de Funcionários</h3>
    </div>
    <div class="panel-content">
      <form action="<?php echo $url_form; ?>" method="POST" enctype="multipart/form-data">



        <div class="tab_left">
          <ul class="nav nav-tabs nav-blue">
            <li class="active"><a href="#geral" data-toggle="tab">Geral</a></li>
            <?php if ($editar): ?>
              <li class=""><a href="#documentos" data-toggle="tab">Documentos</a></li>
              <li class=""><a href="#pessoal" data-toggle="tab">Pessoal</a></li>
              <li class=""><a href="#empresa" data-toggle="tab">Empresa</a></li>
              <li class=""><a href="#pagamento" data-toggle="tab">Pagamento</a></li>
              <li class=""><a href="#sistema" data-toggle="tab">Sistema</a></li>
            <?php endif ?>
          </ul>
          <div class="tab-content">

            <!-- Geral -->
            <div class="tab-pane fade active in" id="geral" style="min-height: 100%;">
              <?php include('form-geral.php'); ?>
            </div>

            <?php if ($editar): ?>
              <!-- Documentos -->
              <div class="tab-pane fade in" id="documentos" style="min-height: 100%;">
                <?php include('form-documentos.php'); ?>
              </div>

              <!-- Pessoal -->
              <div class="tab-pane fade in" id="pessoal" style="min-height: 100%;">
                <?php include('form-pessoal.php'); ?>
              </div>

              <!-- Empresa -->
              <div class="tab-pane fade in" id="empresa" style="min-height: 100%;">
                <?php include('form-empresa.php'); ?>
              </div>

              <!-- Pagamento -->
              <div class="tab-pane fade in" id="pagamento" style="min-height: 100%;">
                <?php include('form-pagamento.php'); ?>
              </div>

              <!-- Sistema -->
              <div class="tab-pane fade in" id="sistema" style="min-height: 100%;">
                <?php include('form-sistema.php'); ?>
              </div>
            <?php endif ?>

          </div>
        </div>
        
        <?php $this->load->view('include/botoes-form'); ?>
      </form>
    </div>
  </div>
  <?php $this->load->view('include/script_cep.php'); ?>
  <?php $this->load->view('include/script_modal_buscas.php'); ?>
  <script>
    <?php if (!$editar): ?>
      $('#cpais').val('1058'); // Define Brasil como país padrão
      preenche_cpais('cpais','xpais');
      $('#id_cidade_geral').val('4125506'); // Define São José dos Pinhais como cidade padrão
      preenche_cidade('id_cidade_geral','nome_cidade_geral');
    <?php else: ?>
      preenche_cpais('cpais','xpais');
      preenche_cidade('id_cidade_geral','nome_cidade_geral');
    <?php endif ?>
    
    /**
     * Função que verifica se a tecla <enter> foi pressionada dentro do input #cpais. Caso positivo, monta a modal de busca para países
     * @param  event keypress
     * @return boolean
     */
    $('#cpais').keypress (function(e){
      if (e.which == 13){
        $('#modal_buscas_titulo').text('Busca de Países');
        $('#modal_busca_funcao_retorno').val('1');
        $('#modal_busca_campo_origem').val('cpais');
        $('#modal_busca_campo_retorno').val('xpais');
        $('#modal_buscas').modal('show');
        $('#modal_busca_filtro1').val('');
        $('#modal_busca_filtro2').val('');
        modal_busca_filtro();
        return false;
      }
      return true;
    });

    /**
     * Função que verifica se a tecla <enter> foi pressionada dentro do input #id_cidade. Caso positivo, monta a modal de busca para cidades
     * @param  event keypress
     * boolean
     */
    $('#id_cidade_geral').keypress (function(e){
      if (e.which == 13){
        $('#modal_buscas_titulo').text('Busca de Cidades');
        $('#modal_busca_funcao_retorno').val('2');
        $('#modal_busca_campo_origem').val('id_cidade_geral');
        $('#modal_busca_campo_retorno').val('nome_cidade_geral');
        $('#modal_buscas').modal('show');
        $('#modal_busca_filtro1').val('');
        $('#modal_busca_filtro2').val('');
        modal_busca_filtro();
        return false;
      }
      return true;
    });
  </script>
<?php $this->load->view('include/footer'); ?>