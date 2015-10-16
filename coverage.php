<!doctype html>
<html class="no-js" lang="en">


<head>
      <title>Telafrica Mobile - Service Coverage</title>
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

        <img alt="Header Background" class="background-image" src="img/header4.jpg">

        <div class="row">
            <div class="medium-12 medium-centered columns text-center">
                <h4 class="text-white underline">telafrica mobile corporate</h4>
            </div>
        </div>

    </header>

    <section>
        <!--begin text section-->

        <div class="row">
            <div class="medium-12 columns text-center">
                <h6 class="page-title ">COVERAGE MAP</h6>
            </div>
        </div>

        <div class="row">

            <div class="medium-12 columns">

            </div>


        </div>

    </section>
    <footer class="dark">

        <div class="row">
            <div class="medium-4 columns">
                <img alt="Logo" src="img/logo-light.png" class="logo push-bottom">
                <p>
                    telafrica mobile is a Tier 1 mobile services provider based in South Africa.
                </p>
            </div>

            <div class="medium-4 columns">
                <h6>Social pages</h6>
                <ul>
                    <li><a href="https://www.facebook.com/telafricamobile" target="_blank">&nbsp;<i class="social_facebook">&nbsp;</i>&nbsp;telafricamobile<br></a></li>
                    <li><a href="#http://www.twitter.com/" target="_blank">&nbsp;<i class="social_twitter"></i>&nbsp;@telafricamobile<br></a>
                        <br>
                    </li>
                    <li>
                        <a href="#">
                            <br>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <br>
                        </a>
                    </li>
                </ul>
            </div>


            <div class="medium-4 columns">
                <h6>Contact Us</h6>
                <p class="push-bottom-small">
                       <span>The Willow Office Park,<br/>Office 276<br/></span>
                    <span>George Road, Erand Gardens,<br/>Midrand 1685</span>
                </p>
                <p>
                    <i class="icon icon_phone"></i>&nbsp;+27 81 900 0000
                    <br>
                    <i class="icon icon_mail"></i>&nbsp;info@telafricamobile.com</p>
            </div>
        </div>

        <div class="footer-lower">
            <div class="row">
                <div class="medium-7 columns">
                    <span>© 2015 telafrica mobile - Design by <a href="http://www.driftcreativeagency.com"><strong>Drift Creative Agency</strong></a> - All Rights Reserved</span>
                </div>

                <div class="medium-5 columns text-right">
                    <ul class="social-profiles">
                        <li>
                            <a href="https://www.facebook.com/telafricamobile" target="_blank">
                                <i class="icon social_facebook"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>


    </footer>

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
    <script>
        $(document).foundation();

        // enquire Button AJAX Send
        $(".enquire").click(function() {
            var regex = /^[-a-z0-9~!$%^&*_=+}{\'?]+(\.[-a-z0-9~!$%^&*_=+}{\'?]+)*@([a-z0-9_][-a-z0-9_]*(\.[-a-z0-9_]+)*\.(aero|arpa|biz|com|coop|edu|gov|info|int|mil|museum|name|net|org|pro|travel|mobi|[a-z][a-z])|([0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}))(:[0-9]{1,5})?$/i;
            productName = $(this).data("product");
            swal({
                title: "Enquire about " + productName,
                text: "Please enter your e-mail address and we will send you more information:",
                type: "input",
                showCancelButton: true,
                closeOnConfirm: false,
                imageUrl: "img/logo_color.png",
                animation: "slide-from-top",
                inputPlaceholder: "E-Mail Address",
                showCancelButton: true,
                closeOnConfirm: false,
                showLoaderOnConfirm: true,
            }, function(inputValue) {
                validation = regex.test(inputValue);
                if (inputValue = false) return false;
                if (validation === false) {
                    swal.showInputError("Please enter a valid e-mail address!");
                    return false
                }
                $(function() {
                    var emailAddress = inputValue;
                    //alert (dataString);return false;
                    $.ajax({
                        type: "POST",
                        url: "bin/mail.php",
                        data: emailAddress,
                        success: function() {
                            swal("Thank you. Your inquiry has been submitted!");
                        }
                    });
                });
            });
        })

        //Smooth Scrollig on Page
        $(document).ready(function() {
            $("body").smoothWheel()
        });

    </script>
</body>

</html>
