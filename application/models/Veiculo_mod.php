<?php 
Class veiculo_mod extends CI_Model {

	public function __construct(){
    parent::__construct();
    $this->load->database();
  }

  public function grid_cliente_veiculos(){
    $this->db->select('cliente_veiculo.*');
    $this->db->from('cliente_veiculo');
    $this->db->where('id_cliente', $this->session->userdata('cliente_autorizado')->id_cliente);
    return $this->db->get()->result();
  }

  public function get_cliente_veiculo($id_cliente_veiculo){
    $this->db->select('cliente_veiculo.*, cliente_fornecedor.nome as nome_cliente, cliente_fornecedor.id as id_cliente');
    $this->db->from('cliente_veiculo');
    $this->db->join('cliente_fornecedor', 'cliente_fornecedor.id = cliente_veiculo.id_cliente');
    $this->db->where('cliente_veiculo.id', $id_cliente_veiculo);
    return current($this->db->get()->result());
  }

  public function novo($form){
    $data = array(
      'id_cliente' => $this->session->userdata('cliente_autorizado')->id_cliente,
      'placa' => mb_strtoupper(limpa_placa($form->placa)),
      'modelo' => mb_strtoupper($form->modelo),
      'marca' => mb_strtoupper($form->marca),
      'ano' => $form->ano,
      'cor' => mb_strtoupper($form->cor),
      'identificacao' => $form->identificacao,
      'ativo' => $form->ativo,
    );
    $this->db->insert('cliente_veiculo', $data);
    if($this->db->affected_rows())
      return $this->db->insert_id();
    return false;
  }

  public function editar($form,$id_cliente_veiculo){
    $data = array(
      'placa' => mb_strtoupper(limpa_placa($form->placa)),
      'modelo' => mb_strtoupper($form->modelo),
      'marca' => mb_strtoupper($form->marca),
      'ano' => $form->ano,
      'cor' => mb_strtoupper($form->cor),
      'identificacao' => $form->identificacao,
      'ativo' => $form->ativo,
    );
    $this->db->where('id', $id_cliente_veiculo);
    $this->db->update('cliente_veiculo', $data);
    if($this->db->affected_rows())
      return true;
    return false;
  }
}
	