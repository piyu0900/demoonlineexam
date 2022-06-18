<?php

/**

 * Main template file

 *

 * This is the most generic template file in a WordPress theme

 * and one of the two required files for a theme (the other being style.css).

 * It is used to display a page when nothing more specific matches a query.

 * E.g., it puts together the home page when no home.php file exists.

 * Learn more: https://codex.wordpress.org/Template_Hierarchy

 *

 * @package WordPress

 * @subpackage Twenty_Ten

 * @since Twenty Ten 1.0

 */



get_header(); ?>



		<div class="row">

<div class="col-md-10">
<div class="clearfix"></div>
 <div id="myCarousel" class="carousel slide" data-ride="carousel">

    <!-- Indicators -->

    <ol class="carousel-indicators">

	 <?php 



										global $post;



										

										 $n=0;

										$myposts=get_posts($args);



										$myposts=get_posts('numberposts=100&post_type=slider&order=ASC');

									     $count_posts = wp_count_posts( 'news_details' )->publish;



										foreach($myposts as $post){



										setup_postdata($post);



										$getcontent=get_the_content();



										$getcontent=apply_filters('<p>'.the_content.'</p>',$getcontent);



										$image2=wp_get_attachment_image_src(get_post_thumbnail_id($post->ID),'full'); 

                                       ?>

      <li data-target="#myCarousel" data-slide-to="<?php echo $n; ?>" <?php if($n==1){ echo 'class="active"';}?> ></li>

     <?php $n++; } ?>

    </ol>



    <!-- Wrapper for slides -->

    <div class="carousel-inner" role="listbox">

	                          <?php 



										global $post;



										

										 $n=1;

										$myposts=get_posts($args);



										$myposts=get_posts('numberposts=100&post_type=slider&order=ASC');

									     $count_posts = wp_count_posts( 'news_details' )->publish;



										foreach($myposts as $post){



										setup_postdata($post);



										$getcontent=get_the_content();



										$getcontent=apply_filters('<p>'.the_content.'</p>',$getcontent);



										$image2=wp_get_attachment_image_src(get_post_thumbnail_id($post->ID),'full'); 

                                       ?>

      <div class="item <?php if($n==1){ echo 'active';}?>">

      <img class="img-responsive" src="<?php echo $image2[0]?>" width="100%" alt="blog-banner">

      </div>

<?php $n++; } ?>

      



      



      

    </div>



    <!-- Left and right controls -->

    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">

      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>

      <span class="sr-only">Previous</span>

    </a>

    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">

      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>

      <span class="sr-only">Next</span>

    </a>

  </div>

  </div>



  <div class="col-md-2">

  <?php

  $my_query = new WP_Query('page_id=93');

 while ($my_query->have_posts()) : $my_query->the_post();

 $do_not_duplicate = $post->ID;

$image33=wp_get_attachment_image_src(get_post_thumbnail_id($post->ID),'full'); 

?>

  <div class="banner-side-right"><a href="<?php the_permalink();?>" >

  <img src="<?php echo $image33[0];?>" alt="add" width="100%"></a>

  </div>

  <?php endwhile; ?>

</div>

</div>



<section><div class="middle-adds"><?php dynamic_sidebar('Middle addversite');?></div></section>



<div class="blog-bg">

<div class="side-left-img">

<?php dynamic_sidebar('left addversite');?>

</div>



<div class="side-right-img">

<?php dynamic_sidebar('Right addversite');?>

</div>



<div class="blog">

<section class="publicaciones-blog-home">



          <h2>Articles <b></b></h2>

		  

		  



			<?php

			/*

			 * Run the loop to output the posts.

			 * If you want to overload this in a child theme then include a file

			 * called loop-index.php and that will be used instead.

			 */

			get_template_part( 'loop', 'index' );

			?>

			</section>

	</div>

</div>







<?php get_footer(); ?>

