import './bootstrap';

import { useRouter } from 'vue-router'
import {createApp} from 'vue/dist/vue.esm-bundler.js'
import InvoiceIndexComponent from './components/invoices/InvoiceIndexComponent.vue'


const router = useRouter({

})
const app = createApp ({
})
app.component('invoice-index-component', InvoiceIndexComponent)
app.mount('#random')
