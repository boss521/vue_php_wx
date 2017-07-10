import Vue from 'vue'
import Router from 'vue-router'
import hello from '@/components/hello'
import address_list from '@/components/address_list'
import discover from '@/components/discover'
import send_character from '@/components/send_character'
import friends from '@/components/friends'
import me from '@/components/me'
import register from '@/components/register'
import login from '@/components/login'
import set_name_head from '@/components/set_name_head'

Vue.use(Router)

export default new Router({
	routes: [{
			path: '/',
			name: 'login',
			component: login
		}, {
			path: '/register',
			name: 'register',
			component: register
		},
		{
			path: '/set_name_head',
			name: 'set_name_head',
			component: set_name_head
		}, {
			path: '/hello',
			name: 'hello',
			component: hello
		},
		{
			path: '/address_list',
			name: 'address_list',
			component: address_list
		},
		{
			path: '/discover',
			name: 'discover',
			component: discover
		},
		{
			path: '/send_character',
			name: 'send_character',
			component: send_character
		},
		{
			path: '/friends',
			name: 'friends',
			component: friends
		},
		{
			path: '/me',
			name: 'me',
			component: me
		}
	]
})