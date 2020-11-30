<?php
session_start();
try
{
    $serverName = "JALAN-8\\SQLEXPRESS01";
    $connectionOptions = array("Database"=>"db_ViceApplication");
    $conn = sqlsrv_connect($serverName, $connectionOptions);
    if($conn == FALSE)
        die(FormatErrors(sqlsrv_errors()));
    else {
      echo"_";
    }
}
catch(Exception $e)
{
    echo("Error!");
}
// Define $myusername and $mypassword
// going to need other stuff for registering

$mypassword=$_POST['mypassword'];
$myemail= $_POST['myemail'];

$stmt = sqlsrv_query($conn,"SELECT * FROM tbl_users WHERE users_emailaddress='$myemail' and users_password='$mypassword'",array(),array("Scrollable"=>SQLSRV_CURSOR_KEYSET));

//_num_row is counting table row
$count=sqlsrv_num_rows($stmt);

// If result matched $myusername and $mypassword, table row must be 1 row

if($count==1){

// Register $myusername, $mypassword and redirect to file "login_success.php"
$_SESSION["myemail"] = $myemail;
$_SESSION["mypassword"] = $mypassword;
$_SESSION["loggedIn"] = true;
header("location:index.php");
}
else {
echo "Wrong Username or Password";
}

ob_end_flush();
?>
