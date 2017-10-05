<?php $this->load->view('include/top'); ?>
  <div class="panel">
    <div class="panel-header">
      <h3><i class="fa fa-users"></i>Cadastro de Grupos de Clientes e Fornecedores</h3>
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
                <div class="col-sm-3">
                  <label>Tipo</label>
                  <select class="form-control <?php echo form_status('tipo'); ?>" name="tipo">
                    <option value="">--Selecione--</option>
                    <option value="C" <?php echo set_form_select($editar,$form,'tipo', 'C'); ?>>Cliente</option>
                    <option value="F" <?php echo set_form_select($editar,$form,'tipo', 'F'); ?>>Fornecedor</option>
                  </select>
                </div>
                <div class="col-sm-4">
                  <label>Descrição</label>
                  <input class="form-control <?php echo form_status('descricao'); ?>" type="text"  name="descricao" maxlength="75" placeholder="Informe a descrição..." value="<?php echo set_form_value($editar,$form,'descricao'); ?>">
                </div>
                <div class="col-sm-3">
                  <label>Tabela Obrigatória</label>
                  <select class="form-control <?php echo form_status('id_tabela_preco_obrigatoria'); ?>" name="id_tabela_preco_obrigatoria">
                    <option value="">--Selecione--</option>
                    <?php foreach ($tabelas_precos as $key): ?>
                      <option value="<?php echo $key->id; ?>" <?php echo set_form_select($editar,$form,'id_tabela_preco_obrigatoria', $key->id); ?>><?php echo $key->descricao; ?></option>
                    <?php endforeach ?>
                  </select>
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