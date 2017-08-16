<template>
	<div class="set_name_head">
		<div class="wrap">
			<span>上传头像</span>
			<input type="file" name="" @change="change" id="upload_img" value="" />
			<img class="mask" id="mask" :src="head" />
		</div>
		<label for="name">名字</label><input type="text" v-model="yourName" name="name" id="name" value="" />
		<button @click="sub">提交</button>
	</div>
</template>

<script>export default {
	name: "set_name_head",
	data() {
		return {
			infos: [],
			img_url: '',
			head: "http://192.168.1.53/dashboard/moniweixin/vue_php_wx/src/assets/images/upload.png",
			yourName: ''
		}
	},
	mounted: function() {
		this.$parent.footer = 0;
	},
	methods: {
		change: function() {
			//替换本页的+号
			var reader = new FileReader();
			var that = this;
			//处理前端显示的代码
			reader.onload = function(e) {
				document.getElementById('mask').setAttribute("src", e.target.result);
			}
			reader.readAsDataURL(document.getElementById('upload_img').files[0]);
			//传图片给后台的代码
			var form_data = new FormData();
			form_data.append('filename', document.getElementById('upload_img').files[0]);
			$.ajax({
				url: 'http://192.168.1.53/dashboard/moniweixin/vue_php_wx/src/actions/upload_img.php',
				type: 'post',
				data: form_data,
				dataType: 'json',
				contentType: false, //必须false才会自动加上正确的Content-Type
				processData: false, //必须false才会避开jQuery对 formdata 的默认处理, XMLHttpRequest会对 formdata 进行正确的处理
				success: function(data) { //返回的数据需要包括url
					//						console.log(data);

					console.log(data);
					that.head = data.upload_resize_url;
				},
				error: function() {
					alert('上传失败')
				}
			});
		},
		sub: function() {
			var that = this;
			if(this.yourName == null || this.yourName == '') {
				alert('名字不能为空');
			} else {
				$.ajax({
					type: 'post',
					url: "http://192.168.1.53/dashboard/moniweixin/vue_php_wx/src/actions/set_name_head.php",
					data: {
						"name": that.yourName,
						//"user": that.$route.query.user,
						//"password": that.$route.query.password,
						"password": that.$cookie.get('psw'),
						"user": that.$cookie.get('user'),
						"head": that.head
					},
					success: function(d) {
						that.$parent.footer = 1;
						alert("修改昵称成功");
						that.$router.push({
							'path': '/address_list'
						});
					}
				});
			}
		}
	}
}</script>

<style scoped>.set_name_head {
	height: 100%;
	background: #f0eff5;
	font-size: .3rem;
	overflow: auto;
}

.wrap {
	margin-top: 2rem;
	position: relative;
}

#upload_img,
.mask {
	display: block;
	width: 2rem;
	height: 2rem;
	position: absolute;
	left: 50%;
	margin-left: -1rem;
	top: .7rem;
	opacity: 0;
	z-index: 5;
}

.mask {
	border-radius: .1rem;
	opacity: 1;
	z-index: 1;
}

button {
	height: .5rem;
	width: 2rem;
	display: block;
	margin: 1rem auto;
}

label {
	display: block;
	margin: 3rem 0 .3rem 0;
}</style>
