<?php
/**
* Template Name: APEC Meetings
*
*/
header_fuc();
?>
<div class="meeting-page">
  <div class="title-cat" style="background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/new-customize/img/meeting-bg.jpg');">
      <div class="v-container">
          <img src="<?php echo get_stylesheet_directory_uri(); ?>/new-customize/img/icon-meetings.png" alt="icon-page" class="icon-page icon-meeting">
          <h2 class="title-h2_page"><?php echo get_the_title(); ?></h2>
      </div>
  </div>
  <div class="box-meeting box-page">
      <div class="v-container">
          <div class="title-box">
            <h2 class="title-h2_page"><?php echo get_the_title(); ?></h2>
            <p class="p-area"><?php esc_html_e( 'From December 2021 until November 2022, Thailand will host hundreds  of APEC meetings in dozens of clusters, with many more unique sessions. This page will be updated throughout our host year.', 'fluffy' )?></p>        
          </div>
        <div class="recent-meetings box-meeting_loop">
            <div class="sec-meeeting">
            <?php
                $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                $no = 12;
                if($paged==1){
                $offset=0;  
                }else {
                $offset= ($paged-1)*$no;
                }

              $args = array(
                'post_type' => 'mec-events',
                'posts_per_page' => $no, 
                'offset' => $offset,
                'order' => 'DESC',
                'orderby'    => 'date',
                'paged' => $paged,
                'meta_query' => array( // WordPress has all the results, now, return only the events after today's date
                  array(
                      'key' => 'mec_end_date', // Check the start date field
                      'value' => date("Y-m-d"), // Set today's date (note the similar format)
                      'compare' => '>=', // Return the ones greater than today's date
                      'type' => 'DATE' // Let WordPress know we're working with date
                      )
                  ),
              );
              // The Query
              query_posts( $args );
              ?>
              <?php
              // The Loop
              while ( have_posts() ) : the_post();
              $end_old = get_post_meta( get_the_ID(), 'mec_end_date', true );
                get_template_part( 'new-customize/template-parts/content', 'card-two');
              endwhile;
              seed_posts_navigation();
              // Reset Query
              wp_reset_query();	?>
          </div>
          <!-- <div class="box-button">
            <a href="#" class="btn-card btn-meetings"><?php //esc_html_e( 'All Meetings', 'fluffy' ); ?></a>
          </div> -->
        </div>
          <div class="title-box">
            <h2 class="title-h2_page"><?php esc_html_e( 'Past meetings', 'fluffy' ); ?></h2>
            <p class="p-area"><?php esc_html_e( 'Meetings that have concluded.', 'fluffy' )?></p>        
          </div>
          <div class="recent-meetings box-meeting_loop past-meetings">
            <div class="sec-meeeting">
            <?php
              $args = array(
                'post_type' => 'mec-events',
                'posts_per_page' => 12,
                'order' => 'DESC',
                'orderby' => 'date',
                'meta_query' => array( // WordPress has all the results, now, return only the events after today's date
                  array(
                      'key' => 'mec_end_date', // Check the start date field
                      'value' => date("Y-m-d"), // Set today's date (note the similar format)
                      'compare' => '<', // Return the ones greater than today's date
                      'type' => 'DATE' // Let WordPress know we're working with date
                      )
                  ),
              );
              // The Query
              query_posts( $args );
              ?>
              <?php
              // The Loop
              while ( have_posts() ) : the_post();
              $end_old = get_post_meta( get_the_ID(), 'mec_end_date', true );
                get_template_part( 'new-customize/template-parts/content', 'card-two');
              endwhile;

              // Reset Query
              wp_reset_query();	?>
          </div>
        </div>
        
      </div>
  </div>
</div>
<?php
?>
<?php footer_fuc(); ?>
