<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Movimentacao extends CI_Controller {

  public function __construct(){
    parent::__construct();
    $this->load->model('Movimentacao_mod');
    $this->load->model('Veiculo_mod');
    $this->load->model('Acesso_mod');
    $this->Acesso_mod->verifica_sessao();
    $this->links = array(
      'atualizar'=> true,
      'fechar'=>'Home'
    );
  }
  
  public function index(){
    $data = array(
      'grid' => $this->Movimentacao_mod->grid_movimentacao_convenios(),
      'links' => $this->links,
    );
    $this->load->view('Ferramenta/Movimentacao/grid',$data);
  }

  public function historico($id_veiculo){
    $this->links['voltar'] = 'Ferramenta/Movimentacao/';
    $data = array(
      'links' => $this->links,
      'veiculo' => $this->Veiculo_mod->get_cliente_veiculo($id_veiculo),
      'grid' => $this->Movimentacao_mod->get_movimentacoes_veiculo($id_veiculo),
    );
    $this->load->view('Ferramenta/Movimentacao/historico',$data);
  }

  public function editar($id_Movimentacao){
    $mov = $this->Movimentacao_mod->get_movimentacao_convenio($id_Movimentacao);
    $this->links['voltar'] = 'Ferramenta/Movimentacao/historico/'.$mov->id_veiculo;
    $data = array(
      'id_Movimentacao' => $id_Movimentacao,
      'editar' => true,
      'form' => null,
      'links' => $this->links,
      'url_form' => base_url().'Ferramenta/Movimentacao/editar/'.$id_Movimentacao,
    );
    $data['form'] = $this->Movimentacao_mod->get_movimentacao_convenio($id_Movimentacao);
    $this->load->view('Ferramenta/Movimentacao/form',$data);
  }
}
