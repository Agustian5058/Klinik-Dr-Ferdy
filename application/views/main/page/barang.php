  <div class="content-wrapper">
  	<!-- Content Header (Page header) -->
  	<section class="content-header">
  	</br>
  	<ol class="breadcrumb">
  		<li><a href="<?=base_url()?>Main/index/dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
  		<li><a href="<?=base_url()?>Main/barang">Tables</a></li>
  		<li class="active">Data Barang</li>
  	</ol>
  </section>

  <!-- Main content -->
  <section class="content">
  	<div class="row">

  		<!-- set recive aler -->
  		<?php if ($this->session->flashdata('alert_type')) { ?>
  			<div class="col-xs-12">
  				<div class="alert alert-<?=$this->session->flashdata('alert_type')?> alert-dismissible">
  					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
  					<i class="icon fa fa-check"></i>
  					<?=$this->session->flashdata('alert_text')?>
  				</div>
  			</div>
  		<?php } ?>

  		<div class="col-xs-12">
  			<!-- body untu tampilan data table -->
  			<?php if ($tampilan == 'data_table') { ?>
  				<div class="box box-success box-solid">
  					<div class="box-header with-border">
  						<h3 class="box-title">Data Barang</h3>
  						<!-- /.box-tools -->
  					</div>
  					<!-- /.box-header -->
  					<div class="box-body">
  						<div class="box-tools pull-right">
  							<a href="<?=base_url()?>Main/barang/add" class="btn btn-primary btn-sm">
  								<i class="fa fa-plus"> </i> Tambah Barang
  							</a>
  						</div>
  					</div>

  					<!-- /.box-header -->
  					<div class="box-body">
  						<style type="text/css"> table, th { text-align: center; }
  						table, td { text-align: left; }
  					</style>
  					<table id="example1" class="table table-bordered table-striped">
  						<thead>
  							<tr>
  								<th>Nomor</th>
  								<th>Nama Barang</th>
                  <th>Harga</th>
                  <th>Stok</th>
                  <th>Keterangan</th>
  							</tr>
  						</thead>
  						<tbody>
  							<?php 
  							foreach ($data_barang as $list) { ?>
  								<tr>
  									<td style="text-align: center;"><?=$list->Nomor?></td>
                    <td style="text-align: center;"><?=$list->nama_barang?></td>
                    <td style="text-align: center;"><?=$list->harga?></td>
                    <td style="text-align: center;"><?=$list->stok?></td>
                    <td style="text-align: center;"><?=$list->keterangan_barang?></td>
                    <td style="text-align: center;"><?=$list->Aksi?></td>
  								</tr>
  							<?php  } ?>
  						</tbody>
  					</table>
  				</div>
  			</div>
  			<!-- body tampilan add -->
  		<?php } else if ($tampilan == 'add') { ?>
  			<div class="box">
  				<div class="box-header">
  					<h3 class="box-title">Tambah Data Barang</h3>
  					<div class="box-tools pull-right">
  						<a href="<?=base_url()?>Main/barang/" class="btn btn-danger btn-sm">
  							<i class="fa fa-arrow-left"> </i> Back
  						</a>
  					</div>
  				</div>

  				<!-- /.box-header -->
  				<div class="box-body">
  					<!-- form tambah disini -->
  					<div class="box box-primary">
  						<div class="box-header with-border">
  						</div>
  						<!-- /.box-header -->
  						<!-- form start -->
  						<div class="col-md-6">
  							<form role="form" action="<?=base_url()?>Main/barang/add" method="POST">
  								<div class="box-body">
                    <div class="form-group">
                      <label>Nama Barang</label>
                      <input type="text" class="form-control" name="nama_barang" placeholder="Input Nama Barang" required="">
                    </div>
                    <div class="form-group">
                      <label>Harga Barang</label>
                      <input type="number" class="form-control" name="harga" placeholder="Input Harga Barang" required="">
                    </div>
                    <div class="form-group">
                      <label>Stok Barang</label>
                      <input type="number" class="form-control" name="stok" placeholder="Input Stok Barang" required="">
                    </div>
                    <div class="form-group">
                      <label>Keterangan Barang</label>
                      <input type="text" class="form-control" name="keterangan_barang" placeholder="Input Keterangan Barang">
                    </div>
  								</div>
  								<!-- /.box-body -->
  								<div class="box-footer">
  									<button type="submit" class="btn btn-primary">Submit</button>
  								</div>
  							</form>
  						</div>
  						<!-- /.box-body -->
  					</div>
  				</div>
  			</div>
  			<!-- body tampilan edit -->
  		<?php } else if ($tampilan == 'update') { ?>
  			<div class="box">
  				<div class="box-header">
  					<h3 class="box-title">Update Data Barang</h3>
  					<div class="box-tools pull-right">
  						<a href="<?=base_url()?>Main/barang" class="btn btn-danger btn-sm">
  							<i class="fa fa-arrow-left"> </i> Back
  						</a>
  					</div>
  				</div>

  				<!-- /.box-header -->
  				<div class="box-body">
  					<!-- form tambah disini -->
  					<div class="box box-primary">
  						<div class="box-header with-border">
  						</div>
  						<!-- /.box-header -->
  						<!-- form start -->
  						<div class="col-md-6">
  							<form role="form" action="<?=base_url()?>Main/barang/update" method="POST">
  								<div class="box-body">
  									<input type="hidden" name="id_barang" value="<?=$data_barang->id_barang?>">
                    <div class="form-group">
                      <label>Nama Barang</label>
                      <input type="text" value="<?=$data_barang->nama_barang?>" class="form-control" name="nama_barang" placeholder="Input Nama Barang" required="">
                    </div>
                    <div class="form-group">
                      <label>Harga Barang</label>
                      <input type="number" value="<?=$data_barang->harga?>"  class="form-control" name="harga" placeholder="Input Harga Barang" required="">
                    </div>
                    <div class="form-group">
                      <label>Stok Barang</label>
                      <input type="number" value="<?=$data_barang->stok?>"  class="form-control" name="stok" placeholder="Input Stok Barang" required="">
                    </div>
                    <div class="form-group">
                      <label>Keterangan Barang</label>
                      <input type="text" value="<?=$data_barang->keterangan_barang?>"  class="form-control" name="keterangan_barang" placeholder="Input Keterangan Barang" required="">
                    </div>
  									<div class="box-footer">
  										<button type="submit" class="btn btn-primary">Submit</button>
  									</div>
  								</form>
  							</div>
  							<!-- /.box-body -->
  						</div>
  					</div>
  				</div>
  			<?php } ?>

  		</div>
  	</div>


  	<div class="modal modal-danger fade" id="modal-danger">
  		<div class="modal-dialog">
  			<div class="modal-content">
  				<div class="modal-header">
  					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
  						<span aria-hidden="true">&times;</span></button>
  						<h4 class="modal-title">Hapus Data ?</h4>
  					</div>
  					<div class="modal-body">
  						<p>
  							Apakah anda yakin ingin menghapus data ini ? <br>
  							Data yang sudah dihapus tidak dapat dikembalikan lagi.
  						</p>
  					</div>
  					<div class="modal-footer">
  						<button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Batal</button>
  						<a href="" id="linkHapus" class="btn btn-outline">Ya, Hapus Data</a>
  					</div>
  				</div>
  				<!-- /.modal-content -->
  			</div>
  			<!-- /.modal-dialog -->
  		</div>
  		<!-- /.modal -->


  	</section>

  </div>

  <script type="text/javascript">
  	function alertDeleteData(id_data){
  		$('#linkHapus').attr('href', '<?=base_url()?>Main/barang/delete/'+id_data);
  		$('#modal-danger').modal('show');
  	}
  </script>