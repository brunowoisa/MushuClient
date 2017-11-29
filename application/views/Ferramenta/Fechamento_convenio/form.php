<?php $this->load->view('include/top'); ?>
  <div class="panel">
    <div class="panel-header">
      <h3><i class="fa fa-star"></i>Fechamentos</h3>
    </div>
    <div class="panel-content">
      <form action="<?php echo $url_form; ?>" method="POST" enctype="multipart/form-data">

          <div class="row">
            <div class="col-sm-12" style="text-align: center;">
              <h2 class="c-blue"> Total a ser pago: R$ <span id="valor_total">0,00</span></h2>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-3">
              <label>Competência</label>
              <input class="form-control" data-mask="99/9999" type="text" maxlength="45" value="<?php echo set_form_value($editar,$form,'competencia'); ?>" disabled>
            </div>
            <div class="col-sm-3">
              <label class="c-green"><i class="fa fa-plus-circle"></i>Valor Produtos <sup>R$</sup></label>
              <input class="form-control casa_decimal_2" type="text" id="valor_produtos" maxlength="40" value="<?php echo set_form_value($editar,$form,'valor_produtos'); ?>" disabled>
            </div>
            <div class="col-sm-3">
              <label class="c-green"><i class="fa fa-plus-circle"></i>Valor Serviços <sup>R$</sup></label>
              <input class="form-control casa_decimal_2" type="text" id="valor_servicos" maxlength="40" value="<?php echo set_form_value($editar,$form,'valor_servicos'); ?>" disabled>
            </div>
            <div class="col-sm-3">
              <label class="c-red"><i class="fa fa-minus-circle"></i>Valor ISS Retido <sup>R$</sup></label>
              <input class="form-control casa_decimal_2" type="text" id="valor_iss_retido" maxlength="40" value="<?php echo set_form_value($editar,$form,'valor_iss_retido'); ?>" disabled>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-12">
              <label>Observações</label>
              <textarea class="form-control" rows="5" disabled><?php echo set_form_value($editar,$form,'observacoes'); ?></textarea>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-12 m-t-20">
              <table class="table table-hover table-striped">
                <thead>
                  <tr>
                    <th>Arquivo</th>
                    <th style="width: 120px; text-align: center;">Download</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($form_fechamento_arquivo as $arquivo): ?>
                    <?php if ($arquivo->status == '1'): ?>
                      <tr>
                        <td><?php echo $arquivo->arquivo; ?></td>
                        <td style="text-align: center;"><a href="<?php echo $diretorio.$arquivo->arquivo; ?>" target="_blank" class="btn btn-primary btn-square btn-sm"><i class="fa fa-cloud-download"></i></a></td>
                      </tr>
                    <?php endif ?>
                  <?php endforeach ?>
                </tbody>
              </table>
            </div>

          </div>
          <div class="row">
            <div class="col-sm-12">
              <hr>
              <h3 class="c-blue">Detalhamento por veículo</h3>
              <?php 
              $valores = array();
              foreach ($form_fechamento_veiculo as $key) {
                $valores[$key->id_veiculo] = str_replace(' ', '', $key->valor);
              }
              ?>
              <table class="table table-hover table-striped">
                <thead>
                  <tr>
                    <th>Identificação</th>
                    <th>Placa</th>
                    <th style="width: 150px; text-align: center;">Valor</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($veiculos as $veiculo): ?>
                    <tr>
                      <td><?php echo $veiculo->identificacao; ?></td>
                      <td><?php echo formata_placa($veiculo->placa); ?></td>
                      <td style="text-align: right;">
                        <span class="pull-left">R$</span>
                        <?php echo $valores[$veiculo->id]; ?>
                      </td>
                    </tr>
                  <?php endforeach ?>
                </tbody>
              </table>
            </div>
          </div>

        <?php $this->load->view('include/botoes-form-cancelar'); ?>
      </form>
    </div>
  </div>
<?php $this->load->view('include/footer'); ?>
<script> 
  $(document).ready(function() {
    calcula_total();
  });

  function calcula_total(){
    var valor_produtos = parseFloat($('#valor_produtos').val().replace(".", "").replace(".", "").replace(",", "."));
    if(isNaN(valor_produtos)) {
      var valor_produtos = 0;
    }
    var valor_servicos = parseFloat($('#valor_servicos').val().replace(".", "").replace(".", "").replace(",", "."));
    if(isNaN(valor_servicos)) {
      var valor_servicos = 0;
    }
    var valor_iss_retido = parseFloat($('#valor_iss_retido').val().replace(".", "").replace(".", "").replace(",", "."));
    if(isNaN(valor_iss_retido)) {
      var valor_iss_retido = 0;
    }
    var total = parseFloat((valor_produtos + valor_servicos) - valor_iss_retido).toFixed(2).replace(".", ",");
    $('#valor_total').text(total)
  }
</script>