<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class cliente_autorizado extends CI_Controller {

  public function __construct(){
    parent::__construct();
    $this->load->model('Cliente_autorizado_mod');
    $this->load->model('Cliente_fornecedor_mod');
    $this->load->model('Acesso_mod');
    $this->Acesso_mod->verifica_sessao();
    $this->links = array(
      'novo'=>'cadastros/Cliente_autorizado/novo/',
      'atualizar'=> true,
      'fechar'=>'Menu/Cadastros'
    );
  }
  
  public function index(){
    $this->links['busca_direta'] = true;
    $data = array(
      'grid' => $this->Cliente_autorizado_mod->grid_cliente_autorizados(),
      'links' => $this->links,
      'filtro' => array(
        '1' => $this->session->userdata('filtro_cliente_autorizado')[1],
        '2' => $this->session->userdata('filtro_cliente_autorizado')[2]
      ),
      'url_filtro' => base_url().'cadastros/Cliente_autorizado/filtro/',
      'url_limpa_filtro' => base_url().'cadastros/Cliente_autorizado/limpa_filtro/'
    );
    if($this->session->flashdata('registro_inexistente'))
      $data['error'] = 'Código da Busca Direta não encontrado!';
    $this->load->view('cadastros/Cliente_autorizado/grid',$data);
  }

  public function filtro(){
    $form = $this->input->post();
    if (!empty($form)) {
      $this->session->set_userdata('filtro_cliente_autorizado', $form['filtro']);
    }
    $this->index();
  }

  public function limpa_filtro(){
    $this->session->unset_userdata('filtro_cliente_autorizado');
    $this->index();
  }

  public function novo(){
    $this->links['voltar'] = 'cadastros/Cliente_autorizado/';
    $data = array(
      'editar' => false,
      'form' => null,
      'links' => $this->links,
      'clientes' => $this->Cliente_fornecedor_mod->get_clientes(),
      'url_form' => base_url().'cadastros/Cliente_autorizado/novo/',
    );
    $form = $this->input->post();
    if (!empty($form)) {
      $form = (object) $form;
      $this->form_validation->set_rules('id_cliente', 'Cliente', 'required');
      $this->form_validation->set_rules('nome', 'Nome', 'required');
      $this->form_validation->set_rules('usa_sistema', 'Usa o Sistema?', 'required');
      $this->form_validation->set_rules('ativo', 'Ativo', 'required');
      if($form->usa_sistema == 'S')
        $this->form_validation->set_rules('cpf', 'CPF', 'required');
      if ($this->form_validation->run() == TRUE){
        $res = $this->Cliente_autorizado_mod->novo($form);
        if(!$res){
          $data['error'] = 'Erro ao cadastrar! Tente novamente.';
        }
        else{
          $this->session->set_flashdata('sucesso_cadastro', true);
          redirect('cadastros/Cliente_autorizado/editar/'.$res,'refresh');
        }
      }
      else
        $data['form_erros'] = validation_errors();
    }
    $this->load->view('cadastros/Cliente_autorizado/form',$data);
  }

  public function editar($id_cliente_autorizado){
    $this->links['voltar'] = 'cadastros/Cliente_autorizado/';
    $data = array(
      'id_cliente_autorizado' => $id_cliente_autorizado,
      'editar' => true,
      'form' => null,
      'links' => $this->links,
      'clientes' => $this->Cliente_fornecedor_mod->get_clientes(),
      'url_form' => base_url().'cadastros/Cliente_autorizado/editar/'.$id_cliente_autorizado,
    );
    $form = $this->input->post();
    if (!empty($form)) {
      $form = (object) $form;
      $this->form_validation->set_rules('id_cliente', 'Cliente', 'required');
      $this->form_validation->set_rules('nome', 'Nome', 'required');
      $this->form_validation->set_rules('usa_sistema', 'Usa o Sistema?', 'required');
      $this->form_validation->set_rules('ativo', 'Ativo', 'required');
      if($form->usa_sistema == 'S')
        $this->form_validation->set_rules('cpf', 'CPF', 'required');
      if ($this->form_validation->run() == TRUE){

        $res = $this->Cliente_autorizado_mod->editar($form,$id_cliente_autorizado);
        if(!$res){
          $data['error'] = 'Erro ao alterar! Tente novamente.';
        }
        else{
          $data['success'] = 'Autorizado alterado com sucesso!';
        }
      }
      else
        $data['form_erros'] = validation_errors();
    }
    $data['form'] = $this->Cliente_autorizado_mod->get_cliente_autorizado($id_cliente_autorizado);
    if($data['form'] == null){
      $this->session->set_flashdata('registro_inexistente', true);
      redirect('cadastros/Cliente_autorizado/','refresh');
    }
    if($this->session->flashdata('sucesso_cadastro'))
      $data['success'] = 'Autorizado cadastrado com sucesso!';
    $this->load->view('cadastros/Cliente_autorizado/form',$data);
  }
}
