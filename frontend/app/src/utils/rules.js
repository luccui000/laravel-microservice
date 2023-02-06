import { extend } from 'vee-validate';
import * as rules from 'vee-validate/dist/rules';
import { localize } from 'vee-validate';

Object.keys(rules).forEach((rule) => {
  extend(rule, rules[rule]);
});

// with typescript
for (let [rule, validation] of Object.entries(rules)) {
  extend(rule, {
    ...validation,
  });
}

localize({
  vi: {
    messages: {
      required: 'Vui lòng nhập vào giá trị',
      min: 'Vui lòng nhập nhiều hơn {length} ký tự',
      max: (_, { length }) => `Vui lòng nhập ít hơn ${length} ký tự`,
    },
  },
});
