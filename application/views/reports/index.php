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
      <!-- Promos Views ================== -->
      <div class="col-lg-6">
          <div class="card shadow">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0"><i class="fas fa-tags text-blue"></i> Vistas de Promociones</h3>
                </div>
               
              </div>
            </div>
            <div class="table-responsive">        
                <div id="promo_component"></div>
            </div>
            <div class="card-body">
              <div class="dropdown show">
                Filtrar 
                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                  <i class="fas fa-sort-down"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow" x-placement="top-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(-160px, -61px, 0px);">
                  <button class="dropdown-item" id="promo-today">Hoy</button>
                  <button class="dropdown-item" id="promo-yesterday">Ayer</button>
                  <button class="dropdown-item" id="promo-last-7-days">Últimos 7 días</button>
                   <button class="dropdown-item" id="promo-last-28-days">Últimos 28 días</button>
                </div>
              </div>
            </div>
          </div>
      </div>
      <!-- Menus Views ================== -->
      <div class="col-lg-6">
          <div class="card shadow">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0"><i class="fas fa-utensils text-orange"></i> Vistas de Menus</h3>
                </div>
               
              </div>
            </div>
            <div class="table-responsive">
              <div id="menu_component"></div>
            </div>
            <div class="card-body">
                <div class="dropdown show">
                  Filtrar 
                  <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                    <i class="fas fa-sort-down"></i>
                  </a>
                  <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow" x-placement="top-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(-160px, -61px, 0px);">
                    <button class="dropdown-item" id="menu-today">Hoy</button>
                    <button class="dropdown-item" id="menu-yesterday">Ayer</button>
                    <button class="dropdown-item" id="menu-last-7-days">Últimos 7 días</button>
                     <button class="dropdown-item" id="menu-last-28-days">Últimos 28 días</button>
                  </div>
                </div>
            </div>
          </div>
      </div>
       <!-- Users Views ================== -->
      <div class="col-lg-6">
          <div class="card shadow">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0"><i class="fas fa-utensils text-orange"></i> Usuarios que mas interactuan</h3>
                </div>
               
              </div>
            </div>
            <div class="table-responsive">
              <div id="user_component"></div>
            </div>
            <div class="card-body">
                <div class="dropdown show">
                  Filtrar 
                  <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                    <i class="fas fa-sort-down"></i>
                  </a>
                  <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow" x-placement="top-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(-160px, -61px, 0px);">
                    <button class="dropdown-item" id="user-today">Hoy</button>
                    <button class="dropdown-item" id="user-yesterday">Ayer</button>
                    <button class="dropdown-item" id="user-last-7-days">Últimos 7 días</button>
                     <button class="dropdown-item" id="user-last-28-days">Últimos 28 días</button>
                  </div>
                </div>
            </div>
          </div>
      </div>
      <!-- Menus Views ================== -->
      <div class="col-lg-6">
          <div class="card shadow">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0"><i class="fas fa-utensils text-orange"></i> Reporte General</h3>
                </div>
               
              </div>
            </div>
            <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th></th>
                    <th scope="col" class="report-date-title"></th>
                  </tr>
                </thead>
                <tbody>
                  <tr class="border_bottom">
                    <th>Usuarios Nuevos</th>
                    <td class="user-count"><strong></strong></td>
                  </tr>
                  <tr class="border_bottom">
                    <th>Menus</th>
                    <td class="menu-count"><strong></strong></td>
                  </tr>
                   <tr class="border_bottom">
                    <th>Promociones</th>
                    <td class="promo-count"><strong></strong></td>
                  </tr>
                </tbody>
              </table>
            </div>
            <div class="card-body">
              <div class="dropdown show">
                Filtrar 
                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                  <i class="fas fa-sort-down"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow" x-placement="top-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(-160px, -61px, 0px);">
                  <button class="dropdown-item" id="report-today">Hoy</button>
                  <button class="dropdown-item" id="report-yesterday">Ayer</button>
                  <button class="dropdown-item" id="report-last-7-days">Últimos 7 días</button>
                  <button class="dropdown-item" id="report-last-28-days">Últimos 28 días</button>
                </div>
              </div>
            </div>
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

<script>
  var today = '<?php echo date("Y-m-d"); ?>';
  var yesterday = '<?php echo date("Y-m-d", strtotime("-1 days") ); ?>';
  var last_7_days = '<?php echo date("Y-m-d", strtotime("-7 days") ); ?>';
  var last_28_days = '<?php echo date("Y-m-d", strtotime("-28 days") ); ?>';
</script>
