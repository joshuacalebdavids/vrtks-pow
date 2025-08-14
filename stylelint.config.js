/* eslint-disable unicorn/prefer-module,unicorn/no-null */

module.exports = {
  extends: ['stylelint-config-standard-scss', 'stylelint-config-prettier-scss'],
  rules: {
    // Makes for some awkward variation code
    'no-descending-specificity': null,

    // Conflicts with our intro comment style.
    'scss/comment-no-empty': null,

    // Conflicts with our commented out import files.
    'scss/double-slash-comment-empty-line-before': null,

    // Conflicts with BEM naming convention.
    'selector-class-pattern': null,

    // Conflicts with using bootstrap map-get() function.
    'scss/no-global-function-names': null,
  },
};
