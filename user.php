<?php
error_reporting(0); 
include("config/common.php");
include("config/conn.php");

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
<title>会员中心</title>
<meta charset="gb2312">
<meta name="description" content="">
<meta name="viewport" content="width=device-width,initial-scale=1">
<link href="css/aio.css" rel="stylesheet">
<script src="js/jquery.min.js"></script>
</head>
<body class="user-page">
<div class="footer-box">
<a onclick="ubourl('i.php<?php echo $url?>')" ><div class="item item3"><div class="bname">岛国大片</div></div></a>
<a onclick="ubourl('zhainan.php<?php echo $url?>')" ><div class="item item2"><div class="bname">网友自拍</div></div></a>
<a onclick="ubourl('zuanshi.php<?php echo $url?>')" ><div class="item item1"><div class="bname">钻石专区</div></div></a>
<a onclick="ubourl('tongceng.php<?php echo $url?>')" ><div class="item item4"><div class="bname">同城约会</div></div></a>
<div class="item item5 active"><div class="bname">会员中心</div>
</div>
</div>
<div class="head-page">
<div class="title">会员中心</div>
<a  onclick="ubourl('tousu.php<?php echo $url?>')"><button class="join-vip btn btn-red">举报</button></a>
<div class="clear-block">
</div>
</div>
<div class="user-box">
<img class="p-tip" src="css/d2d743f1gw1f8bzc8hxcaj20ku07xt95.jpg">
<div class="u-type">
<div class="lbox ubox usertype">
<div class="title">会员类型</div>
<div class="inner"> <?php if($user[ms]=="普通会员"  or  $user[ms]==null){?>游客<?php }elseif($user[ms]=="黄金会员" ){?>黄金会员<?php }elseif($user[ms]=="钻石会员"){?>钻石会员<?php }elseif($user[ms]=="VIP会员"){?>VIP会员<?php }?></div></div>
<div class="rbox ubox paytime">
<div class="title">权限</div>
<div class="inner">
 <?php if($user[ms]=="普通会员"  or  $user[ms]==null){?>观看体验区视频<?php }elseif($user[ms]=="黄金会员"){?>观看黄金区电影<?php }elseif($user[ms]=="钻石会员"){?>观看钻石区电影<?php }elseif($user[ms]=="VIP会员"){?>观看VIP区电影<?php }?>
</div>
</div>
<div class="clear-block">
</div>
</div>
<a onclick="pay()" class="ujoinuser"><div class="banner2-box"><img src="css/750x131_p2.png"></div><div class="clear-block">&nbsp;</div></a>
<div class="menu">
<a onclick="ubourl('login.php<?php echo $url?>')"><div class="item"><img src="css/icon_setting_1@3x.png">VIP登陆</div></a>
<a  onclick="pay()" ><div class="item"><img src="css/icon_setting_2@3x.png">购买会员</div></a>
<a onclick="ubourl('fk.php<?php echo $url?>')"><div class="item"><img src="css/icon_setting_3@3x.png">用户反馈</div></a>
<a onclick="ubourl('xy.php<?php echo $url?>')"><div class="item"><img src="css/icon_setting_4@3x.png">用户协议</div></a>
</div>
</div>
<?php include_once('foot.php'); ?> 
</body>
</html>
