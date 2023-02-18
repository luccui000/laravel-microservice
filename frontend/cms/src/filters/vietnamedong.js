import Vue from 'vue';

Vue.filter('vietnamdong', function (value) {
  if (!value) return 0;
  return value.toLocaleString('it-IT', { style: 'currency', currency: 'VND' });
});
