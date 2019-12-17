  <div class="content-wrapper">
  	<!-- Content Header (Page header) -->
  	<section class="content-header">
  	</br>
  	<ol class="breadcrumb">
  		<li><a href="<?=base_url()?>Main/index/dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
  		<li><a href="<?=base_url()?>Main/pasien">Tables</a></li>
  		<li class="active">Data Pasien</li>
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
  						<h3 class="box-title">Data Pasien</h3>
  						<!-- /.box-tools -->
  					</div>
  					<!-- /.box-header -->
  					<div class="box-body">
  						<div class="box-tools pull-right">
  							<a href="<?=base_url()?>Main/pasien/add" class="btn btn-primary btn-sm">
  								<i class="fa fa-plus"> </i> Tambah Pasien
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
  								<th>Nama Pasien</th>
                  <th>Jenis Kelamin</th>
                  <th>Umur</th>
                  <th>Alamat</th>
                  <th>No HP</th>
                  <th>Action</th>
  							</tr>
  						</thead>
  						<tbody>
  							<?php 
  							foreach ($data_pasien as $list) { ?>
  								<tr>
  									<td style="text-align: center;"><?=$list->Nomor?></td>
                    <td style="text-align: center;"><?=$list->nama_pasien?></td>
                    <td style="text-align: center;"><?=$list->jenis_kelamin?></td>
                    <td style="text-align: center;"><?=$list->umur?></td>
                    <td style="text-align: center;"><?=$list->alamat?></td>
                    <td style="text-align: center;"><?=$list->no_hp?></td>
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
  					<h3 class="box-title">Tambah Data Pasien</h3>
  					<div class="box-tools pull-right">
  						<a href="<?=base_url()?>Main/pasien/" class="btn btn-danger btn-sm">
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
  							<form role="form" action="<?=base_url()?>Main/pasien/add" method="POST">
  								<div class="box-body">
                    <div class="form-group">
                      <label>Nama Pasien</label>
                      <input type="text" class="form-control" name="nama_pasien" placeholder="Input Nama Pasien" required="">
                    </div>
                    <div class="form-group">
                      <label>Pilih Jenis Kelamin</label>
                      <select name="jenis_kelamin" class="form-control" required="">
                        <option value="Laki-Laki">Laki-Laki</option>
                        <option value="Perempuan">Perempuan</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Umur Pasien</label>
                      <input type="number" class="form-control" name="umur" placeholder="Input Umur Pasien" required="">
                    </div>
                    <div class="form-group">
                      <label>Alamat Pasien</label>
                      <input type="text" class="form-control" name="alamat" placeholder="Input Alamat Pasien" required="">
                    </div>
                    <div class="form-group">
                      <label>Np Hp</label>
                      <input type="text" class="form-control" name="no_hp" placeholder="Input Nomor Handphone" required="">
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
  					<h3 class="box-title">Update Data Pasien</h3>
  					<div class="box-tools pull-right">
  						<a href="<?=base_url()?>Main/pasien" class="btn btn-danger btn-sm">
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
  							<form role="form" action="<?=base_url()?>Main/pasien/update" method="POST">
  								<div class="box-body">
  									<input type="hidden" name="id_pasien" value="<?=$data_pasien->id_pasien?>">
                    <div class="form-group">
                      <label>Nama Pasien</label>
                      <input type="text" value="<?=$data_pasien->nama_pasien?>" class="form-control" name="nama_pasien" placeholder="Input Nama Pasien" required="">
                    </div>
                    <div class="form-group">
                      <label>Pilih Jenis Kelamin</label>
                      <select name="jenis_kelamin" class="form-control" required="">
                        <?php if($data_pasien->jenis_kelamin == "Laki-Laki"){?>
                          <option value="Laki-Laki" selected="">Laki-Laki</option>
                          <option value="Perempuan">Perempuan</option>
                        <?php } else {?>
                          <option value="Laki-Laki">Laki-Laki</option>
                          <option value="Perempuan" selected="">Perempuan</option>
                        <?php }?>
                        
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Umur Pasien</label>
                      <input type="number" value="<?=$data_pasien->umur?>"  class="form-control" name="umur" placeholder="Input Umur Pasien" required="">
                    </div>
                    <div class="form-group">
                      <label>Alamat Pasien</label>
                      <input type="text" value="<?=$data_pasien->alamat?>"  class="form-control" name="alamat" placeholder="Input Alamat Pasien" required="">
                    </div>
                    <div class="form-group">
                      <label>Np Hp</label>
                      <input type="text" value="<?=$data_pasien->no_hp?>"  class="form-control" name="no_hp" placeholder="Input Nomor Handphone" required="">
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
  		$('#linkHapus').attr('href', '<?=base_url()?>Main/pasien/delete/'+id_data);
  		$('#modal-danger').modal('show');
  	}
  </script>