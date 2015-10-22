<!doctype html>
<html class="no-js" lang="en">


<head>
      <title>telafrica Mobile - Service Coverage</title>
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
                <h4 class="text-white underline">telafrica mobile coverage</h4>
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
<iframe width="100%" height="600" frameborder="0" src="http://widgets.scribblemaps.com/myl/?d=true&z=true&mc=true&lat=31.720275257466337&lng=-20.056035300000076&vz=2&type=road&ti=true&s=true&t=d&width=1020&height=600&id=nCCJysZ39n" style="border:0" allowfullscreen></iframe>
            </div>


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
