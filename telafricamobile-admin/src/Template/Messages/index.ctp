<?php

//debug($messageTemplates);
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
<section class="messageCenter">
    <div class="cd-tabs">
        <nav>
            <ul class="cd-tabs-navigation">
                <li><a data-content="sent" class="selected" href="#0"><span class="icon"><img src="/telafricamobile-admin/images/icons/sentIcon.png" alt=">" /></span>Sent Messages</a></li>
                <li><a data-content="compose" href="#0"><span class="icon"><img src="/telafricamobile-admin/images/icons/write.png" alt=">" /></span>Compose Message</a></li>
                <li><a data-content="templates" href="#0"><span class="icon"><img src="/telafricamobile-admin/images/icons/message.png" alt=">" /></span>Message Templates</a></li>
                <li><a data-content="subs" href="#0"><span class="icon"><img src="/telafricamobile-admin/images/icons/list.png" alt=">" /></span>Subscriber Lists</a></li>
            </ul>
            <!-- cd-tabs-navigation -->
        </nav>

        <ul class="cd-tabs-content">
            <li data-content="sent" class="selected">
                <div class="container">
                    <table class="u-full-width sentMessages">
                        <thead>
                            <tr>
                                <th>
                                    <input type="checkbox" name="selectAll" id="selectAll" onClick="toggleCheck(this)" class="sentCheck" value="">
                                </th>
                                <th>Message To</th>
                                <th>Message</th>
                                <th>Date Sent</th>
                                <th>Delivery Status</th>
                                <th><span class="icon trash"><img src="/telafricamobile-admin/images/icons/trash.png" alt="trash" /></span></th>
                                <th><span class="icon trash">&nbsp;</span></th>
                            </tr>
                        </thead>
                        <tbody>
                         <?php foreach ($sentMessages as $sentMessage): ?>                      
                            <tr>
                                <td>
                                    <input type="checkbox" name="selectAll" class="sentCheck" value="">
                                </td>
                                <td><?= h($sentMessage->msisdn) ?></td>
                                <td><?= h($sentMessage->content) ?></td>
                                <td><?= h(date('d F Y H:i:s', strtotime($sentMessage->datetosend))) ?></td>
                                <td class="green bold">Delivered</td>
                                <td><span class="icon trash"><img src="/telafricamobile-admin/images/icons/trash.png" alt="trash" /></span></td>
                                <td><span class="icon trash"><img src="/telafricamobile-admin/images/icons/forward.png"  alt="forward" /></span></td>
                            </tr>
                        <?php                    
                        endforeach; 
                        ?>     

                        </tbody>
                    </table>
                    <div class="paginator">
                        <ul class="pagination">
                            <?= $this->Paginator->prev('< ' . __('previous')) ?>
                            <?= $this->Paginator->numbers() ?>
                            <?= $this->Paginator->next(__('next') . ' >') ?>
                        </ul>
                        <p><?= $this->Paginator->counter() ?></p>
                    </div>
                </div>
            </li>

            <li data-content="compose">
                <div class="container">
                    <form name="compose" id="compose" enctype="multipart/form-data">
                        <div class="two columns">
                            <label for="sendTo">Send To:</label>
                        </div>
                        <div class="seven columns">
                            <input name="sendTo" id="sendTo" value="" class="u-full-width" />
                            
                            <small class="italics">Numbers seperated by commas. Numbers without country code will be considered as local (South Africa) numbers</small>
                        </div>
                        <div class="three columns ">
                                <input id="uploadFile1" name="uploadFile1" placeholder="Choose File" disabled="disabled" />
                                <div class="btn-primary u-full-width blueBG white center fileUpload">
                                    <span>Upload CSV</span>
                                    <input type="file" class="upload" value="" id="uploadBtn1" name="uploadBtn1"/>
                                </div>
                           <!--<button class="btn-primary u-full-width blueBG white center">Upload CSV</button>-->
                        </div>
                    </div>
                    <div class="container">
                        <div class="two columns">
                            <label for="message">Message:</label>
                        </div>
                        <div class="seven columns">
                            <textarea name="message" id="message" value="" class="u-full-width"></textarea>
                        </div>
                    <div class="three columns ">
                        <span class="wordCount">0</span><span>&nbsp; characters</span>
                        <br/>
                        <span class="messageCount">1</span><span>&nbsp; part message</span>
                    </div>
                </div>
                <div class="container">
                    <div class="one columns">
                        &nbsp;
                    </div>
                    <div class="spacer">&nbsp;</div>
                    <div class="three columns floatRight">
                        <input type="submit" class="btn-primary u-full-width greenBG white" id="sendMessage" name="sendMessage" value="Review &amp; Send">

                    </div>
                    <div class="three columns floatRight">
                        <input type="button" class="btn-primary u-full-width greyBG white" id="resetMessage" value="Reset All" name="resetMessage"></button>
                    </div>
                    <div class="two columns">
                        &nbsp;
                    </div>
                    </form>
                </div>
            </li>

            <li data-content="templates">
                <div class="container">
                    <div class="seven columns ">
                        &nbsp;
                    </div>
                    <div class="five columns right">
                        <button class="btn-primary u-full-width blueBG white center" onClick="newTemplate()">Create New Template +</button>
                    </div>
                </div>
                 <?php
                 $i = 1; 
                 foreach ($messageTemplates as $messageTemplate): 
                    ?> 
                <div class="container">
                    <div class="four columns panel">
                        <h4>Template <?php echo $i; ?> <small>(<?php echo strlen($messageTemplate->templateContent); ?>)</small></h4>
                        <p><?php echo $messageTemplate->templateContent; ?></p>
                        <div class="twleve columns noMargin">
                            <button class="btn-primary u-full-width redBG white center" onClick="deleteTemplate('<?php echo $messageTemplate->id; ?>', 'Template <?php echo $i; ?>')">Delete</button>
                            <button class="btn-primary u-full-width greenBG white center" onClick="sendTemplate(1)">Send</button>
                        </div>
                    </div>
                </div>
                <?php  
                $i++;               
                endforeach; 
                ?>
            </li>
