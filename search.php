<?php if (!defined('ABSPATH')) exit;
get_header(); ?>

<div class="flex-container">
<main id="post-<?php the_ID(); ?>" <?php post_class(); ?>>    
<?php
$s=get_search_query();
$args = array(
                's' =>$s
            );

$the_query = new WP_Query( $args );
if ( $the_query->have_posts() ) {
    _e("<h1>Search Results for: ".get_query_var('s')."</h1>");
    while ( $the_query->have_posts() ) {
    $the_query->the_post();
            ?>
                <li>
                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                </li>
            <?php
    }
}else{
?>
<h1>No Results Found For These Search Terms</h1>
<div class="alert alert-info">
<p>Sorry, but nothing matched your search criteria. Please try again with some different keywords.</p>
</div>
<?php } ?>
</main>

<?php get_sidebar(); ?>
</div>

<?php get_footer(); ?>