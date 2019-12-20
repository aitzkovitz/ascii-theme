<?php
/**
 * Header file for the ascii theme.
 *
 * @since 1.0.0
 */

?><!DOCTYPE html>

<html class="no-js" <?php language_attributes(); ?>>

	<head>

		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1.0" >

		<link rel="profile" href="https://gmpg.org/xfn/11">

		<?php wp_head(); ?>

	</head>

	<body <?php body_class(); ?>>

		<?php
		wp_body_open();
		?>

		<header id="site-header" class="header-footer-group" role="banner">

			<div class="header-inner">
				<div class="header-title-wrapper">

					<?php
						// Site title or logo.
						$test =  get_bloginfo( 'name' );
						$headerBeforeAttr = str_repeat('=' ,strlen($test));
					?>

					<div class="header-title ascii-wrap" data-css-wrap="<?php echo $headerBeforeAttr; ?>">

						<?php
							// Site title or logo.
							echo get_bloginfo( 'name' );
						?>

					</div><!-- .header-titles -->


				</div><!-- .header-titles-wrapper -->

				<div class="header-navigation-wrapper">

					<?php
					if ( has_nav_menu( 'header-menu' ) ) {
						?>

							<nav class="header-menu-wrapper" aria-label="<?php esc_attr_e( 'Horizontal', 'ascii' ); ?>" role="navigation">

							<?php
								// Get length of all items
								$theme_locations = get_nav_menu_locations();
								$menu_obj = get_term( $theme_locations['header-menu']);
								$menu_name = $menu_obj->name;
								$header_menu = wp_get_nav_menu_items( $menu_name );
								$nav_length = 0;
								for ($i = 0; $i < count($header_menu); $i++) {
									$nav_length += strlen($header_menu[$i]->title);
									if ($i < count($header_menu) - 1) {
										$nav_length += 3;
									}
								}

								$navWrap = str_repeat( '=', $nav_length );
								// echo '<pre>';
								// var_dump($header_menu);
								// echo '</pre>';
							?>

								<ul class="header-menu reset-list-style" data-css-wrap="<?php echo $navWrap; ?>">

								<?php

									wp_nav_menu(
										array(
											'container'  => '',
											'items_wrap' => '%3$s',
											'theme_location' => 'header-menu',
										)
									);
								?>

								</ul>

							</nav><!-- .primary-menu-wrapper -->

						<?php
					} ?>

				</div><!-- .header-navigation-wrapper -->
			</div>

			<div class="end-header-ruler">
				<?php echo str_repeat( '+', 500 ); ?>
				<pre class="welcome-banner"><?php get_template_part('template_parts/welcome_banner'); ?></pre>
				<?php echo str_repeat( '+', 500 ); ?>
				
			</div>
			<br>

		</header><!-- #site-header -->
