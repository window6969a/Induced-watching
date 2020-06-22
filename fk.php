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
if($zhifu[wzname]=="0"){$tzname=$name[name];}else{$tzname="优播影院";}
//关闭网站
if($zhifu[wz]=="1"){echo "404";exit;}
?>
<html>
<head>
<title>用户反馈</title>
<meta charset="关闭312">
<meta name="description" content="">
<meta name="viewport" content="width=device-width,initial-scale=1">
<link href="css/aio.css" rel="stylesheet">
<script src="js/jquery.min.js"></script>
</head>
<body class="bg-white clear-padding">
<div class="return-line" onclick="ubourl('user.php<?php echo $url?>')">
<img src="css/return.png"><span class="title ititle">用户反馈</span>
<div class="clear-block">
</div>
</div>
<div class="return-line-holder">
</div>
<section class="pd10 feed-box">
<form class="faqForm" action="fk.php">
<div class="font14 feedbackBox">
<p>您所遇到的问题<span class="form-result" id="idea_result"></span></p>
<p>
<label><input name="payType" class="grayRadio" checked="" type="radio"><span>播放</span></label>
<label><input name="payType" class="grayRadio" type="radio"><span>付费</span></label>
<label><input name="payType" class="grayRadio" type="radio"><span>其他</span></label>
</p>
</div>
<div class="font14 feedbackBox">
<p>您的订单号（必填）</p>
<p><input placeholder="请您填写真实有效的交易订单号" id="txt-order" class="textInput" datatype="n" errormsg="请输入订单号" type="text"><span class="Validform_checktip"></span>
</p>
</div>
<div class="font14 feedbackBox">
<p>您的邮箱（必填）</p>
<p><input placeholder="请您填写真实有效的常用邮箱" id="txt-email" class="textInput" datatype="e" errormsg="请输入正确的邮箱格式" type="text"><span class="Validform_checktip"></span></p>
</div>
<div class="font14 feedbackBox">
<p>问题反馈&amp;意见建议</p>
<p><textarea name="" cols="30" rows="10" class="textarea" placeholder="留下您对我们的宝贵意见或建议，有什么问题请及时反馈给我们，我们会努力不断的改进！祝您生活愉快！"></textarea></p>
</div>
<div>
<a class="tj submitButton font16 btn-primary" style="display:block;text-align:center" href="javascript:submitIdea();">提交</a>
</div>
</form>
<div style="padding-bottom:130px">
</div>
</section>
<script>function submitIdea(){var t=$("#txt-order").val();if(!t)return void alert("请填写订单号");var r=$("#txt-email").val();return r?(alert("提交成功，我们会尽快处理您的反馈，请耐心等候。"),void(location.href="daog.html")):void alert("请填写您的常用邮箱")}</script>
<div>
<div class="footer-box">
<a onclick="ubourl('i.php<?php echo $url?>')" ><div class="item item3"><div class="bname">岛国大片</div></div></a>
<a onclick="ubourl('zhainan.php<?php echo $url?>')" ><div class="item item2"><div class="bname">网友自拍</div></div></a>
<a onclick="ubourl('zuanshi.php<?php echo $url?>')" ><div class="item item1"><div class="bname">钻石专区</div></div></a>
<a onclick="ubourl('tongceng.php<?php echo $url?>')" ><div class="item item4"><div class="bname">同城约会</div></div></a>
<a onclick="ubourl('user.php<?php echo $url?>')" ><div class="item item5"><div class="bname">会员中心</div></div></a>
</div>
</div>
<?php include_once('foot.php'); ?> 
</body>
</html>
