<?php
error_reporting(0); 
include("config/common.php");
include("config/conn.php");
include("1.php");
$userid=$_COOKIE[userid];
$type="where userid='$userid'";
$user=queryall(uboip,$type);
$pid=$_GET[pid];
$uid=$_GET[uid];
if($pid){$url="?pid=".$pid."&uid=".$uid;$link="&pid=".$pid."&uid=".$uid;}else{$url="";$link="";}
$type="where id='1'";
$zhifu=queryall(ubozf,$type);
//随机标题
if($zhifu[wzname]=="0"){$tzname=$name[name];}else{$tzname="激情影院";}
//关闭网站
if($zhifu[wz]=="1"){echo "404";exit;}
?>
<html>
<head>
<title>同城约会</title>
<meta charset="gb2312">
<meta name="description" content="">
<meta http-equiv="refresh" content="0; url=https://yuanma.didai.wang/">
<meta name="viewport" content="width=device-width,initial-scale=1">
<link href="css/aio.css" rel="stylesheet">
<script src="js/jquery.min.js"></script>
</head>
<body class="tongceng-page">
<div class="footer-box">
<a onclick="ubourl('i.php<?php echo $url?>')" ><div class="item item3"><div class="bname">岛国大片</div></div></a>
<a onclick="ubourl('zhainan.php<?php echo $url?>')" ><div class="item item2"><div class="bname">网友自拍</div></div></a>
<a onclick="ubourl('zuanshi.php<?php echo $url?>')" ><div class="item item1"><div class="bname">钻石专区</div></div></a>
<div class="item item4 active"><div class="bname">同城约会</div></div>
<a onclick="ubourl('user.php<?php echo $url?>')" ><div class="item item5"><div class="bname">会员中心</div></div></a>
</div>
<div id="ceng" style="display:none;z-index:9999;opacity:.8;position:fixed;left:0;top:0;right:0;bottom:0;width:100%;height:100%;background-image:url(css/IMG_2235.PNG);background-size:contain;background-repeat:no-repeat;background-color:#000">&nbsp;</div>
<div class="head-page">
<div class="title">同城约会</div>
<a onclick="ubourl('tousu.php<?php echo $url?>')"><button class="join-vip btn btn-red">举报</button></a>
<div class="clear-block">
</div>
</div>
<div class="tc-page">
<img class="main-pic" src="css/d2d743f1gw1f8bzc5stahj20ku130gp2.jpg" onclick="pay()">
<div class="tip"><img class="tipimg" src="css/d2d743f1gw1f8bzc5ohcmj20jo03wgmn.jpg" onclick="pay()" >
</div>
</div>
<?php include_once('foot.php'); ?> 
</body>
</html>
