<template>
	<div id="app">
		<!--<img src="./assets/logo.png">-->
		<footer v-if="footer==1">
			<ul class="menus_box">
				<li class="to_wx" :class="{green_font:inde==1}" @click="tab_inde(1,'/')">
					<span class="iconfont" v-if="inde==1">&#xe62c;</span>
					<span class="iconfont" v-else>&#xe5ad;</span>
					<i>微信</i>
				</li>
				<li class="to_address_list" :class="{green_font:inde==2}" @click="tab_inde(2,'/address_list')">
					<span class="iconfont" v-if="inde==2">&#xe633;</span>
					<span class="iconfont" v-else>&#xe501;</span>
					<i>通讯录</i>
				</li>
				<li class="to_discover" :class="{green_font:inde==3}" @click="tab_inde(3,'/discover')">
					<span class="iconfont" v-if="inde==3">&#xe502;</span>
					<span class="iconfont" v-else>&#xe503;</span>
					<i>发现</i>
				</li>
				<li class="to_about_me" :class="{green_font:inde==4}" @click="tab_inde(4,'/me')">
					<span class="iconfont" v-if="inde==4">&#xe605;</span>
					<span class="iconfont" v-else>&#xe604;</span>
					<i>我</i>
				</li>
			</ul>
		</footer>
		<router-view></router-view>
	</div>
</template>

<script>
	export default {
		name: 'app',
		data() {
			return {
				inde: 1,
				footer:0
			}
		},
		methods: {
			tab_inde: function(n,router_to) {
				this.inde = n;
				this.$router.push(router_to);
			}
		}
	}
</script>

<style>
	@import url("../static/fonts/iconfont.css");
	html,
	body,
	ul,
	span,
	i,p,hr {
		margin: 0;
		padding: 0;	
		font-family: "宋体";
	}
	
	i,
	em,
	b,
	strong {
		font-style: normal;
	}
	li{
		list-style: none;
	}
	html,
	body {
		height: 100%;
		width: 100%;
	}
	
	#app {
		font-family: 'Avenir', Helvetica, Arial, sans-serif;
		-webkit-font-smoothing: antialiased;
		-moz-osx-font-smoothing: grayscale;
		text-align: center;
		color: #2c3e50;
		height: 100%;
	}
	
	footer {
		height: 1rem;
		width: 100%;
		position: fixed;
		bottom: 0;
		left: 0;
		box-sizing: border-box;
		border-top: 1px solid #a9a8ae;
		background: #ffffff;
		z-index: 9999;
	}
	
	.menus_box {
		height: 100%;
		width: 100%;
	}
	
	.to_wx,
	.to_address_list,
	.to_discover,
	.to_about_me {
		width: 25%;
		float: left;
		list-style: none;
	}
	
	.to_wx span,
	.to_address_list span,
	.to_discover span,
	.to_about_me span {
		display: block;
		height: .5rem;
		width: .5rem;
		line-height: .43rem;
		font-size: .5rem;
		text-align: center;
		margin: .15rem auto;
		margin-bottom: 0rem;
	}
	
	.to_wx i,
	.to_address_list i,
	.to_discover i,
	.to_about_me i {
		display: block;
		font-size: .2rem;
	}
	
	.green_font {
		color: #1dab17;
	}
</style>