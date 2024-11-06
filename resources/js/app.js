import './bootstrap';
import { createApp } from 'vue';
import { toggleDropdown } from './dropdown'; // Import the dropdown JS
import './accordion.js'; // Import other JS files
import './alert.js'; // Import the alert functionality

const app = createApp({});

import ExampleComponent from './components/ExampleComponent.vue';
app.component('example-component', ExampleComponent);

app.mount('#app');

window.toggleDropdown = toggleDropdown;
