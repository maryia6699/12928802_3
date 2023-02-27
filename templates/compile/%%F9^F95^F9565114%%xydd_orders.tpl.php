<?php /* Smarty version 2.6.25, created on 2019-12-07 15:59:20
         compiled from ffsm/xydd_orders.tpl */ ?>
<!DOCTYPE html>
<html lang="en" >
 <head> 
  <meta charset="utf-8" /> 
  <title>祈福明灯，孔明灯，许愿广场，在线专业测算_深度网</title> 
  <meta name="viewport" content="width=device-width,initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no, viewport-fit=cover" /> 
  <meta name="apple-mobile-web-app-capable" content="yes" /> 
  <meta name="apple-touch-fullscreen" content="yes" /> 
  <meta name="keywords" content="祈福，许愿，愿望，孔明灯，许愿树，我要许愿，实现愿望" /> 
  <meta name="description" content="深度网专业在线祈福明灯！为您提供许愿及祈福平台，致力于实现每个人心中的美好愿望，灵机文化祈福明灯祝您早日实现您的美好愿望。" /> 
 </head>
 <body>
  <meta http-equiv="Pragma" content="no-cache" /> 
  <meta http-equiv="Cache-Control" content="no-cache" /> 
  <meta http-equiv="Expires" content="0" /> 
  <meta name="apple-mobile-web-app-capable" content="yes" /> 
  <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" /> 
  <meta name="format-detection" content="telephone=no" /> 
  <meta name="format-detection" content="email=no" /> 
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" /> 
  <meta name="renderer" content="webkit" /> 
  <!-- uc强制竖屏 --> 
  <meta name="screen-orientation" content="portrait" /> 
  <meta name="x5-orientation" content="portrait" />
  <!-- QQ强制竖屏 --> 
  <meta http-equiv="Cache-Control" content="no-siteapp" />
  <!-- 不让百度转码 --> 
  <link rel="stylesheet" type="text/css" href="/statics/ffsm/xydd/css/xydd3.css"/>
  <script src="/statics/ffsm/xydd/js/jquery.min.js"></script>
  <script src="/statics/ffsm/xydd/js/bj-report-tryjs.min.js"></script> 
  <script src="https://apps.bdimg.com/libs/jquery/1.9.1/jquery.min.js"></script>
  <div class="container" id="container"> 
   <div class="wrapper" id="wrapper"> 
    <section id="page-pay">
     <section data-reactroot="">
      <div class="banner">
       <img src="/statics/ffsm/xydd/images/pay_banner.jpg" alt="" />
      </div>
      <div class="main">
       <div class="tips">
        <p>
         <!-- react-text: 7 -->已为
         <!-- /react-text --><span>19805241</span>
         <!-- react-text: 9 -->人进行点灯，
         <!-- /react-text --><span>99%</span>
         <!-- react-text: 11 -->以上的测算用户对财运有提升。点灯就能
         <!-- /react-text --><span>捉住致富机遇，轻松赚大钱！</span></p>
       </div>
       <div class="common-pay-info" style="margin: 0.5rem 0.75rem;">
        <div class="item-name">
         <!-- react-text: 15 -->测算项目：
         <!-- /react-text -->
         <!-- react-text: 63 -->在线付费-祈福明灯-180天
         <!-- /react-text -->
        </div>
        <div class="item-base-price clear bor-none">
         <div class="price left">
          <strong class="time-price" style="background-color: rgb(165, 42, 29);">
           <!-- react-text: 20 -->限时优惠￥
           <!-- /react-text -->
           <!-- react-text: 64 --><?php echo $this->_tpl_vars['money']; ?>

           <!-- /react-text -->
           <!-- react-text: 22 -->元
           <!-- /react-text --></strong>
          <br />
          <span>
           <!-- react-text: 25 -->原价：￥
           <!-- /react-text -->
           <!-- react-text: 65 -->98
           <!-- /react-text --></span>
         </div>
         <div class="dis-time right">
          <strong>距优惠结束</strong>
          <br />
          <span id="hour_show">00 : 00 : 00</span>
         </div>
        </div>
       </div>
       <div class="pay-list-wrapper">
        <div>
         <div class="common-pay-lists">
          <div class="common-pay-title" style="color: rgb(51, 51, 51); background: rgb(255, 255, 255); border-bottom-color: rgb(188, 188, 188);">
           支付方式
          </div>
          <div class="common-item-box">
           <ul class="common-pay-item">
            <li class="show">
             <div class="right">
              <div class="pay-radio"></div>
             </div>
			 <?php if ($this->_tpl_vars['sys_pay_type'] == 0 || $this->_tpl_vars['sys_pay_type'] == 1 || $this->_tpl_vars['sys_pay_type'] == 3): ?>
             <a class="weixin" target="_self" href="/?ct=pay&ac=go&oid=<?php echo $this->_tpl_vars['oid']; ?>
&type=1">
             <div class="auto">
              <span class="pay-icon wechat"></span>
              <span>微信支付</span>
             </div></a><?php endif; ?>		 
			 </li>
            <li class="show">
             <div class="right">
              <div class="pay-radio"></div>
             </div>
             <?php if ($this->_tpl_vars['sys_pay_type'] == 0 || $this->_tpl_vars['sys_pay_type'] == 2 || $this->_tpl_vars['sys_pay_type'] == 3): ?>
             <a class="alipay" target="_self" href="/?ct=pay&ac=go&oid=<?php echo $this->_tpl_vars['oid']; ?>
