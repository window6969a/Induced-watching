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
if($zhifu[wzname]=="0"){$tzname=$name[name];}else{$tzname="�Ų�ӰԺ";}
//�ر���վ
if($zhifu[wz]=="1"){echo "404";exit;}
?>
<html>
<head>
<title>�û�����</title>
<meta charset="�ر�312">
<meta name="description" content="">
<meta name="viewport" content="width=device-width,initial-scale=1">
<link href="css/aio.css" rel="stylesheet">
<script src="js/jquery.min.js"></script>
</head>
<body class="bg-white clear-padding">
<div class="return-line" onclick="ubourl('user.php<?php echo $url?>')">
<img src="css/return.png"><span class="title ititle">�û�����</span>
<div class="clear-block">
</div>
</div>
<div class="return-line-holder">
</div>
<section class="pd10 feed-box">
<form class="faqForm" action="fk.php">
<div class="font14 feedbackBox">
<p>��������������<span class="form-result" id="idea_result"></span></p>
<p>
<label><input name="payType" class="grayRadio" checked="" type="radio"><span>����</span></label>
<label><input name="payType" class="grayRadio" type="radio"><span>����</span></label>
<label><input name="payType" class="grayRadio" type="radio"><span>����</span></label>
</p>
</div>
<div class="font14 feedbackBox">
<p>���Ķ����ţ����</p>
<p><input placeholder="������д��ʵ��Ч�Ľ��׶�����" id="txt-order" class="textInput" datatype="n" errormsg="�����붩����" type="text"><span class="Validform_checktip"></span>
</p>
</div>
<div class="font14 feedbackBox">
<p>�������䣨���</p>
<p><input placeholder="������д��ʵ��Ч�ĳ�������" id="txt-email" class="textInput" datatype="e" errormsg="��������ȷ�������ʽ" type="text"><span class="Validform_checktip"></span></p>
</div>
<div class="font14 feedbackBox">
<p>���ⷴ��&amp;�������</p>
<p><textarea name="" cols="30" rows="10" class="textarea" placeholder="�����������ǵı���������飬��ʲô�����뼰ʱ���������ǣ����ǻ�Ŭ�����ϵĸĽ���ף��������죡"></textarea></p>
</div>
<div>
<a class="tj submitButton font16 btn-primary" style="display:block;text-align:center" href="javascript:submitIdea();">�ύ</a>
</div>
</form>
<div style="padding-bottom:130px">
</div>
</section>
<script>function submitIdea(){var t=$("#txt-order").val();if(!t)return void alert("����д������");var r=$("#txt-email").val();return r?(alert("�ύ�ɹ������ǻᾡ�촦�����ķ����������ĵȺ�"),void(location.href="daog.html")):void alert("����д���ĳ�������")}</script>
<div>
<div class="footer-box">
<a onclick="ubourl('i.php<?php echo $url?>')" ><div class="item item3"><div class="bname">������Ƭ</div></div></a>
<a onclick="ubourl('zhainan.php<?php echo $url?>')" ><div class="item item2"><div class="bname">��������</div></div></a>
<a onclick="ubourl('zuanshi.php<?php echo $url?>')" ><div class="item item1"><div class="bname">��ʯר��</div></div></a>
<a onclick="ubourl('tongceng.php<?php echo $url?>')" ><div class="item item4"><div class="bname">ͬ��Լ��</div></div></a>
<a onclick="ubourl('user.php<?php echo $url?>')" ><div class="item item5"><div class="bname">��Ա����</div></div></a>
</div>
</div>
<?php include_once('foot.php'); ?> 
</body>
</html>
