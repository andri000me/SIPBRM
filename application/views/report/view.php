<!DOCTYPE html>
 <html lang="en">
 <head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="<?= base_url("assets/js/pdfobject.min.js")?>"></script>
  <title>js-tutorials.com : Embeddeble pdf viewer using PDFObject and HTML5 </title>
  <style>
	.pdfobject-container { height: 500px;}
	.pdfobject { border: 1px solid #666; }
  </style>
</head>
<body>
<iframe src="http://192.168.1.19/ebeca/apps/download/1/Relasi-dan-fungsie" width="100%" height="100%" style="width: 100%; height: 100%;" frameborder="0" scrolling="no"></iframe>
  <!-- <div class="container" style="padding:10px 10px;">
    <h1>Pdf <?=$data['url']?></h1>
	<div id="pdf_view"></div>
  </div> -->
</body>
</html>
<!-- <script type="text/javascript">
  $(document).ready(function(){
      var url = "<?=base_url("apps/download/".$data['id']."/".$data['url']."")?>";
    //   console.log(url);
    PDFObject.embed(url, "#pdf_view");
  });
</script> -->