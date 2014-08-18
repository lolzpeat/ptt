<link rel="stylesheet" href="css/core/master.css"/>
<link rel="stylesheet" href="css/template.css"/>
<link rel="stylesheet" href="css/default.css"/>
<link rel="stylesheet" href="css/nav.css"/>
<!--[if IE]><link rel="stylesheet" type="text/css" href="css/ie.css"><![endif]-->
<script type="text/javascript" src="js/core/jquery.js"></script>
<script type="text/javascript" src="js/core/modernizr.js"></script>
<script type="text/javascript" src="js/cufon-yui.js"></script>
<script type="text/javascript" src="js/jquery.font.js"></script>
<script type="text/javascript" src="js/jquery.customBtn.js"></script>
<script type="text/javascript" src="js/jquery.selectbox.js"></script>
<script type="text/javascript" src="js/jquery.script.js"></script>
<script type="text/javascript" src="js/jquery.iframe.js"></script>
<script type="text/javascript" src="js/jquery.iframe-ie.js"></script>
<script type="text/javascript" src="js/jquery.placeholder.js"></script>
<script>
	Cufon.replace('.font');
	//Cufon.replace('h2,h3,small,#related-website a,#main-menu > ul > li > a > p,#bluecard-menu li a');
	Cufon.replace('h2,h3,small,#related-website a,#main-menu > ul > li > a > p');

	Cufon.replace('#toolbox a.contact-us,#login a,#tabNavigation li a,.dropdown > li a' , {
		hover: true
	});

</script>

<script type="text/javascript">
$(document).ready(function() {

	// Show Login Box
	$('#showLoginBox a#aloging').click(function() {
		$('#login-form').slideToggle();
		$(this).toggleClass('active');
		return false;
	});

	$('#blue-card,#lifestyle,.dropdown').hover(function() {
	// $('#blue-card,#lifestyle,.dropdown,#main-menu li:nth-child(4) a').hover(function() {
		$('#navi').css('visibility','hidden');
		$('#dropdown-wrapper').css({'background':'url(./img/dropdown-bg.png) 0 0 repeat-x','z-index':'3'});
		$('#dropdown-wrapper').css('z-index','2');
		}, function() {
		$('#navi').css('visibility','visible');
		$('#dropdown-wrapper').css('background','none');
		$('#dropdown-wrapper').css('z-index','0');
	});

	// Reset Font Size

	var section = new Array('#wrapper label','#wrapper span,#blue_promotion label,#activity_use_point label,#blueActivity label');
	  section = section.join(',');

	var originalFontSize = $(section).css('font-size');
	  $('#font-medium').click(function(){
		$('#toolbox a').removeClass('active');
		$(section).css('font-size','12px');
		$(this).addClass('active');
	  });

	  // Increase Font Size
	  $('#font-large').click(function(){
		$(section).css('font-size','14px');
		$('#toolbox a').removeClass('active');
		$(this).addClass('active');
		return false;
	  });

	  // Decrease Font Size
	  $('#font-small').click(function(){
		$(section).css('font-size', '11px');
		$('#toolbox a').removeClass('active');
		$(this).addClass('active');
		return false;
	  });

	$('input[placeholder], textarea[placeholder]').placeholder();

	// Privilege Item
	$('#privilege-item').load('wp-include/privilege-item/privilege-item.php',{},function(){
		Cufon.replace('h2');
	});


});
</script>