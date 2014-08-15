<?php
/**
 * The template for displaying Category Archive pages
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
<div id="content-wrapper">

<?php get_sidebar('left')?>
	<script type="text/javascript">
		jQuery(document).ready(function() {
			// Masonry
			var $container = jQuery('#masonry-content');
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

			<?php if (is_category(10)) : ?>
				jQuery('.breadcrumbs').css('color','white');
				jQuery('.breadcrumbs').append('<span class="white"> / </span> <span class="blue">All Recommended</span>');
			<?php endif; ?>

		});
	</script>
	<div id="blue-privilege">
		<div id="blue-privilege-h">
			<?php if (in_category(4)) : ?>
				<h2 class="blue-content-h">Blue Update</h2> <small class="blue-content-small">นำเทรนด์ กับประเด็นสุดฮ็อต</small>
			<?php elseif (in_category(5)) : ?>
				<h2 class="blue-content-h">Blue Hangout</h2> <small class="blue-content-small">กิน เที่ยว ช็อป สไตล์ชาวบลู</small>
			<?php elseif (is_category(10)) : ?>
				<h2 class="blue-content-h">Blue Privilege</h2> <small class="blue-content-small">แนะนำความสุข สำหรับชาวบลู</small> <a href="https://www.pttbluecard.com/view/redeem/Redeem.aspx?type=3" class="view-all-privilege top"></a>
				<div class="clear"></div>
			<?php else : ?>
				<h2 class="blue-content-h"><?php single_cat_title(''); ?></h2> <small class="blue-content-small"> </small><a href="https://www.pttbluecard.com/view/redeem/Redeem.aspx?type=3" class="view-all-privilege top"></a>
			<?php endif; ?>
		</div>
		<div id="masonry-content">

			<?php if ( have_posts() ): ?>
			<?php while ( have_posts() ) : the_post(); ?>
            <?php
				$data.=get_the_ID().'<br />';
			?>
			<div class="col3">
				<?php if (in_category(4)) : ?>
					<div class="badge gadget"></div>
				<?php elseif (in_category(5)) : ?>
					<div class="badge hangout"></div>
				<?php endif; ?>
				<div class="post-thumbnail"><a href="<?php esc_url( the_permalink() ); ?>" title="<?php the_title(); ?>"><?php the_post_thumbnail(); ?></a></div>
				<h2><a href="<?php esc_url( the_permalink() ); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
				<?php the_excerpt(); ?>...
				<a class="readmore-detail" href="<?php esc_url( the_permalink() ); ?>" title="<?php the_title(); ?>">อ่านต่อ</a>
				<div class="clear"></div>
				<div class="line"></div>
				<div class="like">
					<?php 
					echo '<iframe src="//www.facebook.com/plugins/like.php?href='.rawurlencode(get_permalink()).'&amp;send=false&amp;layout=button_count&amp;width=450&amp;show_faces=true&amp;action=like&amp;colorscheme=light&amp;font&amp;height=21&amp;appId=102550449895360" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:109px; height:21px;" allowTransparency="true"></iframe>';
					/*echo '<div class="fb-like" data-href="'.rawurlencode(get_permalink()).'" data-send="false" data-layout="button_count" data-width="450" data-show-faces="false"></div>';*/ ?>
				</div>
				<!-- <div class="comment">
					<?php// comments_popup_link('', '1', '%'); ?>
				</div> -->
			</div>
			<?php endwhile; ?>
			<?php else: ?>
				<p>ไม่มีเนื้อหาในส่วนนี้</p>
			<?php endif; ?>
		</div>
		<div class="clear"></div>
		<div class="line"></div>
		<a href="https://www.pttbluecard.com/view/redeem/Redeem.aspx?type=3" class="view-all-privilege bottom"></a>
	</div>

	<?php get_sidebar('privilege'); ?>

</div>
<br class="clear"/>

<?php get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer') ); ?>