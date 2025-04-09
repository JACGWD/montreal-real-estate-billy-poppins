<?php
if ( !defined( 'ABSPATH' ) )
exit;
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <?php wp_head(); ?>
    <?php // add font code here ?>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100..700;1,100..700&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    </head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div class='align-right'>
   <button class='hide-text'>Menu</button>
</div>

<header>
<div class='branding'>
    <?php
    if ( function_exists( 'the_custom_logo' ) ) {
        the_custom_logo();
    }
    ?>

    <div class="siteinfo">
        <a href='<?php echo esc_url(home_url()); ?>'>
        <?php bloginfo( 'name' );
        ?>
        </a>
       

        <div class='description'>
        <?php bloginfo( 'description' );
        ?>
        </div> 
    </div>
</div>

<?php get_search_form(); ?>
</header>


<nav class="primary-nav">
<?php
wp_nav_menu( array(
'menu_class'	  	=> 'primary-menu',  // adds: class = 'primary-menu'
'theme_location' 	=> 'header-menu',   // is controlled as the 'header menu' in the backend
'menu_id'	    	=> 'menu',          // adds: id = 'menu'
'container'         => 'div',           // menu is inside a div class="menu-header-container"
) );
?>
</nav>
