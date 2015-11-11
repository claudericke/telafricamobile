<?php

if ($this->request->session()->read('Auth.User.role') == 'admin' || $this->request->session()->read('Auth.User.role') == 'sales'){

?>
<section class="account-admin">
        <div class="container">
            <div class="twelve columns panel">
                <div class="eight columns">&nbsp;</div>
                 <div class="four columns right">
                    <button class="btn-primary u-full-width blueBG white center createUserButton">Create User +</button>
                </div>
                <div class="ten columns createUserContainer">
                        <?php 
                              echo $this->Form->create(null,['id' => 'userform']);
                        ?>
                        <fieldset>
                              <div class="twelve columns">
                                    <?php echo $this->Form->input('firstname', ['label' => 'User First Name', 'placeholder' => '', 'class' => 'u-full-width', 'required' => 1]); ?>
                              </div>
                              <div class="twelve columns">
                              <?php echo $this->Form->input('lastname', ['label' => 'User Last Name', 'placeholder' => '', 'class' => 'u-full-width', 'required' => 1]); ?>
                              </div>
                              <div class="twelve columns">
                                    <?php echo $this->Form->input('email',  ['label' => 'User e-mail:', 'placeholder' => '', 'class' => 'u-full-width', 'required' => 1]); ?>
                                </div>
                                <div class="twelve columns noMargin">
                                    
                                    <?php echo $this->Form->input('password', ['label' => 'User Password:', 'placeholder' => '', 'class' => 'u-full-width', 'required' => 1]); ?>
                                </div>
                                <div class="twelve columns noMargin">
                                    
                                    <?php echo $this->Form->input('mobilenumber',  ['label' => 'Mobile Number:', '' => 'Mobile Number', 'class' => 'u-full-width']); ?>
                                </div>
                                <div class="twelve columns noMargin">
                                    <?php 
                                          echo $this->Form->input('country', ['class' => 'u-full-width', 'label' => 'Country:',
                                          'options' => [
                                                "" => "Country...",
                                            "AF" => "Afghanistan",
                                            "AL" => "Albania",
                                            "DZ" => "Algeria",
                                            "AS" => "American Samoa",
                                            "AD" => "Andorra",
                                            "AG" => "Angola",
                                            "AI" => "Anguilla",
                                            "AG" => "Antigua & Barbuda",
                                            "AR" => "Argentina",
                                            "AA" => "Armenia",
                                            "AW" => "Aruba",
                                            "AU" => "Australia",
                                            "AT" => "Austria",
                                            "AZ" => "Azerbaijan",
                                            "BS" => "Bahamas",
                                            "BH" => "Bahrain",
                                            "BD" => "Bangladesh",
                                            "BB" => "Barbados",
                                            "BY" => "Belarus",
                                            "BE" => "Belgium",
                                            "BZ" => "Belize",
                                            "BJ" => "Benin",
                                            "BM" => "Bermuda",
                                            "BT" => "Bhutan",
                                            "BO" => "Bolivia",
                                            "BL" => "Bonaire",
                                            "BA" => "Bosnia & Herzegovina",
                                            "BW" => "Botswana",
                                            "BR" => "Brazil",
                                            "BC" => "British Indian Ocean Ter",
                                            "BN" => "Brunei",
                                            "BG" => "Bulgaria",
                                            "BF" => "Burkina Faso",
                                            "BI" => "Burundi",
                                            "KH" => "Cambodia",
                                            "CM" => "Cameroon",
                                            "CA" => "Canada",
                                            "IC" => "Canary Islands",
                                            "CV" => "Cape Verde",
                                            "KY" => "Cayman Islands",
                                            "CF" => "Central African Republic",
                                            "TD" => "Chad",
                                            "CD" => "Channel Islands",
                                            "CL" => "Chile",
                                            "CN" => "China",
                                            "CI" => "Christmas Island",
                                            "CS" => "Cocos Island",
                                            "CO" => "Colombia",
                                            "CC" => "Comoros",
                                            "CG" => "Congo",
                                            "CK" => "Cook Islands",
                                            "CR" => "Costa Rica",
                                            "CT" => "Cote D'Ivoire",
                                            "HR" => "Croatia",
                                            "CU" => "Cuba",
                                            "CB" => "Curacao",
                                            "CY" => "Cyprus",
                                            "CZ" => "Czech Republic",
                                            "DK" => "Denmark",
                                            "DJ" => "Djibouti",
                                            "DM" => "Dominica",
                                            "DO" => "Dominican Republic",
                                            "TM" => "East Timor",
                                            "EC" => "Ecuador",
                                            "EG" => "Egypt",
                                            "SV" => "El Salvador",
                                            "GQ" => "Equatorial Guinea",
                                            "ER" => "Eritrea",
                                            "EE" => "Estonia",
                                            "ET" => "Ethiopia",
                                            "FA" => "Falkland Islands",
                                            "FO" => "Faroe Islands",
                                            "FJ" => "Fiji",
                                            "FI" => "Finland",
                                            "FR" => "France",
                                            "GF" => "French Guiana",
                                            "PF" => "French Polynesia",
                                            "FS" => "French Southern Ter",
                                            "GA" => "Gabon",
                                            "GM" => "Gambia",
                                            "GE" => "Georgia",
                                            "DE" => "Germany",
                                            "GH" => "Ghana",
                                            "GI" => "Gibraltar",
                                            "GB" => "Great Britain",
                                            "GR" => "Greece",
                                            "GL" => "Greenland",
                                            "GD" => "Grenada",
                                            "GP" => "Guadeloupe",
                                            "GU" => "Guam",
                                            "GT" => "Guatemala",
                                            "GN" => "Guinea",
                                            "GY" => "Guyana",
                                            "HT" => "Haiti",
                                            "HW" => "Hawaii",
                                            "HN" => "Honduras",
                                            "HK" => "Hong Kong",
                                            "HU" => "Hungary",
                                            "IS" => "Iceland",
                                            "IN" => "India",
                                            "ID" => "Indonesia",
                                            "IA" => "Iran",
                                            "IQ" => "Iraq",
                                            "IR" => "Ireland",
                                            "IM" => "Isle of Man",
                                            "IL" => "Israel",
                                            "IT" => "Italy",
                                            "JM" => "Jamaica",
                                            "JP" => "Japan",
                                            "JO" => "Jordan",
                                            "KZ" => "Kazakhstan",
                                            "KE" => "Kenya",
                                            "KI" => "Kiribati",
                                            "NK" => "Korea North",
                                            "KS" => "Korea South",
                                            "KW" => "Kuwait",
                                            "KG" => "Kyrgyzstan",
                                            "LA" => "Laos",
                                            "LV" => "Latvia",
                                            "LB" => "Lebanon",
                                            "LS" => "Lesotho",
                                            "LR" => "Liberia",
                                            "LY" => "Libya",
                                            "LI" => "Liechtenstein",
                                            "LT" => "Lithuania",
                                            "LU" => "Luxembourg",
                                            "MO" => "Macau",
                                            "MK" => "Macedonia",
                                            "MG" => "Madagascar",
                                            "MY" => "Malaysia",
                                            "MW" => "Malawi",
                                            "MV" => "Maldives",
                                            "ML" => "Mali",
                                            "MT" => "Malta",
                                            "MH" => "Marshall Islands",
                                            "MQ" => "Martinique",
                                            "MR" => "Mauritania",
                                            "MU" => "Mauritius",
                                            "ME" => "Mayotte",
                                            "MX" => "Mexico",
                                            "MI" => "Midway Islands",
                                            "MD" => "Moldova",
                                            "MC" => "Monaco",
                                            "MN" => "Mongolia",
                                            "MS" => "Montserrat",
                                            "MA" => "Morocco",
                                            "MZ" => "Mozambique",
                                            "MM" => "Myanmar",
                                            "NA" => "Nambia",
                                            "NU" => "Nauru",
                                            "NP" => "Nepal",
                                            "AN" => "Netherland Antilles",
                                            "NL" => "Netherlands (Holland, Europe)",
                                            "NV" => "Nevis",
                                            "NC" => "New Caledonia",
                                            "NZ" => "New Zealand",
                                            "NI" => "Nicaragua",
                                            "NE" => "Niger",
                                            "NG" => "Nigeria",
                                            "NW" => "Niue",
                                            "NF" => "Norfolk Island",
                                            "NO" => "Norway",
                                            "OM" => "Oman",
                                            "PK" => "Pakistan",
                                            "PW" => "Palau Island",
                                            "PS" => "Palestine",
                                            "PA" => "Panama",
                                            "PG" => "Papua New Guinea",
                                            "PY" => "Paraguay",
                                            "PE" => "Peru",
                                            "PH" => "Philippines",
                                            "PO" => "Pitcairn Island",
                                            "PL" => "Poland",
                                            "PT" => "Portugal",
                                            "PR" => "Puerto Rico",
                                            "QA" => "Qatar",
                                            "ME" => "Republic of Montenegro",
                                            "RS" => "Republic of Serbia",
                                            "RE" => "Reunion",
                                            "RO" => "Romania",
                                            "RU" => "Russia",
                                            "RW" => "Rwanda",
                                            "NT" => "St Barthelemy",
                                            "EU" => "St Eustatius",
                                            "HE" => "St Helena",
                                            "KN" => "St Kitts-Nevis",
                                            "LC" => "St Lucia",
                                            "MB" => "St Maarten",
                                            "PM" => "St Pierre & Miquelon",
                                            "VC" => "St Vincent & Grenadines",
                                            "SP" => "Saipan",
                                            "SO" => "Samoa",
                                            "AS" => "Samoa American",
                                            "SM" => "San Marino",
                                            "ST" => "Sao Tome & Principe",
                                            "SA" => "Saudi Arabia",
                                            "SN" => "Senegal",
                                            "RS" => "Serbia",
                                            "SC" => "Seychelles",
                                            "SL" => "Sierra Leone",
                                            "SG" => "Singapore",
                                            "SK" => "Slovakia",
                                            "SI" => "Slovenia",
                                            "SB" => "Solomon Islands",
                                            "OI" => "Somalia",
                                            "ZA" => "South Africa",
                                            "ES" => "Spain",
                                            "LK" => "Sri Lanka",
                                            "SD" => "Sudan",
                                            "SR" => "Suriname",
                                            "SZ" => "Swaziland",
                                            "SE" => "Sweden",
                                            "CH" => "Switzerland",
                                            "SY" => "Syria",
                                            "TA" => "Tahiti",
                                            "TW" => "Taiwan",
                                            "TJ" => "Tajikistan",
                                            "TZ" => "Tanzania",
                                            "TH" => "Thailand",
                                            "TG" => "Togo",
                                            "TK" => "Tokelau",
                                            "TO" => "Tonga",
                                            "TT" => "Trinidad & Tobago",
                                            "TN" => "Tunisia",
                                            "TR" => "Turkey",
                                            "TU" => "Turkmenistan",
                                            "TC" => "Turks & Caicos Is",
                                            "TV" => "Tuvalu",
                                            "UG" => "Uganda",
                                            "UA" => "Ukraine",
                                            "AE" => "United Arab Emirates",
                                            "GB" => "United Kingdom",
                                            "US" => "United States of America",
                                            "UY" => "Uruguay",
                                            "UZ" => "Uzbekistan",
                                            "VU" => "Vanuatu",
                                            "VS" => "Vatican City State",
                                            "VE" => "Venezuela",
                                            "VN" => "Vietnam",
                                            "VB" => "Virgin Islands (Brit)",
                                            "VA" => "Virgin Islands (USA)",
                                            "WK" => "Wake Island",
                                            "WF" => "Wallis & Futana Is",
                                            "YE" => "Yemen",
                                            "ZM" => "Zambia",
                                            "ZW" => "Zimbabwe"
                                           ]
                                          , 'required' => 1
                                    ]);
                                    ?>
                                </div>
                            <div class="twelve columns noMargin">
                                    <?php 
                                          echo $this->Form->input('role', ['class' => 'u-full-width', 'label' => 'User Level:',
                                          'options' => [
                                                "regular" => "Regular (default)",
                                                "sales" => "Sales",
                                                "admin" => "Administrator"
                                                ], 
                                          'required' => 1

                                          ]);
                                    ?>
                                </div>
                                <div class="twelve columns ">
                                    <button class="btn-primary greenBG white center" id="addUser">Save User</button>
                                    <button class="btn-primary redBG white center Createcancel">Cancel</button>
                                </div>
                        </fieldset>
                        <?php
                              echo $this->Form->end();
                        ?>
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
                              <td><span id="credits<?php echo $i;?>"><?php echo ($user->credit->creditvalue ? $user->credit->creditvalue : 0); ?></span></td>
                              <td><button class="btn-primary u-full-width greenBG white center addCredit">Add Credits</button></td>
                              <td><button class="btn-primary u-full-width blueBG white center removeCredit">Remove Credits</button></td>
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
<?php

}else{


?>


<section class="account-reg">
        <div class="container">
            <div class="twelve columns panel">
                <h4>Add Credit</h4>
                <p>Please enter the amount of credit you wish to add. Minimum is 500 credits</p>
                <form name="settings" action="" method="post">
                    <label for="creditAmount">Enter Sender ID:</label>
                    <input type="number" name="creditAmount" value="500" id="creditAmount" min="500" max="1000000" step="500" autocomplete="off">
                    <input type="button" name="addCredit" class="addCredit center greenBG white " value="Add Credit" />
                    <div class="twelve columns">
                        <span>Total cost: </span><span><strong>$2.50</strong></span>
                    </div>
                    <div class="twelve columns">
                        <div class="spacer"></div>
                    </div>
                    <h4>Close Account</h4>
                    <p>If you wish to close your account please complete the form below.</p>
                    <label for="reason">Reason for closing <small><i>(optional)</i></small>:</label>
                    <input name="reason" type="text" id="reason" />
                    <div class="twelve columns">
                        <input type="checkbox" name="agree" id="agree"> I Agree to Terms of Closure as defined by the Terms of Agreement</div>
                    <div class="twelve columns">
                        <input type="button" name="closeAccount" id="closeAccount" class="closeAccount center redBG white " value="Close Account" />
                    </div>

                </form>
            </div>
        </div>
    </section>


<?php
}

