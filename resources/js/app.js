import './bootstrap';

import Alpine from 'alpinejs';
import focus from '@alpinejs/focus';

import {createApp} from 'vue'

const app = createApp({

})

import Ads from '@/components/Ads.vue'
import Ads2 from '@/components/Ads2.vue'

app.component('Ads', Ads)
app.component('Ads2', Ads2)

app.mount("#app")

window.Alpine = Alpine;

Alpine.plugin(focus);

Alpine.start();




