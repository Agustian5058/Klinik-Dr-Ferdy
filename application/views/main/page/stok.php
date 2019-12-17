  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    </br>
    <ol class="breadcrumb">
      <li><a href="<?=base_url()?>Main/index/dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="<?=base_url()?>Main/barang">Tables</a></li>
      <li class="active">Data Stok Barang</li>
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
              <h3 class="box-title">Data Stok Barang</h3>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="box-tools pull-right">
                <a href="<?=base_url()?>Main/stok/add" class="btn btn-primary btn-sm">
                  <i class="fa fa-plus"> </i> Tambah Stok Barang
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
                  <th>Stok Akhir</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                foreach ($data_stok as $list) { ?>
                  <tr>
                    <td style="text-align: center;"><?=$list->Nomor?></td>
                    <td style="text-align: center;"><?=$list->nama_barang?></td>
                    <td style="text-align: center;"><?=$list->harga?></td>
                    <td style="text-align: center;"><?=$list->stok?></td>
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
            <h3 class="box-title">Tambah Stok Barang</h3>
            <div class="box-tools pull-right">
              <a href="<?=base_url()?>Main/stok/" class="btn btn-danger btn-sm">
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
                <form role="form" action="<?=base_url()?>Main/stok/add" method="POST">
                  <div class="box-body">
                    <input type="hidden" name="user" value="<?=$this->session->userdata('nama_user')?>">
                    <?=$this->session->userdata('nama_user')?>
                    <div class="form-group">
                      <label>Pilih Barang</label>
                      <select name="id_barang" class="form-control" required="">
                        <option value="">Pilih Barang</option>
                        <?php foreach($barang as $row)
                        {
                          echo '<option value="'.$row->id_barang.'">'.$row->nama_barang.'</option>';
                        }
                        ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Jumlah Barang Masuk</label>
                      <input type="number" class="form-control" name="stok" placeholder="Input Jumlah Barang" required="">
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
      <?php } ?>
      </div>
    </div>
    </section>
  </div>