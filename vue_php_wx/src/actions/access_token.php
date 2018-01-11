<?php
//获取ticket
$url = 'https://api.weixin.qq.com/cgi-bin/ticket/getticket?access_token=5_8xxT8znjKL3sVFVQXnVUORbKC5psqWyQYBYTlB-dZm37midf5-5GMbqGDPfeId9OIb5hrMJHUjCaBOaAK9nHLFpLcehcCx1MeFPEmFjitSrn94lB-467ntVSbbXLRX-9aRB9RpbZ7WkjjU0yWUScAAARPN&type=jsapi';
$html = file_get_contents($url);
echo $html;
?>