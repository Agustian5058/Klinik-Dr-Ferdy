<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
    Dashboard</h1>
    <ol class="breadcrumb">
      <li><a href="<?=base_url()?>admin/index/dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Dashboard</li>
    </ol>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="callout callout-info">
          <h4>Selamat Datang...!</h4>
          <p>Di Website Klinik Dr Fredy</p>
        </div>
        <!-- body untu tampilan data table -->
        <?php if ($tampilan == 'hasil') { ?>
          <div class="box box-success box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Data Pasien</h3>
            </div>
            <div class="box-body">
              <style type="text/css"> table, th { text-align: center; }
                table, td { text-align: left; }
              </style>
              <table id="example1" class="table table-bordered table-striped">
                <?php echo $hasil; ?>
              </table>
            </div>
          </div>
        <?php } ?>
      </div>
    </div>
  </section>
</div>
