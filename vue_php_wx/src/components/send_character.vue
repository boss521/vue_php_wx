<template>
	<div class="send_character" id="allmap">
		<textarea class="contents" v-model="contents" placeholder="输入想说的话。。"></textarea>
		<hr />
		<li class="circle_of_friends">
			<span class="addr"></span>
			<em @click="address">所在位置</em>
		</li>
		<li class="circle_of_friends">
			<span class="earth"></span>
			<em>谁可以看</em>
		</li>
		<hr />
		<li class="circle_of_friends">
			<span class="at"></span>
			<em>提醒谁看</em>
		</li>
		<button @click="send_out">发表</button>
	</div>
</template>

<script>
	export default {
		name: 'send_character',
		data() {
			return {
				contents: "",
				user: ''
			}
		},
		created() {
			document.title = '发动态'
		},
		methods: {
			send_out: function() {
				var that = this;
				this.user = this.$cookie.get('user');
				if(this.contents == '' || this.contents == null) {
					alert('不能发送空内容')
				} else {
					this.$http.get('http://192.168.1.95/dashboard/moniweixin/vue_php_wx/src/actions/send_character.php?contents=' + that.contents + '&user=' + that.user).then((response) => {
						that.contents = '';
						console.log(response.data);
						that.$router.push('/friends');
					}, (response) => {
						alert('服务器请求失败');
					});
				}
			},
			address: function() {
				// 百度地图API功能
				var map = new BMap.Map("allmap"); // 创建Map实例
				map.centerAndZoom(new BMap.Point(120.19, 30.26), 11); // 初始化地图,设置中心点坐标和地图级别
				map.addControl(new BMap.MapTypeControl()); //添加地图类型控件
				map.setCurrentCity("杭州"); // 设置地图显示的城市 此项是必须设置的
				map.enableScrollWheelZoom(true); //开启鼠标滚轮缩放
			}
		}
	}
</script>

<style>
	.send_character {
		padding-bottom: 1.2rem;
	}
	#allmap{
		height: 100%;
	}
	.contents {
		display: block;
		height: 3rem;
		width: 100%;
		border: 0;
		padding: .2rem;
		box-sizing: border-box;
		resize: none;
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
	
	hr {
		width: 6.1rem;
		float: right;
		border: .05px solid #E5E5E5;
	}
	
	.circle_of_friends {
		height: 0.86rem;
		width: 100%;
		background: #FFFFFF;
		font-size: 0.3rem;
		line-height: .86rem;
		border-bottom: 1px solid #E5E5E5;
	}
	
	.circle_of_friends:nth-of-type(2) {
		border: 0;
	}
	
	.circle_of_friends span {
		display: inline-block;
		height: 100%;
		width: 1.03rem;
		float: left;
	}
	
	.addr {
		background: url(../assets/images/address.jpg)center no-repeat;
		background-size: .33rem .35rem;
	}
	
	.earth {
		background: url(../assets/images/earth.jpg)center no-repeat;
		background-size: .33rem .35rem;
	}
	
	.at {
		background: url(../assets/images/at.jpg)center no-repeat;
		background-size: .33rem .35rem;
	}
	
	#font {
		background: none;
		font-size: 0.45rem;
		text-align: center;
		line-height: .87rem;
		color: #10AEFF;
	}
</style>