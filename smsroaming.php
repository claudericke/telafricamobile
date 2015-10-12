<!doctype html>
<html class="no-js" lang="en">


<head>
      <title>Telafrica Mobile - SMS Roaming</title>
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

        <img alt="Header Background" class="background-image" src="img/header1.jpg">

        <div class="row">
            <div class="medium-12 medium-centered columns text-center">
                <h4 class="text-white underline">telafrica Voice Solutions</h4>
            </div>
        </div>

    </header>

    <section>
        <!--begin text section-->



        <div class="row">

            <div class="medium-4 columns">
                <div class="medium-12 columns">
                    <h6 class="page-title">ABOUT VOICE SOLUTIONS</h6>
                </div>
                <p class="lead">Telafrica is specialized in delivering high-quality, high-performance, and high-capacity dialler/ CC routes with unbeatable rates for all your needs. </p>
                    <p>Telafrica Mobile Wholesale Voice provides reliable, stable, direct and competitive VoiP termination to an A-Z destinations around the world.</p>
            </div>

            <div class="medium-4 columns">
                <div class="medium-12 columns">
                    <h6 class="page-title">We Buy Termination Routes</h6>
                </div>
                <p>We are also interested in buying and selling termination routes; we buy termination services to support huge demand for our products.</p>
<p>The two forms of traffic that we offer are;
    <ul class="bulletList">
    <li>Retail</li>
    <li>Wholesale</li>
    </ul>


                </p>
            </div>

            <div class="medium-4 columns">
                <div class="medium-12 columns">
                    <h6 class="page-title">Benefits of Using Our Service</h6>
                </div>
                <ul class="bulletList">
                    <li>Premium Routing and CLI</li>
                    <li>Top Quality Worldwide Call Routing.</li>
                    <li>Superior Voip Network security.</li>
                    <li>Save on Voice Calls.</li>
                    <li>Flexible and scalable solution.</li>
                    <li>Dedicated 24/7 business support.</li>
                </ul>

            </div>
        </div>
    </section>

<section>
    <!--begin form section-->
    <div class="row">
        <div class="medium-12 columns text-center">
        <h6 class="page-title">VOICE SERVICES INQUIRY FORM</h6>
        </div>
    </div>

    <div class="row">
    <div class="medium-12 columns">
        <div class="formSection">
            <form name="voiceApplication" method="post" action="bin/processForm.php">
                <input name="formType" type="hidden" value="voiceApplication" />
                <div class="medium-12 columns">
                     <p style="padding:0px 0px 10px 0px;">Enter your details and the information about the routes you require and we will get back to you as soon as possible:</p>
                </div>

            <div class="row">
                <div class="medium-7 columns">
                    <label for="email" class="u-full-width formElement required">Full Name:</label>
                    <input type="text" placeholder="Full Name" id="fullName" class="u-full-width formElement" name="fullName" data-validate="required">
                </div>

                <div class="medium-5 columns">
                    <label for="email" class="u-full-width formElement required">E-Mail:</label>
                    <input type="text" placeholder="example@email.com" id="email" class="u-full-width formElement" name="email" data-validate="required,email">
                </div>
            </div>

            <div class="row">
                <div class="medium-12 columns">
                    <label for="message">Message:</label>
                    <textarea name="message" style="min-height:150px;" class="u-full-width formElement" id="message" placeholder="I would like to inquire about routes for..." data-validate="required"></textarea>
                </div>
            </div>

            <div class="row">
                <div class="medium-8 columns">&nbsp;</div>
                <div class="medium-4 columns">
                    <input class="submit button" name="submit" type="submit" value="Send Inquiry" />
                </div>
            </div>
        </form>
        </div>
        </div>
    </div>
    <!--End of Form section-->
</section>

    <footer class="dark">

        <div class="row">
            <div class="medium-4 columns">
                <img alt="Logo" src="img/logo-light.png" class="logo push-bottom">
                <p>
                    telafrica mobile is a Tier 2 mobile services provider based in South Africa.
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
    <script src="js/jquery.scrollTo.min.js"></script>
    <script src="js/verify.js"></script>

    <script>
        $(document).foundation();



        //Smooth Scrollig on Page
        $(document).ready(function() {
            $("body").smoothWheel();

        });

        $(".callRates").click(function() {
            swal({
                title: "fibre voIP Call Rates",
                text: " <table class=\"callingPackage\" style=\"margin:0 auto;\"><thead><tr><th>OPERATOR</th><th>RATES IN RAND (ZAR) per minute</th></tr></thead><tbody><tr><td>TELKOM</td><td>0.75</td></tr><tr><td>VODACOM</td><td>0.75</td></tr><tr><td>CELL C</td><td>0.75</td></tr><tr><td>MTN</td><td>0.75</td></tr><tr><td>Others</td><td>0.75</td></tr></tbody></table><br/><p><i class=\"icon_info_alt\"></i><br/><i>Calling Rates are uniform across all packages</i></p>",
                html: true
            });
        });

    $(".changePackage").click(function () {
        package = $(this).data("feature-id");
        packageSelect = $("#chosenPackage");
        console.log(package);

        if (package == "2MBPS") {
            packageSelect.val("2MBPS1Year");
        }
        if (package == "5MBPS") {
            packageSelect.val("5MBPS1Years");
        }
        if (package == "7MBPS") {
            packageSelect.val("7MBPS1Years");
        }
        if (package == "10MBPS") {
            packageSelect.val("10MBPS1Years");
        }
        if (package == "20MBPS") {
            packageSelect.val("20MBPS1Years");
        }
        if (package == "50MBPS") {
            packageSelect.val("50MBPS1Years");
        }


      });

        $(".subscribeFibre").click(function () {
           $(window).scrollTo($('#applicationForm'), 800);
        });


    </script>
</body>

</html>
