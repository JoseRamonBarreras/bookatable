$("#group_form").validate({
  rules: {
    name: {
    	required: true
    }
  },
  messages: {
    name: {
      required: "El nombre del grupo es requerido"
    }
  }
});
