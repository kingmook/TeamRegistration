<?php
//Allow registration for 1 or 11 slots
error_reporting(E_ALL);
ini_set('display_errors', 1);

//Pull in the db info
require_once("dbinfo.php");
//And the common functions
require_once("functions.php");

//Grab the game info
$game = grabGame($DB, $DBhost, $DBusername, $DBpassword);

//Grab the layout info
$layout = grabLayout($DB, $DBhost, $DBusername, $DBpassword, $game['sid']);

$team = getTeam();

//Assign the roles into an array for easier access
$roles = explode(",",$layout['roles']);

//Title
echo "<h2> Register </h2>";

//User confirmation
echo "<h3>Registering for: ".$game['name']."</h3>";
echo "Team: ";

print_r($_GET);
?>