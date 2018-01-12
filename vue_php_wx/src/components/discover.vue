<template>
	<div class="found">
		<ul class="lists">
			<router-link class="circle_of_friends" tag="li" to="/friends">
				<span>
					<img src="../assets/images/discover_02.jpg" alt="">
				</span>
				<em>朋友圈</em>
			</router-link>
			<li class="circle_of_friends" @click="saoyisao">
				<span id="font" class="iconfont">&#xe6d8;</span>
				<em>扫一扫</em>
			</li>
			<hr />
			<li class="circle_of_friends" @click="yaoyiyao">
				<span id="font" class="iconfont">&#xe507;</span>
				<em>摇一摇</em>
			</li>
			<li class="circle_of_friends" @click="near_person">
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
			<li class="circle_of_friends" @click="xiaochengxu">
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
			//			try {
			//				var text = "";
			//				window.addEventListener("deviceorientation", orientationHandler, false);
			//
			//				function orientationHandler(event) {
			//					text = ""
			//					var arrow = document.getElementById("arrow");
			//					text += "左右旋转：rotate alpha{" + Math.round(event.alpha) + "deg)<p>";
			//					text += "前后旋转：rotate beta{" + Math.round(event.beta) + "deg)<p>";
			//					text += "扭转设备：rotate gamma{" + Math.round(event.gamma) + "deg)<p>";
			//					arrow.innerHTML = text;
			//				}
			//			} catch(e) {
			//				$("#arrow").html(e.message)
			//			}
		},
		methods: {
			saoyisao: function() {
				wx.scanQRCode({
					desc: 'scanQRCode desc',
					needResult: 0, // 默认为0，扫描结果由微信处理，1则直接返回扫描结果，
					scanType: ["qrCode", "barCode"], // 可以指定扫二维码还是一维码，默认二者都有
					success: function(res) {
						// 回调
					},
					error: function(res) {
						if(res.errMsg.indexOf('function_not_exist') > 0) {
							alert('版本过低请升级')
						}
					}
				});
			},
			yaoyiyao: function() {
				wx.scanQRCode({
					desc: 'scanQRCode desc',
					needResult: 0, // 默认为0，扫描结果由微信处理，1则直接返回扫描结果，
					scanType: ["qrCode", "barCode"], // 可以指定扫二维码还是一维码，默认二者都有
					success: function(res) {
						// 回调
					},
					error: function(res) {
						if(res.errMsg.indexOf('function_not_exist') > 0) {
							alert('版本过低请升级')
						}
					}
				});

			},
			xiaochengxu: function() {
				location.href = "http://s0.erdianzhang.com/room.html?key=aEJboFzGT4JRQ5qBAgzuzw==&ver=328";
			},
			near_person: function() {
				wx.openLocation({
					latitude: 0, // 纬度，浮点数，范围为90 ~ -90
					longitude: 0, // 经度，浮点数，范围为180 ~ -180。
					name: '', // 位置名
					address: '', // 地址详情说明
					scale: 1, // 地图缩放级别,整形值,范围从1~28。默认为最大
					infoUrl: '' // 在查看位置界面底部显示的超链接,可点击跳转
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
		border: 1px solid #E5E5E5;
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