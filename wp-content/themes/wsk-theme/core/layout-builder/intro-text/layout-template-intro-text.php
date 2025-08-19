<?php

/**
 * Layout Template - Intro Text
 *
 * @package WSK_Theme/Core
 */

defined('ABSPATH') || exit;

$layout_classes_attrs = array(
	'layout_name'   => 'intro-text',
	'colour_scheme' => $args['colour_scheme'],
);
?>

<section class="<?php wskt_layout_classes($layout_classes_attrs); ?>">

	<div class="container-fluid">
		<div class="grid layout__inner">

			<?php if ($args['title']) : ?>
				<header class="layout__header animation animation--fade-in-up g-col-12 g-col-md-8">
					<h2><?php echo esc_attr($args['title']); ?></h2>
				</header>
				<span class=" g-col-12 g-col-md-4"></span>
			<?php endif; ?>

			<div class="grid layout__posts">

				<?php if ($args['featured_post']) : ?>
					<div class="g-col-12 g-col-md-12">
						<div class="layout__intro">
							<?php
							if (! empty($args['featured_post']) && has_post_thumbnail($args['featured_post']->ID)) :
								$featured_img_url = get_the_post_thumbnail_url($args['featured_post']->ID, 'full');
							?>
								<img src="<?php echo esc_url($featured_img_url); ?>" alt="<?php echo esc_attr(get_the_title($args['featured_post']->ID)); ?>">
							<?php endif; ?>
							<div class="post__excerpt">
								<?php echo $args['featured_post']->post_excerpt;
								?><br />
								<a href="<?php echo get_permalink($args['featured_post']->ID);
											?>">Read More</a>
							</div>
						</div>

						<div class="layout__related">
							<?php if (! empty($args['image_left'])) : ?>
								<img src="<?php echo esc_url($args['image_left']); ?>" alt="Image Left">
							<?php endif; ?>

							<?php if (! empty($args['image_right'])) : ?>
								<img src="<?php echo esc_url($args['image_right']); ?>" alt="Image Right">
							<?php endif; ?>
						</div>

					</div>
				<?php endif; ?>


			</div>

		</div>
	</div>

</section>