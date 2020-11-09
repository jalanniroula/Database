<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="styles.css">
    <title> ViCE</title>
  </head>
  <body>
  <div class="topnav">
    <a class="active" href="index.html">Home</a>
    <a href="contribute.html">Contribute</a>
    <a href="events.html">Events</a>
    <a href="#about">About</a>
    <input type="text" placeholder="Search..">
  </div>

<!---
featured images/computers
--->
<section id="features">
  <div class="images">
    <div class="row">
      <div class="column">
          <img src="images/computer.png" alt="Computer">
          <h4>Computers</h4>
      </div>
      <div class="column">
        <img src="images/laptop.jpg" alt="Laptop">
        <h4>Laptops</h4>
      </div>
      <div class="column">
        <img src="images/peripherals.jpg" alt="Peripherals">
        <h4>Peripherals</h4>
      </div>
    </div>
  </div>
</section>
<?php
//   function Openconnnection ()
//   {
//     try{
//     $serverName="JALAN-8\\SQLEXPRESS01";
//     $connectionInfo = array("Database"=>"db_ViceApplication");
//     $conn = sqlsrv_connect($serverName, $connectionInfo);
//     if($conn==false){
//       die(print_r(sqlsrv_errors(),true));
//   }
// }
//   catch(Exception $e)
//   {
//     echo "Error";
//   }
// }

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
            echo"connected";
          }
      }
      catch(Exception $e)
      {
          echo("Error!");
      }

    try
      {
        $sql = "SELECT * FROM tbl_countries";
        $getProducts = sqlsrv_query($conn, $sql);
        if ($getProducts == FALSE)
            die(print_r(sqlsrv_errors(),true));
        echo "<tr>";
        while($row = sqlsrv_fetch_array($getProducts, SQLSRV_FETCH_ASSOC))
        {
            echo"<br>";
            echo"<th>";
            print join ($row," ");
            echo "</th>";
        }
        echo "</tr>";
        sqlsrv_free_stmt($getProducts);
        sqlsrv_close($conn);
      }
      catch(Exception $e)
      {
        echo("Error!");
      }
}

// function ReadData(){
//   try{
//     $serverName="JALAN-8\\SQLEXPRESS01";
//     $connectionInfo = array("Database"=>"db_ViceApplication");
//     $conn = sqlsrv_connect($serverName, $connectionInfo);
//       $sql="select * from tbl_countries";
//       $results = sqlsrv_query($conn, $sql);
//       if($results==false)
//       {
//         die(print_r(sqlsrv_errors(),true));
//       }
//       echo "<table align='center'><tr><th>Country_ID</th><th>Country_Code</th><th>Country_Name</th></tr>";
//       while ($row=sqlsrv_fetch_array($results,sqlsrv_fetch_assoc))
//       {
//         echo"<tr><td>" .$row["Country_ID"]. "</td><td>" . $row["Country_Code"]. "</td><td>" . $row["Country_Name"]. "</td></tr><br>";
//         echo "<br>";
//       }
//       sqlsrv_close($conn);
//     }
//   catch(Exception $e)
//   {
//     echo "error";
//   }
// }
ReadData();

?>
  </body>
  <footer>
    In progress
  </footer>
</html>
