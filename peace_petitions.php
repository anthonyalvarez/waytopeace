<?php 
$submitted = 0;
$errmsg = "";
if ($_REQUEST['action'] == "add") {
       $fname = trim($_REQUEST['fname']);
       $lname = trim($_REQUEST['lname']);
       $address_1 = trim($_REQUEST['address_1']);
       $address_2 = trim($_REQUEST['address_2']);
       $phone = trim($_REQUEST['phone']);
       $city = trim($_REQUEST['city']);
       $state = trim($_REQUEST['state']);
       $country = trim($_REQUEST['country']);
       $zip = trim($_REQUEST['zip']);
       $email = strtolower(trim($_REQUEST['email'])); //lower case email address - case insensitive
	
	//required field check
	if ($email == "") $errmsg .= "Please enter your e-mail address.\\n";
	if(! preg_match("/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/", $email)) {
		$errmsg .= "Please enter a vaild e-mail address.\\n";
	}
	if ($errmsg == "") {
		require_once '../php_inc/db.php';
		$dblink = mysql_connect($dbhost, $dbuser, $dbpass);
		mysql_select_db($dbname, $dblink);
		//insert subscription
		$sql = sprintf("INSERT INTO peace_petitions (" .
	            "first_name, " .
                            "last_name, " .
                            "address_1, " .
                            "address_2, " .
                            "phone, " .
                            "email, " .
                            "city, " .
                            "state, " .
                            "country, " .
                            "zip, " .
				"sign_date " .
				") VALUES (" .
				"'%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', now())",
                             mysql_real_escape_string($fname),
                             mysql_real_escape_string($lname),
                             mysql_real_escape_string($address_1),
                             mysql_real_escape_string($address_2),
                             mysql_real_escape_string($phone),
                             mysql_real_escape_string($email),
                             mysql_real_escape_string($city),
                             mysql_real_escape_string($state),
                             mysql_real_escape_string($country),
                             mysql_real_escape_string($zip)
                         );
		mysql_query($sql);
		$submitted = 1;
		mysql_close($dblink);
	}
}
?>

<html>
<head>
<title>Way To Peace</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<meta http-equiv="keywords" content="Way To Peace">
<link href="css/styles.css" rel="stylesheet" type="text/css">
<script language="Javascript">
function validate(f) {
	if (f) {
		var emailfilter  = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
		if (emailfilter.test(f.email.value)) return true;
	}
	alert("Please enter a valid e-mail address");
	return false;
}
</script>
</head>

<body link="#666666" alink="#660000" vlink="#333333">
<table width="720" border="0" cellspacing="0" align="center" cellpadding="0" bgcolor="#FFFFFF">
  <tr valign="top" bgcolor="#FFFFFF"> 
    <td>&nbsp;</td>
    <td colspan="4" align="center" height="115"> 
      <table width="720" border="0" cellspacing="0" cellpadding="0" height="115">
		<tr> 
			<td align="left" width="620" height="74"><center />
		        
		        <img src="images/worldpeacesociety_logo.jpg" alt="World Peace Society" border="0">
<br>
		       <font size="5"><i> Way To Peace</i></font>
			</center></td>
		</tr> 
      </table>
    </td>
  </tr>
  <tr> 
    <td width="150" valign="top">
	<table border="0" cellpadding="0" cellspacing="0" align="center">
	<tr>
	    <td width="300"><img src="images/blank.gif" width="1" height="85" border="0"></td>
	</tr>
	<?php 
		include("leftmenu.html");
	?>
	</table>
	</td>
    <td width="30"><img src="images/blank.gif" width="10" border="0"></td>
	<td width="10"><img src="images/blank.gif" width="10" border="0"></td>
    <td valign="top" width="510" align="left"> 
