<template>
	<div class="address_list">
		<ul class="nearlist" v-for="info in infos">
			<li class="list">
				<img class="head" :src="info.header" />
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
				infos: []
			}
		},
		mounted: function() {
			this.$parent.footer=0
			var that = this;
			this.$http.get('http://192.168.1.100/dashboard/moniweixin/vue_php_wx/src/actions/get_address_list.php').then((response) => {
				var get_data = response.data;
				that.infos = get_data;
			}, (response) => {
				alert("获取数据失败")
			})
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