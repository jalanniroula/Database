<?php


function addUser()
{
  $lastname=$_POST['mylastname'];
  $firstname=$_POST['myfirstname'];
  $myemail=$_POST['myemail'];
  $mypassword=$_POST['mypassword'];
  $myinterets=$_POST['myinterests'];

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
    try
      {
        $sql = "insert into dbo.tbl_users (users_lastname,users_firstname,users_emailaddress,users_password) values (?,?,?,?)";
        $params= array(
          array($lastname),
          array($firstname),
          array($myemail),
          array($mypassword)
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
addUser();

header("location: main_login.php");
 ?>
