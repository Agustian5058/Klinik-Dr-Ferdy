<!-- Bootstrap 3.3.7 -->
<link rel="stylesheet" href="<?=base_url()?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
<!-- Font Awesome -->
<link rel="stylesheet" href="<?=base_url()?>assets/bower_components/font-awesome/css/font-awesome.min.css">
<!-- Ionicons -->
<link rel="stylesheet" href="<?=base_url()?>assets/bower_components/Ionicons/css/ionicons.min.css">
<!-- jvectormap -->
<link rel="stylesheet" href="<?=base_url()?>assets/bower_components/jvectormap/jquery-jvectormap.css">
<!-- Theme style -->
<link rel="stylesheet" href="<?=base_url()?>assets/dist/css/AdminLTE.min.css">
<!-- AdminLTE Skins. Choose a skin from the css/skins
     folder instead of downloading all of them to reduce the load. -->
<link rel="stylesheet" href="<?=base_url()?>assets/dist/css/skins/_all-skins.min.css">

<?php if ($page_name == 'pasien' || $page_name == 'barang' || $page_name == 'penjualan' || $page_name == 'laporan_stok' || $page_name == 'laporan_penjualan' || $page_name == 'stok') { ?>
	<!-- DataTables -->
  	<link rel="stylesheet" href="<?=base_url()?>assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
<?php } ?>
