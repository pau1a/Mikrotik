<?php
   $location=$_POST['location'];
   $mac=$_POST['mac'];
   $ip=$_POST['ip'];
   $linklogin=$_POST['linklogin'];
   $linkorig=$_POST['linkorig'];
   $error=$_POST['error'];
   $chapid=$_POST['chapid'];
   $chapchallenge=$_POST['chapchallenge'];
   $linkloginonly=$_POST['linkloginonly'];
   $linkorigesc=$_POST['linkorigesc'];
if (isset($_POST['postcode'])) {
    $postcode = $_POST['postcode'];
}
if (isset($_POST['email'])) {
    $email = $_POST['email'];
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
   "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<title>mikrotik hotspot > login</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta http-equiv="pragma" content="no-cache" />
<meta http-equiv="expires" content="-1" />
<style type="text/css">
body {color: #737373; font-size: 10px; font-family: verdana;}

textarea,input,select {
background-color: #FDFBFB;
border: 1px solid #BBBBBB;
padding: 2px;
margin: 1px;
font-size: 14px;
color: #808080;
}

a, a:link, a:visited, a:active { color: #AAAAAA; text-decoration: none; font-size: 10px; }
a:hover { border-bottom: 1px dotted #c1c1c1; color: #AAAAAA; }
img {border: none;}
td { font-size: 14px; color: #7A7A7A; }
</style>

<script src="jquery-3.2.1.min.js"></script>

<script>

$(document).ready(function() {
        $('button').click(function(e){
                e.preventDefault();
                var jsLinkLoginOnly = <?php echo(json_encode($linkloginonly)) ?>;
                var jsDst = "http://cowdenbeath.landings.rustyice.co.uk";
                var jsMac = <?php echo(json_encode($mac)) ?>;
                var jsIp = <?php echo(json_encode($ip)) ?>;
                var jsPostcode = $("[name=pcode]").val();
                var jsEmail = $("[name=email]").val();
                var jsFormData = {postcode:jsPostcode,email:jsEmail,mac:jsMac,ip:jsIp,dst:jsDst};
                        $.ajax(
                        {
                        type: "POST",
                        url: "database.php",
                        data : jsFormData,
                        success: function(response)     {
					alert(jsMac);
                                        var jsFormValidated = $('#login').serialize();
                                        alert(jsIp);
                                        return doLogin();
                                        alert(jsEmail);
                                            $.ajax({
                                                type: "POST",
                                                url: jsLinkLoginOnly,
                                                data: jsFormValidated
                                            });
                                            return true;
                                        }
                        });
                });
        });

</script>






</head>

<body>
<!-- $(if chap-id) -->

	<form name="sendin" action="<?php echo $linkloginonly; ?>" method="post">
		<input type="hidden" name="username" />
		<input type="hidden" name="password" />
		<input type="hidden" name="dst" value="http://cowdenbeath.landings.rustyice.co.uk" />
		<input type="hidden" name="popup" value="true" />
	</form>
	
	<script type="text/javascript" src="./md5.js"></script>
	<script type="text/javascript">
	<!--
	    function doLogin() {
                <?php if(strlen($chapid) < 1) echo "return true;\n"; ?>
		document.sendin.username.value = document.login.username.value;
		document.sendin.password.value = hexMD5('<?php echo $chapid; ?>' + document.login.password.value + '<?php echo $chapchallenge; ?>');
		document.sendin.submit();
		return false;
	    }
	//-->
	</script>
<!-- $(endif) -->

<table width="100%" style="margin-top: 10%;">
	<tr>
	<td align="center" valign="middle">
		<div class="notice" style="color: #c1c1c1; font-size: 9px">Please enter some details to use the Denny Free WIFI service<br />

</div><br />
	<table width="240" height="240" style="border: 1px solid #cccccc; padding: 0px;" cellpadding="0" cellspacing="0">
	<tr>
	<td align="center" valign="bottom" height="175" colspan="2">
<!-- removed $(if chap-id) $(endif)  around OnSubmit -->
		<form name="login" method="post" >
			<input type="hidden" name="dst" value="http://cowdenbeath.landings.rustyice.co.uk" />
			<input type="hidden" name="popup" value="true" />
                        <input type="hidden" name="username" value="myUsername" />
                        <input type="hidden" name="password" value="myPassword" />
			<table width="100" style="background-color: #ffffff">

                                <tr><td align="right">Postcode SECOND FORM</td>
                                <td><input style="width: 80px" name="pcode" type="text" /></td>
                                </tr>
                                <tr><td align="right">Email SECOND FORM</td>
                                <td><input style="width: 80px" name="email" type="text" /></td>
                                </tr>
                                <td><button>OK</button></td>
				</tr>
			</table>
		</form>
	</td>
	</tr>
	</table>
	
<!-- $(if error) -->
<br /><div style="color: #FF8080; font-size: 9px"><?php echo $error; ?></div>
<!-- $(endif) -->

	</td>
	</tr>
</table>

<script type="text/javascript">
<!--
  document.login.username.focus();
//-->
</script>
</body>
</html>
