<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>telafica SMS Gateway - Log In</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/skeleton.css">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/entypo.css">
    <link rel="stylesheet" href="css/media-queries.css">

</head>
<body class="dashboard">
<!-- Hidden (slide out) Navigation  -->
<nav class="topNav">
    <ul>
        <li><img src="images/logo.png" alt="telafrica mobile" /></li>
        <li><strong>telafrica</strong> Dashboard</li>
        <li class="dashboard "><a href="#">Dashboard</a></li>
        <li class="messageCenter"><a href="messages.php">Message Center</a></li>
        <li class="settings"><a href="">Settings</a></li>
        <li class="account"><a href="">Account</a></li>
        <li class="reports"><a href="">Reports</a></li>
        <li class="support"><a href="">Support</a></li>
        <li class="Logout"><a href="">Logout</a></li>
        <li class="close" onclick="toggleNav();" ><a href="#">Close</a></li>
    </ul>
</nav>
<!-- End  Hidden (slide out) Navigation  -->

<!-- Top Header  -->
<header>
    <div class="menu" ><span class="entypo-menu" onclick="toggleNav();">&nbsp;</span></div>
        <div class="container">
            <!-- Logo  -->
            <div class="two columns dashboardLogo">
                <img src="images/logo_small.png" alt="telafrica mobile" />
            </div>
            <!-- Logo  -->


            <!-- Current Page Title  -->
            <div class="five columns left pageTitle">
                <span>Dashboard</span>
            </div>
            <!-- Current Page Title  -->


            <!-- Currently Logged in User  -->
            <div class="five columns  userName">
                <span>Logged in as <a href="#" class="openLogout"><span>user@example.com<span ><img src="images/icons/down_arrow.png" alt="\/"/></span></span></a></span>
            </div>
            <div class="logout">
                <span><a href="#">Dashboard</a></span>
                <br/>
                <span><a href="#">Add Credits</a></span>
                <br/>
                <span><a href="#">Log Out</a></span>
            </div>
            <!-- Currently Logged in User  -->
        </div>
</header>
<!-- End top Header  -->

<!-- Start Notifications and Alerts Panel  -->
<section class="notifications">
    <div class="container">
        <div class="twelve columns">
            <div class="panel notice">
                This is a notification

            </div>
        </div>
        <div class="twelve columns">
            <div class="panel alert">This is an alart</div>
        </div>
    </div>
</section>
<!-- End Notifications and Alerts Panel  -->

<section class="summaries">
    <div class="container">
        <div class="three columns messagesSent panel">
            <h4>Messages Sent</h4>
            <h5><strong>225</strong></h5>
            <p>SMSs Delivered To Date</p>
        </div>
       <div class="three columns creditsRemaining panel">
            <h4>Credits</h4>
            <h5><strong>5</strong></h5>
            <p>SMSs Credits</p>
        </div>
        <div class="six columns panel reportsSummary">
            <h4>Delivery Summary <span class="right  width100"><a href="#" class="green">show all reports</a></span></h4>
            <ul>
                <li>Date Sent: <span>8 October 2015</span></li>
                <li>Messages Delivered <span>200</span></li>
                <li>Messages Failed: <span>22</span></li>
                <li>Messages Confirmed: <span>3</span></li>
            </ul>
        </div>
    </div>
</section>
<div class="spacer">&nbsp;</div>
<section class="intro">
    <div class="container">
        <div class="six columns panel welcomeText">
            <h4>Welcome to telafrica SMS Gateway</h4>
            <p>Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit. </p>
<p>Nam nec tellus a odio tincidunt auctor a ornare odio. Sed non  mauris vitae erat consequat auctor eu in elit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Mauris in erat justo. Nullam ac urna eu felis dapibus condimentum sit amet a augue.</p>
        </div>
        <div class="six columns panel usageReport">
            <h4>Monthly Usage Report</h4>
            <img src="images/Site-Statistic-2.jpg" alt="Stats" />
        </div>
    </div>
</section>

<!-- Links for Scripts  -->
<script src="js/jquery-2.1.4.js"></script>
<script src="js/jquery-ui.min.js"></script>
<!-- Links for Scripts  -->

<!-- Javascript  -->
<script>
        $(document).ready(function() {
              $(".alert").hide();
            $(".notice").hide();
        });

        // Show and Hide Log In Button
        $(".userName").click(function(){
            $(".logout").slideToggle("fast");
        });

       // Show and Hide Navigation
        function toggleNav() {
            $("nav").toggle("slide", {direction: "left"}, 500);
        }
    </script>
</body>
</html>
