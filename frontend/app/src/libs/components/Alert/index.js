import Vue from 'vue';
import alert from './index.vue';

const Alert = {
  install: function (app) {
    app.component('l-alert', alert);

    Alert.events = new Vue();

    app.prototype.$modal = {
      show(name, params) {
        Alert.events.$emit(name, params);
      },
      alert(message) {
        this.show('show', { message });
      },
    };
  },
};

export default Alert;
