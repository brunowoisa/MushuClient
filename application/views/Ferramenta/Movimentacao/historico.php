<?php $this->load->view('include/top'); ?>
  <div class="panel">
    <div class="panel-header">
      <h3><i class="fa fa-wrench"></i>Movimentação</h3>
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
                  <a href="<?php echo base_url(); ?>Ferramenta/Movimentacao/editar/<?php echo $key->id; ?>" class="btn btn-success btn-transparent btn-square btn-sm"><i class="fa fa-edit"></i></a>
                </td>
                <td><?php echo $key->id; ?></td>
                <td><?php echo $key->autorizado; ?></td>
                <td><?php echo formata_data($key->data); ?></td>
                <td style="text-align: center;"><?php echo ($key->trocou_oleo == 'S')?'<i class="fa fa-check-circle-o c-green"></i> Sim':'<i class="fa fa-times-circle-o c-red"></i> Não'; ?></td>
                <td style="text-align: right;"><?php echo $key->km; ?></td>
                <td style="text-align: right;"><?php echo $key->km_proxima_troca_oleo; ?></td>
                <td><?php echo line2br($key->descricao); ?></td>
              </tr>
            <?php endforeach ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
<?php $this->load->view('include/footer'); ?>
      