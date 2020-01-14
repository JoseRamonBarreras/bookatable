<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title><?php echo $item->title; ?></title>
  <!-- Favicon -->
  <link href="<?php echo base_url() ?>assets/img/brand/favicon.png" rel="icon" type="image/png">
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <!-- Icons -->
  <link href="<?php echo base_url() ?>assets/vendor/nucleo/css/nucleo.css" rel="stylesheet">
  <link href="<?php echo base_url() ?>assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href='<?php echo base_url() ?>assets/vendor/croppie/croppie.css' rel='stylesheet' >
  <!-- Argon CSS -->
  <link type="text/css" href="<?php echo base_url() ?>assets/css/argon.css?v=1.0.0" rel="stylesheet">
  <link href="<?php echo base_url() ?>assets/bookatable/layout.css" rel="stylesheet">
</head>
<body>
<div class="container">
	<div class="row">
		<div class="col-lg-12" style="padding-top: 20px;">
			<div class="card">
			  <img class="card-img-top" src="<?php echo base_url() ?>assets/images/items/<?php echo $item->image; ?>" alt="Card image cap">
			  <div class="card-body">
			    <h4 class="card-title"><?php echo $item->title; ?></h4>
			    <h5 class="card-title"><?php echo $item->subtitle; ?></h5>
			    <?php if($item->description) : ?>
			    <p class="card-text"><?php echo $item->description; ?></p>
				<?php endif ; ?>
			    <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
			  </div>
			</div>
		</div>
	</div>
</div>
<!-- Core -->
<script src="<?php echo base_url(); ?>assets/vendor/jquery/dist/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<!-- Argon JS -->
<script src="<?php echo base_url(); ?>assets/js/argon.js?v=1.0.0"></script>
</body>
</html>
