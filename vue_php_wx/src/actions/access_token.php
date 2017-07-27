<?php
$url = 'https://api.weixin.qq.com/cgi-bin/ticket/getticket?access_token=9tZ6_MAmA2l5wYZYfpIsS0nUoE0r7XlipJ6e1qfyJJo2Qgm6QNtipq9Lbqd5x8kAWi7qEsaNt__cBFqSXlB8-G6hyiNJgLUaLMfn_ekOqYlcKvTE9YTLccB0BeHyd-C1IHHeAAASRR&type=jsapi';
$html = file_get_contents($url);
echo $html;
?>