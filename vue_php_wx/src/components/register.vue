<template>
	<div class="register">
		<div class="user_password">
			<label for="user">账号</label><input type="input" v-model="user" name="user" id="user" placeholder="请输入账号" />
		</div>
		<div class="user_password">
			<label for="password">密码</label><input type="input" v-model="psw" name="password" id="password" placeholder="请输入密码" />
		</div>
		<div class="register_btn" :class="{green_bg:can_sub==1}" @click="register">注册</div>
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
		created() {
			document.title = '注册'
		},
		computed: {
			can_sub: function() {
				if(this.user != '' && this.psw != '') {
					return 1;
				}
				return 0;
			}
		},
		methods: {
			register: function() {
				var that = this;
				var reg = new RegExp(/^[a-z0-9]+$/i)
				if((that.user == "" || that.user == null) || (that.psw == "" || that.psw == null)) {
					alert("用户名或者密码不能为空");
					return false;
				} else if(!(reg.test(this.user)) || !(reg.test(this.psw))) {
					alert("账号和密码都只能是数字和字母组合");
				} else {
					this.can_sub = 1;
					$.ajax({
						type: 'post',
						url: "http://192.168.1.53/dashboard/moniweixin/vue_php_wx/src/actions/register.php",
						data: {
							"user": that.user,
							"password": that.psw
						},
						success: function(d) {
							console.log(d);
							if(d*1 == 1) {
								alert('该用户已经存在！')
							} else {
								alert("注册成功");
								that.$router.push({
									path: "/"
								});
							}
						}
					});
					/*
					 * axios的post请求默认json格式，不知道怎么改
					 * */
					//this.$http.post('http://192.168.1.53/dashboard/moniweixin/vue_php_wx/src/actions/register.php', {
					//	headers: {
					//		'Content-Type': 'application/x-www-form-urlencoded'
					//	},
					//	data: {
					//		"user": that.user,
					//		"password": that.psw
					//	}
					//}).then((response) => {
					//	that.contents = '';
					//	console.log(response);
					//}, (response) => {
					//	alert('服务器请求失败');
					//});
					/*
					 * 
					 * 用jQuery
					 * 的ajax
					 * 
					 * */
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
		margin-top: 1rem;
		color: #57607f;
	}
	
	.green_bg {
		background: #4de84d;
	}
</style>