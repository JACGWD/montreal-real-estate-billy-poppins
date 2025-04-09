<?php if (!defined('ABSPATH')) exit;
if ( is_active_sidebar('widget_1')  ) : ?>
        <aside class="sidebar widget-area" role="complementary">
        <?php dynamic_sidebar( 'widget_1' ); ?>
</aside>
<?php endif; 
?>
