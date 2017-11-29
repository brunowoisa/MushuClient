<?php $this->load->view('include/top'); ?>
  <div class="panel">
    <div class="panel-header">
      <h3><i class="fa fa-star"></i> Fechamentos</h3>
    </div>
    <div class="panel-content">

      <div class="row">
        <div class="col-sm-12">

          <table class="table table-hover table-dynamic-mushu">
            <thead>
              <tr>
                <th>Ações</th>
                <th>Competencia</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody>
              <?php 
              $status = array(
                '0' => '<i class="fa fa-exclamation-triangle c-orange"></i> Iniciado',
                '1' => '<i class="fa fa-cogs c-orange"></i> Em Execução',
                '2' => '<i class="fa fa-search c-blue"></i> Conferência',
                '3' => '<i class="fa fa-check-circle-o c-green"></i> Concluído',
              );
              ?>
              <?php foreach ($grid as $key): ?>
                <tr>
                  <td>
                    <?php if ($key->status == '3'): ?>
                      <a href="<?php echo base_url(); ?>Ferramenta/Fechamento_convenio/editar/<?php echo $key->id; ?>/" class="btn btn-success btn-transparent btn-square btn-sm"><i class="fa fa-edit"></i></a>
                    <?php else: ?>
                      <a href="#" class="btn btn-success btn-transparent btn-square btn-sm" disabled><i class="fa fa-edit"></i></a>
                    <?php endif ?>
                  </td>
                  <td><span style="display: none;"><?php echo $key->id; ?></span><?php echo $key->competencia; ?></td>
                  <td><?php echo $status[$key->status]; ?></td>
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
    "order": [ 1, 'desc' ]
  });
</script>
      