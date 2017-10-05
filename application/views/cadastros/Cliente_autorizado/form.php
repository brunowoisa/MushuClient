<?php $this->load->view('include/top'); ?>
  <div class="panel">
    <div class="panel-header">
      <h3><i class="fa fa-users"></i>Clientes - Cadastro de Autorizados</h3>
    </div>
    <div class="panel-content">
      <form action="<?php echo $url_form; ?>" method="POST">


        <div class="tab_left">
          <ul class="nav nav-tabs nav-blue">
            <li class="active"><a href="#geral" data-toggle="tab">Geral</a></li>
          </ul>
          <div class="tab-content">

            <div class="tab-pane fade active in" id="geral">
              
              <div class="row">
                <div class="col-sm-2">
                  <label>Código</label>
                  <input class="form-control bg-aero" type="text" value="<?php echo set_form_value($editar,$form,'id'); ?>" disabled placeholder="Automático">
                </div>
                <div class="col-sm-10">
                  <label>Cliente</label>
                  <select class="form-control <?php echo form_status('id_cliente'); ?>" name="id_cliente">
                    <option value="">--Selecione--</option>
                    <?php foreach ($clientes as $key): ?>
                      <option value="<?php echo $key->id; ?>" <?php echo set_form_select($editar,$form,'id_cliente', $key->id); ?>><?php echo $key->nome; ?></option>
                    <?php endforeach ?>
                  </select>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-4">
                  <label>CPF</label>
                  <input class="form-control <?php echo form_status('cpf'); ?>" type="text" name="cpf" maxlength="14" data-mask="999.999.999-99" value="<?php echo set_form_value($editar,$form,'cpf'); ?>">
                </div>
                <div class="col-sm-8">
                  <label>Nome</label>
                  <input class="form-control <?php echo form_status('nome'); ?>" type="text"  name="nome" maxlength="75" value="<?php echo set_form_value($editar,$form,'nome'); ?>">
                </div>
                <div class="col-sm-4">
                  <label>Usa o sistema?</label>
                  <select class="form-control <?php echo form_status('usa_sistema'); ?>" name="usa_sistema">
                    <option value="">--Selecione--</option>
                    <option value="S" <?php echo set_form_select($editar,$form,'usa_sistema', 'S'); ?>>Sim</option>
                    <option value="N" <?php echo set_form_select($editar,$form,'usa_sistema', 'N'); ?>>Não</option>
                  </select>
                </div>
                <div class="col-sm-4">
                  <label>Data de Nascimento</label>
                  <div class="prepend-icon">
                    <input class="form-control b-datepicker <?php echo form_status('data_nascimento'); ?>" type="text" maxlength="10" data-mask="99/99/9999" name="data_nascimento" value="<?php echo set_form_value($editar,$form,'data_nascimento'); ?>">
                    <i class="icon-calendar"></i>
                  </div>
                </div>
                <div class="col-sm-4">
                  <label>Ativo</label>
                  <select class="form-control <?php echo form_status('ativo'); ?>" name="ativo">
                    <option value="">--Selecione--</option>
                    <option value="S" <?php echo set_form_select($editar,$form,'ativo', 'S'); ?>>Sim</option>
                    <option value="N" <?php echo set_form_select($editar,$form,'ativo', 'N'); ?>>Não</option>
                  </select>
                </div>


                <div class="col-sm-6">
                  <label>E-mail</label>
                  <input class="form-control <?php echo form_status('email'); ?>" type="text" name="email" maxlength="95" value="<?php echo set_form_value($editar,$form,'email'); ?>">
                </div>
                <div class="col-sm-3">
                  <label>Telefone</label>
                  <input class="form-control <?php echo form_status('telefone'); ?>" type="text" name="telefone" maxlength="14" data-mask="(99) 9999-9999" value="<?php echo set_form_value($editar,$form,'telefone'); ?>">
                </div>
                <div class="col-sm-3">
                  <label>Celular</label>
                  <input class="form-control <?php echo form_status('celular'); ?>" type="text" name="celular" maxlength="15" data-mask="(99) 99999-9999" value="<?php echo set_form_value($editar,$form,'celular'); ?>">
                </div>
                

              </div>

            </div>
          </div>
        </div>

        
        <?php $this->load->view('include/botoes-form'); ?>
      </form>
    </div>
  </div>
<?php $this->load->view('include/footer'); ?>