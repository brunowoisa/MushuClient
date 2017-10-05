<script>
   /**************************
   * CNPJ
   **************************/
  /**
   * Função que busca os dados através do cnpj informado no input #cnpj via Ajax
   * @return input #razao_social
   * @return input #fantasia
   * @return input #email
   * @return input #cep
   * @return input #numero
   * @return busca_cep()
   */
   function busca_cnpj(pos_campo){
    var cnpj = $('#cnpj_'+pos_campo).val();
    cnpj = cnpj.replace(".", "");
    cnpj = cnpj.replace(".", "");
    cnpj = cnpj.replace("/", "");
    cnpj = cnpj.replace("-", "");
    if(cnpj != '' && cnpj != '______________'){
      $.ajax({
        url: 'https://www.receitaws.com.br/v1/cnpj/'+cnpj,
        type: 'POST',
        dataType: 'jsonp',
      })
      .done(function(data) {
        $('#razao_social_'+pos_campo).val(data.nome);
        $('#fantasia_'+pos_campo).val(data.fantasia);
        $('#email_'+pos_campo).val(data.email);
        $('#cep_'+pos_campo).val(data.cep.replace(".", ""));
        $('#numero_'+pos_campo).val(data.numero);
        busca_cep(pos_campo);
      })
    }
   }
</script>