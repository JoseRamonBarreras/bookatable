$(document).ready(function() {
    $('#change_password').click(function(){
        $('.change_password_input').toggle('slow');
    });
});

$(document).ready(function() {
    $("#show_hide_password a").on('click', function(event) {
        event.preventDefault();
        if($('#show_hide_password input').attr("type") == "text"){
            $('#show_hide_password input').attr('type', 'password');
            $('#show_hide_password i').addClass( "fa-eye-slash" );
            $('#show_hide_password i').removeClass( "fa-eye" );
        }else if($('#show_hide_password input').attr("type") == "password"){
            $('#show_hide_password input').attr('type', 'text');
            $('#show_hide_password i').removeClass( "fa-eye-slash" );
            $('#show_hide_password i').addClass( "fa-eye" );
        }
    });
});

var strength = {
    0: "Worst",
    1: "Bad",
    2: "Weak",
    3: "Good",
    4: "Strong"
  }

  var password = document.getElementById('password');
  var meter = document.getElementById('password-strength-meter');
  var text = document.getElementById('password-strength-text');

if (password) {
      password.addEventListener('input', function() {
        var val = password.value;
        var result = zxcvbn(val);

        // Update the password strength meter
        meter.value = result.score;

        // Update the text indicator
        if (val !== "") {
          text.innerHTML = "Strength: " + strength[result.score]; 
        } else {
          text.innerHTML = "";
        }
      });
}


$("#user_form").validate({
  rules: {
    full_name: {
      required: true
    },
    email: {
      required: true,
      email: true
    },
    password: {
      required: true
    }
  },

  messages: {
    full_name: {
      required: "El nombre es requerido"
    },
    email: {
      required: "Email requerido",
      email: "Su dirección de correo electrónico debe estar en el formato de nombre@dominio.com"
    },
    password: {
      required: "Password requerido" 
    }
  }
});





