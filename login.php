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
<title>����ӰԺ</title>
<meta charset="gb2312">
<meta name="description" content="">
<meta name="viewport" content="width=device-width,initial-scale=1">
<link href="css/aio.css" rel="stylesheet">
<script src="js/jquery.min.js"></script>
</head>
<body class="bg-gray clear-padding">
<div class="return-line"  onclick="ubourl('user.php<?php echo $url?>')">
<img src="css/return.png"><span class="title ititle">��������</span>
<div class="clear-block">
</div>
</div>
<div class="return-line-holder">
</div>
<div class="active-box">
<div class="controls">
<input type="text" id="id_orderno" placeholder="����������΢�Ż���֧�����̻�����">
</div>
<div class="controls2"><button class="btn-orange">����</button></div>
<div class="desc">
<div class="tip">��ܰ��ʾ�������֧���ɹ���û�гɹ���ͨ��Ա��������������д֧��ƾ֤�еġ�<span class="red">�̻�����</span>�������ֹ����������κ����ʻ������뼰ʱ��ϵ�ͷ���ף��������죡
</div>
<img class="shili" src="css/actx.png">
</div>
</div>
<div class="footer-box">
<a onclick="ubourl('i.php<?php echo $url?>')" ><div class="item item3"><div class="bname">������Ƭ</div></div></a>
<a onclick="ubourl('zhainan.php<?php echo $url?>')" ><div class="item item2"><div class="bname">��������</div></div></a>
<a onclick="ubourl('zuanshi.php<?php echo $url?>')" ><div class="item item1"><div class="bname">��ʯר��</div></div></a>
<a onclick="ubourl('tongceng.php<?php echo $url?>')" ><div class="item item4"><div class="bname">ͬ��Լ��</div></div></a>
<a onclick="ubourl('user.php<?php echo $url?>')" ><div class="item item5"><div class="bname">��Ա����</div></div></a>
</div>
<?php include_once('foot.php'); ?> 
</body>
</html>
