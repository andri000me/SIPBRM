<!DOCTYPE html>
<html>
<head>
  <title><?=$title?></title>
  <link rel="stylesheet" href="<?=base_url('assets/css/reportStyle.css')?>">
  <style>
  .row {
    margin: 0 -10px;
  }

  .row:after, .clear:after {
      display: block;
      content: '';
      clear: both;
  }
  .col-md-6{
    width:50%;
  }
  table tr td{
    padding:8px;
  }
  [class*='col-'] {
      float: left;
      width: 100%;
      padding: 10px;
  }
  .inline{
    float:left;
  }
  </style>
</head>
<body>
<div>
<div style="clear: both;"></div>
    <div style='width:100%;' >
    <table style='margin-top:-20px;'>
          <tr>
            <td><img style='height:25px;width:25px;' src="<?=base_url("assets/images/dinas.png")?>" alt=""></td>
            <td></td>
            <td style='text-align:center'>
              <p style='font-size:8px;margin-bottom:-8px'>PEMERINTAH KABUPATEN BONDOWOSO</p>
              <p style='font-size:8px;margin-bottom:-8px'>DINAS PERPUSTAKAAN DAN KEARSIPAN</p>
              <p style='font-size:8px;margin-bottom:-8px'>Jl. A Yani 33 A TELP 0332-420203</p>
              <p style='font-size:10px;'>BONDOWOSO</p>
            </td>
            <td><img style='height:25px;width:25px;' src="<?=base_url("assets/qrcode/$data[nik].png")?>" alt=""></td>
          </tr>
        </table>
        <h4 style='text-align:center;margin-top:-10px;font-size:12px'>Kartu Keanggotaan</h4>
        <hr style='width:100%;margin-top:-20px;'/>
        <div style='font-size:8px'>
            <div style='display:inline;width:90px'>
                Nik
            </div>
            <div style='display:inline;width:10px'>
              :
            </div>
            <div style='display:inline;width:100px'>
            <?=$data['nik']?>
            </div>
        </div>
        <div style='font-size:8px'>
            <div style='display:inline;width:90px'>
                Nama
            </div>
            <div style='display:inline;width:10px'>
              :
            </div>
            <div style='display:inline;width:100px'>
            <?=$data['nama']?>
            </div>
        </div>
        <div style='font-size:8px'>
            <div style='display:inline;width:90px'>
                Email
            </div>
            <div style='display:inline;width:10px'>
              :
            </div>
            <div style='display:inline;width:100px'>
            <?=$data['email']?>
            </div>
        </div>
        <div style='font-size:8px'>
            <div style='display:inline;width:90px'>
                No HP
            </div>
            <div style='display:inline;width:10px'>
              :
            </div>
            <div style='display:inline;width:100px'>
            <?=$data['no_hp']?>
            </div>
        </div>
        <div style='font-size:8px'>
            <div style='display:inline;width:90px'>
                Alamat
            </div>
            <div style='display:inline;width:10px'>
              :
            </div>
            <div style='display:inline;width:100px'>
            <?=$data['alamat']?>
            </div>
        </div>
        <!-- <table cellspacing="0" style='width:100%;margin-top:0;border-collapse: collapse;border-spacing: 1cm 20em;'>
            <tr>
              <td style='width:80px;font-size:10px;'>Nik</td><td>:</td><td style='width:130px;font-size:10px'><?=$data['nik']?></td>
            </tr>
            <tr>
              <td style='width:80px;font-size:10px;'>Nama</td><td>:</td><td style='width:130px;font-size:10px'><?=$data['nama']?></td>
            </tr>
            <tr>
              <td style='width:80px;font-size:10px;'>Email</td><td>:</td><td style='width:130px;font-size:10px'><?=$data['email']?></td>
            </tr>
            <tr>
              <td style='width:80px;font-size:10px;'>No Hp</td><td>:</td><td style='width:130px;font-size:10px'><?=$data['no_hp']?></td>
            </tr>
            <tr>
              <td style='width:80px;font-size:10px;'>Alamat</td><td>:</td><td style='width:130px;font-size:10px'><?=$data['alamat']?></td>
            </tr>
        </table> -->
    </div>
    <!-- <div style='width:50%' class='inline'>
      <img src="<?=base_url("assets/qrcode/$data[nik].png")?>" alt="">
    </div> -->
  <!-- </div> -->
  
</div>
</body>
</html>
