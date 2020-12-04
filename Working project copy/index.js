
$(':button']).click(function(){
  if(this.class== 'Computers')
  {
    ReadData(this);
    alert("button pressed");
  }
  if(this.class== 'Laptops')
    ReadData(this);
  if(this.class== 'Tablets')
    ReadData(this);
  if(this.class== 'Others')
    ReadDataforOthers(this);
})

for (var n=0; n<document.querySelectorAll(".results").length; n++)
{
  document.querySelectorAll(".results")[n].addEventListerner("click",function() {
    var buttonInnerHtml=this.innerHTML;
    ReadData(buttonInnerHtml);
  })
}


function ReadData(type)
{
<?php
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
        $sql = "SELECT model_name,model_type,model_released FROM tbl_model where type=$type";
        $result = sqlsrv_query($conn,$sql);
        if ($result == FALSE)
            die(print_r(sqlsrv_errors(),true));
            echo"<table>
              <tr>
                <th>Model_Name</th>
                <th>Model_Type</th>
                <th>Model_Released</th>
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
  ?>
}
ReadData();
