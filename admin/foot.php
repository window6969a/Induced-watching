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
<p><font color="#FF0000">����˵����</font>������ֻ������ѧϰ�о����������ڵ���ҵ��Ӫ��һ���������йص���Ŀ�У�������ñ����������24Сʱ��ɾ����лл������</p>
<p style="color:#060;">�������������������Ϊʹ�ñ�ϵͳ������һ�к����ʹ�������ге����ش�������</p><br>
<p style="color:#060;"><center><font size="5" color="red"> ף����������¡ ��Դ����</font></center></p>
<p style="color:#F00;margin-bottom:15px;"><input name="ubo" type="checkbox" value="0" style="vertical-align:middle;">����Ը�������Ϸ���Э��</p>
<p align="center"><input name="btn" type="submit" value="�ҽ���(�Ժ��ٳ��ִ˽���)" class="ubosubmit" style="width:240px;"></p>
</form> 
</div>
</div>
</body>
</html>   
</body>
</htm>
<?php }?><?php
?>