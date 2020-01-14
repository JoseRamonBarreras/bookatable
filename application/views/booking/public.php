<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title><?php echo $title; ?></title>
  <!-- Favicon -->
  <link href="<?php echo base_url() ?>assets/img/brand/favicon.png" rel="icon" type="image/png">
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <!-- Icons -->
  <link href="<?php echo base_url() ?>assets/vendor/nucleo/css/nucleo.css" rel="stylesheet">
  <link href="<?php echo base_url() ?>assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href='<?php echo base_url() ?>assets/vendor/croppie/croppie.css' rel='stylesheet' >
  <!-- Argon CSS -->
  <link type="text/css" href="<?php echo base_url() ?>assets/css/argon.css?v=1.0.0" rel="stylesheet">
  <link href="<?php echo base_url() ?>assets/bookatable/layout.css" rel="stylesheet">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-timepicker/1.10.0/jquery.timepicker.min.css" integrity="sha256-zV9aQFg2u+n7xs0FTQEhY0zGHSFlwgIu7pivQiwJ38E=" crossorigin="anonymous" />
</head>
<body>
<script>
(function(d, s, id){
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) {return;}
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/messenger.Extensions.js";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'Messenger'));
</script>
<div class="container">
  <div class="row">
    <div class="col-lg-12" style="padding-top: 20px;">
      <div class="card">
        <div class="card-body">
          <h3 class="card-title">Online Reservation</h3>
          <p>You can reserve a table in our restaurant, for maximum 6 persons</p>
          <form method="POST" id="form-book">
          <div class="form-group">
              <input type="hidden" class="form-control" name="sender" id="sender" value="<?php echo $sender; ?>">
              <label>Party Size</label>
              <select class="form-control" name="persons" id="persons">
                <option value="1">1 person</option>
                <option value="2" selected="">2 persons</option>
                <option value="3">3 persons</option>
                <option value="4">4 persons</option>
                <option value="5">5 persons</option>
                <option value="6">6 persons</option>
              </select>
          </div>
          <div class="form-group">
            <label>Date</label>
            <input type="text" class="form-control" name="date" id="date">  
          </div>
          <div class="form-group">
            <label>Time</label>
            <input name="time" id="time" type="text" class="form-control time ui-timepicker-input" autocomplete="off">
            <div class="time-notification" style="color: #f5365c;"></div>
          </div>
          <div class="form-group">
            <label>Email</label>
            <input type="email" class="form-control" placeholder="name@example.com" name="email" id="email">
          </div>
          <div class="form-group">
            <label>Phone</label>
            <input type="phone" class="form-control" placeholder="5656565" name="phone" id="phone">
          </div>
          <p>After completion of the form you will receive a confirmation of you reservation by email.</p>
          <div class="form-group">
            <button type="submit" class="btn btn-block btn-primary" id="bookTableButton">Book a Table</button>
          </div>
          <p>You can cancel the reservation by calling 800 88 88 88</p>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Core -->
<script src="<?php echo base_url(); ?>assets/vendor/jquery/dist/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<!-- Argon JS -->
<script src="<?php echo base_url(); ?>assets/js/argon.js?v=1.0.0"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-timepicker/1.10.0/jquery.timepicker.min.js" integrity="sha256-xoE/2szqaiaaZh7goVyF5p9C/qBu9dM3V5utrQaiJMc=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.0/dist/jquery.validate.min.js"></script>
<script>
$.validator.addMethod("valueNotEquals", function(value, element, arg){
return arg !== value;
}, "Value must not equal arg.");

$("#form-book").validate({
  rules: {
    persons: {
      required: true,
      number: true
    },
    date: {
      required: true,
    },
    time: {
      required: true,
    },
    email: {
      required: true,
      email: true
    },
    phone: {
      required: true,
      number: true
    }
  },
  messages: {
    persons: {
      required: "El numero de personas es requerido",
      number: "Por favor ingrese numeros sin espacios"
    },
    date: {
      required: "La fecha es requerida"
    },
    time: {
      required: "La hora es requerida"
    },
    email: {
      required: "Necesitamos su dirección de correo electrónico para contactarlo",
      email: "Su dirección de correo electrónico debe estar en el formato de nombre@dominio.com"
    },
    phone: {
      required: "Necesitamos su teléfono para contactarlo",
      number: "Por favor ingrese numeros sin espacios"
    }
  }
});
</script>

<script>
$( function() {
    $( "#date" ).datepicker({
        beforeShowDay: function(date) {
            var day = date.getDay();
            return [(day != 0), ''];
        },
        closeText: 'Cerrar',
        prevText: '<Ant',
        nextText: 'Sig>',
        currentText: 'Hoy',
        monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
        monthNamesShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
        dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
        dayNamesShort: ['Dom', 'Lun', 'Mar', 'Mié', 'Juv', 'Vie', 'Sáb'],
        dayNamesMin: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sá'],
        weekHeader: 'Sm',
        dateFormat: 'yy-mm-dd',
        firstDay: 1,
        isRTL: false,
        yearSuffix: ''
    });
});
</script>

<script>
$('#time').timepicker({
  'minTime': '10:00am',
  'maxTime': '11:30pm',
  'showDuration': true,
  'step' : 60
});
</script>

<script>
  var sender = <?php echo $sender; ?>;
</script>

<script>
$(function() {
    $("#bookTableButton").click(function() {
        var validator = $( "#form-book" ).validate();
        if (validator.form()) {
            $.ajax({
                url: "https://gurucgastromedia.com.mx/bookatable/booking/create/",
                type: "post",
                data: { 
                    sender: $('#sender').val(), 
                    persons: $('#persons').val(), 
                    date: $('#date').val(), 
                    time: $('#time').val(),
                    email: $('#email').val(),
                    phone: $('#phone').val() 
                },
                success: function (data) {
                    data = JSON.parse(data);
                    if (data == "ocupado") {
                        $('#time').val('');
                        $('#time').focus();
                        $('.time-notification').text("Necesita escoger otro horario, a esta hora ya esta reservado.");
                    }
                    if (data == 'agendado') {
                        closeWebView();
                    }
                    if (data == 'inputsrequired') {
                        alert('Llene todos los campos');
                    }
                },
                error: function(xhr, status, error) {
                  console.log(xhr.responseText);
                }
            });
        }
        return false;
    });
});

function closeWebView(){
   MessengerExtensions.requestCloseBrowser(
      function success() {
        done();
      },
      function error(err) {
        alert(err)
      }
    );
}

function done(){
  $.ajax({
      type: "POST",
      url: "https://gurucgastromedia.com.mx/bookatable/callback/booking_response/"+sender,
      success: function(data){
      }
  })
}

</script>
</body>
</html>
