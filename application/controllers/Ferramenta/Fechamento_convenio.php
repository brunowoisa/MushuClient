<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fechamento_convenio extends CI_Controller {

  public function __construct(){
    parent::__construct();
    $this->load->model('Fechamento_convenio_mod');
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
      'grid' => $this->Fechamento_convenio_mod->grid_fechamentos(),
      'links' => $this->links,
    );
    $this->load->view('Ferramenta/Fechamento_convenio/grid',$data);
  }

  public function novo(){
    $this->links['voltar'] = 'Ferramenta/Fechamento_convenio/';
    $data = array(
      'editar' => false,
      'form' => null,
      'links' => $this->links,
      'url_form' => base_url().'Ferramenta/Fechamento_convenio/novo/',
    );
    $form = $this->input->post();
    if (!empty($form)) {
      $form = (object) $form;
      $this->form_validation->set_rules('competencia', 'Competência', 'required');
      $this->form_validation->set_rules('id_cliente', 'Cliente', 'required');
      if ($this->form_validation->run() == TRUE){
        $res = $this->Fechamento_convenio_mod->novo($form);
        if(!$res){
          $data['error'] = 'Erro ao cadastrar! Tente novamente.';
        }
        else{
          $this->session->set_flashdata('sucesso_cadastro', true);
          redirect('Ferramenta/Fechamento_convenio/editar/'.$res,'refresh');
        }
      }
      else
        $data['form_erros'] = validation_errors();
    }
    $this->load->view('Ferramenta/Fechamento_convenio/form',$data);
  }

  public function editar($id_Fechamento_convenio){
    $fechamento = $this->Fechamento_convenio_mod->get_fechamento($id_Fechamento_convenio);
    $this->links['voltar'] = 'Ferramenta/Fechamento_convenio/';
    $data = array(
      'id_Fechamento_convenio' => $id_Fechamento_convenio,
      'editar' => true,
      'form' => null,
      'links' => $this->links,
      'url_form' => base_url().'Ferramenta/Fechamento_convenio/editar/'.$id_Fechamento_convenio,
    );
    $form = $this->input->post();
    $data['diretorio'] = base_url().'../Mushu/assets/uploads/_clientes/'.$fechamento->id_cliente.'/fechamentos/'.str_replace('/', '-', $fechamento->competencia).'/';
    $data['form'] = $this->Fechamento_convenio_mod->get_fechamento($id_Fechamento_convenio);
    $data['veiculos'] = $this->Veiculo_mod->grid_cliente_veiculos();
    $data['form_fechamento_veiculo'] = $this->Fechamento_convenio_mod->get_fechamento_veiculo($id_Fechamento_convenio);
    $data['form_fechamento_arquivo'] = $this->Fechamento_convenio_mod->get_fechamento_arquivo($id_Fechamento_convenio);
    if($data['form'] == null){
      $this->session->set_flashdata('registro_inexistente', true);
      redirect('Ferramenta/Fechamento_convenio/','refresh');
    }
    if($this->session->flashdata('sucesso_cadastro'))
      $data['success'] = 'Fechamento incluído com sucesso!';
    $this->load->view('Ferramenta/Fechamento_convenio/form',$data);
  }
}
