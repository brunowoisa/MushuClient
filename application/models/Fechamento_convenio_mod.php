<?php 
Class fechamento_convenio_mod extends CI_Model {

	public function __construct(){
    parent::__construct();
    $this->load->database();
  }

  public function grid_fechamentos(){
    $this->db->select('fechamento.*, cliente_fornecedor.nome as cliente');
    $this->db->from('fechamento');
    $this->db->join('cliente_fornecedor', 'cliente_fornecedor.id = fechamento.id_cliente');
    $this->db->where('fechamento.id_cliente', $this->session->userdata('cliente_autorizado')->id_cliente);
    $this->db->where('fechamento.status !=', '4');
    return $this->db->get()->result();
  }

  public function get_fechamento($id_fechamento){
    $this->db->select("*,
                       REPLACE(valor_produtos,'.',',') as valor_produtos,
                       REPLACE(valor_servicos,'.',',') as valor_servicos,
                       REPLACE(valor_iss_retido,'.',',') as valor_iss_retido
                      ");
    $this->db->from('fechamento');
    $this->db->where('id', $id_fechamento);
    return current($this->db->get()->result());
  }

  public function get_fechamento_veiculo($id_fechamento){
    $this->db->select("*,
                       REPLACE(valor,'.',',') as valor,
                      ");
    $this->db->from('fechamento_veiculo');
    $this->db->where('id_fechamento', $id_fechamento);
    return $this->db->get()->result();
  }

  public function get_fechamento_arquivo($id_fechamento){
    $this->db->select("fechamento_arquivo.*, funcionario.apelido, DATE_FORMAT(fechamento_arquivo.postado_datahora,'%d/%m/%Y %H:%i:%s') AS postado_datahora,");
    $this->db->from('fechamento_arquivo');
    $this->db->join('funcionario', 'funcionario.id = fechamento_arquivo.postado_id_funcionario');
    $this->db->where('fechamento_arquivo.id_fechamento', $id_fechamento);
    return $this->db->get()->result();
  }

  public function novo($form){
    $data = array(
      'competencia' => $form->competencia,
      'id_cliente' => $form->id_cliente,
      'status' => '0',
      'criacao_datahora' => date('Y-m-d H:i:s'),
      'criacao_id_funcionario' => $this->session->userdata('funcionario')->id,
    );
    $this->db->insert('fechamento', $data);
    if($this->db->affected_rows()){
      $id_fechamento = $this->db->insert_id();

      $this->load->model('Cliente_veiculo_mod');
      $veiculos = $this->Cliente_veiculo_mod->busca_veiculos_do_cliente($form->id_cliente);
      foreach ($veiculos as $veiculo) {
        $data_veiculo = array(
          'id_fechamento' => $id_fechamento,
          'id_veiculo' => $veiculo->id,
        );
        $this->db->insert('fechamento_veiculo', $data_veiculo);
      }
      return $id_fechamento;
    }
    return false;
  }

  public function editar($form,$id_fechamento,$upload){
    $data = array(
      'status' => $form->status,
      'observacoes' => $form->observacoes,
      'valor_produtos' => numero_to_number($form->valor_produtos),
      'valor_servicos' => numero_to_number($form->valor_servicos),
      'valor_iss_retido' => numero_to_number($form->valor_iss_retido),
    );
    $this->db->where('id', $id_fechamento);
    $this->db->update('fechamento', $data);
    if (isset($form->valor_veiculo)){
      foreach ($form->valor_veiculo as $id_veiculo => $valor) {
        $data_valor = array(
          'valor' => numero_to_number($valor),
        );
        $this->db->where('id_veiculo', $id_veiculo);
        $this->db->where('id_fechamento', $id_fechamento);
        $this->db->update('fechamento_veiculo', $data_valor);
      }
    }
    if($upload){
      foreach ($upload as $arquivo) {
        $data_arquivo = array(
          'id_fechamento' => $id_fechamento,
          'arquivo' => $arquivo['file_name'],
          'postado_datahora' => date('Y-m-d H:i:s'),
          'postado_id_funcionario' => $this->session->userdata('funcionario')->id,
          'status' => '0',
        );
        $this->db->insert('fechamento_arquivo', $data_arquivo);
      }
    }
    if(isset($form->status_arquivos)){
      foreach ($form->status_arquivos as $id_arquivo => $status) {
        $data_arquivo = array(
          'status' => $status,
        );
        $this->db->where('id', $id_arquivo);
        $this->db->update('fechamento_arquivo', $data_arquivo);
      }
    }
    if($this->db->affected_rows())
      return true;
    return false;
  }
}
	