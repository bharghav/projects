<?php 
include("includes/headermeta.php");
include("includes/page_redirection.php");
if($_POST['action']=="Registerhere" && $_POST['user_name']!="" && $_POST['user_pwd']==""){
$frontuserObj->userDataEditing($_POST);
}
if($_SESSION['frnt_mid']!=""){
$userindivdetails=$frontuserObj->get_userfirst_datails(TPREFIX.TBL_ADMIN," user_id=".$_SESSION['frnt_mid']);
$userindiv_bill_details=$frontuserObj->get_userfirst_datails(TPREFIX.TBL_ADMINSINFO," userid=".$_SESSION['frnt_mid']);
}
$noitemstotal=$frontUserOnlineStoreObj->getallTempCartQuantityTotal();
?>
<style type="text/css">
<!--
body {
	background-image: url(images/mainBg.jpg);
	background-repeat: no-repeat;
	background-position:center top;
}
-->
</style>
<script type="text/javascript" src="administrator/js/jquery.min.js"></script>
<script type="text/javascript">
function trim(stringToTrim)
{
return stringToTrim.replace(/^\s+|\s+$/g,"");
}
function regfrom_validate()
{
	if(trim(document.regform.user_name.value)=="")
	{ 
		alert("Please enter User Name");
		document.regform.user_name.value='';
		document.regform.user_name.focus();
		return false;
	}
	if(document.getElementById('msgdiv_username').innerHTML!=null && document.getElementById('msgdiv_username').innerHTML!="")
	{
	document.getElementById('msgdiv_username').innerHTML='User Name exist, please change';
	document.regform.user_name.focus();
	document.regform.user_name.select;
	return false;
	}
	if(trim(document.regform.user_email.value)=="")
	{ 
		alert("Please enter Email Address");
		document.regform.user_email.value='';
		document.regform.user_email.focus();
		return false;
	}
	if(document.getElementById('msgdiv_email').innerHTML!=null && document.getElementById('msgdiv_email').innerHTML!="")
	{
	document.getElementById('msgdiv_email').innerHTML='Email Id exist, please change';
	document.regform.user_email.focus();
	document.regform.user_email.select;
	return false;
	}
	if(trim(document.regform.b_firstname.value)=="")
	{ 
		alert("Please enter billing First Name");
		document.regform.b_firstname.value='';
		document.regform.b_firstname.focus();
		return false;
	}

	if(trim(document.regform.b_lastname.value)=="")
	{ 
		alert("Please enter billing Last Name");
		document.regform.b_lastname.value='';
		document.regform.b_lastname.focus();
		return false;
	}
	if(document.regform.b_country.value=="")
	{ 
		alert("Please select billing Country");
		document.regform.b_country.focus();
		return false;
	}
	if(trim(document.regform.b_state.value)=="")
	{ 
		alert("Please enter billing State");
		document.regform.b_state.value='';
		document.regform.b_state.focus();
		return false;
	}
	if(trim(document.regform.b_address.value)=="")
	{ 
		alert("Please enter billing Address");
		document.regform.b_address.value='';
		document.regform.b_address.focus();
		return false;
	}
	if(trim(document.regform.b_city.value)=="")
	{ 
		alert("Please enter billing City");
		document.regform.b_city.value='';
		document.regform.b_city.focus();
		return false;
	}
	if(trim(document.regform.b_zipcode.value)=="")
	{ 
		alert("Please enter billing Zipcode");
		document.regform.b_zipcode.value='';
		document.regform.b_zipcode.focus();
		return false;
	}
	
	if(trim(document.regform.s_firstname.value)=="")
	{ 
		alert("Please enter shipping First Name");
		document.regform.s_firstname.value='';
		document.regform.s_firstname.focus();
		return false;
	}
	
	
	if(trim(document.regform.s_lastname.value)=="")
	{ 
		alert("Please enter shipping Last Name");
		document.regform.s_lastname.value='';
		document.regform.s_lastname.focus();
		return false;
	}
	if(trim(document.regform.s_country.value)=="")
	{ 
		alert("Please select shipping Country");
		document.regform.s_country.focus();
		return false;
	}
	if(trim(document.regform.s_state.value)=="")
	{ 
		alert("Please enter shipping State");
		document.regform.s_state.value='';
		document.regform.s_state.focus();
		return false;
	}
	if(trim(document.regform.b_address.value)=="")
	{ 
		alert("Please enter billing Address");
		document.regform.b_address.value='';
		document.regform.b_address.focus();
		return false;
	}
	if(trim(document.regform.s_city.value)=="")
	{ 
		alert("Please enter shipping City");
		document.regform.s_city.value='';
		document.regform.s_city.focus();
		return false;
	}
	if(trim(document.regform.s_zipcode.value)=="")
	{ 
		alert("Please enter shipping Zipcode");
		document.regform.s_zipcode.value='';
		document.regform.s_zipcode.focus();
		return false;
	}
	//document.regform.submit();
//return true;
}
function checkingUserUnique(title,currentid)
{
	jQuery.ajax({
		type: "POST",
		url: "jquery_ajax_check_controls.php",
		data: "title="+title+"&type=uname&currentid="+currentid,
		success: function(msg){
		jQuery("#msgdiv_username").html(msg);		
		}
	});
}
function checkingEmailUnique(title,currentid)
{
	jQuery.ajax({
		type: "POST",
		url: "jquery_ajax_check_controls.php",
		data: "title="+title+"&type=email&currentid="+currentid,
		success: function(msg){
		jQuery("#msgdiv_email").html(msg);		
		}
	});
}
</script>
<table width="1060" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="28" align="left" valign="top"><img src="images/side-panel_25.png" width="28" height="698" /></td>
        <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
       <td align="left" valign="top" style="background-image:url(images/buttons-bg_29.jpg); background-repeat:repeat-x"><?php include("includes/headermenu.php");?></td>
          </tr>
          <tr>
            <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0" style="background:#FFFFFF;">
              <tr>
                <td width="697" align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td align="left" valign="top" style="padding-left:20px; padding-top:15px"><table width="100%" border="0" align="left">
                                  <tr>
                                    <td align="left" valign="top" class="boldtext">MY ACCOUNT >> EDIT</td></tr>
                                  <tr>
								  <?php if($_GET['err']!="" || $_GET['ferr']!=""){?>
								  <tr>
                                    <td align="left" valign="top" class="red_errormessage"><?=$_GET['err']?><?=$_GET['ferr']?></td></tr>
                                  <tr>
								  <?php }?>
								   <?php if($_GET['fillmsg']=="fillall"){?>
								  <tr>
                                    <td align="left" valign="top" class="red_errormessage">Please fill all required fields then you can redirected to order confirm page</td></tr>
                                  <tr>
								  <?php }?>
								  <tr>
                                    <td align="left" valign="top">
									
	<script type="text/javascript">
	function filltheshipaddress(){
    if(document.getElementById('ss').checked==true){
	 document.getElementById('s_firstname').value=document.getElementById('b_firstname').value;
	 document.getElementById('s_lastname').value=document.getElementById('b_lastname').value;
	 document.getElementById('s_country').value=document.getElementById('b_country').value;
	 document.getElementById('s_state').value=document.getElementById('b_state').value;
	 document.getElementById('s_address').value=document.getElementById('b_address').value;
	 document.getElementById('s_city').value=document.getElementById('b_city').value;
	 document.getElementById('s_zipcode').value=document.getElementById('b_zipcode').value;
	 document.getElementById('s_fax').value=document.getElementById('b_fax').value;
	 document.getElementById('s_phoneno').value=document.getElementById('b_phoneno').value;
	} else {
     document.getElementById('s_firstname').value="<?php echo $userindiv_bill_details->s_firstname; ?>";
	 document.getElementById('s_lastname').value="<?php echo $userindiv_bill_details->s_lastname; ?>";
	 document.getElementById('s_country').value="<?php echo $userindiv_bill_details->s_country; ?>";
	 document.getElementById('s_state').value="<?php echo $userindiv_bill_details->s_state; ?>";
	 document.getElementById('s_address').value="<?php echo $userindiv_bill_details->s_address; ?>";
	 document.getElementById('s_city').value="<?php echo $userindiv_bill_details->s_city; ?>";
	 document.getElementById('s_zipcode').value="<?php echo $userindiv_bill_details->s_zipcode; ?>";
	 document.getElementById('s_fax').value="<?php echo $userindiv_bill_details->s_fax; ?>";
	 document.getElementById('s_phoneno').value="<?php echo $userindiv_bill_details->s_phoneno; ?>";
	}
	}
	</script>								
									
									<form method="post" action="" name="regform" onSubmit="return regfrom_validate();">
									<table width="100%" border="0" align="left" cellpadding="0" cellspacing="0">
                                      <tr>
                                        <td width="24%" height="28" align="left" valign="middle" >User Name :</td>
                                        <td width="76%" height="28" align="left" valign="middle"><input type="text" id="user_name" name="user_name" class="text_large required" style="width:240px;" onchange="checkingUserUnique(this.value,'<?php echo $userindivdetails->us_name;?>');" autocomplete="off" value="<?php echo $userindivdetails->us_name;?>">
										<span id="msgdiv_username" class="red_errormessage" style="width:300px;"></span>										</td>
                                      </tr>
                                      <tr>
                                        <td height="28" align="left" valign="middle" >Email Address :</td>
                                        <td height="28" align="left" valign="middle"><input type="text" id="user_email" name="user_email"class="text_large required" style="width:240px;" onchange="checkingEmailUnique(this.value,'<?php echo $userindivdetails->email;?>');" value="<?php echo $userindivdetails->email;?>"><span id="msgdiv_email" class="red_errormessage" style="width:300px;"></span></td>
                                      </tr>
									  <tr>
                                        <td height="2" align="left" valign="middle" ></td>
										<td height="2" align="left" valign="middle" ></td>
                                      </tr>
									 
									  <?php if($noitemstotal!=0) {?>
									  <tr >
                                        <td colspan="2" align="left" valign="middle"><table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr><td height="25" align="left" valign="middle" bgcolor="#E6E6E6" ><strong>Billing Address</strong></td>
<td height="25"  align="left" valign="middle" bgcolor="#E6E6E6" ><strong>Shipping Address</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="ss" id="ss" value=""  onclick="filltheshipaddress();"/>Same As Billing Address</td>
</tr>
<tr><td align="left" valign="middle" height="5" ></td><td  align="left" valign="middle" height="5"></td></tr>
  <tr>
    <td align="left" valign="top"><table width="95%" border="0" align="left" cellpadding="0" cellspacing="0">
  <tr>
    <td width="55%" height="28" align="left" valign="middle">First Name :<br /><input type="text" name="b_firstname" id="b_firstname" class="text_large required" style="width:240px;" value="<?php echo $userindiv_bill_details->b_firstname; ?>"></td>
  </tr>
  <tr>
    <td height="28" align="left" valign="middle">Last Name :<br /><input type="text" id="b_lastname" name="b_lastname" class="text_large required" style="width:240px;" value="<?php echo $userindiv_bill_details->b_lastname; ?>"></td>
  </tr>
  <tr>
    <td height="28" align="left" valign="middle">Country :<br /><select id="b_country"  name="b_country" class="select_large required" style="width:250px;">
                    <option value="">Select Country</option>
					<option value="Afganistan">Afghanistan</option>
                    <option value="Albania">Albania</option>
                    <option value="Algeria">Algeria</option>
                    <option value="American Samoa">American Samoa</option>
                    <option value="Andorra">Andorra</option>
                    <option value="Angola">Angola</option>
                    <option value="Anguilla">Anguilla</option>
                    <option value="Antigua &amp; Barbuda">Antigua &amp; Barbuda</option>
                    <option value="Argentina">Argentina</option>
                    <option value="Armenia">Armenia</option>
                    <option value="Aruba">Aruba</option>
                    <option value="Australia">Australia</option>
                    <option value="Austria">Austria</option>
                    <option value="Azerbaijan">Azerbaijan</option>
                    <option value="Bahamas">Bahamas</option>
                    <option value="Bahrain">Bahrain</option>
                    <option value="Bangladesh">Bangladesh</option>
                    <option value="Barbados">Barbados</option>
                    <option value="Belarus">Belarus</option>
                    <option value="Belgium">Belgium</option>
                    <option value="Belize">Belize</option>
                    <option value="Benin">Benin</option>
                    <option value="Bermuda">Bermuda</option>
                    <option value="Bhutan">Bhutan</option>
                    <option value="Bolivia">Bolivia</option>
                    <option value="Bonaire">Bonaire</option>
                    <option value="Bosnia &amp; Herzegovina">Bosnia &amp; Herzegovina</option>
                    <option value="Botswana">Botswana</option>
                    <option value="Brazil">Brazil</option>
                    <option value="British Indian Ocean Ter">British Indian Ocean Ter</option>
                    <option value="Brunei">Brunei</option>
                    <option value="Bulgaria">Bulgaria</option>
                    <option value="Burkina Faso">Burkina Faso</option>
                    <option value="Burundi">Burundi</option>
                    <option value="Cambodia">Cambodia</option>
                    <option value="Cameroon">Cameroon</option>
                    <option value="Canada">Canada</option>
                    <option value="Canary Islands">Canary Islands</option>
                    <option value="Cape Verde">Cape Verde</option>
                    <option value="Cayman Islands">Cayman Islands</option>
                    <option value="Central African Republic">Central African Republic</option>
                    <option value="Chad">Chad</option>
                    <option value="Channel Islands">Channel Islands</option>
                    <option value="Chile">Chile</option>
                    <option value="China">China</option>
                    <option value="Christmas Island">Christmas Island</option>
                    <option value="Cocos Island">Cocos Island</option>
                    <option value="Colombia">Colombia</option>
                    <option value="Comoros">Comoros</option>
                    <option value="Congo">Congo</option>
                    <option value="Cook Islands">Cook Islands</option>
                    <option value="Costa Rica">Costa Rica</option>
                    <option value="Cote DIvoire">Cote D'Ivoire</option>
                    <option value="Croatia">Croatia</option>
                    <option value="Cuba">Cuba</option>
                    <option value="Curaco">Curacao</option>
                    <option value="Cyprus">Cyprus</option>
                    <option value="Czech Republic">Czech Republic</option>
                    <option value="Denmark">Denmark</option>
                    <option value="Djibouti">Djibouti</option>
                    <option value="Dominica">Dominica</option>
                    <option value="Dominican Republic">Dominican Republic</option>
                    <option value="East Timor">East Timor</option>
                    <option value="Ecuador">Ecuador</option>
                    <option value="Egypt">Egypt</option>
                    <option value="El Salvador">El Salvador</option>
                    <option value="Equatorial Guinea">Equatorial Guinea</option>
                    <option value="Eritrea">Eritrea</option>
                    <option value="Estonia">Estonia</option>
                    <option value="Ethiopia">Ethiopia</option>
                    <option value="Falkland Islands">Falkland Islands</option>
                    <option value="Faroe Islands">Faroe Islands</option>
                    <option value="Fiji">Fiji</option>
                    <option value="Finland">Finland</option>
                    <option value="France">France</option>
                    <option value="French Guiana">French Guiana</option>
                    <option value="French Polynesia">French Polynesia</option>
                    <option value="French Southern Ter">French Southern Ter</option>
                    <option value="Gabon">Gabon</option>
                    <option value="Gambia">Gambia</option>
                    <option value="Georgia">Georgia</option>
                    <option value="Germany">Germany</option>
                    <option value="Ghana">Ghana</option>
                    <option value="Gibraltar">Gibraltar</option>
                    <option value="Great Britain">Great Britain</option>
                    <option value="Greece">Greece</option>
                    <option value="Greenland">Greenland</option>
                    <option value="Grenada">Grenada</option>
                    <option value="Guadeloupe">Guadeloupe</option>
                    <option value="Guam">Guam</option>
                    <option value="Guatemala">Guatemala</option>
                    <option value="Guinea">Guinea</option>
                    <option value="Guyana">Guyana</option>
                    <option value="Haiti">Haiti</option>
                    <option value="Hawaii">Hawaii</option>
                    <option value="Honduras">Honduras</option>
                    <option value="Hong Kong">Hong Kong</option>
                    <option value="Hungary">Hungary</option>
                    <option value="Iceland">Iceland</option>
                    <option value="India">India</option>
                    <option value="Indonesia">Indonesia</option>
                    <option value="Iran">Iran</option>
                    <option value="Iraq">Iraq</option>
                    <option value="Ireland">Ireland</option>
                    <option value="Isle of Man">Isle of Man</option>
                    <option value="Israel">Israel</option>
                    <option value="Italy">Italy</option>
                    <option value="Jamaica">Jamaica</option>
                    <option value="Japan">Japan</option>
                    <option value="Jordan">Jordan</option>
                    <option value="Kazakhstan">Kazakhstan</option>
                    <option value="Kenya">Kenya</option>
                    <option value="Kiribati">Kiribati</option>
                    <option value="Korea North">Korea North</option>
                    <option value="Korea Sout">Korea South</option>
                    <option value="Kuwait">Kuwait</option>
                    <option value="Kyrgyzstan">Kyrgyzstan</option>
                    <option value="Laos">Laos</option>
                    <option value="Latvia">Latvia</option>
                    <option value="Lebanon">Lebanon</option>
                    <option value="Lesotho">Lesotho</option>
                    <option value="Liberia">Liberia</option>
                    <option value="Libya">Libya</option>
                    <option value="Liechtenstein">Liechtenstein</option>
                    <option value="Lithuania">Lithuania</option>
                    <option value="Luxembourg">Luxembourg</option>
                    <option value="Macau">Macau</option>
                    <option value="Macedonia">Macedonia</option>
                    <option value="Madagascar">Madagascar</option>
                    <option value="Malaysia">Malaysia</option>
                    <option value="Malawi">Malawi</option>
                    <option value="Maldives">Maldives</option>
                    <option value="Mali">Mali</option>
                    <option value="Malta">Malta</option>
                    <option value="Marshall Islands">Marshall Islands</option>
                    <option value="Martinique">Martinique</option>
                    <option value="Mauritania">Mauritania</option>
                    <option value="Mauritius">Mauritius</option>
                    <option value="Mayotte">Mayotte</option>
                    <option value="Mexico">Mexico</option>
                    <option value="Midway Islands">Midway Islands</option>
                    <option value="Moldova">Moldova</option>
                    <option value="Monaco">Monaco</option>
                    <option value="Mongolia">Mongolia</option>
                    <option value="Montserrat">Montserrat</option>
                    <option value="Morocco">Morocco</option>
                    <option value="Mozambique">Mozambique</option>
                    <option value="Myanmar">Myanmar</option>
                    <option value="Nambia">Nambia</option>
                    <option value="Nauru">Nauru</option>
                    <option value="Nepal">Nepal</option>
                    <option value="Netherland Antilles">Netherland Antilles</option>
                    <option value="Netherlands">Netherlands (Holland, Europe)</option>
                    <option value="Nevis">Nevis</option>
                    <option value="New Caledonia">New Caledonia</option>
                    <option value="New Zealand">New Zealand</option>
                    <option value="Nicaragua">Nicaragua</option>
                    <option value="Niger">Niger</option>
                    <option value="Nigeria">Nigeria</option>
                    <option value="Niue">Niue</option>
                    <option value="Norfolk Island">Norfolk Island</option>
                    <option value="Norway">Norway</option>
                    <option value="Oman">Oman</option>
                    <option value="Pakistan">Pakistan</option>
                    <option value="Palau Island">Palau Island</option>
                    <option value="Palestine">Palestine</option>
                    <option value="Panama">Panama</option>
                    <option value="Papua New Guinea">Papua New Guinea</option>
                    <option value="Paraguay">Paraguay</option>
                    <option value="Peru">Peru</option>
                    <option value="Phillipines">Philippines</option>
                    <option value="Pitcairn Island">Pitcairn Island</option>

                    <option value="Poland">Poland</option>
                    <option value="Portugal">Portugal</option>
                    <option value="Puerto Rico">Puerto Rico</option>
                    <option value="Qatar">Qatar</option>
                    <option value="Republic of Montenegro">Republic of Montenegro</option>
                    <option value="Republic of Serbia">Republic of Serbia</option>
                    <option value="Reunion">Reunion</option>
                    <option value="Romania">Romania</option>
                    <option value="Russia">Russia</option>
                    <option value="Rwanda">Rwanda</option>
                    <option value="St Barthelemy">St Barthelemy</option>
                    <option value="St Eustatius">St Eustatius</option>
                    <option value="St Helena">St Helena</option>
                    <option value="St Kitts-Nevis">St Kitts-Nevis</option>
                    <option value="St Lucia">St Lucia</option>
                    <option value="St Maarten">St Maarten</option>
                    <option value="St Pierre &amp; Miquelon">St Pierre &amp; Miquelon</option>
                    <option value="St Vincent &amp; Grenadines">St Vincent &amp; Grenadines</option>
                    <option value="Saipan">Saipan</option>
                    <option value="Samoa">Samoa</option>
                    <option value="Samoa American">Samoa American</option>
                    <option value="San Marino">San Marino</option>
                    <option value="Sao Tome &amp; Principe">Sao Tome &amp; Principe</option>
                    <option value="Saudi Arabia">Saudi Arabia</option>
                    <option value="Senegal">Senegal</option>
                    <option value="Seychelles">Seychelles</option>
                    <option value="Sierra Leone">Sierra Leone</option>
                    <option value="Singapore">Singapore</option>
                    <option value="Slovakia">Slovakia</option>
                    <option value="Slovenia">Slovenia</option>
                    <option value="Solomon Islands">Solomon Islands</option>
                    <option value="Somalia">Somalia</option>
                    <option value="South Africa">South Africa</option>
                    <option value="Spain">Spain</option>
                    <option value="Sri Lanka">Sri Lanka</option>
                    <option value="Sudan">Sudan</option>
                    <option value="Suriname">Suriname</option>
                    <option value="Swaziland">Swaziland</option>
                    <option value="Sweden">Sweden</option>
                    <option value="Switzerland">Switzerland</option>
                    <option value="Syria">Syria</option>
                    <option value="Tahiti">Tahiti</option>
                    <option value="Taiwan">Taiwan</option>
                    <option value="Tajikistan">Tajikistan</option>
                    <option value="Tanzania">Tanzania</option>
                    <option value="Thailand">Thailand</option>
                    <option value="Togo">Togo</option>
                    <option value="Tokelau">Tokelau</option>
                    <option value="Tonga">Tonga</option>
                    <option value="Trinidad &amp; Tobago">Trinidad &amp; Tobago</option>
                    <option value="Tunisia">Tunisia</option>
                    <option value="Turkey">Turkey</option>
                    <option value="Turkmenistan">Turkmenistan</option>
                    <option value="Turks &amp; Caicos Is">Turks &amp; Caicos Is</option>
                    <option value="Tuvalu">Tuvalu</option>
                    <option value="Uganda">Uganda</option>
                    <option value="Ukraine">Ukraine</option>
                    <option value="United Arab Erimates">United Arab Emirates</option>
                    <option value="United Kingdom">United Kingdom</option>
                    <option  value="United States of America">United States of America</option>
                    <option value="Uraguay">Uruguay</option>
                    <option value="Uzbekistan">Uzbekistan</option>
                    <option value="Vanuatu">Vanuatu</option>
                    <option value="Vatican City State">Vatican City State</option>
                    <option value="Venezuela">Venezuela</option>
                    <option value="Vietnam">Vietnam</option>
                    <option value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>
                    <option value="Virgin Islands (USA)">Virgin Islands (USA)</option>
                    <option value="Wake Island">Wake Island</option>
                    <option value="Wallis &amp; Futana Is">Wallis &amp; Futana Is</option>
                    <option value="Yemen">Yemen</option>
                    <option value="Zaire">Zaire</option>
                    <option value="Zambia">Zambia</option>
                    <option value="Zimbabwe">Zimbabwe</option>
                            </select>
							<script type="text/javascript">
			for(var i=0;i<document.getElementById('b_country').length;i++)
			{
				if(document.getElementById('b_country').options[i].value=="<?php echo $userindiv_bill_details->b_country; ?>")
				{
					document.getElementById('b_country').options[i].selected=true
				}
			}			
			</script>
							</td>
  </tr>
  <tr>
    <td height="28" align="left" valign="middle">State : <br /><input type="text" id="b_state" name="b_state"  class="text_large required" style="width:240px;" value="<?php echo $userindiv_bill_details->b_state; ?>"></td>
  </tr>
  <tr>
    <td height="28" align="left" valign="middle">Address : <br /><textarea name="b_address" id="b_address" class="text_medium required" style="width:240px; height:80px;"><?php echo stripslashes($userindiv_bill_details->b_address); ?></textarea></td>
  </tr>
  <tr>
    <td height="28" align="left" valign="middle">City : <br /><input type="text" name="b_city" id="b_city"  class="text_large required" style="width:240px;" value="<?php echo $userindiv_bill_details->b_city; ?>"></td>
  </tr>
  <tr>
    <td height="28" align="left" valign="middle">Zip Code : <br /><input type="text" name="b_zipcode" id="b_zipcode" class="text_large required" style="width:240px;" value="<?php echo $userindiv_bill_details->b_zipcode; ?>"></td>
  </tr>
  <tr>
    <td height="28" align="left" valign="middle">Fax : <br /><input type="text" name="b_fax"  id="b_fax" class="text_large required" style="width:240px;" value="<?php echo $userindiv_bill_details->b_fax; ?>"></td>
  </tr>    
  <tr>
    <td height="28" align="left" valign="middle">Phone Number :<br /> <input type="text" name="b_phoneno" id="b_phoneno" class="text_large required" style="width:240px;" value="<?php echo $userindiv_bill_details->b_phoneno; ?>"></td>
  </tr>
  
</table></td>
    <td align="left" valign="top"><table width="95%" border="0" align="left" cellpadding="0" cellspacing="0">
  <tr>
    <td width="55%" height="28" align="left" valign="middle">First Name :<br />
      <input type="text" name="s_firstname" id="s_firstname" class="text_large required" style="width:240px;" value="<?php echo $userindiv_bill_details->s_firstname; ?>" /></td>
  </tr>
  <tr>
    <td height="28" align="left" valign="middle">Last Name :<br />
      <input type="text" name="s_lastname" id="s_lastname" class="text_large required" style="width:240px;" value="<?php echo $userindiv_bill_details->s_lastname; ?>" /></td> 
  </tr>
  <tr>
    <td height="28" align="left" valign="middle">Country :<br />
      <?php /*?><select id="s_country"  name="s_country" class="select_large required" style="width:250px;">
        <option value="">Select Country</option>
        <option value="Afganistan">Afghanistan</option>
        <option value="Albania">Albania</option>
        <option value="Algeria">Algeria</option>
        <option value="American Samoa">American Samoa</option>
        <option value="Andorra">Andorra</option>
        <option value="Angola">Angola</option>
        <option value="Anguilla">Anguilla</option>
        <option value="Antigua &amp; Barbuda">Antigua &amp; Barbuda</option>
        <option value="Argentina">Argentina</option>
        <option value="Armenia">Armenia</option>
        <option value="Aruba">Aruba</option>
        <option value="Australia">Australia</option>
        <option value="Austria">Austria</option>
        <option value="Azerbaijan">Azerbaijan</option>
        <option value="Bahamas">Bahamas</option>
        <option value="Bahrain">Bahrain</option>
        <option value="Bangladesh">Bangladesh</option>
        <option value="Barbados">Barbados</option>
        <option value="Belarus">Belarus</option>
        <option value="Belgium">Belgium</option>
        <option value="Belize">Belize</option>
        <option value="Benin">Benin</option>
        <option value="Bermuda">Bermuda</option>
        <option value="Bhutan">Bhutan</option>
        <option value="Bolivia">Bolivia</option>
        <option value="Bonaire">Bonaire</option>
        <option value="Bosnia &amp; Herzegovina">Bosnia &amp; Herzegovina</option>
        <option value="Botswana">Botswana</option>
        <option value="Brazil">Brazil</option>
        <option value="British Indian Ocean Ter">British Indian Ocean Ter</option>
        <option value="Brunei">Brunei</option>
        <option value="Bulgaria">Bulgaria</option>
        <option value="Burkina Faso">Burkina Faso</option>
        <option value="Burundi">Burundi</option>
        <option value="Cambodia">Cambodia</option>
        <option value="Cameroon">Cameroon</option>
        <option value="Canada">Canada</option>
        <option value="Canary Islands">Canary Islands</option>
        <option value="Cape Verde">Cape Verde</option>
        <option value="Cayman Islands">Cayman Islands</option>
        <option value="Central African Republic">Central African Republic</option>
        <option value="Chad">Chad</option>
        <option value="Channel Islands">Channel Islands</option>
        <option value="Chile">Chile</option>
        <option value="China">China</option>
        <option value="Christmas Island">Christmas Island</option>
        <option value="Cocos Island">Cocos Island</option>
        <option value="Colombia">Colombia</option>
        <option value="Comoros">Comoros</option>
        <option value="Congo">Congo</option>
        <option value="Cook Islands">Cook Islands</option>
        <option value="Costa Rica">Costa Rica</option>
        <option value="Cote DIvoire">Cote D'Ivoire</option>
        <option value="Croatia">Croatia</option>
        <option value="Cuba">Cuba</option>
        <option value="Curaco">Curacao</option>
        <option value="Cyprus">Cyprus</option>
        <option value="Czech Republic">Czech Republic</option>
        <option value="Denmark">Denmark</option>
        <option value="Djibouti">Djibouti</option>
        <option value="Dominica">Dominica</option>
        <option value="Dominican Republic">Dominican Republic</option>
        <option value="East Timor">East Timor</option>
        <option value="Ecuador">Ecuador</option>
        <option value="Egypt">Egypt</option>
        <option value="El Salvador">El Salvador</option>
        <option value="Equatorial Guinea">Equatorial Guinea</option>
        <option value="Eritrea">Eritrea</option>
        <option value="Estonia">Estonia</option>
        <option value="Ethiopia">Ethiopia</option>
        <option value="Falkland Islands">Falkland Islands</option>
        <option value="Faroe Islands">Faroe Islands</option>
        <option value="Fiji">Fiji</option>
        <option value="Finland">Finland</option>
        <option value="France">France</option>
        <option value="French Guiana">French Guiana</option>
        <option value="French Polynesia">French Polynesia</option>
        <option value="French Southern Ter">French Southern Ter</option>
        <option value="Gabon">Gabon</option>
        <option value="Gambia">Gambia</option>
        <option value="Georgia">Georgia</option>
        <option value="Germany">Germany</option>
        <option value="Ghana">Ghana</option>
        <option value="Gibraltar">Gibraltar</option>
        <option value="Great Britain">Great Britain</option>
        <option value="Greece">Greece</option>
        <option value="Greenland">Greenland</option>
        <option value="Grenada">Grenada</option>
        <option value="Guadeloupe">Guadeloupe</option>
        <option value="Guam">Guam</option>
        <option value="Guatemala">Guatemala</option>
        <option value="Guinea">Guinea</option>
        <option value="Guyana">Guyana</option>
        <option value="Haiti">Haiti</option>
        <option value="Hawaii">Hawaii</option>
        <option value="Honduras">Honduras</option>
        <option value="Hong Kong">Hong Kong</option>
        <option value="Hungary">Hungary</option>
        <option value="Iceland">Iceland</option>
        <option value="India">India</option>
        <option value="Indonesia">Indonesia</option>
        <option value="Iran">Iran</option>
        <option value="Iraq">Iraq</option>
        <option value="Ireland">Ireland</option>
        <option value="Isle of Man">Isle of Man</option>
        <option value="Israel">Israel</option>
        <option value="Italy">Italy</option>
        <option value="Jamaica">Jamaica</option>
        <option value="Japan">Japan</option>
        <option value="Jordan">Jordan</option>
        <option value="Kazakhstan">Kazakhstan</option>
        <option value="Kenya">Kenya</option>
        <option value="Kiribati">Kiribati</option>
        <option value="Korea North">Korea North</option>
        <option value="Korea Sout">Korea South</option>
        <option value="Kuwait">Kuwait</option>
        <option value="Kyrgyzstan">Kyrgyzstan</option>
        <option value="Laos">Laos</option>
        <option value="Latvia">Latvia</option>
        <option value="Lebanon">Lebanon</option>
        <option value="Lesotho">Lesotho</option>
        <option value="Liberia">Liberia</option>
        <option value="Libya">Libya</option>
        <option value="Liechtenstein">Liechtenstein</option>
        <option value="Lithuania">Lithuania</option>
        <option value="Luxembourg">Luxembourg</option>
        <option value="Macau">Macau</option>
        <option value="Macedonia">Macedonia</option>
        <option value="Madagascar">Madagascar</option>
        <option value="Malaysia">Malaysia</option>
        <option value="Malawi">Malawi</option>
        <option value="Maldives">Maldives</option>
        <option value="Mali">Mali</option>
        <option value="Malta">Malta</option>
        <option value="Marshall Islands">Marshall Islands</option>
        <option value="Martinique">Martinique</option>
        <option value="Mauritania">Mauritania</option>
        <option value="Mauritius">Mauritius</option>
        <option value="Mayotte">Mayotte</option>
        <option value="Mexico">Mexico</option>
        <option value="Midway Islands">Midway Islands</option>
        <option value="Moldova">Moldova</option>
        <option value="Monaco">Monaco</option>
        <option value="Mongolia">Mongolia</option>
        <option value="Montserrat">Montserrat</option>
        <option value="Morocco">Morocco</option>
        <option value="Mozambique">Mozambique</option>
        <option value="Myanmar">Myanmar</option>
        <option value="Nambia">Nambia</option>
        <option value="Nauru">Nauru</option>
        <option value="Nepal">Nepal</option>
        <option value="Netherland Antilles">Netherland Antilles</option>
        <option value="Netherlands">Netherlands (Holland, Europe)</option>
        <option value="Nevis">Nevis</option>
        <option value="New Caledonia">New Caledonia</option>
        <option value="New Zealand">New Zealand</option>
        <option value="Nicaragua">Nicaragua</option>
        <option value="Niger">Niger</option>
        <option value="Nigeria">Nigeria</option>
        <option value="Niue">Niue</option>
        <option value="Norfolk Island">Norfolk Island</option>
        <option value="Norway">Norway</option>
        <option value="Oman">Oman</option>
        <option value="Pakistan">Pakistan</option>
        <option value="Palau Island">Palau Island</option>
        <option value="Palestine">Palestine</option>
        <option value="Panama">Panama</option>
        <option value="Papua New Guinea">Papua New Guinea</option>
        <option value="Paraguay">Paraguay</option>
        <option value="Peru">Peru</option>
        <option value="Phillipines">Philippines</option>
        <option value="Pitcairn Island">Pitcairn Island</option>
        <option value="Poland">Poland</option>
        <option value="Portugal">Portugal</option>
        <option value="Puerto Rico">Puerto Rico</option>
        <option value="Qatar">Qatar</option>
        <option value="Republic of Montenegro">Republic of Montenegro</option>
        <option value="Republic of Serbia">Republic of Serbia</option>
        <option value="Reunion">Reunion</option>
        <option value="Romania">Romania</option>
        <option value="Russia">Russia</option>
        <option value="Rwanda">Rwanda</option>
        <option value="St Barthelemy">St Barthelemy</option>
        <option value="St Eustatius">St Eustatius</option>
        <option value="St Helena">St Helena</option>
        <option value="St Kitts-Nevis">St Kitts-Nevis</option>
        <option value="St Lucia">St Lucia</option>
        <option value="St Maarten">St Maarten</option>
        <option value="St Pierre &amp; Miquelon">St Pierre &amp; Miquelon</option>
        <option value="St Vincent &amp; Grenadines">St Vincent &amp; Grenadines</option>
        <option value="Saipan">Saipan</option>
        <option value="Samoa">Samoa</option>
        <option value="Samoa American">Samoa American</option>
        <option value="San Marino">San Marino</option>
        <option value="Sao Tome &amp; Principe">Sao Tome &amp; Principe</option>
        <option value="Saudi Arabia">Saudi Arabia</option>
        <option value="Senegal">Senegal</option>
        <option value="Seychelles">Seychelles</option>
        <option value="Sierra Leone">Sierra Leone</option>
        <option value="Singapore">Singapore</option>
        <option value="Slovakia">Slovakia</option>
        <option value="Slovenia">Slovenia</option>
        <option value="Solomon Islands">Solomon Islands</option>
        <option value="Somalia">Somalia</option>
        <option value="South Africa">South Africa</option>
        <option value="Spain">Spain</option>
        <option value="Sri Lanka">Sri Lanka</option>
        <option value="Sudan">Sudan</option>
        <option value="Suriname">Suriname</option>
        <option value="Swaziland">Swaziland</option>
        <option value="Sweden">Sweden</option>
        <option value="Switzerland">Switzerland</option>
        <option value="Syria">Syria</option>
        <option value="Tahiti">Tahiti</option>
        <option value="Taiwan">Taiwan</option>
        <option value="Tajikistan">Tajikistan</option>
        <option value="Tanzania">Tanzania</option>
        <option value="Thailand">Thailand</option>
        <option value="Togo">Togo</option>
        <option value="Tokelau">Tokelau</option>
        <option value="Tonga">Tonga</option>
        <option value="Trinidad &amp; Tobago">Trinidad &amp; Tobago</option>
        <option value="Tunisia">Tunisia</option>
        <option value="Turkey">Turkey</option>
        <option value="Turkmenistan">Turkmenistan</option>
        <option value="Turks &amp; Caicos Is">Turks &amp; Caicos Is</option>
        <option value="Tuvalu">Tuvalu</option>
        <option value="Uganda">Uganda</option>
        <option value="Ukraine">Ukraine</option>
        <option value="United Arab Erimates">United Arab Emirates</option>
        <option value="United Kingdom">United Kingdom</option>
        <option  value="United States of America">United States of America</option>
        <option value="Uraguay">Uruguay</option>
        <option value="Uzbekistan">Uzbekistan</option>
        <option value="Vanuatu">Vanuatu</option>
        <option value="Vatican City State">Vatican City State</option>
        <option value="Venezuela">Venezuela</option>
        <option value="Vietnam">Vietnam</option>
        <option value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>
        <option value="Virgin Islands (USA)">Virgin Islands (USA)</option>
        <option value="Wake Island">Wake Island</option>
        <option value="Wallis &amp; Futana Is">Wallis &amp; Futana Is</option>
        <option value="Yemen">Yemen</option>
        <option value="Zaire">Zaire</option>
        <option value="Zambia">Zambia</option>
        <option value="Zimbabwe">Zimbabwe</option>
      </select><?php */?>
	  
	  
<select id="s_country"  name="s_country" class="select_large required" style="width:250px;">
<option  value="United States of America">United States of America</option>
</select>

	  
	  <script type="text/javascript">
			for(var i=0;i<document.getElementById('s_country').length;i++)
			{
				if(document.getElementById('s_country').options[i].value=="<?php echo $userindiv_bill_details->s_country; ?>")
				{
					document.getElementById('s_country').options[i].selected=true
				}
			}			
			</script>
	  </td>
  </tr>
  <tr>
    <td height="28" align="left" valign="middle">State : <br />
      <input type="text" name="s_state" id="s_state"  class="text_large required" style="width:240px;" value="<?php echo $userindiv_bill_details->s_state; ?>" /></td>
  </tr>
  <tr>
    <td height="28" align="left" valign="middle">Address : <br />
      <textarea name="s_address" id="s_address" class="text_medium required" style="width:240px; height:80px;"><?php echo stripslashes($userindiv_bill_details->s_address); ?></textarea></td>
  </tr>
  <tr>
    <td height="28" align="left" valign="middle">City : <br />
      <input type="text" name="s_city" id="s_city"  class="text_large required" style="width:240px;" value="<?php echo $userindiv_bill_details->s_city; ?>" /></td>
  </tr>
  <tr>
    <td height="28" align="left" valign="middle">Zip Code : <br />
      <input type="text" name="s_zipcode" id="s_zipcode" class="text_large required" style="width:240px;" value="<?php echo $userindiv_bill_details->s_zipcode; ?>" /></td>
  </tr>
  <tr>
    <td height="28" align="left" valign="middle">Fax : <br />
      <input type="text" name="s_fax" id="s_fax"  class="text_large required" style="width:240px;" value="<?php echo $userindiv_bill_details->s_fax; ?>" /></td>
  </tr>    
  <tr>
    <td height="28" align="left" valign="middle">Phone Number :<br />
      <input type="text" name="s_phoneno" id="s_phoneno" class="text_large required" style="width:240px;" value="<?php echo $userindiv_bill_details->s_phoneno; ?>" /></td>
  </tr>
  
</table></td>
  </tr>
</table></td>
                                      </tr>
									  <?php } ?>
  <tr>
<td align="left" valign="middle" colspan="2" height="10"></td>
</tr>                                    
<tr>
<td height="28" align="left" valign="middle"></td>
<td height="28" align="left" valign="middle"><!--<input type="hidden" name="act" value="confirm">--><input type="hidden" name="action" value="Registerhere"><input type="image" src="images/submit_51.png" value="Register"></td>
</tr>
  </table>
									</form>
									
									</td>
                                  </tr>
                                </table>
</td>
                  </tr>
                </table></td>
                <td width="2" align="left" valign="top"><img src="images/line_35.gif" width="2" height="902" /></td>
                <td align="left" valign="top" style="padding-top:15px; padding-left:10px; padding-right:10px"><?php include("includes/homerightnav.php");?></td>
              </tr>
            </table></td>
          </tr>
        </table></td>
        <td width="28" align="left" valign="top"><img src="images/sides_31.png" width="28" height="698" /></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td height="224" align="center" valign="top" style="background-image:url(images/grey-bg_141.jpg); background-repeat:repeat-x"><?php include("includes/footer.php");?></td>
  </tr>
</table>
</body>
</html>