<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html>
  <head>
    <?php include('include/head.php'); ?>
  </head>
  <body class="account separate-inputs" data-page="login">
  <!-- <body class="account separate-inputs" style="background-image: url('<?php echo base_url(); ?>assets/images/bg.png'); background-repeat: no-repeat;  background-attachment: fixed; background-position: center;" data-page="login"> -->
    <!-- BEGIN LOGIN BOX -->
    <div class="container" id="login-block">
      <div class="row">
        <div class="col-sm-6 col-md-4 col-md-offset-4">
          <div class="account-wall">
            <?php if (isset($erro)): ?>
      			  <div class="alert alert-danger" role="alert"> <strong>Erro!</strong><br> <?php echo $erro ?> </div>
            <?php endif ?>
            <i class="user-img icons-faces-users-03"></i>
            <form class="form-signin" role="form" method="POST" action="#">
              <div class="append-icon">
                <input type="text" data-mask="999.999.999-99" name="cpf" id="name" class="form-control form-white username <?php echo form_status('cpf'); ?>" placeholder="CPF" value="<?php echo set_value('cpf'); ?>">
                <i class="icon-user"></i>
              </div>
              <div class="append-icon m-b-20">
                <input type="password" name="senha" class="form-control form-white password <?php echo form_status('senha'); ?>" placeholder="Senha" value="<?php echo set_value('senha'); ?>">
                <i class="icon-lock"></i>
              </div>
              <button type="submit" id="submit-form" class="btn btn-lg btn-primary btn-block ladda-button" data-style="expand-left">Acessar</button>
            </form>
          </div>
        </div>
      </div>
      <p class="account-copyright">
        <small><b>MushuClient</b> © <?php echo date('Y'); ?> | Powered by Bruno Woisa</small>
      </p>
    </div>
  	<script src="<?php echo base_url(); ?>assets/global/plugins/jquery/jquery-3.1.0.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/global/plugins/jquery/jquery-migrate-3.0.0.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/global/plugins/gsap/main-gsap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/global/plugins/tether/js/tether.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/global/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/global/plugins/backstretch/backstretch.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/global/plugins/bootstrap-loading/lada.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/global/js/pages/login-v1.js"></script>
    <script src="<?php echo base_url(); ?>assets/global/plugins/bootstrap/js/jasny-bootstrap.min.js"></script>
  </body>
</html>