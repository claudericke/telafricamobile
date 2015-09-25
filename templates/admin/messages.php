<!DOCTYPE html>
<html lang="">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>telafica SMS Gateway - Log In</title>
    <link rel="stylesheet" href="css/style.css">
    <link href='http://fonts.googleapis.com/css?family=PT+Sans:400,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/skeleton.css">
    <link rel="stylesheet" href="css/entypo.css">
    <link rel="stylesheet" href="css/tabs.css">
    <link rel="stylesheet" href="css/jquery.tagsinput.css">
    <link rel="stylesheet" href="css/media-queries.css">
    <link rel="stylesheet" href="css/sweetalert.css">

</head>

<body class="dashboard">
    <!-- Hidden (slide out) Navigation  -->
    <nav class="topNav">
        <ul>
            <li><img src="images/logo.png" alt="telafrica mobile" /></li>
            <li><strong>telafrica</strong> Dashboard</li>
            <li class="dashboard "><a href="dashboard.php">Dashboard</a></li>
            <li class="messageCenter"><a href="#">Message Center</a></li>
            <li class="settings"><a href="">Settings</a></li>
            <li class="account"><a href="">Account</a></li>
            <li class="reports"><a href="">Reports</a></li>
            <li class="support"><a href="">Support</a></li>
            <li class="Logout"><a href="login.php">Logout</a></li>
            <li class="close" onclick="toggleNav();"><a href="#">Close</a></li>
        </ul>
    </nav>
    <!-- End  Hidden (slide out) Navigation  -->

    <!-- Top Header  -->
    <header>
        <div class="menu"><span class="entypo-menu" onclick="toggleNav();">&nbsp;</span></div>
        <div class="container">
            <!-- Logo  -->
            <div class="two columns dashboardLogo">
                <img src="images/logo_small.png" alt="telafrica mobile" />
            </div>
            <!-- Logo  -->


            <!-- Current Page Title  -->
            <div class="five columns left pageTitle">
                <span>Message Center</span>
            </div>
            <!-- Current Page Title  -->


            <!-- Currently Logged in User  -->
            <div class="five columns  userName">
                <span>Logged in as <a href="#" class="openLogout"><span>user@example.com<span ><img src="images/icons/down_arrow.png" alt="\/"/></span></span>
                </a>
                </span>
            </div>
            <div class="logout">
                <span><a href="dashboard.php">Dashboard</a></span>
                <br/>
                <span><a href="#">Add Credits</a></span>
                <br/>
                <span><a href="login.php">Log Out</a></span>
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
                <div class="panel alert">This is an alert</div>
            </div>
        </div>
    </section>
    <!-- End Notifications and Alerts Panel  -->
    <section class="messageCenter">
        <div class="cd-tabs">
            <nav>
                <ul class="cd-tabs-navigation">
                    <li><a data-content="sent" class="selected" href="#0"><span class="icon"><img src="images/icons/sentIcon.png" alt=">" /></span>Sent Messages</a></li>
                    <li><a data-content="compose" href="#0"><span class="icon"><img src="images/icons/write.png" alt=">" /></span>Compose Message</a></li>
                    <li><a data-content="templates" href="#0"><span class="icon"><img src="images/icons/message.png" alt=">" /></span>Message Templates</a></li>
                    <li><a data-content="subs" href="#0"><span class="icon"><img src="images/icons/list.png" alt=">" /></span>Subscriber Lists</a></li>
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
                                    <th><span class="icon trash"><img src="images/icons/trash.png" alt="trash" /></span></th>
                                    <th><span class="icon trash">&nbsp;</span></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <input type="checkbox" name="selectAll" class="sentCheck" value="">
                                    </td>
                                    <td>+27635889663</td>
                                    <td>Hi Baraa , can u pleas...</td>
                                    <td>12 October 2015</td>
                                    <td class="green bold">Delivered</td>
                                    <td><span class="icon trash"><img src="images/icons/trash.png" alt="trash" /></span></td>
                                    <td><span class="icon trash"><img src="images/icons/forward.png"  alt="forward" /></span></td>
                                </tr>
                                <tr>
                                    <td>
                                        <input type="checkbox" name="selectAll" class="sentCheck" value="">
                                    </td>
                                    <td>+27635152032</td>
                                    <td>New stock available, ...</td>
                                    <td>11 October 2015</td>
                                    <td class="green bold">Delivered</td>
                                    <td><span class="icon trash"><img src="images/icons/trash.png" alt="trash" /></span></td>
                                    <td><span class="icon trash"><img src="images/icons/forward.png"  alt="forward" /></span></td>
                                </tr>
                                <tr>
                                    <td>
                                        <input type="checkbox" name="selectAll" class="sentCheck" value="">
                                    </td>
                                    <td>+16554654833</td>
                                    <td>Stand a chance to wi...</td>
                                    <td>09 October 2015</td>
                                    <td class="red bold">Operator determined barring</td>
                                    <td><span class="icon trash"><img src="images/icons/trash.png" alt="trash" /></span></td>
                                    <td><span class="icon trash"><img src="images/icons/forward.png"  alt="forward" /></span></td>
                                </tr>
                                <tr>
                                    <td>
                                        <input type="checkbox" name="selectAll" class="sentCheck" value="">
                                    </td>
                                    <td>+67321321544</td>
                                    <td>Verse of the day, Elij...</td>
                                    <td>4 October 2015</td>
                                    <td class="green bold">Delivered</td>
                                    <td><span class="icon trash"><img src="images/icons/trash.png" alt="trash" /></span></td>
                                    <td><span class="icon trash"><img src="images/icons/forward.png"  alt="forward" /></span></td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </li>

                <li data-content="compose">
                    <div class="container">
                        <form name="compose">
                            <div class="two columns">
                                <label for="sendTo">Send To:</label>
                            </div>
                            <div class="seven columns">
                                <input name="sendTo" id="sendTo" value="" class="u-full-width" />
                                <small class="italics">Numbers seperated by commas. Numbers without country code will be considered as local (South Africa) numbers</small>
                            </div>
                            <div class="three columns ">
                                <button class="btn-primary u-full-width blueBG white center">Upload CSV</button>
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
                        </form>
                    </div>
                    <div class="container">
                        <div class="one columns">
                            &nbsp;
                        </div>
                        <div class="spacer">&nbsp;</div>
                        <div class="three columns floatRight">
                            <button class="btn-primary u-full-width greenBG white" id="sendMessage">Review &amp; Send</button>

                        </div>
                        <div class="three columns floatRight">
                            <button class="btn-primary u-full-width greyBG white" id="resetMessage">Reset All</button>
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
                    <div class="container">
                        <div class="four columns panel">
                            <h4>Template 1 <small>(130 Characters)</small></h4>
                            <p>roin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio.</p>
                            <div class="twleve columns noMargin">
                                <button class="btn-primary u-full-width redBG white center" onClick="deleteTemplate(1)">Delete</button>
                                <button class="btn-primary u-full-width greenBG white center" onClick="sendTemplate(1)">Send</button>
                            </div>
                        </div>
                        <div class="four columns panel">
                            <h4>Template 2 <small>(190 Characters)</small></h4>
                            <p>roin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio. Sed non  mauris vitae erat consequat auctor eu in elit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Mauris in erat justo. Nullam ac urna eu felis dapibus condimentum sit amet a augue.</p>
                            <div class="twleve columns noMargin">
                                <button class="btn-primary u-full-width redBG white center" onClick="deleteTemplate(2)">Delete</button>
                                <button class="btn-primary u-full-width greenBG white center" onClick="sendTemplate(2)">Send</button>
                            </div>
                        </div>
                        <div class="four columns panel">
                            <h4>Template 3 <small>(74 Characters)</small></h4>
                            <p>roin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit.</p>
                            <div class="twleve columns noMargin">
                                <button class="btn-primary u-full-width redBG white center" onClick="deleteTemplate(3)">Delete</button>
                                <button class="btn-primary u-full-width greenBG white center" onClick="sendTemplate(3)">Send</button>
                            </div>
                        </div>
                    </div>
                </li>

                <li data-content="subs">
                      <div class="container createList">
                        <form name="addList">
                            <div class="two columns">
                                <label for="sendTo">Numbers:</label>
                            </div>
                            <div class="seven columns">
                                <input name="subList" id="subList" value="" class="u-full-width" />
                                <small class="italics">Numbers seperated by commas. Numbers without country code will be considered as local numbers</small>
                            </div>
                            <div class="three columns ">
                                <button class="btn-primary u-full-width blueBG white center">Upload CSV</button>
                                <button class="btn-primary u-full-width greenBG white center">Save List</button>
                                <button class="btn-primary u-full-width redBG white center createNewListCancel">Cancel</button>
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
                                <tr>

                                    <td>Mailing List 1</td>
                                    <td>A list of my users</td>
                                    <td>120 Subscribers</td>
                                    <td><span class="icon deleteUser"><img src="images/icons/trash.png" title="Delete User" alt="trash" /></span></td>
                                    <td><span class="icon addUser"><img src="images/icons/addUser.png"  alt="Add User" title="Add User" /></span></td>
                                    <td><span class="icon sendtoList"><img src="images/icons/sendSMS.png"  alt="Send SMS" Title="Send SMS" /></span></td>
                                </tr>
                                <tr>

                                    <td>Mailing List 2</td>
                                    <td>Another list of my users</td>
                                    <td>53 Subscribers</td>
                                    <td><span class="icon deleteUser"><img src="images/icons/trash.png" title="Delete User" alt="trash" /></span></td>
                                    <td><span class="icon addUser"><img src="images/icons/addUser.png"  alt="Add User" title="Add User" /></span></td>
                                    <td><span class="icon sendtoList"><img src="images/icons/sendSMS.png"  alt="Send SMS" Title="Send SMS" /></span></td>
                                </tr>
                                <tr>

                                    <td>Mailing List 3</td>
                                    <td>Yet another list of my users</td>
                                    <td>44 Subscribers</td>
                                    <td><span class="icon deleteUser"><img src="images/icons/trash.png" title="Delete User" alt="trash" /></span></td>
                                    <td><span class="icon addUser"><img src="images/icons/addUser.png"  alt="Add User" title="Add User" /></span></td>
                                    <td><span class="icon sendtoList"><img src="images/icons/sendSMS.png"  alt="Send SMS" Title="Send SMS" /></span></td>
                                </tr>

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
    <script src="js/jquery-2.1.4.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/jquery.tagsinput.js"></script>
    <script src="js/sweetalert.min.js"></script>
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

           $('#subList').tagsInput({
                'defaultText': 'Add Numbers',
                'height': '53px',
                'width': '100%'
            });

        });

        // Show and Hide Log In Button
        $(".userName").click(function () {
            $(".logout").slideToggle("fast");
        });

        // Show and Hide Navigation
        function toggleNav() {
            $(".topNav").toggle("slide", {
                direction: "left"
            }, 500);
        }


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
        $("#sendMessage").click(function () {
            swal("Added to Send List", "Your message(s) have been sent to the network. Check sent items to view send status");
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
        function deleteTemplate(templateItem) {
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
                    swal("Deleted!", "SMS Template " + templateItem + " deleted", "success");
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
                    return false
                }
                swal("SMS Template Created!", "Template text: " + inputValue, "success");
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
</body>

</html>
