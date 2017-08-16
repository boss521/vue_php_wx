<template>
	<div class="me">
		<ul class="lists">
			<li class="circle_of_friends">
				<span class="set_head_box">
					<img id="set_head" :src="data.header" alt="">
				</span>
				<em class="wx_num" @click="reset_head_name">
					<strong>{{data.name}}</strong>
					<i>微信号：{{data.userid}}</i>
				</em>
			</li>
			<li class="circle_of_friends">
				<span id="font" class="iconfont">&#xe619;</span>
				<em>钱包</em>
			</li>
			<li class="circle_of_friends">
				<span id="font" class="iconfont">&#xe616;</span>
				<em>收藏</em>
			</li>
			<hr />
			<li class="circle_of_friends">
				<span id="font" class="iconfont">&#xe509;</span>
				<em>相册</em>
			</li>
			<hr />
			<li class="circle_of_friends">
				<span id="font" class="iconfont">&#xe70a;</span>
				<em>卡包</em>
			</li>
			<hr />
			<li class="circle_of_friends">
				<span id="yellow" class="iconfont">&#xe60c;</span>
				<em>表情</em>
			</li>
			<li class="circle_of_friends">
				<span id="font" class="iconfont">&#xe620;</span>
				<em>设置</em>
			</li>
		</ul>
	</div>
</template>

<script>
	export default {
		name: 'me',
		data() {
			return {
				data: {
					name: '',
					header: '',
					user: ''
				}
			}
		},
		created: function() {
			document.title = '我'
		},
		mounted: function() {
			var that = this;
			var user = this.$cookie.get('user');
			this.user = user;
			this.$parent.footer = 1;
			this.$parent.inde = 4;
			$.ajax({
				type: 'post',
				url: "http://192.168.1.53/dashboard/moniweixin/vue_php_wx/src/actions/me.php",
				dataType: 'text',
				data: {
					"user": that.user
				},
				success: function(data) {
					var d = JSON.parse(data);
					that.data = d;
				},
				error: function() {
					alert('服务器请求失败');
				}
			});
		},
		methods: {
			reset_head_name: function() {
				this.$router.push({
					path: '/set_name_head'
				});
			}
		}
	}
</script>

<style scoped>
	.me {
		background: #EFEFF5;
		padding-bottom: 1.2rem;
	}
	
	.lists {
		height: 100%;
		overflow: hidden;
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
	
	.wx_num {
		width: 71.5%;
		padding: .22rem 0;
		background: url(../assets/images/erwema_03.jpg)3.55rem center no-repeat, url();
		background-size: .71rem .35rem;
	}
	
	strong,
	i {
		display: block;
		height: 50%;
		width: 70%;
		float: left;
	}
	
	i {
		line-height: .55rem;
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
	
	.set_head_box {
		width: 1.82rem!important;
		height: 100%;
	}
	
	#set_head {
		height: 1.28rem;
		width: 1.28rem;
		border: 1px solid #b1b1b1;
		border-radius: .15rem;
		margin: .22rem .25rem .22rem .27rem;
	}
	
	#font,
	#yellow {
		background: none;
		font-size: 0.45rem;
		text-align: center;
		line-height: .87rem;
		color: #10AEFF;
	}
	
	#yellow {
		color: #fbc40f;
	}
	
	ul li:nth-of-type(1) {
		margin: 0.3rem 0 0 0;
		height: 1.75rem;
	}
	
	ul li:nth-of-type(2) {
		border-bottom: 1px solid #E5E5E5;
		margin: 0.4rem 0 .4rem 0;
	}
	
	ul li:nth-of-type(4),
	ul li:nth-of-type(5) {
		border: 0;
	}
	
	ul li:nth-of-type(6) {
		margin-bottom: 0.4rem;
		border: 0;
	}
	
	ul li:nth-of-type(1),
	ul li:nth-of-type(7),
	ul li:nth-of-type(6) {
		border-bottom: 1px solid #E5E5E5;
	}
</style>