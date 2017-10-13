<div class="row">
  <div class="col-sm-3">
    <label>Usa o sistema?</label>
    <select class="form-control <?php echo form_status('usa_sistema'); ?>" name="usa_sistema">
      <option value="">--Selecione--</option>
      <option value="S" <?php echo set_form_select($editar,$form,'usa_sistema', 'S'); ?>>Sim</option>
      <option value="N" <?php echo set_form_select($editar,$form,'usa_sistema', 'N'); ?>>Não</option>
    </select>
  </div>
  <div class="col-sm-3">
    <label>Login</label>
    <input class="form-control <?php echo form_status('login'); ?>" type="text" name="login" id="login" maxlength="14" value="<?php echo set_form_value($editar,$form,'login'); ?>">
    <input type="hidden" id="login_antigo" value="<?php echo set_form_value($editar,$form,'login'); ?>">
  </div>
  <div class="col-sm-6">
    <label>E-mail</label>
    <input class="form-control <?php echo form_status('email'); ?>" type="text" name="email" maxlength="95" value="<?php echo set_form_value($editar,$form,'email'); ?>">
  </div>
  <div class="col-sm-12 m-t-20">
    <div class="alert alert-info">
      <p>
        <i class="fa fa-exclamation-triangle"></i><strong>Informações:</strong><br>
        Senha padrão gerada pelo sistema: <strong>2727</strong>.<br>
        É altamente recomendada a alteração desta senha no primeiro acesso.<br>
        O E-mail informado será utilizado para o envio de notificações do sistema e para recuperação de senha.
      </p>
    </div>
  </div>
</div>
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