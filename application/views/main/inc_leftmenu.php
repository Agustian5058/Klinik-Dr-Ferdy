  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li><br>
        <li class="<?=$page_name == 'dashboard' ? 'active' : '' ?>">
          <a href="<?=base_url('Main/index')?>">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
        <li class=" treeview <?=$page_name == 'pasien' || $page_name == 'barang' ? 'active menu-open' : '' ?>"> 
                  <!-- kalau aktif add class 'active menu-open' -->
          <a href="#">
            <i class="fa fa-list"></i> <span>Menu Utama</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="<?=$page_name == 'pasien' ? 'active' : '' ?>">
              <a href="<?=base_url('Main/pasien')?>">
              <i class="fa fa-folder"></i>Pasien</a>
            </li>
            <li class="<?=$page_name == 'barang' ? 'active' : '' ?>">
              <a href="<?=base_url('Main/barang')?>">
              <i class="fa fa-folder"></i>Barang</a>
            </li>
          </ul>
        </li>

        <li class=" treeview <?=$page_name == 'penjualan' || $page_name == 'stok' ? 'active menu-open' : '' ?>"> 
                  <!-- kalau aktif add class 'active menu-open' -->
          <a href="#">
            <i class="fa fa-list"></i> <span>Menu Lain</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="<?=$page_name == 'penjualan' ? 'active' : '' ?>">
              <a href="<?=base_url('Main/penjualan')?>">
              <i class="fa fa-folder"></i>Penjualan</a>
            </li>
            <li class="<?=$page_name == 'stok' ? 'active' : '' ?>">
              <a href="<?=base_url('Main/stok')?>">
              <i class="fa fa-folder"></i>Stok</a>
            </li>
          </ul>
        </li>

        <li class=" treeview <?=$page_name == 'laporan_stok'  
        || $page_name == 'laporan_penjualan' ? 'active menu-open' : '' ?>"> 
                  <!-- kalau aktif add class 'active menu-open' -->
          <a href="#">
            <i class="fa fa-list"></i> <span>Laporan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="<?=$page_name == 'laporan_stok' ? 'active' : '' ?>">
              <a href="<?=base_url('Main/laporan_stok')?>">
              <i class="fa fa-file-text"></i>Laporan Stok</a>
            </li>
             <li class="<?=$page_name == 'laporan_penjualan' ? 'active' : '' ?>">
              <a href="<?=base_url('Main/laporan_penjualan')?>">
              <i class="fa fa-file-text"></i>Laporan Penjualan</a>
            </li>
          </ul>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>