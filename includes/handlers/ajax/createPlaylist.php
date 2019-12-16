<?php
include("../../config.php");

if(isset($_POST['name']) && isset($_POST['username'])) {
	$name = $_POST['name'];
	$username = $_POST['username'];
	$date = date("Y-m-d");

	$query = mysqli_query($con, "INSERT INTO playlists(name,owner,dateCreated) VALUES('$name', '$username', '$date')");
	$id1 = mysqli_query($con, "SELECT id FROM playlists WHERE name='$name'");
	$row = mysqli_fetch_array($id1);
	$order1 = $row['id'];	//$array = array();
//
	//		while($row = mysqli_fetch_array($id1)) {
	//			array_push($array, $row['id']);
	//		}

	$query2 = mysqli_query($con, "INSERT INTO playlistSongs(songid,playlistid,playlistOrder) VALUES(5, '$order1', 1)");

}
else {
	echo "Name or username parameters not passed into file";
}

?>