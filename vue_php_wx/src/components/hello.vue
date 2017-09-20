<template>
	<div class="hello">
		<ul class="nearlist">
			<li class="list" v-for="info in infos">
				<img class="head" :src="info.img_url" />
				<div class="name_summary">
					<p class="name">{{info.name}}</p>
					<p class="summary">{{info.summary}}</p>
				</div>
				<div class="receipt_time">{{info.receipt_time}}</div>
			</li>
		</ul>
	</div>
</template>

<script>
	export default {
		name: 'hello',
		data() {
			return {
				msg: 'Welcome to Your Vue.js App',
				infos: [{
					img_url: require("../assets/images/head2.jpg"),
					name: '郑成功',
					summary: '我是郑成功',
					receipt_time: '2017/02/09'
				}, {
					img_url: require("../assets/images/head1.jpg"),
					name: '潘志豪',
					summary: '我是潘志豪',
					receipt_time: '2017/02/10'
				}, {
					img_url: require("../assets/images/head6.jpg"),
					name: '刘德华',
					summary: '我是刘德华啊',
					receipt_time: '2017/02/24'
				}, {
					img_url: require("../assets/images/head4.jpg"),
					name: '章子怡',
					summary: '我是章子怡',
					receipt_time: '2017/03/03'
				}, {
					img_url: require("../assets/images/head5.jpg"),
					name: '李连杰',
					summary: '我是jet',
					receipt_time: '2017/03/23'
				}, {
					img_url: require("../assets/images/head3.jpg"),
					name: '玛丽莲梦露',
					summary: '我是嘿嘿嘿',
					receipt_time: '2017/04/11'
				}, {
					img_url: require("../assets/images/head1.jpg"),
					name: '费玉清',
					summary: '我是段子手',
					receipt_time: '2017/04/11'
				}, {
					img_url: require("../assets/images/head4.jpg"),
					name: '周杰伦',
					summary: '我是杰伦',
					receipt_time: '2017/05/03'
				}]
			}
		},
		created: function() {
			document.title = '聊天'
		},
		mounted: function() {
			this.$parent.footer = 1;
			this.$parent.inde = 1;
			alert('暂未开通聊天功能，敬请期待。。')
		}
	}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
	.hello,
	.nearlist {
		width: 100%;
		background: #ffffff;
	}
	
	.hello {
		padding-bottom: 1.2rem;
	}
	
	.nearlist .list {
		height: 1.3rem;
		width: 96.875%;
		border-bottom: 1px solid #d7d7d7;
		margin-left: 3.125%;
	}
	
	.head {
		height: .9rem;
		width: .9rem;
		float: left;
		margin: .2rem .2rem .2rem 0;
	}
	
	.name_summary {
		float: left;
		height: .9rem;
		width: 57%;
		margin: .2rem auto;
	}
	
	.name,
	.summary {
		height: 50%;
		width: 100%;
		font-size: .26rem;
		text-align: left;
	}
	
	.name {
		font-weight: 600;
	}
	
	.summary {
		width: 133%;
		color: #9c9c9c;
		overflow: hidden;
		white-space: nowrap;
		text-overflow: ellipsis;
	}
	
	.receipt_time {
		height: 100%;
		width: 20%;
		font-size: .23rem;
		float: left;
		line-height: .7rem;
	}
</style>