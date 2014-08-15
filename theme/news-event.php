<?php
/**
 * Template Name: News & Event

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
	<h2 style="margin:0;"><?php the_title();?> <small>เรื่องเล่าดีๆ จาก ปตท.</small></h2>
		<?php $result = query_posts('cat=7&order=ASC&posts_per_page=10&orderby=title' . '&paged=' . get_query_var('paged'));
		$index=0;
		while ( have_posts() ) : the_post(); ?>
		<div class="news-list">
			<div class="news-thumb" style="overflow:hidden; height:171px">
				<a class="img-thumb" href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_post_thumbnail();?></a>
			</div>
			<div class="news-detail">
				<a class="title" href="<?php the_permalink() ?>"><strong><?php the_title(); ?></strong></a> <br/>
				<?php the_date('d-m-Y', '<div id="news-detail-date">', '</div>'); ?>
				<?php the_excerpt();?>
			</div>
			<div class="social-share">
             <div style="width:100px; float:left; overflow:hidden;">
			 <div id="fb-root"></div>
								<script>(function(d, s, id) {
					 var js, fjs = d.getElementsByTagName(s)[0];
					 if (d.getElementById(id)) return;
					 js = d.createElement(s); js.id = id;
					 js.src = "//connect.facebook.net/en_EN/all.js#xfbml=1&appId=423477647687325";
					 fjs.parentNode.insertBefore(js, fjs);
					            }(document, 'script', 'facebook-jssdk'));</script>
									<?php 
									//echo '<iframe src="//www.facebook.com/plugins/like.php?href='.rawurlencode(get_permalink()).'&amp;send=false&amp;layout=button_count&amp;width=450&amp;show_faces=true&amp;action=like&amp;colorscheme=light&amp;font&amp;height=21&amp;appId=102550449895360" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:109px; height:21px;" allowTransparency="true"></iframe>';
									echo '<div class="fb-like" data-href="'.rawurlencode(get_permalink()).'" data-send="false" data-layout="button_count" data-width="450" data-show-faces="false"></div></div>';
				echo '<div style="width:240px; float:left;"><a href="https://twitter.com/share" class="twitter-share-button" data-url="'.get_permalink().'">Tweet</a>
			<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>';
			
				echo '<!-- Place this tag where you want the +1 button to render -->
				<g:plusone size="medium" href="'.get_permalink().'"></g:plusone>
				
				<!-- Place this render call where appropriate -->
				<script type="text/javascript">
				  (function() {
					var po = document.createElement(\'script\'); po.type = \'text/javascript\'; po.async = true;
					po.src = \'https://apis.google.com/js/plusone.js\';
					var s = document.getElementsByTagName(\'script\')[0]; s.parentNode.insertBefore(po, s);
				  })();
				</script></div>';
				?>

			</div>
			<br class="clear"/>
		</div>
		<?php endwhile; ?>
		<br class="clear"/>
		<?php wp_pagenavi(); ?>
		<?php wp_reset_query();?>
</div>

<?php get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer') ); ?>