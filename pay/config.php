<?php
error_reporting(0); 

include("../config/conn.php");
include("../config/common.php");
///////////////////////////////////////////////不需要更改
$type="where id='1'";
$zhifu=queryall(ubozf,$type);
$uboid=$zhifu[uboid];
$ubokey=$zhifu[ubokey];
$url=$zhifu[ubowg];
$ubotzurl="http://".$_SERVER['HTTP_HOST']."/pay/ubotzurl.php";
$ubobackurl="http://".$_SERVER['HTTP_HOST']."/pay/ubobackurl.php";
///////////////////////////////////////////////不需要更改
?>