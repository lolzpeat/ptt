<?php
/**
 * Template Name: About Blue Card

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
	<div id="right-content" class="about-blue-card">
		<h2>About Blue Card <span id="small-txt-blue-card"> ที่มาของความสุข</span></h2>
		<!--<h3 class="kitthithada-light"><?php the_title();?></h3>-->
		<?php the_content(); ?>


	</div>

</div>
<br class="clear"/>
<?php get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer') ); ?>