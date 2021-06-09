<li class="menu-header">Dashboard</li>
<li class="nav-item dropdown">
  <a href="<?= site_url() ?>" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>
</li>
<li class="menu-header">Main menu</li>
<li class="nav-item dropdown">
  <a href="<?= site_url('perizinan') ?>" class="nav-link "><i class="fas fa-columns"></i> <span>Perizinan</span></a>
</li>
<?php
if (session()->get('level') == 'admin') {
?>
  <li class="nav-item dropdown">
    <a href="<?= site_url('korpokla') ?>" class=" nav-link "><i class="fas fa-columns"></i> <span>Korpokla</span></a>
  </li>
  <li class="nav-item dropdown">
    <a href="<?= site_url('regulasi') ?>" class=" nav-link "><i class="fas fa-columns"></i> <span>Regulasi</span></a>
  </li>
  <li class="nav-item dropdown">
    <a href="<?= site_url('user-management') ?>" class="nav-link "><i class="fas fa-th"></i> <span>User Management</span></a>
  </li>
<?php
}
?>