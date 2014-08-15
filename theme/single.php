<?php
/**
 * The Template for displaying all single posts
 *
 * Please see /external/starkers-utilities.php for info on get_template_parts()
 *
 * @package 	WordPress
 * @subpackage 	Starkers
 * @since 		Starkers 4.0
 */
?>
<?php get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>
<?php 
	global $wp_query;
	$categories = get_the_category($post->ID);
	$query_cat = $categories[1]->term_id;
	$this_post = $post->ID;
?>
<?php get_sidebar('left')?>
<div class="breadcrumbs">
    <?php if(function_exists('bcn_display'))
    {
        bcn_display();
    }?>
</div>
<div id="right-content">

	<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

	<article id="news-detail">
		<div id="news-detail-title">
	    <?php //echo get_cat_name();?>
			<h3><?php the_title(); ?></h3>
			<div id="author-detail">
				<strong id="author-name"><?php echo get_the_author() ; ?></strong> : <?php the_time( 'd-m-Y' ); ?> : <?php the_time(); ?>
			</div> 
		</div>
	   
		<?php the_content(); ?>
		<!-- link to privilege button -->
		<?php if(get_field('link_to_privilege')) { ?>
			<a target="_blank" href="<?php the_field('privilege_page_link');?>" class="view-privilege">Link to Privilege Page</a>
		<?php } ?> 
	</article>
	<div id="social-share" class="alignright">
	    <div id="fb-root"></div>
	    <script>(function(d, s, id) {
	      var js, fjs = d.getElementsByTagName(s)[0];
	      if (d.getElementById(id)) return;
	      js = d.createElement(s); js.id = id;
	      js.src = "//connect.facebook.net/th_TH/all.js#xfbml=1&appId=423477647687325";
	      fjs.parentNode.insertBefore(js, fjs);
	    }(document, 'script', 'facebook-jssdk'));</script>
	    
		<?php 
		echo '<div class="fb-like facebook" data-href="'.get_permalink().'" data-send="false" data-layout="button_count" data-width="450" data-show-faces="false"></div>';
		//echo '<iframe src="//www.facebook.com/plugins/like.php?href='.rawurlencode(get_permalink()).'&amp;send=false&amp;layout=button_count&amp;width=450&amp;show_faces=true&amp;action=like&amp;colorscheme=light&amp;font&amp;height=21&amp;appId=102550449895360" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:109px; height:21px;" allowTransparency="true"></iframe>';
		echo '<div class="twitter"><a href="https://twitter.com/share" class="twitter-share-button" data-url="'.get_permalink().'">Tweet</a>
	<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script></div>';
		?>
		<!-- Place this tag where you want the +1 button to render. -->
		<div class="g-plus-one">
			<div class="g-plusone" data-size="medium" data-href="<?php get_permalink(); ?>"></div>
		</div>



	</div>

	<?php endwhile; ?>
</div>


	<?php // comments_template( '', true ); ?>

	<div id="related-content">
		
		<h2 class="related-content-h">
		<?php if ($query_cat==4) { echo "Blue Update"; }
					if ($query_cat==5) { echo "Blue Hangout"; }
					if ($query_cat==7) { echo "News & Event"; }
		?>
		</h2>
		<small>		
			<?php if ($query_cat==4) { echo "นำเทรนด์ กับประเด็นสุดฮ็อต"; }
						if ($query_cat==5) { echo "กิน เที่ยว ช็อป สไตล์ชาวบลู"; }
						if ($query_cat==7) { echo "เรื่องเล่าดีๆ จาก ปตท."; }
			?>
		</small>
		<div class="clear"></div>
		<div class="line" style="width:980px; background-repeat:repeat-x;"></div>
		<?php //if ( have_posts() ): ?>
		<?php  /*/$result = query_posts('cat='.$query_cat.'&posts_per_page=4&orderby=rand' . '&paged=' . get_query_var('paged'));
		$index=0;
		while ( have_posts() ) : the_post(); */?>
		<?php if ( have_posts() ): ?>
		<?php
		    $my_query = new WP_Query(array(
		        'cat' => $query_cat,
		        'post__not_in' => array($this_post),
		        'posts_per_page' => 4,
		        'orderby' => date,
		        'paged' => $paged,
		    ));
		    while ($my_query->have_posts()) : $my_query->the_post();
		?>
		
		<div class="col3">
			<?php if (in_category(4)) : ?>
				<div class="badge gadget"></div>
			<?php elseif (in_category(5)) : ?>
				<div class="badge hangout"></div>
			<?php endif; ?>
			<?php the_post_thumbnail(); ?>
			<h2><a href="<?php esc_url( the_permalink() ); ?>" title="<?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
			<?php the_excerpt(); ?>
			<div class="line"></div>
			<div class="like">
			<?php 
				echo '<div class="fb-like" data-href="'.get_permalink().'" data-send="false" data-layout="button_count" data-width="450" data-show-faces="false"></div>';
			?>
			</div>
			<!-- <div class="comment">
				<?php //comments_popup_link('', '1', '%'); ?>
			</div> -->
		</div>
		<?php endwhile; ?>
		<?php else: ?>
			<h2>No posts to display</h2>
		<?php endif; ?>
	</div>

<?php get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>
<script type="text/javascript">
jQuery(document).ready(function($) {
	// Add Download Button
	var imgURL;
	$('.ngg-gallery-thumbnail a').live('mousedown',function() {
		imgURL = $(this).attr('data-src');
		$('.btn-download').remove();
		$('#fancybox-outer').append('<a target="_blank" class="btn-download" href="'+imgURL+'"></a>');
	});


	setInterval(function(){
		if($('#fancybox-img').attr('src') != undefined && imgURL != $('#fancybox-img').attr('src')){
			imgURL = $('#fancybox-img').attr('src');
			$('.btn-download').attr({'href':imgURL});
		}
	}, 100);
});
</script>