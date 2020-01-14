<form enctype="multipart/form-data" method="post" action="<?php echo $action; ?>" id="promo_form">
  <div class="form-group">
    <input type="hidden" class="form-control form-control-sm" placeholder="Nombre" name="id" value="<?php echo $promo->id; ?>" readonly>

    <label class="cabinet center-block">
      <figure>
        <script>var image_promo = "<?php echo $promo->image; ?>";</script>
        <img src="" class="gambar img-responsive img-thumbnail" id="item-img-output" />
      </figure>
      <input type="file" class="item-img file center-block" name="file_photo"/>
      <input type="hidden" name="image_name" id="file_foto_value" value="<?php echo $promo->image; ?>">
      <?php echo form_error('image_name', '<div class="btn btn-outline-danger btn-sm  btn-block" role="alert">', '</div>')?>
    </label>
    
    <label>Titulo de la promoción</label>
    <input type="text" class="form-control form-control-sm" placeholder="Titulo de la promoción" name="title" value="<?php if( isset($promo->title) ) { echo $promo->title; } ?>">
    <?php echo form_error('title', '<div class="btn btn-outline-danger btn-sm  btn-block" role="alert">', '</div>')?>
    <br>
    <label>Descripcion completa (opcional)</label>
    <textarea class="form-control" rows="3" placeholder="Write a large text here ..." name="description"><?php echo $promo->description; ?></textarea>
  </div>
  <button type="submit" class="btn btn-success">Actualizar</button>
</form>