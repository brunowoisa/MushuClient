<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Veiculo extends CI_Controller {

  public function __construct(){
    parent::__construct();
    $this->load->model('Veiculo_mod');
    $this->load->model('Acesso_mod');
    $this->Acesso_mod->verifica_sessao();
    $this->links = array(
      'novo'=>'Ferramenta/Veiculo/novo/',
      'atualizar'=> true,
      'fechar'=>'Home'
    );
  }
  
  public function index(){
    $data = array(
      'grid' => $this->Veiculo_mod->grid_cliente_veiculos(),
      'links' => $this->links,
    );
    if($this->session->flashdata('registro_inexistente'))
      $data['error'] = 'Código da Busca Direta não encontrado!';
    $this->load->view('Ferramenta/Veiculo/grid',$data);
  }
  
  public function novo(){
    $this->links['voltar'] = 'Ferramenta/Veiculo/';
    $data = array(
      'editar' => false,
      'form' => null,
      'links' => $this->links,
      'url_form' => base_url().'Ferramenta/Veiculo/novo/',
    );
    $form = $this->input->post();
    if (!empty($form)) {
      $form = (object) $form;
      $this->form_validation->set_rules('placa', 'Placa', 'required');
      $this->form_validation->set_rules('ativo', 'Ativo', 'required');
      if ($this->form_validation->run() == TRUE){
        $res = $this->Veiculo_mod->novo($form);
        if(!$res){
          $data['error'] = 'Erro ao cadastrar! Tente novamente.';
        }
        else{
          $this->session->set_flashdata('sucesso_cadastro', true);
          redirect('Ferramenta/Veiculo/editar/'.$res,'refresh');
        }
      }
      else
        $data['form_erros'] = validation_errors();
    }
    $this->load->view('Ferramenta/Veiculo/form',$data);
  }

  public function editar($id_Veiculo){
    $this->links['voltar'] = 'Ferramenta/Veiculo/';
    $data = array(
      'id_Veiculo' => $id_Veiculo,
      'editar' => true,
      'form' => null,
      'links' => $this->links,
      'url_form' => base_url().'Ferramenta/Veiculo/editar/'.$id_Veiculo,
    );
    $form = $this->input->post();
    if (!empty($form)) {
      $form = (object) $form;
      $this->form_validation->set_rules('placa', 'Placa', 'required');
      $this->form_validation->set_rules('ativo', 'Ativo', 'required');
      if ($this->form_validation->run() == TRUE){

        $res = $this->Veiculo_mod->editar($form,$id_Veiculo);
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
    $data['form'] = $this->Veiculo_mod->get_cliente_veiculo($id_Veiculo);
    if($data['form'] == null){
      $this->session->set_flashdata('registro_inexistente', true);
      redirect('Ferramenta/Veiculo/','refresh');
    }
    if($this->session->flashdata('sucesso_cadastro'))
      $data['success'] = 'Veículo cadastrado com sucesso!';
    $this->load->view('Ferramenta/Veiculo/form',$data);
  }
}
