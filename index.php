<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="styles.css">
    <title> ViCE</title>
    <div class="topnav">
      <a class="active" href="index.php">Home</a>
      <a href="contribute.html">Contribute</a>
      <a href="about.html">About</a>
      <form action="searchResults.php" method="post" >
        <input type="text" name="valueToSearch" placeholder="Search Record.."></br>
      </form>
    </div>
  </head>
  <body>


<!---
featured images/computers
--->
<section id="features">
  <div class="images">
    <div class="row">
      <div class="column">
          <img src="/computer.png" alt="Computer">
          <h4>Computers</h4>
      </div>
      <div class="column">
        <img src="/laptop.jpg" alt="Laptop">
        <h4>Laptops</h4>
      </div>
      <div class="column">
        <img src="/peripherals.jpg" alt="Peripherals">
        <h4>Peripherals</h4>
      </div>
    </div>
  </div>
</section>
<section id="tables">
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
        $sql = "SELECT * FROM tbl_countries";
        $result = sqlsrv_query($conn,$sql);
        if ($result == FALSE)
            die(print_r(sqlsrv_errors(),true));
            echo"<table>
              <tr>
                <th>Country_ID</th>
                <th>Country_Code</th>
                <th>Country_Name</th>
              </tr>";
          while($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC))
          {
            echo "<tr><td>". $row["countries_id"] . "</td><td>" .$row["countries_ccode"]. "</td><td>". $row["countries_name"]. "</td><tr>";
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
</section>
  </body>
  <footer>
    In progress
  </footer>
</html>
