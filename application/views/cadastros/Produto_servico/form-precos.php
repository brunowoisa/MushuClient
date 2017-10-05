<div class="row">

  <?php //epre($aliquotas_impostos); ?>

  <div class="col-sm-2">
    <label class="c-red">Custo</label>
    <input id="custo" class="form-control casa_decimal_2" type="text">
  </div>

  <div class="col-sm-2">
    <label class="c-orange">IPI <sup>%</sup></label>
    <input id="ipi" class="form-control casa_decimal_2" type="text" value="<?php echo $aliquotas_impostos->ipi; ?>">
  </div>

  <div class="col-sm-2">
    <label class="c-orange">Simples <sup>%</sup></label>
    <input id="simples" class="form-control casa_decimal_2" type="text" value="<?php echo $aliquotas_impostos->simples_nacional; ?>">
  </div>

  <div class="col-sm-2">
    <label class="c-orange">ICMS <sup>%</sup></label>
    <input id="icms" class="form-control casa_decimal_2" type="text" value="<?php echo $aliquotas_impostos->icms; ?>">
  </div>

  <div class="col-sm-2">
    <label class="c-orange">Desp. Fixas <sup>%</sup></label>
    <input id="despesas" class="form-control casa_decimal_2" type="text" value="<?php echo $aliquotas_impostos->despesa_fixa; ?>">
  </div>

  <div class="col-sm-2">
    <label class="c-blue">Markup <sup>%</sup></label>
    <input id="markup" class="form-control casa_decimal_2" type="text">
  </div>

</div>
<div class="row">
  <div class="col-sm-12 m-t-20">
    <div class="pull-right">
      <button type="button" id="calcular" class="btn btn-warning btn-transparent"><i class="fa fa-calculator"></i> Calcular</button>
    </div>
  </div>
</div>
<div class="row">
  
  <div class="col-md-3">
    <br>
  </div>
  <div class="col-md-6">
    <div class="panel-group panel-accordion" id="accordion">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h4>
            <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false">
            Resultado do Cálculo
            </a>
          </h4>
        </div>
        <div id="collapseOne" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
          <div class="panel-body">
            <div class="row">
              <div class="col-sm-12">
                <table class="table table-hover">
                  <tbody>
                    <tr class="c-red">
                      <td><strong>Custo: </strong></td>
                      <td style="text-align: right;"><span id="res_custo"></span></td>
                    </tr>
                    <tr class="c-orange">
                      <td><strong>IPI: </strong></td>
                      <td style="text-align: right;"><span id="res_ipi"></span></td>
                    </tr>
                    <tr class="c-orange">
                      <td><strong>Simples: </strong></td>
                      <td style="text-align: right;"><span id="res_simples"></span></td>
                    </tr>
                    <tr class="c-orange">
                      <td><strong>ICMS: </strong></td>
                      <td style="text-align: right;"><span id="res_icms"></span></td>
                    </tr>
                    <tr class="c-orange">
                      <td><strong>Desp. Fixas: </strong></td>
                      <td style="text-align: right;"><span id="res_despesas"></span></td>
                    </tr>
                    <tr class="c-green">
                      <td><strong>Peço de Venda: </strong></td>
                      <td style="text-align: right;"><span id="res_venda"></span></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-3">
    <br>
  </div>
