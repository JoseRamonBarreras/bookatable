$(document).ready(function () {
  $( "#create_new" ).click(function() {
    $.ajax({
        type: "GET",
        url: base_url+'items/has_the_limit_of_items/'+id_menu,
        success: function(data){
            if (data >= 10) {
              $('#limit_modal_menu').modal('show'); 
              $('#limit_modal_menu .modal-body p').text("El limite de items es de "+data+", puede editar o borrar alguno.");
            }
            else{
              window.location.href = base_url+"items/new_item/"+id_menu;
            }
        }
    })
  });
});
function confirm_modal(id_menu,title)
{
  $.ajax({
        url: base_url + "menus/delete_menu/" + id_menu,
        type: 'POST',
        success: function (data) {
            if (data) {
              $('#menu_have_items').modal('show');
              $("#menu_have_items .heading .number_of_items").text(data);
            }
            else{
              $('#delete_object').modal('show');
        $("#delete_object .object-name").text(title);
        $('#confirm_delete_object').attr("href" , base_url + "menus/destroy/" + id_menu);
            }
        },
        error: function () {
            alert('ajax failure');
        }
  });
}
function confirm_modal_item(delete_url,title)
{
  jQuery('#delete_item').modal('show', {backdrop: 'static',keyboard :false});
  jQuery("#delete_item .object-name").text(title);
  document.getElementById('confirm_delete_item').setAttribute("href" , delete_url );
  document.getElementById('confirm_delete_item').focus();
}
