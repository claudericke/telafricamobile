<!doctype html>
<html class="no-js" lang="en">


<head>
      <title>telafrica Mobile - Wireless Solutions</title>
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

        <img alt="Header Background" class="background-image" src="img/header6.jpg">

        <div class="row">
            <div class="medium-12 medium-centered columns text-center">
                <h4 class="text-white underline">telafrica Wireless Solutions</h4>
            </div>
        </div>

    </header>

    <section>
        <!--begin text section-->



        <div class="row">
            <div class="medium-12 columns text-center">
                <h6 class="page-title">ABOUT WIRELESS SOLUTIONS</h6>
            </div>
            <div class="medium-4 columns">
                <p>Doing business in the 21st century requires you to continually meet new challenges in a hyper-dynamic world. Business opportunities have gone from local to global and business applications are often networked across the street, across town and even across the ocean. Employees see high-speed Internet access for their business computers and handheld devices as an office necessity, like a desk, a chair and a coffee machine.</p>
            </div>

            <div class="medium-4 columns">
                <p>To thrive, you need to ensure that your business is a vibrant networked organism, with the connectivity, coverage, and capacity to meet new opportunities. Your employees &amp; both mobile and office-bound &amp; need the ability to quickly respond to customers, close new deals and deliver goods and services more efficiently while reducing operational costs.
                </p>
            </div>
            <div class="medium-4 columns">
                <p>telafrica wireless broadband solutions offer 100% privately-owned connectivity that help corporations and enterprises reduce expenses as they improve business agility with anytime, anywhere access to voice, video and data. telafrica solutions operate in all types of weather, in both line-of-site and non-line-of-site conditions, and can be rapidly deployed indoors and outside without the need for digging, trenching or running cables. </p>
            </div>
        </div>
    </section>

<section>
    <!--begin form section-->
    <div class="row">
        <div class="medium-12 columns text-center">
        <h6 class="page-title">WIRELESS SERVICES FORM</h6>
        </div>
    </div>

    <div class="row">
    <div class="medium-12 columns">
        <div class="formSection">
            <form name="voiceApplication" method="post" action="bin/processForm.php">
                <input name="formType" type="hidden" value="wirelessSolutions" />
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
                    <textarea name="message" style="min-height:150px;" class="u-full-width formElement" id="message" placeholder="I would like more information about wireless services" data-validate="required"></textarea>
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
