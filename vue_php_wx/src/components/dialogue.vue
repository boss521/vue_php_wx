<template>
	<div class="dialogue">
		<ul class="dialogue_box">
			<li class="chatA">
				<img class="headA" src="">
				<div class="contentA">
					√
					<span class="triangleA"></span>
				</div>
			</li>
			<li class="chatB">
				<img class="headB" src="">
				<div class="contentB">
					我是谁啊啊啊啊 啊啊我是谁啊啊啊阿斯蒂芬撒地方士大夫阿斯蒂芬阿斯蒂芬
					<span class="triangleB"></span>
				</div>
			</li>
		</ul>
	</div>
</template>

<script>
	export default {
		name: 'dialogue',
		data() {
			return {
				user: "",
				self_headerImg: ''
			}
		},
		created: function() {
			document.title = '聊天'
		},
		mounted: function() {
			this.$parent.footer = 0;
			var that = this;
			this.user = this.$cookie.get('user');
			this.$http.get('http://192.168.1.71/dashboard/weixinApp/vue_php_wx/src/actions/dialogue.php?user=' + this.user).then((response) => {
				console.log(response.data);
			}, (response) => {
				alert("获取数据失败");
			})
		}
	}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
	.dialogue {
		height: 100%;
		width: 100%;
		overflow-y: scroll;
		padding-bottom: 1.5rem;
		background: #A3DFA3;
	}
	
	.dialogue_box {
		height: 100%;
		width: 100%;
		overflow-y: scroll;
	}
	
	.chatA,
	.chatB {
		height: auto;
		width: 5.7rem;
		margin: .1rem auto;
		overflow: hidden;
	}
	
	.headA,
	.headB {
		height: .8rem;
		width: .8rem;
		margin: 0 auto;
		border-radius: 50%;
		float: left;
	}
	
	.contentA,
	.contentB {
		min-height: .35rem;
		max-width: 4.02rem;
		font-size: .24rem;
		background: #ffffff;
		padding: .2rem;
		float: left;
		margin-left: .3rem;
		border-radius: .1rem;
		position: relative;
		z-index: 66;
		margin-top: .06rem;
	}
	
	.chatB {
		margin-top: .4rem;
	}
	
	.headB,
	.contentB {
		float: right;
	}
	
	.contentB {
		margin: .06rem .2rem 0 0;
		background: #a9ddfc;
	}
	
	.triangleA {
		height: .17rem;
		width: .17rem;
		display: block;
		background: #ffffff;
		transform: rotate(45deg);
		position: absolute;
		top: .3rem;
		left: -.08rem;
		z-index: 3;
	}
	
	.triangleB {
		height: .17rem;
		width: .17rem;
		display: block;
		background: #a9ddfc;
		transform: rotate(45deg);
		position: absolute;
		top: .3rem;
		right: -.08rem;
		z-index: 3;
	}
</style>