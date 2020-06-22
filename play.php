<?php
error_reporting(0); 
include("config/conn.php");
include("config/common.php");
include("1.php");
$type="where id='1'";
$zhifu=queryall(ubozf,$type);
//关闭网站
if($zhifu[wz]=="1"){echo "404";exit;}
$userid=$_COOKIE[userid];
$type="where userid='$userid'";
$user=queryall(uboip,$type);
$pid=$_GET[pid];
$uid=$_GET[uid];
if($pid){$url="?pid=".$pid."&uid=".$uid;$link="&pid=".$pid."&uid=".$uid;}else{$url="";$link="";}
$cishu=$user[cs]-1;
$cs=$user[cs];
if($cs=="0"){
}elseif($cs=="1"){
$type="cs='0' where userid='$userid'";
upalldt(uboip,$type);
}else{
$type="cs='$cishu' where userid='$userid'";
upalldt(uboip,$type);
}
$playid=$_GET["playid"];
$ly=$_GET["ly"];
if($ly=="ubosk"){
$type="where id='$playid'";
$neirong=queryall(ubosk,$type);
}elseif($ly=="ubovip"){
$type="where id='$playid'";
$neirong=queryall(ubovip,$type);
}elseif($ly=="ubozuan"){
$type="where id='$playid'";
$neirong=queryall(ubozuan,$type);
}elseif($ly=="ubohd"){
$type="where id='$playid'";
$neirong=queryall(ubohd,$type);
}elseif($ly=="ubozhainan"){
$type="where id='$playid'";
$neirong=queryall(ubozhainan,$type);
}
if($playid== null){ 
echo "<script>alert('抱歉，你访问的资源已经删除')</script><script>location.href='i.php$url'</script>";
exit;
} 
$i=rand(1,14);
?>
<html>
<head>
<title><?php echo $neirong[name]?></title>
<meta charset="gb2312">
<meta name="description" content="">
<meta name="viewport" content="width=device-width,initial-scale=1">
<link href="css/aio.css" rel="stylesheet">
<script src="js/jquery.min.js"></script>
<style type="text/css" media="screen">
#bofangqi{ background: url(css/player.jpg) no-repeat center 0;width:100%;height:235px;display: none;}
</style>
</head>
<body class="play-page">
<div>
<div class="footer-box">
<a onclick="ubourl('i.php<?php echo $url?>')" ><div class="item item2"><div class="bname">岛国大片</div></div></a>
<a onclick="ubourl('zhainan.php<?php echo $url?>')" ><div class="item item2"><div class="bname">网友自拍</div></div></a>
<a onclick="ubourl('zuanshi.php<?php echo $url?>')" ><div class="item item1"><div class="bname">钻石专区</div></div></a>
<a onclick="ubourl('tongceng.php<?php echo $url?>')" ><div class="item item4"><div class="bname">同城约会</div></div></a>
<a onclick="ubourl('user.php<?php echo $url?>')" ><div class="item item5"><div class="bname">会员中心</div></div></a>
</div>
</div>
<div class="return-line"  onclick="ubourl('i.php<?php echo $url?>')">
<img src="css/return.png"><span class="title ititle"><?php echo $neirong[name]?></span>
<div class="clear-block">
</div>
</div>
<div class="return-line-holder">
</div>
<div class="player" style="width: 100%; height: 235px;">
<video preload="auto" id="player" poster="" controls style="width:100%;height:100%;"><source src="<?php echo $neirong[url]?>" type="video/mp4"></video>
<div  id="bofangqi" ></div>
</div>
<?php if($user[ms]=="普通会员" or $user[ms]==null){?>
<div class="play-tip tip1" style=""><a  onclick="pay()" style="color:#00f"><img style="width:100%" src="css/addvipb.png"></a></div>
<?php }elseif($user[ms]=="VIP会员"){?>
<div class="play-tip tip2" style=""><a  onclick="pay()"  style="color:#00f"><img style="width:100%" src="css/addhvipb.png"></a></div>
<?php }elseif($user[ms]=="黄金会员"){?>
<div class="play-tip tip3" style=""><a onclick="pay()"  style="color:#00f"><img style="width:100%" src="css/addsvipb.png"></a></div>
<?php }elseif($user[ms]=="钻石会员"){?>
<?php }?>
</div>
<div class="more-line title-line"><div class="title"><?php echo $neirong[ms]?></div><div class="more">+MORE</div>
<div class="clear-block"></div>
</div>
<div class="plist-box">
<?php if($user[ms]=="普通会员" or $user[ms]==null){?>
<?php
$query = mysql_query("SELECT * FROM ubosk  order by rand()  limit 3");
while($a = mysql_fetch_array($query)) {
?>  
<div class="item"><a onclick="uboplay('<?php echo $a[id]?>','ubosk')">
<div class="img"><div class="flag flag001"><?php echo $a[ms]?></div>
<div class="rep" style="background-image: url(<?php echo $a[pic]?>);"></div></div>
<div class="title"><?php echo $a[name]?></div></a>
</div>

<?php }?>
<?php  }elseif($user[ms]=="VIP会员"){?>
<?php
$query = mysql_query("SELECT * FROM ubovip  order by rand()  limit 3");
while($a = mysql_fetch_array($query)) {
?>  
<div class="item"><a <?php if($a[ms]=="限制级"){?>onclick="pay()"<?php }else{?>  onclick="uboplay('<?php echo $a[id]?>','ubovip')"<?php }?>>
<div class="img"><div class="flag flag001"><?php echo $a[ms]?></div>
<div class="rep" style="background-image: url(<?php echo $a[pic]?>);"></div></div>
<div class="title"><?php echo $a[name]?></div></a>
</div>
<?php }?>
<?php  }elseif($user[ms]=="黄金会员"){?>
<?php
$query = mysql_query("SELECT * FROM ubovip  order by rand()  limit 3");
while($a = mysql_fetch_array($query)) {
?>  
<div class="item"><a onclick="uboplay('<?php echo $a[id]?>','ubovip')">
<div class="img"><div class="flag flag001"><?php echo $a[ms]?></div>
<div class="rep" style="background-image: url(<?php echo $a[pic]?>);"></div></div>
<div class="title"><?php echo $a[name]?></div></a>
</div>
<?php }?>
<?php  }elseif($user[ms]=="钻石会员"){?>
<?php
$query = mysql_query("SELECT * FROM ubozuan  order by rand()  limit 3");
while($a = mysql_fetch_array($query)) {
?>  
<div class="item"><a onclick="uboplay('<?php echo $a[id]?>','ubozuan')">
<div class="img"><div class="flag flag001"><?php echo $a[ms]?></div>
<div class="rep" style="background-image: url(<?php echo $a[pic]?>);"></div></div>
<div class="title"><?php echo $a[name]?></div></a>
</div>
<?php }?>
<?php }?>
<div class="clear-block">
</div>
<div class="p-line">
</div>
</div>
<div class="title-line"><div class="title">狼友热评</div><div class="clear-block"></div>
</div>
<div class="comments" >
<table>
<tbody>
<?php
$query = mysql_query("SELECT * FROM  ubopl   order by rand()    limit 10");
while($a = mysql_fetch_array($query)) {
?> 
<tr <?php if($user[ms]=="普通会员" or $user[ms]==null){?>onclick="pay();"<?php }else{?><?php }?>>
<td class="facetd">
<img class="face" src="<?php echo $a[pic];?>">
</td>
<td>
<div class="name"><?php echo $a[name];?></div>
<div class="content"><?php echo $a[neirong];?></div>
<div class="tip"><div class="time"><?php echo $a[shijian];?></div>
<div class="tag">热评</div>
<div class="clear-block">
</div>
</div>
</td>
</tr>
<?php }?>  
</tbody>
</table>
</div>





