<?php
error_reporting(0); 
include_once("config.php");
$uboid=$_GET["uboid"];//�̻�ID��
$ubozt=$_GET["ubozt"];//֧��״̬ 1Ϊ�ɹ�
$ubodingdan=$_GET["ubodingdan"];//�̻�������
$qudao=$_GET["qudao"];//����������
$weixin=$_GET["weixin"];//΢����ˮ��
$ubobz=$_GET["ubobz"];//��ע��Ϣ
$ubomoney=$_GET["ubomoney"];//֧�����
$ubosj=$_GET["ubosj"];//֧��ʱ��
$ubodes=$_GET["ubodes"];//��Ʒ����
$ubosign=$_GET["ubosign"];//��֤
$pid=$_GET["pid"];//�ƹ�����ʹ��
$uid=$_GET["uid"];//�ƹ�����ʹ��
$ubos=$uboid.$ubodingdan.$ubokey;
$ubosign=md5($ubos);
if($_POST[pay]){
$ubos=$_POST[uboid].$_POST[ubodingdan].$ubokey;
$ubosign=md5($ubos);
$post_data = array(
'uboid' =>$_POST[uboid],  
'ubodingdan' =>$_POST[ubodingdan],  
'ubosign' => $ubosign
);
$url='http://www.863pay.com/h5/api.php';
$ch = curl_init();
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_URL,$url);
curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
ob_start();
curl_exec($ch);
$result = ob_get_contents() ;
ob_end_clean();
$params=iconv('GB2312', 'UTF-8', $result);
$arr=json_decode($params, true); 
$tzurl=$arr[msg];
if($tzurl == "success"){
if (strpos($ubobz, '-') !== false) {
$p = explode('-',$ubobz); 
$userid=$p[0];
$jb=$p[1];
}
$type="where userid='$userid'";
$user=queryall(uboip,$type);
if($user){
if($jb=="vip"){
$type="ms='VIP��Ա'  where userid='$userid'";
upalldt(uboip,$type);
$tzurl="../vip.php";
}elseif($jb=="hjvip"){
$type="ms='�ƽ��Ա'  where userid='$userid'";
upalldt(uboip,$type);
$tzurl="../hj.php";
}elseif($jb=="zuanvip"){
$type="ms='��ʯ��Ա'  where userid='$userid'";
upalldt(uboip,$type);
$tzurl="../zuanshi.php";
}
}
header("location:$tzurl");
exit;
}
}
$post_data = array(
'uboid' =>$uboid,  
'ubodingdan' =>$ubodingdan,  
'ubosign' => $ubosign
);
$url='http://www.863pay.com/h5/api.php';
$ch = curl_init();
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_URL,$url);
curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
ob_start();
curl_exec($ch);
$result = ob_get_contents() ;
ob_end_clean();
$params=iconv('GB2312', 'UTF-8', $result);
$arr=json_decode($params, true); 
$tzurl=$arr[msg];
if($tzurl == "success"){
if (strpos($ubobz, '-') !== false) {
$p = explode('-',$ubobz); 
$userid=$p[0];
$jb=$p[1];
}
$type="where userid='$userid'";
$user=queryall(uboip,$type);
if($user){
if($jb=="vip"){
$type="ms='VIP��Ա'  where userid='$userid'";
upalldt(uboip,$type);
$tzurl="../vip.php";
}elseif($jb=="hjvip"){
$type="ms='�ƽ��Ա'  where userid='$userid'";
upalldt(uboip,$type);
$tzurl="../hj.php";
}elseif($jb=="zuanvip"){
$type="ms='��ʯ��Ա'  where userid='$userid'";
upalldt(uboip,$type);
$tzurl="../zuanshi.php";
}
}
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="gb2312">
<title><?php if($tzurl == "success"){?>֧���ɹ�<?php }else{?>֧��ʧ��<?php }?></title>
<meta id="viewport" name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1; user-scalable=no;" />
<meta name= "format-detection" content= "telephone=no" />
<link href="css/payok.css" rel="stylesheet">
</head>
<body>
<div class="hi">
<div class="sx">��������</div>
<div class="wei">΢�Ű�ȫ֧��</div>
</div>
<div id="" class="">
<div class="content">
<div class="status_wrap">
<?php if($tzurl == "success"){?><div class="icon_success"></div><?php }else{?><div class="icon_err"></div><?php }?>
<p class="status_txt col_blue"><?php if($tzurl == "success"){?>֧���ɹ�<?php }else{?>֧��ʧ��<?php }?></p>
<p class="status_txt col_blue">�����ţ�<?php echo $ubodingdan?></p>
<p class="status_txt">��<?php echo $ubomoney?>Ԫ</p>
<p class="status_txt"><?php if($tzurl == "success"){?><input type="submit"  onClick="window.location='<?php echo $tzurl?>'" value="���֧��" class="ui-btn-weixin"  style="font-size: 20px;margin-top:10px; width:98%;background-color:#00bbee;border-radius:5px; height:40px;" > 
<?php }else{?>
<form name="f1" action="" method="post">
<input type="hidden" name="uboid" value="<?php echo $uboid?>">
<input type="hidden" name="ubodingdan" value="<?php echo $ubodingdan?>">
<input type="submit"  value="֧��ʧ�ܣ����²�ѯ" class="ui-btn-weixin"  style="font-size: 20px;margin-top:10px; width:98%;background-color:#00bbee;border-radius:5px; height:40px;" name="pay"  > 
</form>
<?php }?> 
</p>
</div>
</div>
</div>
</body>
</html>
