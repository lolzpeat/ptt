<?php
/**
 * Template Name: Blue Hangout

 */
?>
<?php get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>
 <div id="fb-root"></div>
    <script>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=423477647687325";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
<div class="breadcrumbs">
    <?php if(function_exists('bcn_display'))
    {
        bcn_display();
    }?>
</div>
<div id="content-wrapper">

<?php get_sidebar('left')?>
	<div id="blue-lifestyle">
		<div id="masonry-content">
			<?php if ( have_posts() ): ?>
			<?php $result = query_posts('cat=5&order=ASC&orderby=title' . '&paged=' . get_query_var('paged'));
			$index=0;
			while ( have_posts() ) : the_post(); ?>
			<div class="col3">
				<?php the_post_thumbnail(); ?>
				<h2><a href="<?php esc_url( the_permalink() ); ?>" title="Permalink to <?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
				<?php the_excerpt(); ?><a class="readmore-detail" href="<?php esc_url( the_permalink() ); ?>" title="Permalink to <?php the_title(); ?>">...อ่านต่อ</a>
				<div class="line"></div>
				<div class="like">
					<?php echo '<div class="fb-like" data-href="'.rawurlencode(get_permalink()).'" data-send="false" data-layout="button_count" data-width="450" data-show-faces="false"></div>'; ?>		
				</div>
				<div class="comment">
					<?php comments_popup_link('', '1', '%'); ?>
				</div>
			</div>
			<?php endwhile; ?>
			<?php else: ?>
				<h2>No posts to display</h2>
			<?php endif; ?>
		</div>
	</div>

</div>
<br class="clear"/>
<?php get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer') ); ?>