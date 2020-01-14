<!-- Header -->
<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
  <div class="container-fluid">
    <div class="header-body">
      <div class="row">
      </div>
    </div>
  </div>
</div>
<!-- Page content -->
<div class="container-fluid mt--7">
  <div class="row">
      <div class="col-lg-12">
        <div class="card shadow">
          <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Editar Promo <?php echo $promo->title; ?></h3>
                </div>
              <div class="col text-right">
                <a href="<?php echo base_url(); ?>promos/" class="btn btn-sm btn-outline-default">Cancelar</a>
              </div>
              </div>
          </div>
          <div class="card-body">
            <?php include '_form-edit.php'; ?>
          </div>
        </div>
      </div>
  </div>
</div>
<!-- Modal -->
<?php include '_modal-crop-image.php'; ?>
<?php include '_modal-error-archive.php'; ?>