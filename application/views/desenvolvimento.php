<?php $this->load->view('include/top'); ?>
  <div class="header">
    <h2><i class="fa fa-cogs"></i> Ferramenta em <strong>Desenvolvimento</strong></h2>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="panel">
        <div class="panel-header">
          <h3><i class="fa <?php echo $icone ?>"></i> <strong><?php echo $ferramenta ?></strong></h3>
        </div>
        <div class="panel-content widget-news">
          <div class="row">
            <div class="col-sm-12">
              <br>
              <p class="m-l-20"><i class="fa fa-angle-right"></i> Esta ferramenta econtra-se em desenvolvimento, e logo está disponível para o uso.</p>
              <br>
              <p class="m-l-20"><i class="fa fa-angle-right"></i> <?php echo $descricao; ?></p>
              <br>
              <p class="m-l-20"><i class="fa fa-angle-right"></i> Aguarde mais novidades em breve!</p>
              <br>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php $this->load->view('include/footer'); ?>
      