# VRTKS WP Theme

VRTKS WP is a starter kit for building custom WordPress websites. It uses a mono repo structure so you can easily build the plugins and theme for a project at the same time. 

### Benefits of a mono repo: 
**Consolidated build command:** Build all plugins and the theme for a project with a single command.

**Consolidated watch command:** Watch for changes across all plugins and the theme for live-reloading during development.

**Project wide tooling config:** The plugins and theme for a project will need to meet the same browser and device requirements. Having a shared set of tooling means you can lint, test, build and manage the configuration for the project in a single place.


## Prerequisites 
In order to build WordPress websites using VRTKS WP you will need the following installed on your machine.

**Composer:** Instructions for installing Composer can be found at the following https://getcomposer.org/doc/00-intro.md. 

**Yarn:** Instructions for installing Yarn can be found at the following https://yarnpkg.com/getting-started. 

**Lerna:** Instructions for installing Lerna can be found at the following https://lerna.js.org/. 


## Getting Started

### New project setup

Create a blank installation of WordPress using your preferred method.

Initialise an empty git repository in the root of the new install:

```bash
git init
```

Add the remote starter kit repository to our blank git repo:

```bash
git remote add origin git@github.com:vorteksdigital/wp-vrtks.git
```

Clone it over the top of our blank installation:

```bash
git pull origin main --allow-unrelated-histories --rebase=false
```

The WordPress Starter Kit is now in place and ready to begin installation. At this point it is generally a good idea to remove the .git folder and setup the correct version control for the project you are just starting.

### Installation

Firstly install package dependencies for the monorepo.

```bash
composer install && yarn install
```

Next we need to install package dependencies for the plugins and theme and to link cross-dependencies.

```bash
yarn lerna bootstrap
```

Lastly we need to build a dev bundle of the assets so that the theme works correctly.

```bash
yarn build:dev
```

Activate VRTKS WP Theme in Appearance>Themes

Activate VRTKS WP Theme Support plugin 

Install and activate [Advanced Custom Fields PRO](https://www.advancedcustomfields.com/)

### Configuration

Configure the `browsersync.config.js` file in the project root to point to the local development server running your WordPress installation. 

```js
module.exports = {
  proxy: 'https://localhost:3000',
};
```

### Development

Now that everything is setup you are ready to begin development on your new WordPress website.

Firstly start the front end dev server.

```bash
yarn start
```

In a separate shell you then need to start the build task in watch mode so that new asset bundles are generated when changes are made.

```bash
yarn build:dev:watch
```

### Deployment

Once you are ready to deploy your project you can build production bundles of the assets, styles and scripts with the following:

```bash
yarn build:prod
```

## Commands

Below is a full list of commands that are available to use. They should all be run from the project root.


### Build

Build a development bundle of the assets, stylesheets and scripts.
```
yarn build:dev
```

Build a development bundle of the assets, stylesheets and scripts in watch mode.
```
yarn build:dev:watch
```

Build a production bundle of the assets, stylesheets and scripts.
```
yarn build:prod
```


### Formatting

Runs all of the formatting commands, generally you would use this one rather than the individual, file-specific, formatting commands listed below.
```
yarn format
```

Formats all JS files.
```
yarn format:js
```

Formats all package json files.
```
yarn format:package-json
```

Formats all php files.
```
yarn format:php
```

Formats all scss files.
```
yarn format:scss
```


### Linting

Runs all of the linting commands, generally you would use this one rather than the individual, file-specific, linting commands listed below.
```
yarn lint
```

Lints all JS files.
```
yarn lint:js
```

Lints all php files.
```
yarn lint:php
```

Lints all scss files.
```
yarn lint:scss
```


### Server

Start the front end development server. This is not the server that is running your WordPress installation but a server for running live-reload on the browser during development.
```
yarn start
```

### Create Layout Helper Command

Create a new layout helper file. This script is used to create new layout boilerplates in the builder and creates a new git branch to work from.
Usage from root;
```
yarn createLayout 'layoutName'
```
