<li class="menu-header">Dashboard</li>
<li class="nav-item dropdown">
  <a href="<?= site_url() ?>" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>
</li>
<li class="nav-item dropdown">
  <a href="<?= site_url('informasi') ?>" class="nav-link"><i class="fas fa-newspaper"></i><span>Informasi</span></a>
</li>
<li class="menu-header">Main menu</li>
<li class="nav-item dropdown">
  <a href="<?= site_url('perizinan') ?>" class="nav-link "><i class="fas fa-digital-tachograph"></i> <span>Perizinan</span></a>
</li>
<?php
if (session()->get('level') == 'admin') {
?>
  <li class="nav-item dropdown">
    <a href="<?= site_url('korpokla') ?>" class=" nav-link "><i class="fas fa-users"></i> <span>Korpokla</span></a>
  </li>
  <li class="nav-item dropdown">
    <a href="<?= site_url('regulasi') ?>" class=" nav-link "><i class="fas fa-file-pdf"></i> <span>Regulasi</span></a>
  </li>
  <li class="nav-item dropdown">
    <a href="<?= site_url('user-management') ?>" class="nav-link "><i class="fas fa-user-cog"></i> <span>User Management</span></a>
  </li>
  <li class="nav-item dropdown">
    <a href="<?= site_url('perizinan/request') ?>" class="nav-link "><i class="fas fa-hand-holding"></i> <span>Req Perijinan</span></a>
  </li>

<?php
}
?>