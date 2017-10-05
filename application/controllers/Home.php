<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class home extends CI_Controller {

  public function __construct(){
    parent::__construct();
    $this->load->model('Acesso_mod');
    $this->Acesso_mod->verifica_sessao();
  }
  
  public function index(){
    $data = array();
    $data['links'] = false;
    $this->load->view('home',$data);
	}
}
