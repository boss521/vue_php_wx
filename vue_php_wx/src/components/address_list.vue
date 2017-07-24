<template>
	<div class="address_list">
		<div class="search">
			<input type="text" id="find" value="" placeholder="输入要添加的人"/><label for="" @click="search">搜索</label>
		</div>
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
		created: function() {
			document.title = '通讯录'
		},
		mounted: function() {
			this.$parent.footer = 1;
			this.$parent.inde = 2;
			var that = this;
			var cook=this.$cookie.get('user');
			this.$http.get('http://192.168.1.95/dashboard/moniweixin/vue_php_wx/src/actions/get_address_list.php?cook='+cook).then((response) => {
				var get_data = response.data;
				that.infos = get_data;
			}, (response) => {
				alert("获取数据失败")
			})
		},
		methods:{
			search:function(){
				alert('未找到该用户')
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
	.search{
		height: .8rem;
		width: 80%;
		padding: 0 10%;
		font-size: .23rem;
		color: green;
		position: relative;
		border-bottom: 1px solid #d7d7d7;
		
	}
	#find{
		width: 100%;
		margin: .2rem 0 0 0;
		box-sizing: border-box;
		
	}
	label{
		position: absolute;
		top: .2rem;
		right: 10%;
		width: 1rem;
		text-align: center;
		line-height: .45rem;
	}
</style>