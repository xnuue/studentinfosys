<aside class="main-sidebar">
  <section class="sidebar">
    <div class="user-panel">
      <div class="pull-left image">
        <img src="<?php echo (!empty($user['photo'])) ? '../images/'.$user['photo'] : '../images/profile.jpg'; ?>" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p><?php echo $user['firstname'].' '.$user['lastname']; ?></p>
        <a><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">REPORTS</li>
      <li class=""><a href="home.php"><i class="fa fa-dashboard"></i> <span>Main Panel</span></a></li>
      <li class="header">MANAGE</li>
      <li class=""><a href="students.php"><i class="fa fa-users"></i> <span>View Students</span></a></li>
      <li class="header">SETTINGS</li>
      <li class=""><a href="#config" data-toggle="modal"><i class="fa fa-cog"></i> <span>Academic Year</span></a></li>
    </ul>
  </section>
</aside>
<?php include 'config_modal.php'; ?>