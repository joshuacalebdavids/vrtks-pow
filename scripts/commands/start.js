#!/usr/bin/env node

/* eslint-disable unicorn/prefer-module */

const browserSync = require('browser-sync').create();

const { bannerMessage } = require('../utils');
const browserSyncConfig = require('../../browsersync.config');

function start() {
  bannerMessage('Starting development server', 'processing');

  browserSync.init(browserSyncConfig);
}

module.exports = {
  start,
};
