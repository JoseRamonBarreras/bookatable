<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $title ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Favicon -->
  <link href="<?php echo base_url() ?>assets/img/brand/favicon.png" rel="icon" type="image/png">
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <!-- Icons -->
  <link href="<?php echo base_url() ?>assets/vendor/nucleo/css/nucleo.css" rel="stylesheet">
  <link href="<?php echo base_url() ?>assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
  <!-- Argon CSS -->
  <link type="text/css" href="<?php echo base_url() ?>assets/css/argon.css?v=1.0.0" rel="stylesheet">

  <link href="<?php echo base_url() ?>assets/bookatable/layout.css" rel="stylesheet">
</head>

<body>


<div class="container">
    <div class="row">
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
            <div class="card card-signin my-5">
                <div class="card-body">
                    <img src="<?php echo base_url() ?>assets/images/bookatable.png" class="mx-auto d-block" style="max-width:250px;"/>
                    <h5 class="card-title text-center">Acceso</h5>
                    <?php include '_form.php'; ?>
                    <?php if($this->session->flashdata('usuario_incorrecto')) : ?>
                    <div class="btn btn-outline-danger btn-sm" role="alert" style="margin-top:10px;">
                      <?php echo $this->session->flashdata('usuario_incorrecto'); ?>
                    </div>
                    <?php endif ; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="<?php echo base_url(); ?>/assets/vendor/jquery/dist/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo base_url(); ?>/assets/js/argon.js?v=1.0.0"></script>

<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.0/dist/jquery.validate.min.js"></script>
<script src="<?php echo base_url(); ?>/assets/bookatable/js/<?php echo $app_scripts; ?>"></script>

</body>
</html>

