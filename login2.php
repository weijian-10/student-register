<?php
require('db.php');
?>
<html>
<head>
<title>A BASIC HTML FORM</title>
</head>
<body>

<form name ="form1" Method ="POST" Action ="login2.php">

<input TYPE = "TEXT" VALUE ="username" name ="username">
<input TYPE = "Submit" Name = "Submit1" VALUE = "Login">

    </form>

</body>
</html>
<?PHP

$username = $_POST['username'];

if ($username == "letmein") {

print ("Welcome back, friend!");

}
else {

print ("You're not a member of this site");

}

?>