<?php
    require_once APPPATH."/helpers/PHPExcel.php";
    require_once APPPATH."/helpers/PHPExcel/IOFactory.php";
    class Phpexcel_helper extends PHPExcel {
       public function __construct() {
          parent::__construct();
       }
    }
    
?>