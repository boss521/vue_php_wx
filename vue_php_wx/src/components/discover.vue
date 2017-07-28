<template>
	<div class="found">
		<ul class="lists">
			<router-link class="circle_of_friends" tag="li" to="/friends">
				<span>
					<img src="../assets/images/discover_02.jpg" alt="">
				</span>
				<em>朋友圈</em>
			</router-link>
			<li class="circle_of_friends">
				<span id="font" class="iconfont">&#xe6d8;</span>
				<em @click="saoyisao">扫一扫</em>
			</li>
			<hr />
			<li class="circle_of_friends">
				<span id="font" class="iconfont">&#xe507;</span>
				<em>摇一摇</em>
			</li>
			<li class="circle_of_friends">
				<span id="font" class="iconfont">&#xe505;</span>
				<em>附近的人</em>
			</li>
			<hr />
			<li class="circle_of_friends">
				<span id="font" class="iconfont">&#xe504;</span>
				<em>漂流瓶</em>
			</li>
			<li class="circle_of_friends">
				<span id="red" class="iconfont">&#xe50c;</span>
				<a href="https://m.jd.com/"><em>购物</em></a>
			</li>
			<hr />
			<li class="circle_of_friends">
				<span>
					<img src="../assets/images/discover_08.jpg" alt="">
				</span>
				<a href="http://app.xiaomi.com/home"><em>应用</em></a>
			</li>
			<li class="circle_of_friends">
				<span id="font" class="iconfont">&#xe601;</span>
				<em>小程序</em>
			</li>
		</ul>
		<div id="arrow"></div>
	</div>
</template>

<script>
	export default {
		name: 'found',
		created: function() {
			document.title = '发现'
		},
		mounted: function() {
			this.$parent.footer = 1;
			this.$parent.inde = 3;
			//调用手机陀螺仪
			/*try {
				var text = "";
				window.addEventListener("deviceorientation", orientationHandler, false);

				function orientationHandler(event) {
					text = ""
					var arrow = document.getElementById("arrow");
					text += "左右旋转：rotate alpha{" + Math.round(event.alpha) + "deg)<p>";
					text += "前后旋转：rotate beta{" + Math.round(event.beta) + "deg)<p>";
					text += "扭转设备：rotate gamma{" + Math.round(event.gamma) + "deg)<p>";
					arrow.innerHTML = text;
				}
			} catch(e) {
				$("#arrow").html(e.message)
			}*/
		},
		methods: {
			saoyisao: function() {
				wx.config({
					debug: true, // 开启调试模式,调用的所有api的返回值会在客户端alert出来，若要查看传入的参数，可以在pc端打开，参数信息会通过log打出，仅在pc端时才会打印。
					appId: 'wxa2eac99c5d1a4a28', // 必填，公众号的唯一标识
					timestamp: '1501212', // 必填，生成签名的时间戳
					nonceStr: 'asdf98as7df97sa9d7f8asdf98', // 必填，生成签名的随机串
					signature: '19d7d5fdab8396696049e0f1475e9f0b2329ac67', // 必填，签名，见附录1
					jsApiList: [
						'chooseImage',
						'getNetworkType',
						'scanQRCode'

					] // 必填，需要使用的JS接口列表，所有JS接口列表见附录2
				});
				wx.ready(function() {
					wx.checkJsApi({
						jsApiList: ['chooseImage'], // 需要检测的JS接口列表，所有JS接口列表见附录2,
						success: function(res) {
							// 以键值对的形式返回，可用的api值true，不可用为false
							alert(res)
						}
					});
//					wx.scanQRCode({
//						needResult: 0, // 默认为0，扫描结果由微信处理，1则直接返回扫描结果，
//						scanType: ["qrCode", "barCode"], // 可以指定扫二维码还是一维码，默认二者都有
//						success: function(res) {
//							var result = res.resultStr; // 当needResult 为 1 时，扫码返回的结果
//						}
//					});
//					wx.chooseImage({
//						count: 1, // 默认9
//						sizeType: ['original', 'compressed'], // 可以指定是原图还是压缩图，默认二者都有
//						sourceType: ['album', 'camera'], // 可以指定来源是相册还是相机，默认二者都有
//						success: function(res) {
//							var localIds = res.localIds; // 返回选定照片的本地ID列表，localId可以作为img标签的src属性显示图片
//							alert(1)
//						}
//					});
//					wx.getNetworkType({
//						success: function(res) {
//							var networkType = res.networkType; // 返回网络类型2g，3g，4g，wifi
//							alert('你现在用的是' + networkType)
//						}
//					});

				});
				wx.error(function(res) {
					console.log(res)
				});
			}
		}
	}
</script>

<style scoped>
	.found {
		background: #EFEFF5;
		padding-bottom: 1.2rem;
	}
	
	#arrow {
		font-size: .2rem;
	}
	
	hr {
		width: 6.1rem;
		float: right;
		border: .05px solid #E5E5E5;
	}
	
	em {
		color: #000000;
		display: block;
		height: 100%;
		width: 83.9%;
		float: left;
		text-align: left;
		box-sizing: border-box;
		padding-right: .4rem;
		background: url(../assets/images/more.jpg)4.9rem center no-repeat;
		background-size: .17rem .28rem;
	}
	
	.lists {
		overflow: hidden;
	}
	
	.circle_of_friends {
		height: 0.86rem;
		width: 100%;
		background: #FFFFFF;
		font-size: 0.3rem;
		line-height: .86rem;
		border-top: 1px solid #E5E5E5;
		/*border-bottom: 1px solid #E5E5E5;*/
	}
	
	.circle_of_friends span {
		display: inline-block;
		height: 100%;
		width: 1.03rem;
		float: left;
	}
	
	.circle_of_friends span img {
		height: 100%;
		width: 100%;
	}
	
	#font,
	#red {
		background: none;
		font-size: 0.45rem;
		text-align: center;
		line-height: .87rem;
		color: #10AEFF;
	}
	
	#red {
		color: #fe5e60;
	}
	
	ul li:nth-of-type(1) {
		border-bottom: 1px solid #E5E5E5;
		margin: 0.3rem 0 .4rem 0;
	}
	
	ul li:nth-of-type(3) {
		margin-bottom: 0.4rem;
		border: 0;
		border-bottom: 1px solid #E5E5E5;
	}
	
	ul li:nth-of-type(5) {
		margin-bottom: 0.4rem;
		border: 0;
	}
	
	ul li:nth-of-type(7) {
		margin-bottom: 0.4rem;
		border: 0;
	}
</style>