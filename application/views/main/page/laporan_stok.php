  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    </br>
    <ol class="breadcrumb">
      <li><a href="<?=base_url()?>Main/index/dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="<?=base_url()?>Main/barang">Tables</a></li>
      <li class="active">Laporan Stok Barang</li>
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
              <h3 class="box-title">Laporan Stok Barang</h3>
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
                  <th>Tanggal</th>
                  <th>Keterangan</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                foreach ($riwayat as $list) { ?>
                  <tr>
                    <td style="text-align: center;"><?=$list->Nomor?></td>
                    <td style="text-align: center;"><?=$list->tanggal_riwayat?></td>
                    <td style="text-align: center;"><?=$list->keterangan_riwayat?></td>
                  </tr>
                <?php  } ?>
              </tbody>
            </table>
          </div>
        </div>
        <!-- body tampilan add -->
      <?php } ?>
      </div>
    </div>
    </section>
  </div>