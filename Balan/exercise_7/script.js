$(document).ready(function(){
  //$('#row_dim').hide(); 
  $('#role').change(function(){
      if($('#role').val() == 'admin') {
          $('.admin').show(); 
      } else {
          $('.admin').hide(); 
      } 
  });
});