<?php

$role_id = $this->session->userdata('role_id');

if ($role_id == '1') :

?>
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <div href="" class="brand-link mb-3">
      <img src="http://www.technova.co.id/img/logo-dark.png" alt="AdminLTE Logo" class="brand-image elevation-3">
    </div>
    <div class="sidebar">
      <nav class="mt-3 pb-3 mb-3">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
              <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                  <img src="<?= base_url('assets/') ?>dist/img/avatar5.png" class="img-circle elevation-2" alt="User Image">
                </div>
              </div>
              <i class="nav-icon fas fa-user"></i>
              <p class="text-capitalize">
                <?= $this->session->userdata('username') ?>
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url('auth/logout') ?>" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Logout</p>
                </a>
              </li>
            </ul>
          </li>
          <hr>
          <li class="nav-item">
            <a href="<?= base_url('admin') ?>" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url('admin/masterEmployees') ?>" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Employees
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url('admin/task') ?>" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Task
              </p>
            </a>
          </li>
        </ul>
      </nav>
    </div>
  </aside>

<?php else : ?>
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <div href="" class="brand-link mb-3">
      <img src="http://www.technova.co.id/img/logo-dark.png" alt="AdminLTE Logo" class="brand-image elevation-3">
    </div>
    <div class="sidebar">
      <nav class="mt-3 pb-3 mb-3">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
              <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                  <img src="<?= base_url('assets/') ?>dist/img/avatar5.png" class="img-circle elevation-2" alt="User Image">
                </div>
              </div>
              <i class="nav-icon fas fa-user"></i>
              <p class="text-capitalize">
                <?= $this->session->userdata('username') ?>
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url('auth/logout') ?>" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Logout</p>
                </a>
              </li>
            </ul>
          </li>
          <hr>
          <li class="nav-item">
            <a href="<?= base_url('employee') ?>" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url('employee/task') ?>" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Task
              </p>
            </a>
          </li>
        </ul>
      </nav>
    </div>
  </aside>
<?php endif; ?>