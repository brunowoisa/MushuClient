<?php $this->load->view('include/top'); ?>
  <div class="row">
    <div class="col-md-12">
      <div class="panel">
        <div class="panel-header">
          <h3><i class="fa fa-user"></i> Meu Perfil</h3>
        </div>
        <div class="panel-content">
          <form action="<?php echo $url_form; ?>" method="POST" enctype="multipart/form-data">

            <div class="col-sm-12" style="text-align: center;">
              <?php if (isset($form->foto) && is_file('../Mushu/assets/uploads/_clientes/foto/'.$form->foto)): ?>
                <img class="img-lg img-circle mCS_img_loaded" src="<?php echo base_url(); ?>../Mushu/assets/uploads/_clientes/foto/<?php echo $form->foto; ?>" alt="Foto de Perfil">
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

            <div class="col-sm-8">
              <label>Nome</label>
              <input class="form-control <?php echo form_status('nome'); ?>" type="text"  name="nome" maxlength="75" value="<?php echo set_form_value($editar,$form,'nome'); ?>">
            </div>
            <div class="col-sm-4">
              <label>Apelido</label>
              <input class="form-control <?php echo form_status('apelido'); ?>" type="text"  name="apelido" maxlength="25" value="<?php echo set_form_value($editar,$form,'apelido'); ?>">
            </div>
            <div class="col-sm-4">
              <label>Data de Nascimento</label>
              <div class="prepend-icon">
                <input class="form-control b-datepicker <?php echo form_status('data_nascimento'); ?>" type="text" maxlength="10" data-mask="99/99/9999" name="data_nascimento" value="<?php echo set_form_value($editar,$form,'data_nascimento'); ?>">
                <i class="icon-calendar"></i>
              </div>
            </div>
            <div class="col-sm-4">
              <label>Telefone Fixo</label>
              <input class="form-control <?php echo form_status('telefone'); ?>" type="text" name="telefone" maxlength="14" data-mask="(99) 9999-9999" value="<?php echo set_form_value($editar,$form,'telefone'); ?>">
            </div>
            <div class="col-sm-4">
              <label>Celular</label>
              <input class="form-control <?php echo form_status('celular'); ?>" type="text" name="celular" maxlength="15" data-mask="(99) 99999-9999" value="<?php echo set_form_value($editar,$form,'celular'); ?>">
            </div>
            <div class="col-sm-4">
              <label>Login</label>
              <input class="form-control <?php echo form_status('login'); ?>" type="text" name="login" id="login" maxlength="14" value="<?php echo set_form_value($editar,$form,'login'); ?>">
              <input type="hidden" id="login_antigo" value="<?php echo set_form_value($editar,$form,'login'); ?>">
            </div>
            <div class="col-sm-8">
              <label>E-mail</label>
              <input class="form-control <?php echo form_status('email'); ?>" type="text" name="email" maxlength="95" value="<?php echo set_form_value($editar,$form,'email'); ?>">
            </div>
            <div class="col-sm-12 m-t-20">
              <div class="alert alert-info">
                <p>
                  <i class="fa fa-exclamation-triangle"></i><strong>Importante:</strong><br>
                  O E-mail informado será utilizado para o envio de notificações do sistema e para recuperação de senha.
                </p>
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