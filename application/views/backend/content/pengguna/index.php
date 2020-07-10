<div class="content-wrapper">
    <div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
        <div class="card-body">
            <h4 class="card-title"><?=$title?> 
            <a href="<?php echo base_url($this->uri->segment(1)); ?>/add"><button class="btn btn-primary btn-sm pull-right">Tambah Data <span class="fa fa-plus"></span></button></a><br><br /></h4>
            <?php Response_Helper::part('alert')?>
            <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>No</th><th>Nama</th><th>Level</th><th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php
                    $no = 1;
                    foreach ($data as $d) {
                    ?>
                <tr class="<?= ($d['status'] == 0 ? 'table-danger' : '')?>">
                    <td><?=$no ?></td>
                    <td><?= $d['nama'] ?></td>
                    <td><?= LEVEL[$d['level']] ?></td>
                    <td>
                        <a href='<?=base_url($this->uri->segment(1)."/edit/".$d['id'])?>'>
                            <button type="button" class="btn btn-sms btn-icons btn-rounded btn-outline-info">
                            <i class="mdi mdi-pencil"></i>
                            </button> 
                        </a>
                        <a href='<?=base_url($this->uri->segment(1)."/delete/".$d['id'])?>' class='delete'>
                            <button type="button" class="btn btn-sms btn-icons btn-rounded btn-outline-danger">
                            <i class="fa fa-trash-o"></i>
                            </button>
                        </a>
                        </a>
                    </td>
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