<?php $this->load->view('include/top'); ?>
  <div class="panel">
    <div class="panel-header">
      <h3><i class="fa fa-database"></i>Cadastro de Filiais</h3>
    </div>
    <div class="panel-content">
      <form action="<?php echo $url_form; ?>" method="POST">



        <div class="tab_left">
          <ul class="nav nav-tabs nav-blue">
            <li class="active"><a href="#tab3_1" data-toggle="tab">Geral</a></li>
            <?php if ($editar): ?>
              <li class=""><a href="#tab3_2" data-toggle="tab">Personalizar</a></li>
            <?php endif ?>
          </ul>
          <div class="tab-content">

            <div class="tab-pane fade active in" id="tab3_1">
              
              <div class="row">
                <div class="col-sm-2">
                  <label>Código</label>
                  <input class="form-control bg-aero" type="text" value="<?php echo set_form_value($editar,$form,'id'); ?>" disabled  placeholder="Automático">
                </div>
                <div class="col-sm-4">
                  <label>CNPJ</label>
                  <input class="form-control <?php echo form_status('cnpj'); ?>" id="cnpj_geral" type="text"  name="cnpj" maxlength="18" data-mask="99.999.999/9999-99" placeholder="Informe o CNPJ..." onchange="busca_cnpj('geral');" value="<?php echo set_form_value($editar,$form,'cnpj'); ?>">
                </div>
                <div class="col-sm-3">
                  <label>IE</label>
                  <input class="form-control <?php echo form_status('ie'); ?>" type="text"  name="ie" maxlength="20" placeholder="Informe a Inscrição Estadual..." value="<?php echo set_form_value($editar,$form,'ie'); ?>">
                </div>
                <div class="col-sm-3">
                  <label>IM</label>
                  <input class="form-control <?php echo form_status('im'); ?>" type="text"  name="im" maxlength="20" placeholder="Informe a Inscrição Municipal..." value="<?php echo set_form_value($editar,$form,'im'); ?>">
                </div>
                <div class="col-sm-4">
                  <label>Razão Social</label>
                  <input class="form-control <?php echo form_status('razao_social'); ?>" id="razao_social_geral" type="text" name="razao_social" maxlength="155" placeholder="Informe a Razão Social..." value="<?php echo set_form_value($editar,$form,'razao_social'); ?>">
                </div>
                <div class="col-sm-4">
                  <label>Nome Fantasia</label>
                  <input class="form-control <?php echo form_status('fantasia'); ?>" id="fantasia_geral" type="text" name="fantasia" maxlength="155" placeholder="Informe o Nome Fantasia..." value="<?php echo set_form_value($editar,$form,'fantasia'); ?>">
                </div>
                <div class="col-sm-4">
                  <label>Apelido</label>
                  <input class="form-control <?php echo form_status('apelido'); ?>" type="text" name="apelido" maxlength="45" placeholder="Informe o Apelido..." value="<?php echo set_form_value($editar,$form,'apelido'); ?>">
                </div>
                <div class="col-sm-4">
                  <label>Telefone Fixo</label>
                  <input class="form-control <?php echo form_status('telefone1'); ?>" type="text" name="telefone1" maxlength="15" data-mask="(99)9999-9999" placeholder="(99)9999-9999"  value="<?php echo set_form_value($editar,$form,'telefone1'); ?>">
                </div>
                <div class="col-sm-4">
                  <label>Telefone Fax</label>
                  <input class="form-control <?php echo form_status('telefone2'); ?>" type="text" name="telefone2" maxlength="15" data-mask="(99)9999-9999" placeholder="(99)9999-9999"  value="<?php echo set_form_value($editar,$form,'telefone2'); ?>">
                </div>
                <div class="col-sm-4">
                  <label>Telefone Móvel</label>
                  <input class="form-control <?php echo form_status('telefone3'); ?>" type="text" name="telefone3" maxlength="15" data-mask="(99)99999-9999" placeholder="(99)99999-9999"  value="<?php echo set_form_value($editar,$form,'telefone3'); ?>">
                </div>
                <div class="col-sm-2">
                  <label>CEP</label>
                  <input class="form-control <?php echo form_status('cep'); ?>" id="cep_geral" onchange="busca_cep('geral');" type="text" name="cep" maxlength="9" data-mask="99999-999" value="<?php echo set_form_value($editar,$form,'cep'); ?>">
                </div>
                <div class="col-sm-5">
                  <label>Endereço</label>
                  <input class="form-control <?php echo form_status('endereco'); ?>" id="endereco_geral" type="text" name="endereco" maxlength="45" value="<?php echo set_form_value($editar,$form,'endereco'); ?>">
                </div>
                <div class="col-sm-2">
                  <label>Número</label>
                  <input class="form-control <?php echo form_status('numero'); ?>" id="numero_geral" type="text" name="numero" maxlength="7" value="<?php echo set_form_value($editar,$form,'numero'); ?>">
                </div>
                <div class="col-sm-3">
                  <label>Complemento</label>
                  <input class="form-control <?php echo form_status('complemento'); ?>" type="text" name="complemento" maxlength="15" value="<?php echo set_form_value($editar,$form,'complemento'); ?>">
                </div>
                <div class="col-sm-3">
                  <label>Bairro</label>
                  <input class="form-control <?php echo form_status('bairro'); ?>"  id="bairro_geral" type="text" name="bairro" maxlength="45" value="<?php echo set_form_value($editar,$form,'bairro'); ?>">
                </div>
                <div class="col-sm-2">
                  <label>Cidade</label>
                  <input class="form-control <?php echo form_status('id_cidade'); ?>" id="id_cidade_geral" onchange="preenche_cidade('id_cidade_geral','nome_cidade_geral');" type="text" name="id_cidade" maxlength="10" value="<?php echo set_form_value($editar,$form,'id_cidade'); ?>">
                </div>
                <div class="col-sm-3">
                  <label></label>
                  <input class="form-control bg-aero"  id="nome_cidade_geral" type="text" value="<?php echo set_form_value($editar,$form,'cidade'); ?>" readonly>
                </div>
                <div class="col-sm-2">
                  <label>País</label>
                  <input class="form-control <?php echo form_status('cpais'); ?>" id="cpais" onchange="preenche_cpais('cpais','xpais');" type="text" name="cpais" value="<?php echo set_form_value($editar,$form,'cpais'); ?>">
                </div>
                <div class="col-sm-2">
                  <label></label>
                  <input class="form-control bg-aero" id="xpais" type="text" value="<?php echo set_form_value($editar,$form,'xpais'); ?>" readonly>
                </div>
                <div class="col-sm-6">
                  <label>E-mail</label>
                  <input class="form-control <?php echo form_status('email'); ?>" id="email_geral" type="text"  name="email" maxlength="95" placeholder="Informe o E-mail..." value="<?php echo set_form_value($editar,$form,'email'); ?>">
                </div>
                <div class="col-sm-6">
                  <label>Site</label>
                  <input class="form-control <?php echo form_status('site'); ?>" type="text"  name="site" maxlength="95" placeholder="Informe o Site..." value="<?php echo set_form_value($editar,$form,'site'); ?>">
                </div>
                
              </div>

            </div>
            <div class="tab-pane fade" id="tab3_2">
              <h4>"SOONER OR LATER, THOSE WHO WIN ARE THOSE WHO THINK THEY CAN."</h4>
              <p>Qui photo booth letterpress, commodo enim craft beer mlkshk aliquip jean shorts ullamco ad vinyl cillum PBR. Vegan fanny pack odio cillum wes anderson 8-bit, sustainable jean shorts beard ut DIY ethical culpa terry richardson biodiesel. Art party scenester stumptown, tumblr butcher vero sint qui sapiente accusamus tattooed echo park.</p>
            </div>
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
<script>
  // Ao Modificar o campo CNPJ
  // $('#cnpj').blur(function() {
  //   var cnpj = $('#cnpj').val();
  //   cnpj = cnpj.replace(".", "");
  //   cnpj = cnpj.replace(".", "");
  //   cnpj = cnpj.replace("/", "");
  //   cnpj = cnpj.replace("-", "");
  //   if(cnpj != '' && cnpj != '______________'){
  //     console.log("Requisitando dados do CNPJ informado: "+cnpj+"...");
  //     $.ajax({
  //       url: 'https://www.receitaws.com.br/v1/cnpj/'+cnpj,
  //       type: 'POST',
  //       dataType: 'jsonp',
  //     })
  //     .done(function(data) {
  //       console.log("Dados do CNPJ recebidos, processando resultados...");
  //       $('#razao_social').val(data.nome);
  //       $('#fantasia').val(data.fantasia);
  //       $('#email').val(data.email);
  //       $('#cep').val(data.cep.replace(".", ""));
  //       $('#numero').val(data.numero);
  //       busca_cep();
  //       console.log("Resultados do CNPJ apresentados.");
  //     })
  //   }
  // });
  // // Ao Modificar o campo CEP
  // $('#cep').blur(function() {
  //   busca_cep();
  // });
  // //Realiza a busca do CEP
  // function busca_cep(){
  //   var cep = $('#cep').val();
  //   cep = cep.replace("-", "");
  //   if(cep != '' && cep != '________'){
  //     console.log("Requisitando dados do CEP informado: "+cep+"...");
  //     $.ajax({
  //       url: 'http://www.viacep.com.br/ws/'+cep+'/json/',
  //       type: 'POST',
  //       dataType: 'jsonp',
  //     })
  //     .done(function(data) {
  //       console.log("Dados do CEP recebidos, processando resultados...");
  //       $('#endereco').val(data.logradouro);
  //       $('#bairro').val(data.bairro);
  //       $('#cidade').val(data.localidade);
  //       $('#cidade_ibge').val(data.ibge);
  //       $('#estado').val(data.uf);
  //       console.log("Resultados do CEP apresentados.");
  //     })
  //   }
  // }

</script>