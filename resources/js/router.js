import Vue from 'vue'
import Router from 'vue-router'
Vue.use(Router)

import testPage from './components/pages/test'

const routes = [
    {
        path: '/testPage',
        component: testPage
    }
]

