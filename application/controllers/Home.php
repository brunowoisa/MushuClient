<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class home extends CI_Controller {

  public function __construct(){
    parent::__construct();
    $this->load->model('Acesso_mod');
    $this->Acesso_mod->verifica_sessao();
    $this->links = array(
      'atualizar'=> true,
      'fechar'=>'Home'
    );
  }
  
  public function index(){
    $data = array();
    $data['links'] = false;
    $this->load->view('home',$data);
  }

  public function perfil(){
    $this->load->model('Autorizado_mod');
    $data = array(
      'editar' => true,
      'form' => null,
      'links' => $this->links,
      'url_form' => base_url().'Home/perfil/',
    );
    $form = $this->input->post();
    if (!empty($form)) {
      $form = (object) $form;
      $this->form_validation->set_rules('nome', 'Nome', 'required');
      $this->form_validation->set_rules('apelido', 'Apelido', 'required');
      $this->form_validation->set_rules('data_nascimento', 'Data de Nascimento', 'required');
      $this->form_validation->set_rules('login', 'Login', 'required');
      $this->form_validation->set_rules('email', 'E-mail', 'required');
      if ($this->form_validation->run() == TRUE){

        $erro_upload = false;
        $upload = null;
        if($_FILES['userfile']['name'] != null){
          $config['upload_path']          = '../Mushu/assets/uploads/_clientes/foto/';
          $config['allowed_types']        = 'jpg|png';
          $config['max_width']            = 800;
          $config['max_height']           = 1000;
          $this->load->library('upload', $config);
          if (!$this->upload->do_upload('userfile')){
            $data['error'] = $this->upload->display_errors();
            $erro_upload = true;
            $data['form'] = $form;
          }
          else{
            $upload = $this->upload->data();
          }
        }
        if(!$erro_upload){
          $res = $this->Autorizado_mod->editar_perfil($form,$this->session->userdata('cliente_autorizado')->id,$upload);
          if(!$res){
            $data['error'] = 'Erro ao alterar! Tente novamente.';
          }
          else{
            $data['success'] = 'Perfil alterado com sucesso!';
          }
        }
      }
      else
        $data['form_erros'] = validation_errors();
    }
    $data['form'] = $this->Autorizado_mod->get_cliente_autorizado($this->session->userdata('cliente_autorizado')->id);
    $this->load->view('perfil',$data);
  }

  public function senha(){
    $this->load->model('Autorizado_mod');
    $data = array(
      'editar' => false,
      'form' => null,
      'links' => $this->links,
      'url_form' => base_url().'Home/senha/',
    );
    $form = $this->input->post();
    if (!empty($form)) {
      $form = (object) $form;
      $this->form_validation->set_rules('senha_atual', 'Senha Atual', 'required');
      $this->form_validation->set_rules('nova_senha', 'Nova Senha', 'required');
      $this->form_validation->set_rules('confirmacao_nova_senha', 'Confirmação da Senha', 'required');
      if ($this->form_validation->run() == TRUE){

        if ($form->nova_senha == $form->confirmacao_nova_senha) {
          if ($this->session->userdata('cliente_autorizado')->senha == $form->senha_atual) {
            $res = $this->Autorizado_mod->editar_senha($form,$this->session->userdata('cliente_autorizado')->id);
            if(!$res){
              $data['error'] = 'Erro ao alterar! Tente novamente.';
            }
            else{
              $data['success'] = 'Senha alterada com sucesso!';
            }
          }
          else{
            $data['error'] = "A senha atual não confere.";
          }
        }
        else{
          $data['error'] = "As novas senhas não são iguais.";
        }




      }
      else
        $data['form_erros'] = validation_errors();
    }
    $data['form'] = $this->Autorizado_mod->get_cliente_autorizado($this->session->userdata('cliente_autorizado')->id);
    $this->load->view('senha',$data);
  }
}
