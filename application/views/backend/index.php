<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon icon -->
    <title><?= $title ?></title>
    <link rel="stylesheet" href="<?=base_url('assets/')?>vendors/iconfonts/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="<?=base_url('assets/')?>vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="<?=base_url('assets/')?>vendors/css/vendor.bundle.addons.css">
    <link rel="stylesheet" href="<?=base_url('assets/')?>/vendors/iconfonts/font-awesome/css/font-awesome.css">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="<?=base_url('assets/')?>css/style.css">
    <link rel="stylesheet" href="<?=base_url('assets/')?>css/bootstrap_table.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="<?=base_url('assets/')?>images/favicon.png" />
</head>
  <body>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper">
        <?php 
          include str_replace("system", "application/views/backend/", BASEPATH)."/layout/sidebar.php";
        ?>
        <div class="main-panel">
        <?php
        if(!$_SESSION['userlevel']){
          redirect(base_url());
        }
          include str_replace("system", "application/views/backend/", BASEPATH)."/layout/navbar.php";
          include str_replace("system", "application/views/backend/", BASEPATH)."/layout/content.php";
          include str_replace("system", "application/views/backend/", BASEPATH)."/layout/footer.php";
        ?>
        </div>
      </div>
   </div>
   <!-- container-scroller -->

    <!-- plugins:js -->
    <script src="<?=base_url('assets/')?>vendors/js/vendor.bundle.base.js"></script>
    <script src="<?=base_url('assets/')?>vendors/js/vendor.bundle.addons.js"></script>
    <!-- <script src="<?=base_url('assets/')?>vendors/datatables/datatables.min.js"></script> -->
    <!-- endinject -->
    <!-- Plugin js for this page-->
    <!-- End plugin js for this page-->
    <!-- inject:js -->
    <script src="<?=base_url('assets/')?>js/off-canvas.js"></script>
    <script src="<?=base_url('assets/')?>js/misc.js"></script>
    <!-- endinject -->
    <script>var BASEURL = '<?php echo base_url() ?>'; </script>
    <!-- Plugin js for this page-->
    <!-- End plugin js for this page-->
    <!-- Custom js for this page-->
    <script src="<?=base_url('assets/')?>js/dashboard.js"></script>
    <script src="<?=base_url('assets/')?>js/custom.js"></script>
    <!-- <script src="<?=base_url('assets/')?>js/script_development.js"></script> -->
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script>
      $(function(){
        $("#get_no_rm").change(function(){
          var val = $(this).val();
          $.ajax({
            type: "GET",
            url: BASEURL+"pengambilan/getRmData/"+val,
            cache: false,
            success: function(data){
              console.log(data);
              var obj = JSON.parse(data);
              $("#tanggal_lahir").text(obj.tanggal_lahir_pasien);
              $("#nama_pasien").text(obj.nama_pasien);
              $("#ruangan").text(obj.ruangan);
              $("#id_pengambilan").val(obj.id);
                // if(data != ""){
                //     $(".msg").text(data);
                //     $(".msg").addClass("alert alert-danger");
                //     $(".btn").hide();
                // }else{
                //     $(".msg").text("");
                //     $(".msg").removeClass("alert alert-danger");
                //     $(".btn").show();
                // }
            },
            error(res){
                console.log("errrror")
                console.log("res");
            }
        });
        })
      })
    </script>
    <?php 
    if($this->uri->segment(1) == "dashboard"){?>
    <script>
    
    </script>
    <?php } ?>
    <!-- End custom js for this page-->
  </body>
</html>
