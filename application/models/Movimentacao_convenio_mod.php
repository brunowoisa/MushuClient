<?php 
Class movimentacao_convenio_mod extends CI_Model {

	public function __construct(){
    parent::__construct();
    $this->load->database();
  }

  public function grid_movimentacao_convenios(){
    $filtro = $this->session->userdata('filtro_movimentacao_convenio');

    $this->db->select('cliente_veiculo.id, cliente_veiculo.placa, cliente_veiculo.identificacao, cliente_fornecedor.apelido as nome,
        (SELECT data FROM movimentacao_convenio WHERE movimentacao_convenio.id_veiculo = cliente_veiculo.id ORDER BY movimentacao_convenio.data DESC LIMIT 1) as ultima_movimentacao, 
        (SELECT id FROM movimentacao_convenio WHERE movimentacao_convenio.id_veiculo = cliente_veiculo.id ORDER BY movimentacao_convenio.data DESC LIMIT 1) as id_ultima_movimentacao,
        (SELECT km_proxima_troca_oleo FROM movimentacao_convenio WHERE movimentacao_convenio.id_veiculo = cliente_veiculo.id AND km_proxima_troca_oleo != "" ORDER BY movimentacao_convenio.data DESC LIMIT 1) as km_proxima_troca_oleo 
      ');
    $this->db->from('cliente_veiculo');
    $this->db->join('cliente_fornecedor', 'cliente_fornecedor.id = cliente_veiculo.id_cliente');
    
    $this->db->group_start();

      $this->db->or_group_start();
        $this->db->like('cliente_veiculo.placa', limpa_placa($filtro[1]));
        $this->db->like('cliente_veiculo.placa', limpa_placa($filtro[2]));
      $this->db->group_end();
      
      $this->db->or_group_start();
        $this->db->like('cliente_fornecedor.nome', $filtro[1]);
        $this->db->like('cliente_fornecedor.nome', $filtro[2]);
      $this->db->group_end();

    $this->db->group_end();

    $this->db->where('cliente_veiculo.ativo', 'S');
    return $this->db->get()->result();
  }

  public function get_movimentacao_convenio($id_movimentacao_convenio){
    $this->db->select('*');
    $this->db->from('movimentacao_convenio');
    $this->db->where('id', $id_movimentacao_convenio);
    return current($this->db->get()->result());
  }

  public function get_movimentacoes_veiculo($id_veiculo){
    $this->db->select('movimentacao_convenio.*, funcionario.apelido as tecnico, cliente_autorizado.nome as autorizado');
    $this->db->from('movimentacao_convenio');
    $this->db->join('funcionario', 'movimentacao_convenio.id_tecnico = funcionario.id');
    $this->db->join('cliente_autorizado', 'movimentacao_convenio.id_autorizado = cliente_autorizado.id');
    $this->db->where('movimentacao_convenio.id_veiculo', $id_veiculo);
    $this->db->order_by('movimentacao_convenio.data', 'desc');
    return $this->db->get()->result();
  }

  public function get_movimentacao_convenios(){
    $this->db->select('*');
    $this->db->from('movimentacao_convenio');
    return $this->db->get()->result();
  }

  public function novo($form){
    $form->km = numero_to_number($form->km);
    $data = array(
      'id_cliente' => $form->id_cliente,
      'id_veiculo' => $form->id_veiculo,
      'id_autorizado' => $form->id_autorizado,
      'id_tecnico' => $form->id_tecnico,
      'seq_shop9' => $form->seq_shop9,
      'km' => $form->km,
      'trocou_oleo' => $form->trocou_oleo,
      'descricao' => $form->descricao,
      'data' => date('Y-m-d'),
    );

    if($form->trocou_oleo == 'S'){
      $data['km_proxima_troca_oleo'] = $form->km + 1000;
    }

    $this->db->insert('movimentacao_convenio', $data);
    if($this->db->affected_rows())
      return $this->db->insert_id();
    return false;
  }

  public function editar($form,$id_movimentacao_convenio){
    $form->km = numero_to_number($form->km);
    $data = array(
      'id_cliente' => $form->id_cliente,
      'id_veiculo' => $form->id_veiculo,
      'id_autorizado' => $form->id_autorizado,
      'id_tecnico' => $form->id_tecnico,
      'seq_shop9' => $form->seq_shop9,
      'km' => $form->km,
      'trocou_oleo' => $form->trocou_oleo,
      'descricao' => $form->descricao,
    );
    if($form->trocou_oleo == 'S'){
      $data['km_proxima_troca_oleo'] = $form->km + 1000;
    }
    else{
      $data['km_proxima_troca_oleo'] = null;
    }
    $this->db->where('id', $id_movimentacao_convenio);
    $this->db->update('movimentacao_convenio', $data);
    if($this->db->affected_rows())
      return true;
    return false;
  }
}
	