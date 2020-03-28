<div class="section bg-light mt-4" id="footer">
        <div class="container">
            <div class="row">
                <div class="col-sm-4"> <img src="<?=base_url('assets/')?>upload/global/<?=$app['logo_dark']?>" class="logo-dark" alt="Start.ly Logo" />
                    <p class="mt-3 ml-1 text-muted"><?=$app['nama']?> </p>
                    <!-- <p class="ml-1"><a href="https://themeforest.net/user/surjithctly/portfolio?ref=surjithctly&utm_source=footer_content" target="_blank">Purchase now →</a></p> -->
                    <!-- // end .lead -->
                </div>
                <!-- // end .col-sm-3 -->
                <div class="col-sm-2" style='color:black!important'>
                    <div class="media mt-4">
                        <i class="fa fa-map-marker mt-1 mr-3"></i>
                        <div class="media-body">
                            <p>
                            <?=$app['alamat']?>
                            </p>
                        </div>
                    </div>
                   
                </div>
                <div class="col-sm-2">
                    <div class="media mt-4">
                        <i class="fa fa-phone mt-1 mr-3"></i>
                        <div class="media-body">
                            <p>
                            <a href="tel:<?=$app['no_hp']?>"><?=$app['no_hp']?></a>
                            <br>
                            <a href="tel:<?=$app['no_telepon']?>"><?=$app['no_telepon']?> </a>
                            <br>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-smm-2">
                    <div class="media mt-4">
                        <i class="fa fa-envelope-o mt-1 mr-3"></i>
                        <div class="media-body">
                            <p><a href="mailto:<?=$app['email']?>"><?=$app['email']?></a></p>
                        </div>
                    </div>
                </div>
               
                <!-- // end .col-sm-3 -->
                <div class="col-sm-2">
                    <a href="#home" class="btn btn-sm btn-outline-primary ml-1">Go to Top</a>
                </div>
                <!-- // end .col-sm-3 -->
            </div>
            <!-- // end .row -->
            <div class=" text-center mt-4"> <small class="text-muted">Copyright ©
                          <script type="text/javascript">
                          document.write(new Date().getFullYear());
                          </script>
                          All rights reserved. <?=$app['nama']?> V.1.0
                      </small></div>
        </div>
        <!-- // end .container -->
    </div>
    <!-- // end #about.section -->