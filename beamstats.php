<!DOCTYPE html>
<html lang="en">
<head>
  <title>TheSpaceArmy - Members </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>
<body>
<body>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.html">TheSpaceArmy Stream Team Site!</a>
    </div>
    <div>
      <ul class="nav navbar-nav">
        <li class=""><a href="index.html">Home</a></li>

        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">About us!
          <span class="caret"></span></a>
          <ul class="dropdown-menu">
            
                    <li><a href="Members.html">Members</a></li>
                    <li><a href="EmPsLN.html">Apply</a></li>
                    <li><a href="beamstats.php">Beamstats</a></li>
                    <li><a href="http://twitter.com/thespacearmy">Twitter</a></li>
                    <li><a href="http://www.twitch.tv/thespacearmy">Twitch</a></li>
                    <li><a href="http://beam.pro/thespacearmy">Beam.Pro</a></li>
                    <li><a href="http://www.hitbox.tv/thespacearmy">Hitbox</a></li>
          </ul>
           </ul>
        </li>
      </ul>
    </div>
  </div> 
  <div class="page-header">
    <div class="header">
      <h1 class="project-name">BeamStats</h1>
      <h2 class="project-tagline"></h2>
      </div>
    </div>
    	
            <div class="container">
            <center>
			<form action="" method="post">
			  <h3>Enter Your Beam Username!</h3>
			  <input type="text" name="inputText"/>
			  <input type="submit" name="SubmitButton"/>
			</form>    
			<br>
            
            <?php
				if(isset($_POST['SubmitButton'])){ //check if form was submitted
					$input = $_POST['inputText']; //get input text
					click($input);
				}    
				function click($name){
					$url = 'https://beam.pro/api/v1/channels/' . $name;
					$obj = json_decode(@file_get_contents($url), true);
					if($obj == "") {
						echo '<h1><font color="#FFFFFF">Channel does not exist</font></h1>';
						return;
					}
					$avatars = json_decode(@file_get_contents('https://beam.pro/api/v1/users/' . $obj['user']['id']), true)['avatars'];
					$avatar = 'https://beam.pro/img/media/profile.jpg';
					foreach ($avatars as $a) {
						if ($a['meta']['size'] == '128x128') {
							$avatar = $a['url'];
							break;	
						}
					}
					echo "<center><img src='" . $avatar . "' width='100px' height='100px' style='border:3px solid #fff'>";
					echo "<h1>" . $obj['user']['username'] . '</h1><h3>';
					echo "<b>Followers: </b>"; 
					$followerstotal	= $obj['numFollowers'];
					echo $english_format_number = number_format($followerstotal);
					echo "<br><b>BeamPoints: </b>";
					$points = $obj['user']['points'];
					echo $points;
					echo " <br><b>Total Views</b>: ";
					$viewstotal	= $obj['viewersTotal'];
					echo $english_format_number = number_format($viewstotal);
					echo '<br>';
					echo "<br><b>Current Status: </b>" . ($obj['online'] == true ? 'Online' : 'Offline');
					echo "<br><b>Last Played: </b>" . $obj['type']['name'];
					$date = str_replace("T"," at ", $obj['createdAt']);
					$date = str_replace("Z", "", $date);
					echo ("<br><b>Joined Beam: </b>" . $date);
				}
            ?>
    </body>
</html>
</nav>
