import './bootstrap';

import Alpine from 'alpinejs';
import focus from '@alpinejs/focus';

import {createApp} from 'vue'

const app = createApp({

})

import Ads from '@/components/Ads.vue'
import DashboardAdmin from '@/components/DashboardAdmin.vue'

app.component('Ads', Ads)
app.component('DashboardAdmin', DashboardAdmin)

app.mount("#app")

window.Alpine = Alpine;

Alpine.plugin(focus);

Alpine.start();