<style type="text/css">
    
.fileUpload {

    height: 38px;
   
    overflow: hidden;
    position: relative;
    text-align: center;

    border: 0 solid #bbb;
    border-radius: 2px;
    box-sizing: border-box;
    cursor: pointer;
    display: inline-block;
    font-size: 11px;
    font-weight: 600;
   
    letter-spacing: 0.1rem;
    line-height: 38px;
    
    text-align: center;
    text-decoration: none;
    text-transform: uppercase;
    white-space: nowrap
}
.fileUpload input.upload {
    position: absolute;
    top: 0;
    right: 0;
    margin: 0;
    padding: 0;
    font-size: 20px;
    cursor: pointer;
    opacity: 0;
    filter: alpha(opacity=0);
}
</style>
            <li data-content="subs">
                <div class="container createList">
                    <form name="addList" id="addList" enctype="multipart/form-data">
                        <div class="container">
                            <div class="two columns">
                                <label for="listname">List Name:</label>
                            </div>
                            <div class="seven columns">
                                <input name="listname" id="listname" value="" class="u-full-width"  type="text" />
                                <!--<small class="italics">Numbers seperated by commas. Numbers without country code will be considered as local numbers</small>-->
                            </div>
                        
                            <div class="three columns ">
                                <input id="uploadFile" name="uploadFile" placeholder="Choose File" disabled="disabled" />
                                <div class="btn-primary u-full-width blueBG white center fileUpload">
                                    <span>Upload CSV</span>
                                    <input type="file" class="upload" value="" id="uploadBtn" name="uploadBtn"/>
                                </div>
                                <!--<button class="btn-primary u-full-width blueBG white center">Upload CSV</button>-->
                                <button class="btn-primary u-full-width greenBG white center" id="createSubscriberList">Save List</button>
                                <button class="btn-primary u-full-width redBG white center createNewListCancel">Cancel</button>
                            </div>
                        </div>
                        <div class="container">
                            <div class="two columns">
                                <label for="sendTo">List Desciption:</label>
                            </div>
                            <div class="seven columns"> 
                                <textarea id="listdesciption" class="u-full-width" value="" name="listdesciption"></textarea>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="container">
                    <div class="seven columns ">
                        &nbsp;
                    </div>
                    <div class="five columns right">
                        <button class="btn-primary u-full-width greenBG white center createNewList"><strong>+&nbsp;</strong>Create New List </button>
                    </div>
                    <table class="u-full-width subscribers">
                        <thead>
                            <tr>
                                <th>List Name</th>
                                <th>List Description</th>
                                <th>Number of Subscribers</th>
                                <th>&nbsp;</th>
                                <th>&nbsp;</th>
                                <th>&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                        $i = 1;
                        foreach ($messageLists as $messageList): 
                        
                        ?>
                            <tr id="row<?php echo $i;?>" >

                                <td title="<?php echo $messageList['listname']; ?>" id="listname<?php echo $i;?>" ><?php echo $messageList['listname']; ?></td>
                                <td><?php echo $messageList['listdescription']; ?></td>
                                <td><span id="totalSubscibers<?php echo $i;?>"><?php echo $messageList['totalSubscibers']; ?></span></td>
                                <td><a href="javascript:" class="deleteList" title="<?php echo $i;?>"><span class="icon deleteUser"><img src="/telafricamobile-admin/images/icons/trash.png" title="Delete User" alt="trash" /></span></a></td>
                                <td><a href="javascript:" class="addUserlink" title="<?php echo $i;?>"><span class="icon addUser" >
                                <input type="hidden" value="<?php echo $messageList['id']; ?>" id="listid<?php echo $i;?>" name="listid<?php echo $i;?>" />
                                <img src="/telafricamobile-admin/images/icons/addUser.png"  alt="Add User" title="Add User" /></span></a></td>
                                <td><a href="javascript:" class="sendMessageToList" title="<?php echo $i;?>"><span class="icon sendtoList"><img src="/telafricamobile-admin/images/icons/sendSMS.png"  alt="Send SMS" Title="Send SMS" /></span></td>
                            </tr>

                        <?php  
                        $i++;                  
                        endforeach; 
                        ?>   
                        </tbody>
                    </table>
                </div>
            </li>

        </ul>
        <!-- cd-tabs-content -->
    </div>
    <!-- cd-tabs -->
    </div>
