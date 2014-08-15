<?php
/**
 * Template Name: Contact us

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
	<h2><?php the_title();?></h2>
	<h3>ติดต่อสอบถามทุกข้อสงสัย</h3>
	<p>หากต้องการพูดคุยกับ Mr. Blue หรือต้องการแจ้งปัญหาการใช้งานสามารถติดต่อได้ผ่านทาง bluesociety.ptt@gmail.com หรือกรอกข้อมูลของคุณและรายละเอียดข้อความที่ต้องการติดต่อ 
แล้วคลิกที่ปุ่ม Submit ข้อความจะถูกส่งมายังทีมงาน Blue Society ทันทีครับ ขอบคุณที่ติดต่อทางทีมงานครับ</p>
	<?php the_content();?>
</div>

<?php get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer') ); ?>