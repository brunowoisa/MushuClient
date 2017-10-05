<?php 
Class cliente_fornecedor_grupo_mod extends CI_Model {

	public function __construct(){
    parent::__construct();
    $this->load->database();
  }

  public function grid_cliente_fornecedor_grupos(){
    $filtro = $this->session->userdata('filtro_cliente_fornecedor_grupo');

    $this->db->select('cliente_fornecedor_grupo.*, tabela_preco.descricao as tabela');
    $this->db->from('cliente_fornecedor_grupo');
    $this->db->join('tabela_preco', 'cliente_fornecedor_grupo.id_tabela_preco_obrigatoria = tabela_preco.id');
    
    $this->db->group_start();

      $this->db->or_group_start();
        $this->db->like('cliente_fornecedor_grupo.id', $filtro[1]);
        $this->db->like('cliente_fornecedor_grupo.id', $filtro[2]);
      $this->db->group_end();
      
      $this->db->or_group_start();
        $this->db->like('cliente_fornecedor_grupo.descricao', $filtro[1]);
        $this->db->like('cliente_fornecedor_grupo.descricao', $filtro[2]);
      $this->db->group_end();

    $this->db->group_end();
    
    $this->db->limit(500);
    return $this->db->get()->result();
  }

  public function get_cliente_fornecedor_grupo($id_cliente_fornecedor_grupo){
    $this->db->select('*');
    $this->db->from('cliente_fornecedor_grupo');
    $this->db->where('id', $id_cliente_fornecedor_grupo);
    return current($this->db->get()->result());
  }

  public function get_cliente_fornecedor_grupos(){
    $this->db->select('*');
    $this->db->from('cliente_fornecedor_grupo');
    return $this->db->get()->result();
  }

  public function novo($form){
    $data = array(
      'tipo' => $form->tipo,
      'descricao' => $form->descricao,
      'id_tabela_preco_obrigatoria' => $form->id_tabela_preco_obrigatoria,
    );
    $this->db->insert('cliente_fornecedor_grupo', $data);
    if($this->db->affected_rows())
      return $this->db->insert_id();
    return false;
  }

  public function editar($form,$id_cliente_fornecedor_grupo){
    $data = array(
      'tipo' => $form->tipo,
      'descricao' => $form->descricao,
      'id_tabela_preco_obrigatoria' => $form->id_tabela_preco_obrigatoria,
    );
    $this->db->where('id', $id_cliente_fornecedor_grupo);
    $this->db->update('cliente_fornecedor_grupo', $data);
    if($this->db->affected_rows())
      return true;
    return false;
  }
}
	