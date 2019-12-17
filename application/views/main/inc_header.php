  <header class="main-header">

    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>Klinik Dr Fredy</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><bE>Klinik Dr Fredy</b></span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" style="color: #ffffff">
              <b>Hi..!  <?php echo $this->session->userdata('nama_user'); ?> </b>
              <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-user">
              <li><a href="<?=base_url("Login/logout")?>"><i class="fa fa-sign-out fa-fw"></i>Keluar</a>
              </li>
            </ul>
            <!-- /.dropdown-user -->
          </li>
        </ul>
      </div>

    </nav>
  </header>