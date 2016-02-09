<?php
$var = $_GET['key'];

if($var == 'password'){
	$value = 'password';
	setcookie("accesskey", $value);
    header("Location: ../files");
}else if ($var == 'penis'){
    header("Location: http://fbi.gov/");
}else {
    header("Location: ../badrequest.html");
}
?>
<!DOCTYPE HTML>
<html lang="en-US">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="refresh" content="0;url=../badrequest.html">
    </head>
    <body>
    	<code>bad_request</code>
    </body>
</html>