<?php  if (!defined('ABSPATH')) exit; ?>
<?php get_header(); ?>

<h1><?php the_title(); ?></h1>

<div class="flex-container">


<main id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <?php 
        if ( have_posts() ) : 
        while ( have_posts() ) : the_post();
            the_content();
        endwhile;
    else :
        _e( 'Sorry, no posts matched your criteria.', 'montreal-real-estate-billy-poppins' );
    endif;
    ?>

<?php wp_link_pages(); ?>  
</main>

<?php get_sidebar(); ?>
</div>

<?php get_footer(); ?>