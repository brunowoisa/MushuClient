<?php $this->load->view('include/top'); ?>
  <div class="panel">
    <div class="panel-header">
      <h3><i class="fa fa-users"></i>Clientes e Fornecedores</h3>
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
                      <h3><?php echo $key->id.' - '.$key->nome; ?></h3>
                    </div>
                    <div class="col-sm-3">
                      <p class="pull-right">
                        <a href="<?php echo base_url(); ?>cadastros/Cliente_fornecedor/editar/<?php echo $key->id; ?>/" class="btn btn-sm btn-primary" data-rel="tooltip" data-placement="left" data-original-title="Editar"><i class="fa fa-edit"></i></a>
                      </p>
                    </div>
                  </div>
                </div>
                <div class="panel-content" style="margin-top: -30px;">
                  <div class="row">
                    
                    <div class="col-sm-12">
                      <p>
                        <span class="bold">Endereço: </span><?php echo "{$key->endereco}, {$key->numero} - {$key->bairro} - {$key->nome_cidade} / {$key->uf_estado} - {$key->xpais}"; ?>
                      </p>
                    </div>
                    <div class="col-sm-3">
                      <p>
                        <span class="bold">Telefone 1: </span><?php echo $key->telefone_fixo1; ?>
                      </p>
                    </div>
                    <div class="col-sm-3">
                      <p>
                        <span class="bold">Telefone 2: </span><?php echo $key->telefone_fixo2; ?>
                      </p>
                    </div>
                    <div class="col-sm-3">
                      <p>
                        <span class="bold">Celular 1: </span><?php echo $key->telefone_celular1; ?>
                      </p>
                    </div>
                    <div class="col-sm-3">
                      <p>
                        <span class="bold">Celular 2: </span><?php echo $key->telefone_celular2; ?>
                      </p>
                    </div>
                    <div class="col-sm-6">
                      <p>
                        <span class="bold">Tipo:</span> 
                        <?php echo ($key->cliente)?'<i class="fa fa-user c-blue" data-rel="tooltip" data-placement="top" data-original-title="Cliente"></i> Cliente':''; ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <?php echo ($key->fornecedor)?'<i class="fa fa-user c-green" data-rel="tooltip" data-placement="top" data-original-title="Fornecedor"></i> Fornecedor':''; ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <?php echo ($key->transportador)?'<i class="fa fa-user c-orange" data-rel="tooltip" data-placement="top" data-original-title="Transportador"></i> Transportador':''; ?><br>
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
      