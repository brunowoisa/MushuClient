<?php $this->load->view('include/top'); ?>
  <div class="panel">
    <div class="panel-header">
      <h3><i class="fa fa-shopping-cart"></i>Lista de Compras</h3>
      <div class="control-btn">
        <a id="dropdownMenu1" data-toggle="dropdown"><i class="fa fa-bars"></i></a>
        <ul class="dropdown-menu pull-right" role="menu" aria-labelledby="dropdownMenu1">
          <li><a href="#">~Imprimir</a></li>
          <li><a id="mostra_log">Log</a></li>
        </ul>
      </div>
    </div>
    <div class="panel-content pagination2 table-responsive">

      <form action="<?php echo $url_form; ?>" method="POST">
        <div class="row">
          <div class="col-sm-3">
            <input class="form-control <?php echo form_status('quantidade'); ?>" type="number" min="0" step="1" name="quantidade" maxlength="3" value="<?php echo set_form_value($editar,$form,'quantidade'); ?>" placeholder="Quantidade" <?php echo ($form->concluido != '' || $form->cancelado != '')?'disabled':''; ?>>
            <input type="hidden" name="quantidade_antiga" value="<?php echo set_form_value($editar,$form,'quantidade'); ?>">
          </div>
          <div class="col-sm-7">
            <input class="form-control <?php echo form_status('descricao'); ?>" type="text"  name="descricao" maxlength="95" value="<?php echo set_form_value($editar,$form,'descricao'); ?>" placeholder="Descrição" <?php echo ($form->concluido != '' || $form->cancelado != '')?'disabled':''; ?>>
            <input type="hidden" name="descricao_antiga" value="<?php echo set_form_value($editar,$form,'descricao'); ?>">
          </div>
          <div class="col-sm-2">
            <button type="submmit" name="enviar" value="editar" class="btn btn-block btn-success btn-transparent" <?php echo ($form->concluido != '' || $form->cancelado != '')?'disabled':''; ?>><i class="fa fa-check" aria-hidden="true"></i> Salvar</button>
          </div>
        </div>
        <br>
        <div class='row'>
          <div class="col-sm-12">
            <?php if (($form->concluido == '' && $form->cancelado == '') && ($form->cotacao != '')): ?>
              <a class="btn btn-warning" id="adiciona_linha"><i class="fa fa-plus" aria-hidden="true"></i> Inserir Cotação</a>
            <?php endif ?>
          </div>
        </div>
        <table class="table table-hover table-dynamic-bruno">
          <thead>
            <tr>
              <th>Código</th>
              <th>Cotado por</th>
              <th>Data</th>
              <th>Fornecedor</th>
              <th>Valor <sup>(R$)</sup></th>
              <th>Observações</th>
            </tr>
          </thead>
          <tbody id='lista_cotacao'>
            <?php foreach ($cotacoes as $key): ?>
              <tr>
                <td><?php echo $key->id; ?></td>
                <td><?php echo $key->funcionario; ?></td>
                <td><?php echo $key->datahora; ?></td>
                <td>
                  <select name="editar_id_fornecedor[<?php echo $key->id; ?>]" class="form-control" style="width: 100%;" <?php echo ($form->concluido != '' || $form->cancelado != '')?'disabled':''; ?>> 
                    <option value="0">--Selecione--</option> 
                    <?php foreach ($fornecedores as $fornecedor): ?> 
                      <option <?php echo ($key->id_fornecedor == $fornecedor->id)?'selected':''; ?> value="<?php echo $fornecedor->id; ?>"><?php echo $fornecedor->apelido; ?></option> 
                    <?php endforeach ?> 
                  </select>
                  <input type="hidden" name="antigo_editar_id_fornecedor[<?php echo $key->id; ?>]" value="<?php echo $key->id_fornecedor; ?>">
                </td>
                <td>
                  <input class="form-control casa_decimal_2" type="text" name="editar_valor[<?php echo $key->id; ?>]" value="<?php echo $key->valor; ?>" placeholder="Valor..." style="width: 100%;" <?php echo ($form->concluido != '' || $form->cancelado != '')?'disabled':''; ?>>
                  <input type="hidden" name="antigo_editar_valor[<?php echo $key->id; ?>]" value="<?php echo $key->valor; ?>">
                </td>

                <td>
                  <input class="form-control" type="text" name="editar_observacoes[<?php echo $key->id; ?>]" value="<?php echo $key->observacoes; ?>" placeholder="Observações..." style="width: 100%;" <?php echo ($form->concluido != '' || $form->cancelado != '')?'disabled':''; ?>>
                  <input type="hidden" name="antigo_editar_observacoes[<?php echo $key->id; ?>]" value="<?php echo $key->observacoes; ?>">
                </td>

              </tr>
            <?php endforeach ?>
          </tbody>
        </table>
      </form>
    </div>
  </div>
  <script>
    $('#adiciona_linha').click(function() {
      var append = '<tr> <td></td> <td></td> <td></td> <td> <select name="novo_id_fornecedor[]" class="form-control" style="width: 100%;"> <option value="0">--Selecione--</option> <?php foreach ($fornecedores as $key): ?> <option value="<?php echo $key->id; ?>"><?php echo $key->apelido; ?></option> <?php endforeach ?> </select> </td> <td> <input class="form-control casa_decimal_2" type="text" name="novo_valor[]" placeholder="Valor..." style="width: 100%;"> </td> <td> <input class="form-control" type="text" name="novo_observacoes[]" placeholder="Observações..." style="width: 100%;"> </td> </tr>';

      $('#lista_cotacao').prepend(append);
      $('select').select2();
      $('.casa_decimal_2').iMask({
        type : 'number',
        decDigits : 2,
        groupSymbol : '.',
        decSymbol : ','
      });
    });
    $('#mostra_log').click(function() {
      <?php 
      $log = '';
      foreach ($logs as $key){
        $log .= "L#{$key->id} - <b>{$key->funcionario}</b> em <b>{$key->datahora}</b><br>{$key->descricao}<hr>";
      } ?>
      $('#modal_log_corpo').html('<?php echo $log; ?>');
      $('#modal-log').modal("show");
    });
  </script>
<?php $this->load->view('include/footer'); ?>