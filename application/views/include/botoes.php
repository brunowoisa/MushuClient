<?php if ($links != false): ?>
  <div style="text-align: right;">
    <!-- Novo -->
    <?php if (isset($links['novo'])): ?>
      <a href="<?php echo base_url().$links['novo']; ?>" class="btn btn-sm btn-success btn-transparent btn-top"><i class="fa fa-plus-square-o"></i></a>
    <?php endif ?>
    <!-- Busca Direta -->
    <?php if (isset($links['busca_direta'])): ?>
      <a href="javascript:modal_busca_direta();" class="btn btn-sm btn-info btn-transparent btn-top"><i class="fa fa-search"></i></a>
    <?php endif ?>
    <!-- Atualizar -->
    <?php if (isset($links['atualizar'])): ?>
      <?php if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on'): ?>
        <a href="<?php echo "https://".$_SERVER['SERVER_NAME'].$_SERVER ['REQUEST_URI']; ?>" class="btn btn-sm btn-warning btn-transparent btn-top"><i class="fa fa-refresh"></i></a>
      <?php else: ?>
        <a href="<?php echo "http://".$_SERVER['SERVER_NAME'].$_SERVER ['REQUEST_URI']; ?>" class="btn btn-sm btn-warning btn-transparent btn-top"><i class="fa fa-refresh"></i></a>
      <?php endif ?>
    <?php endif ?>
    <!-- Voltar / Sair -->
    <?php if (isset($links['voltar'])): ?>
      <a href="<?php echo base_url().$links['voltar']; ?>" class="btn btn-sm btn-danger btn-transparent btn-top"><i class="fa fa-arrow-left"></i></a>
    <?php elseif (isset($links['fechar'])): ?>
      <a href="<?php echo base_url().$links['fechar']; ?>" class="btn btn-sm btn-danger btn-transparent btn-top"><i class="fa fa-times"></i></a>
    <?php endif ?>
  </div>
<?php endif ?>