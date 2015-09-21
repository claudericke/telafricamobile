<!DOCTYPE html>
<html lang="">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>telafica SMS Gateway - Log In</title>
    <link rel="stylesheet" href="css/style.css">
    <link href='http://fonts.googleapis.com/css?family=PT+Sans:400,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/skeleton.css">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/entypo.css">
    <link rel="stylesheet" href="css/tabs.css">
    <link rel="stylesheet" href="css/jquery.tagsinput.css">
    <link rel="stylesheet" href="css/jquery.tokenize.css">
    <link rel="stylesheet" href="css/media-queries.css">

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
            <li class="Logout"><a href="">Logout</a></li>
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
    <section class="messageCenter">
        <div class="cd-tabs">
            <nav>
                <ul class="cd-tabs-navigation">
                    <li><a data-content="sent" class="selected" href="#0"><span class="icon"><img src="images/icons/sentIcon.png" alt=">" /></span>Sent Messages</a></li>
                    <li><a data-content="compose" href="#0">Compose Message</a></li>
                    <li><a data-content="templates" href="#0">Message Templates</a></li>
                    <li><a data-content="subs" href="#0">Subscriber Lists</a></li>
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
                                        <input type="checkbox" name="selectAll" value="">
                                    </th>
                                    <th>Message To</th>
                                    <th>Message</th>
                                    <th>Date Sent</th>
                                    <th>Delivery Status</th>
                                    <th><span class="icon trash"><img src="images/icons/trash.png" alt="trash" /></span></th>
                                    <th><span class="icon trash"><img src="images/icons/forward.png"  alt="forward" /></span></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <input type="checkbox" name="selectAll" value="">
                                    </td>
                                    <td>+27635889663</td>
                                    <td>Hi Baraa , can u pleas...</td>
                                    <td>12 October 2015</td>
                                    <td class="green bold">Delivered</td>
                                    <th><span class="icon trash"><img src="images/icons/trash.png" alt="trash" /></span></th>
                                    <th><span class="icon trash"><img src="images/icons/forward.png"  alt="forward" /></span></th>
                                </tr>
                                <tr>
                                    <td>
                                        <input type="checkbox" name="selectAll" value="">
                                    </td>
                                    <td>+27635152032</td>
                                    <td>New stock available, ...</td>
                                    <td>11 October 2015</td>
                                    <td class="green bold">Delivered</td>
                                    <th><span class="icon trash"><img src="images/icons/trash.png" alt="trash" /></span></th>
                                    <th><span class="icon trash"><img src="images/icons/forward.png"  alt="forward" /></span></th>
                                </tr>
                                <tr>
                                    <td>
                                        <input type="checkbox" name="selectAll" value="">
                                    </td>
                                    <td>+16554654833</td>
                                    <td>Stand a chance to wi...</td>
                                    <td>09 October 2015</td>
                                    <td class="red bold">Operator determined barring</td>
                                    <th><span class="icon trash"><img src="images/icons/trash.png" alt="trash" /></span></th>
                                    <th><span class="icon trash"><img src="images/icons/forward.png"  alt="forward" /></span></th>
                                </tr>
                                <tr>
                                    <td>
                                        <input type="checkbox" name="selectAll" value="">
                                    </td>
                                    <td>+67321321544</td>
                                    <td>Verse of the day, Elij...</td>
                                    <td>4 October 2015</td>
                                    <td class="green bold">Delivered</td>
                                    <th><span class="icon trash"><img src="images/icons/trash.png" alt="trash" /></span></th>
                                    <th><span class="icon trash"><img src="images/icons/forward.png"  alt="forward" /></span></th>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </li>

                <li data-content="compose" >
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
                            <span class="wordCount">160<span><span>&nbsp; characters</span>
                            <span class="messageCount"></span><span>&nbsp; part message</span>
                        </div>
                        </form>
                    </div>
                    <div class="container">
                        <div class="one columns">
                                &nbsp;
                        </div>
                     <div class="spacer">&nbsp;</div>
                        <div class="three columns floatRight">
                            <button class="btn-primary u-full-width greenBG white" >Review &amp; Send</button>

                        </div>
                        <div class="three columns floatRight">
                            <button class="btn-primary u-full-width greyBG white ">Reset All</button>
                        </div>
                        <div class="two columns">
                            &nbsp;
                        </div>
                        </form>
                    </div>
                </li>

                <li data-content="templates">
                    <p>Gallery Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque tenetur aut, cupiditate, libero eius rerum incidunt dolorem quo in officia.</p>

                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. A ipsa vero, culpa doloremque voluptatum consectetur mollitia, atque expedita unde excepturi id, molestias maiores delectus quos molestiae. Ab iure provident adipisci eveniet quisquam ratione libero nam inventore error pariatur optio facilis assumenda sint atque cumque, omnis perspiciatis. Maxime minus quam voluptatum provident aliquam voluptatibus vel rerum. Soluta nulla tempora aspernatur maiores! Animi accusamus officiis neque exercitationem dolore ipsum maiores delectus asperiores reprehenderit pariatur placeat, quaerat sed illum optio qui enim odio temporibus, nulla nihil nemo quod dicta consectetur obcaecati vel. Perspiciatis animi corrupti quidem fugit deleniti, atque mollitia labore excepturi ut.</p>
                </li>

                <li data-content="subs">
                    <p>Store Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum recusandae rem animi accusamus quisquam reprehenderit sed voluptates, numquam, quibusdam velit dolores repellendus tempora corrupti accusantium obcaecati voluptate totam eveniet laboriosam?</p>

                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eligendi, enim, pariatur. Ab assumenda, accusantium! Consequatur magni placeat quae eos dicta, cum expedita sunt facilis est impedit possimus dolorum sequi nostrum nobis sit praesentium molestias nulla laudantium fugit corporis nam ut saepe harum ipsam? Debitis accusantium, omnis repudiandae modi, distinctio illo voluptatibus aperiam odio veritatis, quam perferendis eaque ullam. Temporibus tempore ad voluptates explicabo ea sit deleniti ipsum quos dolores tempora odio, ab corporis molestiae, eaque optio, perferendis! Cumque libero quia modi! Totam magni rerum id iusto explicabo distinctio, magnam, labore sed nemo expedita velit quam, perspiciatis non temporibus sit minus voluptatum. Iste, cumque sunt suscipit facere iusto asperiores, ullam dolorum excepturi quidem ea quibusdam deserunt illo. Nesciunt voluptates repellat ipsam.</p>
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
    <!-- Links for Scripts  -->

    <!-- Javascript  -->
    <script>
        $(document).ready(function () {
            $(".alert").hide();
            $(".notice").hide();
            $('#sendTo').tagsInput({
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

        $("#message").keyup(function () {
            textInput = $(this);
            tival = textInput.val().length
            if (tival > 160 ) {
                $(".wordCount").text(160 - tival);
            } else {
                $(".wordCount").text(160 - tival);
            }
            if (tival < 320 ){
                $(".messageCount").text(2);
                textInput.val(textInput.val().substr(0, 320));
            }

        });
    </script>
</body>

</html>
