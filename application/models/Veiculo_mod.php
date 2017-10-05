<?php 
Class veiculo_mod extends CI_Model {

	public function __construct(){
    parent::__construct();
    $this->load->database();
  }

  public function grid_veiculos(){
    $filtro = $this->session->userdata('filtro_veiculo');

    $this->db->select('*');
    $this->db->from('veiculo');
    
    $this->db->group_start();

      $this->db->or_group_start();
        $this->db->like('id', $filtro[1]);
        $this->db->like('id', $filtro[2]);
      $this->db->group_end();
      
      $this->db->or_group_start();
        $this->db->like('marca', $filtro[1]);
        $this->db->like('marca', $filtro[2]);
      $this->db->group_end();

      $this->db->or_group_start();
        $this->db->like('modelo', $filtro[1]);
        $this->db->like('modelo', $filtro[2]);
      $this->db->group_end();

    $this->db->group_end();
    return $this->db->get()->result();
  }

  public function get_veiculo($id_veiculo){
    $this->db->select('*');
    $this->db->from('veiculo');
    $this->db->where('id', $id_veiculo);
    return current($this->db->get()->result());
  }

  public function get_veiculos(){
    $this->db->select('*');
    $this->db->from('veiculo');
    return $this->db->get()->result();
  }

  public function novo($form){
    $data = array(
      'marca' => mb_strtoupper($form->marca),
      'modelo' => mb_strtoupper($form->modelo),
    );
    $this->db->insert('veiculo', $data);
    if($this->db->affected_rows())
      return $this->db->insert_id();
    return false;
  }

  public function editar($form,$id_veiculo){
    $data = array(
      'marca' => mb_strtoupper($form->marca),
      'modelo' => mb_strtoupper($form->modelo),
    );
    $this->db->where('id', $id_veiculo);
    $this->db->update('veiculo', $data);
    if($this->db->affected_rows())
      return true;
    return false;
  }
}
	