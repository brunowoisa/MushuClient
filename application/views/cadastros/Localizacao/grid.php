<?php $this->load->view('include/top'); ?>
  <div class="panel">
    <div class="panel-header">
      <h3><i class="fa fa-cubes"></i> Localizações</h3>
    </div>
    <div class="panel-content">

      <div class="row">
        <div class="col-sm-12">
          <?php if (!$grid): ?>

          <table class="table table-hover table-dynamic-mushu">
            <thead>
              <tr>
                <th style="width: 90px;">Ações</th>
                <th>Descrição</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($grid as $key): ?>
                <tr>
                  <td>
                    <a href="<?php echo base_url(); ?>cadastros/Localizacao/editar/<?php echo $key->id; ?>/" class="btn btn-success btn-transparent btn-square btn-sm"><i class="fa fa-edit"></i></a>
                  </td>
                  <td><?php echo $key->descricao; ?></td>
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
      