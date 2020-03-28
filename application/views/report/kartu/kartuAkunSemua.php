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
      /* width: 100%; */
      
  }
  .inline{
    float:left;
  }
  .col-md-6{
    width:50%;
  }
  .col-md-12{
    width:100%;
  }
  #sidedish{
    float:left;
    border:1px solid red;
    width:100px;
    height:100px;
  }
  #maindish{
    float:right;
    width:200px;
    border:1px solid red;
    height:100px;
    text-align:center;
  }
  #container{
    width:340px;
    height:100px;
    border:1px solid red;
  }
  </style>
</head>
<body>
<div style="clear: both;"></div>
        <?php 
        foreach($data as $d){
        ?>
        <table style='margin-top:-40px;'>
          <tr>
            <td><img style='height:25px;width:25px;' src="<?=base_url("assets/images/dinas.png")?>" alt=""></td>
            <td></td>
            <td style='text-align:center'>
              <p style='font-size:8px;margin-bottom:-8px'>PEMERINTAH KABUPATEN BONDOWOSO</p>
              <p style='font-size:8px;margin-bottom:-8px'>DINAS PERPUSTAKAAN DAN KEARSIPAN</p>
              <p style='font-size:8px;margin-bottom:-8px'>Jl. A Yani 33 A TELP 0332-420203</p>
              <p style='font-size:10px;'>BONDOWOSO</p>
            </td>
            <td><img style='height:25px;width:25px;' src="<?=base_url("assets/qrcode/$d[nik].png")?>" alt=""></td>
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
            <?=$d['nik']?>
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
            <?=$d['nama']?>
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
            <?=$d['email']?>
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
            <?=$d['no_hp']?>
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
            <?=$d['alamat']?>
            </div>
        </div>
        <!-- <table cellspacing="0" style='width:100%;margin-top:-10px;border-collapse: collapse;border-spacing: 1cm 20em;'>
          <tr style='padding:90px;'>
            <td style='width:80px;font-size:10px;padding:0!important'>Nik</td><td>:</td><td style='width:130px;font-size:10px'><?=$d['nik']?></td>
          </tr>
          <tr>
            <td style='width:80px;font-size:10px;padding:0!important'>Nama</td><td>:</td><td style='width:130px;font-size:10px'><?=$d['nama']?></td>
          </tr>
          <tr>
            <td style='width:80px;font-size:10px;padding:0!important'>Email</td><td>:</td><td style='width:130px;font-size:10px'><?=$d['email']?></td>
          </tr>
          <tr>
            <td style='width:80px;font-size:10px;padding:0!important'>No Hp</td><td>:</td><td style='width:130px;font-size:10px'><?=$d['no_hp']?></td>
          </tr>
          <tr>
            <td style='width:80px;font-size:10px;padding:0!important'>Alamat</td><td>:</td><td style='width:130px;font-size:10px'><?=$d['alamat']?></td>
          </tr>
        </table> -->
        <?php } ?>
</body>
</html>
