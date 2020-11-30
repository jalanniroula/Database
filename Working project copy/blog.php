<html>
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="styles.css">
  <title> ViCE</title>
  <div class="topnav">
    <a href="index.php">Home</a>
    <a href="contribute.html">Contribute</a>
    <a href="about.html">About</a>
    <a class="active" href="blog.php">Blog</a>
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
        $sql = "SELECT * from dbo.tbl_blog_entries";
        $result = sqlsrv_query($conn,$sql);
        if ($result == FALSE)
            die(print_r(sqlsrv_errors(),true));

          while($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC))
          {
            echo "BlogID:".$row["blog_id"];
            echo  "<h1>".$row["blog_title"]. "</h1>";
            echo "<tr><td>". $row["blog_content"] . "</td><td> <br><br><br>";
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
<a href="Blogsubmission.php"><button type="button" name="button"><h1>Make a Post<h1></button> </a>
<a href="Blogsubmission.php"><button type="button" name="button"><h1>Delete a Post<h1></button> </a>


</section>

</body>
</html>
