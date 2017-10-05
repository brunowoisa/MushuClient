<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class cliente_fornecedor_grupo extends CI_Controller {

  public function __construct(){
    parent::__construct();
    $this->load->model('Cliente_fornecedor_grupo_mod');
    $this->load->model('Tabela_preco_mod');
    $this->load->model('Acesso_mod');
    $this->Acesso_mod->verifica_sessao();
    $this->links = array(
      'novo'=>'cadastros/Cliente_fornecedor_grupo/novo/',
      'atualizar'=> true,
      'fechar'=>'Menu/Cadastros'
    );
  }
  
  public function index(){
    $this->links['busca_direta'] = true;
    $data = array(
      'grid' => $this->Cliente_fornecedor_grupo_mod->grid_cliente_fornecedor_grupos(),
      'links' => $this->links,
      'filtro' => array(
        '1' => $this->session->userdata('filtro_cliente_fornecedor_grupo')[1],
        '2' => $this->session->userdata('filtro_cliente_fornecedor_grupo')[2]
      ),
      'url_filtro' => base_url().'cadastros/Cliente_fornecedor_grupo/filtro/',
      'url_limpa_filtro' => base_url().'cadastros/Cliente_fornecedor_grupo/limpa_filtro/'
    );
    if($this->session->flashdata('registro_inexistente'))
      $data['error'] = 'Código da Busca Direta não encontrado!';
    $this->load->view('cadastros/Cliente_fornecedor_grupo/grid',$data);
  }

  public function filtro(){
    $form = $this->input->post();
    if (!empty($form)) {
      $this->session->set_userdata('filtro_cliente_fornecedor_grupo', $form['filtro']);
    }
    $this->index();
  }

  public function limpa_filtro(){
    $this->session->unset_userdata('filtro_cliente_fornecedor_grupo');
    $this->index();
  }

  public function novo(){
    $this->links['voltar'] = 'cadastros/Cliente_fornecedor_grupo/';
    $data = array(
      'editar' => false,
      'form' => null,
      'links' => $this->links,
      'tabelas_precos' => $this->Tabela_preco_mod->get_tabela_precos(),
      'url_form' => base_url().'cadastros/Cliente_fornecedor_grupo/novo/',
    );
    $form = $this->input->post();
    if (!empty($form)) {
      $form = (object) $form;
      $this->form_validation->set_rules('tipo', 'Tipo', 'required');
      $this->form_validation->set_rules('descricao', 'Descrição', 'required');
      $this->form_validation->set_rules('id_tabela_preco_obrigatoria', 'Tabela Obrigatória', 'required');
      if ($this->form_validation->run() == TRUE){
        $res = $this->Cliente_fornecedor_grupo_mod->novo($form);
        if(!$res){
          $data['error'] = 'Erro ao cadastrar! Tente novamente.';
        }
        else{
          $this->session->set_flashdata('sucesso_cadastro', true);
          redirect('cadastros/Cliente_fornecedor_grupo/editar/'.$res,'refresh');
        }
      }
      else
        $data['form_erros'] = validation_errors();
    }
    $this->load->view('cadastros/Cliente_fornecedor_grupo/form',$data);
  }

  public function editar($id_cliente_fornecedor_grupo){
    $this->links['voltar'] = 'cadastros/Cliente_fornecedor_grupo/';
    $data = array(
      'id_cliente_fornecedor_grupo' => $id_cliente_fornecedor_grupo,
      'editar' => true,
      'form' => null,
      'links' => $this->links,
      'tabelas_precos' => $this->Tabela_preco_mod->get_tabela_precos(),
      'url_form' => base_url().'cadastros/Cliente_fornecedor_grupo/editar/'.$id_cliente_fornecedor_grupo,
    );
    $form = $this->input->post();
    if (!empty($form)) {
      $form = (object) $form;
      $this->form_validation->set_rules('tipo', 'Tipo', 'required');
      $this->form_validation->set_rules('descricao', 'Descrição', 'required');
      $this->form_validation->set_rules('id_tabela_preco_obrigatoria', 'Tabela Obrigatória', 'required');
      if ($this->form_validation->run() == TRUE){

        $res = $this->Cliente_fornecedor_grupo_mod->editar($form,$id_cliente_fornecedor_grupo);
        if(!$res){
          $data['error'] = 'Erro ao alterar! Tente novamente.';
        }
        else{
          $data['success'] = 'Grupo alterado com sucesso!';
        }
      }
      else
        $data['form_erros'] = validation_errors();
    }
    $data['form'] = $this->Cliente_fornecedor_grupo_mod->get_cliente_fornecedor_grupo($id_cliente_fornecedor_grupo);
    if($data['form'] == null){
      $this->session->set_flashdata('registro_inexistente', true);
      redirect('cadastros/Cliente_fornecedor_grupo/','refresh');
    }
    if($this->session->flashdata('sucesso_cadastro'))
      $data['success'] = 'Grupo cadastrado com sucesso!';
    $this->load->view('cadastros/Cliente_fornecedor_grupo/form',$data);
  }
}
