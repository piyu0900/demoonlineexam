<?php
/** Template Name:Header page */

get_header(); ?>

		<section><div class="middle-adds"><?php dynamic_sidebar('Middle addversite');?></div></section>
<div class="row">
<div class="col-md-2">
  <div class="blog-bg">
  <div class="side-left-img">
  <?php dynamic_sidebar('left addversite');?>
  </div>
</div>




  </section>
</div>

<div class="col-md-7">
<section class="publicaciones-blog-home">

  
   <div class="blog-details">
  <?php 
  while (have_posts ()): the_post(); 
$image33=wp_get_attachment_image_src(get_post_thumbnail_id($post->ID),'full'); 
?>
   <img src="<?php echo $image33[0]?>" alt="<?php echo $image33[0]?>" width="700" height="355">

   <div class="blog-details-total">
  
  <h3><?php the_title();?></h3>
  <?php the_content(); ?>
  <div class="col-md-12  blog-post-bottom">
 
  </div>
 
  <?php endwhile; ?>
  <div class="blogs-comments-area">


  

    </div>


 
   
  </div>




  </div>
  </div>
      </section>
  	</div>










<section><div class="middle-adds"><?php dynamic_sidebar('Middle addversite');?></div></section>






































<div class="clearfix"></div>
<script>$(document).ready(function() {    var panels = $('.vote-results');    var panelsButton = $('.dropdown-results');    panels.hide();    //Click dropdown    panelsButton.click(function() {        //get data-for attribute        var dataFor = $(this).attr('data-for');        var idFor = $(dataFor);        //current button        var currentButton = $(this);        idFor.slideToggle(400, function() {            //Completed slidetoggle            if(idFor.is(':visible'))            {                currentButton.html('Hide Results');            }            else            {                currentButton.html('View Results');            }        })    });});</script>

<?php get_footer(); ?>
