<?php 
Class cliente_veiculo_mod extends CI_Model {

	public function __construct(){
    parent::__construct();
    $this->load->database();
  }

  public function grid_cliente_veiculos(){
    $filtro = $this->session->userdata('filtro_cliente_veiculo');

    $this->db->select('cliente_veiculo.*, cliente_fornecedor.apelido as nome');
    $this->db->from('cliente_veiculo');
    $this->db->join('cliente_fornecedor', 'cliente_fornecedor.id = cliente_veiculo.id_cliente');
    
    $this->db->group_start();

      $this->db->or_group_start();
        $this->db->like('cliente_veiculo.id', $filtro[1]);
        $this->db->like('cliente_veiculo.id', $filtro[2]);
      $this->db->group_end();
      
      $this->db->or_group_start();
        $this->db->like('cliente_veiculo.placa', limpa_placa($filtro[1]));
        $this->db->like('cliente_veiculo.placa', limpa_placa($filtro[2]));
      $this->db->group_end();

      $this->db->or_group_start();
        $this->db->like('cliente_fornecedor.nome', $filtro[1]);
        $this->db->like('cliente_fornecedor.nome', $filtro[2]);
      $this->db->group_end();

    $this->db->group_end();
    
    $this->db->limit(500);
    return $this->db->get()->result();
  }

  public function get_cliente_veiculo($id_cliente_veiculo){
    $this->db->select('cliente_veiculo.*, cliente_fornecedor.nome as nome_cliente, cliente_fornecedor.id as id_cliente');
    $this->db->from('cliente_veiculo');
    $this->db->join('cliente_fornecedor', 'cliente_fornecedor.id = cliente_veiculo.id_cliente');
    $this->db->where('cliente_veiculo.id', $id_cliente_veiculo);
    return current($this->db->get()->result());
  }

  public function get_cliente_veiculos(){
    $this->db->select('*');
    $this->db->from('cliente_veiculo');
    return $this->db->get()->result();
  }

  public function busca_veiculos_do_cliente($id_cliente){
    $this->db->select("id, placa, identificacao");
    $this->db->from('cliente_veiculo');
    $this->db->where('id_cliente', $id_cliente);
    $ret = $this->db->get()->result();
    foreach ($ret as $key) {
      $key->placa = formata_placa($key->placa);
    }
    return $ret;
  }

  public function novo($form){
    $data = array(
      'id_cliente' => $form->id_cliente,
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
      'id_cliente' => $form->id_cliente,
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
	