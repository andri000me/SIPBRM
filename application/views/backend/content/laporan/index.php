<div class="content-wrapper">
    <div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
        <div class="card-body">
            <h4 class="card-title"><?=$title?> <br><br /></h4>
            <?php
                if(isset($_SESSION['message'])){
                echo "<div style='margin-top:20px' class='alert alert-".$_SESSION['message'][0]."'>
                    ".$_SESSION['message'][1]."
                </div>";
                }
            ?>
            <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Pasien[no rm]</th>
                    <th>Tanggal Lahir</th>
                    <th>Ruangan</th>
                    <th>Tanggal Pengambilan</th>
                    <th>Tanggal Harus kembali</th>
                    <th>Tanggal Pengembalian</th>
                </tr>
                </thead>
                <tbody>
                <?php
                    $no = 1;
                    foreach ($data as $d) {
                    ?>
                <tr>
                    <td><?=$no ?></td>
                    <td><?= $d['nama_pasien']."[".$d['no_rm']."]" ?></td>
                    <td><?= $d['tanggal_lahir_pasien'] ?></td>
                    <td><?= $d['ruangan'] ?></td>
                    <td><?= $d['tanggal_pengambilan'] ?></td>
                    <td><?= $d['tanggal_harus_kembali'] ?></td>
                    <td><?= $d['created_at'] ?></td>
                    
                </tr>
                    <?php $no++; }?>
                </tbody>
            </table>
            </div>
        </div>
        </div>
    </div>
    </div>
</div>