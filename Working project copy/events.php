<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="styles.css">
    <title> ViCE</title>
    <div class="topnav">
      <a href="index.php">Home</a>
      <a href="contribute.html">Contribute</a>
      <a class="active" href="events.php">Events</a>
      <a href="about.html">About</a>
      <a href="blog.php">Blog</a>
      <a href="logout.php">Logout</a>
      <form action="searchResults.php" method="post" >
        <input type="text" name="valueToSearch" placeholder="Search Record.."></br>
      </form>
    </div>
  </head>
  <body>


  <section style= "background-color:#e6d5b8; padding: 5% 15% 15% 10%;">
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
            $sql = "SELECT event_title,event_contact,event_email,event_description from dbo.tbl_events order by event_id desc";
            $result = sqlsrv_query($conn,$sql);
            if ($result == FALSE)
                die(print_r(sqlsrv_errors(),true));
            while($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC))
              {
                echo  "<h1>"."Event Title:".$row["event_title"]."</h1>";
                echo "<tr><td>". $row["event_description"] . "</td><td> <br>";
                echo "<tr><td>". "Contact: ". $row["event_contact"] . "</td><td>";
                echo "<tr><td>". "Email: ". $row["event_email"] . "</td><td> <br><br>";
              }
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
    <br>
    <br>
    <br>
    <a href="Eventsubmission.php"><button type="button" name="button"><h2>Add Event<h2></button> </a>
    <a href="Eventsubmission.php"><button type="button" name="button"><h2>Delete Event<h2></button> </a>

    </section>

  </body>
  <footer>
    Hello
  </footer>
</html>
