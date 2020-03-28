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
                  <label class="col-form-label">Nama</label>
                    <input type="text" class="form-control" name='nama' value="<?= Input_helper::postOrOr('nama', $data['nama']) ?>" placeholder='masukkan nama' required />
                </div>
              </div>
              <div class='col-md-6'>
                <div class='form-group'>
                  <label for="" class='col-form-label'>Jenis Kelamin</label>
                    <select class="form-control" name='jk' required>
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
              <div class="col-md-6">
                <div class="form-group">
                  <label class="col-form-label">Telp</label>
                    <input type="text" class="form-control" name='telp' value="<?= Input_helper::postOrOr('telp', $data['telp']) ?>" placeholder='masukkan telp' required />
                </div>
              </div>
              <div class='col-md-6'>
                <div class='form-group'>
                  <label for="" class='col-form-label'>Poli</label>
                    <select class="form-control" name='id_poli' required>
                      <option value="">Pilih Poli</option>
                      <?php
                  $pol = Input_Helper::postOrOr('id_poli', $data['id_poli']);
                  foreach ($poli as $p) {
                  ?>
                    <option <?= ($pol == $p['id'] ? "selected" : "")?> value="<?= $p['id'] ?>"><?= $p['nama'] ?></option>
                  <?php } ?>
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
              <button class='btn btn-primary pull-right' type='submit'><?=$type?></button>
            </div>
          </form>
        </div>
      </div>
    </div>
   
  </div>
</div>