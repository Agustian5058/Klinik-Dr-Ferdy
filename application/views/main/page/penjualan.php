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
  		<?php } else if ($tampilan == 'detail') { ?>
          <div class="box box-success box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Data Penjualan</h3>
              <div class="box-tools pull-right">
              <a href="<?=base_url()?>Main/penjualan/riwayat/<?=$id_pasien?>" class="btn btn-danger btn-sm">
                <i class="fa fa-arrow-left"> </i> Back
              </a>
            </div>
              <!-- /.box-tools -->
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
                  <th>Jumlah</th>
                  <th>Diskon</th>
                  <th>Total</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                foreach ($data_detail as $list) { ?>
                  <tr>
                    <td style="text-align: center;"><?=$list->Nomor?></td>
                    <td style="text-align: center;"><?=$list->nama_barang?></td>
                    <td style="text-align: center;"><?=$list->jumlah?></td>
                    <td style="text-align: center;"><?=$list->diskon?></td>
                    <td style="text-align: center;"><?=$list->total?></td>
                  </tr>
                <?php  } ?>
              </tbody>
            </table>
          </div>
        </div>
        <!-- body tampilan add -->
      <?php } else if ($tampilan == 'riwayat') { ?>
          <div class="box box-success box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Data Penjualan</h3>
              <div class="box-tools pull-right">
              <a href="<?=base_url()?>Main/penjualan" class="btn btn-danger btn-sm">
                <i class="fa fa-arrow-left"> </i> Back
              </a>
            </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="box-tools pull-right">
                <a href="<?=base_url()?>Main/penjualan/riwayat/add/<?=$id_pasien?>" class="btn btn-primary btn-sm">
                  <i class="fa fa-plus"> </i> Tambah Penjualan
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
                  <th>Tanggal</th>
                  <th>Karyawan</th>
                  <th>Total Barang</th>
                  <th>Total Bayar</th>
                  <th>Keterangan</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                foreach ($data_pasien as $list) { ?>
                  <tr>
                    <td style="text-align: center;"><?=$list->Nomor?></td>
                    <td style="text-align: center;"><?=$list->tanggal?></td>
                    <td style="text-align: center;"><?=$list->username?></td>
                    <td style="text-align: center;"><?=$list->total_penjualan?></td>
                    <td style="text-align: center;"><?=$list->total_pembayaran?></td>
                    <td style="text-align: center;"><?=$list->keterangan_penjualan?></td>
                    <td style="text-align: center;"><?=$list->Aksi?></td>
                  </tr>
                <?php  } ?>
              </tbody>
            </table>
          </div>
        </div>
        <!-- body tampilan add -->
      <?php } else if ($tampilan == 'add') { ?>
        <div class="box box-success box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Data Penjualan</h3>
              <div class="box-tools pull-right">
              <a href="<?=base_url()?>Main/penjualan/riwayat/<?=$id_pasien?>" class="btn btn-danger btn-sm">
                <i class="fa fa-arrow-left"> </i> Back
              </a>
            </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <style type="text/css"> table, th { text-align: center; }
              table, td { text-align: left; }
            </style>
            <form action="<?=base_url()?>Main/penjualan/riwayat/add" method="POST">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Nomor</th>
                  <th>Nama Barang</th>
                  <th>Harga</th>
                  <th>Jumlah Pembelian</th>
                  <th>Diskon</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                $i = 0;
                foreach ($data_barang as $list) { 
                $i++; ?>
                  <input type="hidden" name="id_pasien" value="<?=$id_pasien?>">
                  <input type="hidden" name="nomor" value="<?=$i?>">
                  <tr>
                    <td style="text-align: center;"><?= $i?></td>
                    <td style="text-align: center;">
                      <input type="hidden" class="form-control" name="id_barang<?= $i?>" value="<?=$list->id_barang?>">
                      <input type="hidden" class="form-control" name="nama_barang<?= $i?>" value="<?=$list->nama_barang?>">
                      <?=$list->nama_barang?>
                    </td>
                    <td style="text-align: center;">
                      <input type="hidden" class="form-control" name="harga_barang<?= $i?>" value="<?=$list->harga?>">
                      <?=$list->harga?>
                    </td>
                    <td style="text-align: center;">
                      <div class="form-group">
                        <input type="number" class="form-control" name="jumlah<?= $i?>" placeholder="Input Jumlah Pembelian">
                      </div>
                    </td>
                    <td style="text-align: center;">
                      <div class="form-group">
                        <input type="number" class="form-control" name="diskon<?= $i?>" placeholder="Input Diskon Jika Ada">
                      </div>
                    </td>
                  </tr>
                <?php  } ?>
                <tr>
                  <td>
                    <button class="btn btn-sm btn-success"><i><b>Submit Pembelian</b></i></button>
                  </td>
                </tr>
              </tbody>
            </table>
          </form>
          </div>
        </div>
  			<?php } else if ($tampilan == 'review') { ?>
        <div class="box box-success box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Review Penjualan</h3>
              <div class="box-tools pull-right">
              <a href="<?=base_url()?>Main/penjualan/riwayat/add/<?=$id_pasien?>" class="btn btn-danger btn-sm">
                <i class="fa fa-arrow-left"> </i> Back
              </a>
            </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <style type="text/css"> table, th { text-align: center; }
              table, td { text-align: left; }
            </style>
            <form action="<?=base_url()?>Main/penjualan/riwayat/review" method="POST">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Nomor</th>
                  <th>Nama Barang</th>
                  <th>Harga</th>
                  <th>Jumlah Pembelian</th>
                  <th>Hasil</th>
                  <th>Diskon</th>
                  <th>Total</th>
                </tr>
              </thead>
              <tbody>
                
                <?php 
                $hasil = 0;
                $total_barang = 0;
                $x = 0;
                for($i = 1; $i <= $nomor; $i++){  $x++?>
                  <input type="hidden" name="id_pasien" value="<?=$id_pasien?>">
                  <input type="hidden" name="user" value="<?=$this->session->userdata('nama_user')?>">
                  <tr>
                <?php if($penjualan[$i]['jumlah'] > 0) { 
                  $hasil = $hasil + $penjualan[$i]['total_bayar'];
                  $total_barang = $total_barang + $penjualan[$i]['jumlah'];?>
                  <td style="text-align: center;"><?= $x?></td>
                    <td style="text-align: center;">
                      <input type="hidden" class="form-control" name="id_barang<?= $x?>" value="<?=$penjualan[$i]['id_barang']?>">
                      <?=$penjualan[$i]['nama_barang']?>
                    </td>
                    <td style="text-align: center;">
                      <input type="hidden" class="form-control" name="harga_barang<?= $x?>" value="<?=$penjualan[$i]['harga_barang']?>">
                      <?=$penjualan[$i]['harga_barang']?>
                    </td>
                    <td style="text-align: center;">
                      <div class="form-group">
                        <input type="hidden" class="form-control" name="jumlah<?= $x?>" value="<?=$penjualan[$i]['jumlah']?>">
                        <?=$penjualan[$i]['jumlah']?>
                      </div>
                    </td>
                    <td style="text-align: center;">
                      <div class="form-group">
                        <input type="hidden" class="form-control" name="total<?= $x?>" value="<?=$penjualan[$i]['total']?>">
                        <?=$penjualan[$i]['total']?>
                      </div>
                    </td>
                    <td style="text-align: center;">
                      <div class="form-group">
                        <input type="hidden" class="form-control" name="diskon<?= $i?>" value="<?=$penjualan[$i]['diskon']?>">
                        <?=$penjualan[$i]['diskon']?>
                      </div>
                    </td>
                    <td style="text-align: center;">
                      <div class="form-group">
                        <input type="hidden" class="form-control" name="total_bayar<?= $i?>" value="<?=$penjualan[$i]['total_bayar']?>">
                        <?=$penjualan[$i]['total_bayar']?>
                      </div>
                    </td>
                <?php } else{; ?>
                  
                <?php } ?>
                  </tr>
                <?php  } ?>
                <tr>
                  <td colspan="3" style="text-align: center;"><b>Total Barang</b></td><td style="text-align: center;">
                    <input type="hidden" class="form-control" name="total_penjualan" value="<?=$total_barang?>">
                    <input type="hidden" class="form-control" name="nomor" value="<?=$x?>">
                    <b><?=$total_barang?></b>
                  </td>
                  <td colspan="2" style="text-align: center;"><b>Total Pembayaran</b></td><td style="text-align: center;">
                    <input type="hidden" class="form-control" name="total_keseluruhan" value="<?=$hasil?>">
                    <b><?=$hasil?></b>
                  </td>
                </tr>
                <tr>
                  <td colspan="7" style="text-align: center;">
                    <input type="text" class="form-control" name="keterangan_penjualan" placeholder="Input Keterangan">
                  </td>
                </tr>
                <tr>
                  <td>
                    <button class="btn btn-sm btn-success"><i><b>Submit Pembelian</b></i></button>
                  </td>
                </tr>
              </tbody>
            </table>
          </form>
          </div>
        </div>
        <?php } ?>

  		</div>
  	</div>
  	</section>

  </div>