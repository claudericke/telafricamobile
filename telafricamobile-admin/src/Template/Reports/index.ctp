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
                <!--<form>-->
                     <table class="u-full-width sentMessages">
                         <tr>
                           <?php 

                            if ($this->request->session()->read('Auth.User.role') == 'admin'){
                           ?>
                            <td>
                                 <?php 
                                      echo $this->Form->input('accounts', [
                                        'class' => 'u-full-width', 
                                        'label' => 'Please Select an Account:',
                                        'options' => $accounts,
                                        'empty' => 'Accounts....',
                                        'required' => 0
                                ]);
                                ?>

                            </td>
                            <?php
                            }

                            ?>
                            <td>
                                
                                <?php 
                                    echo $this->Form->input('startdate', ['label' => 'Start Date', 'placeholder' => 'Start Date', 'class' => 'u-full-width', 'required' => 1]); 
                                ?>
                            </td>
                            <td>
                                <?php 
                                    echo $this->Form->input('enddate', ['label' => 'End Date', 'placeholder' => 'End Date', 'class' => 'u-full-width', 'required' => 1]); 
                                ?>
                            </td>
                            <td><button class="saveSettings center greenBG white" id="submit">Submit</button></td>
                        </tr>
                    </table>
                <!--</form>-->
                <div id="data"></div>
            </div>
        </div>
    </div>
</section>
<script type="text/javascript">
    
    $("#submit").click(function() {

        var startdate = $('#startdate').val();
        var enddate = $('#enddate').val();
        var account = $('#accounts').val();
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

            $.get('/telafricamobile-admin/reports/getstarts?startdate='+startdate+"&enddate="+enddate + '&account=' + account, function(d) {       
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