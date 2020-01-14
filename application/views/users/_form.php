<form method="post" action="<?php echo $action; ?>" id="user_form">
  <div class="form-group">

    <label>Nombre Completo</label>
    <input type="text" class="form-control form-control-sm" placeholder="Nombre" name="full_name" value="<?php echo set_value('full_name'); ?>">
    <?php echo form_error('full_name', '<div class="btn btn-outline-danger btn-sm  btn-block" role="alert">', '</div>')?>

    <label>Email</label>
    <input type="text" class="form-control form-control-sm" placeholder="Email" name="email" value="<?php echo set_value('email'); ?>">
    <?php echo form_error('email', '<div class="btn btn-outline-danger btn-sm  btn-block" role="alert">', '</div>')?>

    <label>Password</label>
    <div class="input-group" id="show_hide_password">
      <input id="password" class="form-control form-control-sm" type="password" name="password" value="<?php echo set_value('password'); ?>">
      <div class="input-group-addon">
        <a href=""><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
      </div>
    </div>
    <meter max="4" id="password-strength-meter"></meter>
    <p id="password-strength-text"></p>
    <?php echo form_error('password', '<div class="btn btn-outline-danger btn-sm  btn-block" role="alert">', '</div>')?>

    <div class="form-group">
      <label for="exampleFormControlSelect1">Tipo de usuario</label>
      <select name="group_id" class="form-control form-control-sm" id="exampleFormControlSelect1">
        <?php foreach($groups as $group) : ?>
          <?php if($group->name != 'Administrador') : ?>
            <option value="<?php echo $group->id; ?>">
                <?php echo $group->name; ?>
            </option>
          <?php endif; ?>
      <?php endforeach; ?>
      </select>
    </div>
  </div>
  <button type="submit" class="btn btn-success">Guardar</button>
</form>