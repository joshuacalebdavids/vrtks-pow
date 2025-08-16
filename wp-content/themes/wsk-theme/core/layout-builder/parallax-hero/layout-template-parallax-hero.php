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
			<?php if ($args['title']) : ?>
				<h1><?php echo esc_attr($args['title']); ?></h1>
			<?php endif; ?>
			<?php if ($args['content']) : ?>
				<p><?php echo esc_attr($args['content']); ?></p>
			<?php endif; ?>
			<?php if (!empty($args['logos'])): ?>
				<div class="client-logos">
					<?php foreach ($args['logos'] as $logo): ?>
						<div class="client-logo">
							<img src="<?php echo esc_url($logo['url']); ?>" alt="<?php echo esc_attr($logo['alt'] ?: 'Client logo'); ?>" />
						</div>
					<?php endforeach; ?>
				</div>
			<?php endif; ?>

		</div>
	</div>
</section>