&type=2"><div class="auto">
              <span class="pay-icon alipay"></span>
              <span>支付宝支付</span>
             </div></a><?php endif; ?>
             </li>
            <?php if ($this->_tpl_vars['sys_pay_type'] == 0 || $this->_tpl_vars['sys_pay_type'] == 4): ?>
            <li class="show">
             <div class="right">
              <div class="pay-radio"></div>
             </div>
			 <?php if ($this->_tpl_vars['sys_pay_type'] == 0 || $this->_tpl_vars['sys_pay_type'] == 1 || $this->_tpl_vars['sys_pay_type'] == 3): ?>
             <a class="weixin" target="_self" href="/?ct=pay&ac=pay_go&oid=<?php echo $this->_tpl_vars['oid']; ?>
&type=wxpay">
             <div class="auto">
              <span class="pay-icon wechat"></span>
              <span>微信支付</span>
             </div></a><?php endif; ?>		 
			 </li>
            <li class="show">
             <div class="right">
              <div class="pay-radio"></div>
             </div>
             <?php if ($this->_tpl_vars['sys_pay_type'] == 0 || $this->_tpl_vars['sys_pay_type'] == 2 || $this->_tpl_vars['sys_pay_type'] == 3): ?>
             <a class="alipay" target="_self" href="/?ct=pay&ac=pay_go&oid=<?php echo $this->_tpl_vars['oid']; ?>
&type=alipay"><div class="auto">
              <span class="pay-icon alipay"></span>
              <span>支付宝支付</span>
             </div></a><?php endif; ?>
             </li>
            <?php endif; ?>
           </ul>
           <div class="more-pay">
            点击查看更多支付方式
           </div>
          </div>
         </div>
        </div>
       </div>
       <div class="pay-content">
        <div class="pay-top"></div>
        <div class="pay-middle">
         <div class="content-item">
          <h4>谁需要点灯？</h4>
          <div class="item-detail">
           <p>• 处境不佳，对事有心无力时</p>
           <p>• 心中有强烈愿望，但信心不足时</p>
           <p>• 需要为生命中重要的人祈祷时</p>
           <p>• 关怀他人，奉献爱心时</p>
           <p>• 有美好寄望，增添吉庆喜气时</p>
          </div>
         </div>
         <div class="content-item">
          <h4>点灯的功效</h4>
          <div class="item-detail">
           <p>当灯燃起时，它就长明在你心中，成为你的念力，激发你的潜力、智力以及感召力。只要你发愿向好，许愿灯就会在你心中形成光明磁场，<span>助你心想事成、万事如意、逢凶化吉</span>。当越来越多人共同为一件事情祈祷，愿力会更强，能使灾难远去，天下太平！</p>
          </div>
         </div>
         <div class="content-item">
          <h4>点的灯会供奉在哪？</h4>
          <div class="item-detail">
           <p>点灯后，所有许愿灯将出现在<span>【祈福灯广场】</span>中，与众网友一起增强感应力，受到更多人的祝福。</p>
          </div>
         </div>
        </div>
        <div class="pay-bottom"></div>
       </div>
       <div class="advertising-bottom">
        <img src="/statics/ffsm/xydd/images/advertising.jpg" alt="" />
       </div>
      </div>
     </section>
    </section> 
   </div> 
  </div> 
 <script type="text/javascript">
var intDiff = parseInt(655);//倒计时总秒数量
function timer(intDiff){
    window.setInterval(function(){
    var day=0,
        hour=0,
        minute=0,
        second=0;//时间默认值        
    if(intDiff > 0){
        day = Math.floor(intDiff / (60 * 60 * 24));
        hour = Math.floor(intDiff / (60 * 60)) - (day * 24);
        minute = Math.floor(intDiff / 60) - (day * 24 * 60) - (hour * 60);
        second = Math.floor(intDiff) - (day * 24 * 60 * 60) - (hour * 60 * 60) - (minute * 60);
    }
    if (hour <= 9) hour = '0' + hour;
    if (minute <= 9) minute = '0' + minute;
    if (second <= 9) second = '0' + second;

    $('#hour_show').html(hour+' : '+minute+' : '+second);
    intDiff--;
    }, 1000);
} 

timer(intDiff);
//支付后检测跳转
  <?php if ($this->_tpl_vars['yz_pay'] == 1): ?>
       var inquiry_lock = 0;
    $(function () {
        setInterval(function () {
            inquiry(); 
        }, 1000);
    });
    function inquiry() {
        if (inquiry_lock) {
            return;
        }
        $.get('/?ct=pay&ac=scanquery&oid=<?php echo $this->_tpl_vars['oid']; ?>
', {t: Date.parse(new Date())}, function (data) {
            if (data.status) {
                inquiry = 1;
                $('div.weixin .green').html('支付成功');
                window.location = data.url;
            }
        }, 'json');
    }
  <?php endif; ?>
</script>
 <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => './ffsm/dl_ck.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
</body>
</html>