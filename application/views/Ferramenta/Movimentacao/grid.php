<?php $this->load->view('include/top'); ?>
  <div class="panel">
    <div class="panel-header">
      <h3><i class="fa fa-wrench"></i>Movimentação</h3>
    </div>

    <div class="panel-content pagination2 table-responsive">
      <table class="table table-hover table-dynamic-mushu">
        <thead>
          <tr>
            <th>Ações</th>
            <th>Cliente</th>
            <th>Identificação</th>
            <th>Placa</th>
            <th style="width: 120px;">Próxima Troca de Óleo</th>
            <th style="width: 120px;">Última Movimentação</th>
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
                      <li><a href="<?php echo base_url(); ?>Ferramenta/Movimentacao/historico/<?php echo $key->id; ?>/">Histórico</a></li>
                      <?php if ($key->id_ultima_movimentacao != ''): ?>
                        <li><a href="<?php echo base_url(); ?>Ferramenta/Movimentacao/editar/<?php echo $key->id_ultima_movimentacao; ?>/">Última Movimentação</a></li>
                      <?php endif ?>
                    </ul>
                  </div>
                </div>
              </td>
              <td><?php echo $key->nome; ?></td>
              <td><?php echo $key->identificacao; ?></td>
              <td><?php echo formata_placa($key->placa); ?></td>
              <td style="text-align: right;"><?php echo $key->km_proxima_troca_oleo; ?></td>
              <td style="text-align: right;"><?php echo formata_data($key->ultima_movimentacao); ?></td>
            </tr>
          <?php endforeach ?>
        </tbody>
      </table>
    </div>
      

  </div>
<?php $this->load->view('include/footer'); ?>
<script>
  $('.table-dynamic-mushu').dataTable({
    "bPaginate": false,
    "order": [[ 1, "asc" ]]
  });
</script>