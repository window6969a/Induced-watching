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
<title>激情影院</title>
<meta charset="gb2312">
<meta name="description" content="">
<meta name="viewport" content="width=device-width,initial-scale=1">
<link href="css/aio.css" rel="stylesheet">
<script src="js/jquery.min.js"></script>
</head>
<body class="bg-gray clear-padding">
<div class="return-line"  onclick="ubourl('user.php<?php echo $url?>')">
<img src="css/return.png"><span class="title ititle">自助激活</span>
<div class="clear-block">
</div>
</div>
<div class="return-line-holder">
</div>
<div class="active-box">
<div class="controls">
<input type="text" id="id_orderno" placeholder="请输入您的微信或者支付宝商户单号">
</div>
<div class="controls2"><button class="btn-orange">激活</button></div>
<div class="desc">
<div class="tip">温馨提示：如果您支付成功但没有成功开通会员服务，请您自助填写支付凭证中的“<span class="red">商户单号</span>”进行手工激活，如果有任何疑问或困难请及时联系客服。祝您生活愉快！
</div>
<img class="shili" src="css/actx.png">
</div>
</div>
<div class="footer-box">
<a onclick="ubourl('i.php<?php echo $url?>')" ><div class="item item3"><div class="bname">岛国大片</div></div></a>
<a onclick="ubourl('zhainan.php<?php echo $url?>')" ><div class="item item2"><div class="bname">网友自拍</div></div></a>
<a onclick="ubourl('zuanshi.php<?php echo $url?>')" ><div class="item item1"><div class="bname">钻石专区</div></div></a>
<a onclick="ubourl('tongceng.php<?php echo $url?>')" ><div class="item item4"><div class="bname">同城约会</div></div></a>
<a onclick="ubourl('user.php<?php echo $url?>')" ><div class="item item5"><div class="bname">会员中心</div></div></a>
</div>
<?php include_once('foot.php'); ?> 
</body>
</html>
