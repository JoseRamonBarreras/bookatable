$("#menu_form").validate({
  ignore: "",
  rules: {
    image_name:{
      required: true
    },
    title: {
      required: true,
      maxlength: 80
    }
  },
  messages: {
    image_name: {
      required: "El campo imagen es requerido"
    },
    title: {
      required: "El titulo del menú es requerido",
      maxlength: "El titulo del menú no debe exceder los 80 caracteres."
    }
  }
});
$(".gambar").attr("src", base_url+"assets/images/menu/"+image_menu);
var $uploadCrop, tempFilename, rawImg, imageId;
function readFile(input) {
  if (input.files && input.files[0]) {
      console.log(input.files[0].size);
      if (input.files[0].type == 'image/jpeg' || input.files[0].type == 'image/png') {
          if (input.files[0].size < 1048576) {
              var reader = new FileReader();
              reader.onload = function (e) {
                $('.upload-demo').addClass('ready');
                $('#cropImagePop').modal('show');
                rawImg = e.target.result;
              }
              reader.readAsDataURL(input.files[0]);
          }
          else{
            $('#error_archive').modal('show');
          }
      }
      else{
        $('#error_archive').modal('show');
      }
  }
  else {
      swal("Sorry - you're browser doesn't support the FileReader API");
  }
}
$uploadCrop = $('#upload-demo').croppie({
  viewport: {
    width: 500,
    height: 260,
  },
  enforceBoundary: false,
  enableExif: true
});
$('#cropImagePop').on('shown.bs.modal', function(){
  // alert('Shown pop');
  $uploadCrop.croppie('bind', {
    url: rawImg
  }).then(function(){
    console.log('jQuery bind complete');
  });
});
$('.item-img').on('change', function () { 
  imageId = $(this).data('id'); 
  tempFilename = $(this).val();
  $('#cancelCropBtn').data('id', imageId); 
  readFile(this); 
});
$('#cropImageBtn').on('click', function (ev) {
  $uploadCrop.croppie('result', {
    type: 'base64',
    format: 'jpeg',
    size: {width: 500, height: 260}
  }).then(function (resp) {
    $('#item-img-output').attr('src', resp);
    $.ajax({
            url: base_url+'image/upload',
            type: "POST",
            data: {"image": resp, "path": "./assets/images/menu/"},
            beforeSend: function(){
                $('.load-crop').addClass('loader');
                $('.croping').text('ing...');
            },
            success: function (data) {
                console.log(data);
                $('#file_foto_value').val(data);
                $('.load-crop').removeClass('loader');
                $('.croping').text('');
                $('#cropImagePop').modal('hide');
            }
        });
  });
});