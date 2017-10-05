<?php $this->load->view('include/top'); ?>
  <div class="panel">
    <div class="panel-header">
      <h3><i class="fa fa-star"></i> Movimentação de Convênios</h3>
    </div>
    <div class="panel-content">
      <h3>Histórico</h3>
      <p><strong>Cliente: </strong><?php echo $veiculo->nome_cliente; ?></p>
      <p><strong>Veículo: </strong><?php echo formata_placa($veiculo->placa); ?> - <?php echo "{$veiculo->marca} {$veiculo->modelo} {$veiculo->ano} {$veiculo->cor}"; ?> <?php echo ($veiculo->identificacao != '')?'('.$veiculo->identificacao.')':''; ?></p>
      <div class="panel-content pagination2 table-responsive">
        <table class="table table-hover table-dynamic">
          <thead>
            <tr>
              <th>Ações</th>
              <th>Código</th>
              <th>Autorizado</th>
              <th>Data</th>
              <th>Técnico</th>
              <th>Seq. Shop9</th>
              <th>Trocou o Óleo</th>
              <th>Km</th>
              <th>Prox. Troca</th>
              <th>Descrição</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($grid as $key): ?>
              <tr>
                <td>
                  <div class="m-b-10 f-left">
                    <div class="btn-group">
                      <button type="button" class="btn btn-warning btn-transparent btn-square btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false" style="padding: 0;"><i class="fa fa-bars"></i></button>
                      <ul class="dropdown-menu" role="menu" style="top: 5px; left: 38px;">
                        <li><a href="<?php echo base_url(); ?>movimento/Movimentacao_convenio/editar/<?php echo $key->id; ?>">Editar</a></li>
                      </ul>
                    </div>
                  </div>
                </td>
                <td><?php echo $key->id; ?></td>
                <td><?php echo $key->autorizado; ?></td>
                <td><?php echo formata_data($key->data); ?></td>
                <td><?php echo $key->tecnico; ?></td>
                <td><?php echo $key->seq_shop9; ?></td>
                <td style="text-align: center;"><?php echo ($key->trocou_oleo == 'S')?'<i class="fa fa-check-circle-o c-green"></i> Sim':'<i class="fa fa-times-circle-o c-red"></i> Não'; ?></td>
                <td style="text-align: right;"><?php echo $key->km; ?></td>
                <td style="text-align: right;"><?php echo $key->km_proxima_troca_oleo; ?></td>
                <!-- <td style="text-align: center;"><a class="btn btn-sm btn-primary" data-rel="tooltip" data-placement="left" data-original-title="<?php echo line2br($key->descricao); ?>"><i class="fa fa-info"></i></a></td> -->
                <td><?php echo line2br($key->descricao); ?></td>
              </tr>
            <?php endforeach ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
<?php $this->load->view('include/footer'); ?>
      