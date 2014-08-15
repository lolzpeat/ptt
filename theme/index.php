<?php
/**
 * The main template file
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file
 *
 * Please see /external/starkers-utilities.php for info on get_template_parts()
 *
 * @package 	WordPress
 * @subpackage 	Starkers
 * @since 		Starkers 4.0
 */
?>
<?php get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>

<div id="content-wrapper">

<?php get_sidebar('left')?>

<div id="center-content">
	<div class="col2">
		<div id="main-content-slide">
			<div class="slider-wrapper theme-default">
				<div id="slider" class="nivoSlider">
					<!-- load slider from /module/html/wp-include/rotate-banner/rotate-banner.php -->
				</div>
			</div>
		</div>
	</div>
	<div id="mr-blue">
		 <?php $result = query_posts('cat=9&order=ASC&posts_per_page=1&orderby=title' . '&paged=' . get_query_var('paged'));
					$index=0;
			while ( have_posts() ) : the_post(); ?>
				<p><?php the_content(); ?></p>
			<?php endwhile; ?>
			<?php wp_reset_query(); ?>
	</div>
	<br class="clear"/>
	<script type="text/javascript">
		jQuery(document).ready(function() {
			// Masonry
			var $container = jQuery('#center-content > #masonry-content');
			$container.imagesLoaded(function(){
			  $container.masonry({
				itemSelector: '.col3',
				  // set columnWidth a fraction of the container width
				  columnWidth: function( containerWidth ) {
					return containerWidth / 3;
				  }
				});
			});

			$container.infinitescroll({
			  navSelector  : '#nav-below',    // selector for the paged navigation
			  nextSelector : '#nav-below .nav-previous a',  // selector for the NEXT link (to page 2)
			  itemSelector : '#masonry-content > .col3',     // selector for all items you'll retrieve
			  loading: {
				  finishedMsg: 'No more pages to load.',
				  img: '<?php bloginfo('template_directory'); ?>/images/ajax-loader.gif'
				}
			  },

			  // trigger Masonry as a callback
			  function( newElements ) {
				// hide new items while they are loading
				var $newElems = jQuery( newElements ).css({ opacity: 0 });
				// ensure that images load before adding to masonry layout
				$newElems.imagesLoaded(function(){
				  // show elems now they're ready
				  $newElems.animate({ opacity: 1 });

				$container.masonry( 'appended', $newElems, true );

				});
				Cufon.replace('h2');
			  });

		});
	</script>
	<?php if ( have_posts() ): ?>
	<?php
	    $my_query = new WP_Query(array(
	        'orderby' => date,
	        'paged' => $paged,
	        'posts_per_page' => 1
	    ));
	    while ($my_query->have_posts()) : $my_query->the_post();
	?>
	<?php if( get_field('pin_to_blog') ) { ?>
	<div class="pin-blog">
		<div class="column blog-col1">
			<?php the_field('col_1'); ?>
		</div>
		<div class="column blog-col2">
			<?php the_field('col_2'); ?>
		</div>
		<div class="column blog-col3">
			<?php the_field('col_3'); ?>
		</div>
	</div>
	<?php } ?>
	<?php endwhile; ?>
	<?php endif; ?>
	<?php wp_reset_query(); ?>
	<br class="clear"/>
	<div id="masonry-content">
		<?php if ( have_posts() ): ?>
		<?php
		    $my_query = new WP_Query(array(
		        'cat' => 10,
		        'orderby' => date,
		        'paged' => $paged,
		    ));
		    while ($my_query->have_posts()) : $my_query->the_post();
		?>
		<div class="col3">
<!-- 			<?php if (in_category(4)) : ?>
				<div class="badge gadget"></div>
			<?php elseif (in_category(5)) : ?>
           <?php
				$data.=get_the_ID().'<br />';
			?>
				<div class="badge hangout"></div>
			<?php endif; ?> -->
			<div class="post-thumbnail"><a href="<?php esc_url( the_permalink() ); ?>" title="<?php the_title(); ?>"><?php the_post_thumbnail(); ?></a></div>
			<h2><a href="<?php esc_url( the_permalink() ); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
				<?php the_excerpt(); ?>...
				<a class="readmore-detail" href="<?php esc_url( the_permalink() ); ?>" title="<?php the_title(); ?>">อ่านต่อ</a>
			<div class="clear"></div>
			<div class="line"></div>
			<div class="like">
				<?php
					echo '<iframe src="//www.facebook.com/plugins/like.php?href='.rawurlencode(get_permalink()).'&amp;send=false&amp;layout=button_count&amp;width=450&amp;show_faces=true&amp;action=like&amp;colorscheme=light&amp;font&amp;height=21&amp;appId=102550449895360" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:109px; height:21px;" allowTransparency="true"></iframe>';
				?>

			</div>
			<!-- <div class="comment">
				<?php // comments_popup_link('', '1', '%'); ?>
			</div> -->

		</div>

		<?php endwhile; ?>
		<?php else: ?>
			<h2>No posts to display</h2>
		<?php endif; ?>

        <?php wp_reset_query(); ?>

	</div>
</div>

<?php get_sidebar('right')?>

</div>

<?php get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer') ); ?>