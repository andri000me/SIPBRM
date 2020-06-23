  
<div class="content-wrapper">
    <div class="row">
    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 grid-margin stretch-card">
        <div class="card card-statistics">
        <div class="card-body">
            <div class="clearfix">
            <div class="float-left">
                <i class="mdi mdi-cube text-danger icon-lg"></i>
            </div>
            <div class="float-right">
                <p class="mb-0 text-right">Total Pasien</p>
                <div class="fluid-container">
                <h3 class="font-weight-medium text-right mb-0"><?=count($pasien)?></h3>
                </div>
            </div>
            </div>
            <p class="text-muted mt-3 mb-0">
            <i class="mdi mdi-alert-octagon mr-1" aria-hidden="true"></i> jumlah pasien yang terdaftar
            </p>
        </div>
        </div>
    </div>
    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 grid-margin stretch-card">
        <div class="card card-statistics">
        <div class="card-body">
            <div class="clearfix">
            <div class="float-left">
                <i class="mdi mdi-receipt text-warning icon-lg"></i>
            </div>
            <div class="float-right">
                <p class="mb-0 text-right">Berkas Dipinjam</p>
                <div class="fluid-container">
                <h3 class="font-weight-medium text-right mb-0"><?=count($pinjam)?></h3>
                </div>
            </div>
            </div>
            <p class="text-muted mt-3 mb-0">
            <i class="mdi mdi-bookmark-outline mr-1" aria-hidden="true"></i> jumlah berkas yang dipinjam
            </p>
        </div>
        </div>
    </div>
    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 grid-margin stretch-card">
        <div class="card card-statistics">
        <div class="card-body">
            <div class="clearfix">
            <div class="float-left">
                <i class="mdi mdi-poll-box text-success icon-lg"></i>
            </div>
            <div class="float-right">
                <p class="mb-0 text-right">Jumlah Pengguna</p>
                <div class="fluid-container">
                <h3 class="font-weight-medium text-right mb-0"><?=count($pengguna)?></h3>
                </div>
            </div>
            </div>
            <p class="text-muted mt-3 mb-0">
            <i class="mdi mdi-calendar mr-1" aria-hidden="true"></i> jumlah pengguna yang terdaftar
            </p>
        </div>
        </div>
    </div>
    
    </div>
    
    
    <div class="row">
        <div class="col-lg-12 grid-margin">
            <div class="card">
            <div class="card-body">
                <!-- <h4 class="card-title">Buku Terpopuler</h4>
                <div class='row'>
                    <div class="form-group col-md-3">
                        <label for="exampleFormControlSelect3">Jenis Filter</label>
                        <select class="form-control form-control-sm" id="jenis">
                        <option value=''>Pilih Jenis</option>
                        <option value='tahun'>Tahun</option>
                        <option value='bulan'>Bulan</option>
                        <option value='tanggal'>Tanggal</option>
                        <option value='jangka'>Jangka Waktu</option>
                        </select>
                    </div>
                    <div class="form-group col-md-3" id='tahunForm'>
                        <label for="exampleFormControlSelect3">Tahun</label>
                        <select class="form-control form-control-sm" id="tahun">
                        <option value=''>Pilih Tahun</option>
                        <option value='tahun'>Tahun</option>
                        <option value='hari'>Hari</option>
                        <option value='jangka'>Jangka Waktu</option>
                        </select>
                    </div>
                    <div class="form-group col-md-3 " id='bulanForm'>
                        <label for="exampleFormControlSelect3">Bulan</label>
                        <select class="form-control form-control-sm" id="bulan">
                        <option value=''>Pilih Bulan</option>
                        <option value='tahun'>Tahun</option>
                        <option value='hari'>Hari</option>
                        <option value='jangka'>Jangka Waktu</option>
                        </select>
                    </div>
                    <div class="form-group col-md-3 " id='tanggalForm'>
                        <label for="exampleFormControlSelect3">Tanggal</label>
                        <select class="form-control form-control-sm" id="tanggal">
                        <option value=''>Pilih Tanggal</option>
                        <option value='tahun'>Tahun</option>
                        <option value='hari'>Hari</option>
                        <option value='jangka'>Jangka Waktu</option>
                        </select>
                    </div>
                    <div class='col-md-8 ' id='jangkaForm'>
                        <div class="row">
                            <div class="form-group col-md-3 ">
                                <label for="exampleFormControlSelect3">Tanggal Mulai</label>
                                <input type='date' class="form-control form-control-md" placeholder="dd/mm/yyyy">
                            </div>
                            <div class="form-group col-md-3 " >
                                <label for="exampleFormControlSelect3">Tanggal Selesai</label>
                                <input type='date' class="form-control form-control-md" placeholder="dd/mm/yyyy">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>
                        #
                        </th>
                        <th>
                        Judul
                        </th>
                        <th>
                        Dilihat
                        </th>
                        <th>
                        Tanggal
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php 
                    $no = 1;
                    foreach($view as $b){
                    ?>
                    <tr>
                        <td class="font-weight-medium"> <?=$no?> </td>
                        <td> <?=$b['judul']?> </td>
                        <td> <?=$b['view']?>
                        </td>
                        
                        <td>
                        <?=date("d M Y", strtotime($b['tanggal']));?>
                        </td>
                    </tr>
                    <?php $no++;} ?>
                    </tbody>
                </table>
                </div> -->
            </div>
            </div>
        </div>
        
    </div>
</div>

