<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Autorizado extends CI_Controller {

  public function __construct(){
    parent::__construct();
    $this->load->model('Autorizado_mod');
    $this->load->model('Acesso_mod');
    $this->Acesso_mod->verifica_sessao();
    $this->links = array(
      'novo'=>'Ferramenta/Autorizado/novo/',
      'atualizar'=> true,
      'fechar'=>'Home'
    );
  }
  
  public function index(){
    $data = array(
      'grid' => $this->Autorizado_mod->grid_cliente_autorizados(),
      'links' => $this->links,
    );
    if($this->session->flashdata('registro_inexistente'))
      $data['error'] = 'Código da Busca Direta não encontrado!';
    $this->load->view('Ferramenta/Autorizado/grid',$data);
  }

  public function novo(){
    $this->links['voltar'] = 'Ferramenta/Autorizado/';
    $data = array(
      'editar' => false,
      'form' => null,
      'links' => $this->links,
      'url_form' => base_url().'Ferramenta/Autorizado/novo/',
    );
    $form = $this->input->post();
    if (!empty($form)) {
      $form = (object) $form;
      $this->form_validation->set_rules('nome', 'Nome', 'required');
      $this->form_validation->set_rules('apelido', 'Apelido', 'required');
      $this->form_validation->set_rules('ativo', 'Ativo', 'required');
      if ($this->form_validation->run() == TRUE){
        $res = $this->Autorizado_mod->novo($form);
        if(!$res){
          $data['error'] = 'Erro ao cadastrar! Tente novamente.';
        }
        else{
          $this->session->set_flashdata('sucesso_cadastro', true);
          redirect('Ferramenta/Autorizado/editar/'.$res,'refresh');
        }
      }
      else
        $data['form_erros'] = validation_errors();
    }
    $this->load->view('Ferramenta/Autorizado/form',$data);
  }

  public function editar($id_Autorizado){
    $this->links['voltar'] = 'Ferramenta/Autorizado/';
    $data = array(
      'id_Autorizado' => $id_Autorizado,
      'editar' => true,
      'form' => null,
      'links' => $this->links,
      'url_form' => base_url().'Ferramenta/Autorizado/editar/'.$id_Autorizado,
    );
    $form = $this->input->post();
    if (!empty($form)) {
      $form = (object) $form;
      $this->form_validation->set_rules('nome', 'Nome', 'required');
      $this->form_validation->set_rules('apelido', 'Apelido', 'required');
      $this->form_validation->set_rules('ativo', 'Ativo', 'required');
      $this->form_validation->set_rules('usa_sistema', 'Usa o Sistema?', 'required');
      if($form->usa_sistema == 'S')
        $this->form_validation->set_rules('login', 'Login', 'required');
        $this->form_validation->set_rules('email', 'E-mail', 'required');
      if ($this->form_validation->run() == TRUE){

        $res = $this->Autorizado_mod->editar($form,$id_Autorizado);
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
    $data['form'] = $this->Autorizado_mod->get_cliente_autorizado($id_Autorizado);
    if($data['form'] == null){
      $this->session->set_flashdata('registro_inexistente', true);
      redirect('Ferramenta/Autorizado/','refresh');
    }
    if($this->session->flashdata('sucesso_cadastro'))
      $data['success'] = 'Autorizado cadastrado com sucesso!';
    $this->load->view('Ferramenta/Autorizado/form',$data);
  }
}
