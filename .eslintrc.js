/* eslint-disable unicorn/prefer-module */

module.exports = {
  root: true, // Limit ESLint to this project
  env: {
    es6: true,
    browser: true,
    node: true,
  },
  extends: [
    'plugin:import/recommended',
    'airbnb-base',
    'plugin:eslint-comments/recommended',
    'plugin:promise/recommended',
    'plugin:unicorn/recommended',
    'prettier',
  ],
  rules: {
    // Enable ForOfStatement https://stackoverflow.com/a/42237667
    'no-restricted-syntax': ['error', 'ForInStatement', 'LabeledStatement', 'WithStatement'],

    // Missing yarn workspace support
    'import/no-extraneous-dependencies': 'off',

    // Disable prefer default export
    'import/prefer-default-export': 'off',

    // Allow disabling of eslint for a whole file
    'eslint-comments/disable-enable-pair': ['error', { allowWholeFile: true }],

    // Common abbreviations are known and readable
    'unicorn/prevent-abbreviations': 'off',
  },
  globals: {
    jQuery: true,
    $: true,
    wskt: true,
    wskts: true,
    google: true,
  },
};
