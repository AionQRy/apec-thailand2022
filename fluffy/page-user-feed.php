<?php
/**
 * Template name: User Feed
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package fluffy
 */

get_header();
?>

<main id="primary" class="site-main">
<?php
$user_subscribe = get_field('user_subscribe','user_'.get_current_user_id());
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$args = array(
	'post_type' => array( 'post'),
	'tax_query'         => array(
				 array(
						 'taxonomy'  => 'category',
						 'field'     => 'term_id',
						 'terms'     => $user_subscribe
				 )
			 ),
	'paged' => $paged,
	'posts_per_page'  => 9,
	'orderby'    => 'DESC'
	);
	query_posts( $args );

 ?>
	<?php if ( have_posts() ) : ?>

		<header class="entry-header">
			<h1 class="page-title">ข่าวสารที่ติดตาม</h1>
		</header><!-- .page-header -->


<div class="v-container">
		<div class="v-post-loop -card">
		<?php
		/* Start the Loop */
		while ( have_posts() ) :
			the_post();

			/*
			 * Include the Post-Type-specific template for the content.
			 * If you want to override this in a child theme, then include a file
			 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
			 */
			// get_template_part( 'template-parts/content', get_post_type() );
				get_template_part( 'template-parts/content','card');

		endwhile;

	else :

		get_template_part( 'template-parts/content', 'none' );

	endif;
	?>
	</div>
</div>
<?php fluffy_posts_navigation();  ?>
</main><!-- #main -->

<?php
// get_sidebar();
get_footer();
