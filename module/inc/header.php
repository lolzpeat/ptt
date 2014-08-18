<?php include('config.php'); ?>
<script language="javascript" src="./js/inc-function.js"></script>
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
<header id="header">
	<h1 id="logo"><a href="<?php echo $Home; ?>"><img src="./img/logo.png" alt="PTT Blue Society"/></a></h1>

	<div id="top-header">

		<div id="toolbox-wrapper">
			<div id="toolbox">
				<a class="contact-us" href="<?php echo $ContactUs; ?>">Contact Us</a>
				<a class="icon" href="http://twitter.com/PTTNews"><img src="./img/icon_twt.png" alt="Twitter"/></a>
				<a class="icon" href="http://www.facebook.com/pttbluesociety"><img src="./img/icon_fb.png" alt="Facebook"/></a>
				<a class="icon" href="http://www.youtube.com/user/bluesocietychannel"><img src="./img/icon_yt.png" alt="Youtube"/></a>
				<a href="#" id="font-small" class="icon">A</a>
				<a href="#" id="font-medium" class="icon">A</a>
				<a href="#" id="font-large" class="icon">A</a>
			</div>
			<div id="login">
				<?php if(!empty($_SESSION['v_smart_username'])){?>
				<ul>
					<li id="username">คุณ <?php echo $_SESSION['v_smart_username'];?></li>
					<a id="logout" href="javascript:void(0);" onclick="fn_logout();">Logout</a>
				</ul>
				<div class="clr"></div>
				<div id="div_mini_profile">
					<iframe src="https://www.pttbluecard.com/View/authen/MiniProfile.aspx"
							  width="304"
							  scrolling="no"
							  height="160"
							  frameborder="0">
					</iframe>
				</div>
                <?php }else{?>
				<ul>
					<li id="showLoginBox"><a href="#" id="aloging">Login</a>
						<form action="http://www.pttbluesociety.com/wp-content/themes/ptt-bluesociety_cufon/check_login.php" id="login-form" method="post">
                        	<input name="username" id="username" class="txtForm" type="text" onkeypress="handleKeyPress_user(event,this.form)" placeholder="Username">
                            <input name="password" id="password" class="txtForm" type="password" onkeypress="handleKeyPress_pass(event,this.form)" placeholder="Password">
							<input name="target" id="target" class="txtForm" type="hidden" value="https://www.pttbluecard.com/View/history/OrderHistory.aspx" name="target">
							<input id="btn-login" class="button" type="button" onclick="fn_checkuser();">
							<a id="forgot-password" href="<?php echo $ForgetPassLink?>">ลืมรหัสผ่าน</a>
						</form>
					</li>
					<li><a href="<?php echo $RegisterLink?>">Register</a></li>
				</ul>
				<?php }?>
			</div>
		</div>
	</div>
	<br class="clear"/>
</header>

<nav id="main-menu">
	<ul>
		<li>
			<a id="home" href="<?php echo $Home;?>"><h2>Home</h2>
			<p>รวมความสุขทุกไลฟ์สไตล์</p>
			</a>
		</li>
		<li>
			<?php if($_SESSION['v_smart_login']=='Y'){  // after login ?>
			<a id="blue-card" href="https://www.pttbluecard.com/View/history/OrderHistory.aspx"><h2>Blue Card</h2>
			<?php }else{ // before login ?>
			<a id="blue-card" href="blue_card.php"><h2>Blue Card</h2>
			<?php } ?>
			<p>ความสุขหลากสไตล์ในบัตรเดียว</p>
			</a>
			<ul class="dropdown">
				<li><a href="<?php echo $AboutBlueCard;?>">About Blue Card</a></li>
				<li><a href="<?php echo $Privilege; ?>">Privilege</a></li>
				<li><a href="<?php echo $Promotion; ?>">Promotion</a></li>
				<li><a href="<?php echo $HighlightReward; ?>">Reward</a></li>
				<li><a href="<?php echo $FAQ; ?>">FAQ</a></li>
				<li><a href="https://www.pttbluecard.com/Register/register.aspx">Register</a></li>
				<!-- <li><a href="<?php echo $Activity; ?>">Activity</a></li> -->
			</ul>
		</li>
		<li>
			<a id="lifestyle"><h2>Blue Privilege</h2>
			<p>แนะนำความสุข สำหรับชาวบลู</p>
			</a>
			<ul class="dropdown blue-privilege-dropdown">
				<li><a href="<?php echo $Category; ?>blue-privilege/">All Recommended</a></li>
				<li><a href="<?php echo $Category; ?>blue-privilege/food-beverage">Food &amp; Beverage</a></li>
				<li><a href="<?php echo $Category; ?>blue-privilege/hotel-travel">Hotel &amp; Travel</a></li>
				<li><a href="<?php echo $Category; ?>blue-privilege/health-beauty">Health &amp; Beauty</a></li>
				<li><a href="<?php echo $Category; ?>blue-privilege/entertainment-lifestyle">Entertainment &amp; Lifestyle</a></li>
				<li><a href="<?php echo $Category; ?>blue-privilege/fashion">Fashion</a></li>
				<li><a href="<?php echo $Category; ?>blue-privilege/electronics-gadgets">Electronics &amp; Gadgets</a></li>
				<li><a href="<?php echo $Category; ?>blue-privilege/services">Services</a></li>
				<li><a href="<?php echo $Category; ?>blue-privilege/others">Others</a></li>
			</ul>
		</li>
		<li>
			<a href="<?php echo $NewsEvent; ?>"><h2>PR &amp; News</h2>
			<p>เรื่องเล่าดีๆ จาก ปตท.</p>
			</a>
<!-- 			<ul class="dropdown">
				<li><a href="<?php echo $NewsEvent; ?>">PR News</a></li>
				<li><a href="#">Event</a></li>
			</ul> -->
		</li>
		<li>
			<a id="promotion" href="https://www.pttbluecard.com/view/activity/allactivity.aspx"><h2>Promotion &amp; Activity</h2>
			<p>กิจกรรมสำหรับชาวบลู</p>
			</a>
		</li>
	</ul>
</nav>
<div id="dropdown-wrapper"></div>