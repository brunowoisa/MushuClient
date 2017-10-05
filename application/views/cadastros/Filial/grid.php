<?php $this->load->view('include/top'); ?>
  <div class="panel">
    <div class="panel-header">
      <h3><i class="fa fa-database"></i> Filiais</h3>
    </div>
    <div class="panel-content">

      <?php $this->load->view('include/filtro_2_campos') ?>

      <div class="withScroll m-t-10" data-height="550">
        <div class="col-sm-12">
          <?php if (!$grid): ?>
            <div class="alert media fade in alert-warning">
              <p><strong>Nada Encontrado!</strong> Verifique os termos da busca e tente novamente.</p>
            </div>
          <?php endif ?>
          <?php foreach ($grid as $key): ?>
            <div class="row">
              <div class="panel bg-aero">
                <div class="panel-header">
                  <div class="row">
                    <div class="col-sm-9">
                      <h3><?php echo $key->id.' - '.$key->apelido; ?></h3>
                    </div>
                    <div class="col-sm-3">
                      <p class="pull-right">
                        <a href="<?php echo base_url(); ?>cadastros/Filial/editar/<?php echo $key->id; ?>/" class="btn btn-sm btn-primary" data-rel="tooltip" data-placement="left" data-original-title="Editar"><i class="fa fa-edit"></i></a>
                      </p>
                    </div>
                  </div>
                </div>
                <div class="panel-content" style="margin-top: -30px;">
                  <div class="row">
                    
                    <div class="col-sm-6">
                      <p>
                        <span class="bold">Razão Social:</span> <?php echo $key->razao_social; ?><br>
                        <span class="bold">CNPJ:</span> <?php echo $key->cnpj; ?><br>
                        <span class="bold">IE:</span> <?php echo $key->ie; ?><br>
                      </p>
                    </div>
                    <div class="col-sm-6">
                      <p>
                        <span class="bold">Telefone:</span> <?php echo $key->telefone1; ?><?php echo ($key->telefone2 != '')?' / '.$key->telefone2:''; ?><?php echo ($key->telefone3 != '')?' / '.$key->telefone3:''; ?><br>
                        <span class="bold">E-mail:</span> <?php echo $key->email; ?><br>
                        <span class="bold">Endereço:</span> <?php echo $key->endereco; ?>, <?php echo $key->numero; ?> - <?php echo $key->bairro; ?> - <?php echo $key->nome_cidade; ?> / <?php echo $key->uf_estado; ?> - <?php echo $key->xpais; ?><br>
                      </p>
                    </div>

                  </div>
                </div>
              </div>
            </div>
          <?php endforeach ?>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-12"><p class="pull-right"><small>Foram encontrados <?php echo count($grid); ?> resultados.</small></p></div>
      </div>


    </div>
  </div>
<?php $this->load->view('include/footer'); ?>
      