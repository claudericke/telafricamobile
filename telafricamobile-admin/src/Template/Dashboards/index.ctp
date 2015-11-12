<?php
//debug($credits);
?>
<!-- Start Notifications and Alerts Panel  -->
<section class="notifications">
    <div class="container">
        <div class="twelve columns">
            <div class="panel notice">
                This is a notification

            </div>
        </div>
        <div class="twelve columns">
            <div class="panel alert">This is an alert</div>
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
            <h5><strong><?php echo $credits->creditValue; ?></strong></h5>
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
            <img src="/telafricamobile-admin/images/Site-Statistic-2.jpg" alt="Stats" />
        </div>
    </div>
</section>