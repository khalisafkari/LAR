<?php
session_start();
include_once 'dbconnect.php';

if(!isset($_SESSION['userSession']))
{
  header("Location: index.php");
}

$query = $MySQLi_CON->query("SELECT * FROM users WHERE user_id=".$_SESSION['userSession']);
$userRow=$query->fetch_array();
$MySQLi_CON->close();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Welcome - <?php echo $userRow['user_email']; ?></title>

<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen"> 
<link href="bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" media="screen"> 

<link rel="stylesheet" href="style.css" type="text/css" />
</head>
<body>

<nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="http://www.codingcage.com">Coding Cage</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="http://www.codingcage.com/2015/03/simple-login-and-signup-system-with-php.html">Back to Article</a></li>
            <li><a href="http://www.codingcage.com/search/label/jQuery">jQuery</a></li>
            <li><a href="http://www.codingcage.com/search/label/PHP">PHP</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#"><span class="glyphicon glyphicon-user"></span>&nbsp; <?php echo $userRow['user_name']; ?></a></li>
            <li><a href="logout.php?logout"><span class="glyphicon glyphicon-log-out"></span>&nbsp; Logout</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

<div class="container" style="margin-top:150px;text-align:center;font-family:Verdana, Geneva, sans-serif;font-size:35px;">
<?php
   $DB_host = "localhost";
   $DB_user = "root";
   $DB_pass = "";
   $DB_name = "khalis";
   
   $MySQLi_CON = new MySQLi($DB_host,$DB_user,$DB_pass,$DB_name);
    
     if($MySQLi_CON->connect_errno)
     {
         die("ERROR : -> ".$MySQLi_CON->connect_error);
     }

$query = $MySQLi_CON->query("SELECT * FROM users");
//$result = mysql_query("SELECT * FROM listoffile");
echo "<div align='center'>Note: the data will automatically deleted when it reach the expiry date"."</div><br>";
echo "<table width='444' border='1' align='center' cellpadding='0' cellspacing='0'>
<tr>
<th>Description</th>
<th>Content</th>
<th>Expiry date</th>
</tr>";
while ($khalis=mysqli_fetch_array($query)) {
 echo "<tr>";
  echo "<td><div align='center'>" . $khalis['user_id'] . "</td>";
  echo "<td><div align='center'>" . $khalis['user_name'] . "</td>";
  echo "<td><div align='center'>" . $khalis['user_email'] . "</td>";
  echo "</tr>";
echo "</table";
};
//while($row = mysql_fetch_array($result))
  //{
  //echo "<tr>";
  //echo "<td><div align='center'>" . $row['description'] . "</td>";
  //echo "<td><div align='center'>" . $row['content'] . "</td>";
  //echo "<td><div align='center'>" . $row['expiry'] . "</td>";
  //echo "</tr>";
  //}
//echo "</table>";

//mysql_close($con);
?>   
</div>

</body>
</html>
