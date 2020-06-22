<!--左侧文件-->
<div id="main">
<div class="main_left">
<ul id="leftmenu">
<li id="zhifu"><a href="zhifu.php"><span>配置修改</span></a></li>
<li id="admin"><a id="admin" href="admin.php"><span>管理账户</span></a></li>
<li id="hd"><a href="hd.php"><span>幻灯片</span></a></li>
<li id="zn"><a href="zn.php"><span>网友自拍</span></a></li>
<li id="zy"><a href="zy.php"><span>试看资源</span></a></li>
<li id="vip"><a href="vip.php"><span>黄金资源</span></a></li>
<li id="zuan"><a href="zuan.php"><span>钻石资源</span></a></li>
<li id="pl"><a href="pl.php"><span>批量功能</span></a></li>
<li id="name"><a href="name.php"><span>标题列表</span></a></li>
<li id="url"><a href="url.php"><span>域名列表</span></a></li>
<!--推广功能-->
<li id="user"><a href="user.php"><span>推广渠道</span></a></li>
<li id="shuju"><a href="shuju.php"><span>订单详情</span></a></li>
<li id="kou"><a href="kou.php"><span>扣量列表</span></a></li>
<!--推广功能-->
<li id="logout"><a href="gl.php?out=out"><span>退出登录</span></a></li>
</ul>
</div>
<?php
$call=$_SERVER["REQUEST_URI"];
$call=parse_url($call);
$call=$call[path];
$call = substr ($call, strrpos($call,'/'), -4);
$call= substr ($call, 1); 
?>
<script>
document.getElementById("<?php echo $call?>").setAttribute("class", "on");
</script>