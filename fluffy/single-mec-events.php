<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package fluffy
 */

header_fuc();

$str_old = get_post_meta( get_the_ID(), 'mec_start_date', true );
$str_format = strtotime( $str_old );
$end_old = get_post_meta( get_the_ID(), 'mec_end_date', true );
$end_format = strtotime( $end_old );
						// Display date in the format "l d F, Y".
$str_time_hour = get_post_meta( get_the_ID(), 'mec_start_time_hour', true );
$str_time_min = get_post_meta( get_the_ID(), 'mec_start_time_minutes', true );
$str_time_am_pm = get_post_meta( get_the_ID(), 'mec_start_time_ampm', true );

$end_time_hour = get_post_meta( get_the_ID(), 'mec_end_time_hour', true );
$end_time_min = get_post_meta( get_the_ID(), 'mec_end_time_minutes', true );
$end_time_am_pm = get_post_meta( get_the_ID(), 'mec_date_start', true );

$single = new MEC_skin_single();
$single_event_main = $single->get_event_mec(get_the_ID());
$single_event_obj = $single_event_main[0];

$images = get_field('gallery_event');
$size = 'full'; // (thumbnail, medium, large, full or custom size)

$format = get_the_terms( get_the_ID(), 'format' );
                         
if ( $format && ! is_wp_error( $format ) ) : 
 
    $draught_links = array();
 
    foreach ( $format as $term ) {
        $draught_links[] = $term->slug;
    }
    $status_format = join( '', $draught_links );                
    // $on_draught = join( ", ", $draught_links );
    ?>

<?php endif;
// echo $status_format; 

switch ($status_format) {
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
	<div class="title-cat" style="background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/new-customize/img/meeting-bg.jpg');">	
      <div class="v-container">
          <img src="<?php echo get_stylesheet_directory_uri(); ?>/new-customize/img/icon-meetings.png" alt="icon-page" class="icon-page icon-meeting">
          <h2 class="title-h2_page"><?php esc_html_e( 'APEC 2022 meetings', 'fluffy' ); ?></h2>
      </div>
  	</div>
	<div class="detail-single box-page">
		<div class="sec-title">
			<div class="v-container">
				<div class="title-box">
					<h2 class="title-h2_page"><?php if($status_format):?><span><?php echo $text_news; ?></span><?php endif; ?><?php esc_html_e( 'Past meetings', 'fluffy' ); ?></h2>        
					<div class="box-info_column">
						<div class="main-object">
							<div class="object-1">
							<?php
							$mec_location = get_the_terms(get_the_ID(), 'mec_location');
							$types ='';
							foreach($mec_location as $term_single) {
									$types .= ucfirst($term_single->name).'';
							}
							$typesx = rtrim($types, '');
							?>
							<?php if ( $mec_location ) :  ?>
								<span class="calendar-text"><svg viewBox="0 0 24 24" width="24" height="24" stroke="#0074bc" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
								<?php
									echo $typesx; // Show Location
								?>
								</span>
							<?php endif; ?>
							</div>
							<div class="object-2">
								<?php if($str_format): ?>
								<span class="calendar-text">
								<svg viewBox="0 0 24 24" width="24" height="24" stroke="#0074bc" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
									<div class="flex-x">
									<div class="day-box">
										<?php
										if(date_i18n( "m Y", $str_format ) == date_i18n( "m Y", $end_format ) ){
											echo date_i18n( "d", $str_format ) . '-' . date_i18n( "d", $end_format ). ' '. date_i18n( "F", $str_format ).
											' '. date_i18n( "Y", $str_format );
										}else{
											echo get_post_meta( get_the_ID(), 'mec-events-abbr', true );
											echo date_i18n( "d F Y", $str_format ) .  '-'. date_i18n( "d F Y", $end_format );
										}
										?>
									</div>
									<div class="time-box">
										<?php
										$single->display_time_widget($single_event_obj);
										?>
									</div>
									<div class="thai-time">
										<span class="time"><?php esc_html_e( 'Thailand Time', 'fluffy' ); ?></span>
									</div>
									</div>
								</span>
								<?php
									if (isset($event->data->meta['mec_date']['start']) and !empty($event->data->meta['mec_date']['start'])) {
										if (isset($event->data->meta['mec_hide_time']) and $event->data->meta['mec_hide_time'] == '0') {
											$time_comment = isset($event->data->meta['mec_comment']) ? $event->data->meta['mec_comment'] : '';
											$allday = isset($event->data->meta['mec_allday']) ? $event->data->meta['mec_allday'] : 0;
											?>
												<div class="mec-single-event-time">
													<i class="mec-sl-clock " style=""></i>
													<h3 class="mec-time"><?php _e('Time', 'modern-events-calendar-lite'); ?></h3>
													<i class="mec-time-comment"><?php echo (isset($time_comment) ? $time_comment : ''); ?></i>
													<dl>
													<?php if ($allday == '0' and isset($event->data->time) and trim($event->data->time['start'])) : ?>
														<dd><abbr class="mec-events-abbr"><?php echo $event->data->time['start']; ?><?php echo (trim($event->data->time['end']) ? ' - ' . $event->data->time['end'] : ''); ?></abbr></dd>
													<?php else : ?>
														<dd><abbr class="mec-events-abbr"><?php echo $this->main->m('all_day', __('All Day' , 'modern-events-calendar-lite')); ?></abbr></dd>
													<?php endif; ?>
													</dl>
												</div>
											<?php
										}
									}
								?>
								<?php endif; ?>
							</div>
						</div>
					</div>
				</div>
			</div>		
		</div>
		<div class="sec-detail <?php echo $ob_class; ?>">
			<div class="v-container">
				<div class="feature-box">
				<?php
					switch ($status_format):
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
								<?php the_field('video_event'); ?>
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
				<div class="carousel-box">
					<div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff" class="swiper mySwiper2">		
					<?php 
						if( $images ): ?>
							<div class="swiper-wrapper">
								<?php foreach( $images as $image_id ): ?>
									<div class="swiper-slide">
									<img src="<?php echo $image_id['url']; ?>" />
									</div>
								<?php endforeach; ?>
							</div>
						<?php endif; ?>
					
						<div class="swiper-button-next"></div>
						<div class="swiper-button-prev"></div>
					</div>
					<div thumbsSlider="" class="swiper mySwiper">
					<?php if( $images ): ?>
							<div class="swiper-wrapper">
								<?php foreach( $images as $image_idx ): ?>
									<div class="swiper-slide">
									<img src="<?php echo $image_idx['url']; ?>" />
									</div>
								<?php endforeach; ?>
							</div>
						<?php endif; ?>
					</div>
				</div>

				
			</div>		
		</div>
	</div>
</div>

<?php
// get_sidebar();
footer_fuc();
