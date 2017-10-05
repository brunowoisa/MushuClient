<script>
  /**************************
   * Modal de Busca de Países
   **************************/
  /**
   * Função que faz busca do nome do pais via Ajax
   * @param  input #cpais
   * @return input #xpais
   */
  function preenche_cpais(campo_origem, campo_destino){
    var cpais = $('#'+campo_origem).val();
    if(cpais != ''){
      $.ajax({
        url: '<?php echo base_url(); ?>/Ajax/get_pais/'+cpais,
        type: 'post',
        dataType: 'json'
      })
      .done(function(data) {
        $('#'+campo_destino).val(data.xpais);
      })
      .fail(function() {
        sweetAlert("Erro!", "Um erro inesperado aconteceu. Contate a administração.", "warning");
      })
    }
    else{
      $('#'+campo_destino).val('');
    }
  }
  /**
   * Função que preenche o input #cpais com o valor do parametro cpais e esconde #modal_buscas
   * @param  int cpais
   * @return preenche_cpais();
   */
  function selecionar_pais(cpais){
    var campo_origem = $('#modal_busca_campo_origem').val();
    $('#'+campo_origem).val(cpais);
    $('#modal_buscas').modal('hide');
    var campo_retorno = $('#modal_busca_campo_retorno').val();
    preenche_cpais(campo_origem,campo_retorno);
  }
  /**
   * Função que realiza a montagem da lista de resultados
   * @param  {[type]} filtro1 [description]
   * @param  {[type]} filtro2 [description]
   * @return {[type]}         [description]
   */
  var modal_lista_resultado_pais = function modal_lista_resultado_pais(data){
    var append = '';
    for (var i = 0; i <= data.length - 1; i++) {
      append += '<div class="row"> <div class="panel bg-aero"> <div class="panel-header"> <div class="row"> <div class="col-sm-9"> <h3>'+data[i].cpais+' - '+data[i].xpais+'</h3> </div> <div class="col-sm-3"> <p class="pull-right"> <a onclick="selecionar_pais('+data[i].cpais+')" class="btn btn-sm btn-primary" data-rel="tooltip" data-placement="left" data-original-title="Selecionar"><i class="fa fa-edit"></i></a> </p> </div> </div> </div> </div> </div>';
    }
    if (data.length == 0) {
      var append = '<div class="alert media fade in alert-warning"> <p><strong>Nada Encontrado!</strong> Verifique os termos da busca e tente novamente.</p> </div>';
    }
    $( "#modal_buscas_lista" ).html('');
    $( "#modal_buscas_lista" ).append( append );
  }

  /**************************
   * Modal de Busca de Cidades
   **************************/
  /**
   * Função que faz busca do nome da cidade e uf via Ajax
   * @param  input #id_cidade
   * @return input #nome_cidade
   */
  function preenche_cidade(campo_origem, campo_destino){
    var ibge_cidade = $('#'+campo_origem).val();
    if(ibge_cidade != ''){
      $.ajax({
        url: '<?php echo base_url(); ?>/Ajax/get_cidade/'+ibge_cidade,
        type: 'post',
        dataType: 'json'
      })
      .done(function(data) {
        $('#'+campo_destino).val(data.nome_cidade+' / '+data.uf_estado);
      })
      .fail(function() {
        sweetAlert("Erro!", "Um erro inesperado aconteceu. Contate a administração.", "warning");
      })
    }
    else{
      $('#'+campo_destino).val('');
    }
  }
  /**
   * Função que preenche o input #cpais com o valor do parametro cpais e esconde #modal_buscas
   * @param  int cpais
   * @return preenche_cidade();
   */
  function selecionar_cidade(ibge_cidade){
    $('#modal_buscas').modal('hide');
    var campo_origem = $('#modal_busca_campo_origem').val();
    $('#'+campo_origem).val(ibge_cidade);
    $('#modal_buscas').modal('hide');
    var campo_retorno = $('#modal_busca_campo_retorno').val();
    preenche_cidade(campo_origem,campo_retorno);
  }
  /**
   * Função que realiza a montagem da lista de resultados
   * @param  {[type]} filtro1 [description]
   * @param  {[type]} filtro2 [description]
   * @return {[type]}         [description]
   */
   var modal_lista_resultado_cidade = function modal_lista_resultado_cidade(data){
    var append = '';
    for (var i = 0; i <= data.length - 1; i++) {
      append += '<div class="row"> <div class="panel bg-aero"> <div class="panel-header"> <div class="row"> <div class="col-sm-9"> <h3>'+data[i].ibge_cidade+' - '+data[i].uf_estado+' - '+data[i].nome_cidade+'</h3> </div> <div class="col-sm-3"> <p class="pull-right"> <a onclick="selecionar_cidade('+data[i].ibge_cidade+')" class="btn btn-sm btn-primary" data-rel="tooltip" data-placement="left" data-original-title="Selecionar"><i class="fa fa-edit"></i></a> </p> </div> </div> </div> </div> </div>';
    }
    if (data.length == 0) {
      var append = '<div class="alert media fade in alert-warning"> <p><strong>Nada Encontrado!</strong> Verifique os termos da busca e tente novamente.</p> </div>';
    }
    $( "#modal_buscas_lista" ).html('');
    $( "#modal_buscas_lista" ).append( append );
  }




  /**
   * Função que seleciona a função de busca corretamente
   * @return function
   */
  function modal_busca_filtro(){
    var funcao = $('#modal_busca_funcao_retorno').val();
    var filtro1 = $('#modal_busca_filtro1').val();
    var filtro2 = $('#modal_busca_filtro2').val();
    switch(funcao) {
      case '1':
        var funcao_retorno = modal_lista_resultado_pais;
        var url_ajax = '<?php echo base_url(); ?>Ajax/busca_paises/'+filtro1+'/'+filtro2;
        break;

      case '2':
        var funcao_retorno = modal_lista_resultado_cidade;
        var url_ajax = '<?php echo base_url(); ?>Ajax/busca_cidades/'+filtro1+'/'+filtro2;
        break;
    }
    $.ajax({
      url: url_ajax,
      type: 'post',
      dataType: 'json'
    })
    .done(function(data) {
      funcao_retorno(data);
    })
    .fail(function() {
      sweetAlert("Atenção!", "Erro ao carregar lista. Contate a administração.", "warning");
    })
    $('#modal_busca_filtro1').focus();
  }
