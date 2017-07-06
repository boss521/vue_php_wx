import Vue from 'vue'
import Router from 'vue-router'
import Hello from '@/components/Hello'
import address_list from '@/components/address_list'
import discover from '@/components/discover'
import send_character from '@/components/send_character'
import friends from '@/components/friends'
import me from '@/components/me'
import register from '@/components/register'
Vue.use(Router)

export default new Router({
	routes: [{
			path: '/',
			name: 'register',
			component: register
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