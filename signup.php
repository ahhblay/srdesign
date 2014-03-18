<!DOCTYPE html>
<html>
<head>

<link rel="stylesheet" type="text/css" href="styles.css">
<link rel="stylesheet" type="text/css" href="login.css">

<meta charset=utf-8 >
<title>Exchange - Sign Up</title>

</head>
<body>
  <header>
    <div><a href="index.html"><img src="exchange-logo.png" /></a></div>
    <nav>
        <a>About</a>
        <a>Download</a>
        <a href="login.php">Login</a>
    </nav>
  </header>

  <div id="form-main">
  <div id="form-div">
    <form method="post" action="signup.php" class="form" id="form1">
      
      <p class="email">
        <input name="email" type="text" class="feedback-input" id="email" placeholder="Email" />
       </p>
        
      <p class="name">
        <input name="name" type="text" class="feedback-input" placeholder="Username" id="name" />
      </p>
      
      <p class="password">
        <input name="password" type="password" class="feedback-input" id="password" placeholder="Password" />
      </p>
      <br />
      <div class="submit">
      	<input type="submit" value="Sign Up" id="button"/>
        <div class="ease"></div>
	  </div>

    </form>
    <br />

<?php
  $email = $_POST['email'];
  $name = $_POST['name'];
  $password = $_POST['password'];

  //connect to database
  $connect = mysql_connect("dbserver.engr.scu.edu","nmaulino","FREE2799");
  if (!$connect)
      die('Error in connection: ' . mysql_error());

  mysql_select_db("sdb_nmaulino", $connect);

  if (isset($name)){
      if(!mysql_query("INSERT INTO Accounts values ('$email','$name','$password')", $connect))
          die('Error: ' .mysql_error());
      else
          echo "Your account has been successfully created.";
  }

?>

    <br />
    <span class="fineprint">
    <p>Already a member? Login <a href="login.php">here</a>.</p>
	</span>
  </div>


</body>
</html>
