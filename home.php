<?php  if (!defined('ABSPATH')) exit; ?>
<?php get_header(); ?>

<h1><?php the_title(); ?></h1>

<div class="flex-container">


<main id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <?php 
        if ( have_posts() ) : 
        while ( have_posts() ) : the_post(); ?>
        
        <section class="blogpost">
        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
        
        <div class="flexbox">
            <?php the_post_thumbnail(); ?>
            <?php 
            if ( is_home() || is_category()||is_archive()){ the_excerpt(); }
                else {
            the_content();
            } ?>
            </div>

        </section>
        <?php endwhile;
    else :
        _e( 'Sorry, no posts have been published yet.', 'montreal-real-estate-billy-poppins' );
    endif;
    ?>

<?php wp_link_pages(); ?>  
</main>

<?php get_sidebar(); ?>
</div>

<?php get_footer(); ?>