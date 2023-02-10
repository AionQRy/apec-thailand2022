<article id="post-<?php the_ID(); ?>" class="post-card-one">
    <div class="main-object">
        <div class="object-1">
        <?php
            $post_categories = get_the_terms(get_the_ID(), 'category' );
            $image_url = get_the_post_thumbnail_url(get_the_ID());
            $non_image_url = get_bloginfo( 'stylesheet_directory' ). '/img/thumb.jpg';
        ?>
            <div class="box-thumbnail" style="<?php if(has_post_thumbnail()){ echo "background-image: url($image_url);";}else{ echo "background-image: url($non_image_url);"; }?>    background-position: center;
    background-size: cover;
    height: 100%;
    width: 100%;">
                    <?php if ( has_post_thumbnail() ) : ?>
                    <div class="feature-image_card">
                        <a href="<?php the_permalink() ?>">
                            <img src="<?php echo $image_url; ?>" alt="feature_post">
                        </a>           
                    </div>
                    <?php else: 
                        $image_url = get_bloginfo( 'stylesheet_directory' ). '/img/thumb.jpg';
                    ?>
                    <div class="feature-image_card">
                        <a href="<?php the_permalink() ?>">
                            <img src="<?php echo $image_url; ?>" alt="feature_post">
                        </a>           
                    </div>
                    <?php endif; ?>
            </div>
        </div>
        <div class="object-2">
            <div class="box-cat">
                <span class="cat-text">New & Top Stories</span>
            </div>
            <div class="box-title">
                <h3><a href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title(); ?></h3></a>
            </div>
            <div class="box-excerpt">
                <p><?php excerpt('100'); ?></p>
            </div>
            <div class="box-info_column">
                <div class="main-object">
                    <div class="object-1">
                        <?php 
                        $post_date = get_the_date( 'j F Y' );
                        ?>
                        <span class="calendar-text"><svg viewBox="0 0 24 24" width="24" height="24" stroke="#0074bc" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg><?php echo $post_date; ?></span>
                    </div>
                    <div class="object-2">
                        <a href="<?php echo get_the_permalink(); ?>" class="btn btn-card-one btn-card elementor-animation-grow"><?php esc_html_e( 'Read More', 'fluffy' ); ?></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</article>
