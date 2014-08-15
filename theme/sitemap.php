<?php
/**
 * Template Name: Sitemap Page
 */
?>
<?php get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>
<div class="breadcrumbs">
    <?php if(function_exists('bcn_display'))
    {
        bcn_display();
    }?>
</div>
<div id="content-wrapper">

<?php get_sidebar('left')?>

<div id="right-content">
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
	<h2 style="background:none; margin:0;"><?php the_title();?></h2>
		
		<ul id="sitemap">
			<?php wp_nav_menu( array( 'theme_location' => 'sitemap' ) ); ?>
		</ul>
		
		<?php endwhile; ?>
		<br class="clear"/>
</div>

<?php get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer') ); ?>