<!-- Header -->

<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">

  <div class="container-fluid">

    <div class="header-body">

      <div class="row">

          <div class="col">

            <a href="#" class="btn btn-icon btn-neutral" id="create_new">

              <span class="btn-inner--icon"><i class="fas fa-tags"></i></span>       

                <span class="btn-inner--text">Crear Promoción</span>            

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

    <?php if($promos) : ?>

      <?php foreach($promos as $promo) : ?>

      <div class="col-md-3 col-sm-4">

          <div class="card shadow">

            <img class="card-img-top" src="<?php echo base_url(); ?>assets/images/promos/<?php echo $promo->image; ?>" alt="Card image cap">

            <div class="card-body">

              <h5 class="card-title"><?php echo $promo->title; ?></h5>

              <a href="<?php echo base_url(); ?>promos/edit/<?php echo $promo->id; ?>" class="btn btn-outline-primary btn-sm">Editar</a>

              <a href="" class="btn btn-outline-danger btn-sm" data-toggle="modal" onclick="confirm_modal_promo('<?php echo base_url(); ?>promos/destroy/<?php echo $promo->id; ?>','<?php echo $promo->title; ?>')" data-target="#delete_promo">Eliminar</a>

            </div>

          </div>

      </div>

      <?php endforeach; ?>

    <?php else : ?>

    <div class="col-md-3 col-sm-4">

        <div class="card shadow">

          <div class="card-body">

            <h5 class="card-title">No hay promociones creadas</h5>

          </div>

        </div>

    </div>

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



<!-- Modal -->

<div class="modal fade" id="delete_promo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

  <div class="modal-dialog" role="document">

    <div class="modal-content">

      <div class="modal-header">

        <h5 class="modal-title" id="exampleModalLabel">Estas seguro de eliminar la promo <span class="object-name"></span>?</h5>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">

          <span aria-hidden="true">&times;</span>

        </button>

      </div>

      <div class="modal-footer">

        <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Cancelar</button>

        <a class="btn btn-danger" id="confirm_delete_promo" href="">Eliminar</a>

      </div>

    </div>

  </div>

</div>