<?php 
Class acesso_mod extends CI_Model {

	public function __construct(){
    parent::__construct();
    $this->load->database();
  }

  /**
   * Realiza o Login no sistema
   * @param  object $form
   * @return int
   */
  public function login($form){
    $this->db->select('*');
    $this->db->from('cliente_autorizado');
    $this->db->where('login', $form->login);
    $this->db->where('senha', $form->senha);
    $query = $this->db->get()->result();
    // epre($query);
    // exit();
    $total = count($query);
    if($total == 0)
      return 0;
    elseif($total == 1){
      $cliente_autorizado = current($query);
      if($cliente_autorizado->usa_sistema == 'S'){
        $this->monta_sessao($form);
        return 1;
      }
      else
        return 4;
    }
    elseif($total > 1)
      return 2;
    else
      return 3;
  }

  /**
   * Realiza o logoff no sistema
   * @return boolean true
   */
  public function logoff(){
    $this->session->sess_destroy();
    foreach ($this->session->userdata() as $key => $value) {
      $this->session->unset_userdata($key);
    }
    return true;
  }

  /**
   * Verifica se existe sessão e se tem usuário com permissão para acessar o sistema
   * @return boolean
   */
  public function verifica_sessao(){
    if($this->session->has_userdata('cliente_autorizado')){
      $cliente_autorizado = $this->session->userdata('cliente_autorizado');
      $this->db->select('*');
      $this->db->from('cliente_autorizado');
      $this->db->where('login', $cliente_autorizado->login);
      $this->db->where('senha', $cliente_autorizado->senha);
      $this->db->where('usa_sistema', 'S');
      $total = count($this->db->get()->result());
      if($total == 1)
        return true;
    }
    $this->logoff();
    redirect(base_url().'acesso','refresh');
    return false;
  }

  /**
   * Verifica se existe sessão e se tem usuario com permissão ao acessar a página de login no sistema
   * @return boolean
   */
  public function verifica_sessao_inicio(){
    if($this->session->has_userdata('cliente_autorizado')){
      $cliente_autorizado = $this->session->userdata('cliente_autorizado');
      $this->db->select('*');
      $this->db->from('cliente_autorizado');
      $this->db->where('login', $cliente_autorizado->login);
      $this->db->where('senha', $cliente_autorizado->senha);
      $this->db->where('usa_sistema', 'S');
      $total = count($this->db->get()->result());
      if($total == 1)
        redirect(base_url().'Home','refresh');
        return true;
    }
    return false;
  }

  /**
   * Monta a sessão com os dados pertinentes
   * @param  object $form
   * @return boolean true
   */
  private function monta_sessao($form){
    $this->db->select('*');
    $this->db->from('cliente_autorizado');
    $this->db->where('login', $form->login);
    $this->db->where('senha', $form->senha);
    $cliente_autorizado = current($this->db->get()->result());
    $this->session->set_userdata('cliente_autorizado', $cliente_autorizado);

    // $this->db->select('ferramenta');
    // $this->db->from('liberacao');
    // $this->db->where('cliente_autorizado_id', $cliente_autorizado->id);
    // $query = $this->db->get()->result();
    // $res = array();
    // foreach ($query as $key) {
    //   $res[] = $key->ferramenta;
    // }
    // $this->session->set_userdata('liberacoes', $res);

    return true;

    // var_dump($this->session->userdata());
    // exit();
  }
}
	