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
<title>钻石专区</title>
<meta charset="gb2312">
<meta name="description" content="">
<meta name="viewport" content="width=device-width,initial-scale=1">
<link href="css/aio.css" rel="stylesheet">
<script src="js/jquery.min.js"></script>
</head>
<body>
<div>
<div class="footer-box">
<a onclick="ubourl('i.php<?php echo $url?>')" ><div class="item item3"><div class="bname">岛国大片</div></div></a>
<a onclick="ubourl('zhainan.php<?php echo $url?>')" ><div class="item item2"><div class="bname">网友自拍</div></div></a>
<div class="item item1 active"><div class="bname">钻石专区</div></div>
<a onclick="ubourl('tongceng.php<?php echo $url?>')" ><div class="item item4"><div class="bname">同城约会</div></div></a>
<a onclick="ubourl('user.php<?php echo $url?>')" ><div class="item item5"><div class="bname">会员中心</div></div></a>
</div>
</div>
<div>
<div class="head-page">
<div class="title">钻石专区</div>
<a onclick="ubourl('tousu.php<?php echo $url?>')"><button class="join-vip btn btn-red">举报</button></a>
<div class="clear-block">
</div>
</div>
</div>
<div>
<a href="javascript:pay()"><img style="width:100%" src="css/006rfraugw1fa98svehklg308w046ah9.gif"></a>
</div>

<a href="javascript:pay()"><div class="banner2-box"><img style="width:100%" src="css/750x131_p.png"></div></a>

<div>
<div class="list-box">
<?php
$query = mysql_query("SELECT * FROM ubozuan  order by rand()  limit 24");
while($a = mysql_fetch_array($query)) {
?>  
<?php if($user[ms]=="普通会员" or $user[ms]==null){?>
<div class="item"><a onclick="pay()">
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
<?php  }elseif($user[ms]=="VIP会员"){?>
<div class="item"><a onclick="pay()" >
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
<?php }elseif($user[ms]=="黄金会员"){?>
<div class="item"><a  onclick="pay()">
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
<?php }elseif($user[ms]=="钻石会员"){?>
<div class="item"><a  onclick="uboplay('<?php echo $a[id]?>','ubozuan')" >
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
<?php if($user[ms]=="普通会员" or $user[ms]==null){?>
<a href="javascript:pay()"><div class="bottom-tip"><img src="css/750x131_p2.png"></div></a>
<?php }elseif($user[ms]=="VIP会员"){?>
<a href="javascript:pay()"><div class="bottom-tip"><img src="css/750x131_p2.png"></div></a>
<?php }elseif($user[ms]=="黄金会员"){?>
<a href="javascript:pay()"><div class="bottom-tip"><img src="css/750x131_p2.png"></div></a>
<?php }elseif($user[ms]=="钻石会员"){?>
<a href="javascript:pay()"><div class="bottom-tip"><img src="css/750x131_p2.png"></div></a>
<?php }?>
<?php include_once('foot.php'); ?> 
<?php if($zhifu[wx]=="0"){?>
<?php if (strpos($user_agent, 'MicroMessenger') === false) {?>
<?php }else{?>
<div id="mcover"  style="display: block;"><img src="css/tips_wx.png"></div>
<?php }?>
<?php }?>
</body>
</html>