</div>
<hr>
<div class="row">




  <div class="col-sm-12">

    <table class="table table-hover table-dynamic-mushu">
      <thead>
        <tr>
          <th>Tabela</th>
          <th>Última Alteração</th>
          <th>Markup</th>
          <th>Preço Atual</th>
          <th>Novo Preço</th>
          <th>Diferença</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($tabelas_de_preco as $key): ?>
          <tr>
            <td><?php echo $key->descricao; ?></td>
            <td style="text-align: center;">--</td>
            <td style="text-align: center;">
              <?php if ($key->tipo == 'V'): ?>
                <?php echo $key->markup; ?>%
              <?php else: ?>
                --
              <?php endif ?>
            </td>
            <td id="antigo_preco_<?php echo $key->id; ?>" style="text-align: right;">0,00</td>
            <td><input <?php echo ($key->tipo == "M")?'disabled':''; ?> class="form-control casa_decimal_2" type="text" id="novo_preco_<?php echo $key->id; ?>" name="preco[<?php echo $key->id; ?>]" value="" onblur="javascript:calcula_diferenca(<?php echo $key->id; ?>)"></td>
            <td id="resultado_preco_<?php echo $key->id; ?>" style="text-align: right;">0%</td>
          </tr>
        <?php endforeach ?>
      </tbody>
    </table>

    <script>
      $('#calcular').click(function() {
        var custo   = $("#custo").val();
        var ipi     = $("#ipi").val();
        var simples = $("#simples").val();
        var icms    = $("#icms").val();
        var despesas = $("#despesas").val();
        var markup  = $("#markup").val();
        custo       = custo.replace(".", "").replace(",", ".").replace(" ", "");
        ipi         = ipi.replace(".", "").replace(",", ".").replace(" ", "");
        simples     = simples.replace(".", "").replace(",", ".").replace(" ", "");
        icms        = icms.replace(".", "").replace(",", ".").replace(" ", "");
        despesas    = despesas.replace(".", "").replace(",", ".").replace(" ", "");
        markup      = markup.replace(".", "").replace(",", ".").replace(" ", "");
        var venda = 0;
        var cal_ipi = 0;
        var cal_simples = 0;
        var cal_icms = 0;
        var cal_despesas = 0;

        custo = parseFloat(custo);
        console.log("Custo -> "+custo);

        venda = parseFloat(custo + (custo * markup / 100));

        if (despesas > 0) {
          cal_despesas = parseFloat(venda * despesas / 100);
        }

        if (ipi > 0) {
          cal_ipi = parseFloat(venda * ipi / 100);
        }

        if (simples > 0) {
          cal_simples = parseFloat(venda * simples / 100);
        }

        if (icms > 0) {
          cal_icms = parseFloat(venda * icms / 100);
        }

        var total_geral = parseFloat(venda+cal_despesas+cal_ipi+cal_simples+cal_icms).toFixed(2);
        // var total_geral = Math.round();
        $('#res_custo').text(parseFloat(custo).toFixed(2).replace(".", ","));
        $('#res_ipi').text(parseFloat(cal_ipi).toFixed(2).replace(".", ","));
        $('#res_simples').text(parseFloat(cal_simples).toFixed(2).replace(".", ","));
        $('#res_icms').text(parseFloat(cal_icms).toFixed(2).replace(".", ","));
        $('#res_despesas').text(parseFloat(cal_despesas).toFixed(2).replace(".", ","));
        $('#res_venda').text(parseFloat(total_geral).toFixed(2).replace(".", ","));
      });


      function calcula_diferenca(linha){
        var PA = $('#antigo_preco_'+linha).text();
        PA = PA.replace(",", ".");

        var PN = $('#novo_preco_'+linha).val();
        PN = PN.replace(",", ".");

        if (PN > 0) {
          if (PA == 0) {
            $('#resultado_preco_'+linha).html('<i class="fa fa-arrow-circle-up c-green"></i> 100%')
          }
          else{
            var res = 0;
            res = parseFloat(((PN-PA)/PA)*100).toFixed(2);
            res_formatado = res.replace(".", ",");
            if (res > 0) {
              $('#resultado_preco_'+linha).html('<i class="fa fa-arrow-circle-up c-green"></i> '+res_formatado+'%');
            }
            else{
              $('#resultado_preco_'+linha).html('<i class="fa fa-arrow-circle-down c-red"></i> '+res_formatado+'%');
            }
          }
        }
        else{
          $('#resultado_preco_'+linha).html('0%');
        }

      }
    </script>

  </div>
</div>  