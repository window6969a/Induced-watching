<?php 
$type="where id='1'";
$bq=queryall(ubobq,$type);
$ccc=$bq[ccc];
?>
<?php if($ccc=="ok"){?>
<?php }else{?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title></title>
<link href="bq/style.css" rel="stylesheet" type="text/css">
</head>
<body oncontextmenu="return false">
<div class="uboright">
<div id="overlay"></div>
<div id="ubobox">
<form action="" method="post"  target="msgubotj">
<p><font color="#FF0000">程序说明：</font>本程序只可用于学习研究，不得用于到商业运营等一切与利益有关的项目中，在您获得本程序后请于24小时内删除，谢谢合作！</p>
<p style="color:#060;">　　免责声明：如果因为使用本系统引发的一切后果由使用者自行承担，特此声明！</p><br>
<p style="color:#060;"><center><font size="5" color="red"> 祝您：生意兴隆 财源滚滚</font></center></p>
<p style="color:#F00;margin-bottom:15px;"><input name="ubo" type="checkbox" value="0" style="vertical-align:middle;">我自愿接受以上服务协议</p>
<p align="center"><input name="btn" type="submit" value="我接受(以后不再出现此界面)" class="ubosubmit" style="width:240px;"></p>
</form> 
</div>
</div>
</body>
</html>   
</body>
</htm>
<?php }?><?php
?>