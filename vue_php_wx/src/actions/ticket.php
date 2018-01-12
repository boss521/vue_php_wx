<?php
@include ('connect_sql.php');
//获取ticket
function get_access_token() {
	$appId = "wx0f4243deb848e429";
	$noncestr = 'asdf98as7df97sa9d7f8asdf98';
	$time = microtime(true) / 1000;
	$timestamp = floor($time);
	//这个url一定要动态获取才行
	$url = $_POST['url'];
	//获取access_token
	$get_access_token = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=wx0f4243deb848e429&secret=f068c3d3a58c0233974361c1f950056f";
	$result = file_get_contents($get_access_token);
	$access_token =   json_decode($result) -> access_token;
	//通过获取的access_token得到ticket
	$get_ticket = 'https://api.weixin.qq.com/cgi-bin/ticket/getticket?access_token=' . $access_token . '&type=jsapi';
	$ticket = file_get_contents($get_ticket);
	$jsapi_ticket =    json_decode($ticket) -> ticket;
	//拼接字符串，进行sha1()加密；
	$total = 'jsapi_ticket=' . $jsapi_ticket . '&noncestr=' . $noncestr . '&timestamp=' . $timestamp . '&url=' . $url;
	$signature = sha1($total);
	$response = array('signature' => $signature, 'noncestr' => $noncestr, 'timestamp' => $timestamp, 'appId' => $appId, 'ticket' => $jsapi_ticket);
	//返回给前端
	echo json_encode($response);
}

get_access_token();
?>