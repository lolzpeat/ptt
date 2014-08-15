<?php
session_start();

$introStartDate = '2013-11-01 00:00:00';
$introFinishDate = '2013-11-09 00:00:00';
$today = time();
$introDisplay = (strtotime($introStartDate)<=$today && $today<=strtotime($introFinishDate)) ? true : false ;
if($_SESSION['intro']==false && $introDisplay){
	header('Location: http://www.pttbluesociety.com/intro.php');
	$_SESSION['intro'] = true;
	exit;
}
?>
<!DOCTYPE HTML>
<!--[if IEMobile 7 ]><html class="no-js iem7" manifest="default.appcache?v=1" xmlns:fb="http://ogp.me/ns/fb#"><![endif]-->
<!--[if lt IE 7 ]><html class="no-js ie6" lang="en" xmlns:fb="http://ogp.me/ns/fb#"><![endif]-->
<!--[if IE 7 ]><html class="no-js ie7" lang="en" xmlns:fb="http://ogp.me/ns/fb#"><![endif]-->
<!--[if IE 8 ]><html class="no-js ie8" lang="en" xmlns:fb="http://ogp.me/ns/fb#"><![endif]-->
<!--[if (gte IE 9)|(gt IEMobile 7)|!(IEMobile)|!(IE)]><!--><html class="no-js" lang="en" xmlns:fb="http://ogp.me/ns/fb#"><!--<![endif]-->
	<head>
		<title><?php bloginfo( 'name' ); ?><?php wp_title( '|' ); ?></title>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
	  	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0"><!-- Remove if you're not building a responsive site. (But then why would you do such a thing?) -->
		<!-- <meta content="PTT : Blue Society" property="og:title">
		<meta content="Mr.Blue ขอชวนเพื่อนๆ มาเป็นสมาชิก PTT Blue Card กันครับ เพราะนอกจากจะได้รับสิทธิพิเศษในการใช้จ่ายต่างๆ อย่างมากมายแล้ว Mr.Blue ยังเตรียมกิจกรรมพิเศษๆ สำหรับสมาชิก ไว้ในเว็บไซต์นี้ด้วย อย่าลืมเข้ามากันบ่อยๆ นะครับ ^__^" property="og:description">
		<meta content="http://www.pttbluesociety.com/ptt200x200.jpg" property="og:image">
		<meta content="http://www.pttbluesociety.com" property="og:url">
		<meta content="website" property="og:type"> -->

