<?php

/**

 * Header template for our theme

 *

 * Displays all of the <head> section and everything up till <div id="main">.

 *

 * @package WordPress

 * @subpackage Twenty_Ten

 * @since Twenty Ten 1.0

 */

?><!DOCTYPE html>

<html <?php language_attributes(); ?>>

<head>

<meta charset="<?php bloginfo( 'charset' ); ?>" />

 <meta name="viewport" content="width=device-width, initial-scale=1">

<title><?php

	/*

	 * Print the <title> tag based on what is being viewed.

	 */

	global $page, $paged;



	wp_title( '|', true, 'right' );



	// Add the blog name.

	bloginfo( 'name' );



	// Add the blog description for the home/front page.

	$site_description = get_bloginfo( 'description', 'display' );

	if ( $site_description && ( is_home() || is_front_page() ) )

		echo " | $site_description";



	// Add a page number if necessary:

	if ( ( $paged >= 2 || $page >= 2 ) && ! is_404() )

		echo esc_html( ' | ' . sprintf( __( 'Page %s', 'twentyten' ), max( $paged, $page ) ) );



	?></title>

<link rel="profile" href="http://gmpg.org/xfn/11" />

<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />

<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />



<link rel="stylesheet" href="<?php bloginfo( 'template_url' ); ?>/css/bootstrap.min.css">

   <link rel="stylesheet" href="<?php bloginfo( 'template_url' ); ?>/css/style.css">

  <script src="<?php bloginfo( 'template_url' ); ?>/js/jquery.min.js"></script>

  <script src="<?php bloginfo( 'template_url' ); ?>/js/bootstrap.min.js"></script>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">



<?php

	/*

	 * We add some JavaScript to pages with the comment form

	 * to support sites with threaded comments (when in use).

	 */

	if ( is_singular() && get_option( 'thread_comments' ) )

		wp_enqueue_script( 'comment-reply' );



	/*

	 * Always have wp_head() just before the closing </head>

	 * tag of your theme, or you will break many plugins, which

	 * generally use this hook to add elements to <head> such

	 * as styles, scripts, and meta tags.

	 */

	wp_head();

?>

</head>



<body>

<nav class="navbar navbar-default navbar1" role="navigation">

  <div class="container-fluid container">

    <!-- Brand and toggle get grouped for better mobile display -->

    <div class="navbar-header">

      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">

        <span class="sr-only">Toggle navigation</span>

        <span class="icon-bar"></span>

        <span class="icon-bar"></span>

        <span class="icon-bar"></span>

      </button>



    </div>



    <!-- Collect the nav links, forms, and other content for toggling -->

    <div class="col-md-10">

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

      <ul class="nav navbar-nav">

	    <?php



					 $args = array(



						'order'                  => 'ASC',



						'orderby'                => 'menu_order',



						'post_type'              => 'nav_menu_item',



						'post_status'            => 'publish',



						'output'                 => ARRAY_A,



						'output_key'             => 'menu_order',



						'nopaging'               => true,



						'update_post_term_cache' => false );







					 $items = wp_get_nav_menu_items( 'nav-menu', $args );



					 $page_url = get_permalink();



					 foreach($items as $item ) :



					?>

        <li><a href="<?php echo $item->url;?>"><?php echo $item->title;?></a></li>

         <?php endforeach;?>





      </ul>





    </div>

    </div>

    <!-- /.navbar-collapse -->





 <div class="col-md-2 sign"><button onClick="window.location='http://petroleague.com/contact-us.php';">Contact Us</button></div>

  </div><!-- /.container-fluid -->

</nav>

<section>

<nav id="top-menu">

<div class="container">

<div class="row">



 <div class="col-sm-3 col-md-3">

<div class="navbar-header"><a href="http://petroleague.com/blog/"><img src="<?php bloginfo( 'template_url' ); ?>/img/logo4.png" alt="" width="100%"></a></div>

 </div>



<div class="col-sm-6 col-md-6">
<?php $my_query = new WP_Query('page_id=83');
while ($my_query->have_posts()) : $my_query->the_post();
$do_not_duplicate = $post->ID;
$image33=wp_get_attachment_image_src(get_post_thumbnail_id($post->ID),'full'); 
?>


<a href="<?php the_permalink();?>"/><img class="ads" src="<?php echo $image33[0];?>" alt="" width="100%"></a></div>
 <?php endwhile; ?>

<div class="col-sm-3 col-md-3">

 <ul class="top-links list-unstyled text-right">

<li class="top-contact">

<ol class="list-inline">

<li><i class="fa fa-envelope-o"></i> : support@petroleague.com</li>

</ol>

</li>

<li>



<!--<ol class="social-icons list-inline">

<li><a class="facebook" href="https://www.facebook.com/" target="_blank"><i class="fa fa-facebook-square"></i></a></li>

<li><a class="twitter" href="https://twitter.com" target="_blank"><i class="fa fa-twitter"></i></a></li>

 <li><a class="rss" href="#"><i class="fa fa-rss"></i></a></li>

<li><a class="google" href="https://plus.google.com/" target="_blank"><i class="fa fa-google-plus"></i></a></li>

<li><a class="linkedin" href="https://www.linkedin.com" target="_blank"><i class="fa fa-linkedin"></i></a></li>

<li><a class="pinterest" href="#"><i class="fa fa-pinterest"></i></a></li>

</ol>-->



<ol class="social-icons list-inline">

<li class="ser ser1">

<div class="input-group stylish-input-group">

<form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">

<input type="text" class="form-control he" placeholder="Search" value="<?php echo get_search_query() ?>" name="s">

<span class="input-group-addon he he1">

<button type="submit">

<span class="glyphicon glyphicon-search icon1"></span>

</button>

</form>

</span>

 </div>

</li>

</ol>

 </li>

</ul>

</div>

</div>

</div>







   </nav></section>

