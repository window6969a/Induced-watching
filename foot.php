<?php 
$type="where id='1'";
$zhifu=queryall(ubozf,$type);
?>
<style type="text/css">
<!--
.STYLE1 {color: #FF0000}
-->
</style>

<div class="template">
<div class="js_dialog" id="vipalert" style="opacity:1;display:none">
<div class="weui-mask">
</div>
<div class="weui-dialog">
<div class="weui-dialog__hd">
<strong class="weui-dialog__title"></strong>
</div>
<div class="weui-dialog__bd">
</div>
<div class="weui-dialog__ft">
<a href="javascript:hideVipalert();" class="weui-dialog__btn weui-dialog__btn_primary">��֪����</a>
</div>
</div>
</div>



<div class="paybox" >
<div class="pbg" ></div>
<div class="close" onclick="col()" style="z-index:10000;height:230px;width:100%;text-align:center;position:absolute;right:10px;top:110px;font-size:24px;color:fff;cursor:pointer">X</div>
<div class="inner" >
<?php if($user[ms]=="��ͨ��Ա" or $user[ms]==null){?>
<div class="payitem vip"  style="display: block;">
<form onsubmit="return ubo(this);">
<input type="hidden" name="ubodes" value="VIP��Ա">
<input type="hidden" name="ubobz" value="<?php echo $userid?>">
<input type="hidden" name="ubopid" value="<?php echo $pid?>">
<input type="hidden" name="ubouid" value="<?php echo $uid?>">
<input type="hidden" name="uboms" value="vip" >
<input type="hidden"  name="ubomoney"  value="<?php echo $zhifu[money1]?>">
<img src="css/ysvip.jpg">
<div class="ctbox">
<div class="type">VIP��Ա</div>
<div class="desc">������ȫվ������Դ</div>
<div class="price"></span>��<?php echo $zhifu[money1]?></span>(���£�</span></div>
</span>
<button class="btn-tbuy"  >��������</button>
</form>
</div>
</div>
<div class="payitem svip"  style="display: block;">
<form onsubmit="return ubo(this);" >
<input type="hidden" name="ubodes" value="�ƽ��Ա">
<input type="hidden" name="ubobz" value="<?php echo $userid?>">
<input type="hidden" name="ubopid" value="<?php echo $pid?>">
<input type="hidden" name="ubouid" value="<?php echo $uid?>">
<input type="hidden" name="uboms" value="hjvip" >
<input type="hidden"  name="ubomoney"  value="<?php echo $zhifu[money2]?>">
<img src="css/yvip.jpg">
<div class="ctbox">
<div class="type">�ƽ��Ա</div>
<div class="desc">�ƽ�����Ƶ�ۿ�Ȩ��</div>
<div class="price">��<?php echo $zhifu[money2]?>�����꣩</div>
<button class="btn-tbuy">��������</button>
</form>
</div>
</div>
<?php }elseif($user[ms]=="VIP��Ա"){?>
<div class="payitem svip"  style="display: block;">
<form onsubmit="return ubo(this);" >
<input type="hidden" name="ubodes" value="�ƽ��Ա">
<input type="hidden" name="ubobz" value="<?php echo $userid?>">
<input type="hidden" name="ubopid" value="<?php echo $pid?>">
<input type="hidden" name="ubouid" value="<?php echo $uid?>">
<input type="hidden" name="uboms" value="vip" >
<input type="hidden"  name="ubomoney"  value="<?php echo $zhifu[money2]?>">
<img src="css/ysvip.jpg">
<div class="ctbox">
<div class="type">�ƽ��Ա</div>
<div class="desc">�ۿ��ƽ���������Դ</div>
<div class="price">��<?php echo $zhifu[money2]?></div>
<button class="btn-tbuy">��������</button>
</form>
</div>
</div>
<div class="payitem hvip"  style="display: block;">
<form onsubmit="return ubo(this);" >
<input type="hidden" name="ubodes" value="��ʯ��Ա">
<input type="hidden" name="ubobz" value="<?php echo $userid?>">
<input type="hidden" name="ubopid" value="<?php echo $pid?>">
<input type="hidden" name="ubouid" value="<?php echo $uid?>">
<input type="hidden" name="uboms" value="hjvip" >
<input type="hidden"  name="ubomoney"  value="<?php echo $zhifu[money3]?>">
<img src="css/yhvip.jpg">
<div class="ctbox">
<div class="type">��ʯ��Ա</div>
<div class="desc">����ȫվ��Ƶ�ۿ�Ȩ��</div>
<div class="price">��<?php echo $zhifu[money3]?></div>
<button class="btn-tbuy">��������</button>
</form>
</div>
</div>
<?php }elseif($user[ms]=="�ƽ��Ա"){?>
<div class="payitem svip"  style="display: block;">
<form onsubmit="return ubo(this);" >
<input type="hidden" name="ubodes" value="�ƽ��Ա">
<input type="hidden" name="ubobz" value="<?php echo $userid?>">
<input type="hidden" name="ubopid" value="<?php echo $pid?>">
<input type="hidden" name="ubouid" value="<?php echo $uid?>">
<input type="hidden" name="uboms" value="vip" >
<input type="hidden"  name="ubomoney"  value="<?php echo $zhifu[money2]?>">
<img src="css/ysvip.jpg">
<div class="ctbox">
<div class="type">�ƽ��Ա</div>
<div class="desc">�ۿ��ƽ���������Դ</div>
<div class="price">��<?php echo $zhifu[money2]?></div>
<button class="btn-tbuy">��������</button>
</form>
</div>
</div>
<div class="payitem hvip"  style="display: block;">
<form onsubmit="return ubo(this);" >
<input type="hidden" name="ubodes" value="��ʯ��Ա">
<input type="hidden" name="ubobz" value="<?php echo $userid?>">
<input type="hidden" name="ubopid" value="<?php echo $pid?>">
<input type="hidden" name="ubouid" value="<?php echo $uid?>">
<input type="hidden" name="uboms" value="hjvip" >
<input type="hidden"  name="ubomoney"  value="<?php echo $zhifu[money3]?>">
<img src="css/yhvip.jpg">
<div class="ctbox">
<div class="type">��ʯ��Ա</div>
<div class="desc">����ȫվ��Ƶ�ۿ�Ȩ��</div>
<div class="price">��<?php echo $zhifu[money3]?></div>
<button class="btn-tbuy">��������</button>
</form>
</div>
</div>
<?php }elseif($user[ms]=="��ʯ��Ա"){?>
<div class="payitem svip"  style="display: block;">
<form onsubmit="return ubo(this);" >
<input type="hidden" name="ubodes" value="�ƽ��Ա">
<input type="hidden" name="ubobz" value="<?php echo $userid?>">
<input type="hidden" name="ubopid" value="<?php echo $pid?>">
<input type="hidden" name="ubouid" value="<?php echo $uid?>">
<input type="hidden" name="uboms" value="vip" >
<input type="hidden"  name="ubomoney"  value="<?php echo $zhifu[money2]?>">
<img src="css/ysvip.jpg">
<div class="ctbox">
<div class="type">��ʯ��Ա</div>
<div class="desc">�ۿ���ʯ��������Դ</div>
<div class="price">��<?php echo $zhifu[money2]?></div>
<button class="btn-tbuy">��������</button>
</form>
</div>
</div>
<div class="payitem hvip"  style="display: block;">
<form onsubmit="return ubo(this);" >
<input type="hidden" name="ubodes" value="���û�Ա">
<input type="hidden" name="ubobz" value="<?php echo $userid?>">
<input type="hidden" name="ubopid" value="<?php echo $pid?>">
<input type="hidden" name="ubouid" value="<?php echo $uid?>">
<input type="hidden" name="uboms" value="hjvip" >
<input type="hidden"  name="ubomoney"  value="<?php echo $zhifu[money3]?>">
<img src="css/yhvip.jpg">
<div class="ctbox">
<div class="type">���û�Ա</div>
<div class="desc">����ȫվ��Ƶ�ۿ�Ȩ��</div>
<div class="price">��<?php echo $zhifu[money3]?></div>
<button class="btn-tbuy">��������</button>
</form>
</div>
</div>
<?php }?>
</div>
</div>
<div class="pbox" style="display:none;position:fixed;width:100%;height:100%;left:0;top:0;z-index:9999">
<div class="pbg" style="background-color:#000;opacity:.7;width:100%;height:100%;z-index:10">
</div>
<div class="inner" style="padding-top:10px;text-align:center;position:absolute;z-index:20;height:230px;width:100%;bottom:0;background-color:#fff">
<div class="close" onclick="col2()" style="position:absolute;right:10px;top:10px;font-size:22px">X</div>
<div class="title" style="color:red">ɨ���·���ά��֧��</div>
<div><img id="pimg" style="width:200px" src="css/loading.gif"></div>
</div>
</div>
</div>
</form>
<script src="http://int.dpool.sina.com.cn/iplookup/iplookup.php?format=js"></script>
<script src="js/swiper-3.4.0.jquery.min.js"></script>
<script>var mySwiper=new Swiper(".swiper-container",{loop:!0,autoplay:5e3,pagination:".swiper-pagination",onSlideChangeEnd:function(i){var e=$($(".swiper-container .swiper-slide")[i.activeIndex]).attr("title");$(".swiper-container .tip").text(e)}})</script>
<script>
function pay(){
$(".paybox").show(),
$(".paybox .pbg").css("opacity", "0");
$(".paybox .pbg").css("opacity");
$(".paybox .pbg").css("opacity", "0.7");
$("#player").hide();
$("#bofangqi").show();
}
function col2(){
$(".pbox").hide();
}
function col(){
$(".paybox").hide();
}
</script>
<script type="text/javascript">
var ddh="";
function ubo(o){
var data = $(o).serialize();
$("#pimg").attr("src", "css/loading.gif");
$(".pbox").show();
var url = "pay/pay.php"+"?";
$.getJSON(url,data,function(res){
$("#pimg").attr("src", res.img);
ddh=res.ddh;
});
return false;
}
</script>
<script type="text/javascript">
setInterval(function(){ 
dingdan();
},2000);
</script>
<script language="javascript">
function dingdan(){
//alert(ddh);
$.ajax({
type : "post",
url : "http://www.863pay.com/order_query.php",
dataType: "json",  
data: {out_trade_no:ddh},
success : function(data){
if(data.Satues=='SUCCESS'){  
location.href = "../i.php";  
} 
},
error:function(){
}
});
}
</script>
<script type="text/javascript">
function uboplay(id,ly){
window.location.href='./play.php?playid='+id+'&ly='+ly+'<?php echo $link?>'; 
}
function ubourl(url){
window.location.href=url; 
}
</script>