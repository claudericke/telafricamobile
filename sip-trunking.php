<!doctype html>
<html class="no-js" lang="en">


<head>
      <title>telafrica Mobile SIP Trunking</title>
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

        <img alt="Header Background" class="background-image" src="img/header3.jpg">

        <div class="row">
            <div class="medium-12 medium-centered columns text-center">
                <h4 class="text-white underline">telafrica SIP Trunking</h4>
            </div>
        </div>

    </header>

    <section>
        <!--begin text section-->
        <div class="row">
            <div class="medium-12 columns">
                <div class="text-center medium-12 columns">
                    <h6 class="page-title">ABOUT SIP Trunking</h6>
                </div>
                    <p class="lead">If you have your own VoIP server (PBX), but would still like to enjoy our awesome call rates, a telafrica SIP trunk is what you need. You can upgrade or downgrade the amount of lines you require, whenever you want.</p>
            </div>
        </div>
        <div class="row">
                <div class="medium-12 columns pad-top">
                <p>Using your own PBX has a couple of advantages compared to hosted VoIP. Most services like IVRs, Queues and Opening Hours are already available on the server. All you need is a SIP trunk and phone numbers.</p>

                <p>The downside, however, can be the need for maintenance and the technical know-how required. When you choose our hosted PBX service you don't loose functionality and are sure to receive maximum up-time and automatic updates and maintenance without the investment in a PBX.</p>

                <p>The downside, however, can be the need for maintenance and the technical know-how required. When you choose our hosted PBX service you don't loose functionality and are sure to receive maximum up-time and automatic updates and maintenance without the investment in a PBX.</p>
        </div>
        </div>
    </section>


     <section>
    <!--begin form section-->
    <div class="row">
        <div class="medium-12 columns text-center">
        <h6 class="page-title">SIP TRUNKING INQUIRY FORM</h6>
        </div>
    </div>

    <div class="row">
    <div class="medium-12 columns">
        <div class="formSection">
            <form name="voiceApplication" method="post" action="bin/processForm.php">
                <input name="formType" type="hidden" value="SIPTrunkingForm" />
                <div class="medium-12 columns">
                     <p style="padding:0px 0px 10px 0px;">Enter your details and any additional information about SIP Trunking you require and we will get back to you as soon as possible:</p>
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
                    <textarea name="message" style="min-height:150px;" class="u-full-width formElement" id="message" placeholder="e.g I would like to know more about your SIP Trunking service." data-validate="required"></textarea>
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




    </script>
</body>

</html>
