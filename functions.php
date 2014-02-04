<?php
//Common functions 

//Take db info, give back game array
function grabGame($DB, $DBhost, $DBusername, $DBpassword){
	//Connect to the db
	$dbConnection = new PDO('mysql:dbname='.$DB.';host='.$DBhost.';charset=utf8', ''.$DBusername.'', ''.$DBpassword.'');
	$dbConnection->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
	$dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
	//Query the db for the active game
	$statement = 'SELECT * FROM `game` WHERE `active`="1"';
	$gameExec = $dbConnection->prepare($statement);
	$gameExec->execute();	

	//Grab the active game
	$game = $gameExec->fetch(PDO::FETCH_ASSOC);	
	
	//Return the game information
	return $game;
}

function grabLayout($DB, $DBhost, $DBusername, $DBpassword, $sid){
	//Connect to the db
	$dbConnection = new PDO('mysql:dbname='.$DB.';host='.$DBhost.';charset=utf8', ''.$DBusername.'', ''.$DBpassword.'');
	$dbConnection->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
	$dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	//Query the db for the layout info
	$statement = 'SELECT * FROM `squadLayouts` WHERE `sid`="'.$sid.'"';
	$layoutExec = $dbConnection->prepare($statement);
	$layoutExec->execute();	

	//Grab the layout
	$layout = $layoutExec->fetch(PDO::FETCH_ASSOC);
	
	//Return the layout
	return $layout;
}

//Take an int and give back the nato designation in alpha order
function numToNato($number){

	$natoLib[] = array();

	//Generate the array
	$natoLib[]="Alpha";
	$natoLib[]="Bravo";
	$natoLib[]="Charlie";
	$natoLib[]="Delta";
	$natoLib[]="Echo";
	$natoLib[]="Foxtrot";
	$natoLib[]="Golf";
	$natoLib[]="Hotel";
	$natoLib[]="India";
	$natoLib[]="Juliet";
	$natoLib[]="Kilo";
	$natoLib[]="Lima";
	$natoLib[]="Mike";
	$natoLib[]="November";
	$natoLib[]="Oscar";
	$natoLib[]="Papa";
	$natoLib[]="Quebec";
	$natoLib[]="Romeo";
	$natoLib[]="Sierra";
	$natoLib[]="Tango";
	$natoLib[]="Uniform";
	$natoLib[]="Victor";
	$natoLib[]="Whiskey";
	$natoLib[]="X-Ray";
	$natoLib[]="Yankee";
	$natoLib[]="Zulu";
	
	//Send the nato designation back
	return $natoLib[$number];
}

function getTeam($teams, $num){

//Assign the teams into an array for easier access
$teams = explode(",",$game['teamNames']);
$team = array[name -> $teams[

}

?>