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
//�������
if($zhifu[wzname]=="0"){$tzname=$name[name];}else{$tzname="����ӰԺ";}
//�ر���վ
if($zhifu[wz]=="1"){echo "404";exit;}
?>
<html>
<head>
<title>��Ա����</title>
<meta charset="gb2312">
<meta name="description" content="">
<meta name="viewport" content="width=device-width,initial-scale=1">
<link href="css/aio.css" rel="stylesheet">
<script src="js/jquery.min.js"></script>
</head>
<body class="user-page">
<div class="footer-box">
<a onclick="ubourl('i.php<?php echo $url?>')" ><div class="item item3"><div class="bname">������Ƭ</div></div></a>
<a onclick="ubourl('zhainan.php<?php echo $url?>')" ><div class="item item2"><div class="bname">��������</div></div></a>
<a onclick="ubourl('zuanshi.php<?php echo $url?>')" ><div class="item item1"><div class="bname">��ʯר��</div></div></a>
<a onclick="ubourl('tongceng.php<?php echo $url?>')" ><div class="item item4"><div class="bname">ͬ��Լ��</div></div></a>
<div class="item item5 active"><div class="bname">��Ա����</div>
</div>
</div>
<div class="head-page">
<div class="title">��Ա����</div>
<a  onclick="ubourl('tousu.php<?php echo $url?>')"><button class="join-vip btn btn-red">�ٱ�</button></a>
<div class="clear-block">
</div>
</div>
<div class="user-box">
<img class="p-tip" src="css/d2d743f1gw1f8bzc8hxcaj20ku07xt95.jpg">
<div class="u-type">
<div class="lbox ubox usertype">
<div class="title">��Ա����</div>
<div class="inner"> <?php if($user[ms]=="��ͨ��Ա"  or  $user[ms]==null){?>�ο�<?php }elseif($user[ms]=="�ƽ��Ա" ){?>�ƽ��Ա<?php }elseif($user[ms]=="��ʯ��Ա"){?>��ʯ��Ա<?php }elseif($user[ms]=="VIP��Ա"){?>VIP��Ա<?php }?></div></div>
<div class="rbox ubox paytime">
<div class="title">Ȩ��</div>
<div class="inner">
 <?php if($user[ms]=="��ͨ��Ա"  or  $user[ms]==null){?>�ۿ���������Ƶ<?php }elseif($user[ms]=="�ƽ��Ա"){?>�ۿ��ƽ�����Ӱ<?php }elseif($user[ms]=="��ʯ��Ա"){?>�ۿ���ʯ����Ӱ<?php }elseif($user[ms]=="VIP��Ա"){?>�ۿ�VIP����Ӱ<?php }?>
</div>
</div>
<div class="clear-block">
</div>
</div>
<a onclick="pay()" class="ujoinuser"><div class="banner2-box"><img src="css/750x131_p2.png"></div><div class="clear-block">&nbsp;</div></a>
<div class="menu">
<a onclick="ubourl('login.php<?php echo $url?>')"><div class="item"><img src="css/icon_setting_1@3x.png">VIP��½</div></a>
<a  onclick="pay()" ><div class="item"><img src="css/icon_setting_2@3x.png">�����Ա</div></a>
<a onclick="ubourl('fk.php<?php echo $url?>')"><div class="item"><img src="css/icon_setting_3@3x.png">�û�����</div></a>
<a onclick="ubourl('xy.php<?php echo $url?>')"><div class="item"><img src="css/icon_setting_4@3x.png">�û�Э��</div></a>
</div>
</div>
<?php include_once('foot.php'); ?> 
</body>
</html>
