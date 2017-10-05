function modal_busca_direta(){
  $("#busca_direta").modal("show");
  $('#busca_direta').on('shown.bs.modal', function () {
    $('#busca_direta_codigo').focus();
  })
}
function busca_direta(){
  var codigo = $('#busca_direta_codigo').val();
  if (codigo != 0 && codigo != '') {
    window.location.href = "./editar/"+codigo;
  }
  else{
    window.location.href = "./novo/";
  }
}

$('.casa_decimal_2').iMask({
  type : 'number',
  decDigits : 2,
  groupSymbol : '.',
  decSymbol : ','
});

$('.casa_decimal_3').iMask({
  type : 'number',
  decDigits : 3,
  groupSymbol : '.',
  decSymbol : ','
});






