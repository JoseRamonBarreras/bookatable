<form enctype="multipart/form-data" method="post" action="<?php echo $action; ?>" id="promo_form">
  <div class="form-group">
    <label class="cabinet center-block">
      <figure>
        <img src="" class="gambar img-responsive img-thumbnail" id="item-img-output" />
      </figure>
      <input type="file" class="item-img file center-block" name="file_photo"/>
      <input type="hidden" name="image_name" id="file_foto_value">
      <?php echo form_error('image_name', '<div class="btn btn-outline-danger btn-sm  btn-block" role="alert">', '</div>')?>
    </label>
    
    <label>Titulo de la Promoción</label>
    <input type="text" class="form-control form-control-sm" placeholder="Titulo del Menu" name="title" value="<?php echo set_value('title'); ?>">
    <?php echo form_error('title', '<div class="btn btn-outline-danger btn-sm  btn-block" role="alert">', '</div>')?>
    <br>
    <label>Descripcion completa (opcional)</label>
    <textarea class="form-control" rows="3" placeholder="Write a large text here ..." name="description"></textarea>

  </div>
  <button type="submit" class="btn btn-success">Guardar</button>
</form>