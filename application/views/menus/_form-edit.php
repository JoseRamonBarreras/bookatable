<form enctype="multipart/form-data" method="post" action="<?php echo $action; ?>" id="menu_form">
  <div class="form-group">
    <input type="hidden" class="form-control form-control-sm" placeholder="Nombre" name="id" value="<?php echo $menu->id; ?>" readonly>

    <label class="cabinet center-block">
      <figure>
        <script>var image_menu = "<?php echo $menu->image; ?>";</script>
        <img src="" class="gambar img-responsive img-thumbnail" id="item-img-output" />
      </figure>
      <input type="file" class="item-img file center-block" name="file_photo"/>
      <input type="hidden" name="image_name" id="file_foto_value" value="<?php echo $menu->image; ?>">
      <?php echo form_error('image_name', '<div class="btn btn-outline-danger btn-sm  btn-block" role="alert">', '</div>')?>
    </label>
    
    <label>Titulo del Menu</label>
    <input type="text" class="form-control form-control-sm" placeholder="Titulo del Menu" name="title" value="<?php if( isset($menu->title) ) { echo $menu->title; } ?>">
    <?php echo form_error('title', '<div class="btn btn-outline-danger btn-sm  btn-block" role="alert">', '</div>')?>
    
  </div>
  <button type="submit" class="btn btn-success">Actualizar</button>
</form>