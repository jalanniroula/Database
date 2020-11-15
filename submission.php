<html>
<body>

Thank you
Your information is submitted.
<?php
$manfname = $_POST['manfname'];
$yearfounded = $_POST['yearfounded'];
$founder= $_POST['founder'];
$logo = $_POST['logo'];
echo "$logo";
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
    $sql = "{CALL dbo.sp_ManfInsert(?,?,?,?)}";
    $params = array(
        array($manfname),
        array($yearfounded),
        array($founder),
        array(1)
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


?>

</body>
</html>
