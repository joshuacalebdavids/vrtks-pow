<?php
/**
 * Layout Template - Site Footer
 *
 * @package WSK_Theme/Core
 */

defined( 'ABSPATH' ) || exit;
?>

<footer id="colophon" class="site-footer colour-scheme colour-scheme--dark layout--padding-y" role="contentinfo">
	<div class="container-fluid">

		<div id="main-footer">
			<div class="grid">

				<div class="g-col-12 g-col-lg-6 g-col-xl-8">
					<?php wskt_footer_brand(); ?>

					<?php if ( ! empty( $args['strapline'] ) ) : ?>
						<small><?php echo esc_attr( $args['strapline'] ); ?></small>
					<?php endif; ?>
				</div>

				<div class="g-col-6 g-col-lg-3 g-col-xl-2">
					<?php wskt_footer_widget_area( 'footer-widget-area-1' ); ?>
				</div>

				<div class="g-col-6 g-col-lg-3 g-col-xl-2">
					<?php wskt_footer_widget_area( 'footer-widget-area-2' ); ?>
				</div>

			</div>
		</div>

		<div id="sub-footer">
			<div class="grid">

				<div class="g-col-12 g-col-lg-6">
					<?php wskt_footer_sub_menu(); ?>
				</div>

				<div class="g-col-12 g-col-lg-6">
					<div class="sub-footer__content">
						<?php if ( ! empty( $args['social_networks'] ) ) : ?>
							<?php wskt_social_network_buttons( $args['social_networks'] ); ?>
						<?php endif; ?>

						<?php if ( ! empty( $args['copyright_details'] ) ) : ?>
							<span class="copyright-details"><?php echo esc_attr( $args['copyright_details'] ); ?></span>
						<?php endif; ?>
					</div>
				</div>

			</div>
		</div>

	</div>
</footer>
