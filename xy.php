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
<title>�û�Э��</title>
<meta charset="gb2312">
<meta name="description" content="">
<meta name="viewport" content="width=device-width,initial-scale=1">
<link href="css/aio.css" rel="stylesheet">
<script src="js/jquery.min.js"></script>
</head>
<body class="bg-white clear-padding">
<div class="return-line"  onclick="ubourl('user.php<?php echo $url?>')">
<img src="css/return.png"><span class="title ititle">�û�Э��</span>
<div class="clear-block">
</div>
</div>
<div class="return-line-holder">
</div>
<div class="pd10 xieyi-box">
<h3>����ӰԺ��������</h3>
<p>
����Ҫ��֪��
</p>
<p>
1��һ���ƶ��ͻ����û����������ӰԺʱ������Ϊ�Ѿ���ϸ�Ķ��������ȫͬ�⡣�����κη�ʽ��½��վ����ֱ�ӡ����ʹ�ñ�վ�����ߣ�������Ϊ��Ը���ܱ���վ����������û�����Э���Լ����
</p>
<p>
2������ӰԺת�ص����ݲ���������ӰԺ֮������۵㣬Ҳ����ζ�ű�վ��ͬ��۵��֤ʵ�����ݵ���ʵ�ԡ�
</p>
<p>
3������ӰԺת�ص����֡�ͼƬ������Ƶ�����Ͼ��ɱ�վ�û��ṩ������ʵ�ԡ�׼ȷ�ԺͺϷ�������Ϣ�����˸��𡣼���ӰԺ���ṩ�κα�֤�������е��κη������Ρ�
</p>
<p>
4������ӰԺ��ת�ص����֡�ͼƬ������Ƶ�����ϣ�����ַ��˵�������֪ʶ��Ȩ������Ȩ�������������߻�ת���߱��˳е�����վ�Դ˲��е����Ρ�
</p>
<p>
5������ӰԺ����֤Ϊ���û��ṩ���������õ��ⲿ���ӵ�׼ȷ�Ժ������ԣ�ͬʱ�����ڸ��ⲿ����ָ��Ĳ��ɼ���ӰԺʵ�ʿ��Ƶ��κ���ҳ�ϵ����ݣ�����ӰԺ���е��κ����Ρ�
</p>
<p>
6���û���ȷ��ͬ����ʹ�ü���ӰԺ������������ڵķ��ս���ȫ���䱾�˳е�������ʹ�ü���ӰԺ��������������һ�к��Ҳ���䱾�˳е�������ӰԺ�Դ˲��е��κ����Ρ�
</p>
<p>
7��������ӰԺע��֮���������⣬�����򲻵�ʹ�ñ�վ�����µ��κ����⡢�������Լ�ٻ����̰�����Ȩ������֪ʶ��Ȩ�ַ���������ɵ��κ���ʧ������ӰԺ�Ų������಻�е��κη������Ρ�
</p>
<p>
8�������򲻿ɿ�������ڿ͹�����ͨѶ��·�жϵȼ���ӰԺ���ܿ��Ƶ�ԭ����ɵ���������жϻ�����ȱ�ݣ������û���������ʹ�ü���ӰԺ������ӰԺ���е��κ����Σ���������������˸��û���ɵ���ʧ��Ӱ�졣
</p>
<p>
9��������δ�漰��������μ������йط��ɷ��棬��������������йط��ɷ����ͻʱ���Թ��ҷ��ɷ���Ϊ׼��
</p>
<p>
10������վ���������Ȩ�����޸�Ȩ������Ȩ�����ս���Ȩ��������ӰԺ���С�
</p>
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
