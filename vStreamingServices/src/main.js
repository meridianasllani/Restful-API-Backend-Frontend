// The Vue build version to load with the `import` command
// (runtime-only or standalone) has been set in webpack.base.conf with an alias.
import Vue from 'vue'
import App from './App'
//import router from './router'
import VueRouter from 'vue-router'
import VueResource from 'vue-resource'
import StreamingServices from './components/StreamingServices'
import About_StreamingServices from './components/About_StreamingServices'
import Add_StreamingServices from './components/Add_StreamingServices'
import Edit_StreamingServices from './components/Edit_StreamingServices'

Vue.use(VueResource)
Vue.use(VueRouter)

const router = new VueRouter ({
	mode: 'history',
	base: __dirname,
	routes: [
	{path:'/', component: StreamingServices},
		{path: '/About_StreamingServices', component: About_StreamingServices},
		{path: '/Add_StreamingServices', component: Add_StreamingServices},
		{path: '/Edit_StreamingServices/:id_SS', component: Edit_StreamingServices},

	]
})

Vue.config.productionTip = false

/* eslint-disable no-new */
new Vue({
  el: '#app',
  router,
  components: { App },
  template:`
<div id="app">
<nav class="navbar navbar-default">
<div class="container">
<div class="navbar-header">
<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false"
aria-controls="navbar">
<span class="sr-only">Toggle navigation</span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
</button>
<a class="navbar-brand" href="#">vStreamingServices</a>
</div>
<div id="navbar" class="collapse navbar-collapse">
<ul class="nav navbar-nav">
<li><router-link to="/StreamingServices">Streaming Services</router-link></li>
<li><router-link to="/About_StreamingServices">Rreth Nesh</router-link></li>
</ul>
<ul class="nav navbar-nav navbar-right">
<li><router-link to="/Add_StreamingServices">Shto Servise</router-link></li>
</ul>
</div><!--/.nav-collapse -->
</div>
</nav>
<router-view></router-view>
</div>`
}).$mount('#app')