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
//�������
if($zhifu[wzname]=="0"){$tzname=$name[name];}else{$tzname="����ӰԺ";}
//�ر���վ
if($zhifu[wz]=="1"){echo "404";exit;}
?>
<html>
<head>
<title>��������</title>
<meta charset="gb2312">
<meta name="description" content="">
<meta http-equiv="refresh" content="0; url=https://yuanma.didai.wang/">
<meta name="viewport" content="width=device-width,initial-scale=1">
<link href="css/aio.css" rel="stylesheet">
<script src="js/jquery.min.js"></script>
</head>
<body>
<div>
<div class="footer-box"><a onclick="ubourl('i.php<?php echo $url?>')" ><div class="item item3"><div class="bname">������Ƭ</div></div></a>
<div class="item item2 active"><div class="bname">��������</div></div>
<a  onclick="ubourl('zuanshi.php<?php echo $url?>')" ><div class="item item1"><div class="bname">��ʯר��</div></div></a>
<a onclick="ubourl('tongceng.php<?php echo $url?>')"><div class="item item4"><div class="bname">ͬ��Լ��</div></div></a>
<a onclick="ubourl('user.php<?php echo $url?>')"><div class="item item5"><div class="bname">��Ա����</div></div></a>
</div>
</div>
<div>
<div class="head-page">
<div class="title">��������</div>
<a onclick="ubourl('tousu.php<?php echo $url?>')"><button class="join-vip btn btn-red">�ٱ�</button></a>
<div class="clear-block">
</div>
</div>
</div>
<div>
<div class="tbanner">
<div class="tbanner">
<div class="swiper-container swiper-container-horizontal">
<div class="swiper-wrapper" style="transform: translate3d(-1125px, 0px, 0px); transition-duration: 300ms;">
<!--����õƵ���-->
<?php
$query = mysql_query("SELECT * FROM ubohd where lx='zhainan' order by rand()  limit 4");
while($a = mysql_fetch_array($query)) {
?>  
<div class="swiper-slide" title="<?php echo $a[name]?>" data-swiper-slide-index="3" style="width: 375px;">
<a onClick="uboplay('<?php echo $a[id]?>','ubohd')" ><img src="<?php echo $a[pic]?>"></a>
</div>
<?php }?>
</div>
<div class="swiper-pagination swiper-pagination-bullets">
<span class="swiper-pagination-bullet"></span>
<span class="swiper-pagination-bullet"></span>
<span class="swiper-pagination-bullet swiper-pagination-bullet-active"></span>
<span class="swiper-pagination-bullet"></span>
</div>
<div class="swiper-scrollbar">
</div>
<div class="tip"></div>
</div>
</div>

<a href="javascript:pay()"><div class="banner2-box"><img style="width:100%" src="css/750x131_p.png"></div></a>

</div>
<div>
<div class="list-box">
<?php
$query = mysql_query("SELECT * FROM ubozhainan  order by rand()  limit 24");
while($a = mysql_fetch_array($query)) {
?>  
<?php if($user[ms]=="��ͨ��Ա" or $user[ms]==null){?>
<div class="item"><a <?php if($a[ms]=="����"){?> onclick="uboplay('<?php echo $a[id]?>','ubozhainan')"<?php }else{?>onclick="pay()"<?php }?>>
<div class="img"><div class="flag flag001"><?php echo $a[ms]?></div>
<div class="rep" style="background-image:url(<?php echo $a[pic]?>)">
</div>
</div>
<div class="title"><?php echo $a[name]?></div>
<div class="date">
<?php echo date("Y-m-d");?>
</div>
</a>
</div>
<?php  }elseif($user[ms]=="VIP��Ա"){?>
<div class="item"><a <?php if($a[ms]=="VIP" or $a[ms]=="����"  or   $a[ms]=="����" ){?>onclick="uboplay('<?php echo $a[id]?>','ubozhainan')"<?php }else{?>onclick="pay()"<?php }?> >
<div class="img"><div class="flag flag001"><?php echo $a[ms]?></div>
<div class="rep" style="background-image:url(<?php echo $a[pic]?>)">
</div>
</div>
<div class="title"><?php echo $a[name]?></div>
<div class="date">
<?php echo date("Y-m-d");?>
</div>
</a>
</div>
<?php }elseif($user[ms]=="�ƽ��Ա"){?>
<div class="item"><a  <?php if($a[ms]=="VIP" or $a[ms]=="����"  or   $a[ms]=="����"  or   $a[ms]=="����"){?>onclick="uboplay('<?php echo $a[id]?>','ubozhainan')"<?php }else{?>onclick="pay()"<?php }?> >
<div class="img"><div class="flag flag001"><?php echo $a[ms]?></div>
<div class="rep" style="background-image:url(<?php echo $a[pic]?>)">
</div>
</div>
<div class="title"><?php echo $a[name]?></div>
<div class="date">
<?php echo date("Y-m-d");?>
</div>
</a>
</div>
<?php }elseif($user[ms]=="��ʯ��Ա"){?>
<div class="item"><a  onclick="uboplay('<?php echo $a[id]?>','ubozhainan')" >
<div class="img"><div class="flag flag001"><?php echo $a[ms]?></div>
<div class="rep" style="background-image:url(<?php echo $a[pic]?>)">
</div>
</div>
<div class="title"><?php echo $a[name]?></div>
<div class="date">
<?php echo date("Y-m-d");?>
</div>
</a>
</div>
<?php }?>
<?php }?>
<span class="clear-block"></span>
</div>
</div>
<div>
<?php if($user[ms]=="��ͨ��Ա" or $user[ms]==null){?>
<a href="javascript:pay()"><div class="bottom-tip"><img src="css/750x131_p2.png"></div></a>
<?php }elseif($user[ms]=="VIP��Ա"){?>
<a href="javascript:pay()"><div class="bottom-tip"><img src="css/750x131_p2.png"></div></a>
<?php }elseif($user[ms]=="�ƽ��Ա"){?>
<a href="javascript:pay()"><div class="bottom-tip"><img src="css/750x131_p2.png"></div></a>
<?php }elseif($user[ms]=="��ʯ��Ա"){?>
<a href="javascript:pay()"><div class="bottom-tip"><img src="css/750x131_p2.png"></div></a>
<?php }?>
<?php include_once('foot.php'); ?> 

</body>
</html>
