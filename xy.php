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
<title>用户协议</title>
<meta charset="gb2312">
<meta name="description" content="">
<meta name="viewport" content="width=device-width,initial-scale=1">
<link href="css/aio.css" rel="stylesheet">
<script src="js/jquery.min.js"></script>
</head>
<body class="bg-white clear-padding">
<div class="return-line"  onclick="ubourl('user.php<?php echo $url?>')">
<img src="css/return.png"><span class="title ititle">用户协议</span>
<div class="clear-block">
</div>
</div>
<div class="return-line-holder">
</div>
<div class="pd10 xieyi-box">
<h3>激情影院免责声明</h3>
<p>
【重要须知】
</p>
<p>
1、一切移动客户端用户在浏览激情影院时均被视为已经仔细阅读本条款并完全同意。凡以任何方式登陆本站，或直接、间接使用本站资料者，均被视为自愿接受本网站相关声明和用户服务协议的约束。
</p>
<p>
2、激情影院转载的内容并不代表激情影院之意见及观点，也不意味着本站赞同其观点或证实其内容的真实性。
</p>
<p>
3、激情影院转载的文字、图片、音视频等资料均由本站用户提供，其真实性、准确性和合法性由信息发布人负责。激情影院不提供任何保证，并不承担任何法律责任。
</p>
<p>
4、激情影院所转载的文字、图片、音视频等资料，如果侵犯了第三方的知识产权或其他权利，责任由作者或转载者本人承担，本站对此不承担责任。
</p>
<p>
5、激情影院不保证为向用户提供便利而设置的外部链接的准确性和完整性，同时，对于该外部链接指向的不由激情影院实际控制的任何网页上的内容，激情影院不承担任何责任。
</p>
<p>
6、用户明确并同意其使用激情影院网络服务所存在的风险将完全由其本人承担；因其使用激情影院网络服务而产生的一切后果也由其本人承担，激情影院对此不承担任何责任。
</p>
<p>
7、除激情影院注明之服务条款外，其它因不当使用本站而导致的任何意外、疏忽、合约毁坏、诽谤、版权或其他知识产权侵犯及其所造成的任何损失，激情影院概不负责，亦不承担任何法律责任。
</p>
<p>
8、对于因不可抗力或因黑客攻击、通讯线路中断等激情影院不能控制的原因造成的网络服务中断或其他缺陷，导致用户不能正常使用激情影院，激情影院不承担任何责任，但将尽力减少因此给用户造成的损失或影响。
</p>
<p>
9、本声明未涉及的问题请参见国家有关法律法规，当本声明与国家有关法律法规冲突时，以国家法律法规为准。
</p>
<p>
10、本网站相关声明版权及其修改权、更新权和最终解释权均属激情影院所有。
</p>
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
