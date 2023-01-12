import Vue from 'vue';

Vue.filter('vietnamdong', function (value) {
  return value.toLocaleString('it-IT', { style: 'currency', currency: 'VND' });
});
