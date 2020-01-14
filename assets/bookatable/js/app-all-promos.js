$(document).ready(function () {

  $( "#create_new" ).click(function() {

    $.ajax({

        type: "GET",

        url: base_url+'promos/has_the_limit_of_promos',

        success: function(data){

            if (data >= 10) {

              $('#limit_modal_menu').modal('show'); 

              $('#limit_modal_menu .modal-body p').text("El limite de promociones es de "+data+", puede editar o borrar alguno.");

            }

            else{

              window.location.href = base_url+"promos/new_promo";

            }

        }

    })

  });

});



function confirm_modal_promo(delete_url,title)

{

  jQuery('#delete_promo').modal('show', {backdrop: 'static',keyboard :false});

  jQuery("#delete_promo .object-name").text(title);

  document.getElementById('confirm_delete_promo').setAttribute("href" , delete_url );

  document.getElementById('confirm_delete_promo').focus();

}