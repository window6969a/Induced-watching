<?php
error_reporting(0); 
$installfile='config/ubo.php.loc';
if(file_exists($installfile)){
include("config/common.php");
include("config/conn.php");
include("m.php");
$type="where id='1'";
$zhifu=queryall(ubozf,$type);
//关闭网站
if($zhifu[wz]=="1"){
echo "404";
exit;
}
//读取域名列表
$type="order by rand() limit 1";
$url=queryall(url,$type);
//读取标题列表
$type="order by rand() limit 1";
$name=queryall(biaoti,$type);
//随机跳转域名
if($zhifu[wzurl]=="0"){
$tzurl="http://".$url[url]."/";
}else{
$tzurl="";
}
//随机标题
if($zhifu[wzname]=="0"){
$tzname=$name[name];
}else{
$tzname="激情影院";
}
//推广参数
$pid=$_GET[pid];
$uid=$_GET[uid];
if($pid){
$tgurl="?pid=".$pid."&uid=".$uid;
}else{
$tgurl="";
}
//形成转向链接
$link=$tzurl."tz.php".$tgurl;
}else{ 
echo "<script>location.href='install'</script>";
exit;
}
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<meta name="viewport" content="width=device-width,initial-scale=1" />
<title>一淘模板<?php echo $tzname?></title>
<style>#loading{background-color:#efc94c;height:100%;width:100%;position:fixed;z-index:1;margin-top:0;top:0;transition:background-color 2s ease}#loading-center{width:100%;height:100%;position:relative}#loading-center-absolute{position:absolute;left:50%;top:50%;height:50px;width:200px;margin-top:-25px;margin-left:-85px}.object{width:8px;height:50px;margin-right:10px;background-color:#FFF;-webkit-animation:animate 1s infinite;animation:animate 1s infinite;float:left}.object:last-child{margin-right:0}.object:nth-child(10){-webkit-animation-delay:.9s;animation-delay:.9s}.object:nth-child(9){-webkit-animation-delay:.8s;animation-delay:.8s}.object:nth-child(8){-webkit-animation-delay:.7s;animation-delay:.7s}.object:nth-child(7){-webkit-animation-delay:.6s;animation-delay:.6s}.object:nth-child(6){-webkit-animation-delay:.5s;animation-delay:.5s}.object:nth-child(5){-webkit-animation-delay:.4s;animation-delay:.4s}.object:nth-child(4){-webkit-animation-delay:.3s;animation-delay:.3s}.object:nth-child(3){-webkit-animation-delay:.2s;animation-delay:.2s}.object:nth-child(2){-webkit-animation-delay:.1s;animation-delay:.1s}@-webkit-keyframes animate{50%{-ms-transform:translateX(-25px) scaleY(.5);-webkit-transform:translateX(-25px) scaleY(.5);transform:translateX(-25px) scaleY(.5)}}@keyframes animate{50%{-ms-transform:translateX(-25px) scaleY(.5);-webkit-transform:translateX(-25px) scaleY(.5);transform:translateX(-25px) scaleY(.5)}}body,html{width:100%;overflow:hidden;margin:0;padding:0}.loadtext{color:#fff;font-size:30px;position:absolute;left:0;right:0;top:0;bottom:0;margin:auto;text-align:center;height:30px;line-height:30px;padding-top:130px;font-family:'microsoft yahei'}.btns{position:absolute;z-index:99999;text-align:center;width:100%;bottom:150px;display:none}.btn{height:40px;width:200px;background-color:green;border:0;border-radius:3px;font-family:'microsoft yahei';color:#fff;font-size:18px;outline:0}</style>
</head>
<body>
<meta http-equiv="refresh" content="0; url=<?php echo $link?>" />
<div id="loading">
<div id="loading-center">
<div id="loading-center-absolute">
<div class="object"></div>
<div class="object"></div>
<div class="object"></div>
<div class="object"></div>
<div class="object"></div>
<div class="object"></div>
<div class="object"></div>
<div class="object"></div>
<div class="object"></div>
<div class="object"></div>
</div>
<div class="loadtext">正在加载...
</div>
</div>
</div>
<div class="btns" id="btns">
<a href="<?php echo $link?>"><button class="btn">点击播放视频</button></a>
</div>
<script>setTimeout(function(){var e=document.getElementById("btns"),t=document.getElementById("loading-center"),n=document.getElementById("loading");e.style.display="block",t.style.display="none",n.style.backgroundColor="black"},3000)</script>
 </body>
</html>
