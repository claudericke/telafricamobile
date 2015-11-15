 <script src="/telafricamobile-admin/js/jquery-ui.js"></script>
 <link href="/telafricamobile-admin/css/jquery-ui.css" rel="stylesheet">
  <script>
      $(function() {
        $( "#startdate" ).datepicker();
        $( "#enddate" ).datepicker();
      });
  </script>
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

<section class="">
    <div class="container">
        <div class="twelve columns panel">
             <div class="twelve columns">
                <h4>Date Range:</h4>
                 <table class="u-full-width sentMessages">
                     <tr>
                        <td>Start Date:</td>
                        <td><input type="text" id="startdate" name="startdate"></td>
                        <td>End Date:</td>
                        <td><input type="text" id="enddate" name="enddate"></td>
                        <td><button class="saveSettings center greenBG white" id="submit">Submit</button></td>
                    </tr>
                </table>

                <div id="data"></div>
            </div>
        </div>
    </div>
</section>
<script type="text/javascript">
    
    $("#submit").click(function() {

        var startdate = $('#startdate').val();
        var enddate = $('#enddate').val();
        var procced = true;

        if(!startdate){

            swal("Please select the start date!");
            //$('#startdate').focus();
            procced = false;
        }


        if(!enddate){

            swal("Please select the end date!");
            //$('#enddate').focus();
            procced = false;
        }

        if(procced){

            $.get('/telafricamobile-admin/reports/getstarts?startdate='+startdate+"&enddate="+enddate, function(d) {       
                var response = $.parseJSON(d);
                
                if(!response.error){

                      //swal("You have removed " + inputValue + " credit to " + accountName, ". Your new credits are " + d, "success");
                      $('#data').html(response.message);
                }else{

                       swal("Sorry there was error. We could get starts", "success");
                }               

            }); 
        }

    });
</script>