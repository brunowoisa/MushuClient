<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class cliente_veiculo extends CI_Controller {

  public function __construct(){
    parent::__construct();
    $this->load->model('Cliente_veiculo_mod');
    $this->load->model('Cliente_fornecedor_mod');
    $this->load->model('Acesso_mod');
    $this->Acesso_mod->verifica_sessao();
    $this->links = array(
      'novo'=>'cadastros/Cliente_veiculo/novo/',
      'atualizar'=> true,
      'fechar'=>'Menu/Cadastros'
    );
  }
  
  public function index(){
    $this->links['busca_direta'] = true;
    $data = array(
      'grid' => $this->Cliente_veiculo_mod->grid_cliente_veiculos(),
      'links' => $this->links,
      'filtro' => array(
        '1' => $this->session->userdata('filtro_cliente_veiculo')[1],
        '2' => $this->session->userdata('filtro_cliente_veiculo')[2]
      ),
      'url_filtro' => base_url().'cadastros/Cliente_veiculo/filtro/',
      'url_limpa_filtro' => base_url().'cadastros/Cliente_veiculo/limpa_filtro/'
    );
    if($this->session->flashdata('registro_inexistente'))
      $data['error'] = 'Código da Busca Direta não encontrado!';
    $this->load->view('cadastros/Cliente_veiculo/grid',$data);
  }

  public function filtro(){
    $form = $this->input->post();
    if (!empty($form)) {
      $this->session->set_userdata('filtro_cliente_veiculo', $form['filtro']);
    }
    $this->index();
  }

  public function limpa_filtro(){
    $this->session->unset_userdata('filtro_cliente_veiculo');
    $this->index();
  }

  public function novo(){
    $this->links['voltar'] = 'cadastros/Cliente_veiculo/';
    $data = array(
      'editar' => false,
      'form' => null,
      'links' => $this->links,
      'clientes' => $this->Cliente_fornecedor_mod->get_clientes(),
      'url_form' => base_url().'cadastros/Cliente_veiculo/novo/',
    );
    $form = $this->input->post();
    if (!empty($form)) {
      $form = (object) $form;
      $this->form_validation->set_rules('id_cliente', 'Cliente', 'required');
      $this->form_validation->set_rules('placa', 'Placa', 'required');
      $this->form_validation->set_rules('ativo', 'Ativo', 'required');
      if ($this->form_validation->run() == TRUE){
        $res = $this->Cliente_veiculo_mod->novo($form);
        if(!$res){
          $data['error'] = 'Erro ao cadastrar! Tente novamente.';
        }
        else{
          $this->session->set_flashdata('sucesso_cadastro', true);
          redirect('cadastros/Cliente_veiculo/editar/'.$res,'refresh');
        }
      }
      else
        $data['form_erros'] = validation_errors();
    }
    $this->load->view('cadastros/Cliente_veiculo/form',$data);
  }

  public function editar($id_cliente_veiculo){
    $this->links['voltar'] = 'cadastros/Cliente_veiculo/';
    $data = array(
      'id_cliente_veiculo' => $id_cliente_veiculo,
      'editar' => true,
      'form' => null,
      'links' => $this->links,
      'clientes' => $this->Cliente_fornecedor_mod->get_clientes(),
      'url_form' => base_url().'cadastros/Cliente_veiculo/editar/'.$id_cliente_veiculo,
    );
    $form = $this->input->post();
    if (!empty($form)) {
      $form = (object) $form;
      $this->form_validation->set_rules('id_cliente', 'Cliente', 'required');
      $this->form_validation->set_rules('placa', 'Placa', 'required');
      $this->form_validation->set_rules('ativo', 'Ativo', 'required');
      if ($this->form_validation->run() == TRUE){

        $res = $this->Cliente_veiculo_mod->editar($form,$id_cliente_veiculo);
        if(!$res){
          $data['error'] = 'Erro ao alterar! Tente novamente.';
        }
        else{
          $data['success'] = 'Veículo alterado com sucesso!';
        }
      }
      else
        $data['form_erros'] = validation_errors();
    }
    $data['form'] = $this->Cliente_veiculo_mod->get_cliente_veiculo($id_cliente_veiculo);
    if($data['form'] == null){
      $this->session->set_flashdata('registro_inexistente', true);
      redirect('cadastros/Cliente_veiculo/','refresh');
    }
    if($this->session->flashdata('sucesso_cadastro'))
      $data['success'] = 'Veículo cadastrado com sucesso!';
    $this->load->view('cadastros/Cliente_veiculo/form',$data);
  }
}
