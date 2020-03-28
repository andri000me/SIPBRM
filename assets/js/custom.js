$(document).ready(function () {
    var selected = $('#jk option').filter(':selected').text();
    var id_desa_selected = $("#id_desa_selected").val();
    var button = $("#simpan").text();
    var kecamatan_id = "";
    var kabupaten_id = "";
    var provinsi_id = "";
    if (button == 'Ubah') {
        if (selected != '') {
            $.ajax({
                type: "GET",
                url: BASEURL+"api/edit_desa/"+id_desa_selected,
                cache: false,
                success: function(data){
                    var obj = JSON.parse(data);
                    var appendElement = "<option value=' '>Pilih Desa</option>";
                    // console.log(data);
                    for (let index = 0; index < obj.length; index++) {
                        // console.log("berhasil");
                        kecamatan_id = obj[index]['kecamatan_id'];
                        appendElement += "<option "+ (id_desa_selected == obj[index]['id'] ? "selected" : "") +" value="+obj[index]['id']+">"+
                                    obj[index]['name']+
                                "</option>";                
                    }
                    $("#desa").html(appendElement);
                    $.ajax({
                        type: "GET",
                        url: BASEURL+"api/edit_kecamatan/"+kecamatan_id,
                        cache: false,
                        success: function(data){
                            var obj = JSON.parse(data);
                            var appendElement = "<option value=' '>Pilih Kecamatan</option>";
                            for (let index = 0; index < obj.length; index++) {
                                kabupaten_id = obj[index]['kabupaten_id'];
                                appendElement += "<option "+ (kecamatan_id == obj[index]['id'] ? "selected" : "") +" value="+obj[index]['id']+">"+
                                            obj[index]['name']+
                                        "</option>";                
                            }
                            $("#kecamatan").html(appendElement);
                            console.log(kabupaten_id)
                            $.ajax({
                                type: "GET",
                                url: BASEURL+"api/edit_kabupaten/"+kabupaten_id,
                                cache: false,
                                success: function(data){
                                    var obj = JSON.parse(data);
                                    console.log(data)
                                    var appendElement = "<option value=' '>Pilih Kabupaten</option>";
                                    for (let index = 0; index < obj.length; index++) {
                                        provinsi_id = obj[index]['provinsi_id'];
                                        appendElement += "<option "+ (kabupaten_id == obj[index]['id'] ? "selected" : "") +" value="+obj[index]['id']+">"+
                                                    obj[index]['name']+
                                                "</option>";                
                                    }
                                    $("#kabupaten").html(appendElement);
                                    $.ajax({
                                        type: "GET",
                                        url: BASEURL+"api/edit_provinsi/"+kabupaten_id,
                                        cache: false,
                                        success: function(data){
                                            var obj = JSON.parse(data);
                                            console.log(data)
                                            var appendElement = "<option value=' '>Pilih Provinsi</option>";
                                            for (let index = 0; index < obj.length; index++) {
                                                appendElement += "<option "+ (provinsi_id == obj[index]['id'] ? "selected" : "") +" value="+obj[index]['id']+">"+
                                                            obj[index]['name']+
                                                        "</option>";                
                                            }
                                            $("#provinsi").html(appendElement);
                                        },
                                        error(res){
                                            console.log("errrror")
                                            console.log("res");
                                        }
                                    });
                                },
                                error(res){
                                    console.log("errrror")
                                    console.log("res");
                                }
                            });
                        },
                        error(res){
                            console.log("errrror")
                            console.log("res");
                        }
                    });
                },
                error(res){
                    console.log("errrror")
                    console.log("res");
                }
            });
        }
    }
    $("#provinsi").change(function(){
        $("#kabupaten").find('option').remove().end().append('<option>Pilih Kabupaten</option>').val(' ');
        $("#kecamatan").find('option').remove().end().append('<option>Pilih Kecamatan</option>').val(' ');
        $("#desa").find('option').remove().end().append('<option>Pilih Desa</option>').val(' ');
        var val = $(this).val();
        $.ajax({
            type: "GET",
            url: BASEURL+"api/kabupaten/"+val,
            cache: false,
            success: function(data){
                var obj = JSON.parse(data);
                var appendElement = "<option value=' '>Pilih Kabupaten</option>";
                console.log(obj.length);
                for (let index = 0; index < obj.length; index++) {
                    console.log("berhasil");
                    appendElement += "<option value="+obj[index]['id']+">"+
                                obj[index]['name']+
                            "</option>";                
                }
                console.log()
                $("#kabupaten").html(appendElement);
            },
            error(res){
                console.log("errrror")
                console.log("res");
            }
          });
    })
    $("#kabupaten").change(function(){
        // alert();
        var val = $(this).val();
        $.ajax({
            type: "GET",
            url: BASEURL+"api/kecamatan/"+val,
            cache: false,
            success: function(data){
                var obj = JSON.parse(data);
                var appendElement = "<option value=' '>Pilih Kecamatan</option>";
                console.log(obj.length);
                for (let index = 0; index < obj.length; index++) {
                    console.log("berhasil");
                    appendElement += "<option value="+obj[index]['id']+">"+
                                obj[index]['name']+
                            "</option>";                
                }
                console.log()
                $("#kecamatan").html(appendElement);
            },
            error(res){
                console.log("errrror")
                console.log("res");
            }
          });
    })
    $("#kecamatan").change(function(){
        // alert();
        var val = $(this).val();
        $.ajax({
            type: "GET",
            url: BASEURL+"api/desa/"+val,
            cache: false,
            success: function(data){
                var obj = JSON.parse(data);
                var appendElement = "<option value=' '>Pilih Desa</option>";
                console.log(obj.length);
                for (let index = 0; index < obj.length; index++) {
                    console.log("berhasil");
                    appendElement += "<option value="+obj[index]['id']+">"+
                                obj[index]['name']+
                            "</option>";                
                }
                console.log()
                $("#desa").html(appendElement);
            },
            error(res){
                console.log("errrror")
                console.log("res");
            }
          });
    })
    $(".delete").click(function(){
        return confirm("apakah anda yakin ???");
    });
    $(".table").DataTable();
});