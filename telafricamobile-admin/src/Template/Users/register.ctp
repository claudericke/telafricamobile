<script src='https://www.google.com/recaptcha/api.js'></script>
<div class="register-wrapper center" style="min-height: 800px;">
	<div class="twelve columns center">
		<h4><strong>SMS Gateway</strong> Register</h4>
	</div>
	<div class="twelve columns register-form">
		<?php 
			echo $this->Form->create($user);
		?>
		<div class="spacer">&nbsp;</div>
	    <div class="twelve columns">
			<?php echo $this->Form->input('firstname', ['label' => '', 'placeholder' => 'First Name', 'class' => 'u-full-width']); ?>
		</div>
		<div class="twelve columns"><div class="spacer">&nbsp;</div></div>
		<div class="twelve columns">
		<?php echo $this->Form->input('lastname', ['label' => '', 'placeholder' => 'Last Name', 'class' => 'u-full-width']); ?>
		</div>
		<div class="twelve columns"><div class="spacer">&nbsp;</div></div>
		<div class="twelve columns">
			<?php echo $this->Form->input('email',  ['label' => '', 'placeholder' => 'E-Mail Address', 'class' => 'emailInput u-full-width']); ?>
		</div>
		<div class="twelve columns"><div class="spacer">&nbsp;</div></div>
		<div class="twelve columns">
			<?php echo $this->Form->input('mobilenumber',  ['label' => '', 'placeholder' => 'Mobile Number', 'class' => 'mobileInput u-full-width']); ?>
		</div>
		<div class="twelve columns"><div class="spacer">&nbsp;</div></div>
		<div class="twelve columns left">
		<?php 
			//echo $this->Form->input('country', array('label' => '', 'placeholder' => 'Type Your Country', 'class' => 'u-full-width'));

			echo $this->Form->input('country', ['class' => 'u-full-width', 'label' => '',
            	'options' => [
            		"" => "Select a country",
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
        	]);
		?>
		</div>
		<div class="twelve columns"><div class="spacer">&nbsp;</div></div>
		<div class="twelve columns">
			<?php echo $this->Form->input('password', ['label' => '', 'placeholder' => 'Password', 'class' => 'passwordInput u-full-width']); ?> 
		</div>
		<div class="twelve columns"><div class="spacer">&nbsp;</div></div>
		<div class="twelve columns">
		<?php
			echo $this->Form->input('password_confirm', ['label' => '', 'placeholder' => 'Confirm Password', 'type'=>'password', 'class' => 'passwordInput u-full-width']);
		?>
		</div>
		<div class="twelve columns"><div class="spacer">&nbsp;</div></div>
        <div class="four columns margin5 center">
           <div class="g-recaptcha" data-sitekey="<?php echo $sitekey; ?>"></div>
        </div>
        <div class="twelve columns"><div class="spacer">&nbsp;</div></div>
        <div class="four columns forgotLinks">
            <span class="u-full-width"><a href="#" class="forgotUsername">By proceeding you agree to our Terms of Usage</a></span>
        </div>
        <div class="four columns margin5 center" >
            <input type="submit" name="register" class="button-primaryloginRegister center greenBG white u-full-width " value="Register" />
        </div>
		<div class="twelve columns"><div class="spacer">&nbsp;</div></div>
		<?php 
			//echo $this->Form->button(__('Register', array('class' => 'button-primaryloginRegister center greenBG white u-full-width')));
			echo $this->Form->input('role', ['type' => 'hidden', 'value' => 'regular']);
			echo $this->Form->end(); 
		?>
	</div>
	<div class="twelve columns"><div class="spacer"></div></div>
	<div class="twelve columns left">
	    <span class="Linkarrow"><img src="/images/right133.png" alt="" /></span><a href="/">Go to Login Page</a>
	    <br/> <span class="Linkarrow"><img src="/images/right133.png" alt="" /></span><a href="../">Go to Home Page</a>
	</div>
</div>