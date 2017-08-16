<?php
//获取ticket
$url = 'https://api.weixin.qq.com/cgi-bin/ticket/getticket?access_token=pI0vqf74m-fwh5C40gvtWDMs9zwfn6tjRZ8kGHxPpECLAY29hF9LUaWt1w4vXh9BqoPIrPhHvbvt6yDvDL9-Kkxdo4kfrN0QN8u5Ev_taCms72u-elpwqWC9RFIX6BDgMKKdADARPP&type=jsapi';
$html = file_get_contents($url);
echo $html;
?>