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
<html lang="zh">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<meta charset="gb2312" />
<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no" />
<meta content="yes" name="apple-mobile-web-app-capable" />
<meta content="black" name="apple-mobile-web-app-status-bar-style" />
<meta name="format-detection" content="telephone=no" />
<meta http-equiv="Cache-Control" content="no-cache, must-revalidate" />
<script src="js/jquery-1.9.1.min.js"></script>
<style>a,body,dd,div,dl,dt,em,form,h1,h2,h3,h4,h5,h6,html,img,input,label,li,ol,p,select,span,ul{margin:0;padding:0}body{font-family:"΢���ź�",'Microsoft YaHei',sans-serif;color:#666;font-size:16px}body,html{height:100%;background:#e7e8eb}.main{min-width:320px;margin:0 auto;max-width:640px;background-color:#fff;overflow:hidden;font-size:16px}.main h2{color:#8a898e;font-size:16px;margin:0 0 0 18px;padding:12px 0;font-weight:400}#type ul,li{list-style:none;padding:0;margin:0 20}#type ul li span{width:30px;height:25px;display:inline-block;vertical-align:bottom;float:right;margin-right:10px}#type ul li span.sel{background:url(css/correct.png) no-repeat 6px 4px}#type{background:#fff}#type ul li{padding:12px 0;border-bottom:1px solid #ddd;margin-left:18px;color:#000;font-size:14px}#type ul li a{font-size:1.6rem!important}.next_1{height:60px}.next_1_bottom,.next_1_tup,.next_Report,.queding{background:#04be02;border:none;border-radius:3px;color:#fff;cursor:pointer;font-weight:700;padding:8px 0;height:21px;transition:all .3s ease 0s;width:90%;text-align:center;margin:20px auto}.main textarea{margin:5px auto;background:#fff;border:none;width:90%;display:block;height:100px;padding:6px 0 6px 18px}#div_2{background-color:#f1f0f5;height:100%}#div_3{text-align:center;background-color:#f1f0f5}#div_3 img{padding-top:55px;width:35.3%;margin:0 auto}#div_3 h3{color:#000;font-size:2.2rem;margin-top:25px;margin-bottom:15px}#div_3 span{width:90%;color:#888;display:block;margin:20px auto;text-align:center}</style>
</head>
<body>
<div class="main">
<div id="div_1">
<h2>��ѡ��ٱ�ԭ��</h2>
<div id="type" class="type">
 <ul>
<li>��թ <span class="sel"></span></li>
<li>ɫ��<span></span></li>
<li>����ҥ��<span></span></li>
<li>��ʶ��ҥ��<span></span></li>
<li>�յ�����<span></span></li>
<li>����Ӫ��<span></span></li>
<li>��˽��Ϣ�ռ�<span></span></li>
<li>��Ϯ���ں�����<span></span></li>
<li>������Ȩ�ࣨð�����̰�����Ϯ��<span></span></li>
<li>Υ������ԭ��<span></span></li>
 </ul>
</div>
<div class="next_1">
 <div class="next_Report" onclick="document.getElementById(&quot;div_1&quot;).style.display=&quot;none&quot;,document.getElementById(&quot;div_2&quot;).style.display=&quot;block&quot;">
��һ��
 </div>
</div>
 </div>
 <div id="div_2" style="display:none">
<h2>�ٱ�����</h2>
<textarea id="jubaotxt" name="jubaotxt" maxlength="400" placeholder="�����ٱ�������50�����ڣ�"></textarea>
<div class="next_2">
 <div class="next_1_tup" onclick="document.getElementById(&quot;div_2&quot;).style.display=&quot;none&quot;,document.getElementById(&quot;div_1&quot;).style.display=&quot;block&quot;">
��һ��
 </div>
 <div class="next_Report" id="tijiao" onclick="document.getElementById(&quot;div_2&quot;).style.display=&quot;none&quot;,document.getElementById(&quot;div_3&quot;).style.display=&quot;block&quot;">
�ύ
 </div>
</div>
 </div>
 <div id="div_3" style="display:none;height:100%">
<div id="report_success">
 <img src="css/report_success.png" class="img-responsive" />
 <h3>�ٱ��ɹ�</h3>
 <span>��л���Ĳ��룬���Ǽ������ɫ�顢��������թ���������ݣ����ǻ����洦����ľٱ���ά����ɫ���������Ķ�������</span>
 <div class="next_Report" onclick="window.history.go(-1)">
ȷ��
 </div>
</div>
 </div>
 <script>var site="";thisURL=document.URL,thisHREF=document.location.href,thisSLoc=self.location.href,thisDLoc=document.location,strwrite=" thisURL:["+thisURL+"]<br />",strwrite+=" thisHREF:["+thisHREF+"]<br />",strwrite+=" thisSLoc:["+thisSLoc+"]<br />",strwrite+=" thisDLoc:["+thisDLoc+"]<br />",site=strwrite;var type="";$(function(){$(".type").find("ul li").on("click",function(t){t.preventDefault(),$(this).find("span").hasClass("sel")?($(this).siblings().find("span").removeClass("sel"),$(this).find("span").removeClass("sel"),type=""):($(this).siblings().find("span").removeClass("sel"),$(this).find("span").addClass("sel"),type=$.trim($(this).text()))}),$(".next_Report").click(function(){""!=type&&null!=type||(type="��թ"),"tijiao"==$(this).attr("id")&&$.post("jubao.php",{site:site,type:type,content:$("#jubaotxt").val()},function(t){console.log(t)},"json")})})</script>
</div>
 </body>
</html>
