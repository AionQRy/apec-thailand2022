<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="box-thumbnail">
		<a href="<?php echo get_the_permalink(); ?>">
			<?php
			$post_categories = get_the_terms(get_the_ID(), 'category' );
			$image_url = get_field('category_image','category_'.$post_categories[0]->term_id)['url'];
			$banner_image = get_field('banner_image',get_the_ID());
			 ?>
			<?php if ( has_post_thumbnail() ) : ?>
				<?php
				if ($image_url == '' && 'courses' != get_post_type()) {
					$image_url = get_bloginfo( 'stylesheet_directory' ). '/images/thumbnail-default.jpg';
				}
				else if ( 'courses' == get_post_type() ) {
						$image_url = get_the_post_thumbnail_url(get_the_ID());
				}
				else if ($image_url != '' && $banner_image == '') {
					$image_url = $image_url;
				}
				else if ($banner_image != '') {
					$image_url = get_field('banner_image',get_the_ID())['url'];
				}
				else {
					$image_url = get_the_post_thumbnail_url(get_the_ID());
				}
				 ?>
			<div class="feature_post">
				<a href="<?php the_permalink() ?>">
					<img src="<?php echo $image_url; ?>" alt="feature_post">
				</a>
		</div>
				<?php else:?>
			<?php
			// echo $image_url;
			if ($image_url == '' && $banner_image == '') {
				$image_url = get_bloginfo( 'stylesheet_directory' ). '/images/thumbnail-default.jpg';
			}
			else if ($image_url != '' && $banner_image == '') {
				$image_url = $image_url;
			}
				else if ($banner_image != '') {
					$image_url = get_field('banner_image',get_the_ID())['url'];
				}
				else {
					$image_url = get_bloginfo( 'stylesheet_directory' ). '/images/thumbnail-default.jpg';
				}
			?>
				<div class="feature_post">
				<img src="<?php echo $image_url; ?>" alt="feature_post">
			</div>

			<?php endif; ?>


	    </a>
    </div>
    <div class="detail">
        <div class="box-title">
            <a href="<?php echo get_the_permalink(); ?>">
                <h3 class="post-title"><?php echo get_the_title(); ?></h3>
            </a>
        </div>
        <?php
        $post_categories = get_the_terms( get_the_ID(), 'category' );
        if ( ! empty( $post_categories ) && ! is_wp_error( $post_categories ) ):
        ?>
        <div class="box-category">
            <div class="cat-title">
                <i class="las la-folder-open"></i>
                <?php
                    $categories = wp_list_pluck( $post_categories, 'name' );
                    foreach ($post_categories as $post_category) {
                ?>
                    <li><a href="<?php echo get_term_link( $post_category->slug, 'category' ); ?>"><?php echo $post_category->name; ?></a></li>
                <?php
                    }
                ?>
            </div>
        </div>
        <?php endif; ?>
    </div>
</article>
