/* eslint-disable unicorn/prefer-module */

module.exports = {
  proxy: 'mbd.wordpress-starter-kit.local',
  open: true,
  notify: false,
  files: [
    'wp-content/plugins/**/*.php',
    'wp-content/plugins/**/*.js',
    'wp-content/plugins/**/*.css',
    'wp-content/themes/**/*.php',
    'wp-content/themes/**/*.js',
    'wp-content/themes/**/*.css',
  ],
};
