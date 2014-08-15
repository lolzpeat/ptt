<?php
/**
 * Search results page
 * 
 * Please see /external/starkers-utilities.php for info on get_template_parts()
 *
 * @package 	WordPress
 * @subpackage 	Starkers
 * @since 		Starkers 4.0
 */
?>
<?php get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>
<div class="breadcrumbs">
    <?php if(function_exists('bcn_display'))
    {
        bcn_display();
    }?>
</div>
<?php get_sidebar('left')?>

<div id="right-content">
<?php if ( have_posts() ): ?>
<h2>Search <small>ค้นหา</small></h2>
<ol id="search-result">
<?php while ( have_posts() ) : the_post(); ?>
	<li>
		<article class="search-list">
			<h4><a href="<?php esc_url( the_permalink() ); ?>" title="Permalink to <?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a></h4>
			<p class="time"><?php the_time( 'd-m-Y' ); ?></p>
			<?php the_excerpt(); ?>
		</article>
	</li>
<?php endwhile; ?>
</ol>
<?php else: ?>
<h2>No results found for '<?php echo get_search_query(); ?>'</h2>
<?php endif; ?>
</div>
<?php get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>