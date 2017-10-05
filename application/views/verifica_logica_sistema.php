<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html>
  <head>
    <?php //include('include/head.php'); ?>
    <style>
      .circle {
            background-color: rgba(0,0,0,0);
            border: 5px solid rgba(0,183,229,0.9);
            opacity: .9;
            border-right: 5px solid rgba(0,0,0,0);
            border-left: 5px solid rgba(0,0,0,0);
            border-radius: 50px;
            box-shadow: 0 0 35px #2187e7;
            width: 50px;
            height: 50px;
            margin: 0 auto;
            -moz-animation: spinPulse 1s infinite ease-in-out;
            -webkit-animation: spinPulse 1s infinite linear;
        }

        .circle1 {
            background-color: rgba(0,0,0,0);
            border: 5px solid rgba(0,183,229,0.9);
            opacity: .9;
            border-left: 5px solid rgba(0,0,0,0);
            border-right: 5px solid rgba(0,0,0,0);
            border-radius: 50px;
            box-shadow: 0 0 15px #2187e7;
            width: 30px;
            height: 30px;
            margin: 0 auto;
            position: relative;
            top: -50px;
            -moz-animation: spinoffPulse 1s infinite linear;
            -webkit-animation: spinoffPulse 1s infinite linear;
        }

        @-moz-keyframes spinPulse {
            0% {
                -moz-transform: rotate(160deg);
                opacity: 0;
                box-shadow: 0 0 1px #2187e7;
            }

            50% {
                -moz-transform: rotate(145deg);
                opacity: 1;
            }

            100% {
                -moz-transform: rotate(-320deg);
                opacity: 0;
            };
        }

        @-moz-keyframes spinoffPulse {
            0% {
                -moz-transform: rotate(0deg);
            }

            100% {
                -moz-transform: rotate(360deg);
            };
        }

        @-webkit-keyframes spinPulse {
            0% {
                -webkit-transform: rotate(160deg);
                opacity: 0;
                box-shadow: 0 0 1px #2187e7;
            }

            50% {
                -webkit-transform: rotate(145deg);
                opacity: 1;
            }

            100% {
                -webkit-transform: rotate(-320deg);
                opacity: 0;
            };
        }

        @-webkit-keyframes spinoffPulse {
            0% {
                -webkit-transform: rotate(0deg);
            }

            100% {
                -webkit-transform: rotate(360deg);
            };
        }
        
        .texto{
          color: rgba(0,183,229,0.9);
          font-family: verdana;
          text-align: center;
        }
        #altera_texto{

        }
    </style>
  </head>
  <body style="background-color: #333;">
    <div style="margin-top: 250px;">
      
      <div class="circle"></div>
      <div class="circle1"></div>

      <div class="texto">
        <p id="altera_texto">Carregando...</p>
      </div>
      
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
    <script>
      tabela_preco();
      function tabela_preco(){
        $('#altera_texto').text('Verificando Tabelas de Preço...');
        $.ajax({
          url: '<?php echo base_url(); ?>Verifica_Logica_Sistema/verifica_tabela_preco/',
          type: 'POST',
          dataType: 'json',
        })
        .done(function() {
          verifica_pais();
        })
      }
      function verifica_pais(){
        $('#altera_texto').text('Verificando Tabela de Países...');
        $.ajax({
          url: '<?php echo base_url(); ?>Verifica_Logica_Sistema/verifica_pais/',
          type: 'POST',
          dataType: 'json',
        })
        .done(function() {
          finalizado();
        })
      }




      function finalizado(){
        window.location.replace("<?php echo base_url() ?>/home");
      }
      
    </script>

    <?php //include('include/footer.php'); ?>
  </body>
</html>