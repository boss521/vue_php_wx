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
				<em>购物</em>
			</li>
			<hr />
			<li class="circle_of_friends">
				<span>
					<img src="../assets/images/discover_08.jpg" alt="">
				</span>
				<em>游戏</em>
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
//			调用手机陀螺仪
			try {
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
			}
		},
		methods: {
			saoyisao: function() {
				wx.scanQRCode({
					needResult: 1,
					desc: 'scanQRCode desc',
					success: function(res) {
						alert(JSON.stringify(res));
					}
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
	#arrow{
		font-size: .2rem;
	}
	hr {
		width: 6.1rem;
		float: right;
		border: .05px solid #E5E5E5;
	}
	
	em {
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