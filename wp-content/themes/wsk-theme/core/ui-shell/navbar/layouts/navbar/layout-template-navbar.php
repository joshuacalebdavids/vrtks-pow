<?php

/**
 * Layout Template - Navbar
 *
 * TODO: Decouple from data and make re-usable.
 *
 * @package WSK_Theme/Core
 */

defined('ABSPATH') || exit;

$default_classes = array(
	'navbar',
	'navbar-expand-xl',
	// 'navbar-dark',
);

$classes = apply_filters('wskt_navbar_classes', $default_classes);
?>

<nav class="<?php echo esc_attr(implode(' ', $classes)); ?>">

	<div class="container-fluid">
		<nav class="nav">
			<label class="menu-switch nav__links">
				<input type="checkbox" id="menu-toggle" name="menu-toggle" />
				<span class="menu-switch__wrapper">
					<span class="menu-switch__row">
						<span class="menu-switch__dot"></span>
						<span class="menu-switch__dot"></span>
					</span>
					<span class="menu-switch__row menu-switch__row--bottom">
						<span class="menu-switch__dot"></span>
						<span class="menu-switch__dot"></span>
					</span>
					<span class="menu-switch__row-vertical">
						<span class="menu-switch__dot"></span>
						<span class="menu-switch__dot menu-switch__dot--middle"></span>
						<span class="menu-switch__dot"></span>
					</span>
					<span class="menu-switch__row-horizontal">
						<span class="menu-switch__dot"></span>
						<span class="menu-switch__dot menu-switch__dot--middle-horizontal"></span>
						<span class="menu-switch__dot"></span>
					</span>
				</span>
			</label>


			<!-- <div id="navbarSupportedContent" class="collapse navbar-collapse nav__links">
				<?php // wskt_navbar_menu(); 
				?>
			</div> -->

			<div class="nav_logo">
				<?php wskt_navbar_brand(); ?>
			</div>

			<?php wskt_navbar_toggler(); ?>

			<div class="nav__buttons">
				<label class="switch">
					<input type="checkbox" id="theme-toggle">
					<span class="slider"></span>
				</label>
			</div>
		</nav>
	</div>

</nav>