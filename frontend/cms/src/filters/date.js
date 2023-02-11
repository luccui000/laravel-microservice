import moment from 'moment/moment';
import Vue from 'vue';

Vue.filter('dmy', function (value) {
  if (!value) return;
  return moment(value).format('DD/MM/YYYY');
});
