import './bootstrap';

import Alpine from 'alpinejs';
import focus from '@alpinejs/focus';

import {createApp} from 'vue'

const app = createApp({

})

import User from '@/components/user/User.vue'
import Marketplace from '@/components/Marketplace.vue'

app.component('User', User)
app.component('Marketplace', Marketplace)
app.mount("#app")

window.Alpine = Alpine;

Alpine.plugin(focus);

Alpine.start();




