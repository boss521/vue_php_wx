<?php
@include ('connect_sql.php');
//获取ticket
function get_access_token() {
	$appid = "wx0f4243deb848e429";
	$noncestr = 'asdf98as7df97sa9d7f8asdf98';
	$time = microtime(true) / 1000;
	$timestamp = floor($time);
	//获取access_token
	$get_access_token = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=wx0f4243deb848e429&secret=f068c3d3a58c0233974361c1f950056f";
	$result = file_get_contents($get_access_token);
	$access_token =         json_decode($result) -> access_token;
	//通过获取的access_token得到ticket
	$get_ticket = 'https://api.weixin.qq.com/cgi-bin/ticket/getticket?access_token=' . $access_token . '&type=jsapi';
	$ticket = file_get_contents($get_ticket);
	$url = 'http://192.168.1.71/dashboard/weixinApp/vue_php_wx/src/actions/ticket.php';
	$total = 'jsapi_ticket=' . $ticket . '&noncestr=' . $noncestr . '&timestamp=' . $timestamp . '&url=' . $url;
	$signature = sha1($total);
	$response = array('signature' => $signature, 'noncestr' => $noncestr, 'timestamp' => $timestamp, 'appId' => $appid);

	echo json_encode($response);
}

get_access_token();
?>