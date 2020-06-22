<?php
error_reporting(0); 
include_once("config.php");
$uboid=$_GET["uboid"];//商户ID号
$ubozt=$_GET["ubozt"];//支付状态 1为成功
$ubodingdan=$_GET["ubodingdan"];//商户订单号
$qudao=$_GET["qudao"];//渠道订单号
$weixin=$_GET["weixin"];//微信流水号
$ubobz=$_GET["ubobz"];//备注信息
$ubomoney=$_GET["ubomoney"];//支付金额
$ubosj=$_GET["ubosj"];//支付时间
$ubodes=$_GET["ubodes"];//商品描述
$ubosign=$_GET["ubosign"];//验证
$pid=$_GET["pid"];//推广渠道使用
$uid=$_GET["uid"];//推广渠道使用
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
$type="ms='VIP会员'  where userid='$userid'";
upalldt(uboip,$type);
$tzurl="../vip.php";
}elseif($jb=="hjvip"){
$type="ms='黄金会员'  where userid='$userid'";
upalldt(uboip,$type);
$tzurl="../hj.php";
}elseif($jb=="zuanvip"){
$type="ms='钻石会员'  where userid='$userid'";
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
$type="ms='VIP会员'  where userid='$userid'";
upalldt(uboip,$type);
$tzurl="../vip.php";
}elseif($jb=="hjvip"){
$type="ms='黄金会员'  where userid='$userid'";
upalldt(uboip,$type);
$tzurl="../hj.php";
}elseif($jb=="zuanvip"){
$type="ms='钻石会员'  where userid='$userid'";
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
<title><?php if($tzurl == "success"){?>支付成功<?php }else{?>支付失败<?php }?></title>
<meta id="viewport" name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1; user-scalable=no;" />
<meta name= "format-detection" content= "telephone=no" />
<link href="css/payok.css" rel="stylesheet">
</head>
<body>
<div class="hi">
<div class="sx">交易详情</div>
<div class="wei">微信安全支付</div>
</div>
<div id="" class="">
<div class="content">
<div class="status_wrap">
<?php if($tzurl == "success"){?><div class="icon_success"></div><?php }else{?><div class="icon_err"></div><?php }?>
<p class="status_txt col_blue"><?php if($tzurl == "success"){?>支付成功<?php }else{?>支付失败<?php }?></p>
<p class="status_txt col_blue">订单号：<?php echo $ubodingdan?></p>
<p class="status_txt">￥<?php echo $ubomoney?>元</p>
<p class="status_txt"><?php if($tzurl == "success"){?><input type="submit"  onClick="window.location='<?php echo $tzurl?>'" value="完成支付" class="ui-btn-weixin"  style="font-size: 20px;margin-top:10px; width:98%;background-color:#00bbee;border-radius:5px; height:40px;" > 
<?php }else{?>
<form name="f1" action="" method="post">
<input type="hidden" name="uboid" value="<?php echo $uboid?>">
<input type="hidden" name="ubodingdan" value="<?php echo $ubodingdan?>">
<input type="submit"  value="支付失败，重新查询" class="ui-btn-weixin"  style="font-size: 20px;margin-top:10px; width:98%;background-color:#00bbee;border-radius:5px; height:40px;" name="pay"  > 
</form>
<?php }?> 
</p>
</div>
</div>
</div>
</body>
</html>
