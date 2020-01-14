$(document).ready(function () {
  $( "#create_new" ).click(function() {
    $.ajax({
        type: "GET",
        url: base_url+'menus/has_the_limit_of_menus',
        success: function(data){
            if (data >= 10) {
              //alert('El limite de menus es de '+data+', puede editar o borrar alguno.');
              $('#limit_modal_menu').modal('show'); 
              $('#limit_modal_menu .modal-body p').text("El limite de menus es de "+data+", puede editar o borrar alguno.");
            }
            else{
              window.location.href = base_url+"menus/newmenu";
            }
        }
    })
  });
});