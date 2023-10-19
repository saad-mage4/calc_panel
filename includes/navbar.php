  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-dark">
    <!-- Left navbar links -->
    <ul class="mobile-navigation align-items-center justify-content-between w-100 navbar-nav d-flex d-lg-none">
      <?php if(isset($dashboard)===true):?>
        <li class="align-self-center"><a href="#!">Dashboard</a></li>
      <?php else: ?>
        <li><a href="#!" onclick="javascript:history.go(-1)"><i class="fas fa-arrow-left"></i></a></li>
        <li><a href="#!">Home</a></li>
      <?php endif; ?>
    </ul>
    <ul class="navbar-nav d-none d-lg-flex">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index.php?guest=yes" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#!" class="nav-link">Contact</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav d-none d-lg-flex ml-auto">
      
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->