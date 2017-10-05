<script>
  /**************************
   * CEP
   **************************/
  /**
   * Função que busca os dados através do cep informado no input #cep via Ajax
   * @return input #endereco
   * @return input #bairro
   * @return input #cidade
   * @return input #cidade_ibge
   * @return input #estado
   */
  function busca_cep(pos_campo){
    var cep = $('#cep_'+pos_campo).val();
    cep = cep.replace("-", "");
    if(cep != '' && cep != '________'){
      $.ajax({
        url: 'http://www.viacep.com.br/ws/'+cep+'/json/',
        type: 'POST',
        dataType: 'jsonp',
      })
      .done(function(data) {
        $('#endereco_'+pos_campo).val(data.logradouro);
        $('#bairro_'+pos_campo).val(data.bairro);
        $('#id_cidade_'+pos_campo).val(data.ibge);
        $('#nome_cidade_'+pos_campo).val(data.localidade+' / '+data.uf);
      })
      .fail(function() {
        sweetAlert("Atenção!", "Erro ao buscar CEP. Contate a administração.", "warning");
      })
    }
  }
</script>