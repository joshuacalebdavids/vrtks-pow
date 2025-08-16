<?php

/**
 * Layout Template - Parallax Hero
 *
 * @package WSK_Theme/Core
 */

defined('ABSPATH') || exit;

$layout_classes_attrs = array(
	'layout_name'     => 'parallax-hero',
	'padding_variant' => 'none',
	// 'colour_scheme'   => 'dark',
	'classes'         => array('layout--full-screen'),
);
?>

<section class="<?php wskt_layout_classes($layout_classes_attrs); ?>">
	<canvas></canvas>
	<div class="layout__content">
		<div class="header">
			<h1>One unified workspace to build, test, and ship AI faster</h1>
			<p>Trusted by</p>
			<div class="client-logos">
				<div class="client-logo"><img src="./img/logo-1.svg" alt="" /></div>
				<div class="client-logo"><img src="./img/logo-2.svg" alt="" /></div>
				<div class="client-logo"><img src="./img/logo-3.svg" alt="" /></div>
				<div class="client-logo"><img src="./img/logo-4.svg" alt="" /></div>
			</div>
		</div>
	</div>
</section>