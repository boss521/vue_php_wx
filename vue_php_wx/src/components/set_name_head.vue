<template>
	<div class="set_name_head">
		<div class="wrap">
			<span>上传头像</span>
			<input type="file" name="" @change="change" id="upload_img" value="" />
			<img class="mask" :src="head" />
		</div>
		<label for="name">名字</label><input type="text" v-model="yourName" name="name" id="name" value="" />
		<button @click="sub">提交</button>
	</div>

</template>

<script>
	export default {
		name: "set_name_head",
		data() {
			return {
				infos: [],
				img_url: '',
				head: "http://192.168.1.95/dashboard/moniweixin/vue_php_wx/src/assets/images/upload.png",
				yourName: ''
			}
		},
		methods: {
			change: function(e) {
				alert(66);
				var reader = new FileReader;
				//console.log(reader);
			},
			sub: function() {
				var that = this;
				$.ajax({
					type: 'post',
					url: "http://192.168.1.95/dashboard/moniweixin/vue_php_wx/src/actions/set_name_head.php",
					data: {
						"name": that.yourName,
						"user": that.$route.query.user,
						"password": that.$route.query.password
					},
					success: function(d) {
						that.$parent.footer = 1;
						alert("上传名字成功");

						that.$router.push({
							'path': '/address_list'
						});

					}
				});
			}
		}
	}
</script>

<style scoped>
	.set_name_head {
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
	}
</style>