<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package fluffy
 */

?>

	<footer id="footer-1" class="main-footer footer-1" style="background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/new-customize/img/bg-footer.png');">
		<div class="v-container">
            <div class="main-object">
                <div class="logo-sec">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/new-customize/img/vector-smart.png" alt="">
                </div>
                <div class="address-sec">
                    <h3 class="title-footer"><?php esc_html_e( 'Ministry of Foreign Affairs', 'fluffy' ); ?></h3>
                <ul class="ul-footer">
                    <li class="list-footer"><svg viewBox="0 0 24 24" width="24" height="24" stroke="#0074bc" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg><?php esc_html_e( '443 Sri Ayudhya Road Bangkok 10400.', 'fluffy' ); ?></li>
                    <li class="list-footer"><svg viewBox="0 0 24 24" width="24" height="24" stroke="#0074bc" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg><?php esc_html_e( 'Office Hours : Monday - Friday, 08.30  - 16.30 (Except public and offcial holidays)', 'fluffy' ); ?></li>
                </ul>
                </div>
                <div class="social-sec">
                 <div class="social-box">
                    <?php if( have_rows('socials_link', 'option') ): ?>
                    <div class="social-list">
                    <?php while( have_rows('socials_link', 'option') ): the_row(); 
                        $title_sc = get_sub_field('title_sc');
                        $url_sc = get_sub_field('url_sc');
                        $image_sc = get_sub_field('image_sc');
                        ?>
                        <div class="l-sc">
                            <a href="<?php echo $url_sc;?>" target="_blank" rel="noopener noreferrer"><img src="<?php echo $image_sc['url']; ?>" alt="<?php echo $title_sc;?>"></a>
                        </div>
                    <?php endwhile; ?>
                    </div>
                    <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="sub-object">
                <span class="text-span"><?php esc_html_e( '©2022 APEC2022THAILAND | All Right Reserved.', 'fluffy' ); ?></span>
                <nav id="site-desktop-navigation" class="site-desktop-navigation">
					<?php wp_nav_menu( array( 'theme_location' => 'bottom-footer', 'menu_id' => 'bottom-footer' ) ); ?>
				</nav>
            </div>
	</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
