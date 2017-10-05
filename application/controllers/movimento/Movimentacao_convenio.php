<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Movimentacao_convenio extends CI_Controller {

  public function __construct(){
    parent::__construct();
    $this->load->model('Movimentacao_convenio_mod');
    $this->load->model('Cliente_fornecedor_mod');
    $this->load->model('Cliente_veiculo_mod');
    $this->load->model('Funcionario_mod');
    $this->load->model('Acesso_mod');
    $this->Acesso_mod->verifica_sessao();
    $this->links = array(
      'novo'=>'movimento/Movimentacao_convenio/novo/',
      'atualizar'=> true,
      'fechar'=>'Menu/movimento'
    );
  }
  
  public function index(){
    $data = array(
      'grid' => $this->Movimentacao_convenio_mod->grid_Movimentacao_convenios(),
      'links' => $this->links,
      'filtro' => array(
        '1' => $this->session->userdata('filtro_Movimentacao_convenio')[1],
        '2' => $this->session->userdata('filtro_Movimentacao_convenio')[2]
      ),
      'url_filtro' => base_url().'movimento/Movimentacao_convenio/filtro/',
      'url_limpa_filtro' => base_url().'movimento/Movimentacao_convenio/limpa_filtro/'
    );
    if($this->session->flashdata('registro_inexistente'))
      $data['error'] = 'Código da Busca Direta não encontrado!';
    $this->load->view('movimento/Movimentacao_convenio/grid',$data);
  }

  public function filtro(){
    $form = $this->input->post();
    if (!empty($form)) {
      $this->session->set_userdata('filtro_Movimentacao_convenio', $form['filtro']);
    }
    $this->index();
  }

  public function limpa_filtro(){
    $this->session->unset_userdata('filtro_Movimentacao_convenio');
    $this->index();
  }

  public function novo($id_veiculo=null){
    if($id_veiculo!='')
      $this->links['voltar'] = 'movimento/Movimentacao_convenio/historico/'.$id_veiculo;
    else
      $this->links['voltar'] = 'movimento/Movimentacao_convenio/';
    $data = array(
      'links' => $this->links,
      'clientes' => $this->Cliente_fornecedor_mod->get_clientes(),
      'tecnicos' => $this->Funcionario_mod->get_tecnicos(),
      'url_form' => base_url().'movimento/Movimentacao_convenio/novo/',
    );
    if ($id_veiculo != null) {
      $veiculo = $this->Cliente_veiculo_mod->get_cliente_veiculo($id_veiculo);
      $data['form']['id_veiculo'] = $id_veiculo;
      $data['form']['id_cliente'] = $veiculo->id_cliente;
      $data['form'] = (object)$data['form'];
      $data['editar'] = true;
    }
    else{
      $data['form'] = null;
      $data['editar'] = false;
    }
    $form = $this->input->post();
    if (!empty($form)) {
      $form = (object) $form;
      $this->form_validation->set_message('numeric', 'O campo %s é obrigatório.');
      $this->form_validation->set_rules('id_cliente', 'Cliente', 'required');
      $this->form_validation->set_rules('id_veiculo', 'Veículo', 'required|numeric');
      $this->form_validation->set_rules('id_autorizado', 'Autorizado', 'required|numeric');
      $this->form_validation->set_rules('id_tecnico', 'Técnico', 'required');
      $this->form_validation->set_rules('seq_shop9', 'Sequência Shop9', 'required');
      $this->form_validation->set_rules('trocou_oleo', 'Calcula próxima troca de óleo?', 'required');
      if ($form->trocou_oleo == 'S') 
        $this->form_validation->set_rules('km', 'Quilometragem Atual', 'required|numeric');
      $this->form_validation->set_rules('descricao', 'Descrição', 'required');

      if ($this->form_validation->run() == TRUE){
        $res = $this->Movimentacao_convenio_mod->novo($form);
        if(!$res){
          $data['error'] = 'Erro ao cadastrar! Tente novamente.';
        }
        else{
          $this->session->set_flashdata('sucesso_cadastro', true);
          redirect('movimento/Movimentacao_convenio/editar/'.$res,'refresh');
        }
      }
      else
        $data['form_erros'] = validation_errors();
    }
    $this->load->view('movimento/Movimentacao_convenio/form',$data);
  }

  public function historico($id_veiculo){
    $this->links['voltar'] = 'movimento/Movimentacao_convenio/';
    $this->links['novo'] = 'movimento/Movimentacao_convenio/novo/'.$id_veiculo;
    $data = array(
      'links' => $this->links,
      'veiculo' => $this->Cliente_veiculo_mod->get_cliente_veiculo($id_veiculo),
      'grid' => $this->Movimentacao_convenio_mod->get_movimentacoes_veiculo($id_veiculo),
    );
    $this->load->view('movimento/Movimentacao_convenio/historico',$data);
  }

  public function editar($id_Movimentacao_convenio){
    $mov = $this->Movimentacao_convenio_mod->get_Movimentacao_convenio($id_Movimentacao_convenio);
    $this->links['voltar'] = 'movimento/Movimentacao_convenio/historico/'.$mov->id_veiculo;
    $data = array(
      'id_Movimentacao_convenio' => $id_Movimentacao_convenio,
      'editar' => true,
      'form' => null,
      'links' => $this->links,
      'clientes' => $this->Cliente_fornecedor_mod->get_clientes(),
      'tecnicos' => $this->Funcionario_mod->get_tecnicos(),
      'url_form' => base_url().'movimento/Movimentacao_convenio/editar/'.$id_Movimentacao_convenio,
    );
    $form = $this->input->post();
    if (!empty($form)) {
      $form = (object) $form;
      $this->form_validation->set_message('numeric', 'O campo %s é obrigatório.');
      $this->form_validation->set_rules('id_cliente', 'Cliente', 'required');
      $this->form_validation->set_rules('id_veiculo', 'Veículo', 'required|numeric');
      $this->form_validation->set_rules('id_autorizado', 'Autorizado', 'required|numeric');
      $this->form_validation->set_rules('id_tecnico', 'Técnico', 'required');
      $this->form_validation->set_rules('seq_shop9', 'Sequência Shop9', 'required');
      $this->form_validation->set_rules('trocou_oleo', 'Calcula próxima troca de óleo?', 'required');
      if ($form->trocou_oleo == 'S') 
        $this->form_validation->set_rules('km', 'Quilometragem Atual', 'required|numeric');
      $this->form_validation->set_rules('descricao', 'Descrição', 'required');
      if ($this->form_validation->run() == TRUE){

        $res = $this->Movimentacao_convenio_mod->editar($form,$id_Movimentacao_convenio);
        if(!$res){
          $data['error'] = 'Erro ao alterar! Tente novamente.';
        }
        else{
          $data['success'] = 'Movimentacao alterada com sucesso!';
        }
      }
      else
        $data['form_erros'] = validation_errors();
    }
    $data['form'] = $this->Movimentacao_convenio_mod->get_Movimentacao_convenio($id_Movimentacao_convenio);
    if($data['form'] == null){
      $this->session->set_flashdata('registro_inexistente', true);
      redirect('movimento/Movimentacao_convenio/','refresh');
    }
    if($this->session->flashdata('sucesso_cadastro'))
      $data['success'] = 'Movimentacao cadastrado com sucesso!';
    $this->load->view('movimento/Movimentacao_convenio/form',$data);
  }
}
