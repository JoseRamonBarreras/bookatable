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
  <!-- Table -->
  <div class="row">
    <div class="col">
      <div class="card shadow">
        <div class="card-header border-0">
          <div class="row align-items-center">
            <div class="col">
              <h3 class="mb-0">Mesas Agendadas</h3>
            </div>
          </div>
        </div>
        <?php if($bookings) : ?>
        <div class="table-responsive">
          <table id="data_model" class="table align-items-center table-flush">
            <thead class="thead-light">
              <tr>
                <th scope="col">Nombre</th>
                <th scope="col">Personas</th>
                <th scope="col">Día Reservado</th>
                <th scope="col">Hora Reservada</th>
                <th scope="col">Email</th>
                <th scope="col">Teléfono</th>
                <th scope="col">Fecha en que agendo</th>
                <th scope="col">Acciones</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach($bookings as $booking) : ?>
              <tr class="border_bottom">
                <td><?php echo $booking->user_name; ?></td>
                <td><?php echo $booking->persons; ?></td>
                <td><?php echo $booking->date_book; ?></td>
                <td><?php echo $booking->time_book; ?></td>
                <td><?php echo $booking->email; ?></td>
                <td><?php echo $booking->phone; ?></td>
                <td><?php echo $booking->created_date; ?></td>
                <td><a href="" class="btn btn-outline-danger btn-sm" data-toggle="modal" onclick="confirm_modal_book('<?php echo base_url("booking/destroy/".$booking->id); ?>','<?php echo $booking->user_name; ?>', '<?php echo $booking->date_book; ?>', '<?php echo $booking->time_book; ?>' )" data-target="#delete_object">Eliminar</a></td>
              </tr>
              <?php endforeach ; ?>
            </tbody>
          </table>
        </div>
        <?php else : ?>
          <h3>No hay usuarios</h3>
        <?php endif ; ?>
      </div>
    </div>
  </div>
</div>
<!-- Modal -->
<div class="modal fade" id="delete_object" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Estas seguro de eliminar la reservacion de <span class="object-name"></span> el dia <span class="object-date"></span> a las <span class="object-time"></span>?</h5>
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
