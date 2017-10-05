<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Veiculo extends CI_Controller {

  public function __construct(){
    parent::__construct();
    $this->load->model('Veiculo_mod');
    $this->load->model('Acesso_mod');
    $this->Acesso_mod->verifica_sessao();
    $this->links = array(
      'novo'=>'cadastros/Veiculo/novo/',
      'atualizar'=> true,
      'fechar'=>'Menu/Cadastros'
    );
  }
  
  public function index(){
    $data = array(
      'grid' => $this->Veiculo_mod->grid_Veiculos(),
      'links' => $this->links,
      'filtro' => array(
        '1' => $this->session->userdata('filtro_Veiculo')[1],
        '2' => $this->session->userdata('filtro_Veiculo')[2]
      ),
      'url_filtro' => base_url().'cadastros/Veiculo/filtro/',
      'url_limpa_filtro' => base_url().'cadastros/Veiculo/limpa_filtro/'
    );
    if($this->session->flashdata('registro_inexistente'))
      $data['error'] = 'Código da Busca Direta não encontrado!';
    $this->load->view('cadastros/Veiculo/grid',$data);
  }

  public function filtro(){
    $form = $this->input->post();
    if (!empty($form)) {
      $this->session->set_userdata('filtro_Veiculo', $form['filtro']);
    }
    $this->index();
  }

  public function limpa_filtro(){
    $this->session->unset_userdata('filtro_Veiculo');
    $this->index();
  }

  public function novo(){
    $this->links['voltar'] = 'cadastros/Veiculo/';
    $data = array(
      'editar' => false,
      'form' => null,
      'links' => $this->links,
      'url_form' => base_url().'cadastros/Veiculo/novo/',
    );
    $form = $this->input->post();
    if (!empty($form)) {
      $form = (object) $form;
      $this->form_validation->set_rules('marca', 'Marca', 'required');
      $this->form_validation->set_rules('modelo', 'Modelo', 'required');
      if ($this->form_validation->run() == TRUE){
        $res = $this->Veiculo_mod->novo($form);
        if(!$res){
          $data['error'] = 'Erro ao cadastrar! Tente novamente.';
        }
        else{
          $this->session->set_flashdata('sucesso_cadastro', true);
          redirect('cadastros/Veiculo/editar/'.$res,'refresh');
        }
      }
      else
        $data['form_erros'] = validation_errors();
    }
    $this->load->view('cadastros/Veiculo/form',$data);
  }

  public function editar($id_Veiculo){
    $this->links['voltar'] = 'cadastros/Veiculo/';
    $data = array(
      'id_Veiculo' => $id_Veiculo,
      'editar' => true,
      'form' => null,
      'links' => $this->links,
      'url_form' => base_url().'cadastros/Veiculo/editar/'.$id_Veiculo,
    );
    $form = $this->input->post();
    if (!empty($form)) {
      $form = (object) $form;
      $this->form_validation->set_rules('marca', 'Marca', 'required');
      $this->form_validation->set_rules('modelo', 'Modelo', 'required');
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
    $data['form'] = $this->Veiculo_mod->get_Veiculo($id_Veiculo);
    if($data['form'] == null){
      $this->session->set_flashdata('registro_inexistente', true);
      redirect('cadastros/Veiculo/','refresh');
    }
    if($this->session->flashdata('sucesso_cadastro'))
      $data['success'] = 'Veículo cadastrado com sucesso!';
    $this->load->view('cadastros/Veiculo/form',$data);
  }
}
