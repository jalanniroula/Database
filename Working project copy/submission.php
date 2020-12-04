<html>
<body>

Thank you
Your information is submitted.
<?php
if (isset($_POST['founder'])){
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

}
?>

<?php
// assign variables to the post values from the contribute page
if(isset($_POST['modelname'])){

$modelname= $_POST['modelname'];
$modeltype = $_POST['modeltype'];
$modelreleased = $_POST['modelreleased'];

$modelavailable= $_POST['modelavailable'];
$modellastsold = $_POST['modellastsold'];
$modelram = $_POST['modelram'];

$modeldenom = $_POST['modeldenom'];
$modelcpu = $_POST['modelcpu'];
$modelcpuspeed = $_POST['modelcpuspeed'];

$modelos = $_POST['modelos'];
$modeldisplay = $_POST['modeldisplay'];
$modelbus = $_POST['modelbus'];

$modelports = $_POST['modelports'];
$modelnumsold = $_POST['modelnumsold'];
$modelexpansion = $_POST['modelexpansion'];

$modelintroprice = $_POST['modelintroprice'];

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
    $sql = "{CALL dbo.sp_ModelInsert(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)}";
    $params = array(

      array($modelname),
      array($modeltype),
      array($modelreleased),

      array($modelavailable),
      array($modellastsold),
      array($modelram),

      array($modeldenom),
      array($modelcpu) ,
      array($modelcpuspeed),

      array($modelos),
      array($modeldisplay),
      array($modelbus),

      array($modelports ),
      array( $modelnumsold),
      array($modelexpansion),
      array($modelintroprice)
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

}
?>

</body>
</html>
