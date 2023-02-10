<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package fluffy
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'fluffy' ); ?></a>

	<header id="main-header_1" class="main-header section-header box-header">
        <div class="main-object">
            <div class="v-container">
                <div class="object-1">
                        <div class="site-branding">
                                <?php the_custom_logo(); ?>
                        </div><!-- .site-branding -->
                </div>
                <div class="object-2">
                    <div class="size-box">
                        <div class="box-size">
                            <div class="text-size">
                            <span class="text-span"><?php esc_html_e( 'Size', 'fluffy' ); ?></span>
                            </div>
                            <div class="button-size">
                                <div class="object-1 btn-size btn-down obj-box">
                                    <div class="span-btn span-minus">
                                        <svg viewBox="0 0 24 24" width="18" height="18" stroke="#000" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><line x1="5" y1="12" x2="19" y2="12"></line></svg>
                                    </div>
                                </div>
                                <div class="object-2 obj-box">
                                        <span class="span-middle"><?php esc_html_e( 'A', 'fluffy' ); ?></span>
                                </div>
                                <div class="object-3 btn-size btn-up obj-box">
                                    <div class="span-btn span-plus">
                                        <svg viewBox="0 0 24 24" width="18" height="18" stroke="#000" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="color-box">
                        <div class="box-color">
                            <div class="text-color">
                            <span class="text-span"><?php esc_html_e( 'Color', 'fluffy' ); ?></span>
                            </div>
                            <div class="button-color">
                                <div class="object-1 btn-color btn-c1 obj-box">
                                    <div class="span-btn span-minus">
                                    <span class="span-middle"><?php esc_html_e( 'A', 'fluffy' ); ?></span>
                                    </div>
                                </div>
                                <div class="object-2 btn-color btn-c2 obj-box">
                                        <span class="span-middle"><?php esc_html_e( 'A', 'fluffy' ); ?></span>
                                </div>
                                <div class="object-3 btn-color btn-c3 obj-box">
                                    <div class="span-btn span-plus">
                                    <span class="span-middle"><?php esc_html_e( 'A', 'fluffy' ); ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="lang-box">
                   <?php echo do_shortcode( '[polylang_langswitcher]' );?> 
                    </div>
                    <div class="social-box">
                    <div class="social-list">
                                    <?php
                                    $facebook = get_field('facebook', 'option');
                                    $instagram = get_field('instagram', 'option');
                                    $youtube = get_field('youtube', 'option');
                                    $twiiter = get_field('twiiter', 'option');
                                    $linkedin = get_field('linkedin', 'option');
                                    ?>
                                    <?php if($facebook):?>
                                    <div class="l-sc">
                                        <a href="<?php echo $facebook;?>" target="_blank" rel="noopener noreferrer">
                                            <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path></svg>
                                        </a>
                                    </div>
                                    <?php endif; ?>

                                    <?php if($instagram):?>
                                    <div class="l-sc">
                                        <a href="<?php echo $instagram;?>" target="_blank" rel="noopener noreferrer">
                                            <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg>
                                        </a>
                                    </div>
                                    <?php endif; ?>

                                    <?php if($youtube):?>
                                    <div class="l-sc">
                                        <a href="<?php echo $youtube;?>" target="_blank" rel="noopener noreferrer">
                                            <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M22.54 6.42a2.78 2.78 0 0 0-1.94-2C18.88 4 12 4 12 4s-6.88 0-8.6.46a2.78 2.78 0 0 0-1.94 2A29 29 0 0 0 1 11.75a29 29 0 0 0 .46 5.33A2.78 2.78 0 0 0 3.4 19c1.72.46 8.6.46 8.6.46s6.88 0 8.6-.46a2.78 2.78 0 0 0 1.94-2 29 29 0 0 0 .46-5.25 29 29 0 0 0-.46-5.33z"></path><polygon points="9.75 15.02 15.5 11.75 9.75 8.48 9.75 15.02"></polygon></svg>
                                        </a>
                                    </div>
                                    <?php endif; ?>

                                    <?php if($twiiter):?>
                                    <div class="l-sc">
                                        <a href="<?php echo $twiiter;?>" target="_blank" rel="noopener noreferrer">
                                            <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"></path></svg>
                                        </a>
                                    </div>
                                    <?php endif; ?>

                                    <?php if($linkedin):?>
                                    <div class="l-sc">
                                        <a href="<?php echo $linkedin;?>" target="_blank" rel="noopener noreferrer">
                                            <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"></path><rect x="2" y="9" width="4" height="12"></rect><circle cx="4" cy="4" r="2"></circle></svg>
                                        </a>
                                    </div>
                                    <?php endif; ?>
                                </div>
                    </div>
                </div>
            </div>
        </div>
		<div class="sub-object">
            <div class="v-container">
                <nav id="site-navigation" class="main-navigation">
                    <div id="toggle-main-menu" class="_mobile hamburger hamburger--slider">
                        <div class="hamburger-box">
                            <div class="hamburger-inner"></div>
                        </div>
                    </div>
                    <div class="desktop_menu _desktop">
                        <?php
                        wp_nav_menu(
                            array(
                                'theme_location' => 'primary',
                                'menu_id'        => 'primary-menu',
                            )
                        );
                        ?>
                    </div>
                    <div class="overlay_menu_m"></div>
                    <div id="mobile_menu_wrap">
                        <div id="close-mobile-menu" class="hamburger hamburger--slider is-active">
                            <div class="hamburger-box">
                                <div class="hamburger-inner"></div>
                            </div>
                        </div>

                        <?php
                        wp_nav_menu(
                            array(
                                'theme_location' => 'mobile',
                                'menu_id'        => 'mobile-menu',
                            )
                        );
                        ?>
                    </div>
                </nav><!-- #site-navigation -->
                <div class="toggle-search">
                    <div class="toggle-icon">
                        <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                    </div>
                </div>
            </div>
        </div>
        <div class="mobile-object">
            <div class="main-object">
                <div class="object-1">
                    <div class="site-branding">
                        <?php the_custom_logo(); ?>
                    </div><!-- .site-branding -->
                </div>
                <div class="object-2">
                    <div class="toggle-search">
                        <div class="toggle-icon">
                            <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                        </div>
                    </div>
                    <nav id="site-navigation" class="main-navigation">
                        <div id="toggle-main-menu" class="_mobile hamburger hamburger--slider">
                            <div class="hamburger-box">
                                <div class="hamburger-inner"></div>
                            </div>
                        </div>
                        <div class="desktop_menu _desktop">
                            <?php
                            wp_nav_menu(
                                array(
                                    'theme_location' => 'primary',
                                    'menu_id'        => 'primary-menu',
                                )
                            );
                            ?>
                        </div>
                        <div class="overlay_menu_m"></div>
                        <div id="mobile_menu_wrap">
                            <div id="close-mobile-menu" class="hamburger hamburger--slider is-active">
                                <div class="hamburger-box">
                                    <div class="hamburger-inner"></div>
                                </div>
                            </div>

                            <?php
                            wp_nav_menu(
                                array(
                                    'theme_location' => 'mobile',
                                    'menu_id'        => 'mobile-menu',
                                )
                            );
                            ?>
                            <div class="social-box">
                                <div class="social-list">
                                    <?php
                                    $facebook = get_field('facebook', 'option');
                                    $instagram = get_field('instagram', 'option');
                                    $youtube = get_field('youtube', 'option');
                                    $twiiter = get_field('twiiter', 'option');
                                    $linkedin = get_field('linkedin', 'option');
                                    ?>
                                    <?php if($facebook):?>
                                    <div class="l-sc">
                                        <a href="<?php echo $facebook;?>" target="_blank" rel="noopener noreferrer">
                                            <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path></svg>
                                        </a>
                                    </div>
                                    <?php endif; ?>

                                    <?php if($instagram):?>
                                    <div class="l-sc">
                                        <a href="<?php echo $instagram;?>" target="_blank" rel="noopener noreferrer">
                                            <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg>
                                        </a>
                                    </div>
                                    <?php endif; ?>

                                    <?php if($youtube):?>
                                    <div class="l-sc">
                                        <a href="<?php echo $youtube;?>" target="_blank" rel="noopener noreferrer">
                                            <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M22.54 6.42a2.78 2.78 0 0 0-1.94-2C18.88 4 12 4 12 4s-6.88 0-8.6.46a2.78 2.78 0 0 0-1.94 2A29 29 0 0 0 1 11.75a29 29 0 0 0 .46 5.33A2.78 2.78 0 0 0 3.4 19c1.72.46 8.6.46 8.6.46s6.88 0 8.6-.46a2.78 2.78 0 0 0 1.94-2 29 29 0 0 0 .46-5.25 29 29 0 0 0-.46-5.33z"></path><polygon points="9.75 15.02 15.5 11.75 9.75 8.48 9.75 15.02"></polygon></svg>
                                        </a>
                                    </div>
                                    <?php endif; ?>

                                    <?php if($twiiter):?>
                                    <div class="l-sc">
                                        <a href="<?php echo $twiiter;?>" target="_blank" rel="noopener noreferrer">
                                            <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"></path></svg>
                                        </a>
                                    </div>
                                    <?php endif; ?>

                                    <?php if($linkedin):?>
                                    <div class="l-sc">
                                        <a href="<?php echo $linkedin;?>" target="_blank" rel="noopener noreferrer">
                                            <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"></path><rect x="2" y="9" width="4" height="12"></rect><circle cx="4" cy="4" r="2"></circle></svg>
                                        </a>
                                    </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </nav><!-- #site-navigation -->
                </div>
            </div>
        </div>
	</header><!-- #masthead -->

	<div class="popup_search">
		<div class="box-search">
			<form action="get" class="search-panel">
				<div class="main-object">
					<div class="object-1">
						<input type="text" name="s" id="input-search">
					</div>
					<div class="object-2">
						<button type="submit" class="btn-search_f"><svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg></button>
					</div>
				</div>
			</form>
			<div class="cancel-btn_search">
				<div class="icon_cancel">
					<svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
				</div>
			</div>
		</div>
	</div>
