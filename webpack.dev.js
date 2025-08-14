/* eslint-disable unicorn/prefer-module */

const { merge } = require('webpack-merge');
const common = require('./webpack.common');

const mode = 'development';

module.exports = merge(common(mode), {
  mode,

  cache: true,

  devtool: 'eval-cheap-module-source-map',
});
