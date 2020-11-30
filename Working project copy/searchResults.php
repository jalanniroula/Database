<html>
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="styles.css">
  <title> ViCE</title>
  <div class="topnav">
    <a class="active" href="index.php">Home</a>
    <a href="contribute.html">Contribute</a>
    <a href="about.html">About</a>
  </div>
</head>
<body>

Thank you, for using this. See results below.
<?php
  function ReadData()
  {

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
              $sql = "select * from dbo.tbl_manf where manf_name= ?";
              $params = array(
                  array($_POST['valueToSearch'])
              );
              $result = sqlsrv_query($conn, $sql,$params);
                  if ($result == FALSE)
                      die(print_r(sqlsrv_errors(),true));
                      echo"<table>
                        <tr>
                          <th>manf_name</th>
                          <th>year_founded</th>
                          <th>founder</th>
                        </tr>";
                    while($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC))
                    {
                      echo "<tr><td>". $row["manf_name"] . "</td><td>" .$row["manf_yr_founded"]. "</td><td>". $row["manf_founder"]. "</td><tr>";
                    }
                  echo"</table>";
              sqlsrv_free_stmt($result);
              sqlsrv_close($conn);
            }
            catch(Exception $e)
            {
              echo("Error!");
            }
  }
  ReadData();
?>

</body>
</html>
