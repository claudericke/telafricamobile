<?php

?>
    <section class="account-admin">
        <div class="container">
            <div class="twelve columns panel">
                <div class="eight columns">&nbsp;</div>
                 <div class="four columns right">
                    <button class="btn-primary u-full-width blueBG white center createUserButton">Create User +</button>
                </div>
                <div class="ten columns createUserContainer">
                        <form action="" method="post" name="addUserForm">
                        <fieldset>
                                <div class="twelve columns">
                                    <label for="email">User e-mail:</label>
                                    <input name="email" id="email" type="text" value="" class="u-full-width" />
                                </div>
                                <div class="twelve columns noMargin">
                                    <label for="password">User Password:</label>
                                    <input name="password" id="password" type="password" value="" class="u-full-width" />
                                </div>
                                <div class="twelve columns noMargin">
                                    <label for="password">Mobile Number:</label>
                                    <input name="password" id="password" type="password" value="" class="u-full-width" />
                                </div>
                                <div class="twelve columns noMargin">
                                    <label for="password">Country:</label>
                                    <select name="country" class="u-full-width">
                                    <option value="">Country...</option>
                                    <option value="AF">Afghanistan</option>
                                    <option value="AL">Albania</option>
                                    <option value="DZ">Algeria</option>
                                    <option value="AS">American Samoa</option>
                                    <option value="AD">Andorra</option>
                                    <option value="AG">Angola</option>
                                    <option value="AI">Anguilla</option>
                                    <option value="AG">Antigua &amp; Barbuda</option>
                                    <option value="AR">Argentina</option>
                                    <option value="AA">Armenia</option>
                                    <option value="AW">Aruba</option>
                                    <option value="AU">Australia</option>
                                    <option value="AT">Austria</option>
                                    <option value="AZ">Azerbaijan</option>
                                    <option value="BS">Bahamas</option>
                                    <option value="BH">Bahrain</option>
                                    <option value="BD">Bangladesh</option>
                                    <option value="BB">Barbados</option>
                                    <option value="BY">Belarus</option>
                                    <option value="BE">Belgium</option>
                                    <option value="BZ">Belize</option>
                                    <option value="BJ">Benin</option>
                                    <option value="BM">Bermuda</option>
                                    <option value="BT">Bhutan</option>
                                    <option value="BO">Bolivia</option>
                                    <option value="BL">Bonaire</option>
                                    <option value="BA">Bosnia &amp; Herzegovina</option>
                                    <option value="BW">Botswana</option>
                                    <option value="BR">Brazil</option>
                                    <option value="BC">British Indian Ocean Ter</option>
                                    <option value="BN">Brunei</option>
                                    <option value="BG">Bulgaria</option>
                                    <option value="BF">Burkina Faso</option>
                                    <option value="BI">Burundi</option>
                                    <option value="KH">Cambodia</option>
                                    <option value="CM">Cameroon</option>
                                    <option value="CA">Canada</option>
                                    <option value="IC">Canary Islands</option>
                                    <option value="CV">Cape Verde</option>
                                    <option value="KY">Cayman Islands</option>
                                    <option value="CF">Central African Republic</option>
                                    <option value="TD">Chad</option>
                                    <option value="CD">Channel Islands</option>
                                    <option value="CL">Chile</option>
                                    <option value="CN">China</option>
                                    <option value="CI">Christmas Island</option>
                                    <option value="CS">Cocos Island</option>
                                    <option value="CO">Colombia</option>
                                    <option value="CC">Comoros</option>
                                    <option value="CG">Congo</option>
                                    <option value="CK">Cook Islands</option>
                                    <option value="CR">Costa Rica</option>
                                    <option value="CT">Cote D'Ivoire</option>
                                    <option value="HR">Croatia</option>
                                    <option value="CU">Cuba</option>
                                    <option value="CB">Curacao</option>
                                    <option value="CY">Cyprus</option>
                                    <option value="CZ">Czech Republic</option>
                                    <option value="DK">Denmark</option>
                                    <option value="DJ">Djibouti</option>
                                    <option value="DM">Dominica</option>
                                    <option value="DO">Dominican Republic</option>
                                    <option value="TM">East Timor</option>
                                    <option value="EC">Ecuador</option>
                                    <option value="EG">Egypt</option>
                                    <option value="SV">El Salvador</option>
                                    <option value="GQ">Equatorial Guinea</option>
                                    <option value="ER">Eritrea</option>
                                    <option value="EE">Estonia</option>
                                    <option value="ET">Ethiopia</option>
                                    <option value="FA">Falkland Islands</option>
                                    <option value="FO">Faroe Islands</option>
                                    <option value="FJ">Fiji</option>
                                    <option value="FI">Finland</option>
                                    <option value="FR">France</option>
                                    <option value="GF">French Guiana</option>
                                    <option value="PF">French Polynesia</option>
                                    <option value="FS">French Southern Ter</option>
                                    <option value="GA">Gabon</option>
                                    <option value="GM">Gambia</option>
                                    <option value="GE">Georgia</option>
                                    <option value="DE">Germany</option>
                                    <option value="GH">Ghana</option>
                                    <option value="GI">Gibraltar</option>
                                    <option value="GB">Great Britain</option>
                                    <option value="GR">Greece</option>
                                    <option value="GL">Greenland</option>
                                    <option value="GD">Grenada</option>
                                    <option value="GP">Guadeloupe</option>
                                    <option value="GU">Guam</option>
                                    <option value="GT">Guatemala</option>
                                    <option value="GN">Guinea</option>
                                    <option value="GY">Guyana</option>
                                    <option value="HT">Haiti</option>
                                    <option value="HW">Hawaii</option>
                                    <option value="HN">Honduras</option>
                                    <option value="HK">Hong Kong</option>
                                    <option value="HU">Hungary</option>
                                    <option value="IS">Iceland</option>
                                    <option value="IN">India</option>
                                    <option value="ID">Indonesia</option>
                                    <option value="IA">Iran</option>
                                    <option value="IQ">Iraq</option>
                                    <option value="IR">Ireland</option>
                                    <option value="IM">Isle of Man</option>
                                    <option value="IL">Israel</option>
                                    <option value="IT">Italy</option>
                                    <option value="JM">Jamaica</option>
                                    <option value="JP">Japan</option>
                                    <option value="JO">Jordan</option>
                                    <option value="KZ">Kazakhstan</option>
                                    <option value="KE">Kenya</option>
                                    <option value="KI">Kiribati</option>
                                    <option value="NK">Korea North</option>
                                    <option value="KS">Korea South</option>
                                    <option value="KW">Kuwait</option>
                                    <option value="KG">Kyrgyzstan</option>
                                    <option value="LA">Laos</option>
                                    <option value="LV">Latvia</option>
                                    <option value="LB">Lebanon</option>
                                    <option value="LS">Lesotho</option>
                                    <option value="LR">Liberia</option>
                                    <option value="LY">Libya</option>
                                    <option value="LI">Liechtenstein</option>
                                    <option value="LT">Lithuania</option>
                                    <option value="LU">Luxembourg</option>
                                    <option value="MO">Macau</option>
                                    <option value="MK">Macedonia</option>
                                    <option value="MG">Madagascar</option>
                                    <option value="MY">Malaysia</option>
                                    <option value="MW">Malawi</option>
                                    <option value="MV">Maldives</option>
                                    <option value="ML">Mali</option>
                                    <option value="MT">Malta</option>
                                    <option value="MH">Marshall Islands</option>
                                    <option value="MQ">Martinique</option>
                                    <option value="MR">Mauritania</option>
                                    <option value="MU">Mauritius</option>
                                    <option value="ME">Mayotte</option>
                                    <option value="MX">Mexico</option>
                                    <option value="MI">Midway Islands</option>
                                    <option value="MD">Moldova</option>
                                    <option value="MC">Monaco</option>
                                    <option value="MN">Mongolia</option>
                                    <option value="MS">Montserrat</option>
                                    <option value="MA">Morocco</option>
                                    <option value="MZ">Mozambique</option>
                                    <option value="MM">Myanmar</option>
                                    <option value="NA">Nambia</option>
                                    <option value="NU">Nauru</option>
                                    <option value="NP">Nepal</option>
                                    <option value="AN">Netherland Antilles</option>
                                    <option value="NL">Netherlands (Holland, Europe)</option>
                                    <option value="NV">Nevis</option>
                                    <option value="NC">New Caledonia</option>
                                    <option value="NZ">New Zealand</option>
                                    <option value="NI">Nicaragua</option>
                                    <option value="NE">Niger</option>
                                    <option value="NG">Nigeria</option>
                                    <option value="NW">Niue</option>
                                    <option value="NF">Norfolk Island</option>
                                    <option value="NO">Norway</option>
                                    <option value="OM">Oman</option>
                                    <option value="PK">Pakistan</option>
                                    <option value="PW">Palau Island</option>
                                    <option value="PS">Palestine</option>
                                    <option value="PA">Panama</option>
                                    <option value="PG">Papua New Guinea</option>
                                    <option value="PY">Paraguay</option>
                                    <option value="PE">Peru</option>
                                    <option value="PH">Philippines</option>
                                    <option value="PO">Pitcairn Island</option>
                                    <option value="PL">Poland</option>
                                    <option value="PT">Portugal</option>
                                    <option value="PR">Puerto Rico</option>
                                    <option value="QA">Qatar</option>
                                    <option value="ME">Republic of Montenegro</option>
                                    <option value="RS">Republic of Serbia</option>
                                    <option value="RE">Reunion</option>
                                    <option value="RO">Romania</option>
                                    <option value="RU">Russia</option>
                                    <option value="RW">Rwanda</option>
                                    <option value="NT">St Barthelemy</option>
                                    <option value="EU">St Eustatius</option>
                                    <option value="HE">St Helena</option>
                                    <option value="KN">St Kitts-Nevis</option>
                                    <option value="LC">St Lucia</option>
                                    <option value="MB">St Maarten</option>
                                    <option value="PM">St Pierre &amp; Miquelon</option>
                                    <option value="VC">St Vincent &amp; Grenadines</option>
                                    <option value="SP">Saipan</option>
                                    <option value="SO">Samoa</option>
                                    <option value="AS">Samoa American</option>
                                    <option value="SM">San Marino</option>
                                    <option value="ST">Sao Tome &amp; Principe</option>
                                    <option value="SA">Saudi Arabia</option>
                                    <option value="SN">Senegal</option>
                                    <option value="RS">Serbia</option>
                                    <option value="SC">Seychelles</option>
                                    <option value="SL">Sierra Leone</option>
                                    <option value="SG">Singapore</option>
                                    <option value="SK">Slovakia</option>
                                    <option value="SI">Slovenia</option>
                                    <option value="SB">Solomon Islands</option>
                                    <option value="OI">Somalia</option>
                                    <option value="ZA">South Africa</option>
                                    <option value="ES">Spain</option>
                                    <option value="LK">Sri Lanka</option>
                                    <option value="SD">Sudan</option>
                                    <option value="SR">Suriname</option>
                                    <option value="SZ">Swaziland</option>
                                    <option value="SE">Sweden</option>
                                    <option value="CH">Switzerland</option>
                                    <option value="SY">Syria</option>
                                    <option value="TA">Tahiti</option>
                                    <option value="TW">Taiwan</option>
                                    <option value="TJ">Tajikistan</option>
                                    <option value="TZ">Tanzania</option>
                                    <option value="TH">Thailand</option>
                                    <option value="TG">Togo</option>
                                    <option value="TK">Tokelau</option>
                                    <option value="TO">Tonga</option>
                                    <option value="TT">Trinidad &amp; Tobago</option>
                                    <option value="TN">Tunisia</option>
                                    <option value="TR">Turkey</option>
                                    <option value="TU">Turkmenistan</option>
                                    <option value="TC">Turks &amp; Caicos Is</option>
                                    <option value="TV">Tuvalu</option>
                                    <option value="UG">Uganda</option>
                                    <option value="UA">Ukraine</option>
                                    <option value="AE">United Arab Emirates</option>
                                    <option value="GB">United Kingdom</option>
                                    <option value="US">United States of America</option>
                                    <option value="UY">Uruguay</option>
                                    <option value="UZ">Uzbekistan</option>
                                    <option value="VU">Vanuatu</option>
                                    <option value="VS">Vatican City State</option>
                                    <option value="VE">Venezuela</option>
                                    <option value="VN">Vietnam</option>
                                    <option value="VB">Virgin Islands (Brit)</option>
                                    <option value="VA">Virgin Islands (USA)</option>
                                    <option value="WK">Wake Island</option>
                                    <option value="WF">Wallis &amp; Futana Is</option>
                                    <option value="YE">Yemen</option>
                                    <option value="ZR">Zaire</option>
                                    <option value="ZM">Zambia</option>
                                    <option value="ZW">Zimbabwe</option>
                                    </select>
                                </div>
                            <div class="twelve columns noMargin">
                                    <label for="password">User Level:</label>
                                     <select name="userLevel" class="u-full-width">
                                        <option value="regular"><i>Regular (default)</i></option>
                                        <option value="sales">Sales</option>
                                        <option value="admin">Administrator</option>
                                    </select>
                                </div>
                                <div class="twelve columns ">
                                    <button class="btn-primary greenBG white center">Save User</button>
                                    <button class="btn-primary redBG white center Createcancel">Cancel</button>
                                </div>
                        </fieldset>
                        </form>
                    <br/>
                </div>
                <table class="u-full-width sentMessages">
                            <thead>
                                <tr>
                                    <th><?= $this->Paginator->sort('email', 'User e-mail') ?></th>
                                    <th><?= $this->Paginator->sort('role', 'User Level') ?></th>
                                    <th>Credits Available</th>
                                    <th>&nbsp;</th>
                                    <th>&nbsp;</th>
                                    <th>&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody>
                             <?php 
                             $i = 1;
                             foreach ($users as $user): 
                             
                                switch ($user->role) {
                                    case 'regular':
                                        $role = 'Registered';
                                        break;
                                    case 'sales':
                                        $role = 'Sales';
                                        break;
                                    case 'admin':
                                        $role = 'Administrator';
                                        break;
                                    default:
                                        # code...
                                        break;
                                }

                             ?>
                                <tr>
                                    <td title="<?= h($user->email) ?>" id="email<?php echo $i;?>" class="accountName"><?= h($user->email) ?>
                                    <input type="hidden" id="user_id<?php echo $i;?>" name="user_id<?php echo $i;?>" value="<?php echo h($user->id);?>">
                                    </td>
                                    <td><?= h($role) ?></td>
                                    <td><span id="credits<?php echo $i;?>"><?php echo $user->credit->creditvalue; ?></span></td>
                                    <td><button class="btn-primary u-full-width greenBG white center addCredit">Add Credits</button></td>
                                    <td><button class="btn-primary u-full-width blueBG white center">Remove Credits</button></td>
                                    <td><?= $this->Form->postLink(__('<button class="btn-primary u-full-width redBG white center closeAccount">Delete User</button>'), 
                                            ['action' => 'delete', $user->id],
                                            [
                                                'escape'   => false,
                                                'confirm' => __('Are you sure you want to delete # {0}?', $user->firstname.' '.$user->lastname)
                                            ]
                                        ) 
                                        ?>
                                        </td>
                                </tr>
                            <?php
                            $i++;
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
    </section>

    <!-- Links for Scripts  -->
    <script src="/js/jquery-2.1.4.js"></script>
    <script src="/js/jquery-ui.min.js"></script>
    <script src="/js/sweetalert.min.js"></script>
    <!-- Links for Scripts  -->

    <!-- Javascript  -->
    <script>
        $(document).ready(function () {
            $(".alert").hide();
            $(".notice").hide();
            $(".createUserContainer").hide();

        });

        // Disable keystrokes on credits to ensure 500 increments
        $("#creditAmount").keyup(function () {
                e.preventDefault();
            })
            // Show and Hide Log In Button
        $(".userName").click(function () {
            $(".logout").slideToggle("fast");
        });

        // Show and Hide Navigation
        function toggleNav() {
            $("nav").toggle("slide", {
                direction: "left"
            }, 500);
        }

        // Function to add Credits
        $(".addCredit").click(function () {
            creditValue = $("#creditAmount").val();
            swal({
                title: "Are you sure?",
                text: "You are about to request " + creditValue + " additional credits",
                type: "info",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, send request!",
                closeOnConfirm: false
            }, function () {
                swal("Request Sent!", "You have sent a request for " + creditValue + " credits. Please check your mail for more details.", "success");
                swal("Nice!", "You wrote: " + inputValue, "success");
            });
        });

        // Function to delete account
        $("#closeAccount").click(function () {
            swal({
                title: "Confirm Close!",
                text: "Please type 'DELETE' to confirm account deletion:",
                type: "input",
                showCancelButton: true,
                closeOnConfirm: false,
                animation: "slide-from-top"
            }, function (inputValue) {
                if (inputValue != "DELETE") {
                    swal.showInputError("Please type DELETE to confirm deletion");
                    return false
                } else {
                    swal({
                        title: "Account Deleted!",
                        text: "Your account has been deleted permanently! You will now be logged out",
                        type: "warning",
                        timer: 2000,
                        showConfirmButton: true
                    });
                }
                window.location.replace("login.php");
            });
        });

      //Add Credit Function
     $(".addCredit").click(function() {
            var accountName = "";
            var user_id = "";
            var index = "";
            $('.sentMessages tr').click(function(){
                  console.log( 'test row : ' + $('tr').index(this) );  
                  index =  $('tr').index(this);                      
                  accountName = $("#email" + index).attr('title');
                  user_id = $("#user_id" + index).val();
                  console.log('user_id : ' + user_id);  
                  
                  swal({
                      title: "Add Credit to " + accountName,
                      text: "Enter Amount of Credit to add:",
                      type: "input",
                      showCancelButton: true,
                      closeOnConfirm: false,
                      animation: "slide-from-top"
                  }, function(inputValue) {
                      if (inputValue === false) return false;
                      if (inputValue === "") {
                          swal.showInputError("You need to write something!");
                          return false
                      }else{

                        $.get('/credits/add?user_id='+user_id+"&creditvalue="+inputValue, function(d) {       

                              if(d != 'error'){

                                    swal("You have added " + inputValue + " credit to " + accountName, ". Your new credits are " + d, "success");
                                    $('#credits' + index).html(d);
                              }else{


                              }
                             

                        });
                      }
                      
                  });
            });
      });

        //Show Create new user form
        $(".createUserButton").click(function () {
            $(".createUserContainer").slideToggle("fast");
            $(".createUserButton").slideToggle("fast");
        });

       //Hide Create new user form (cancel)
        $(".Createcancel").click(function () {
            $(".createUserContainer").slideToggle("fast");
            $(".createUserButton").slideToggle("fast");
        });

    </script>