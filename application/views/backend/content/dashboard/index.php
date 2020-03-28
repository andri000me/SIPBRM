  
<div class="content-wrapper">
    <div class="row">
    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
        <div class="card card-statistics">
        <div class="card-body">
            <div class="clearfix">
            <div class="float-left">
                <i class="mdi mdi-cube text-danger icon-lg"></i>
            </div>
            <div class="float-right">
                <p class="mb-0 text-right">Total Buku</p>
                <div class="fluid-container">
                <h3 class="font-weight-medium text-right mb-0"><?=count($buku)?></h3>
                </div>
            </div>
            </div>
            <p class="text-muted mt-3 mb-0">
            <i class="mdi mdi-alert-octagon mr-1" aria-hidden="true"></i> jumlah buku yang terdaftar
            </p>
        </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
        <div class="card card-statistics">
        <div class="card-body">
            <div class="clearfix">
            <div class="float-left">
                <i class="mdi mdi-receipt text-warning icon-lg"></i>
            </div>
            <div class="float-right">
                <p class="mb-0 text-right">Buku Dipinjam</p>
                <div class="fluid-container">
                <h3 class="font-weight-medium text-right mb-0"><?=count($pinjam)?></h3>
                </div>
            </div>
            </div>
            <p class="text-muted mt-3 mb-0">
            <i class="mdi mdi-bookmark-outline mr-1" aria-hidden="true"></i> jumlah buku yang dipinjam oleh anggota
            </p>
        </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
        <div class="card card-statistics">
        <div class="card-body">
            <div class="clearfix">
            <div class="float-left">
                <i class="mdi mdi-poll-box text-success icon-lg"></i>
            </div>
            <div class="float-right">
                <p class="mb-0 text-right">Buku Telat</p>
                <div class="fluid-container">
                <h3 class="font-weight-medium text-right mb-0"><?=count($telat)?></h3>
                </div>
            </div>
            </div>
            <p class="text-muted mt-3 mb-0">
            <i class="mdi mdi-calendar mr-1" aria-hidden="true"></i> jumlah buku yang telat dikembalikan
            </p>
        </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
        <div class="card card-statistics">
        <div class="card-body">
            <div class="clearfix">
            <div class="float-left">
                <i class="mdi mdi-account-location text-info icon-lg"></i>
            </div>
            <div class="float-right">
                <p class="mb-0 text-right">Anggota</p>
                <div class="fluid-container">
                <h3 class="font-weight-medium text-right mb-0"><?=$anggota?></h3>
                </div>
            </div>
            </div>
            <p class="text-muted mt-3 mb-0">
            <i class="mdi mdi-reload mr-1" aria-hidden="true"></i> jumlah anggota yang terdaftar
            </p>
        </div>
        </div>
    </div>
    </div>
    
    
    <div class="row">
        <div class="col-lg-12 grid-margin">
            <div class="card">
            <div class="card-body">
                <h4 class="card-title">Buku Terpopuler</h4>
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
                        <td> <?=$b['view']?>x
                        <!-- <div class="progress">
                            <div class="progress-bar bg-success progress-bar-striped" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0"
                            aria-valuemax="100"></div>
                        </div> -->
                        </td>
                        
                        <td>
                        <?=date("d M Y", strtotime($b['tanggal']));?>
                        </td>
                    </tr>
                    <?php $no++;} ?>
                    </tbody>
                </table>
                </div>
            </div>
            </div>
        </div>
        
    </div>
    <div class='row'>
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body"><div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
                    <h4 class="card-title">Statistik Pengunjung</h4>
                    <canvas id="pengunjungChart" style="height: 225px; display: block; width: 451px;" width="451" height="225" class="chartjs-render-monitor"></canvas>
                </div>
            </div>
        </div>
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body"><div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
                    <h4 class="card-title">Buku</h4>
                    <canvas id="bukuChart" style="height: 225px; display: block; width: 451px;" width="451" height="225" class="chartjs-render-monitor"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

