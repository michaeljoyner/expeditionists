var Vue = require('vue');
Vue.use(require('vue-resource'));

if(document.querySelector('#x-token')) {
    Vue.http.headers.common['X-CSRF-TOKEN'] = document.querySelector('#x-token').getAttribute('content');
}

Vue.component('gallery-show', require('./components/Galleryshow.vue'));
Vue.component('singleupload', require('./components/Singleupload.vue'));
Vue.component('dropzone', require('./components/Dropzone.vue'));
Vue.component('publishbutton', require('./components/Publishbutton.vue'));
Vue.component('pdfupload', require('./components/Pdfupload.vue'));

window.Vue = Vue;

window.swal = require('sweetalert');
window.formDateValidator = require('./libs/formdatevalidator.js');

