<form method="post" action="<?php echo $action; ?>" id="group_form">
  <div class="form-group">
    <label>Nombre Del Grupo</label>
    <?php if(isset($group->id)) : ?>
    <input type="hidden" class="form-control form-control-sm" placeholder="Nombre" name="id" value="<?php echo $group->id; ?>" readonly>
    <?php endif ?>
    <?php if(isset($group->name)) : ?>
    <input type="text" class="form-control form-control-sm" placeholder="Nombre" name="name" value="<?php echo $group->name; ?>">
    <?php else : ?>
    <input type="text" class="form-control form-control-sm" placeholder="Nombre" name="name" value="<?php echo set_value('name'); ?>">
    <?php endif ; ?>
    <?php echo form_error('name', '<div class="btn btn-outline-danger btn-sm" role="alert">', '</div>')?>
  </div>
  <div class="form-group">
    <label>Descripcion Del Grupo</label>
    <input type="text" class="form-control form-control-sm" placeholder="Descripcion" name="description" value="<?php if( isset($group->description) ) { echo $group->description; } ?><?php echo set_value('description'); ?>">
  </div>
  <button type="submit" class="btn btn-success"><?php echo ( isset($group) ) ? "Actualizar" : "Guardar" ?></button>
</form>