<style type="text/css" media="screen">
.rechargeMask{
position: fixed;
width: 100%;
height: 100%;z-index: 10;
left: 0;top:0;
background: rgba(0,0,0,.6);
}
.recharge-box{
width: 240px;
height: 140px;
background: rgb(255,255,255);
-webkit-border-radius: 6px;
border-radius: 6px;
position: absolute;
left: 0;right: 0;
top:0;bottom: 0;
margin: auto;z-index: 11;
}
.recharge-tip{
text-indent: 12px;
margin-top: 20px;
overflow: hidden;
}
.recharge-tip p{
line-height: 35px;
}
.recharge-footer{
position: absolute;
width: 100%;
height: 42px;
bottom: 0;
font-size: 15px;
color: rgb(20,136,245);
line-height: 42px;
display: -webkit-flex;
display: flex;
border-top:1px solid #ccc;
}
.recharge-footer>div{
-webkit-flex:1;
flex:1;
text-align: center;
}
.none{display: none;}
</style>
<?php if($user[ms]=="普通会员" or $user[ms]==null){?>
<div class="rechargeMask none">
<div class="recharge-box">
<div class="recharge-tip">
<p class="f15" style="position:relative;">温馨提示: 
<span class="close-btn1" style="position:absolute;right:20px;font-size:30px;font-weight:bolder;">&times</span>
</p>
<p class="f15 now-huiyuan"><span style="color:#ef0909;font-weight:bolder;">非会员</span>只能试看20秒视频哦~</p>
</div>
<div class="recharge-footer">
<div class="close-btn1">先看看</div>
<div class="now-recharge">去充值</div>
</div>
</div>
</div>
<?php }elseif($user[ms]=="VIP会员"){?>
<div class="rechargeMask none">
<div class="recharge-box">
<div class="recharge-tip">
<p class="f15" style="position:relative;">温馨提示: 
<span class="close-btn1" style="position:absolute;right:20px;font-size:30px;font-weight:bolder;">&times</span>
</p>
<p class="f15 now-huiyuan"><span style="color:#ef0909;font-weight:bolder;">黄金会员</span>观看千部影片</p>
</div>
<div class="recharge-footer">
<div class="close-btn1">先看看</div>
<div class="now-recharge">立即升级</div>
</div>
</div>
</div>
<?php }elseif($user[ms]=="黄金会员"){?>
<div class="rechargeMask none">
<div class="recharge-box">
<div class="recharge-tip">
<p class="f15" style="position:relative;">温馨提示: 
<span class="close-btn1" style="position:absolute;right:20px;font-size:30px;font-weight:bolder;">&times</span>
</p>
<p class="f15 now-huiyuan"><span style="color:#ef0909;font-weight:bolder;">钻石会员</span>观看万部影片</p>
</div>
<div class="recharge-footer">
<div class="close-btn1">先看看</div>
<div class="now-recharge">立即升级</div>
</div>
</div>
</div>
<?php }?>
<script>
var myVideo = document.getElementById("player");
myVideo.pause();
myVideo.onended = function () {
<?php if($user[ms]=="钻石会员"){?>
window.location.reload();
<?php }else{?>
$(".rechargeMask").removeClass("none");
<?php }?>
$("#player").hide();
$("#bofangqi").show();
};
</script> 
<script>
<?php if($user[ms]=="钻石会员"){?>
<?php }else{?>
<?php if($zhifu[play]==0){?>
$(document).ready(function(e) {
setTimeout(function(){
$(".rechargeMask").removeClass("none");
},1000);
});
<?php }?>
<?php }?>
$(".close-btn1").on("click",function(e){
$(".rechargeMask").addClass("none");
myVideo.play();
$("#player").show();
$("#bofangqi").hide();
});
$(".now-recharge").on("click",function(){
pay();
});

</script>
<?php include_once('foot.php'); ?> 
</body>
</html>
