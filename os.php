<?php
error_reporting(0); 
$type="where id='1'";
$zhifu=queryall(ubozf,$type);
//关闭网站
if($zhifu[wz]=="1"){
echo "404";
exit;
}
$agent = $_SERVER['HTTP_USER_AGENT'];
if (strpos($agent, 'MicroMessenger') === false) {
echo '<!DOCTYPE html>';
echo '<html>';
echo '<head>';
echo '<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no" />';
echo '<title>Example</title>';
echo '<style>body,html{height:100%;margin:0;padding:0;background-color:#adff2f}li{width:100%;height:100px;position:fixed;top:0;bottom:0;margin:auto;background-color:#adff2f;font:1.4em/1.6em cursive;border:0 solid #9acd32;overflow:hidden;text-align:center}::-webkit-scrollbar{width:18px}::-webkit-scrollbar-thumb{background:#9acd32}::-webkit-scrollbar-track{background:#9acd32;border-left:1px solid #9acd32}::-webkit-resizer{background:#9acd32}</style>';
echo '</head>';
echo '<body>';
echo '<li name="comments" id="comments" align="center">sorry..你的打开姿势不正确<br />请先准备好纸巾</li>';
echo '</body>';
echo '</html>';
exit;
}else{

}






