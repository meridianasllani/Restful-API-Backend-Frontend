import Vue from 'vue'
import Router from 'vue-router'
import StreamingServices from '@/components/StreamingServices'

Vue.use(Router)

export default new Router({
  routes: [
    {
      path: '/',
      name: 'StreamingServices',
      component: StreamingServices
    }
  ]
})