</script>

<!-- Modal de buscas para campos de formulários -->
<div class="modal fade" id="modal_buscas" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="icons-office-52"></i></button>
        <h4 class="modal-title" id="modal_buscas_titulo"></h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <input type="hidden" id="modal_busca_funcao_retorno" value="">
          <input type="hidden" id="modal_busca_campo_retorno" value="">
          <input type="hidden" id="modal_busca_campo_origem" value="">
          <div class="col-sm-4">
            <input type="text" id="modal_busca_filtro1" class="form-control input-sm" placeholder="Pesquisar..." value="">
          </div>
          <div class="col-sm-4">
            <input type="text" id="modal_busca_filtro2" class="form-control input-sm" placeholder="Termos adicionais..." value="">
          </div>
          <div class="col-sm-2">
            <butto onclick="modal_busca_filtro();" class="btn btn-sm btn-block btn-info btn-transparent"><i class="fa fa-search"></i> Filtrar</button>
          </div>
          <div class="col-sm-2">
            <button onclick="modal_busca_limpa_filtro();" class="btn btn-sm btn-block btn-dark btn-transparent"><i class="fa fa-search-minus"></i> Limpar Filtro</button>
          </div>
        </div>

        <script>
          function modal_busca_limpa_filtro(){
            $('#modal_busca_filtro1').val('');
            $('#modal_busca_filtro2').val('');
            modal_busca_filtro();
          }
          $('#modal_busca_filtro1').keypress (function(e){
            if (e.which == 13){
              modal_busca_filtro();
              return false;
            }
            return true;
          });
          $('#modal_busca_filtro2').keypress (function(e){
            if (e.which == 13){
              modal_busca_filtro();
              return false;
            }
            return true;
          });
          $('#modal_buscas').on('shown.bs.modal', function () {
            $('#modal_busca_filtro1').focus();
          })
        </script>

        <div class="withScroll m-t-10" data-height="550">
          <div class="col-sm-12" id="modal_buscas_lista">

            <!-- Aqui será criada a lista de itens -->

          </div>
        </div>

      </div>
    </div>
  </div>
</div>