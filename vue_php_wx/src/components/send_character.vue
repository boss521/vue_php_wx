<template>
	<div class="send_character">
		<div class="non_map" v-if="choose_map">
			<textarea class="contents" v-model="contents" placeholder="输入想说的话。。"></textarea>
			<hr />
			<li class="circle_of_friends">
				<span class="addr"></span>
				<em @click="address">{{your_address}}</em>
			</li>
			<li class="circle_of_friends">
				<span class="earth"></span>
				<em>谁可以看</em>
			</li>
			<hr />
			<li class="circle_of_friends">
				<span class="at"></span>
				<em>提醒谁看</em>
			</li>
			<button @click="send_out">发表</button>
		</div>

		<iframe v-else id="mapPage" width="100%" height="100%" frameborder=0 src="http://apis.map.qq.com/tools/locpicker?search=1&type=1&key=OB4BZ-D4W3U-B7VVO-4PJWW-6TKDJ-WPB77&referer=myapp"></iframe>
	</div>
</template>

<script>
	export default {
		name: 'send_character',
		data() {
			return {
				contents: "",
				user: '',
				choose_map: 1,
				your_address: '所在位置'
			}
		},
		created() {
			document.title = '发动态'
		},
		methods: {
			send_out: function() {
				var that = this;
				this.user = this.$cookie.get('user');
				if(this.contents == '' || this.contents == null) {
					alert('不能发送空内容')
				} else {
					if(this.your_address=='所在位置'){
						this.your_address=null
					}
					$.ajax({
						type: 'post',
						url: "http://192.168.1.100/dashboard/moniweixin/vue_php_wx/src/actions/send_character.php",
						dataType: 'text',
						data: {
							"user": that.user,
							"contents": that.contents,
							"address": that.your_address
						},
						success: function(data) {
							that.contents = '';
							that.$router.push('/friends');
						},
						error: function() {
							alert('服务器请求失败');
						}
					});

					//vue的get
					//this.$http.get('http://192.168.1.100/dashboard/moniweixin/vue_php_wx/src/actions/send_character.php?contents=' + that.contents + '&user=' + that.user).then((response) => {
					//that.contents = '';
					//that.$router.push('/friends');
					//}, (response) => {
					//alert('服务器请求失败');
					//});
				}
			},
			address: function() {
				this.choose_map = 0;
				var that = this;
				window.addEventListener('message', function(event) {
					// 接收位置信息，用户选择确认位置点后选点组件会触发该事件，回传用户的位置信息
					var loc = event.data;
					that.choose_map = 1;
					if(loc && loc.module == 'locationPicker') { //防止其他应用也会向该页面post信息，需判断module是否为'locationPicker'
						//console.log('location', loc.poiaddress);
						that.your_address = loc.poiaddress;
					}
				}, false);
			}
		}
	}
</script>

<style>
	.send_character {
		height: 100%;
		box-sizing: border-box;
	}
	/*地图相关*/
	
	#mapPage {
		height: 100%;
		width: 100%;
	}
	
	.contents {
		display: block;
		height: 3rem;
		width: 100%;
		border: 0;
		padding: .2rem;
		box-sizing: border-box;
		resize: none;
	}
	
	em {
		display: block;
		height: 100%;
		width: 83.9%;
		float: left;
		text-align: left;
		box-sizing: border-box;
		padding-right: .4rem;
		background: url(../assets/images/more.jpg)4.9rem center no-repeat;
		background-size: .17rem .28rem;
		overflow: hidden;
		text-overflow: ellipsis;
		white-space: nowrap;
	}
	
	hr {
		width: 6.1rem;
		float: right;
		border: .05px solid #E5E5E5;
	}
	
	.circle_of_friends {
		height: 0.86rem;
		width: 100%;
		background: #FFFFFF;
		font-size: 0.3rem;
		line-height: .86rem;
		border-bottom: 1px solid #E5E5E5;
	}
	
	.circle_of_friends:nth-of-type(2) {
		border: 0;
	}
	
	.circle_of_friends span {
		display: inline-block;
		height: 100%;
		width: 1.03rem;
		float: left;
	}
	
	.addr {
		background: url(../assets/images/address.jpg)center no-repeat;
		background-size: .33rem .35rem;
	}
	
	.earth {
		background: url(../assets/images/earth.jpg)center no-repeat;
		background-size: .33rem .35rem;
	}
	
	.at {
		background: url(../assets/images/at.jpg)center no-repeat;
		background-size: .33rem .35rem;
	}
	
	#font {
		background: none;
		font-size: 0.45rem;
		text-align: center;
		line-height: .87rem;
		color: #10AEFF;
	}
</style>