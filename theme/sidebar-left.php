<div id="left-sidebar">
	<?php if ( is_page_template( 'about-blue-card.php' ) ) { ?>
	<ul id="bluecard-menu">

		<?php wp_nav_menu( array( 'theme_location' => 'bluecard_menu' ) ); ?>
	</ul>

	<?php } ?>

	<div class="col3">
		<a href="https://www.pttbluecard.com/Register/Register.aspx"><img src="<?php bloginfo('template_directory'); ?>/images/left_banner.jpg" alt="กิน เที่ยว ช็อป"/></a>
	</div>

	<!-- News & Event
	<?php // if ( is_page_template( 'news-event.php' ) ) { ?>
	<div class="col3-padding">
		<h2>News & Event</h2>
		<small> เรื่องเล่าดีๆ จาก ปตท.</small>
		<?php $result = query_posts('cat=7&order=ASC&posts_per_page=1&orderby=title' . '&paged=' . get_query_var('paged'));
		$index=0;
		while ( have_posts() ) : the_post(); ?>
		<a class="img-thumb" href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_post_thumbnail();?></a>
		<h2 class="news-event-title">
			<a href="<?php the_permalink() ?>"><?php the_title(); ?></a>
		</h2>
		<p><?php the_excerpt();?></p>
		<a href="<?php bloginfo('home'); ?>/news-event" class="readmore">See More</a>
		<?php endwhile; ?>
		<?php wp_reset_query();?>
		<div class="clear"></div>
	</div>
		<?php // } ?>
	-->
<?php query_posts('posts_per_page=1&meta_key=stick_front_page&meta_value=1');  ?>
<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>
	<div class="col3-padding" style="background:none repeat scroll 0 0 #595A59;">
		<h2>PR &amp; News</h2>
		<small> เรื่องเล่าดีๆ จาก ปตท.</small>
		<!-- Display News & Event Latest and tick Stick Front Page -->
			<a class="img-thumb" style="margin: 10px 0; display:block" href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_post_thumbnail();?></a>
			<h2 class="news-event-title"style="margin-top:0px;">
				<a href="<?php the_permalink() ?>"><?php the_title(); ?></a>
			</h2>
			<p><?php the_excerpt();?></p>
			<a href="<?php bloginfo('home'); ?>/news-event" class="readmore">See More</a>
			<div class="clear"></div>

		<div class="clear"></div>
	</div>
<?php endwhile; ?>
<?php endif; ?>
<?php wp_reset_query(); ?>
	<!-- e-Newsletter -->
	<div class="col3-padding">
		<h2>e-Newsletter</h2>
		<small>ข่าวสารอัพเดท ตรงถึงชาวบลู</small>
		<p>กรอกอีเมล์เพื่ออัพเดตข่าวสาร กับ <strong class="blue">PTT Blue Society</strong></p>
        <iframe width="100%" height="100" scrolling="no" frameborder="0" src="http://www.pttbluesociety.com/pttbluecard/?wysija-page=1&controller=subscribers&action=wysija_outter&widgetnumber=2&external_site=1&wysijap=subscriptions" name="wysija-1349670014" class="iframe-wysija" id="wysija-2" vspace="0" tabindex="0" style="position: static; top: 0pt; margin: 0px; border-style: none; left: 0pt; visibility: visible;" marginwidth="0" marginheight="0" hspace="0" allowtransparency="true" title="Subscription Wysija"></iframe>
	</div>

	<!-- Blue Station -->

	<div class="col3-padding">
		<h2>Blue Station</h2>
		<small>สถานที่เติมความสุข</small>
		<a href="http://www.pttmap.com/"><img src="<?php bloginfo('template_directory'); ?>/images/blue-station.jpg" alt="ค้นหาสถานี"/></a>
	</div>

	<!-- Facebook
	<div class="facebook-box col3">
		<a href="http://www.facebook.com/pttbluesociety"><img src="<?php bloginfo('template_directory'); ?>/images/facebook-h.jpg" alt="Facebook"/></a>
         <div id="fb-root"></div>
		  <script>(function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
            fjs.parentNode.insertBefore(js, fjs);
          }(document, 'script', 'facebook-jssdk'));</script>

          <div class="fb-like-box" data-href="http://www.facebook.com/pttbluesociety" data-width="226" data-show-faces="true" data-stream="false" data-header="false" data-colorscheme="light" style="border:none; background:#fff; overflow:hidden; width:226px; height:258px;"></div>

	</div>-->

	<!-- Twitter
	<div class="twitter-box col3">
		<iframe width="230" scrolling="no" height="465" frameborder="0" src="<?php bloginfo('url'); ?>/twitter.html"></iframe>
	</div>-->

	<!-- Related Website -->
	<div class="col3-padding">
		<h2>Related Pages</h2>
		<small>สาระน่ารู้อื่นๆ จาก ปตท.</small>
		<ul id="related-website">
			<li><a target="_blank" href="http://www.pttplc.com"><img src="<?php bloginfo('template_directory'); ?>/images/logo-ptt.png" alt="PTT Plc."/> PTT Plc.</a></li>
			<li><a target="_blank" href="http://www.facebook.com/PTTNews"><img src="<?php bloginfo('template_directory'); ?>/images/logo-ptt-news.png" alt="PTT Plc."/> PTT News</a></li>
			<li><a target="_blank" href="http://www.facebook.com/WeLovePTT"><img src="<?php bloginfo('template_directory'); ?>/images/logo-we-love-ptt.png" alt="PTT Plc."/> We Love PTT</a></li>
			<li><a target="_blank" href="http://www.facebook.com/Pttmotorsport"><img src="<?php bloginfo('template_directory'); ?>/images/logo-ptt-motor-sport.png" alt="PTT Plc."/> PTT Motor Sport</a></li>
		</ul>
		<br class="clear"/>
	</div>
</div>