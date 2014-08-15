<?php
	/**
	 * Starkers functions and definitions
	 *
	 * For more information on hooks, actions, and filters, see http://codex.wordpress.org/Plugin_API.
	 *
 	 * @package 	WordPress
 	 * @subpackage 	Starkers
 	 * @since 		Starkers 4.0
	 */

	/* ========================================================================================================================
	
	Required external files
	
	======================================================================================================================== */

	require_once( 'external/starkers-utilities.php' );

	/* ========================================================================================================================
	
	Actions and Filters
	
	======================================================================================================================== */

	add_action( 'wp_enqueue_scripts', 'script_enqueuer' );

	add_filter( 'body_class', 'add_slug_to_body_class' );

	/* ========================================================================================================================
	
	Custom Post Types - include custom post types and taxonimies here e.g.

	e.g. require_once( 'custom-post-types/your-custom-post-type.php' );
	
	======================================================================================================================== */



	/* ========================================================================================================================
	
	Scripts
	
	======================================================================================================================== */

	/**
	 * Add scripts via wp_head()
	 *
	 * @return void
	 * @author Keir Whitaker
	 */

	function script_enqueuer() {
		wp_register_script( 'site', get_template_directory_uri().'/js/site.js', array( 'jquery' ) );
		wp_enqueue_script( 'site' );

		wp_register_style( 'screen', get_template_directory_uri().'/style.css', '', '', 'screen' );
        wp_enqueue_style( 'screen' );
	}	

	/* ========================================================================================================================
	
	Comments
	
	======================================================================================================================== */

	/**
	 * Custom callback for outputting comments 
	 *
	 * @return void
	 * @author Keir Whitaker
	 */
	function starkers_comment( $comment, $args, $depth ) {
		$GLOBALS['comment'] = $comment; 
		?>
		<?php if ( $comment->comment_approved == '1' ): ?>	
		<div class="right-content-box">
			<div class="comment-detail-title">
				<h3><span class="white">Comment :</span> <?php the_title(); ?></h3>
				<div class="user-detail">
					<strong class="username"><?php comment_author_link() ?></strong> : <?php comment_date('d-m-Y') ?> : <?php comment_time() ?>
				</div>
			</div>
				<?php comment_text() ?>
				<?php if ($comment->comment_approved == '0') : ?>
					Comment ของคุณกำลังถูกตรวจสอบอยู่
				<?php endif; ?>
		</div>
		<?php endif; ?>

		<?php 
	}
	
add_filter( 'post_thumbnail_html', 'remove_thumbnail_dimensions', 10, 3 );

function remove_thumbnail_dimensions( $html, $post_id, $post_image_id ) {
    $html = preg_replace( '/(width|height)=\"\d*\"\s/', "", $html );
    return $html;
}

function config_url($name){
	$config_url_domain = 'https://www.pttbluecard.com/';
	$config_url['home'] = $config_url_domain.'Register/RegisterStep3.aspx';
	$config_url['register'] = $config_url_domain.'Register/Register.aspx';
	$config_url['ForgetPassword'] = $config_url_domain.'View/authen/ForgetPassword.aspx';
	$config_url['login'] = $config_url_domain.'View/authen/login.aspx';
	$config_url['Reward'] = $config_url_domain.'View/redeem/Redeem.aspx?type=1';
	$config_url['Privilege'] = $config_url_domain.'View/redeem/Redeem.aspx?type=3';
	$config_url['Activity'] = $config_url_domain.'View/redeem/Redeem.aspx?type=2';
	$config_url['Contact'] = $config_url_domain.'View/incident/incident.aspx';
	echo $config_url[$name];
}

add_theme_support( 'post-thumbnails' );
	
register_nav_menus( array(
	'bluecard_menu' => 'Blue Card Menu',
	'sitemap' => 'Sitemap'
) );


remove_filter('the_excerpt', 'wpautop');

function limit_words($string, $word_limit) {
 
	// creates an array of words from $string (this will be our excerpt)
	// explode divides the excerpt up by using a space character
 
	$words = explode(' ', $string);
 
	// this next bit chops the $words array and sticks it back together
	// starting at the first word '0' and ending at the $word_limit
	// the $word_limit which is passed in the function will be the number
	// of words we want to use
	// implode glues the chopped up array back together using a space character
 
	return implode(' ', array_slice($words, 0, $word_limit));
 
}

add_action('init', 'start_session', 1);

  function start_session() {
    if (!session_id()) {
      session_start();
    }
  }