<html>
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="styles.css">
  <title> ViCE</title>
  <?php echo $query; ?>
  <style type="text/css">body { font-family: arial,sans-serif;} </style>
  <div class="topnav">
    <a class="active" href="index.php">Home</a>
    <a href="contribute.html">Contribute</a>
    <a href="events.php">Event</a>
    <a href="about.html">About</a>
    <a href="blog.php">Blog</a>
    <a href="logout.php">Logout</a>
  </div>
</head>
<body>

Thank you, for using this. See results below.
<?php
  function ReadData()
  {
    $value=$_POST['valueToSearch'];

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
              $sql = "SELECT manf_name,manf_yr_founded, manf_founder from tbl_manf where manf_name like '%$value%'";

              $result = sqlsrv_query($conn, $sql);
                  if ($result == FALSE)
                      die(print_r(sqlsrv_errors(),true));
                      echo"<table>
                        <tr>
                          <th>manf_name</th>
                          <th>manf_yr_founded</th>
                          <th>manf_founder</th>
                        </tr>";
                    while($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC))
                    {
                      echo "<tr><td>". $row["manf_name"] . "</td><td>" .$row["manf_yr_founded"]."</td><td>" . $row["manf_founder"]. "</td><td>"."</td><tr>";
                    }
                  echo"</table>";
              sqlsrv_free_stmt($result);
              sqlsrv_close($conn);
            }
            catch(Exception $e)
            {
              echo("Error!");
            }
          // to display model table
          echo "<br></br> From the models table<br>";
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
                  $sql = "SELECT model_name,model_type, model_released, model_cpu, model_os from tbl_model where model_name like '%$value%'";

                  $result = sqlsrv_query($conn, $sql);
                      if ($result == FALSE)
                          die(print_r(sqlsrv_errors(),true));
                          echo"<table>
                            <tr>
                              <th>model_name</th>
                              <th>model_type</th>
                              <th>model_released</th>
                              <th>model_cpu</th>

                            </tr>";
                        while($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC))
                        {
                          echo "<tr><td>". $row["model_name"] . "</td><td>" .$row["model_type"]."</td><td>" . $row["model_released"]. "</td><td>". "</td><td>" .$row["model_cpu"]."</td><td>". "</td><td>" .$row["model_os"]."</td><td>" ."</td><tr>";
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

error_reporting(E_ALL);  // Turn on all errors, warnings and notices for easier debugging

// API request variables
$endpoint = 'http://svcs.ebay.com/services/search/FindingService/v1';  // URL to call
$version = '1.0.0';  // API version supported by your application
$appid = 'jalannir-vicedata-PRD-3f785c336-99314b67';  // Replace with your own AppID
$globalid = 'EBAY-US';  // Global ID of the eBay site you want to search (e.g., EBAY-DE)
$query = $_POST['valueToSearch'];  // You may want to supply your own query
$safequery = urlencode($query);  // Make the query URL-friendly
$i = '0';  // Initialize the item filter index to 0

// Create a PHP array of the item filters you want to use in your request
$filterarray =
  array(
    array(
    'name' => 'MaxPrice',
    'value' => '5000',
    'paramName' => 'Currency',
    'paramValue' => 'USD'),
    array(
    'name' => 'FreeShippingOnly',
    'value' => 'false',
    'paramName' => '',
    'paramValue' => ''),
    array(
    'name' => 'ListingType',
    'value' => array('AuctionWithBIN','FixedPrice','StoreInventory'),
    'paramName' => '',
    'paramValue' => ''),
  );

// Generates an indexed URL snippet from the array of item filters
function buildURLArray ($filterarray) {
  global $urlfilter;
  global $i;
  // Iterate through each filter in the array
  foreach($filterarray as $itemfilter) {
    // Iterate through each key in the filter
    foreach ($itemfilter as $key =>$value) {
      if(is_array($value)) {
        foreach($value as $j => $content) { // Index the key for each value
          $urlfilter .= "&itemFilter($i).$key($j)=$content";
        }
      }
      else {
        if($value != "") {
          $urlfilter .= "&itemFilter($i).$key=$value";
        }
      }
    }
    $i++;
  }
  return "$urlfilter";
} // End of buildURLArray function

// Build the indexed item filter URL snippet
buildURLArray($filterarray);

// Construct the findItemsByKeywords HTTP GET call
$apicall = "$endpoint?";
$apicall .= "OPERATION-NAME=findItemsByKeywords";
$apicall .= "&SERVICE-VERSION=$version";
$apicall .= "&SECURITY-APPNAME=$appid";
$apicall .= "&GLOBAL-ID=$globalid";
$apicall .= "&keywords=$safequery";
$apicall .= "&paginationInput.entriesPerPage=5";
$apicall .= "$urlfilter";

// Load the call and capture the document returned by eBay API
$resp = simplexml_load_file($apicall);

// Check to see if the request was successful, else print an error
if ($resp->ack == "Success") {
  $results = '';
  // If the response was loaded, parse it and build links
  foreach($resp->searchResult->item as $item) {
    $pic   = $item->galleryURL;
    $link  = $item->viewItemURL;
    $title = $item->title;

    // For each SearchResultItem node, build a link and append it to $results
    $results .= "<tr><td><img src=\"$pic\"></td><td><a href=\"$link\">$title</a></td></tr>";
  }
}
// If the response does not indicate 'Success,' print an error
else {
  $results  = "<h3>Oops! The request was not successful. Make sure you are using a valid ";
  $results .= "AppID for the Production environment.</h3>";
}
?>

<!-- Build the HTML page with values from the call response -->
<html>
<head>

</head>
<body>

<h1>eBay Search Results for <?php echo $query; ?></h1>

<table>
<tr>
  <td>
    <?php echo $results;?>
  </td>
</tr>
</table>
</body>
</html>
