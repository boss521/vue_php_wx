import Vue from 'vue'
import Router from 'vue-router'
import Hello from '@/components/Hello'
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
			name: 'register',
			component: register
		},
		{
			path: '/login',
			name: 'login',
			component: login
		}, {
			path: '/set_name_head',
			name: 'set_name_head',
			component: set_name_head
		}, {
			path: '/Hello',
			name: 'Hello',
			component: Hello
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