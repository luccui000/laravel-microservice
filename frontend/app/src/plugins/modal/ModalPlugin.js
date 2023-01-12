import modal from './components/modal.vue';
import Vue from 'vue';

const ModalPlugin = {
  install: (app, options = {}) => {
    app.component('v-modal', modal);
    console.log(options)

    ModalPlugin.events = new Vue();

    app.prototype.$modal = {
      show(params) {
        ModalPlugin.events.$emit('show', params)
      },
      hide() {
        ModalPlugin.events.$emit('hide')
      }
    };
  },
};

export default ModalPlugin;
