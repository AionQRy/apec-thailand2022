<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package fluffy
 */

header_fuc();
$format = get_post_format( $post_id );
switch ($format) {
	case 'image':
		$text_news = esc_html( 'In photos:', 'fluffy' );
		$ob_class = 'image-class';
		break;
	case 'video':
		$text_news = esc_html( 'In videos:', 'fluffy' );
		$ob_class = 'video-class';
		break;
	
	default:
		$text_news = esc_html( 'News:', 'fluffy' );
		$ob_class = 'image-class';
		break;
}
?>

<div class="single-page single-post">
	<div class="title-cat" style="background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/new-customize/img/bg-photo.jpg');">	
      <div class="v-container">
          <img src="<?php echo get_stylesheet_directory_uri(); ?>/new-customize/img/news-icon.png" alt="icon-page" class="icon-page icon-meeting">
          <h2 class="title-h2_page"><?php esc_html_e( 'APEC News', 'fluffy' ); ?></h2>
      </div>
  	</div>
	<div class="detail-single box-page">
		<div class="sec-title">
			<div class="v-container">
				<div class="title-box">
					<h2 class="title-h2_page"><?php if($format):?><span><?php echo $text_news; ?></span><?php endif; ?><?php esc_html_e( 'Past meetings', 'fluffy' ); ?></h2>        
				</div>
			</div>		
		</div>
		<div class="sec-detail <?php echo $ob_class; ?>">
			<div class="v-container">
				<div class="feature-box">
				<?php
					switch ($format):
						case 'image':
							?>
							<div class="feature-image_box">
								<?php the_post_thumbnail('large'); ?>
							</div>
							<?php
							break;
						case 'video':
							?>
							<div class="embed-container">
								<?php the_field('video'); ?>
							</div>
							<?php
							break;
						default:
							?>
							<div class="feature-image_box">
								<?php the_post_thumbnail('large'); ?>
							</div>
							<?php
					endswitch;
					 ?>
				</div>
				<div class="detail-box">
					<?php the_content(); ?>       
				</div>
			</div>		
		</div>
	</div>
</div>

<?php
// get_sidebar();
footer_fuc();
