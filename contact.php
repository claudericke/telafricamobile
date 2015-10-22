<!doctype html>
<html class="no-js" lang="en">


<head>
      <title>telafrica Mobile - Home Page</title>
      <?php include("includes/header.php"); ?>
</head>

<body>
    <div class="loader">
        <div class="bubblingG">
            <img src="img/preloader.GIF" alt="..." />
        </div>
    </div>

    <!-- Start Navigation -->
    <nav class="overlay-nav sticky-nav nav-transparent">
       <?php include("includes/navigation.php"); ?>
    </nav>
    <!-- Start Navigation -->


    <header class="divider-background background-parallax">

        <img alt="Header Background" class="background-image" src="img/header5.jpg">

        <div class="row">
            <div class="medium-12 medium-centered columns text-center">
                <h4 class="text-white underline">contact us</h4>
            </div>
        </div>

    </header>

    <section class="background-mid-grey">

		<div class="row">
			<div class="medium-4 columns">
				<h6 class="page-title">Contact Details</h6>

				<ul class="icon-list">
					<li><i class="icon icon-map-pin"></i> The Willow Office Park,<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Office 276 George Road, <br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Erand Gardens, <br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Midrand 1685</li>
					<li><i class="icon icon_headphones"></i><strong>Customer Care Hotline<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;+27 81 900 0000</strong></li>
					<li><i class="icon icon-envelope"></i>info@telafricamobile.com</li>
				</ul>
			</div>

			<div class="medium-8 columns">
				<h6 class="page-title">Drop Us A Line</h6>
				<form class="form-contact">
					<fieldset>
						<input id="form-name" type="text" placeholder="Your Name">
						<input id="form-email" type="text" placeholder="Your Email">
					</fieldset>
					<textarea id="form-msg" rows="10" placeholder="Your Comment"></textarea>
					<input type="submit" class="button button-small" value="Send Message">
					<div id="details-error">*Please complete all fields correctly</div>
					<div id="form-sent">Thankyou, your enquiry has been sent</div>
				</form>
			</div>
		</div>


	</section>
	<section class="no-pad">
		<div class="map">
			<div class="overlay"></div>
			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3587.1679340839955!2d28.127381699999997!3d-25.9625322!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1e956fcd9ff14a99%3A0x34beb4176092efd4!2s276+George+Rd%2C+Midrand%2C+1687!5e0!3m2!1sen!2sza!4v1444040194167"></iframe>
		</div>
	</section>


      <?php include("includes/footer.php"); ?>

    <script src="js/vendor/jquery.js"></script>
    <script src="js/foundation.min.js"></script>
    <script src="js/jquery.flexslider-min.js"></script>
    <script src="js/smooth-scroll.js"></script>
    <script src="js/isotope.pkgd.min.js"></script>
    <script src="js/inview.js"></script>
    <script src="js/skrollr.min.js"></script>
    <script src="js/scripts.js"></script>
    <script src="js/sweetalert.min.js"></script>
    <script src="js/jquery.smoothwheel.js"></script>
    <script src="js/jquery.scrollTo.min.js"></script>

    <script>
        $(document).foundation();



        //Smooth Scrollig on Page
        $(document).ready(function() {
            $("body").smoothWheel();

        });



    </script>
</body>

</html>
