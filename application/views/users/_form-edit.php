<form method="post" action="<?php echo $action; ?>">

  <div class="form-group">



    <input type="hidden" class="form-control form-control-sm" placeholder="Nombre" name="id" value="<?php echo $user->id; ?>" readonly>



    <!-- Nombre -->

    <label>Nombre Completo</label>

    <input type="text" class="form-control form-control-sm" placeholder="Nombre" name="full_name" value="<?php if( isset($user->full_name) ) { echo $user->full_name; } ?><?php echo set_value('full_name'); ?>">

    <?php echo form_error('full_name', '<div class="alert alert-danger" role="alert">', '</div>')?>



    <!-- Email -->

    <label>Email</label>

    <input type="text" class="form-control form-control-sm" placeholder="Email" name="email" value="<?php if( isset($user->email) ) { echo $user->email; } ?><?php echo set_value('email'); ?>" disabled>

    <?php echo form_error('email', '<div class="alert alert-danger" role="alert">', '</div>')?>



    <!-- Password -->

    <a href="#" id="change_password" class="btn btn-sm btn-outline-primary" style="margin-top:10px; margin-bottom:10px;">Cambiar Password</a> 

    <div class="change_password_input">

      <label>Password</label>

      <div class="input-group" id="show_hide_password">

        <input id="password" class="form-control form-control-sm" type="password" name="password" value="<?php echo set_value('password'); ?>">

        <div class="input-group-addon">

          <a href=""><i class="fa fa-eye-slash" aria-hidden="true"></i></a>

        </div>

      </div>

      <meter max="4" id="password-strength-meter"></meter>

      <p id="password-strength-text"></p>

      <?php echo form_error('password', '<div class="alert alert-danger" role="alert">', '</div>')?>

    </div>



    <!-- Group -->

    <?php if(isset($user->group_id)) : ?>

    <div class="form-group">

      <label for="exampleFormControlSelect1">Tipo de usuario</label>

      <select name="group_id" class="form-control form-control-sm" id="exampleFormControlSelect1">

        <?php foreach($groups as $group) : ?>

          <?php if($group->name != 'Administrador') : ?>

            <option value="<?php echo $group->id; ?>" 

                <?php if($user->group_id == $group->id){

                  echo 'selected';

                }?> 

                >

                <?php echo $group->name; ?>

            </option>

          <?php endif; ?>

      <?php endforeach; ?>

      </select>

    </div>

    <?php else : ?>

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

  <?php endif ; ?>

  </div>

  <button type="submit" class="btn btn-success"><?php echo ( isset($user) ) ? "Actualizar" : "Guardar" ?></button>

</form>