</section>

<!-- Links for Scripts  -->

<script src="/telafricamobile-admin/js/main.js"></script>
<script src="/telafricamobile-admin/js/jquery.tagsinput.js"></script>
<script src="/telafricamobile-admin/js/sweetalert.min.js"></script>
<!-- Links for Scripts  -->

<!-- Javascript  -->
<script>
    $(document).ready(function () {
       // Hide form and notification elements
        $(".alert").hide();
        $(".notice").hide();
        $(".createList").hide();
        $(".createNewListCancel").hide();

        // Intitialize tag inputs https://github.com/xoxco/jQuery-Tags-Input
        $('#sendTo').tagsInput({
            'defaultText': 'Add Numbers',
            'height': '53px',
            'width': '100%'
        });

      /** $('#subList').tagsInput({
            'defaultText': 'Add Numbers',
            'height': '53px',
            'width': '100%'
        });**/
        $("#uploadBtn").change(function () {
            $("#uploadFile").val(this.value);
        });
         $("#uploadBtn1").change(function () {
            $("#uploadFile1").val(this.value);
        });

    });

    //Word Count for Message Input
    $("#message").keyup(function () {

        textInput = $(this);
        tival = textInput.val().length;
        var max = 918;

        if (tival <= 160) {
            $(".wordCount").text(tival);
            messageParts = 1;
        } else {
            messageParts = parseInt(tival / 153); // Once messages are more than 1 part they are sent in batches of 153
        if (tival % 160 > 0) {
            messageParts = messageParts + 1;
        }

        $(".wordCount").text(tival);
        $(".messageCount").text(messageParts);
        }

    // Ensure that input is blocked at max characters (max = 918)
    if (this.value.length == max) {
            e.preventDefault();

        $(".wordCount").text(tival);
        $(".messageCount").text(messageParts);
            } else if (this.value.length > max) {
            // Maximum exceeded

        $(".wordCount").text(tival);
        $(".messageCount").text(messageParts);
            this.value = this.value.substring(0, max);
    }

    });

    // Functionality for send button. Reccoment an AJAX request (http://t4t5.github.io/sweetalert/)
    //$("#sendMessage").click(function () {
    $('#compose').on('submit', function(ev){
        ev.preventDefault();
        var proceed = true;
        if($('#message').val() == ''){
            swal("", "Please enter the message", "error");
            $('#message').focus();
            proceed = false;
        }
        if($('#sendTo').val() == '' && $('#uploadFile1').val() == ''){
            swal("", "Please enter the numbers you want to send messages to", "error");
            
            proceed = false;
        }
        var fileExtension = ['zip'];
        if ($.inArray($('#uploadBtn1').val().split('.').pop().toLowerCase(), fileExtension) == -1 && $('#uploadFile1').val() != '') {
            swal("", "Please upload a zip file", "error");
            proceed = false;
        }

        if(proceed){
            /**
            $.get('/telafricamobile-admin/messages/sendSMS?sendTo='+$('#sendTo').val()+"&message="+$('#message').val(), function(d) {       

                    if(d != 'error'){

                        swal("Added to Send List", "Your message(s) have been sent to the network. Check sent items to view send status", "success");
                        window.setTimeout(function(){location.reload()},3000);
                    }else{

                        swal("Sorry there was error. Credit were not removed", "success");
                    }
                   

              });
            **/
            var formData = new FormData($('#compose')[0]);
            $.ajax({
                type:'POST',
                url: '/telafricamobile-admin/messages/sendSMS',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                success:function(data){
                    var response = $.parseJSON(data);  
                    if (!response.error){

                        //swal("List Saved", "Your list has been saved successfully", "success");
                        swal("Added to Send List", "Your message(s) have been sent to the network. Check sent items to view send status. Your credit balance is " + response.message, "success");
                        window.setTimeout(function(){location.reload()},3000);
                    }else{

                        swal(response.message);
                    }
                },
                error: function(data){
                    //console.log("error");
                    //console.log(data.message);
                    swal.showInputError("Sorry there was an error.");
                }
            });
            
        }
    });
    
    // Functionality for send button. Reccoment an AJAX request (http://t4t5.github.io/sweetalert/)
    //$("#createSubscriberList").click(function () {
    $('#addList').on('submit', function(ev){
        ev.preventDefault();
        var proceed = true;
        if($('#listname').val() == ''){
            swal("", "Please enter the list name", "error");
             $('#listname').focus();
            proceed = false;
        }
        if($('#listdesciption').val() == ''){
            swal("", "Please enter the list desciption", "error");
            $('#listdesciption').focus();
            proceed = false;
        }
        var fileExtension = ['zip'];
        if ($.inArray($('#uploadBtn').val().split('.').pop().toLowerCase(), fileExtension) == -1) {
            swal("", "Please upload a zip file", "error");
            proceed = false;
        }

        if(proceed){  

            var formData = new FormData($('#addList')[0]);
            $.ajax({
                type:'POST',
                url: '/telafricamobile-admin/messages/createSubscriberList',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                success:function(data){
                    
                    if (data != "error"){

                        swal("List Saved", "Your list has been saved successfully", "success");
                        window.setTimeout(function(){location.reload()},3000);
                    }else{

                        swal.showInputError("Sorry there was an error.  The list was not added");
                    }
                },
                error: function(data){
                    console.log("error");
                    console.log(data);
                    swal.showInputError("Sorry there was an error.  The list was not added");
                }
            });
                        
        }
    });
    
    $('.addUserlink').click(function(){
        var listname = "";
        var index = "";
        var listid = "";

        index = $(this).attr('title');
        listname = $("#listname" + index).attr('title');
        listid = $("#listid" + index).val();
        console.log(index);

        swal({
            title: "Add subscriber to " +  listname + " list",
            text: "Enter subscriber's numbers:",
            type: "input",
            showCancelButton: true,
            closeOnConfirm: false,
            animation: "slide-from-top"
            }, function(inputValue) {
              if (inputValue === false) return false;

              if (inputValue === "") {

                  swal.showInputError("Ooops looks like you did not enter the subscriber's number!");
                  return false

                }else if(!$.isNumeric(inputValue)){

                      swal.showInputError("Please enter valid numbers!");
                      return false

                }else{

                    $.get('/telafricamobile-admin/messages/addSubsciber?listid='+listid+"&subscriberNumber="+inputValue, function(d) {  

                    var response = $.parseJSON(d);  

                    console.log(response);   

                    if(!response.error){

                          swal("You have added " + inputValue + " to " + listname, ". The list has now " +response.message, "success");
                          $('#totalSubscibers' + index).html(response.message);
                    }else{

                            swal.showInputError(response.message);
                    }


                    });
                }
              
          });
    });

    $('.deleteList').click(function(){
        var listname = "";
        var index = "";
        var listid = "";
        
        index = $(this).attr('title');
        listname = $("#listname" + index).attr('title');
        listid = $("#listid" + index).val();
        console.log(index);

        
        swal({
          title: "Are you sure you want to delete this list " + listname + "?",
          text: "Once the list is deleted it cannot be recovered!",
          type: "warning",        
          showCancelButton: true,
          confirmButtonColor: "#DD6B55",
          confirmButtonText: "Yes, delete it!",
          cancelButtonText: "No, cancel plx!",
          closeOnConfirm: false,
          closeOnCancel: false

        }, function(isConfirm){
            if (isConfirm) {         

                $.get('/telafricamobile-admin/messages/deleteList?listid='+listid, function(d) {  

                    var response = $.parseJSON(d);  

                    console.log(response);   

                    if(!response.error){

                          swal("Deleted!", response.message, "success");
                          $('#row' + index).remove();
                    }else{

                             swal("Cancelled", response.message, "error");
                    }
                });

            }else{

                swal("Cancelled", "The " + listname +" list has not been deleted", "error");
            }
          
        });
    });
    
    $('.sendMessageToList').click(function(){
        var listname = "";
        var index = "";
        var listid = "";
        
        index = $(this).attr('title');
        listname = $("#listname" + index).attr('title');
        listid = $("#listid" + index).val();
        console.log(index);        
        
        swal({
            title: "Send message to subscriber " +  listname + " list",
            text: "Enter the message:",
            type: "input",
            showCancelButton: true,
            closeOnConfirm: false,
            animation: "slide-from-top"
            }, function(inputValue) {
              if (inputValue === false) return false;

              if (inputValue === "") {

                  swal.showInputError("Ooops looks like you did not enter the message!");
                  return false

                }else{

                    $.get('/telafricamobile-admin/messages/sendMessageToList?listid='+listid+"&message="+inputValue, function(d) {  

                    var response = $.parseJSON(d);  

                    console.log(response);   

                    if(!response.error){

                        swal("The message have been queued for subscribers in the   "+ listname + " list.", "With " + $('#totalSubscibers' + index).html() + " subscribers. Your remaining credit balance is " + response.message, "success");
                       // window.setTimeout(function(){location.reload()},5000);
                    }else{

                        swal.showInputError(response.message);
                    }


                    });
                }
              
          });
    });

    // Functionality for reset button on compose
    $("#resetMessage").click(function () {
        swal({
            title: "Are you sure?",
            text: "Are you sure you want to reset all input boxes?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, reset all!",
            cancelButtonText: "No, cancel",
            closeOnConfirm: false,
            closeOnCancel: false
        }, function (isConfirm) {
            if (isConfirm) {
                $("#message").val("");
                $('#sendTo').importTags('');
                $(".wordCount").text(160);
                $('#uploadFile1').val("");
                swal("Reset!", "All fields have been reset", "success");
            } else {
                swal("Cancelled", "Fields not reset, please continue", "error");
            }
        });
    });

    //Select ALL function on sent items
    function toggleCheck(source) {
        checkboxes = $(".sentCheck");
        for (var i = 0, n = checkboxes.length; i < n; i++) {
            checkboxes[i].checked = source.checked;
        }
    }

    //Function for deleting a template
    function deleteTemplate(template_id, templateItem) {
        swal({
            title: "Are you sure?",
            text: "Are you sure you want to delete template" + templateItem + "?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, delete!",
            cancelButtonText: "No, cancel",
            closeOnConfirm: false,
            closeOnCancel: false
        }, function (isConfirm) {
            if (isConfirm) {

                $.get('/telafricamobile-admin/messages/deleteMessageTemplate?template_id='+template_id, function(d) {  

                var response = $.parseJSON(d);  

                console.log(response);   

                if(!response.error){

                   swal("Deleted!", "SMS Template " + templateItem + " deleted", "success");
                    window.setTimeout(function(){location.reload()},5000);
                }else{

                    swal(response.message);
                }


            });

                
            } else {
                swal("Cancelled", "All SMS templates unchanged", "error");
            }
        });
    }

    //Function te sent SMS from template
    function sendTemplate(templateItem) {
        swal("Pass Value of selected template to #message textarea and activate compose tab");
    }

    function newTemplate() {
        swal({
            title: "Create New Template",
            text: "Enter SMS text:",
            type: "input",
            showCancelButton: true,
            closeOnConfirm: false,
            animation: "slide-from-top",
            inputPlaceholder: "Enter SMS template text"
        }, function (inputValue) {
            if (inputValue === false) return false;
            if (inputValue === "") {
                swal.showInputError("You need to write something!");
                return false;
            }

            $.get('/telafricamobile-admin/messages/createMessageTemplate?message='+inputValue, function(d) {  

                var response = $.parseJSON(d);  

                console.log(response);   

                if(!response.error){

                    swal("SMS Template Created!", "Template text: " + inputValue, "success");
                    window.setTimeout(function(){location.reload()},5000);
                }else{

                    swal.showInputError(response.message);
                }


            });


           
        });
    }

    $(".createNewList").click(function () {
        $(".createList").fadeIn();
        $(".cd-tabs-content").css('height', 'auto');
        $(".createNewList").hide();
        $(".createNewListCancel").show();
    });

    $(".createNewListCancel").click(function () {
        $(".createList").hide();
        $(".createNewList").show();
    });
</script>