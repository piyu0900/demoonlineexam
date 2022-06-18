
<footer>
	<div class="container">
	
		<div class="footer-top">
			<div class="row">
			<div class="col-sm-6 col-md-4">
				<div class="footer-logo"><a href="index.php"><img class="img-responsive" src="img/logo.png"></a></div>
			 </div>
								<div class="col-sm-6 col-md-4">
			 <h4>links</h4>		<ul>
<li><a href="index.php">Home</a></li>
<li><a href="about-us.php">About Us</a></li>
<li><a href="schedule.php">Schedule</a></li>
<li><a href="subscribe.php">Subscribe</a></li>
<li><a href="testimonial.php">Testimonials</a></li>
<li><a href="faqs.php">FAQs</a></li>
<li><a href="contact-us.php">Contact Us</a></li>
</ul>			
				</div>
			<div class="col-sm-6 col-md-4">
			 <h4>Contact Us</h4>		<ul class="contact_us_footer">
<li><i class="fa fa-map-marker" aria-hidden="true"></i><?php echo $get_product_details['address']; ?></li>
<li><a href="mailto:<?php echo $get_product_details['email']; ?>"><i class="fa fa-envelope" aria-hidden="true"></i><?php echo $get_product_details['email']; ?></a></li>

</ul>
<ul class="footer-contact">
<li><a target="_blank" href="<?php echo $get_product_details['face_link']; ?>"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
<li><a target="_blank" href="<?php echo $get_product_details['twi_link']; ?>"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
</ul>
						
				</div>
			</div>
		</div>
		
		<div class="footer-bottom">
		© 2017 Music | All rights reserved. Powered by <a href="http://pinkwebsolutionz.com/">Pink Web Solutionz</a>
		
		
		</div>
		
		
	</div>
</footer>

  <script src="js2/bootstrap.min.js"></script>
  <script src="js2/jquery.min.js"></script>
  <script src="js2/owl.carousel.min.js"></script>
  <script src="js2/owl.carousel.js"></script>
  <script>
$(document).ready(function(){
    $(".navbar-toggle").click(function(){
        $("#navbar-brand-centered").slideToggle();
    });
});
</script>
  <script>
$(document).ready(function(){
    $("#testimonial-slider").owlCarousel({
        items:2,
        itemsDesktop:[1000,2],
        itemsDesktopSmall:[979,2],
        itemsTablet:[768,1],
        pagination:true,
        autoPlay:true
    });
});
 </script>
	<script>
	$(document).ready(function(){
		$(".navbar-toggle").click(function(){
			$("#navbar-brand-centered").slideToggle();
		});
	});
	</script>
  <script>
  $(function(){
 var shrinkHeader = 200;
  $(window).scroll(function() {
    var scroll = getCurrentScroll();
      if ( scroll >= shrinkHeader ) {
           $('header').addClass('shrink');
        }
        else {
            $('header').removeClass('shrink');
        }
  });
function getCurrentScroll() {
    return window.pageYOffset || document.documentElement.scrollTop;
    }
});
</script>


<script>
$(function() {

    $('#login-form-link').click(function(e) {
		$("#login-form").delay(100).fadeIn(100);
 		$("#register-form").fadeOut(100);
		$('#register-form-link').removeClass('active');
		$(this).addClass('active');
		e.preventDefault();
	});
	$('#register-form-link').click(function(e) {
		$("#register-form").delay(100).fadeIn(100);
 		$("#login-form").fadeOut(100);
		$('#login-form-link').removeClass('active');
		$(this).addClass('active');
		e.preventDefault();
	});

});

</script>


    <script>
        $(document).ready(function() {

            var owl = $("#owl-demo1");

            owl.owlCarousel({

                items: 5, //10 items above 1000px browser width
                itemsDesktop: [1000, 4], //5 items between 1000px and 901px
                itemsDesktopSmall: [900, 2], // 3 items betweem 900px and 601px
                itemsTablet: [600, 1], //2 items between 600 and 0;
                itemsMobile: [360, 1] // itemsMobile disabled - inherit from itemsTablet option

            });

            // Custom Navigation Events
            $(".next").click(function() {
                owl.trigger('owl.next');
            })
            $(".prev").click(function() {
                owl.trigger('owl.prev');
            })
            $(".play").click(function() {
                owl.trigger('owl.play', 1000);
            })
            $(".stop").click(function() {
                owl.trigger('owl.stop');
            })

        });
    </script>
<script>
    $(function() {
  $(".view").on( "click", function() {
    $(this).next().slideToggle(250);
    $fexpand = $(this).find(">:first-child");
    if ($(this).hasClass('opened')) {
        $(this).removeClass('opened');
    } else {
        $(this).addClass('opened');
    };
  });
});
    </script>
	
	
</body>
</html>