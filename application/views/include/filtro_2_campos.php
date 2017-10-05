<form action="<?php echo $url_filtro; ?>" method="POST">
  <div class="row">
    <div class="col-sm-4">
      <input type="text" name="filtro[1]" class="form-control input-sm" placeholder="Pesquisar..." value="<?php echo $filtro[1]; ?>">
    </div>
    <div class="col-sm-4">
      <input type="text" name="filtro[2]" class="form-control input-sm" placeholder="Termos adicionais..." value="<?php echo $filtro[2]; ?>">
    </div>
    <div class="col-sm-2">
      <button type="submit" class="btn btn-sm btn-block btn-info btn-transparent"><i class="fa fa-search"></i> Filtrar</button>
    </div>
    <div class="col-sm-2">
      <a href="<?php echo $url_limpa_filtro; ?>" class="btn btn-sm btn-block btn-dark btn-transparent"><i class="fa fa-search-minus"></i> Limpar Filtro</a>
    </div>
  </div>
</form>