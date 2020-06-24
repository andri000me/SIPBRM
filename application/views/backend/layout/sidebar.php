<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item nav-profile">
        <div class="nav-link">
            <div class="user-wrapper">
            <div class="profile-image">
                <img src="<?=base_url('assets/')?>images/faces/face1.jpg" alt="profile image">
            </div>
            <div class="text-wrapper">
                <p class="profile-name"><?= $_SESSION['nama'] ?></p>
                <div>
                <small class="designation text-muted"><?=LEVEL[$_SESSION['userlevel']]?></small>
                <span class="status-indicator online"></span>
                
                </div>
            </div>
            </div>
            <a href="<?=base_url('peminjaman/add')?>">
                <button class="btn btn-success btn-block">Pengambilan Baru
                <i class="mdi mdi-plus"></i>
                </button>
            </a>
        </div>
        </li>
        <li class="nav-item <?= ($this->uri->segment(1) == "dashboard" ? 'active' : '') ?>">
        <a class="nav-link" href="<?=base_url('dashboard')?>">
            <i class="menu-icon mdi mdi-television"></i>
            <span class="menu-title">Dashboard</span>
        </a>
        </li>
        <?php if ($_SESSION['userlevel'] == 1) {?>
        <li class="nav-item  <?= ($this->uri->segment(1) == "pengguna" ? 'active' : '') ?>">
            <a class="nav-link" href="<?=base_url('pengguna')?>">
                <i class="menu-icon mdi mdi-format-list-checks"></i>
                <span class="menu-title">Pengguna</span>
            </a>
        </li>
        <?php } 
        if (in_array($_SESSION['userlevel'], [1, 2])) {
        ?>
        <!-- <li class="nav-item <?= ($this->uri->segment(1) == "poli" ? 'active' : '') ?>">
            <a class="nav-link" href="<?=base_url('poli')?>">
                <i class="menu-icon mdi mdi-format-list-bulleted"></i>
                <span class="menu-title">Poli</span>
            </a>
        </li> -->
        <!-- <li class="nav-item <?= ($this->uri->segment(1) == "dokter" ? 'active' : '') ?>">
            <a class="nav-link" href="<?=base_url('dokter')?>">
                <i class="menu-icon mdi mdi-account-network"></i>
                <span class="menu-title">Dokter</span>
            </a>
        </li> -->
        <!-- <li class="nav-item <?= ($this->uri->segment(1) == "pendidikan" ? 'active' : '') ?>">
            <a class="nav-link" href="<?=base_url('pendidikan')?>">
                <i class="menu-icon mdi mdi-book"></i>
                <span class="menu-title">Pendidikan</span>
            </a>
        </li>
        <li class="nav-item <?= ($this->uri->segment(1) == "pekerjaan" ? 'active' : '') ?>">
            <a class="nav-link" href="<?=base_url('pekerjaan')?>">
                <i class="menu-icon mdi mdi-worker"></i>
                <span class="menu-title">Pekerjaan</span>
            </a>
        </li>
        <li class="nav-item <?= ($this->uri->segment(1) == "agama" ? 'active' : '') ?>">
            <a class="nav-link" href="<?=base_url('agama')?>">
                <i class="menu-icon mdi mdi-account-network"></i>
                <span class="menu-title">Agama</span>
            </a>
        </li> -->
        <?php } 
        
        if (in_array($_SESSION['userlevel'], [1, 3, 4, 5, 2])) {
            if (in_array($_SESSION['userlevel'], [1, 3, 2])) {
        ?>
        <li class="nav-item <?= ($this->uri->segment(1) == "pasien" ? 'active' : '') ?>">
            <a class="nav-link" href="<?=base_url('pasien')?>">
                <i class="menu-icon mdi mdi-book"></i>
                <span class="menu-title">Pasien</span>
            </a>
        </li>
        <?php } ?>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#peminjaman" aria-expanded="false" aria-controls="peminjaman">
                <i class="menu-icon mdi mdi-content-copy"></i>
                <span class="menu-title">Transaksi</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="peminjaman">
                <ul class="nav flex-column sub-menu">
                <?php if (in_array($_SESSION['userlevel'], [4, 1, 2, 3])) { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?=base_url('peminjaman')?>">Pengambilan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?=base_url('peminjaman/terlambat')?>">Terlambat</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?=base_url('pengembalian')?>">Pengembalian</a>
                    </li>
                    
                    <?php }  ?>
                </ul>
            </div>
        </li>
        <?php } ?>
        <li class="nav-item">
            <a class="nav-link" href="<?=base_url('apps/logout')?>">
                <i class="menu-icon mdi mdi-logout"></i>
                <span class="menu-title">Keluar</span>
            </a>
        </li>
    </ul>
</nav>