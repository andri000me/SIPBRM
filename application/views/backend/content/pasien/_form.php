<div class="content-wrapper">
  <div class="row">
    <div class="col-12 grid-margin">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title"><?=$title ?></h4>
          <form class="form-sample" method="POST" action=''>
          <?php Response_Helper::part('alert')?>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label class="col-form-label">No Rm</label>
                    <input type="text" class="form-control" name='no_rm' value="<?= Input_helper::postOrOr('no_rm', $data['no_rm']) ?>" placeholder='masukkan No Rm' required />
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label class="col-form-label">Nama</label>
                    <input type="text" class="form-control" name='nama' value="<?= Input_helper::postOrOr('nama', $data['nama']) ?>" placeholder='masukkan nama' required />
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label class="col-form-label">Tempat, Tanggal Lahir</label>
                    <div class="row">
                      <div class="col-md-6">
                        <input type="text" class="form-control" name='tempat_lahir' value="<?= Input_helper::postOrOr('tempat_lahir', $data['tempat_lahir']) ?>" placeholder='masukkan tempat_lahir' required />
                      </div>
                      <div class="col-md-6">
                        <input type="date" class="form-control" name='tanggal_lahir' value="<?= Input_helper::postOrOr('tanggal_lahir', $data['tanggal_lahir']) ?>" placeholder='masukkan tanggal_lahir' required />
                      </div>
                    </div>
                </div>
              </div>
              <div class='col-md-6'>
                <div class='form-group'>
                  <label for="" class='col-form-label'>Jenis Kelamin</label>
                    <select class="form-control" id="jk" name='jk' required>
                      <option value="">Pilih Jenis Kelamin</option>
                      <?php 
                      $jen = Input_helper::postOrOr('jk', $data['jk']);
                      ?>
                      <option value="1" <?= ($jen == '1' ? 'selected'  : '') ?>>Laki Laki</option>
                      <option value="0" <?= ($jen == '0' ? 'selected'  : '') ?>>Perempuan</option>
                  </select>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label class="col-form-label">Telp</label>
                    <input type="text" class="form-control" name='telp' value="<?= Input_helper::postOrOr('telp', $data['telp']) ?>" placeholder='masukkan telp' required />
                </div>
              </div>
              <div class='col-md-6'>
                <div class='form-group'>
                  <label for="" class='col-form-label'>Provinsi</label>
                    <select class="form-control" id="provinsi" name='provinsi' required>
                      <option value="">Pilih Provinsi</option>
                      <?php
                  $prov = Input_Helper::postOrOr('provinsi', $data['provinsi']);
                  foreach ($provinsi as $p) {
                  ?>
                    <option <?= ($prov == $p['id'] ? "selected" : "")?> value="<?= $p['id'] ?>"><?= $p['name'] ?></option>
                  <?php } ?>
                  </select>
                </div>
              </div>
              <div class='col-md-6'>
                <div class='form-group'>
                  <label for="" class='col-form-label'>Kabupaten</label>
                    <select name="kabupaten" id="kabupaten" class="form-control">
                        <option value="">Pilih Kabupaten</option>
                    </select>
                </div>
              </div>
              <div class='col-md-6'>
                <div class='form-group'>
                  <label for="" class='col-form-label'>Kecamatan</label>
                  <select name="kecamatan" id="kecamatan" class="form-control">
                      <option value="">Pilih Kecamatan</option>
                  </select>
                </div>
              </div>
              <div class='col-md-6'>
                <div class='form-group'>
                  <label for="" class='col-form-label'>Desa</label>
                  <input type="hidden" id="id_desa_selected" value="<?= Input_helper::postOrOr('id_desa', $data['id_desa']) ?>">
                  <select name="id_desa" id="desa" class="form-control">
                      <option value="">Pilih Desa</option>
                  </select>
                </div>
              </div>
              <div class='col-md-12'>
                <div class='form-group'>
                  <label for="" class='col-form-label'>Alamat</label>
                  <textarea name="alamat" id="" class="form-control" cols="30" rows="10"><?= Input_helper::postOrOr('alamat', $data['alamat']) ?></textarea>
                </div>
              </div>
            </div>
           
            <div class='col-md-12'>
              <button class='btn btn-primary pull-right' id="simpan" type='submit'><?=$type?></button>
            </div>
          </form>
        </div>
      </div>
    </div>
   
  </div>
</div>