$("#login_form").validate({
  rules: {
    email: {
    	required: true,
    	email: true
    },
    password: {
    	required: true
    }
  },
  messages: {
    email: {
      required: "Email requerido",
      email: "Su dirección de correo electrónico debe estar en el formato de nombre@dominio.com"
    },
    password: {
      required: "Password requerido" 
    }
  }
});
