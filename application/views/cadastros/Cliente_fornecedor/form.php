<?php $this->load->view('include/top'); ?>
  <div class="panel">
    <div class="panel-header">
      <h3><i class="fa fa-users"></i>Cadastro de Clientes e Fornecedores</h3>
    </div>
    <div class="panel-content">
      <form action="<?php echo $url_form; ?>" method="POST">

        <div class="tab_left">
          <ul class="nav nav-tabs nav-blue">
            <li class="active"><a href="#geral" data-toggle="tab">Geral</a></li>
            <?php if ($editar): ?>
              <li class=""><a href="#cobranca" data-toggle="tab">Cobrança</a></li>
              <li class=""><a href="#entrega" data-toggle="tab">Entrega</a></li>
              <li class=""><a href="#societario" data-toggle="tab">Societário</a></li>
              <li class=""><a href="#recebimento" data-toggle="tab">Recebimento</a></li>
            <?php endif ?>
          </ul>
          <div class="tab-content">
            <div class="tab-pane fade active in" id="geral"> <?php include('form-geral.php') ?> </div>
            <?php if ($editar): ?>
              <div class="tab-pane fade in" id="cobranca"> <?php include('form-cobranca.php') ?> </div>
              <div class="tab-pane fade in" id="entrega"> <?php include('form-entrega.php') ?> </div>
              <div class="tab-pane fade in" id="societario"> <?php include('form-societario.php') ?> </div>
              <div class="tab-pane fade in" id="recebimento"> <?php include('form-recebimento.php') ?> </div>
            <?php endif ?>
          </div>
        </div>

        
        <?php $this->load->view('include/botoes-form'); ?>
      </form>
    </div>
  </div>

  <?php $this->load->view('include/script_cep.php'); ?>
  <?php $this->load->view('include/script_cnpj.php'); ?>
  <?php $this->load->view('include/script_modal_buscas.php'); ?>
  <script>
    <?php if (!$editar): ?>
      $('#cpais').val('1058'); // Define Brasil como país padrão
      preenche_cpais('cpais','xpais');
      $('#id_cidade_geral').val('4125506'); // Define São José dos Pinhais como cidade padrão
      preenche_cidade('id_cidade_geral','nome_cidade_geral');
    <?php else: ?>
      preenche_cpais('cpais','xpais');
      preenche_cpais('cpais_cob','xpais_cob');
      preenche_cpais('cpais_ent','xpais_ent');
      preenche_cidade('id_cidade_geral','nome_cidade_geral');
      preenche_cidade('id_cidade_cob','nome_cidade_cob');
      preenche_cidade('id_cidade_ent','nome_cidade_ent');
    <?php endif ?>
    
    $('.pessoa_fisica').hide();
    $('.pessoa_juridica').hide();
    $('.pessoa_extrangeira').hide();

    if($('#pessoa').val() == 'F'){
      $('.pessoa_fisica').show();
    }
    else if($('#pessoa').val() == 'J'){
      $('#box_pessoa').removeClass('col-sm-4').removeClass('col-sm-2').addClass('col-sm-2');
      $('.pessoa_juridica').show();
    }
    else if($('#pessoa').val() == 'E'){
      $('.pessoa_extrangeira').show();
    }

    $('#ie').hide();
    if($('#indicador_ie').val() == 'C' || $('#indicador_ie').val() == 'N'){
      $('#ie').show();
    }

    $('#pessoa').change(function() {
      tipo = $('#pessoa').val();
      if(tipo == "F"){
        $('.pessoa_fisica').show();
        $('.pessoa_juridica').hide();
        $('.pessoa_extrangeira').hide();
        $('#box_pessoa').removeClass('col-sm-4').removeClass('col-sm-2').addClass('col-sm-4');
      }
      else if(tipo == "J"){
        $('.pessoa_fisica').hide();
        $('.pessoa_juridica').show();
        $('.pessoa_extrangeira').hide();
        $('#box_pessoa').removeClass('col-sm-4').removeClass('col-sm-2').addClass('col-sm-2');
      }
      else if(tipo == "E"){
        $('.pessoa_fisica').hide();
        $('.pessoa_juridica').hide();
        $('.pessoa_extrangeira').show();
        $('#box_pessoa').removeClass('col-sm-4').removeClass('col-sm-2').addClass('col-sm-4');
      }
      else{
        $('.pessoa_fisica').hide();
        $('.pessoa_juridica').hide();
        $('.pessoa_extrangeira').hide();
        $('#box_pessoa').removeClass('col-sm-4').removeClass('col-sm-2').addClass('col-sm-4');
      }
    });

    $('#indicador_ie').change(function() {
      var indicador = $('#indicador_ie').val();
      if(indicador == 'I'){
        $('#ie').hide();
      }
      else{
        $('#ie').show();
      }
    });


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

    /**
     * Função que verifica se a tecla <enter> foi pressionada dentro do input #cpais_cob. Caso positivo, monta a modal de busca para países
     * @param  event keypress
     * @return boolean
     */
    $('#cpais_cob').keypress (function(e){
      if (e.which == 13){
        $('#modal_buscas_titulo').text('Busca de Países');
        $('#modal_busca_funcao_retorno').val('1');
        $('#modal_busca_campo_origem').val('cpais_cob');
        $('#modal_busca_campo_retorno').val('xpais_cob');
        $('#modal_buscas').modal('show');
        $('#modal_busca_filtro1').val('');
        $('#modal_busca_filtro2').val('');
        modal_busca_filtro();
        return false;
      }
      return true;
    });

    /**
     * Função que verifica se a tecla <enter> foi pressionada dentro do input #id_cidade_cob. Caso positivo, monta a modal de busca para cidades
     * @param  event keypress
     * boolean
     */
    $('#id_cidade_cob').keypress (function(e){
      if (e.which == 13){
        $('#modal_buscas_titulo').text('Busca de Cidades');
        $('#modal_busca_funcao_retorno').val('2');
        $('#modal_busca_campo_origem').val('id_cidade_cob');
        $('#modal_busca_campo_retorno').val('nome_cidade_cob');
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