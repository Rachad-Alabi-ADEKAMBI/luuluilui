import './bootstrap';

import Alpine from 'alpinejs';
import focus from '@alpinejs/focus';

import {createApp} from 'vue'

import App from './App.vue'

createApp(App).mount("#app")

window.Alpine = Alpine;

Alpine.plugin(focus);

Alpine.start();




