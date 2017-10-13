<?php 
Class autorizado_mod extends CI_Model {

	public function __construct(){
    parent::__construct();
    $this->load->database();
  }

  public function grid_cliente_autorizados(){
    $this->db->select("cliente_autorizado.*, DATE_FORMAT(cliente_autorizado.data_nascimento, '%d/%m/%Y') as data_nascimento");
    $this->db->from('cliente_autorizado');
    $this->db->where('id_cliente', $this->session->userdata('cliente_autorizado')->id_cliente);
    return $this->db->get()->result();
  }

  public function get_cliente_autorizado($id_cliente_autorizado){
    $this->db->select("*, DATE_FORMAT(data_nascimento, '%d/%m/%Y') as data_nascimento");
    $this->db->from('cliente_autorizado');
    $this->db->where('id', $id_cliente_autorizado);
    return current($this->db->get()->result());
  }

  public function novo($form){
    $data = array(
      'id_cliente' => $this->session->userdata('cliente_autorizado')->id_cliente,
      'nome' => $form->nome,
      'apelido' => $form->apelido,
      'usa_sistema' => 'N',
      'data_nascimento' => data_to_date($form->data_nascimento),
      'ativo' => $form->ativo,
      'telefone' => $form->telefone,
      'celular' => $form->celular,
      'senha' => 2727,
    );
    $this->db->insert('cliente_autorizado', $data);
    if($this->db->affected_rows())
      return $this->db->insert_id();
    return false;
  }

  public function editar($form,$id_cliente_autorizado){
    $data = array(
      'nome' => $form->nome,
      'apelido' => $form->apelido,
      'usa_sistema' => $form->usa_sistema,
      'login' => $form->login,
      'data_nascimento' => data_to_date($form->data_nascimento),
      'ativo' => $form->ativo,
      'email' => $form->email,
      'telefone' => $form->telefone,
      'celular' => $form->celular,
    );
    $this->db->where('id', $id_cliente_autorizado);
    $this->db->update('cliente_autorizado', $data);
    if($this->db->affected_rows())
      return true;
    return false;
  }

  public function editar_perfil($form,$id_cliente_autorizado,$upload){
    $data = array(
      'nome' => $form->nome,
      'apelido' => $form->apelido,
      'login' => $form->login,
      'data_nascimento' => data_to_date($form->data_nascimento),
      'email' => $form->email,
      'telefone' => $form->telefone,
      'celular' => $form->celular,
    );
    if($upload != null){
      $data['foto'] = $upload['file_name'];
    }
    $this->db->where('id', $id_cliente_autorizado);
    $this->db->update('cliente_autorizado', $data);
    if($this->db->affected_rows())
      return true;
    return false;
  }

  public function editar_senha($form,$id_cliente_autorizado){
    $data = array(
      'senha' => $form->nova_senha,
    );
    $this->db->where('id', $id_cliente_autorizado);
    $this->db->update('cliente_autorizado', $data);
    if($this->db->affected_rows())
      return true;
    return false;
  }

  public function consulta_login_disponivel($login){
    $this->db->where('login', $login);
    $this->db->from('cliente_autorizado');
    if ($this->db->count_all_results() == 0) {
      return true;
    }
    return false;
  }
}
	