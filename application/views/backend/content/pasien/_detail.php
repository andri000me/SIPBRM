<div class="content-wrapper">
  <div class="row">
    <div class="col-12 grid-margin">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title"><?=$title." ".$data['no_rm'] ?></h4>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label class="col-form-label">No Rm</label>
                    <h5><?= Input_helper::postOrOr('no_rm', $data['no_rm']) ?></h5>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label class="col-form-label">Nama</label>
                    <h5><?= Input_helper::postOrOr('nama', $data['nama']) ?></h5>
                </div>
              </div>
              <div class='col-md-6'>
                <div class='form-group'>
                  <label for="" class='col-form-label'>Jenis Kelamin</label>
                  <h5><?= GENDER[Input_helper::postOrOr('jk', $data['jk'])] ?></h5>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label class="col-form-label">Tempat, Tanggal Lahir</label>
                    <h5><?= Input_helper::postOrOr('tempat_lahir', $data['tempat_lahir']) ?>, <?= Input_helper::postOrOr('tanggal_lahir', $data['tanggal_lahir']) ?></h5>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label class="col-form-label">Telp</label>
                    <h5><?= Input_helper::postOrOr('telp', $data['telp']) ?></h5>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label class="col-form-label">Agama</label>
                    <h5><?= Input_helper::postOrOr('agama', $data['agama']) ?></h5>
                </div>
              </div>
              
              <div class="col-md-6">
                <div class="form-group">
                  <label class="col-form-label">Pendidikan</label>
                    <h5><?= Input_helper::postOrOr('pendidikan', $data['pendidikan']) ?></h5>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label class="col-form-label">Pekerjaan</label>
                    <h5><?= Input_helper::postOrOr('pekerjaan', $data['pekerjaan']) ?></h5>
                </div>
              </div>

              <div class='col-md-12'>
                <div class='form-group'>
                  <label for="" class='col-form-label'>Alamat</label>
                  <h6><?= Input_helper::postOrOr('alamat', $data['alamat']) ." ". $data['desa']." ".$data['kecamatan']." ".$data['kabupaten'].", ".$data['provinsi']  ?></h6>
                </div>
              </div>
            </div>
        </div>
      </div>
    </div>
   
  </div>
</div>