#!/usr/bin/env node

/* eslint-disable unicorn/prefer-module */

const { exec } = require('child_process');
const fs = require('fs');
const path = require('path');

const rootDir = path.resolve(__dirname, '../../');
const targetPath = `${rootDir}/wp-content/themes/wsk-theme/core/layout-builder`;

// Convert case
function toKebabCase(input) {
  if (/^[a-z0-9]+(-[a-z0-9]+)*$/.test(input)) {
    return input;
  }
  return input.toLowerCase().replace(/\s+/g, '-');
}

function toSnakeCase(input) {
  if (/^[a-z0-9]+(_[a-z0-9]+)*$/.test(input)) {
    return input;
  }
  return input.toLowerCase().replace(/\s+/g, '_');
}

// Standardize input (protect against user input already in either kebab or snake case)
function standardizeInput(input) {
  // Replace any "-" or "_" with a space to standardize the input
  return input.replace(/[-_]+/g, ' ').replace(/\b\w/g, (char) => char.toUpperCase());
}

// Function to create a new theme layout skeleton
function createLayout(layoutName) {
  if (!layoutName) {
    console.error('Usage: create-layout <layout_name>');
    process.exit(1);
  }

  layoutName = standardizeInput(layoutName);

  const snakeCaseLayoutName = toSnakeCase(layoutName);
  const kebabCaseLayoutName = toKebabCase(layoutName);

  // Add protection for if the layout name is already in use
  if (fs.existsSync(path.join(targetPath, kebabCaseLayoutName))) {
    console.error(`Layout '${layoutName}' already exists.`);
    process.exit(1);
  }

  const branchName = `feature/layout/${kebabCaseLayoutName}`;
  const folderName = path.join(targetPath, kebabCaseLayoutName);
  const boilerplateFiles = [
    {
      name: `${kebabCaseLayoutName}.php`,
      content: `
  <?php
  /**
   * ${layoutName}
   *
   * @package WSK_Theme/Core
   */
  
  defined( 'ABSPATH' ) || exit;
  
  /**
   * Layouts
   */
  require_once 'acf-layout-${kebabCaseLayoutName}.php';
  require_once 'layout-${kebabCaseLayoutName}.php';
  `,
    },
    {
      name: `layout-template-${kebabCaseLayoutName}.php`,
      content: `
<?php
/**
* Layout Template - ${layoutName}
*
* @package WSK_Theme/Core
*/

defined( 'ABSPATH' ) || exit;
`,
    },
    {
      name: `acf-layout-${kebabCaseLayoutName}.php`,
      content: `
  <?php
/**
* ACF Layout - ${layoutName}
*
* @package WSK_Theme/Core
*/

defined( 'ABSPATH' ) || exit;

/**
* Add layout and fields to layout builder.
*
* @param array $layouts Layouts.
*/
function wskt_add_acf_layout_${snakeCaseLayoutName}( $layouts ) {
  $layouts['layout_${snakeCaseLayoutName}'] = array(
      'key'        => 'layout_${snakeCaseLayoutName}',
      'label'      => __( '${layoutName}', 'wsk-theme' ),
      'name'       => '${snakeCaseLayoutName}',
      'sub_fields' => array(
    );

  return $layouts;
}
add_action( 'wskt_layout_builder_layouts', 'wskt_add_acf_layout_${snakeCaseLayoutName}' );

/**
* Hook template into layout builder.
*/
function wskt_acf_layout_${snakeCaseLayoutName}() {
  $attrs = array();


wskt_layout_${snakeCaseLayoutName}( $attrs );
}
add_action( 'wskt_layout_builder_layout_${snakeCaseLayoutName}', 'wskt_acf_layout_${snakeCaseLayoutName}' );
`,
    },
    {
      name: `layout-${kebabCaseLayoutName}.php`,
      content: `
<?php
/**
* Layout - ${layoutName}
*
* @package WSK_Theme/Core
*/

defined( 'ABSPATH' ) || exit;

/**
* Layout template function
*
* @param array $attrs Layout attributes.
*/
function wskt_layout_${snakeCaseLayoutName}( $attrs = array() ) {
  $default_attrs = array(
  );

  $args = wp_parse_args( $attrs, $default_attrs );

  get_template_part(
      'core/layout-builder/${kebabCaseLayoutName}/layout-template-${kebabCaseLayoutName}',
      null,
      $args
  );
}
`,
    },
  ];

  exec(`git checkout -b ${branchName}`, (error, stdout, stderr) => {
    if (error) {
      console.error(`Error creating branch: ${error.message}`);
      process.exit(1);
    }
    if (stderr) {
      console.log(`Git message: ${stderr}`);
    }

    // Add new layout into layout-builder.php list
    const layoutListPath = path.join(targetPath, 'layout-builder.php');

    fs.readFile(layoutListPath, 'utf8', (err, data) => {
      if (err) {
        console.error('Error reading layout-builder.php:', err);
        return;
      }

      const newLayout = `\n// Script Added Layout\nrequire_once '${kebabCaseLayoutName}.php';\n`;

      // Find insertion point in file & modify
      const insertionPoint = `/**
 * Layouts.
 */`;

      const insertionIndex = data.indexOf(insertionPoint);
      if (insertionIndex === -1) {
        console.error('Insertion point not found in the file.');
        return;
      }

      const insertAfterIndex = insertionIndex + insertionPoint.length;

      const modifiedContent =
        data.slice(0, insertAfterIndex) + newLayout + data.slice(insertAfterIndex);

      fs.writeFile(layoutListPath, modifiedContent, 'utf8', (err) => {
        if (err) {
          console.error('Error writing file:', err);
          return;
        }
        console.log('File has been updated successfully!');
      });
    });

    // Add new layout file structure & files.
    fs.mkdir(folderName, { recursive: true }, (err) => {
      if (err) {
        console.error(`Error creating folder: ${err.message}`);
        process.exit(1);
      }

      boilerplateFiles.forEach((file) => {
        fs.writeFile(path.join(folderName, file.name), file.content, (err) => {
          if (err) {
            console.error(`Error creating file ${file.name}: ${err.message}`);
            process.exit(1);
          }
        });
      });

      console.log(`New layout '${layoutName}' created successfully on branch '${branchName}'.`);
    });
  });
}

// Extract layout name from command line arguments
const layoutName = process.argv[2];

// createLayout(layoutName);

module.exports = {
  createLayout,
};
