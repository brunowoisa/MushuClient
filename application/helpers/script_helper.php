<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function epre($arr){
  echo "<br><br><br><br><br><br><br>";
  echo "<pre>";
  print_r ($arr);
  echo "</pre>";
}

function line2br($string){ 
  return str_replace(array("\r\n", "\r", "\n"), "<br />", $string); 
}

function br2line($string, $separator = PHP_EOL ){
  $separator = in_array($separator, array("\n", "\r", "\r\n", "\n\r", chr(30), chr(155), PHP_EOL)) ? $separator : PHP_EOL;  // Checks if provided $separator is valid.
  return preg_replace('/\<br(\s*)?\/?\>/i', $separator, $string);
}

function formata_cpf($cpf){
  if ($cpf != '') {
    $cpf = str_replace('.', '', $cpf);
    $cpf = str_replace('-', '', $cpf);
    $a = str_split($cpf);
    return $a[0].$a[1].$a[2].'.'.$a[3].$a[4].$a[5].'.'.$a[6].$a[7].$a[8].'-'.$a[9].$a[10]; 
  }
  return null;
}

function limpa_cpf($cpf){
  $cpf = str_replace('.', '', $cpf);
  $cpf = str_replace('-', '', $cpf);
  return $cpf;
}

function limpa_placa($placa){
  $placa = str_replace(' ', '', $placa);
  $placa = str_replace('-', '', $placa);
  return $placa;
}

function limpa_cnpj($cnpj){
  $cnpj = str_replace('.', '', $cnpj);
  $cnpj = str_replace('-', '', $cnpj);
  $cnpj = str_replace('/', '', $cnpj);
  return $cnpj;
}

function formata_cnpj($cnpj){
  $cnpj = str_replace('.', '', $cnpj);
  $cnpj = str_replace('-', '', $cnpj);
  $a = str_split($cnpj);
  return $a[0].$a[1].'.'.$a[2].$a[3].$a[4].'.'.$a[5].$a[6].$a[7].'/'.$a[8].$a[9].$a[10].$a[11].'-'.$a[12].$a[13]; 
}

function limpa_cep($cep){
  $cep = str_replace('-', '', $cep);
  return $cep;
}

function formata_cep($cep){
  $cep = str_replace('.', '', $cep);
  $cep = str_replace('-', '', $cep);
  $a = str_split($cep);
  return $a[0].$a[1].$a[2].$a[3].$a[4].'-'.$a[5].$a[6].$a[7]; 
}

function formata_placa($placa){
  $placa = str_replace('.', '', $placa);
  $placa = str_replace('-', '', $placa);
  $a = str_split($placa);
  return $a[0].$a[1].$a[2].'-'.$a[3].$a[4].$a[5].$a[6]; 
}

function data_to_date($data){
  if($data != null){
    $data = explode('/', $data);
    return $data[2].'-'.$data[1].'-'.$data[0];
  }
  else
    return null;
}

function formata_data($data){
  if ($data != '') {
    $data = explode(' ', $data);
    $data = explode('-', $data[0]);
    return $data[2].'/'.$data[1].'/'.$data[0];
  }
  else
    return null;
}

function numero_to_number($numero){
  if($numero != null){
    $numero = str_replace(' ', '', $numero);
    $numero = str_replace('.', '', $numero);
    $numero = str_replace(',', '.', $numero);
    return $numero;
  }
  else
    return null;
}

function formata_numero($numero){
  $numero = str_replace('.', ',', $numero);
  return $numero;
}

function removeacento($str){
  $from = 'ÀÁÃÂÉÊÍÓÕÔÚÜÇàáãâéêíóõôúüç';
  $to   = 'AAAAEEIOOOUUCaaaaeeiooouuc';
  return strtr($str, $from, $to);
}

function limpa_url($str){
  return urldecode($str);
}







function set_form_value($editar,$form,$nome_campo){
  if ($editar) {
    $form = (array)$form;
    if(isset($form[$nome_campo])){
      return $form[$nome_campo];
    }
    return '';
  }
  else{
    return set_value($nome_campo);
  }
}

function set_form_select($editar,$form,$nome_campo,$option){
  if ($editar) {
    $form = (array)$form;
    if (isset($form[$nome_campo])) {
      $form = $form[$nome_campo];
      if($form == $option)
        return 'selected="selected"';
    }
    return '';
  }
  else{
    return set_select($nome_campo,$option);
  }
}

function set_form_checkbox($editar,$form,$nome_campo,$value){
  if ($editar) {
    $form = (array)$form;
    $form = (array)$form[$nome_campo];
    if(in_array($value, $form))
      return 'checked="checked"';
  }
  else{
    return set_checkbox($nome_campo, $value);
  }
  return '';
}

function set_tab_head($tab1,$tab2){
  if($tab1 == $tab2)
    return 'active';
  return '';
}

function set_tab_body($tab1,$tab2){
  if($tab1 == $tab2)
    return 'active in';
  return '';
}


function form_status($field){
  if (validation_errors() == null)
      return '';
  else{
    $res = form_error($field);
    if (empty($res))
        return 'form-success';
    else
        return 'form-error';
  }
}