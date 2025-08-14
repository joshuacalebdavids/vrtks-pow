#!/usr/bin/env node

/* eslint-disable unicorn/prefer-module */

const { program } = require('commander');
const { build, start, createLayout } = require('../commands');

program
  .command('build')
  .description('Builds the project assets.')
  .option('-d, --dev', 'Build project assets for development.')
  .option('-w, --watch', 'Build project assets in watch mode.')
  .action((options) => build(options));

program.command('start').description('Starts the development server.').action(start);

program
.command('createLayout <featureName>')
.description('Creates a new layout in builder.')
.action((featureName) => {
  createLayout(featureName);
});

program.parse(process.argv);
