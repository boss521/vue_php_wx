<template>
	<div class="friends">
		<div class="wall">
			<span>{{self_info.self_name}}</span>
			<div class="your_head">
				<img :src="self_info.self_head" alt="">
			</div>
			<router-link class="camare" to="/send_character">去发动态</router-link>
		</div>
		<ul class="actives" v-for="active in actives">
			<li class="friends_actives">
				<div class="mini">
					<img :src="active.pyq_img_url" alt="">
				</div>
				<div class="name">{{active.name}}</div>
				<div class="content">{{active.contents}}</div>
				<address>{{active.it_time}}</address>
			</li>
		</ul>
	</div>
</template>

<script>
	export default {
		name: 'friends',
		data() {
			return {
				self_info: {
					self_head: require('../assets/images/touxiang.jpg'),
					self_name: 'Zone'
				},
				actives: [{
					name: '贾玲',
					pyq_img_url: require('../assets/images/3.jpg'),
					contents: "我是搞笑达人--->贾玲",
					it_time: '2017/02/02 12:12:20'

				}, {
					name: '巩俐',
					pyq_img_url: require('../assets/images/head2.jpg'),
					contents: "我是国际巨星 巩俐",
					it_time: '2017/02/02 12:12:20'

				}, {
					name: '温馨',
					pyq_img_url: require('../assets/images/head4.jpg'),
					contents: "我是大美女",
					it_time: '2017/02/02 12:12:20'

				}, {
					name: '王老五',
					pyq_img_url: require('../assets/images/head5.jpg'),
					contents: "我是钻石王老五",
					it_time: '2017/02/02 12:12:20'

				}, {
					name: '周杰伦',
					pyq_img_url: require('../assets/images/head6.jpg'),
					contents: "我是周杰伦，谢谢",
					it_time: '2017/02/02 12:12:20'

				}]
			}
		},
		mounted: function() {
			//this.$parent.footer=0
			this.$http.get('http://192.168.1.95/dashboard/sunyuan/actions/get_friend_actives.php').then((response) => {
				console.log(response.data)
			}, (response) => {
				alert("获取数据失败")
			})
		}
	}
</script>

<style scoped>
	.friends {
		padding-bottom: 1.2rem;
	}
	
	.wall {
		height: 5.2rem;
		width: 6.4rem;
		background: url(../assets/images/wall.jpg)center no-repeat;
		position: relative;
		margin-bottom: 1.2rem;
	}
	
	.camare {
		position: fixed;
		top: 0.4rem;
		font-size: .2rem;
		padding: .1rem;
		transform: scale(.8);
		right: 0.1rem;
		color: #ffffff;
		border: 1px solid yellow;
		border-radius: 50%;
	}
	
	.wall span {
		display: block;
		font-size: .3rem;
		position: absolute;
		right: 2rem;
		bottom: .28rem;
		font-weight: 800;
		color: aliceblue;
	}
	
	.your_head {
		height: 1.49rem;
		width: 1.49rem;
		border: 1px solid #cdcdcd;
		position: absolute;
		top: 4.08rem;
		right: .2rem;
	}
	
	.your_head img {
		height: 1.49rem;
		width: 1.49rem;
		border: 0;
	}
	
	address {
		height: .5rem;
		line-height: .5rem;
		text-align: left;
		width: 82%;
		float: right;
		font-size: .2rem;
	}
	
	.head_friends {
		height: 1.5rem;
		width: 1.5rem;
		position: absolute;
		right: .2rem;
		bottom: -.48rem;
	}
	
	.head_friends img {
		float: left;
		height: 1.5rem;
		width: 1.5rem;
		display: block;
	}
	
	.head_friends {
		position: fixed;
		top: 3rem;
		left: 20%;
		height: 2rem;
		width: 4rem;
		background: red;
		display: none;
	}
	
	.actives {
		width: 6.4rem;
		font-family: "楷体";
	}
	
	.friends_actives {
		width: 6.4rem;
		overflow: hidden;
		border-bottom: 0.01rem solid #dfdfdf;
		margin: .3rem 0;
	}
	
	.mini {
		min-height: 1.5rem;
		float: left;
	}
	
	.mini img {
		height: .8rem;
		width: .8rem;
		margin-left: .2rem;
	}
	
	.name {
		width: 80%;
		float: left;
		font-size: .27rem;
		font-weight: 500;
		font-family: "黑体";
		color: #596484;
		text-align: left;
		padding-left: .1rem;
	}
	
	.friends_actives .content {
		width: 80%;
		margin: .2rem .1rem;
		font-size: .25rem;
		text-align: left;
		font-family: "楷体";
		float: left;
	}
</style>