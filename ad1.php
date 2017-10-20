<?php

   $location=$_POST['location'];
   $mac=$_POST['mac'];
   $ip=$_POST['ip'];
   $linklogin=$_POST['link-login'];
   $linkorig=$_POST['link-orig'];
   $error=$_POST['error'];
   $chapid=$_POST['chap-id'];
   $chapchallenge=$_POST['chap-challenge'];
   $linkloginonly=$_POST['link-login-only'];
   $linkorigesc=$_POST['link-orig-esc'];


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
		var jsLocation = <?php echo(json_encode($location)) ?>;
                var jsLinkLoginOnly = <?php echo(json_encode($linkloginonly)) ?>;
                var jsDst = <?php echo(json_encode($linkorig)) ?>;
                var jsMac = <?php echo(json_encode($mac)) ?>;
                var jsIp = <?php echo(json_encode($ip)) ?>;
                var jsPostcode = $("[name=pcode]").val();
                var jsEmail = $("[name=email]").val();
                var jsFormData = {postcode:jsPostcode,email:jsEmail,mac:jsMac,ip:jsIp,dst:jsDst,location:jsLocation};
                        $.ajax(
                        {
                        type: "POST",
                        url: "database.php",
                        data : jsFormData,
                        success: function(response) {
					  $("#formyform").submit();
					    }
                        });
                });
        });

</script>
</head>

<body>

<form name="login" id="formyform" method="post" action="ad2.php" >
<table width="100%" style="margin-top: 10%;">
	<tr>
	<td align="center" valign="middle">
		<div class="notice" style="color: #c1c1c1; font-size: 9px">Please enter some details to use the Denny Free WIFI service<br />

</div><br />
	<table width="240" height="240" style="border: 1px solid #cccccc; padding: 0px;" cellpadding="0" cellspacing="0">
	<tr>
	<td align="center" valign="bottom" height="175" colspan="2">

			<input type="hidden" name="linkorig" value="<?php echo htmlspecialchars($_POST["link-orig"]);?>"/>
                        <input type="hidden" name="location" value="<?php echo htmlspecialchars($_POST["location"]);?>"/>
                        <input type="hidden" name="mac" value="<?php echo htmlspecialchars($_POST["mac"]);?>"/>
                        <input type="hidden" name="ip" value="<?php echo htmlspecialchars($_POST["ip"]);?>"/>
                        <input type="hidden" name="linklogin" value="<?php echo htmlspecialchars($_POST["link-login"]);?>"/>
                        <input type="hidden" name="error" value="<?php echo htmlspecialchars($_POST["error"]);?>"/>
                        <input type="hidden" name="chapid" value="<?php echo htmlspecialchars($_POST["chap-id"]);?>"/>
                        <input type="hidden" name="chapchallenge" value="<?php echo htmlspecialchars($_POST["chap-challenge"]);?>"/>
                        <input type="hidden" name="linkloginonly" value="<?php echo htmlspecialchars($_POST["link-login-only"]);?>"/>
                        <input type="hidden" name="linkorigesc" value="<?php echo htmlspecialchars($_POST["link-orig-esc"]);?>"/>

			<table width="100" style="background-color: #ffffff">
                                <tr><td align="right">Postcode</td>
                                <td><input style="width: 80px" name="pcode" type="text" /></td>
                                </tr>
                                <tr><td align="right">Email</td>
                                <td><input style="width: 80px" name="email" type="text" /></td>
                                </tr>
                                <tr><td><button>OK</button></td>
				</tr>
			</table>


	</td>
	</tr>
	</table>


	</td>
	</tr>
</table>
</form>
</body>
</html>
