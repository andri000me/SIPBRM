
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Pengembalian Report</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="<?=base_url('assets/')?>/vendors/iconfonts/font-awesome/css/font-awesome.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?= base_url("assets/css/bootstrap.css") ?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
    <style>
    .invoice-col{float:left;width:33.3333333%}
    </style>
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body onload="window.print();">
<div class="wrapper">
  <!-- Main content -->
  <section class="invoice">
    <!-- title row -->
    <div class="row">
      <div class="col-xs-12">
        <h2 class="page-header">
          <i class="fa fa-hospital-o"></i> Pengembalian
          <small class="pull-right">Date: <?= date('Y-m-d') ?></small>
        </h2>
      </div>
      <!-- /.col -->
    </div>
    <!-- info row -->
    <div class="row invoice-info">
      <div class="col-sm-4">
        Dokumen
        <address>
          <strong><?= $data['nama']."[".$data['no_rm']."]" ?></strong><br>
          <?= $data['tanggal_lahir_pasien'] ?>
        </address>
      </div>
      <!-- /.col -->
      <div class="col-sm-4 ">
        Peminjam
        <address>
          <strong><?= $data['peminjam'] ?></strong><br>
          <?= $data['email'] ?>
        </address>
      </div>
      <!-- /.col -->
      <div class="col-sm-4">
        <b>pengambilan #<?= $data['id_pengambilan'] ?></b><br>
        <br>
        <b>Tanggal Pinjam:</b> <?= date('Y-m-d', strtotime($data['created_at'])) ?><br>
        <b>Tanggal Jadwal Pengembalian:</b> <?= date('Y-m-d', strtotime($data['tanggal_harus_kembali'])) ?><br>
      </div>
      <div class="col-sm-4">
        <b>Pengembalian #<?= $data['id_pengembalian'] ?></b><br>
        <br>
        <b>Tanggal Kembali:</b> <?= date('Y-m-d', strtotime($data['tanggal_kembali'])) ?><br>
        <b>Keterangan:</b> <?= $data['keterangan'] ?><br>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- ./wrapper -->
</body>
</html>
