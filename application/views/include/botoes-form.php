<div class="row">
  <div class="col-sm-12 form-buttons">
    <button type="submmit" class="btn btn-success btn-transparent"><i class="fa fa-check" aria-hidden="true"></i> Salvar</button>
    <?php if (isset($links['voltar'])): ?>
      <a href="<?php echo base_url().$links['voltar']; ?>" class="btn btn-danger btn-transparent"><i class="fa fa-undo" aria-hidden="true"></i> Voltar</a>
    <?php endif ?>
  </div>
</div>