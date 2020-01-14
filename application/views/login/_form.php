<form method="post" action="<?php echo $action; ?>" id="login_form"> 
  <div class="form-group">
    <input type="text" class="form-control" placeholder="Email" name="email" value="<?php echo set_value('email'); ?>">
    <?php echo form_error('email', '<div class="error" role="alert">', '</div>')?>
  </div>
  <div class="form-group">
    <input type="password" class="form-control" placeholder="Password" name="password" value="<?php echo set_value('password'); ?>">
    <?php echo form_error('password', '<div class="error" role="alert">', '</div>')?>

    <?php echo form_hidden('token',$token)?>
  </div>
    <button type="submit" class="btn btn-lg btn-primary btn-block">Ingresar</button>
</form>