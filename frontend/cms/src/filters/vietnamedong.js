import Vue from 'vue';

Vue.filter('vietnamdong', function (value) {
  if (!value) return;
  return value.toLocaleString('it-IT', { style: 'currency', currency: 'VND' });
});
