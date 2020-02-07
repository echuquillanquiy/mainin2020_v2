<aside class="main-sidebar elevation-4 sidebar-light-primary">
    <!-- Brand Logo -->
    <a href="../../index3.html" class="brand-link navbar-warning">
      <img src="{{ asset('lte/dist/img/logo.png') }}"
           alt="AdminLTE Logo"
           class="brand-image img-circle elevation-3 bg-white"
           style="opacity: .9">
      <span class="brand-text font-weight-light text-white ml-4 mb-0" style="font-size:0.9rem; font-"><strong>{{ config('app.name') }}</strong></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('lte/dist/img/avatar.png') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ auth()->user()->nickname }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt text-primary"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../../index.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard v1</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../../index2.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard v2</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../../index3.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard v3</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chalkboard text-danger"></i>
              <p>
                Administración
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/users" class="nav-link">
                  <i class="fas fa-arrow-alt-circle-right nav-icon text-warning"></i>
                  <p>Usuarios</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="positions" class="nav-link">
                  <i class="fas fa-arrow-alt-circle-right nav-icon text-warning"></i>
                  <p>Puestos</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/companies" class="nav-link">
                  <i class="fas fa-arrow-alt-circle-right nav-icon text-warning"></i>
                  <p>Empresas Clientes</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/categories" class="nav-link">
                  <i class="fas fa-arrow-alt-circle-right nav-icon text-warning"></i>
                  <p>Categorías</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="/amounts" class="nav-link">
                  <i class="fas fa-arrow-alt-circle-right nav-icon text-warning"></i>
                  <p>Montos por puesto</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/areas" class="nav-link">
                  <i class="fas fa-arrow-alt-circle-right nav-icon text-warning"></i>
                  <p>Áreas</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users-cog text-info"></i>
              <p>
                Gestión de Recursos
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/collaborators" class="nav-link">
                  <i class="fas fa-user-tag nav-icon text-warning"></i>
                  <p>Colaboradores</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="/reports" class="nav-link">
              <i class="nav-icon fas fa-chart-pie text-fuchsia"></i>
              <p>Reportes</p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>