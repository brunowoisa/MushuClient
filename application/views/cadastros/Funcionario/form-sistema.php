<div class="row">
  <div class="col-sm-12" style="text-align: center;">
    <?php if (isset($form->foto) && is_file('./assets/uploads/_funcionarios/foto/'.$form->foto)): ?>
      <img class="img-lg img-circle mCS_img_loaded" src="<?php echo base_url(); ?>assets/uploads/_funcionarios/foto/<?php echo $form->foto; ?>" alt="Foto de Perfil">
    <?php else: ?>
      <img class="img-lg img-circle mCS_img_loaded" src="<?php echo base_url(); ?>assets/images/noprofile.jpg" alt="Sem Foto de Perfil">
    <?php endif ?>
  </div>
  <div class="col-sm-12">
    <label>Foto</label>
    <div class="fileinput fileinput-new input-group" data-provides="fileinput">
      <div class="form-control" data-trigger="fileinput">
        <i class="glyphicon glyphicon-file fileinput-exists"></i><span class="fileinput-filename"></span>
      </div>
      <span class="input-group-addon btn btn-default btn-file"><span class="fileinput-new">Selecionar...</span><span class="fileinput-exists">Alterar</span>
      <input type="hidden"><input type="file" name="userfile">
      </span>
      <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remover</a>
    </div>
  </div>
  <div class="col-sm-6">
    <label>Acesso ao Sistema?</label>
    <select class="form-control  form-white <?php echo form_status('acesso_sistema'); ?>" name="acesso_sistema">
      <option value="">--Selecione--</option>
      <option value="S" <?php echo set_form_select($editar,$form,'acesso_sistema', 'S'); ?>>Sim</option>
      <option value="N" <?php echo set_form_select($editar,$form,'acesso_sistema', 'N'); ?>>Não</option>
    </select> 
  </div>
  <div class="col-sm-6">
    <label>Senha</label>
    <input class="form-control bg-aero <?php echo form_status('senha'); ?>" disabled="" type="password"  name="senha" maxlength="15" placeholder="Informe a Senha..." value="<?php echo set_form_value($editar,$form,'senha'); ?>">
  </div>
  <div class="col-sm-4">
    <label>Vendedor?</label>
    <select class="form-control  form-white <?php echo form_status('vendedor'); ?>" name="vendedor">
      <option value="">--Selecione--</option>
      <option value="S" <?php echo set_form_select($editar,$form,'vendedor', 'S'); ?>>Sim</option>
      <option value="N" <?php echo set_form_select($editar,$form,'vendedor', 'N'); ?>>Não</option>
    </select> 
  </div>
  <div class="col-sm-4">
    <label>Técnico?</label>
    <select class="form-control  form-white <?php echo form_status('tecnico'); ?>" name="tecnico">
      <option value="">--Selecione--</option>
      <option value="S" <?php echo set_form_select($editar,$form,'tecnico', 'S'); ?>>Sim</option>
      <option value="N" <?php echo set_form_select($editar,$form,'tecnico', 'N'); ?>>Não</option>
    </select> 
  </div>
  <div class="col-sm-4">
    <label>Acesso às Senhas de Nível</label>
    <select class="form-control  form-white <?php echo form_status('nivel_senhas'); ?>" name="nivel_senhas">
      <option value="">--Selecione--</option>
      <option value="1" <?php echo set_form_select($editar,$form,'nivel_senhas', '1'); ?>>Básico</option>
      <option value="2" <?php echo set_form_select($editar,$form,'nivel_senhas', '2'); ?>>Intermediário</option>
      <option value="3" <?php echo set_form_select($editar,$form,'nivel_senhas', '3'); ?>>Restrito</option>
    </select> 
  </div>
</div>