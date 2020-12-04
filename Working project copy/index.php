<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!$_SESSION["myemail"]){
    header("location: main_login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="styles.css">
    <title> ViCE</title>
    <div class="topnav">
      <a class="active" href="index.php">Home</a>
      <a href="contribute.html">Contribute</a>
      <a href="events.php">Event</a>
      <a href="about.html">About</a>
      <a href="blog.php">Blog</a>
      <a href="logout.php">Logout</a>
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
  <h1 style= "text-align: center; color: #e6d5b8;">Our Database of: </h1>
  <br>
  <div class="images">
    <div class="row">
      <div class="column">
          <img src="/computer.png" alt="Computer">
          <h4>Computers</h4>
      </div>
      <div class="column">
        <img src="/laptop.png" alt="Laptop">
        <h4>Laptops</h4>
      </div>
      <div class="column">
        <img src="/peripheral.jpg" alt="Peripherals">
        <h4>Peripherals</h4>
      </div>
      <div class="column">
        <img src="/wearable.png" alt="Wearables">
        <h4>Wearables</h4>
      </div>
      <div class="column">
        <img src="/tablet.jpg" alt="Tablets">
        <h4>Tablets</h4>
      </div>
    </div>
    <div class="row">
      <div class="column">
        <img src="/phone.jpg" alt="Phones">
        <h4>Phones</h4>
      </div>
    </div>
  </div>
      <a href="#tables"><h1 style= "text-align: center; color: #e6d5b8;"><button>Go to tables</button></h1></a>
        <a href="#searchButtons"><h1 style= "text-align: center; color: #e6d5b8;"><button>Go to Catagory</button></h1></a>
</section>

<section id="searchButtons">
  <div class="buttons">
    <h1 style= "text-align: center; color: #e6d5b8;">Click on buttons to see all devices in a Catagory</h1>
    <form action="index.php" method="post">
      <button type="submit" name="Computer" class= "results">Computers</button>
      <button type="submit" name="Laptop" class= "results">Laptops</button>
      <button type="submit" name="Tablet" class= "results">Tablets</button>
      <button type="submit" name="Phone" class= "results">Phones</button>
      <button type="submit" name="Wearable" class= "results">Wearables</button>
      <button type="submit" name="Peripherals" class= "results">Peripherals</button>
    </form>
  </div>
</section>

<section id="tables">
<?php
if(isset($_POST['Computer'])){
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
        $sql = "SELECT model_name,model_type,model_released FROM tbl_model where model_type='Computer' order by model_name";

        $result = sqlsrv_query($conn,$sql);
        if ($result == FALSE)
            die(print_r(sqlsrv_errors(),true));
            echo"<table>
              <tr>
                <th>model_name</th>
                <th>model_type</th>
                <th>model_released</th>
              </tr>";
          while($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC))
          {
            echo "<tr><td>". $row["model_name"] . "</td><td>" .$row["model_type"]. "</td><td>". $row["model_released"]. "</td><tr>";
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
}

if(isset($_POST['Laptop'])){
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
        $sql = "SELECT model_name,model_type,model_released FROM tbl_model where model_type='Laptop' order by model_name";

        $result = sqlsrv_query($conn,$sql);
        if ($result == FALSE)
            die(print_r(sqlsrv_errors(),true));
            echo"<table>
              <tr>
                <th>model_name</th>
                <th>model_type</th>
                <th>model_released</th>
              </tr>";
          while($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC))
          {
            echo "<tr><td>". $row["model_name"] . "</td><td>" .$row["model_type"]. "</td><td>". $row["model_released"]. "</td><tr>";
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
}

if(isset($_POST['Tablet'])){
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
        $sql = "SELECT model_name,model_type,model_released FROM tbl_model where model_type='Tablet' order by model_name";

        $result = sqlsrv_query($conn,$sql);
        if ($result == FALSE)
            die(print_r(sqlsrv_errors(),true));
            echo"<table>
              <tr>
                <th>model_name</th>
                <th>model_type</th>
                <th>model_released</th>
              </tr>";
          while($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC))
          {
            echo "<tr><td>". $row["model_name"] . "</td><td>" .$row["model_type"]. "</td><td>". $row["model_released"]. "</td><tr>";
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
}

if(isset($_POST['Phone'])){
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
        $sql = "SELECT model_name,model_type,model_released FROM tbl_model where model_type='Mobile Phone' order by model_name";

        $result = sqlsrv_query($conn,$sql);
        if ($result == FALSE)
            die(print_r(sqlsrv_errors(),true));
            echo"<table>
              <tr>
                <th>model_name</th>
                <th>model_type</th>
                <th>model_released</th>
              </tr>";
          while($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC))
          {
            echo "<tr><td>". $row["model_name"] . "</td><td>" .$row["model_type"]. "</td><td>". $row["model_released"]. "</td><tr>";
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
}

if(isset($_POST['Wearable'])){
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
        $sql = "SELECT model_name,model_type,model_released FROM tbl_model where model_type='Wearable' order by model_name";

        $result = sqlsrv_query($conn,$sql);
        if ($result == FALSE)
            die(print_r(sqlsrv_errors(),true));
            echo"<table>
              <tr>
                <th>model_name</th>
                <th>model_type</th>
                <th>model_released</th>
              </tr>";
          while($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC))
          {
            echo "<tr><td>". $row["model_name"] . "</td><td>" .$row["model_type"]. "</td><td>". $row["model_released"]. "</td><tr>";
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
}
if(isset($_POST['Peripherals'])){
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
        $sql = "SELECT model_name,model_type,model_released FROM tbl_model where model_type='Peripheral' order by model_name";

        $result = sqlsrv_query($conn,$sql);
        if ($result == FALSE)
            die(print_r(sqlsrv_errors(),true));
            echo"<table>
              <tr>
                <th>model_name</th>
                <th>model_type</th>
                <th>model_released</th>
              </tr>";
          while($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC))
          {
            echo "<tr><td>". $row["model_name"] . "</td><td>" .$row["model_type"]. "</td><td>". $row["model_released"]. "</td><tr>";
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
}
?>

</section>
  </body>
  <footer>
    Hello
  </footer>
</html>
