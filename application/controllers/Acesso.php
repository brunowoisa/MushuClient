<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class acesso extends CI_Controller {

  public function __construct(){
    parent::__construct();
    $this->load->model('Acesso_mod');
  }
	
	public function index(){
    $this->Acesso_mod->verifica_sessao_inicio();
    $data = array();
    $form = $this->input->post();
    if (!empty($form)) {
      $this->form_validation->set_rules('login', 'Login', 'required');
      $this->form_validation->set_rules('senha', 'Senha', 'required');
      if ($this->form_validation->run() == TRUE){
        $form = (object) $form;
        $logou = $this->Acesso_mod->login($form);
        switch ($logou) {
          case '0':
            $data['erro'] = 'Credenciais inválidas!';
            break;
          case '1':
            // redirect(base_url().'Verifica_Logica_Sistema','refresh');
            redirect(base_url().'Home','refresh');
            break;
          case '2':
            $data['erro'] = 'Erro de cadastro, comunique a administração!';
            break;
          case '3':
            $data['erro'] = 'Erro desconhecido, comunique a administração!';
            break;
          case '4':
            $data['erro'] = 'Seu acesso ao sistema está bloqueado! Entre em contato com a administração!';
            break;
        }
      }
      else
        $data['erro'] = validation_errors();
		}
		$this->load->view('acesso',$data);
	}

  public function sair(){
    $this->Acesso_mod->logoff();
    redirect(base_url().'acesso','refresh');
  }
}
