<!--����ļ�-->
<div id="main">
<div class="main_left">
<ul id="leftmenu">
<li id="zhifu"><a href="zhifu.php"><span>�����޸�</span></a></li>
<li id="admin"><a id="admin" href="admin.php"><span>�����˻�</span></a></li>
<li id="hd"><a href="hd.php"><span>�õ�Ƭ</span></a></li>
<li id="zn"><a href="zn.php"><span>��������</span></a></li>
<li id="zy"><a href="zy.php"><span>�Կ���Դ</span></a></li>
<li id="vip"><a href="vip.php"><span>�ƽ���Դ</span></a></li>
<li id="zuan"><a href="zuan.php"><span>��ʯ��Դ</span></a></li>
<li id="pl"><a href="pl.php"><span>��������</span></a></li>
<li id="name"><a href="name.php"><span>�����б�</span></a></li>
<li id="url"><a href="url.php"><span>�����б�</span></a></li>
<!--�ƹ㹦��-->
<li id="user"><a href="user.php"><span>�ƹ�����</span></a></li>
<li id="shuju"><a href="shuju.php"><span>��������</span></a></li>
<li id="kou"><a href="kou.php"><span>�����б�</span></a></li>
<!--�ƹ㹦��-->
<li id="logout"><a href="gl.php?out=out"><span>�˳���¼</span></a></li>
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