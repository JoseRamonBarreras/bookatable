<!-- Header -->

<div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center" style="background-image: url(<?php echo base_url(); ?>assets/images/items-background.jpg); background-size: cover; background-position: center top;">

  <span class="mask bg-gradient-primary opacity-8"></span>

  <div class="container-fluid">

    <div class="header-body">

      <div class="row">

          <div class="col">

            <h1 class="display-2 text-white"><?php echo $menu->title; ?></h1>

            <!-- <a href="<?php echo base_url(); ?>items/new_item/<?php echo $menu->id; ?>" class="btn btn-icon btn btn-default">

              <span class="btn-inner--icon"></span>       

                <span class="btn-inner--text">Crear Elemento</span>            

            </a> -->
            <a href="#" class="btn btn-icon btn btn-default" id="create_new">

              <span class="btn-inner--icon"></span>       

                <span class="btn-inner--text">Crear Elemento</span>            

            </a>

            <a href="<?php echo base_url(); ?>menus/edit/<?php echo $menu->id; ?>" class="btn btn-icon btn-neutral btn-sm">

              <span class="btn-inner--icon"><i class="fas fa-utensils"></i></span>       

                <span class="btn-inner--text">Editar Menu</span>            

            </a>

            <!-- <a href="" class="btn btn-danger btn-sm" data-toggle="modal" onclick="confirm_modal('<?php echo base_url("menus/destroy/".$menu->id); ?>','<?php echo $menu->title; ?>')" data-target="#delete_object">Eliminar</a> -->

            <button class="btn btn-danger btn-sm" onclick="confirm_modal('<?php echo $menu->id; ?>','<?php echo $menu->title; ?>')">Eliminar</button>

          </div>

      </div>

    </div>

  </div>

</div>



<!-- Page content -->

<div class="container-fluid mt--7">

  <!-- Table -->

  <div class="row">

    <?php if($items) : ?>

        <?php foreach($items as $item) : ?>

          <div class="col-md-3 col-sm-4">

              <div class="card shadow">

                <img class="card-img-top" src="<?php echo base_url(); ?>assets/images/items/<?php echo $item->image; ?>" alt="Card image cap">

                <div class="card-body">

                  <h5 class="card-title"><?php echo $item->title; ?></h5>

                  <h5 class="card-title"><?php echo $item->subtitle; ?></h5>

                  <p><?php echo $item->description; ?></p>

                  <a href="<?php echo base_url(); ?>items/edit/<?php echo $menu->id; ?>/<?php echo $item->id; ?>" class="btn btn-outline-primary btn-sm">Editar</a>



                  <a href="" class="btn btn-outline-danger btn-sm" data-toggle="modal" onclick="confirm_modal_item('<?php echo base_url(); ?>items/destroy/<?php echo $menu->id; ?>/<?php echo $item->id; ?>','<?php echo $item->title; ?>')" data-target="#delete_item">Eliminar</a>

                </div>

              </div>

          </div>

        <?php endforeach; ?>

    <?php else : ?>

    <div class="col-md-3">

      <div class="card shadow">

        <div class="card-body">

          <h5 class="card-title">No hay elementos del menu</h5>

          <a href="<?php echo base_url(); ?>items/new_item/<?php echo $menu->id; ?>" class="btn btn-primary btn-sm">Crear Item</a>

        </div>

      </div>

    </div>

  <?php endif; ?>

  </div>

</div>

<script>var id_menu = "<?php echo $menu->id; ?>";</script>
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

<!-- Modal -->

<div class="modal fade" id="menu_have_items" tabindex="-1" role="dialog" aria-labelledby="modal-notification" aria-hidden="true">

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

                    <h4 class="heading mt-4">Tienes <span class="number_of_items btn btn-secondary"></span> Items Creados dentro del menu</h4>

                    <p>Eliminalos para poder borrar completamente el menu!</p>

                </div>

                

            </div>

            

            <div class="modal-footer">

                <button type="button" class="btn btn-white" data-dismiss="modal">Ok, Entendido!</button>

                <button type="button" class="btn btn-link text-white ml-auto" data-dismiss="modal">Close</button> 

            </div>

            

        </div>

    </div>

</div>



<!-- Modal -->

<div class="modal fade" id="delete_object" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

  <div class="modal-dialog" role="document">

    <div class="modal-content">

      <div class="modal-header">

        <h5 class="modal-title" id="exampleModalLabel">Estas seguro de eliminar el menu <span class="object-name"></span>?</h5>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">

          <span aria-hidden="true">&times;</span>

        </button>

      </div>

      <div class="modal-footer">

        <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Cancelar</button>

        <a class="btn btn-danger" id="confirm_delete_object" href="">Eliminar</a>

      </div>

    </div>

  </div>

</div>



<!-- Modal -->

<div class="modal fade" id="delete_item" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

  <div class="modal-dialog" role="document">

    <div class="modal-content">

      <div class="modal-header">

        <h5 class="modal-title" id="exampleModalLabel">Estas seguro de eliminar el item <span class="object-name"></span>?</h5>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">

          <span aria-hidden="true">&times;</span>

        </button>

      </div>

      <div class="modal-footer">

        <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Cancelar</button>

        <a class="btn btn-danger" id="confirm_delete_item" href="">Eliminar</a>

      </div>

    </div>

  </div>

</div>