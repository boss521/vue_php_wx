$().ready(
	function() {
		var host = 'http://' + window.location.host,
			url = host + '=' + encodeURIComponent(window.location.href), //签名地址
			shareUrl = "", //分享链接
			title = "", //分享标题
			desc = "", //分享描述
			imgUrl = ""; //分享图片
		$.post(
			url,
			function(msg) {
				msg = JSON.parse(msg);
				wx.config({
					debug: false, // 开启调试模式,调用的所有api的返回值会在客户端alert出来，若要查看传入的参数，可以在pc端打开，参数信息会通过log打出，仅在pc端时才会打印。
					appId: msg.appid, // 必填，公众号的唯一标识
					timestamp: msg.timestamp, // 必填，生成签名的时间戳
					nonceStr: msg.nonceStr, // 必填，生成签名的随机串
					signature: msg.signature, // 必填，签名，见附录1
					jsApiList: [
						'checkJsApi',
						'onMenuShareTimeline',
						'onMenuShareAppMessage',
						'onMenuShareQQ',
						'onMenuShareWeibo',
						'onMenuShareQZone',
						'hideMenuItems',
						'showMenuItems',
						'hideAllNonBaseMenuItem',
						'showAllNonBaseMenuItem',
						'translateVoice',
						'startRecord',
						'stopRecord',
						'onVoiceRecordEnd',
						'playVoice',
						'onVoicePlayEnd',
						'pauseVoice',
						'stopVoice',
						'uploadVoice',
						'downloadVoice',
						'chooseImage',
						'previewImage',
						'uploadImage',
						'downloadImage',
						'getNetworkType',
						'openLocation',
						'getLocation',
						'hideOptionMenu',
						'showOptionMenu',
						'closeWindow',
						'scanQRCode',
						'chooseWXPay',
						'openProductSpecificView',
						'addCard',
						'chooseCard',
						'openCard'
					] // 必填，需要使用的JS接口列表，所有JS接口列表见附录2
				});

				wx.ready(function() {
					wx.hideMenuItems({
						menuList: ['menuItem:copyUrl']
						// 要隐藏的菜单项，只能隐藏“传播类”和“保护类”按钮，所有menu项见附录3
					});
					wx.onMenuShareTimeline({
						title: desc, // 朋友圈就一个标题，用desc更吸引人
						imgUrl: imgUrl, // 分享图标
						link: shareUrl, // 分享链接
						success: function() {
							// 用户确认分享后执行的回调函数
							$.post("share");
						},
						cancel: function() {
							// 用户取消分享后执行的回调函数
						}
					});
					wx.onMenuShareAppMessage({
						title: title, // 分享标题
						desc: desc, // 分享描述
						imgUrl: imgUrl, // 分享图标
						link: shareUrl, // 分享链接
						type: '', // 分享类型,music、video或link，不填默认为link
						dataUrl: '', // 如果type是music或video，则要提供数据链接，默认为空
						success: function() {
							// 用户确认分享后执行的回调函数
							$.post("share");
						},
						cancel: function() {
							// 用户取消分享后执行的回调函数
						}
					});
				});

			});
	}
);