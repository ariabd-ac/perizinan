<a href="#" data-toggle="dropdown" class="nav-link notification-toggle nav-link-lg beep"><i class="far fa-bell"></i></a>
    <div class="dropdown-menu dropdown-list dropdown-menu-right">
      <div class="dropdown-header">Notifications
        <div class="float-right">
          <a href="#">Mark All As Read</a>
        </div>
      </div>
      <div class="dropdown-list-content dropdown-list-icons">
        <?php foreach ($messages as $dt) : ?>
            
        <a href="#" class="dropdown-item <?php echo ($dt['status_message'] == '1') ? 'dropdown-item-unread':'' ?>">
          <div class="dropdown-item-icon bg-primary text-white">
          <i class="fas fa-bell"></i>
          </div>
          <div class="dropdown-item-desc">
            <?= $dt['text_message'] ?>
            <div class="time text-primary"><?= $dt['created_at'] ?></div>
          </div>
        </a>
        <?php endforeach; ?>
      </div>
      <div class="dropdown-footer text-center">
        <a href="#">View All <i class="fas fa-chevron-right"></i></a>
      </div>
    </div>