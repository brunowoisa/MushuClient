<?php $this->load->view('include/top'); ?>
  <div class="panel">
    <div class="panel-header">
      <h3><i class="fa fa-users"></i>Veículos de Clientes</h3>
    </div>

    <div class="panel-content">

      <?php $this->load->view('include/filtro_2_campos') ?>
      <div class="row">
        <div class="col-sm-12">

          <table class="table table-hover table-dynamic-mushu">
            <thead>
              <tr>
                <th>Ações</th>
                <th>Cliente</th>
                <th>Placa</th>
                <th>Identificação</th>
                <th>Marca</th>
                <th>Modelo</th>
                <th>Ano</th>
                <th>Cor</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($grid as $key): ?>
                <tr>
                  <td>
                    <a href="<?php echo base_url(); ?>cadastros/Cliente_veiculo/editar/<?php echo $key->id; ?>/" class="btn btn-success btn-transparent btn-square btn-sm"><i class="fa fa-edit"></i></a>
                  </td>
                  <td><?php echo $key->nome; ?></td>
                  <td><?php echo formata_placa($key->placa); ?></td>
                  <td><?php echo $key->identificacao; ?></td>
                  <td><?php echo $key->marca; ?></td>
                  <td><?php echo $key->modelo; ?></td>
                  <td><?php echo $key->ano; ?></td>
                  <td><?php echo $key->cor; ?></td>
                </tr>
              <?php endforeach ?>
            </tbody>
          </table>

        </div>
      </div>


    </div>

  </div>
<?php $this->load->view('include/footer'); ?>
<script>
  $('.table-dynamic-mushu').dataTable({
    // "bPaginate": false
    "aaSorting": [[1, "asc"]]
  });
</script>