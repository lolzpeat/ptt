<div id="wrapper">
<header id="header">
	<h1 id="logo"><a href="<?php bloginfo('home'); ?>"><img src="<?php bloginfo('template_directory'); ?>/images/logo.png" alt="PTT Blue Society"/></a></h1>

	<div id="top-header">
		<?php //get_search_form(); ?>
		<div id="toolbox-wrapper">
			<div id="toolbox">
				<a class="contact-us" href="<?php echo config_url('Contact'); ?>">Contact Us</a>
				<a class="icon" href="http://twitter.com/PTTNews"><img src="<?php bloginfo('template_directory'); ?>/images/icon_twt.png" alt="Twitter"/><!-- <img src="<?php bloginfo('template_directory'); ?>/images/blank.png" width="15" height="21"/> --></a>
				<a class="icon" href="http://www.facebook.com/pttbluesociety"><img src="<?php bloginfo('template_directory'); ?>/images/icon_fb.png" alt="Facebook"/></a>
				<a class="icon" href="http://www.youtube.com/user/bluesocietychannel"><img src="<?php bloginfo('template_directory'); ?>/images/icon_yt.png" alt="Youtube"/></a>
				<a href="#" id="font-small" class="icon">A</a>
				<a href="#" id="font-medium" class="active icon">A</a>
				<a href="#" id="font-large" class="icon">A</a>
			</div>
			<?php if($_SESSION['v_smart_login']=='Y'){ ?>
<!-- 			<div id="login">
				<ul>
					<li id="username">คุณ <?php echo $_SESSION['v_smart_username'];?></li>
				</ul>
				<a id="logout" href="javascript:void(0);" onclick="fn_logout()">Logout</a>
			</div> -->
			<div id="login" style="height:auto;min-height:25px;">
				<ul id="ul_login_completed" runat="server" visible="false">
					<li id="username">คุณ <?php echo $_SESSION['v_smart_username'];?></li>
					<a id="logout" href="javascript:void(0);" onclick="fn_logout()">Logout</a>
				</ul>
				<div id="div_mini_profile" style="padding:3px;width:304px;overflow:hidden;">
					<iframe src="https://www.pttbluecard.com/View/authen/MiniProfile.aspx" width="304" scrolling="no" height="160" frameborder="0"></iframe>
				</div>
			</div>
			<?php }else{ ?>
			<div id="login">
				<ul>
					<li id="showLoginBox"><a class="font" href="#" id="alogin">Login</a>
						<form action="<?php bloginfo('template_directory'); ?>/check_login.php" id="login-form" name="login-form" method="post">
							<input type="text" class="txtForm" placeholder="Username" id="username" name="username" onkeypress="handleKeyPress_user(event,this.form)"/>
							<input type="password" class="txtForm" placeholder="Password" id="password" name="password" onkeypress="handleKeyPress_pass(event,this.form)"/>
                            <!--<input type="hidden" class="txtForm" id="target" name="target" value="<?php bloginfo('url'); ?>" />-->
							<input type="hidden" class="txtForm" id="target" name="target" value="https://www.pttbluecard.com/View/history/OrderHistory.aspx" />
							<input type="button" class="button" id="btn-login" onclick="fn_checkuser();"/>
							<a id="forgot-password" href="<?php config_url('ForgetPassword');?>">ลืมรหัสผ่าน</a>
						</form>
					</li>
					<li><a href="<?php config_url('register');?>">Register</a></li>
				</ul>
			</div>
			<script>
				jQuery(document).ready(function(){
					jQuery('input[placeholder], textarea[placeholder]').placeholder();
				});
			</script>
			<?php } ?>
		</div>
	</div>
	<br class="clear"/>
</header>
<nav id="main-menu">
	<ul>
		<li>
			<a id="home" href="<?php bloginfo('home'); ?>"><h2>Home</h2>
			<p>รวมความสุขทุกไลฟ์สไตล์</p>
			</a>
		</li>
		<li>
			<?php if($_SESSION['v_smart_login']=='Y'){  // after login ?>
			<a id="blue-card" href="https://www.pttbluecard.com/View/history/OrderHistory.aspx"><h2>Blue Card</h2>
			<?php }else{ // before login ?>
			<a id="blue-card" href="<?php bloginfo('home'); ?>/module/html/blue_card.php"><h2>Blue Card</h2>
			<?php } ?>
			<p>ความสุขหลากสไตล์ในบัตรเดียว</p>
			</a>
			<ul class="dropdown">
				<li><a href="<?php bloginfo('home'); ?>/blue-card/about-blue-card">About Blue Card</a></li>
				<li><a href="https://www.pttbluecard.com/View/redeem/Redeem.aspx?type=3&tmp-user=<?php echo $_SESSION['v_smart_username']?>">Privilege</a></li>
				<li><a href="<?php bloginfo('home'); ?>/module/html/promotion.php">Promotion</a></li>
				<li><a href="<?php echo config_url('Reward'); ?>">Reward</a></li>
				<li><a href="<?php bloginfo('home'); ?>/blue-card/faq">FAQ</a></li>
				<li><a href="https://www.pttbluecard.com/Register/register.aspx">Register</a></li>
				<!--<li><a href="<?php echo config_url('Activity'); ?>">Activity</a></li>  -->
			</ul>
		</li>
		<li>
			<a id="lifestyle" href="<?php bloginfo('home'); ?>/category/blue-privilege/"><h2>Blue Privilege</h2>
			<p>แนะนำความสุข สำหรับชาวบลู</p>
			</a>
			<ul class="dropdown blue-privilege-dropdown">
				<li><a href="<?php bloginfo('home'); ?>/category/blue-privilege/">All Recommended</a></li>
				<li><a href="<?php bloginfo('home'); ?>/category/blue-privilege/food-beverage">Food &amp; Beverage</a></li>
				<li><a href="<?php bloginfo('home'); ?>/category/blue-privilege/hotel-travel">Hotel &amp; Travel</a></li>
				<li><a href="<?php bloginfo('home'); ?>/category/blue-privilege/health-beauty">Health &amp; Beauty</a></li>
				<li><a href="<?php bloginfo('home'); ?>/category/blue-privilege/entertainment-lifestyle">Entertainment &amp; Lifestyle</a></li>
				<li><a href="<?php bloginfo('home'); ?>/category/blue-privilege/fashion">Fashion</a></li>
				<li><a href="<?php bloginfo('home'); ?>/category/blue-privilege/electronics-gadgets">Electronics &amp; Gadgets</a></li>
				<li><a href="<?php bloginfo('home'); ?>/category/blue-privilege/services">Services</a></li>
				<li><a href="<?php bloginfo('home'); ?>/category/blue-privilege/others">Others</a></li>
			</ul>
		</li>
		<li>
			<a href="<?php bloginfo('home'); ?>/pr-news"><h2>PR &amp; News</h2>
			<p>เรื่องเล่าดีๆ จาก ปตท.</p>
			</a>
<!-- 			<ul class="dropdown">
				<li><a href="<?php bloginfo('home'); ?>/pr-event">PR News</a></li>
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