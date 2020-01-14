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
              <h3 class="mb-0">Lista de Grupos de Usuarios</h3>
            </div>
            <div class="col text-right">
              <a href="<?php echo base_url(); ?>groups/newgroup" class="btn btn-sm btn-primary">Crear Grupo</a>
            </div>
          </div>
        </div>
        <?php if($groups) : ?>
        <div class="table-responsive">
          <table id="data_model" class="table align-items-center table-flush">
            <thead class="thead-light">
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Nombre</th>
                <th scope="col">Descripcion</th>
                <th scope="col">Acciones</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach($groups as $group) : ?>
              <tr>
                <th scope="row">
                  <?php echo $group->id; ?>
                </th>
                <td>
                 <?php echo $group->name; ?>
                </td>
                <td>
                  <?php echo $group->description; ?>
                </td>
                <td class="text-right">
                  <?php if($group->name == 'Administrador') : ?>
                  <?php else: ?>
                  <a class="btn btn-default btn-sm" href="<?php echo base_url(); ?>groups/edit/<?php echo $group->id; ?>">Editar</a>
                  <a href="" class="btn btn-outline-danger btn-sm" data-toggle="modal" onclick="confirm_modal('<?php echo base_url(); ?>groups/destroy/<?php echo $group->id; ?>','<?php echo $group->name; ?>')" data-target="#delete_object">Eliminar</a>
                <?php endif; ?>
                </td>
              </tr>
              <?php endforeach ; ?>
            </tbody>
          </table>
        </div>
        <?php else : ?>
          <h3>No hay grupos</h3>
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
        <h5 class="modal-title" id="exampleModalLabel">Estas seguro de eliminar grupo <span class="object-name"></span>?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <!-- <div class="modal-body">
        ...
      </div> -->
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Cancelar</button>
        <a class="btn btn-danger" id="confirm_delete_object" href="">Eliminar</a>
      </div>
    </div>
  </div>
</div>