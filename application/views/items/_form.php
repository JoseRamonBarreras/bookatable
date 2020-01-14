<form enctype="multipart/form-data" method="post" action="<?php echo $action; ?>" id="item_form">
  <div class="form-group">
    <input type="hidden" class="form-control form-control-sm" placeholder="Id Menu" name="id_menu" value="<?php echo $menu->id; ?>">
    <label class="cabinet center-block">
      <figure>
        <img src="" class="gambar img-responsive img-thumbnail" id="item-img-output" />
      </figure>
      <input type="file" class="item-img file center-block" name="file_photo"/>
      <input type="hidden" name="image_name" id="file_foto_value">
      <?php echo form_error('image_name', '<div class="btn btn-outline-danger btn-sm  btn-block" role="alert">', '</div>')?>
    </label>
    <label>Titulo</label>
    <input type="text" class="form-control form-control-sm" placeholder="Titulo" name="title" value="<?php echo set_value('title'); ?>">
    <?php echo form_error('title', '<div class="btn btn-outline-danger btn-sm  btn-block" role="alert">', '</div>')?>
    <br>
    <label>Subtitulo o descripcion corta</label>
    <input type="text" class="form-control form-control-sm" placeholder="Subtitulo" name="subtitle" value="<?php echo set_value('subtitle'); ?>">
    <?php echo form_error('subtitle', '<div class="btn btn-outline-danger btn-sm  btn-block" role="alert">', '</div>')?>
    <label>Descripcion completa (opcional)</label>
    <textarea class="form-control" rows="3" placeholder="Write a large text here ..." name="description"></textarea>
  </div>
  <button type="submit" class="btn btn-success">Guardar</button>
</form>