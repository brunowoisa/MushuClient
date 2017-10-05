<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ajax extends CI_Controller {

  public function __construct(){
    parent::__construct();
  }
  
  public function get_pais($cPais){
    $this->load->model('Pais_mod');
    $res = $this->Pais_mod->get_pais($cPais);
    echo json_encode($res);
  }

  public function busca_paises($filtro1=null,$filtro2=null){
    $filtro1 = limpa_url($filtro1);
    $filtro2 = limpa_url($filtro2);
    $this->load->model('Pais_mod');
    $res = $this->Pais_mod->busca_paises($filtro1,$filtro2);
    echo json_encode($res);
  }

  public function get_cidade($ibge_cidade){
    $this->load->model('Pais_mod');
    $res = $this->Pais_mod->get_cidade($ibge_cidade);
    echo json_encode($res);
  }

  public function busca_cidades($filtro1=null,$filtro2=null){
    $filtro1 = limpa_url($filtro1);
    $filtro2 = limpa_url($filtro2);
    $this->load->model('Pais_mod');
    $res = $this->Pais_mod->busca_cidades($filtro1,$filtro2);
    echo json_encode($res);
  }

  public function busca_veiculos_do_cliente($id_cliente){
    $this->load->model('cliente_veiculo_mod');
    $res = $this->cliente_veiculo_mod->busca_veiculos_do_cliente($id_cliente);
    echo json_encode($res);
  }

  public function busca_autorizados_do_cliente($id_cliente){
    $this->load->model('cliente_autorizado_mod');
    $res = $this->cliente_autorizado_mod->busca_autorizados_do_cliente($id_cliente);
    echo json_encode($res);
  }
}
