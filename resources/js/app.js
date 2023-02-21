import './bootstrap';

import Alpine from 'alpinejs';
import focus from '@alpinejs/focus';

import {createApp} from 'vue'

const app = createApp({

})

import Ads from '@/components/Ads.vue'
import User from '@/components/User.vue'

app.component('Ads', Ads)
app.component('User', User)
app.mount("#app")

window.Alpine = Alpine;

Alpine.plugin(focus);

Alpine.start();




