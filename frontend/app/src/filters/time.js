import Vue from 'vue';
import moment from 'moment';

Vue.filter('diffForHuman', function (value) {
  return moment(new Date()).diff(value);
});
