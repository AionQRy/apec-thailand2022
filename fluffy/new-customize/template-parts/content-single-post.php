<?php 
    /**
     * Template part for displaying posts
     *
     * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
     *
     * @package 
     */
?>
<div id="article-<?php echo get_the_ID();?>" class="article">
    <div class="content">
        <p><?php echo the_content(); ?></p>
    </div>
    <div class="footer-content">

    </div>
</div>