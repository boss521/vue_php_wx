<?php
$url = 'https://api.weixin.qq.com/cgi-bin/ticket/getticket?access_token=fj7IDGZ4eape4lf9SCdVSBimsINIx9MRmFmY99VTT1S8GD87dTfQt6f6hJ5jYEp2U45gN02Ybg_xbRF-B59jxHqv6Mhs1kRGJZr5suK3KHeQ-dQ2A1_nnB2qjtsD3U7xJDZgADAAUQ&type=jsapi';
$html = file_get_contents($url);
echo $html;
?>