<template>
	<div class="address_list">
		<ul class="nearlist" v-for="info in infos">
			<li class="list">
				<img class="head" :src="info.img_url" />
				<div class="name_summary">{{info.name}}</div>
			</li>
		</ul>
	</div>

</template>

<script>
	export default {
		name: "address_list",
		data() {
			return {
				msg: 'Welcome to Your Vue.js App',
				infos: [{
					img_url: require("../assets/images/head2.jpg"),
					name: '郑成功',
				}, {
					img_url: require("../assets/images/head1.jpg"),
					name: '潘志豪',
				}, {
					img_url: require("../assets/images/head6.jpg"),
					name: '刘德华',
				}, {
					img_url: require("../assets/images/head4.jpg"),
					name: '章子怡',
				}, {
					img_url: require("../assets/images/head5.jpg"),
					name: '李连杰',
				}, {
					img_url: require("../assets/images/head3.jpg"),
					name: '玛丽莲梦露',
				}, {
					img_url: require("../assets/images/head1.jpg"),
					name: '费玉清',
				}, {
					img_url: require("../assets/images/head4.jpg"),
					name: '周杰伦',
				}]
			}
		}
	}
</script>

<style scoped>
	.address_list {
		width: 100%;
		background: #ffffff;
		padding-bottom: 1.2rem!important;
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
		font-size: .3rem;
		line-height: .9rem;
		text-align: left;
	}
</style>