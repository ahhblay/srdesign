<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
		<meta charset="UTF-8" />
		<title>Exchange - Events</title>
		<link rel="stylesheet" type="text/css" href="events.css" />
 	</head>
	<body>
		<input type='checkbox' id='sideToggle1' hidden>
		<input type='checkbox' id='sideToggle2' hidden>
		
		<aside class='sideMenu left'>
			<h2>Menu</h2>
  			<ul>
    			<li><a href="dashboard.html">dashboard</a></li>
    			<li><a href="events.html">events</a></li>
    			<li><a href='#'>members</a></li>
    			<li><a href="#">settings</a></li>
    			<li><a href="#">Log Out</a></li>
  			</ul>
		</aside>
		<div id='contentWrap'>
			<div id="header">
				<div id="greeting">
    				<p>Welcome, Able</p>
    			</div>
    			<label class='menuBtn' for='sideToggle1'>&minus;</label>
    		</div>

    		<div id="organization-name">
    			<p>Chinese Student Association</p>
    		</div>

            <div class="accordion vertical">
	      <?php
                  //connect to database
                  $connect = mysql_connect("dbserver.engr.scu.edu","nmaulino","FREE2799");
                  if (!$connect)
                      die('Error in connection: ' . mysql_error());

                  mysql_select_db("sdb_nmaulino", $connect);

                  //display events
                  $user = mysql_query("SELECT * from Events");
                  if(mysql_num_rows($user) > 0) {
                      $result = mysql_query("SELECT * from Events ORDER BY date");
                      while ($row = mysql_fetch_array($result)) {
			  $event_id = date('jny', strtotime($row['date']));
                          echo '<section id="'.$event_id.'"><h2><a href="#'.$event_id.'">';
                          echo date('m/d/y', strtotime($row['date']));
                          echo " - ";
                          echo $row['name'];
                          echo "</a></h2>";
                          echo "<p>";
                          echo $row['description'];
                          echo "</p></section>";
                      }
                   } else
                      echo "<h2>No upcoming events</h2>";
              ?>
<!--          <section id="51814">
              <h2><a href="#51814"> 5/18/14 - End of Quarter Potluck </a></h2>
              <p>Event description goes here.</p>
          </section>
          <section id="62014">
              <h2><a href="#62014">6/20/14 - Summer Reunion</a></h2>
              <p>Event description goes here.</p>
          </section>
          <section id="vertblog">
              <h2><a href="#vertblog">Blog</a></h2>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse id lobortis massa. Nunc viverra velit leo, sit amet elementum mi. Fusce posuere nunc a mi tempus malesuada. Curabitur facilisis rhoncus eros eget placerat. Aliquam semper mauris sit amet justo tempor nec lacinia magna molestie. Etiam placerat congue dolor vitae adipiscing. Aliquam ac erat lorem, ut iaculis justo. Etiam mattis dignissim gravida. Aliquam nec justo ante, non semper mi. Nulla consectetur interdum massa, vel porta enim vulputate sed. Maecenas elit quam, egestas eget placerat non, fringilla vel eros. Nam vehicula elementum nulla sed consequat. Phasellus eu erat enim. Praesent at magna non massa dapibus scelerisque in eu lorem.</p>
          </section>
          <section id="vertportfolio">
              <h2><a href="#vertportfolio">Portfolio</a></h2>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse id lobortis massa. Nunc viverra velit leo, sit amet elementum mi. Fusce posuere nunc a mi tempus malesuada. Curabitur facilisis rhoncus eros eget placerat. Aliquam semper mauris sit amet justo tempor nec lacinia magna molestie. Etiam placerat congue dolor vitae adipiscing. Aliquam ac erat lorem, ut iaculis justo. Etiam mattis dignissim gravida. Aliquam nec justo ante, non semper mi. Nulla consectetur interdum massa, vel porta enim vulputate sed. Maecenas elit quam, egestas eget placerat non, fringilla vel eros. Nam vehicula elementum nulla sed consequat. Phasellus eu erat enim. Praesent at magna non massa dapibus scelerisque in eu lorem.</p>
          </section>
          <section id="vertcontact">
              <h2><a href="#vertcontact">Contact</a></h2>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse id lobortis massa. Nunc viverra velit leo, sit amet elementum mi. Fusce posuere nunc a mi tempus malesuada. Curabitur facilisis rhoncus eros eget placerat. Aliquam semper mauris sit amet justo tempor nec lacinia magna molestie. Etiam placerat congue dolor vitae adipiscing. Aliquam ac erat lorem, ut iaculis justo. Etiam mattis dignissim gravida. Aliquam nec justo ante, non semper mi. Nulla consectetur interdum massa, vel porta enim vulputate sed. Maecenas elit quam, egestas eget placerat non, fringilla vel eros. Nam vehicula elementum nulla sed consequat. Phasellus eu erat enim. Praesent at magna non massa dapibus scelerisque in eu lorem.</p>
          </section>

      -->
        </div>

  		</div>

	</body>
</html>
