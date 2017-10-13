<?php $this->load->view('include/top'); ?>
  <div class="row">
    <div class="col-md-12">
      <div class="panel">
        <div class="panel-header">
          <h3><i class="fa fa-key"></i> Alterar senha</h3>
        </div>
        <div class="panel-content">
          <form action="<?php echo $url_form; ?>" method="POST" enctype="multipart/form-data">
            <div class="col-sm-3" style="text-align: center;">
              <?php if (isset($form->foto) && is_file('../Mushu/assets/uploads/_clientes/foto/'.$form->foto)): ?>
                <img class="img-lg img-circle mCS_img_loaded" src="<?php echo base_url(); ?>../Mushu/assets/uploads/_clientes/foto/<?php echo $form->foto; ?>" alt="Foto de Perfil">
              <?php else: ?>
                <img class="img-lg img-circle mCS_img_loaded" src="<?php echo base_url(); ?>assets/images/noprofile.jpg" alt="Sem Foto de Perfil">
              <?php endif ?>
            </div>
            <div class="col-sm-9">
              <br>
              <div class="col-sm-4">
                <label>Senha Atual</label>
                <input class="form-control <?php echo form_status('senha_atual'); ?>" type="password" name="senha_atual" maxlength="25" value="<?php echo set_form_value($editar,$form,'senha_atual'); ?>">
              </div>
              <div class="col-sm-4">
                <label>Nova Senha</label>
                <input class="form-control <?php echo form_status('nova_senha'); ?>" type="password" name="nova_senha" maxlength="25" value="<?php echo set_form_value($editar,$form,'nova_senha'); ?>">
              </div>
              <div class="col-sm-4">
                <label>Confirmação da Senha</label>
                <input class="form-control <?php echo form_status('confirmacao_nova_senha'); ?>" type="password" name="confirmacao_nova_senha" maxlength="25" value="<?php echo set_form_value($editar,$form,'confirmacao_nova_senha'); ?>">
              </div>
            </div>
            <?php $this->load->view('include/botoes-form'); ?>
          </form>
        </div>
      </div>
    </div>
  </div>
<?php $this->load->view('include/footer'); ?>
 <script>
  $('#login').blur(function() {
    var login = $('#login').val();
    var login_antigo = $('#login_antigo').val();
    console.log(login);
    if (login != '' && login != login_antigo) {
      $.ajax({
        url: '<?php echo base_url(); ?>Ajax/consulta_login_disponivel/'+login,
        type: 'POST',
        dataType: 'json'
      })
      .done(function(data) {
        if (!data) {
          $('#login').focus();
          swal(
            'Atenção!',
            'Login Indisponível',
            'warning'
          )
          $('#login').val('');
        };
      });
    }
  });
</script>