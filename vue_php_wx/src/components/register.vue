<template>
	<div class="register">
		<div class="user_password">
			<label for="user">账号</label><input type="input" v-model="user" name="user" id="user" placeholder="请输入账号" />
		</div>
		<div class="user_password">
			<label for="password">密码</label><input type="input" v-model="psw" name="password" id="password" placeholder="请输入密码" />
		</div>
		<div class="register_btn" @click="register">注册</div>
		<p class="agreement">轻触上面的“注册”按钮，表示你愿意服从于我</p>
	</div>
</template>

<script>
	export default {
		name: "register",
		data() {
			return {
				user: '',
				psw: ''
			}
		},
		methods: {
			register: function() {
				var that = this;
				if((that.user == "" || that.user == null) || (that.psw == "" || that.psw == null)) {
					alert("用户名或者密码不能为空");
					return false;
				} else {
					this.$http.post('http://192.168.1.95/dashboard/moniweixin/vue_php_wx/src/actions/register.php', {
						"user": that.user,
						"password": that.psw
					}).then((response) => {
						that.contents = '';
						console.log(response.data);
					}, (response) => {
						alert('服务器请求失败');
					});
				}
			}
		}
	}
</script>

<style scoped>
	.register {
		width: 100%;
		background: #FFFFFF;
		box-sizing: border-box;
		overflow: hidden;
	}
	
	.user_password {
		height: 1rem;
		width: 6rem;
		margin: 0 auto;
		font-size: .35rem;
	}
	
	.user_password:first-child {
		margin-top: 2.5rem;
	}
	
	#user,
	#password {
		border: 0;
		height: 60%;
		line-height: .8rem;
		border-bottom: 1px solid #dfdfdf;
		vertical-align: bottom;
	}
	
	.register_btn {
		height: .9rem;
		width: 5.6rem;
		margin: 0 auto;
		background: #a3dfa3;
		font-size: .4rem;
		text-align: center;
		line-height: .9rem;
		color: #ffffff;
		border-radius: .15rem;
		margin-top: 1.5rem;
	}
	
	.agreement {
		font-size: .25rem;
		width: 80%;
		margin: 0 auto;
		margin-top: 2rem;
		color: #57607f;
	}
</style>