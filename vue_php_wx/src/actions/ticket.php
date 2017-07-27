<?php
$noncestr='asdf98as7df97sa9d7f8asdf98';
$timestamp=microtime(true)*10000;
$jsapi_ticket='kgt8ON7yVITDhtdwci0qeQ7giKXhZk5yQ_llJ4KK25lSJEwV_zqumigmB53rp4X2x_9sbvp01J0GMDC4_c7laA';
$url='http://mp.weixin.qq.com?params=value';
$total=$jsapi_ticket.$noncestr.$timestamp.$url;
echo sha1($total);
?>