<template>
	<div id="app">
		<footer v-if="footer==1">
			<ul class="menus_box">
				<li class="to_wx" :class="{green_font:inde==1}" @click="tab_inde(1,'/Hello')">
					<span class="iconfont" v-if="inde==1">&#xe62c;</span>
					<span class="iconfont" v-else>&#xe5ad;</span>
					<i>微信</i>
				</li>
				<li class="to_address_list" :class="{green_font:inde==2}" @click="tab_inde(2,'/address_list')">
					<span class="iconfont" v-if="inde==2">&#xe633;</span>
					<span class="iconfont" v-else>&#xe501;</span>
					<i>通讯录</i>
				</li>
				<li class="to_discover" :class="{green_font:inde==3}" @click="tab_inde(3,'/discover')">
					<span class="iconfont" v-if="inde==3">&#xe502;</span>
					<span class="iconfont" v-else>&#xe503;</span>
					<i>发现</i>
				</li>
				<li class="to_about_me" :class="{green_font:inde==4}" @click="tab_inde(4,'/me')">
					<span class="iconfont" v-if="inde==4">&#xe605;</span>
					<span class="iconfont" v-else>&#xe604;</span>
					<i>我</i>
				</li>
			</ul>
		</footer>
		<router-view></router-view>
	</div>
</template>

<script>
	export default {
		name: 'app',
		data() {
			return {
				inde: 1,
				footer: 0
			}
		},
		created: function() {
			//rem布局
			function init() {
				(function(doc, win) {
					var docEl = doc.documentElement,
						resizeEvt = 'orientationchange' in window ? 'orientationchange' : 'resize',
						recalc = function() {
							var clientWidth = docEl.clientWidth;
							if(!clientWidth) return;
							docEl.style.fontSize = clientWidth / 6.4 + 'px';
						};
					if(!doc.addEventListener) return;
					win.addEventListener(resizeEvt, recalc, false);
					doc.addEventListener('DOMContentLoaded', recalc, false);
				})(document, window);
			}

			function calcViewPort() {
				var dpr = 1 / window.devicePixelRatio;
				document.getElementById("vp").content = 'initial-scale=' + dpr + ',width=device-width, maximum-scale=' + dpr + ', user-scalable=yes';
			}
			calcViewPort();
			init();
			window.addEventListener("orientationchange", function(e) {
				setTimeout(init, 0);
			}, false);
			//重置alert
			window.alert = function(name) {
				var iframe = document.createElement("IFRAME");
				iframe.style.display = "none";
				iframe.setAttribute("src", 'data:text/plain,');
				document.documentElement.appendChild(iframe);
				window.frames[0].window.alert(name);
				iframe.parentNode.removeChild(iframe);
			}
			//检测横竖屏
			window.addEventListener('orientationchange', function(event) {
				if(window.orientation == 180 || window.orientation == 0) {
					//alert("竖屏");
				}
				if(window.orientation == 90 || window.orientation == -90) {
					//alert("请您竖屏浏览");
				}
			});
			var the_url = location.href.split('#')[0];
			console.log(the_url);
			$.ajax({
				type: "post",
				url: "http://192.168.1.71/dashboard/weixinApp/vue_php_wx/src/actions/ticket.php",
				async: true,
				data: {
					"url": the_url
				},
				success: function(response) {
					var data = JSON.parse(response);
					//					console.log(data);
					wx.config({
						debug: false, // 开启调试模式,调用的所有api的返回值会在客户端alert出来，若要查看传入的参数，可以在pc端打开，参数信息会通过log打出，仅在pc端时才会打印。
						appId: data.appId, // 必填，公众号的唯一标识
						timestamp: data.timestamp, // 必填，生成签名的时间戳
						nonceStr: data.noncestr, // 必填，生成签名的随机串
						signature: data.signature, // 必填，签名，见附录1
						jsApiList: [
							'onMenuShareTimeline',
							'onMenuShareAppMessage',
							'onMenuShareQQ',
							'onMenuShareWeibo',
							'onMenuShareQZone',
							'startRecord',
							'stopRecord',
							'onVoiceRecordEnd',
							'playVoice',
							'pauseVoice',
							'stopVoice',
							'onVoicePlayEnd',
							'uploadVoice',
							'downloadVoice',
							'chooseImage',
							'previewImage',
							'uploadImage',
							'downloadImage',
							'translateVoice',
							'getNetworkType',
							'openLocation',
							'getLocation',
							'hideOptionMenu',
							'showOptionMenu',
							'hideMenuItems',
							'showMenuItems',
							'hideAllNonBaseMenuItem',
							'showAllNonBaseMenuItem',
							'closeWindow',
							'scanQRCode',
							'chooseWXPay',
							'openProductSpecificView',
							'addCard',
							'chooseCard',
							'openCard'

						] // 必填，需要使用的JS接口列表，所有JS接口列表见附录2
					});
					wx.error(function(res) {
						console.log(res)
					});
				}
			});
		},
		methods: {
			tab_inde: function(n, router_to) {
				var that = this;
				this.inde = n;
				this.$router.push(router_to);
			}
		}
	}
</script>

<style>
	@import url("../static/fonts/iconfont.css");
	html,
	body,
	ul,
	span,
	i,
	p,
	hr {
		margin: 0;
		padding: 0;
		font-family: "宋体";
	}
	
	* {
		-webkit-tap-highlight-color: rgba(0, 0, 0, 0);
	}
	
	i,
	em,
	b,
	strong {
		font-style: normal;
	}
	
	li {
		list-style: none;
	}
	
	html,
	body {
		height: 100%;
		width: 100%;
	}
	
	#app {
		font-family: 'Avenir', Helvetica, Arial, sans-serif;
		-webkit-font-smoothing: antialiased;
		-moz-osx-font-smoothing: grayscale;
		text-align: center;
		color: #2c3e50;
		height: 100%;
	}
	
	footer {
		height: 1rem;
		width: 100%;
		position: fixed;
		bottom: 0;
		left: 0;
		box-sizing: border-box;
		border-top: 1px solid #a9a8ae;
		background: #ffffff;
		z-index: 9999;
	}
	
	.menus_box {
		height: 100%;
		width: 100%;
	}
	
	.to_wx,
	.to_address_list,
	.to_discover,
	.to_about_me {
		width: 25%;
		float: left;
		list-style: none;
	}
	
	.to_wx span,
	.to_address_list span,
	.to_discover span,
	.to_about_me span {
		display: block;
		height: .5rem;
		width: .5rem;
		line-height: .43rem;
		font-size: .5rem;
		text-align: center;
		margin: .15rem auto;
		margin-bottom: 0rem;
	}
	
	.to_wx i,
	.to_address_list i,
	.to_discover i,
	.to_about_me i {
		display: block;
		font-size: .2rem;
	}
	
	.green_font {
		color: #1dab17;
	}
</style>