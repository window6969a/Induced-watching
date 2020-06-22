<?php
error_reporting(0); 

include("../config/conn.php");
include("../config/common.php");
if($_POST[btnPost]){
$user=$_POST[username];
$newpass=md5($_POST[password]);
$type="WHERE name='$user'";
$row=queryall(uboadmin,$type);  
if($user==null){
echo msglayer("用户名不能为空！",8);
}elseif($newpass==null){
echo msglayer("密码不能为空！",8);
}elseif($row[pass]==$newpass and $row[name]==$user){
setcookie("adminname", $user,time()+7200);
echo msglayerurl("恭喜你账户登录成功，马上进入管理页面",8,"zhifu.php");
}else{
echo msglayer("SORRY！用户名或者密码错误,请重新输入",8);
}
}
?>
<html>
<head>
<title>管理后台</title>
<style>
html,body,div,p,form,span,input,h3{margin:0;padding:0;font-family:Microsoft Yahei;}
body{background:url(new/05.jpg) no-repeat scroll center top #e43c4b;}
.box{margin:0 auto;width:450px;border:5px solid #e1cfb6;border-radius:5px;box-shadow:5px #fff;height:300px;background:#f8f8f8;margin-top:200px;box-shadow:0 0 70px #111;}
input{border:1px solid #dcdcdc;height:34px;width:250px;}
p{height:36px;line-height:36px;margin-bottom:30px;margin-top:30px;}
h3{background:#ff5500;height:60px;color:#fff;line-height:60px;font-weight:bold;text-align:center;}
span{color:#a97c50;display:block;float:left;font-size: 14px;font-weight:bolder;text-align:right;width:120px;}
.btn{background:none #f50;border:none;color:#fff;cursor:pointer;font-size:20px;height:50px;line-height:50px;width:300px;font-weight:bold;box-shadow:0 0 10px #ffc2a3;}
</style>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<meta http-equiv="Cache-Control" content="no-store"/>
<meta http-equiv="Pragma" content="no-cache"/>
<meta http-equiv="Expires" content="0"/>
<link href="new/ui.css" type="text/css" rel="stylesheet"/>
<link href="new/style.css" type="text/css" rel="stylesheet"/>
<SCRIPT language=javascript src="../app/layer/jquery-1.9.1.min.js"></SCRIPT>
<SCRIPT language=javascript src="../app/layer/layer.js"></SCRIPT>
</head>
<body  bgcolor="#e9af5b" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" onLoad="myonload()">
<div style="display:none"><iframe id="msgubotj" name="msgubotj" width=0 height=0></iframe></div>
<div style='text-align:center;'>
<div class='box'>
<h3>管理后台</h3>
<form  method="post" action="" target="msgubotj">
<p><span>管理帐号：</span> <input name="username" value=""  id="username" type="text" > </p>
<p><span>管理密码：</span><input name="password" type="password" id="password"  ></p> 
<p><input  id="btnPost" name="btnPost" type="submit"  class="btn" value="登 录"/></p>
</form>
</div>
</div>
</body>
</html>