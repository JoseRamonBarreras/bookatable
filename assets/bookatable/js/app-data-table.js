$(function () {

  $('#data_model').DataTable({

    'paging'      : true,

    'lengthChange': true,

    'searching'   : true,

    'ordering'    : true,

    'info'        : true,

    'autoWidth'   : false,

    'order'       : [],

  })

})



function confirm_modal(delete_url,title)

{

  jQuery('#delete_object').modal('show', {backdrop: 'static',keyboard :false});

  jQuery("#delete_object .object-name").text(title);

  document.getElementById('confirm_delete_object').setAttribute("href" , delete_url );

  document.getElementById('confirm_delete_object').focus();

}

function confirm_modal_book(delete_url,title, date, time)

{

  jQuery('#delete_object').modal('show', {backdrop: 'static',keyboard :false});

  jQuery("#delete_object .object-name").text(title);
  jQuery("#delete_object .object-date").text(date);
  jQuery("#delete_object .object-time").text(time);

  document.getElementById('confirm_delete_object').setAttribute("href" , delete_url );

  document.getElementById('confirm_delete_object').focus();

}