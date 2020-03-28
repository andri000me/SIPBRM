$(function(){
    $("#tahunForm").hide();
    $("#bulanForm").hide();;
    $("#tanggalForm").hide();
    $("#jangkaForm").hide();
    $("#jenis").change(function(){
        var val = $(this).val();
        if(val == 'tahun'){
            $("#tahunForm").show();
            $("#tanggalForm").hide();
            $("#bulanForm").hide();
            $("#jangkaForm").hide();
        }else if(val == 'bulan'){
            $("#tahunForm").show();
            $("#bulanForm").show();
            $("#tanggalForm").hide();
            $("#jangkaForm").hide();
        }else if(val == 'tanggal'){
            $("#tanggalForm").show();
            $("#tahunForm").show();
            $("#bulanForm").show();
            $("#jangkaForm").hide();
        }else if(val = "jangka"){
            $("#jangkaForm").show();
            $("#tanggalForm").hide();
            $("#bulanForm").hide();
            $("#tahunForm").hide();
        }
    })
    $("#logo_dark").change(function(){
        readUrl(this, 'logo_dark');
    });
    $("#logo_white").change(function(){
        readUrl(this, 'logo_white');
    });
    
    function readUrl(input, logo) {

        if (input.files && input.files[0]) {
          var reader = new FileReader();
      
          reader.onload = function(e) {
            $('#img_'+logo).attr('src', e.target.result);
          }
      
          reader.readAsDataURL(input.files[0]);
        }
      }
    $('#show_password').click(function(){
        
        if($("#check").is(":checked")){
            $("#check").prop("checked", false);
        }else{
            $("#check").prop("checked", true);
        }
        $("#check").is(':checked') ? $('#password').attr('type', 'text') : $('#password').attr('type', 'password');
    });
    $("#show_password_konfirmasi").click(function(){
        if($("#check_konfirmasi").is(":checked")){
            $("#check_konfirmasi").prop("checked", false);
        }else{
            $("#check_konfirmasi").prop("checked", true);
        }
        $("#check_konfirmasi").is(':checked') ? $('#password_konfirmasi').attr('type', 'text') : $('#password_konfirmasi').attr('type', 'password');
    })
    $(".delete").click(function(){
        return confirm("Apakah anda yakin ??");
    });
    $('[id=tambah_detail]').click(function(){
        // alert();
        var $attr = $("[id=detail_peminjaman]").clone();
        $("#row_detail").append($attr);
    });
    $("[id=jumlah]").keyup(function(){
        // if($(this).val() > 4){
        //     alert();
        // }
    });
    // var nama_buku = ["27"];
    // $("[id=nama_buku]").change(function(){
    //     nama_buku.push($(this).val());
    //     // nama_buku.find("'"+$(this).val()+"'");
    //     // console.log(nama_buku);
    // });
    // console.log(nama_buku);
    $(".table").DataTable();
    
})