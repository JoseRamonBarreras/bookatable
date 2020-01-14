<!-- Header -->
<div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center" style="background-image: url(<?php echo base_url(); ?>assets/images/menu-background.jpg); background-size: cover; background-position: center bottom;">
  <span class="mask bg-gradient-primary opacity-8"></span>
  <div class="container-fluid">
    <div class="header-body">
      <div class="row">
          <div class="col">
            <a href="#" class="btn btn-icon btn-neutral" id="create_new">
              <span class="btn-inner--icon"><i class="fas fa-utensils"></i></span>       
                <span class="btn-inner--text">Crear Menu</span>            
            </a>
          </div>
      </div>
    </div>
  </div>
</div>

<!-- Page content -->
<div class="container-fluid mt--7 container-custom">
  <!-- Table -->
  <div class="row">
    <?php if($menus) : ?>
      <?php foreach($menus as $menu) : ?>
    <div class="col-md-3 col-sm-4">
        <div class="card shadow">
          <img class="card-img-top" src="<?php echo base_url(); ?>assets/images/menu/<?php echo $menu->image; ?>" alt="Card image cap">
          <div class="card-body">
            <h5 class="card-title"><?php echo $menu->title; ?></h5>
            <a href="<?php echo base_url(); ?>menus/show/<?php echo $menu->id; ?>" class="btn btn-primary btn-sm">Ver Menu</a>
            <a href="<?php echo base_url(); ?>menus/edit/<?php echo $menu->id; ?>" class="btn btn-outline-primary btn-sm">Editar</a>
          </div>
        </div>
    </div>
      <?php endforeach; ?>
    <?php else : ?>
      <h3>No hay menus</h3>
    <?php endif ; ?>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="limit_modal_menu" tabindex="-1" role="dialog" aria-labelledby="modal-notification" aria-hidden="true">
    <div class="modal-dialog modal-danger" role="document">
        <div class="modal-content bg-gradient-danger">
          
            <div class="modal-header">
                <h6 class="modal-title" id="modal-title-notification">Your attention is required</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            
            <div class="modal-body">
              
                <div class="py-3 text-center">
                    <i class="ni ni-bell-55 ni-3x"></i>
                    <h4 class="heading mt-4">You should read this!</h4>
                    <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
                </div>
                
            </div>
            
            <div class="modal-footer">
                <button type="button" class="btn btn-white" data-dismiss="modal">Ok, Entendido!</button>
                <button type="button" class="btn btn-link text-white ml-auto" data-dismiss="modal">Close</button> 
            </div>
            
        </div>
    </div>
</div>