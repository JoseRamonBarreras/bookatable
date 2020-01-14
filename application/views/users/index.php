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
              <h3 class="mb-0">Lista de Usuarios</h3>
            </div>
            <div class="col text-right">
              <a href="<?php echo base_url(); ?>users/newuser" class="btn btn-sm btn-primary">Crear Usuario</a>
            </div>
          </div>
        </div>
        <?php if($users) : ?>
        <div class="table-responsive">
          <table id="data_model" class="table align-items-center table-flush">
            <thead class="thead-light">
              <tr>
                <th scope="col">Nombre</th>
                <th scope="col">Email</th>
                <th scope="col">Fecha de creacion</th>
                <th scope="col">Tipo de usuario</th>
                <th scope="col">Acciones</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach($users as $user) : ?>
              <tr class="border_bottom">
                <td><?php echo $user->full_name; ?></td>
                <td><?php echo $user->email; ?></td>
                <td><?php echo $user->created_date; ?></td>
                <td><?php echo $user->group_name; ?></td>
                <td class="text-right">
                  <?php if($user->group_name == 'Administrador') : ?>
                  <?php else: ?>
                  <a class="btn btn-default btn-sm" href="<?php echo base_url(); ?>users/edit/<?php echo $user->id; ?>">Editar</a>
                  <a href="" class="btn btn-outline-danger btn-sm" data-toggle="modal" onclick="confirm_modal('<?php echo base_url("users/destroy/".$user->id); ?>','<?php echo $user->full_name; ?>')" data-target="#delete_object">Eliminar</a>
                  <?php endif; ?>
                </td>
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
        <h5 class="modal-title" id="exampleModalLabel">Estas seguro de eliminar al usuario <span class="object-name"></span>?</h5>
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
