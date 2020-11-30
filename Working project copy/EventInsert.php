<html>
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="stylesTwo.css">
  <title> ViCE</title>
  <div class="topnav">
    <a href="index.php">Home</a>
    <a href="contribute.html">Contribute</a>
    <a href="about.html">About</a>
    <a class="active" href="blog.php">Blog</a>
  </div>
</head>
<body>

Your entry is submitted.

<?php

try
{
    $serverName = "JALAN-8\\SQLEXPRESS01";
    $connectionOptions = array("Database"=>"db_ViceApplication");
    $conn = sqlsrv_connect($serverName, $connectionOptions);
    if($conn == FALSE)
        die(FormatErrors(sqlsrv_errors()));
    else {
      echo"connected";
    }
}
catch(Exception $e)
{
    echo("Error!");
}
try
{
    $sql = "{CALL dbo.sp_EventInsert(?,?,?,?,?)}";
    $params = array(
        array($_POST['Eventtitle']),
        array($_POST['timeStamp']),
        array($_POST['EventDescription']),
        array($_POST['EventContact']),
        array($_POST['EventEmail'])
    );
    $getProducts = sqlsrv_query($conn, $sql,$params);
    if ($getProducts == FALSE)
        die(print_r(sqlsrv_errors(),true));
    sqlsrv_free_stmt($getProducts);
    sqlsrv_close($conn);
}
catch(Exception $e)
  {
    echo("Error!");
  }

header("location: events.php");
?>

</body>
</html>
