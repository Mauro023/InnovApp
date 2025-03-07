require('./bootstrap');
window.Vue = require('vue').default;

//SweetAlert2
import Swal from 'sweetalert2';
window.Swal = Swal;

// Importa Vue y Vuetify
import vuetify from './vuetify';

//Vue select
import vSelect from "vue-select";
import "vue-select/dist/vue-select.css";
import Vue from 'vue';

//Vue qrcode reader
import { QrcodeStream } from 'vue-qrcode-reader';
Vue.use(QrcodeStream);


Vue.component("v-select", vSelect);

//reinduction
Vue.component('qr-scan', require('./components/reinduction/qrscanComponent.vue').default);
Vue.component('pending-component', require('./components/reinduction/presenter/pendingComponent.vue').default);
Vue.component('viewer-component', require('./components/reinduction/viewer/viewerComponent.vue').default);


const app = new Vue({
  vuetify,
  el: '#app',
});