<?php if ($submitted) { ?> 	
      <p><br>
<font size="3">	 <b>Thank You for signing this petition for peace.</b>
<br>
World Peace Society will collect these signatures and present them to leaders and representatives to show that people everywhere want peace.
<br>
<br>
While you're on this page you can <a href="poems/independenceandpeace.php"><font size="3">click here</font></a> and send the poem<a href="poems/whysignpetition.php"><font size="3"> "Why You Should Sign This Petition for Peace"</font></a> to another friend or contact.
</font>      <br>
      <br>
	  <br>
	  <br>
      <img src="images/worldpeacesociety_logo.jpg"  width="50" alt="World Peace Society"  border="0">
      <img src="images/worldpeacesociety_logo.jpg"  width="50" alt="World Peace Society"  border="0">
      <img src="images/worldpeacesociety_logo.jpg"  width="50" alt="World Peace Society"  border="0">
      <br>
      <br>
      <br>
<?php } else { ?>
	<br>
<font size="3"><font color="000000">
<b>PETITION FOR PEACE </b>
<br>
<font size="2">&nbsp;&nbsp;&nbsp;&nbsp;by
<br>
David Levene</font>
<br>
<br>
We want peace! 
<br>
Not only in the Middle East, but everywhere 
<br>
Throughout the whole world, peace should prevail 
<br>
While tyranny and oppression lead to no avail. 
<br>
<br>
A better world can thrive and exist, 
<br>
World Peace Society’s efforts to make it so must persist 
<br>
And you can help bring such a situation about 
<br>
By signing this petition you show your clout. 
<br>
<br>
A specific plan for peace must be utilized 
<br>
One that the world has not yet realized 
<br>
“World Peace Now and Forever” may do 
<br>
But alternatives should be examined thru and thru. 
<br>
<br>
Let our leaders and representatives know for sure 
<br>
That anything less they show - will not endure 
<br>
Yes, all our efforts must persist 
<br>
Until a more just and better world does exist. 
 </font>
<br>
<br>
<font size="1">
&copy; 2006 Growth Network. All rights reserved.</font>
<br>
<br>
<br>
<br>
<font size="3"><b>to sign this petition fill out the form below </b></font>
<br>
<font size="1">
<font color="990033"> <b>*</b> Required</font>
</font>




<br>
<br>
		<form name="joinform" action="peace_petitions.php" method="post" onSubmit="return validate(this);">
		<input type="hidden" name="action" value="add"> 
         <tr>
          <td></td>
          <td align="right" valign="top"><font color="990033"> <b>*</b></font>First Name:</td>
          <td></td>
          <td><input type="text" name="fname" size="20"></td>
        </tr>
         <tr>
          <td></td>
          <td align="right" valign="top"> <font color="990033"> <b>*</b></font>Last Name:</td>
          <td></td>
          <td><input type="text" name="lname" size="20"></td>
        </tr>
         <tr>
          <td></td>
          <td align="right" valign="top">Telephone:</td>
          <td></td>
          <td><input type="text" name="phone" size="20"></td>
        </tr>
         <tr>
          <td></td>
          <td align="right" valign="top"><font color="990033"> <b>*</b></font>E-mail:</td>
          <td></td>
          <td><input type="text" name="email" size="20" value=""></td>
        </tr>
        <tr>
          <td></td>
          <td align="right" valign="top"><font color="990033"> <b>*</b></font>Address:</td>
          <td></td>
          <td><input type="text" name="address_1" size="20"></td>
        </tr>
        <tr>
          <td></td>
          <td align="right" valign="top"></td>
          <td></td>
          <td><input type="text" name="address_2" size="20"></td>
        </tr>
        <tr>
          <td></td>
          <td align="right" valign="top"><font color="990033"> <b>*</b></font>City:</td>
          <td></td>
          <td><input type="text" name="city" size="20"></td>
        </tr>
        <tr>
          <td></td>
          <td align="right" valign="top"><font color="990033"> <b>*</b></font>State:</td>
          <td></td>
          <td><input type="text" name="state" size="20"></td>
        </tr>
        <tr>
          <td></td>
          <td align="right" valign="top"><font color="990033"> <b>*</b></font>Country:</td>
          <td></td>
          <td><input type="text" name="country" size="20"></td>
        </tr>
        <tr>
          <td></td>
          <td align="right" valign="top"><font color="990033"> <b>*</b></font>Zip: </td>
          <td></td>
          <td><input type="text" name="zip" size="20"></td>
        </tr>
        <tr>
          <td></td>
          <td align="right" valign="top">&nbsp;<br><br></td>
          <td></td>
          <td><input type="submit" name="submit" value="Submit"></td>
        </tr>
                                 </form>

</center>
<br>
 </font>

<?php } ?>
   </td>
  </tr>
</table>
<br>

<span class="footer">


&copy;1988-2006 World Peace Society and Growth Network. All rights reserved.</span>
</p>
<?php 
	//alert error message if any
	if ($errmsg != "") {
?>
<script language="Javascript">
<!--
	alert("<?= $errmsg ?>");
//-->
</script>
<?php	} ?>
</body>
</html>