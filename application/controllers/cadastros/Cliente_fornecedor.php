<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class cliente_fornecedor extends CI_Controller {

  public function __construct(){
    parent::__construct();
    $this->load->model('Cliente_fornecedor_mod');
    $this->load->model('Tabela_preco_mod');
    $this->load->model('Acesso_mod');
    $this->Acesso_mod->verifica_sessao();
    $this->links = array(
      'novo'=>'cadastros/Cliente_fornecedor/novo/',
      'atualizar'=> true,
      'fechar'=>'Menu/Cadastros'
    );
  }
  
  public function index(){
    $this->links['busca_direta'] = true;
    $data = array(
      'grid' => $this->Cliente_fornecedor_mod->grid_cliente_fornecedor(),
      'links' => $this->links,
      'filtro' => array(
        '1' => $this->session->userdata('filtro_cliente_fornecedor')[1],
        '2' => $this->session->userdata('filtro_cliente_fornecedor')[2]
      ),
      'url_filtro' => base_url().'cadastros/Cliente_fornecedor/filtro/',
      'url_limpa_filtro' => base_url().'cadastros/Cliente_fornecedor/limpa_filtro/'
    );
    if($this->session->flashdata('registro_inexistente'))
      $data['error'] = 'Código da Busca Direta não encontrado!';
    $this->load->view('cadastros/Cliente_fornecedor/grid',$data);
    
  }

  public function filtro(){
    $form = $this->input->post();
    if (!empty($form)) {
      $this->session->set_userdata('filtro_cliente_fornecedor', $form['filtro']);
    }
    $this->index();
  }

  public function limpa_filtro(){
    $this->session->unset_userdata('filtro_cliente_fornecedor');
    $this->index();
  }

  public function novo(){
    $this->links['voltar'] = 'cadastros/Cliente_fornecedor/';
    $data = array(
      'editar' => false,
      'form' => null,
      'links' => $this->links,
      'tabelas_precos' => $this->Tabela_preco_mod->get_tabela_precos(),
      'url_form' => base_url().'cadastros/Cliente_fornecedor/novo/',
    );
    $form = $this->input->post();
    if (!empty($form)) {
      $form = (object) $form;
      $this->form_validation->set_rules('vinculo[]', 'Cliente / Fornecedor / Transportadora', 'required');
      $this->form_validation->set_rules('apelido', 'Apelido', 'required');
      $this->form_validation->set_rules('pessoa', 'Pessoa', 'required');
      if($form->pessoa == 'J'){
        $this->form_validation->set_rules('cnpj', 'CNPJ', 'required');
        $this->form_validation->set_rules('indicador_ie', 'Indicador IE', 'required');
        $this->form_validation->set_rules('telefone_fixo1', 'Telefone Fixo 1', 'required');
        $this->form_validation->set_rules('email', 'E-mail', 'required');
        if($form->indicador_ie == 'C'){
          $this->form_validation->set_rules('ie', 'IE', 'required');
        }
      }elseif($form->pessoa == 'F'){
        $this->form_validation->set_rules('cpf', 'CPF', 'required');
        $this->form_validation->set_rules('rg', 'RG', 'required');
      }elseif($form->pessoa == 'E'){
        $this->form_validation->set_rules('doc_extrangeiro', 'Documento Extrangeiro', 'required');
      }
      $this->form_validation->set_rules('cep', 'CEP', 'required');
      $this->form_validation->set_rules('endereco', 'Endereço', 'required');
      $this->form_validation->set_rules('numero', 'Número', 'required');
      $this->form_validation->set_rules('bairro', 'Bairro', 'required');
      $this->form_validation->set_rules('id_cidade', 'Cidade', 'required');
      $this->form_validation->set_rules('cpais', 'País', 'required');
      if ($this->form_validation->run() == TRUE){
        $res = $this->Cliente_fornecedor_mod->novo($form);
        if(!$res){
          $data['error'] = 'Erro ao cadastrar! Tente novamente.';
        }
        else{
          $this->session->set_flashdata('sucesso_cadastro', true);
          redirect('cadastros/Cliente_fornecedor/editar/'.$res,'refresh');
        }
      }
      else
        $data['form_erros'] = validation_errors();
    }
    $this->load->view('cadastros/Cliente_fornecedor/form',$data);
  }

  public function editar($id_cliente_fornecedor){
    $this->links['voltar'] = 'cadastros/Cliente_fornecedor/';
    $data = array(
      'id_cliente_fornecedor' => $id_cliente_fornecedor,
      'editar' => true,
      'form' => null,
      'links' => $this->links,
      'tabelas_precos' => $this->Tabela_preco_mod->get_tabela_precos(),
      'url_form' => base_url().'cadastros/Cliente_fornecedor/editar/'.$id_cliente_fornecedor,
    );
    $form = $this->input->post();
    if (!empty($form)) {
      $form = (object) $form;
      $this->form_validation->set_rules('vinculo[]', 'Cliente / Fornecedor / Transportadora', 'required');
      $this->form_validation->set_rules('apelido', 'Apelido', 'required');
      $this->form_validation->set_rules('pessoa', 'Pessoa', 'required');
      if($form->pessoa == 'J'){
        $this->form_validation->set_rules('cnpj', 'CNPJ', 'required');
        $this->form_validation->set_rules('indicador_ie', 'Indicador IE', 'required');
        $this->form_validation->set_rules('telefone_fixo1', 'Telefone Fixo 1', 'required');
        $this->form_validation->set_rules('email', 'E-mail', 'required');
        if($form->indicador_ie == 'C'){
          $this->form_validation->set_rules('ie', 'IE', 'required');
        }
      }elseif($form->pessoa == 'F'){
        $this->form_validation->set_rules('cpf', 'CPF', 'required');
        $this->form_validation->set_rules('rg', 'RG', 'required');
      }elseif($form->pessoa == 'E'){
        $this->form_validation->set_rules('doc_extrangeiro', 'Documento Extrangeiro', 'required');
      }
      $this->form_validation->set_rules('cep', 'CEP', 'required');
      $this->form_validation->set_rules('endereco', 'Endereço', 'required');
      $this->form_validation->set_rules('numero', 'Número', 'required');
      $this->form_validation->set_rules('bairro', 'Bairro', 'required');
      $this->form_validation->set_rules('id_cidade', 'Cidade', 'required');
      $this->form_validation->set_rules('cpais', 'País', 'required');
      if ($this->form_validation->run() == TRUE){

        $res = $this->Cliente_fornecedor_mod->editar($form,$id_cliente_fornecedor);
        if(!$res){
          $data['error'] = 'Erro ao alterar! Tente novamente.';
        }
        else{
          $data['success'] = 'Cadastro alterado com sucesso!';
        }
      }
      else
        $data['form_erros'] = validation_errors();
    }
    $data['form'] = $this->Cliente_fornecedor_mod->get_cliente_fornecedor($id_cliente_fornecedor);
    if($data['form'] == null){
      $this->session->set_flashdata('registro_inexistente', true);
      redirect('cadastros/Cliente_fornecedor/','refresh');
    }
    if($this->session->flashdata('sucesso_cadastro'))
      $data['success'] = 'Cadastrado com sucesso!';
    $this->load->view('cadastros/Cliente_fornecedor/form',$data);
  }
}
