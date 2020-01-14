<!-- Header -->
<div class="header pb-5 pt-5 pt-lg-8 d-flex align-items-center" style="background-image: url(<?php echo base_url(); ?>assets/images/items-background.jpg); background-size: cover; background-position: center top;">
  <span class="mask bg-gradient-primary opacity-8"></span>
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
                  <h3 class="mb-0">Editar <span class="badge badge-primary"><?php echo $item->title; ?></span> del Menu <span class="badge badge-warning"><?php echo $menu->title; ?></span></h3>
                </div>
              <div class="col text-right">
                <a href="<?php echo base_url(); ?>menus/show/<?php echo $menu->id; ?>" class="btn btn-sm btn-outline-default">Cancelar</a>
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