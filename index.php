<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

//Main Index - Display current registrations and facilitates new registrations 
//Pull in the db info
require_once("dbinfo.php");
//And the common functions
require_once("functions.php");

//Include the style
echo '<link rel="stylesheet" type="text/css" href="css/style.css">';

//Grab the game info
$game = grabGame($DB, $DBhost, $DBusername, $DBpassword);

//Grab the layout info
$layout = grabLayout($DB, $DBhost, $DBusername, $DBpassword, $game['sid']);

//Print out the title
echo "<h2>Event Name: ".$game['name']."</h2>";

//Assign the teams into an array for easier access
$teams = explode(",",$game['teamNames']);
//Assign the roles into an array for easier access
$roles = explode(",",$layout['roles']);

//Print out the role slots for each team
for($i=0; $i<$game['numTeams']; $i++){

	//Print out the team name
	echo "<h3>Team ".$teams[$i]."</h3>";

	//Print out the roles for the games number of squads
	for ($j=1; $j<=$game['squads']; $j++){

		//Print out squad designation
		echo "Squad: ".numToNato($j).' <a href="register.php?gid='.$game['gid'].'&team='.$i.'&squad='.$j.'&role=-1">Register Squad</a><br /><br />';
		
		//Start the table structure
		echo '<table id="squad">';
		
		$roleCount=0;
		//Print out the team roles
		foreach($roles as $role){	
			echo '<tr><td>'.$role.'</td><td><a href="register.php?gid='.$game['gid'].'&team='.$i.'&squad='.$j.'&role='.$roleCount.'">Register</a></td></tr>';
			$roleCount++;
		}
		echo "</table><hr />";
	}
}


?>