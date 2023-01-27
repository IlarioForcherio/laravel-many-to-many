

require('./bootstrap');

//chiamata vue
window.Vue = require('vue');
//importa denttro la cartella views il file App vue
import App from './views/App'

//inizializzazione istanza vue
const app = new Vue({
    el: '#root',
    render: h=> h(App),
});

//creare cartella views con dentro un file App.vue dentro alla cartella js.
