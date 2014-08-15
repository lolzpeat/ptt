<?php
/**
 * Template Name: FAQ

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
		<h2>FAQ <!--<span id="small-txt-blue-card"> ที่มาของความสุข</span>--></h2>

		<?php the_content(); ?>


	</div>

</div>
<br class="clear"/>
<?php get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer') ); ?>