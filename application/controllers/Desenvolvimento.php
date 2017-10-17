<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class desenvolvimento extends CI_Controller {

  public function __construct(){
    parent::__construct();
    $this->load->model('Acesso_mod');
    $this->Acesso_mod->verifica_sessao();
    $this->links = array(
      'fechar'=>'Home'
    );
  }
  
  public function index($ferramenta){
    $conteudos = array(
      'Fechamento' => array(
        'ferramenta' => 'Fechamentos',
        'descricao' => 'Nesta ferramenta serão disponibilizados os fechamentos mensais, bem como os documentos fiscais gerados e boletos.',
        'icone' => 'fa-folder-open-o',
      ),

      'SAT' => array(
        'ferramenta' => 'SAT',
        'descricao' => 'Esta ferramenta será o meio de comunicação oficial entre a empresa e os clientes. Você poderá enviar solicitações para a equipe, tirar dúvidas e muito mais.',
        'icone' => 'fa-comments-o',
      ),

      'Autorizacao' => array(
        'ferramenta' => 'Autorizações',
        'descricao' => 'Nesta ferramenta serão solicitadas as autorizações para manutençãos nos veículos. Após essa solicitação você poderá conceder ou recusar a autorização solicitada.',
        'icone' => 'fa-check-square-o',
      ),

      'Comunicado' => array(
        'ferramenta' => 'Comunicados',
        'descricao' => 'Nesta ferramenta serão disponibilizados comunicados importantes.',
        'icone' => 'fa-bullhorn',
      ),
    );
    $data['ferramenta'] = $conteudos[$ferramenta]['ferramenta'];
    $data['descricao'] = $conteudos[$ferramenta]['descricao'];
    $data['icone'] = $conteudos[$ferramenta]['icone'];
    $data['links'] = false;
    $this->load->view('desenvolvimento',$data);
  }
}
