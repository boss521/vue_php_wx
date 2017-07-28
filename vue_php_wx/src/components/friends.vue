<template>
	<div class="friends">
		<div class="wall">
			<span>{{self_info.name}}</span>
			<div class="your_head">
				<img :src="self_info.header" alt="">
			</div>
			<router-link class="camare" to="/send_character">去发动态</router-link>
		</div>
		<ul class="actives" v-for="active in actives">
			<li class="friends_actives">
				<div class="mini">
					<img :src="active.header" alt="">
				</div>
				<div class="name">{{active.name}}</div>
				<div class="content">{{active.contents}}</div>
				<address class="addr" v-if="active.address">{{active.address}}</address>
				<address>{{active.send_time}}</address>
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
					header: 'http://192.168.1.100/dashboard/moniweixin/vue_php_wx/src/assets/images/touxiang.jpg',
					user: '',
					name: ''
				},
				actives: [{}]
			}
		},
		created: function() {
			document.title = '朋友圈'
		},
		computed: {
			has_address: function() {
				//				if(active.address == '所在位置') {
				return 1;
				//				}
			}
		},
		mounted: function() {
			this.$parent.footer = 0;
			var that = this;
			this.self_info.user = this.$cookie.get('user');
			this.$http.get('http://192.168.1.100/dashboard/moniweixin/vue_php_wx/src/actions/get_friend_actives.php?user=' + that.self_info.user).then((response) => {
				var get_data = response.data;
				that.self_info.name = get_data[0];
				that.self_info.header = get_data[1];
				var new_arr = get_data.slice(2);
				that.actives = new_arr;
			}, (response) => {
				alert("获取数据失败");
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
		background-size: 100% 100%;
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
		height: .3rem;
		line-height: .3rem;
		text-align: left;
		width: 83%;
		float: right;
		font-size: .2rem;
		overflow: hidden;
		text-overflow: ellipsis;
		white-space: nowrap;
		font-style: normal;
		box-sizing: border-box;
	}
	
	.addr {
		font-size: .15rem;
		color: #55A532;
		background: url(../assets/images/address_green.png)left center no-repeat;
		background-size: .15rem 65%;
		padding-left: .2rem;
		line-height: .35rem;
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