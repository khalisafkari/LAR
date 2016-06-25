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
            <span class="sr-only"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="http://www.codingcage.com">KHALISAFKARI</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="https://www.hatinews.com">Back to Article</a></li>
            <li><a href="http://www.animelon.net">download</a></li>
            <li><a href="http://hatinews.com">informasi</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#"><span class="glyphicon glyphicon-user"></span>&nbsp; <?php echo $userRow['user_name']; ?></a></li>
            <li><a href="logout.php?logout"><span class="glyphicon glyphicon-log-out"></span>&nbsp; Logout</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
    <div class="container theme-showcase" role="main">

      <!-- Main jumbotron for a primary marketing message or call to action -->
      <div class="jumbotron">
        <h1>INFORMASI</h1>
        <p><?php echo $userRow['pesan']; ?></p>
      </div>
<div class="container" style="margin-top:50px;text-align:center;font-family:Verdana, Geneva, sans-serif;font-size:15px;">
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

$curdate=date("Y-m-d");
$MySQLi_CON->query("DELETE FROM users WHERE expiry='$curdate'");
//mysql_close($con);
?>
      <div class="page-header">
        <h1>MEMBER</h1>
      </div>
      <div class="row">
        <div class="col-md-6">
          <table class="table">
            <thead>
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
              echo "<tr>";
                echo "<th>#</th>";
                echo "<th>First Name</th>";
                echo "<th>Last Name</th>";
               echo " <th>Username</th>";
              echo "</tr></thead><tbody>";
while ($khalis=mysqli_fetch_array($query)) {
              echo "<tr>";
                echo "<td>" . $khalis['user_id'] . "</td>";
               echo " <td>" . $khalis['user_name'] . "</td>";
              echo "  <td>" . $khalis['user_email'] . "</td>";
               echo " <td>" . $khalis['expiry'] . "</td>";
              echo "</tr>";
}
?>
            </tbody>
          </table>
        </div>

       

</body>
</html>