?>

  
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
          

        //Remove Credit Function
     $(".removeCredit").click(function() {
            var accountName = "";
            var user_id = "";
            var index = "";
            $('.sentMessages tr').click(function(){
                    
                  index =  $('tr').index(this);                      
                  accountName = $("#email" + index).attr('title');
                  user_id = $("#user_id" + index).val();
                  
                  
                  swal({
                      title: "Remove Credit to " + accountName,
                      text: "Enter Amount of Credit to be removed:",
                      type: "input",
                      showCancelButton: true,
                      closeOnConfirm: false,
                      animation: "slide-from-top"
                  }, function(inputValue) {
                      if (inputValue === false) return false;

                      if (inputValue === "") {

                          swal.showInputError("Ooops looks like you did not enter some credits!");
                          return false

                        }else if(!$.isNumeric(inputValue)){

                              swal.showInputError("Please enter valid credits!");
                              return false

                        }else{

                              $.get('/telafricamobile-admin/credits/remove?user_id='+user_id+"&creditvalue="+inputValue, function(d) {       

                                    if(d != 'error'){

                                          swal("You have removed " + inputValue + " credit to " + accountName, ". Your new credits are " + d, "success");
                                          $('#credits' + index).html(d);
                                    }else{

                                           swal("Sorry there was error. Credit were not removed", "success");
                                    }
                                   

                              });
                        }
                      
                  });
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
                    
                  index =  $('tr').index(this);                      
                  accountName = $("#email" + index).attr('title');
                  user_id = $("#user_id" + index).val();                  
                  
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

                          swal.showInputError("Ooops looks like you did not enter some credits!");
                          return false

                        }else if(!$.isNumeric(inputValue)){

                              swal.showInputError("Please enter valid credits!");
                              return false

                        }else{

                              $.get('/telafricamobile-admin/credits/add?user_id='+user_id+"&creditvalue="+inputValue, function(d) {       

                                    if(d != 'error'){

                                          swal("You have added " + inputValue + " credit to " + accountName, ". Your new credits are " + d, "success");
                                          $('#credits' + index).html(d);
                                    }else{

                                           swal.showInputError("Sorry there was an error. Credit were not added");
                                    }
                                   

                              });
                        }
                      
                  });
            });
            
      });
     // $(document).ready(function () {
            $("#userform").submit(function(e){
                 
                  e.preventDefault();    
                  var firstname = $('#firstname').val();
                  var lastname = $('#lastname').val();
                  var email = $('#email').val();
                  var mobilenumber = $('#mobilenumber').val();
                  var country = $('#country').val();
                  var role = $('#role').val();
                  var procced = true;
                  var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;            
                  var password = $('#password').val();

                  if(!firstname){

                        swal("Please enter the user's first name!");
                        $('#firstname').focus();
                        procced = false;
                  }

                  if(!lastname){

                        swal("Please enter the user's last name!");
                        $('#lastname').focus();
                        procced = false;
                  }

                  if(!email){

                        swal("Please enter the user's email address!");
                        $('#email').focus();
                        procced = false;
                  }

                  if(!regex.test(email)){

                        swal("Please enter the user's valid email address!");
                        $('#email').focus();
                        procced = false;
                  };

                  if(!password){

                        swal("Please select the user's password!");
                        $('#password').focus();
                        procced = false;
                  }


                  if(!country){

                        swal("Please select the user's country!");
                        $('#country').focus();
                        procced = false;
                  }

                  if(!role){

                        swal("Please select the user's role!");
                        $('#role').focus();
                        procced = false;
                  }
                  if(procced){

                        $.get('/telafricamobile-admin/users/add?firstname=' + firstname + '&lastname=' + lastname + '&email=' + email + '&mobilenumber=' + mobilenumber + '&country=' + country + '&role=' + role + '&password=' + password, function(d) {       

                            if(d != 'error'){

                                swal("The user has been added", "success");
                                window.setTimeout(function(){location.reload()},5000);
                            }else{

                                swal.showInputError("Sorry there was error. User could not be created");
                            }
                             

                        });
                  }  
            });
       //});

        // Disable keystrokes on credits to ensure 500 increments
        $("#creditAmount").keyup(function (e) {
            e.preventDefault();
        })

        // Function to add Credits
        $(".addCredit").click(function () {
            var creditValue = $("#creditAmount").val();
            swal({
                title: "Are you sure?",
                text: "You are about to request " + creditValue + " additional credits",
                type: "info",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, send request!",
                closeOnConfirm: false
            }, function () {

                $.get('/telafricamobile-admin/users/creditRequest?requestedCredits=' + creditValue, function(d) {       

                    if(d != 'error'){

                        swal("Request Sent!", "You have sent a request for " + creditValue + " credits. Please check your mail for more details.", "success");
                        //swal("Nice!", "You wrote: " + inputValue, "success");
                    }else{

                        swal("","Sorry there was error. User could not be created", "error");
                    }
                     

                });

                
            });
        });

        // Function to delete account
        $("#closeAccount").click(function () {
            var reason = $('#reason').val();
            var proceed = true;
            if(!$('#agree').is(":checked")){
                swal("", "Please accept the terms and conditions", "error");                         
                proceed = false;
            }
             if(proceed){
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
                        return false;
                    } else {                              

                        $.get('/telafricamobile-admin/users/closeAccount?reason=' + reason, function(d) {       

                            if(d != 'error'){
                                swal({
                                    title: "Account Deleted!",
                                    text: "Your account has been deleted permanently! You will now be logged out",
                                    type: "warning",
                                    timer: 2000,
                                    showConfirmButton: true
                                });
                                
                            }else{

                                swal("","Sorry there was error.", "error");
                            }                                 

                        });                       
                       window.setTimeout(function(){window.location.replace("/telafricamobile-admin/")},5000);
                    }
                
                });
            }
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