<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
		<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/img/favicon.ico"/>


		<?php wp_head(); ?>
		<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/font.css"/>
		<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/css/style.css">
		<!--[if IE]><link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/css/ie.css"><![endif]-->

		<!-- HTML5 JS -->
		<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/html5.js"></script>
		<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/modernizr.js"></script>

		<!-- Nivo -->
        <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/js/nivo-slider/themes/default/default.css" type="text/css" media="screen" />
		<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/js/nivo-slider/nivo-slider.css" type="text/css" media="screen" />
		<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/nivo-slider/jquery.nivo.slider.js"></script>

		<!-- Masonry -->
		<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery.masonry.min.js"></script>
		<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery.infinitescroll.min.js"></script>
		<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery.placeholder.js"></script>

		<!-- Cufon -->
		<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/cufon-yui.js"></script>
		<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery.font.js"></script>

		<!-- Place this tag in your head or just before your close body tag. -->
		<script type="text/javascript" src="https://apis.google.com/js/platform.js"></script>

		<script type="text/javascript">
		jQuery(document).ready(function() {

			// Show Login Box
			jQuery('#showLoginBox a#alogin').click(function() {
				jQuery('#login-form').slideToggle();
				jQuery(this).toggleClass('active');
				return false;
			});

			jQuery('input#s').attr('placeholder','Search...');
			jQuery('input#form-wysija-nl-iframe-2-wysija-to').attr('title','E-mail...'); // Newsletter
			jQuery('.breadcrumbs a[href="http://www.pttbluesociety.com/category/blue-life-style"]').attr({'href':'#','title':''}).css({'cursor':'text','outline':'none'}); // Disable link Blue Life Style
			jQuery('.breadcrumbs a[href="http://www.pttbluesociety.com/blue-life-style"]').attr({'href':'#','title':''}).css({'cursor':'text','outline':'none'}); // Disable link Blue Life Style
			jQuery('.breadcrumbs a[href="http://www.pttbluesociety.com/blue-card"]').attr({'href':'http://www.pttbluesociety.com/module/html/blue_card.php','title':''}); // Change Blue Card Link
			jQuery('.breadcrumbs a[href="http://www.pttbluesociety.com/category/news-event"]').attr({'href':'http://www.pttbluesociety.com/news-event','title':''}); // Change News Event Link
			jQuery('#blue-card,#lifestyle,.dropdown').hover(function() {
			// jQuery('#blue-card,#lifestyle,.dropdown,#main-menu li:nth-child(4) a').hover(function() {
				jQuery('#dropdown-wrapper').css('background','url(<?php bloginfo('template_directory'); ?>/images/dropdown-bg.png) 0 0 repeat-x');
				jQuery('#dropdown-wrapper').css('z-index','2');
				}, function() {
				jQuery('#dropdown-wrapper').css('background','none');
				jQuery('#dropdown-wrapper').css('z-index','0');
			});

			// Redeem Item
			jQuery('#redeem-item').load('<?php bloginfo('home'); ?>/module/html/wp-include/redeem-item/redeem-item.php',{},function(){
				Cufon.replace('h2');
			});

			// Privilege Item
			// jQuery('#privilege-item').load('<?php bloginfo('home'); ?>/module/html/wp-include/privilege-item/privilege-item.php',{},function(){
			// 	Cufon.replace('h2');
			// });

			// Promotion Item
			jQuery('#promotion-item').load('<?php bloginfo('home'); ?>/module/html/wp-include/promotion-item/promotion-item.php',{},function(){
				Cufon.replace('h2');
			});

			//Main Rotate Banner
			jQuery('#slider').load('<?php bloginfo('home'); ?>/module/html/wp-include/rotate-banner/rotate-banner.php',{},function(){
				//Nivo Slider
				jQuery('#slider').nivoSlider();
			});


			// Reset Font Size

			var section = new Array('#mr-blue > p','.col3','.col3-padding','#right-content p','.right-content-box p','.pin-blog p');
			  section = section.join(',');

			var originalFontSize = jQuery(section).css('font-size');
			  jQuery('#font-medium').click(function(){
				jQuery('#toolbox a').removeClass('active');
				jQuery(section).css('font-size', originalFontSize);
				jQuery(this).addClass('active');
			  });

			  // Increase Font Size
			  jQuery('#font-large').click(function(){
				jQuery(section).css('font-size','16px');
				jQuery('#toolbox a').removeClass('active');
				jQuery(this).addClass('active');
				return false;
			  });

			  // Decrease Font Size
			  jQuery('#font-small').click(function(){
				jQuery(section).css('font-size', '12px');
				jQuery('#toolbox a').removeClass('active');
				jQuery(this).addClass('active');
				return false;
			  });
		});

		function fn_checkuser(){
				var username = jQuery('#username:eq(0)').val();
				var password = jQuery('input[name=password]:eq('+(jQuery('input[name=password]').length-1)+')').val();
				if(username=='' || username=='Username'){
					alert('กรุณาระบุชื่อผู้ใช้งาน');
				} else if(password=='' || password=='Password') {
					alert('กรุณาระบุรหัสผ่าน');
				} else {
					jQuery.post("<?php bloginfo('template_directory'); ?>/check_login.php",{ action:'checkuser',username:username,password:password },
					function(data){
						if ( data.search('resultY')>=0){
							jQuery('#login-form').submit();
						}else{
							document.getElementById('login-form').reset();
							alert("ชื่อผู้ใช้งานหรือรหัสผ่านไม่ถูกต้อง" );
						}
			   		});
				}
			}

		function fn_logout(){
			window.location = "<?php bloginfo('template_directory'); ?>/logout.php"	;
		}

		function handleKeyPress_user(e,form){
			var key=e.keyCode || e.which;
			if (key==13){
				jQuery('#password').focus();
			}
		}

		function handleKeyPress_pass(e,form){
			var key=e.keyCode || e.which;
			if (key==13){
				fn_checkuser();
			}
		}


		// Cufon.replace('#left-sidebar h2,#left-sidebar small,#right-sidebar h2,#right-sidebar small,#related-website a,#masonry-content h2,.dropdown > li a,#main-menu > ul > li > a > h2,#main-menu > ul > li > a > p,#login a,#right-content h2');
		Cufon.replace('h3,small,#related-website a,#main-menu > ul > li > a > p');
		Cufon.replace('#toolbox a.contact-us,#login a,.dropdown > li a,#left-sidebar .col3-padding a.title,h2,h2 a' , {
			hover: true
		});


/*

		jQuery(window).load(function(){

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
				  img: 'http://i.imgur.com/6RMhx.gif'
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


			var $bluelifestyle = jQuery('#blue-lifestyle > #masonry-content');
			$bluelifestyle.imagesLoaded(function(){
			  $bluelifestyle.masonry({
				itemSelector: '.col3',
				// set columnWidth a fraction of the container width
				  columnWidth: function( containerWidth ) {
					return containerWidth / 4;
				  }
				});
			});
		})
		*/

		</script>
		<script type="text/javascript">
			var _gaq = _gaq || [];
			_gaq.push(['_setAccount', 'UA-27944002-2']);
			_gaq.push(['_setDomainName', 'pttbluesociety.com']);
			_gaq.push(['_setAllowLinker', true]);
			_gaq.push(['_trackPageview']);
			(function() {
			var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
			ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
			var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
			})();
		</script>
	</head>
	<body <?php body_class(); ?>>
