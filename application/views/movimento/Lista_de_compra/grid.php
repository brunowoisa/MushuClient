<?php $this->load->view('include/top'); ?>
  <div class="panel">
    <div class="panel-header">
      <h3><i class="fa fa-shopping-cart"></i>Lista de Compras</h3>
      <div class="control-btn">
        <a id="dropdownMenu1" data-toggle="dropdown"><i class="fa fa-bars"></i></a>
        <ul class="dropdown-menu pull-right" role="menu" aria-labelledby="dropdownMenu1">
          <li><a href="#">~Relatório</a></li>
        </ul>
      </div>
    </div>
    <div class="panel-content pagination2 table-responsive">


      <ul class="nav nav-tabs">
        <li class="active"><a href="#lista" data-toggle="tab" aria-expanded="true">Lista</a></li>
        <li class=""><a href="#filtro" data-toggle="tab" aria-expanded="false">Filtro</a></li>
      </ul>
      <div class="tab-content">
        <div class="tab-pane fade active in" id="lista">
          <div class="row">
            <form action="<?php echo $url_form; ?>" method="POST">
              <div class="col-sm-3">
                <input class="form-control <?php echo form_status('quantidade'); ?>" type="number" min="0" step="1" name="quantidade" maxlength="3" value="<?php echo set_form_value($editar,$form,'quantidade'); ?>" placeholder="Quantidade">
              </div>
              <div class="col-sm-7">
                <input class="form-control <?php echo form_status('descricao'); ?>" type="text"  name="descricao" maxlength="95" value="<?php echo set_form_value($editar,$form,'descricao'); ?>" placeholder="Descrição">
              </div>
              <div class="col-sm-2">
                <button type="submmit" name="enviar" value="novo" class="btn btn-block btn-success btn-transparent"><i class="fa fa-check" aria-hidden="true"></i> Incluir</button>
              </div>
            </form>
          </div>
          <br>
          <form action="<?php echo $url_form; ?>" method="POST">
            <div class='row'>
              <div class="col-sm-12" style="text-align: center;">
                <button type="submmit" name="enviar" value="editar" class="btn btn-primary"><i class="fa fa-check" aria-hidden="true"></i> Marcar</button>
              </div>
            </div>
            <table class="table table-hover table-dynamic-mushu">
              <thead>
                <tr>
                  <th>Ações</th>
                  <th>Código</th>
                  <th>Solicitado por</th>
                  <th>Data da solicitação</th>
                  <th>Quantidade</th>
                  <th>Descrição</th>
                  <th>Cotação</th>
                  <th>Concluir</th>
                  <th>Cancelar</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($grid as $key): ?>
                  <tr>
                    <td>
                      <a href="<?php echo base_url(); ?>movimento/Lista_de_compra/editar/<?php echo $key->id; ?>/" class="btn btn-success btn-transparent btn-square btn-sm"><i class="fa fa-edit"></i></a>
                    </td>
                    <td><?php echo $key->id; ?></td>
                    <td><?php echo $key->solicitante; ?></td>
                    <td><?php echo $key->datahora; ?></td>
                    <td><?php echo $key->quantidade; ?></td>
                    <td><?php echo $key->descricao; ?></td>
                    <?php if ($key->cotacao == '' && $key->cancelado == ''): ?>
                      <td style="text-align: center;">
                        <label>
                          <input type="checkbox" name="lista[cotacao][]" value="<?php echo $key->id; ?>" data-checkbox="icheckbox_minimal-orange"><i class="fa fa-search c-orange"></i>
                        </label>
                      </td>
                      <td style="text-align: center;">
                        <i class="fa fa-times-circle-o c-red"></i>
                      </td>
                      <td style="text-align: center;">
                        <label>
                          <input type="checkbox" name="lista[cancelar][]" value="<?php echo $key->id; ?>" data-checkbox="icheckbox_minimal-grey"><i class="fa fa-ban c-brown"></i>
                        </label>
                      </td>
                    <?php elseif($key->concluido == '' && $key->cancelado == ''): ?>
                      <td style="text-align: center;">
                        <i class="fa fa-check-circle-o c-green" data-rel="tooltip" data-placement="left" data-original-title="<?php echo $key->funcionario_cotacao.' em '.$key->cotacao; ?>"></i>
                      </td>
                      <td style="text-align: center;">
                        <label>
                          <input type="checkbox" name="lista[concluir][]" value="<?php echo $key->id; ?>" data-checkbox="icheckbox_minimal-blue"><i class="fa fa-check c-blue"></i>
                        </label>
                      </td>
                      <td style="text-align: center;">
                        <label>
                          <input type="checkbox" name="lista[cancelar][]" value="<?php echo $key->id; ?>" data-checkbox="icheckbox_minimal-grey"><i class="fa fa-ban c-brown"></i>
                        </label>
                      </td>
                    <?php elseif($key->concluido != '' && $key->cancelado == ''): ?>
                      <td style="text-align: center;">
                        <i class="fa fa-check-circle-o c-green" data-rel="tooltip" data-placement="left" data-original-title="<?php echo $key->funcionario_cotacao.' em '.$key->cotacao; ?>"></i>
                      </td>
                      <td style="text-align: center;">
                        <i class="fa fa-check-circle-o c-green" data-rel="tooltip" data-placement="left" data-original-title="<?php echo $key->funcionario_concluido.' em '.$key->concluido; ?>"></i>
                      </td>
                      <td style="text-align: center;"><i class="fa fa-times-circle-o c-red"></i></td>
                    <?php elseif($key->cancelado != ''): ?>
                      <td style="text-align: center;">
                        <?php if ($key->cotacao != ''): ?>
                          <i class="fa fa-check-circle-o c-green" data-rel="tooltip" data-placement="left" data-original-title="<?php echo $key->funcionario_cotacao.' em '.$key->cotacao; ?>"></i>
                        <?php else: ?>
                          <i class="fa fa-times-circle-o c-red"></i>
                        <?php endif ?>
                      </td>
                      <td style="text-align: center;">
                        <?php if ($key->concluido != ''): ?>
                          <i class="fa fa-check-circle-o c-green" data-rel="tooltip" data-placement="left" data-original-title="<?php echo $key->funcionario_concluido.' em '.$key->concluido; ?>"></i>
                        <?php else: ?>
                          <i class="fa fa-times-circle-o c-red"></i>
                        <?php endif ?>
                      </td>
                      <td style="text-align: center;">
                        <i class="fa fa-check-circle-o c-green" data-rel="tooltip" data-placement="left" data-original-title="<?php echo $key->funcionario_cancelado.' em '.$key->cancelado; ?>"></i>
                      </td>
                    <?php endif ?>
                  </tr>
                <?php endforeach ?>
              </tbody>
            </table>
          </form>
        </div>
        <div class="tab-pane fade" id="filtro">
          <form method="POST" action="<?php echo $url_filtro; ?>">
            <div class="row">
              <div class="col-sm-12">
                <label>Descrição</label>
                <input class="form-control" type="text" name="filtro[descricao]" maxlength="95" value="<?php echo $filtro['descricao']; ?>">
              </div>
              <div class="col-sm-3">
                <label>Situação</label>
                <div class="input-group">
                  <div class="icheck-list">
                    <input type="hidden" name="filtro[situacao]">
                    <label><input type="checkbox" name="filtro[situacao][]" <?php echo (in_array('0', $filtro['situacao']))?'checked':''; ?> value="0" data-checkbox="icheckbox_minimal-blue"> Em Aberto</label>
                    <label><input type="checkbox" name="filtro[situacao][]" <?php echo (in_array('1', $filtro['situacao']))?'checked':''; ?> value="1" data-checkbox="icheckbox_minimal-blue"> Em Cotação</label>
                    <label><input type="checkbox" name="filtro[situacao][]" <?php echo (in_array('2', $filtro['situacao']))?'checked':''; ?> value="2" data-checkbox="icheckbox_minimal-blue"> Concluídos</label>
                    <label><input type="checkbox" name="filtro[situacao][]" <?php echo (in_array('3', $filtro['situacao']))?'checked':''; ?> value="3" data-checkbox="icheckbox_minimal-blue"> Cancelados</label>
                  </div>
                </div>
              </div>
              <div class="col-sm-9">
                <div class="row">
                  <div class="col-sm-4">
                    <label>Solicitado por</label>
                    <select class="form-control select" name="filtro[solicitado_por]">
                      <option value="0">--Selecione--</option>
                      <?php foreach ($funcionarios as $key): ?>
                        <option value="<?php echo $key->id; ?>" <?php echo ($filtro['solicitado_por'] == $key->id)?'selected':''; ?>><?php echo $key->apelido; ?></option>
                      <?php endforeach ?>
                    </select>
                  </div>
                  <div class="col-sm-4">
                    <label>Solicitado De</label>
                    <div class="prepend-icon">
                      <input class="form-control b-datepicker" type="text" maxlength="10" data-mask="99/99/9999" name="filtro[solicitado_de]" value="<?php echo $filtro['solicitado_de']; ?>">
                      <i class="icon-calendar"></i>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <label>Solicitado Até</label>
                    <div class="prepend-icon">
                      <input class="form-control b-datepicker" type="text" maxlength="10" data-mask="99/99/9999" name="filtro[solicitado_ate]" value="<?php echo $filtro['solicitado_ate']; ?>">
                      <i class="icon-calendar"></i>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-4">
                    <label>Cotação por</label>
                    <select class="form-control select" name="filtro[cotacao_por]">
                      <option value="0">--Selecione--</option>
                      <?php foreach ($funcionarios as $key): ?>
                        <option value="<?php echo $key->id; ?>" <?php echo ($filtro['cotacao_por'] == $key->id)?'selected':''; ?>><?php echo $key->apelido; ?></option>
                      <?php endforeach ?>
                    </select>
                  </div>
                  <div class="col-sm-4">
                    <label>Cotação De</label>
                    <div class="prepend-icon">
                      <input class="form-control b-datepicker" type="text" maxlength="10" data-mask="99/99/9999" name="filtro[cotacao_de]" value="<?php echo $filtro['cotacao_de']; ?>">
                      <i class="icon-calendar"></i>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <label>Cotação Até</label>
                    <div class="prepend-icon">
                      <input class="form-control b-datepicker" type="text" maxlength="10" data-mask="99/99/9999" name="filtro[cotacao_ate]" value="<?php echo $filtro['cotacao_ate']; ?>">
                      <i class="icon-calendar"></i>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-4">
                    <label>Concluído por</label>
                    <select class="form-control select" name="filtro[concluido_por]">
                      <option value="0">--Selecione--</option>
                      <?php foreach ($funcionarios as $key): ?>
                        <option value="<?php echo $key->id; ?>" <?php echo ($filtro['concluido_por'] == $key->id)?'selected':''; ?>><?php echo $key->apelido; ?></option>
                      <?php endforeach ?>
                    </select>
                  </div>
                  <div class="col-sm-4">
                    <label>Concluído De</label>
                    <div class="prepend-icon">
                      <input class="form-control b-datepicker" type="text" maxlength="10" data-mask="99/99/9999" name="filtro[concluido_de]" value="<?php echo $filtro['concluido_de']; ?>">
                      <i class="icon-calendar"></i>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <label>Concluído Até</label>
                    <div class="prepend-icon">
                      <input class="form-control b-datepicker" type="text" maxlength="10" data-mask="99/99/9999" name="filtro[concluido_ate]" value="<?php echo $filtro['concluido_ate']; ?>">
                      <i class="icon-calendar"></i>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-4">
                    <label>Cancelado por</label>
                    <select class="form-control select" name="filtro[cancelado_por]">
                      <option value="0">--Selecione--</option>
                      <?php foreach ($funcionarios as $key): ?>
                        <option value="<?php echo $key->id; ?>" <?php echo ($filtro['cancelado_por'] == $key->id)?'selected':''; ?>><?php echo $key->apelido; ?></option>
                      <?php endforeach ?>
                    </select>
                  </div>
                  <div class="col-sm-4">
                    <label>Cancelado De</label>
                    <div class="prepend-icon">
                      <input class="form-control b-datepicker" type="text" maxlength="10" data-mask="99/99/9999" name="filtro[cancelado_de]" value="<?php echo $filtro['cancelado_de']; ?>">
                      <i class="icon-calendar"></i>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <label>Cancelado Até</label>
                    <div class="prepend-icon">
                      <input class="form-control b-datepicker" type="text" maxlength="10" data-mask="99/99/9999" name="filtro[cancelado_ate]" value="<?php echo $filtro['cancelado_ate']; ?>">
                      <i class="icon-calendar"></i>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-12">
                <br>
                <div class="pull-right">
                  <button type="submit" name="enviar" value="filtro" class="btn btn-sm btn-info btn-transparent"><i class="fa fa-search"></i> Filtrar</button>
                  <a href="<?php echo $url_limpa_filtro; ?>" class="btn btn-sm btn-dark btn-transparent"><i class="fa fa-search-minus"></i> Limpar Filtro</a>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>

    </div>
  </div>
<?php $this->load->view('include/footer'); ?>
<script>
  $('.table-dynamic-mushu').dataTable({
    "bPaginate": false
  });
</script>
      