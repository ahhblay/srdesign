<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
		<meta charset="UTF-8" />
		<title>Exchange - Dashboard</title>
		<link rel="stylesheet" type="text/css" href="dashboard.css" />

        <script src="Chart.js"></script>
        <style>
            canvas{
            }
        </style>

 	</head>
	<body>
		<input type='checkbox' id='sideToggle1' hidden>
		<input type='checkbox' id='sideToggle2' hidden>
		
		<aside class='sideMenu left'>
			<h2>Menu</h2>
  			<ul>
    			<li><a href="dashboard.html">dashboard</a></li>
    			<li><a href='#'>events</a></li>
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
    		
            <div class="center">
                <div id="svg">
                    <p>Member Activity</p><br />
                    <canvas id="canvas" height="250" width="900"></canvas>
                </div>

                <div id="events">
                    <h2>upcoming events</h2>
                    <div id="description">
			<?php
			    //connect to database
  			    $connect = mysql_connect("dbserver.engr.scu.edu","nmaulino","FREE2799");
  			    if (!$connect)
      				die('Error in connection: ' . mysql_error());

  			    mysql_select_db("sdb_nmaulino", $connect);
		
			    //display upcoming events
  			    $user = mysql_query("SELECT * from Events");
  		   	    if(mysql_num_rows($user) > 0) {
				$result = mysql_query("SELECT * from Events ORDER BY date");
				while ($row = mysql_fetch_array($result)) {   
          		  	    echo "<h2>";
				    echo $row['name'];
				    echo "</h2>";
          			    echo '<p id="date">';
				    echo date('F d, Y', strtotime($row['date']));
				    echo "</p><br />";
				}
  			    } else
				echo "<h2>No upcoming events</h2>";
			?>
                    </div>

                </div>

                <div id="members">
                    <h2>newest member</h2>
                   <!-- <svg height="200" width="100">
                            <circle cx="50" cy="70" r="40" stroke="white" stroke-width="3" fill="grey" align="left"/>
                        </svg> --> 
                    <div id="member-feature">
                        <?php
                            //connect to database
                            $connect = mysql_connect("dbserver.engr.scu.edu","nmaulino","FREE2799");
                            if (!$connect)
                                die('Error in connection: ' . mysql_error());

                            mysql_select_db("sdb_nmaulino", $connect);

                            //display newest member
                            $user = mysql_query("SELECT * from Members");
                            if(mysql_num_rows($user) > 0) {
                                $result = mysql_query("SELECT * from Members ORDER BY date DESC LIMIT 1");
                                $row = mysql_fetch_array($result);   
                                echo "<h2>";
                                echo $row['fname'];
			        echo " ";
				echo $row['lname'];
                                echo "</h2>";
                                echo '<p id="joined-when"> Joined ';
                                echo date('m/d/y', strtotime($row['date']));
                                echo "</p>";
                            } else
                                echo "<h2>No new friends</h2>";
                        ?>
                    </div>
                </div>

    	    </div>
  		</div>

    <script>

        var lineChartData = {
            labels : ["January","February","March","April","May","June","July"],
            datasets : [
                {
                    fillColor : "rgba(220,220,220,0.5)",
                    strokeColor : "rgba(220,220,220,1)",
                    pointColor : "rgba(220,220,220,1)",
                    pointStrokeColor : "#fff",
                    data : [65,59,90,81,56,55,40]
                },
            ]
            
        }

    var myLine = new Chart(document.getElementById("canvas").getContext("2d")).Line(lineChartData);
    
    </script>

	</body>
</html>
