<?php

foreach ($SMSsPerMonth as $value) {
    $Months [] = date('F Y', strtotime($value['datetosend']));
    $NumberOfSMSSent [] = $value['SMSsPerMonth'];
}


?>
<script src="/telafricamobile-admin/js/Chart.min.js"></script>

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

            <div style="width:90%;height:400px">
                <div id="legend" style="width:200px"></div>
                <canvas id="myChart" style="width:100%; height:80%"></canvas>
            </div>

            <script type="text/javascript">               
                            
                // Get the context of the canvas element we want to select
                var ctx = document.getElementById("myChart").getContext("2d");

                // Chart data and style
                var options = {

                    //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
                    scaleBeginAtZero : true,

                    //Boolean - Whether grid lines are shown across the chart
                    scaleShowGridLines : true,

                    //String - Colour of the grid lines
                    scaleGridLineColor : "rgba(0,0,0,.05)",

                    //Number - Width of the grid lines
                    scaleGridLineWidth : 1,

                    //Boolean - Whether to show horizontal lines (except X axis)
                    scaleShowHorizontalLines: true,

                    //Boolean - Whether to show vertical lines (except Y axis)
                    scaleShowVerticalLines: true,

                    //Boolean - If there is a stroke on each bar
                    barShowStroke : true,

                    //Number - Pixel width of the bar stroke
                    barStrokeWidth : 2,

                    //Number - Spacing between each of the X value sets
                    barValueSpacing : 5,

                    //Number - Spacing between data sets within X values
                    barDatasetSpacing : 1,

                    //String - A legend template
                    legendTemplate : "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].fillColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>"

                }

                var data = {
                    labels: [<?php echo  "'".join("','", $Months)."'"; ?>],
                    datasets: [
                        {
                            label: "SMSs Sent",
                            fillColor: "rgba(151,187,205,0.5)",
                            strokeColor: "rgba(151,187,205,0.8)",
                            highlightFill: "rgba(151,187,205,0.75)",
                            highlightStroke: "rgba(151,187,205,1)",
                            data: [<?php echo join(',', $NumberOfSMSSent); ?>]
                        },
                      
                    ]
                };

                var myBarChart = new Chart(ctx).Bar(data, options);
                document.getElementById("legend").innerHTML = myBarChart.generateLegend();
            </script>
            
            <!--<img src="/telafricamobile-admin/images/Site-Statistic-2.jpg" alt="Stats" />-->
        </div>
    </div>
</section>