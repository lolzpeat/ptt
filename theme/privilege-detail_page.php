<?php
/**
 * Template Name: Privilege Detail Page - Iframe
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

<div id="right-content" style="width: 980px; padding: 0;">
<?php if ($_GET['id'] != '') {?>

	<iframe class="iframe_landing" src="http://stagingbuzzebeesapi.cloudapp.net/modules/pttbluecardlanding/landingCampaign.htm?id=<?php echo $_GET['id']; ?>" frameborder="0" width="100%" height="2000" scrolling="no"></iframe>

<?php } ?>
	<br class="clear"/>
</div>



<?php get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer') ); ?>