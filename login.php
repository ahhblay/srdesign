<!DOCTYPE html>
<html>
<head>

<link rel="stylesheet" type="text/css" href="styles.css">
<link rel="stylesheet" type="text/css" href="login.css">

<meta charset=utf-8 >
<title>Exchange - Login</title>

</head>
<body>

  <header>
    <div><a href="index.html"><img src="exchange-logo.png" /></a></div>
    <nav>
        <a>About</a>
        <a>Download</a>
        <a class="selected">Login</a>
    </nav>
  </header>

  <div id="form-main">
  <div id="form-div">
    <form method="post" action="login.php" class="form" id="form1">
      
      <p class="name">
        <input name="name" type="text" class="feedback-input" placeholder="Username" id="name" />
      </p>
      
      <p class="password">
        <input name="password" type="password" class="feedback-input" id="password" placeholder="Password" />
      </p>

      <br />
      <div class="submit">
      	<input type="submit" value="Login" id="button"/>
        <div class="ease"></div>
	  </div>

    </form>
    <br />
    <span class="fineprint">
    <p>Not a member yet? Sign up <a href="signup.php">here</a>.</p>
	</span>
  </div>

<?php
  $name = $_POST['name'];
  $password = $_POST['password'];

  //connect to database
  $connect = mysql_connect("dbserver.engr.scu.edu","nmaulino","FREE2799");
  if (!$connect)
      die('Error in connection: ' . mysql_error());

  mysql_select_db("sdb_nmaulino", $connect);

  $user = mysql_query("SELECT name from Accounts WHERE name='$name'");
  if(mysql_num_rows($user) > 0) {
      $result = mysql_query("SELECT password from Accounts WHERE name='$name'");
      $row = mysql_fetch_array($result, MYSQL_NUM);
      if($row[0] == $password)
	  echo "Login successful.";
      else
	  echo "Wrong username/password.";
  } else if(isset($name)) 
      echo "Account with username $name has not been created.";
?>

</body>
</html>
