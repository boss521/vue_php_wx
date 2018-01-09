<template>
	<div class="login">
		<div class="user_password">
			<label for="user">账号</label><input type="input" v-model="user" name="user" id="user" placeholder="请输入账号" />
		</div>
		<div class="user_password">
			<label for="password">密码</label><input type="input" v-model="psw" name="password" id="password" placeholder="请输入密码" />
		</div>
		<div class="register_btn" :class="{green_bg:can_sub==1}" @click="register">登录</div>
		<router-link class="go_to_register" tag="div" to="/register">还没注册，去注册 >></router-link>
		<p class="agreement">欢迎登录</p>
	</div>
</template>

<script>
	export default {
		name: "login",
		data() {
			return {
				user: '',
				psw: ''
			}
		},
		created: function() {
			document.title = '登录'
		},
		computed: {
			can_sub: {
				get: function() {
					if(this.user != '' && this.psw != '') {
						return 1;
					} else {
						return 0;
					}
				},
				set: function() {
					if(this.user != '' && this.psw != '') {
						return;
					} else {
						return 0;
					}
				}
			}
		},
		methods: {
			register: function() {
				var that = this;
				var reg = new RegExp(/^[a-z0-9]+$/i);
				if(this.can_sub == 0) {
					return false;
				};
				if((that.user == "" || that.user == null) || (that.psw == "" || that.psw == null)) {
					alert("用户名或者密码不能为空");
					return false;
				} else if(!(reg.test(this.user)) || !(reg.test(this.psw))) {
					alert("账号和密码都只能是数字和字母组合");
				} else {
					this.can_sub = 1;
					$.ajax({
						type: 'post',
						//dataType: "JSON",
						url: "http://192.168.1.71/dashboard/weixinApp/vue_php_wx/src/actions/login.php",
						data: {
							"user": that.user,
							"password": that.psw
						},
						success: function(d) {
							var data = JSON.parse(d);
							console.log(data);
							if(data == 0) {
								alert("账号或者密码错误！");
							} else if(data[0].userid == that.user && data[0].password == that.psw) {
								that.$cookie.set('user', that.user, 5);
								that.$cookie.set('psw', that.psw, 5);
								if((data[0].name == '') || (data[0].name == null) || (data[0].headerImg == '') || (data[0].headerImg == null)) {
									that.$router.push({
										path: "/set_name_head"
										//query: {
										//	"user": that.user,
										//	"password": that.psw
										//}
									})
								} else {
									that.$router.push({
										path: "/address_list"
									});
								}
							}
						}
					});
				}
			}
		}
	}
</script>

<style scoped>
	.login {
		width: 100%;
		height: 100%;
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
		width: 45%;
		line-height: .6rem;
		border-bottom: 1px solid #dfdfdf;
		vertical-align: bottom;
		font-size: .22rem;
		box-sizing: border-box;
		padding: .1rem;
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
		margin-top: 1.4rem;
		color: #57607f;
	}
	
	.green_bg {
		background: #4de84d;
	}
	
	.go_to_register {
		font-size: .23rem;
		margin-top: .6rem;
	}
</style>