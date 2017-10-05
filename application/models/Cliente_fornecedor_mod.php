<?php 
Class cliente_fornecedor_mod extends CI_Model {

	public function __construct(){
    parent::__construct();
    $this->load->database();
  }

  public function grid_cliente_fornecedor(){
    $filtro = $this->session->userdata('filtro_cliente_fornecedor');

    $this->db->select('cliente_fornecedor.*, cidade.nome_cidade, estado.uf_estado, pais.xpais');
    $this->db->from('cliente_fornecedor');
    $this->db->join('cidade', 'cliente_fornecedor.id_cidade = cidade.ibge_cidade');
    $this->db->join('estado', 'cidade.id_estado = estado.id_estado');
    $this->db->join('pais', 'cliente_fornecedor.cpais = pais.cpais');
    
    $this->db->group_start();

      $this->db->or_group_start();
        $this->db->like('cliente_fornecedor.id', $filtro[1]);
        $this->db->like('cliente_fornecedor.id', $filtro[2]);
      $this->db->group_end();
      
      $this->db->or_group_start();
        $this->db->like('cliente_fornecedor.nome', $filtro[1]);
        $this->db->like('cliente_fornecedor.nome', $filtro[2]);
      $this->db->group_end();

      $this->db->or_group_start();
        $this->db->like('cliente_fornecedor.apelido', $filtro[1]);
        $this->db->like('cliente_fornecedor.apelido', $filtro[2]);
      $this->db->group_end();

      $this->db->or_group_start();
        $this->db->like('cliente_fornecedor.fantasia', $filtro[1]);
        $this->db->like('cliente_fornecedor.fantasia', $filtro[2]);
      $this->db->group_end();

      $this->db->or_group_start();
        $this->db->like('cliente_fornecedor.cpf', $filtro[1]);
        $this->db->like('cliente_fornecedor.cpf', $filtro[2]);
      $this->db->group_end();

      $this->db->or_group_start();
        $this->db->like('cliente_fornecedor.cnpj', $filtro[1]);
        $this->db->like('cliente_fornecedor.cnpj', $filtro[2]);
      $this->db->group_end();

    $this->db->group_end();
    
    $this->db->limit(500);
    return $this->db->get()->result();
  }

  public function get_cliente_fornecedor($id_cliente_fornecedor){
    $this->db->select('*, DATE_FORMAT(data_fundacao, "%d/%m/%Y") as data_fundacao');
    $this->db->from('cliente_fornecedor');
    $this->db->where('id', $id_cliente_fornecedor);
    $ret = current($this->db->get()->result());
    $vinculos = array();
    if ($ret->cliente) {
      $vinculos[] = 'C';
    }
    if ($ret->fornecedor) {
      $vinculos[] = 'F';
    }
    if ($ret->transportador) {
      $vinculos[] = 'T';
    }
    $ret->vinculo = $vinculos;
    return $ret;
  }

  public function get_cliente_fornecedors(){
    $this->db->select('*');
    $this->db->from('cliente_fornecedor');
    return $this->db->get()->result();
  }

  public function get_clientes(){
    $this->db->select('*');
    $this->db->from('cliente_fornecedor');
    $this->db->where('cliente', true);
    $this->db->order_by('apelido', 'asc');
    return $this->db->get()->result();
  }

  public function get_fornecedores(){
    $this->db->select('*');
    $this->db->from('cliente_fornecedor');
    $this->db->where('fornecedor', true);
    $this->db->order_by('apelido', 'asc');
    return $this->db->get()->result();
  }

  public function novo($form){
    $data = array(
      'nome' => $form->nome,
      'fantasia' => $form->fantasia,
      'apelido' => $form->apelido,
      'cliente' => (in_array('C', $form->vinculo))?true:false,
      'fornecedor' => (in_array('F', $form->vinculo))?true:false,
      'transportador' => (in_array('T', $form->vinculo))?true:false,
      'pessoa' => $form->pessoa,
      'cpf' => $form->cpf,
      'cnpj' => limpa_cnpj($form->cnpj),
      'indicador_ie' => $form->indicador_ie,
      'ie' => $form->ie,
      'im' => $form->im,
      'rg' => $form->rg,
      'doc_extrangeiro' => $form->doc_extrangeiro,
      'cep' => limpa_cep($form->cep),
      'endereco' => $form->endereco,
      'numero' => $form->numero,
      'complemento' => $form->complemento,
      'bairro' => $form->bairro,
      'id_cidade' => $form->id_cidade,
      'cpais' => $form->cpais,
      'telefone_fixo1' => $form->telefone_fixo1,
      'telefone_fixo2' => $form->telefone_fixo2,
      'telefone_celular1' => $form->telefone_celular1,
      'telefone_celular2' => $form->telefone_celular2,
      'observacao' => $form->observacao,
      'site' => $form->site,
      'email' => $form->email,
      'cob_cpais' => '1058',
      'ent_cpais' => '1058',
      'conta_convenio' => 'N',
      'cartao_debito' => 'S',
      'cartao_credito' => 'S',
      'cheque_pre' => 'N',
      'cheque' => 'N',
      'carteira' => 'N',
      'boleto' => 'N',
      'limite_credito' => numero_to_number('0,00'),
    );
    $this->db->insert('cliente_fornecedor', $data);
    if($this->db->affected_rows())
      return $this->db->insert_id();
    return false;
  }

  public function editar($form,$id_cliente_fornecedor){
    $data = array(
      'nome' => $form->nome,
      'fantasia' => $form->fantasia,
      'apelido' => $form->apelido,
      'cliente' => (in_array('C', $form->vinculo))?true:false,
      'fornecedor' => (in_array('F', $form->vinculo))?true:false,
      'transportador' => (in_array('T', $form->vinculo))?true:false,
      'pessoa' => $form->pessoa,
      'cpf' => $form->cpf,
      'cnpj' => limpa_cnpj($form->cnpj),
      'indicador_ie' => $form->indicador_ie,
      'ie' => $form->ie,
      'im' => $form->im,
      'rg' => $form->rg,
      'doc_extrangeiro' => $form->doc_extrangeiro,
      'cep' => limpa_cep($form->cep),
      'endereco' => $form->endereco,
      'numero' => $form->numero,
      'complemento' => $form->complemento,
      'bairro' => $form->bairro,
      'id_cidade' => $form->id_cidade,
      'cpais' => $form->cpais,
      'telefone_fixo1' => $form->telefone_fixo1,
      'telefone_fixo2' => $form->telefone_fixo2,
      'telefone_celular1' => $form->telefone_celular1,
      'telefone_celular2' => $form->telefone_celular2,
      'observacao' => $form->observacao,
      'site' => $form->site,
      'email' => $form->email,
      'cob_cpais' => $form->cob_cpais,
      'ent_cpais' => $form->ent_cpais,
      'cob_cep' => limpa_cep($form->cob_cep),
      'cob_endereco' => $form->cob_endereco,
      'cob_numero' => $form->cob_numero,
      'cob_complemento' => $form->cob_complemento,
      'cob_bairro' => $form->cob_bairro,
      'cob_id_cidade' => ($form->cob_id_cidade != '')?$form->cob_id_cidade:null,
      'ent_cep' => limpa_cep($form->ent_cep),
      'ent_endereco' => $form->ent_endereco,
      'ent_numero' => $form->ent_numero,
      'ent_complemento' => $form->ent_complemento,
      'ent_bairro' => $form->ent_bairro,
      'ent_id_cidade' => ($form->ent_id_cidade != '')?$form->ent_id_cidade:null,
      'ent_referencia1' => $form->ent_referencia1,
      'ent_referencia2' => $form->ent_referencia2,
      'data_fundacao' => data_to_date($form->data_fundacao),
      'quadro_societario' => $form->quadro_societario,
      'conta_convenio' => $form->conta_convenio,
      'cartao_debito' => $form->cartao_debito,
      'cartao_credito' => $form->cartao_credito,
      'cheque_pre' => $form->cheque_pre,
      'cheque' => $form->cheque,
      'carteira' => $form->carteira,
      'boleto' => $form->boleto,
      'limite_credito' => numero_to_number($form->limite_credito),
    );
    $this->db->where('id', $id_cliente_fornecedor);
    $this->db->update('cliente_fornecedor', $data);
    if($this->db->affected_rows())
      return true;
    return false;
  }
}
	