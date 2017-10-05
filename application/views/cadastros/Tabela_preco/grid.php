<?php $this->load->view('include/top'); ?>
  <div class="panel">
    <div class="panel-header">
      <h3><i class="fa fa-cubes"></i>Tabelas de Preço</h3>
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
                      <h3><?php echo $key->id.' - '.$key->descricao; ?></h3>
                    </div>
                    <div class="col-sm-3">
                      <p class="pull-right">
                        <a href="<?php echo base_url(); ?>cadastros/Tabela_preco/editar/<?php echo $key->id; ?>/" class="btn btn-sm btn-primary" data-rel="tooltip" data-placement="left" data-original-title="Editar"><i class="fa fa-edit"></i></a>
                      </p>
                    </div>
                  </div>
                </div>
                <div class="panel-content" style="margin-top: -30px;">
                  <div class="row">
                    
                    <div class="col-sm-4">
                      <p>
                        <span class="bold">Ativo:</span> <?php echo ($key->ativo=='S')?'Sim':'Não'; ?><br>
                        <span class="bold">Tipo:</span> <?php if($key->tipo=='V'){echo 'Venda';}elseif($key->tipo=='C'){echo 'Custo';}else{ echo 'Custo Médio';} ?><br>
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
      