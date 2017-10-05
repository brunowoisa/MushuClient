<?php 
Class cliente_autorizado_mod extends CI_Model {

	public function __construct(){
    parent::__construct();
    $this->load->database();
  }

  public function grid_cliente_autorizados(){
    $filtro = $this->session->userdata('filtro_cliente_autorizado');

    $this->db->select("cliente_autorizado.*, DATE_FORMAT(cliente_autorizado.data_nascimento, '%d/%m/%Y') as data_nascimento, cliente_fornecedor.nome as nome_cliente");
    $this->db->from('cliente_autorizado');
    $this->db->join('cliente_fornecedor', 'cliente_fornecedor.id = cliente_autorizado.id_cliente');
    
    $this->db->group_start();

      $this->db->or_group_start();
        $this->db->like('cliente_autorizado.id', $filtro[1]);
        $this->db->like('cliente_autorizado.id', $filtro[2]);
      $this->db->group_end();
      
      $this->db->or_group_start();
        $this->db->like('cliente_autorizado.nome', limpa_placa($filtro[1]));
        $this->db->like('cliente_autorizado.nome', limpa_placa($filtro[2]));
      $this->db->group_end();

      $this->db->or_group_start();
        $this->db->like('cliente_fornecedor.nome', $filtro[1]);
        $this->db->like('cliente_fornecedor.nome', $filtro[2]);
      $this->db->group_end();

    $this->db->group_end();
    
    $this->db->limit(500);
    return $this->db->get()->result();
  }

  public function get_cliente_autorizado($id_cliente_autorizado){
    $this->db->select("*, DATE_FORMAT(data_nascimento, '%d/%m/%Y') as data_nascimento");
    $this->db->from('cliente_autorizado');
    $this->db->where('id', $id_cliente_autorizado);
    return current($this->db->get()->result());
  }

  public function get_cliente_autorizados(){
    $this->db->select("*, DATE_FORMAT(data_nascimento, '%d/%m/%Y') as data_nascimento");
    $this->db->from('cliente_autorizado');
    return $this->db->get()->result();
  }

  public function busca_autorizados_do_cliente($id_cliente){
    $this->db->select("id, nome");
    $this->db->from('cliente_autorizado');
    $this->db->where('id_cliente', $id_cliente);
    return $this->db->get()->result();
  }

  public function novo($form){
    $data = array(
      'id_cliente' => $form->id_cliente,
      'cpf' => limpa_cpf($form->cpf),
      'nome' => $form->nome,
      'usa_sistema' => $form->usa_sistema,
      'data_nascimento' => data_to_date($form->data_nascimento),
      'ativo' => $form->ativo,
      'email' => $form->email,
      'telefone' => $form->telefone,
      'celular' => $form->celular,
      'senha' => md5(2727),
    );
    $this->db->insert('cliente_autorizado', $data);
    if($this->db->affected_rows())
      return $this->db->insert_id();
    return false;
  }

  public function editar($form,$id_cliente_autorizado){
    $data = array(
      'id_cliente' => $form->id_cliente,
      'cpf' => limpa_cpf($form->cpf),
      'nome' => $form->nome,
      'usa_sistema' => $form->usa_sistema,
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
}
	