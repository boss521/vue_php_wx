<?php
$noncestr = 'asdf98as7df97sa9d7f8asdf98';
$time = microtime(true) / 1000;
$timestamp = floor($time);
$jsapi_ticket = 'kgt8ON7yVITDhtdwci0qeQ7giKXhZk5yQ_llJ4KK25nQ4f7u2bd4nU38OHr4HAywOCk0OaOh1Re6KwtCxXt1rQ';
$url = 'http://mp.weixin.qq.com?params=http://192.168.1.71';
$total = 'jsapi_ticket=' . $jsapi_ticket . '&noncestr=' . $noncestr . '&timestamp=' . $timestamp . '&url=' . $url;
echo $timestamp . '-';
echo sha1($total);
?>