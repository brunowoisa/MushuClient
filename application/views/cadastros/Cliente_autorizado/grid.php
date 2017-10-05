<?php $this->load->view('include/top'); ?>
  <div class="panel">
    <div class="panel-header">
      <h3><i class="fa fa-users"></i>Clientes - Autorizados</h3>
    </div>



    <div class="panel-content">

      <?php $this->load->view('include/filtro_2_campos') ?>
      <div class="row">
        <div class="col-sm-12">

          <table class="table table-hover table-dynamic-mushu">
            <thead>
              <tr>
                <th>Ações</th>
                <th>Nome</th>
                <th>Cliente</th>
                <th>Usa o Sistema</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($grid as $key): ?>
                <tr>
                  <td>
                    <a href="<?php echo base_url(); ?>cadastros/Cliente_autorizado/editar/<?php echo $key->id; ?>/" class="btn btn-success btn-transparent btn-square btn-sm"><i class="fa fa-edit"></i></a>
                  </td>
                  <td><?php echo $key->nome; ?></td>
                  <td><?php echo $key->nome_cliente; ?></td>
                  <td><?php echo ($key->usa_sistema == 'S')?'Sim':'Não'; ?></td>
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
  });
</script>