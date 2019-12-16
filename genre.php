<?php include("includes/includedFiles.php"); 

if(isset($_GET['id'])) {
	$genreId = $_GET['id'];
}
else {
	header("Location: index.php");
}

$genre = new Genre($con, $genreId);

?>

<div class="entityInfo">

	<div class="leftSection">
		<img src="assets/images/genree/ukulele.jpg">
	</div>

	<div class="rightSection">
		<h2><?php echo $genre->getName(); ?></h2>
		<p role="link" tabindex="0" onclick="openPage('artist.php?id=<?php echo $genreId; ?>')">By <?php echo $genre->getName(); ?></p>
		

	</div>

</div>


<div class="tracklistContainer">
	<ul class="tracklist">
		
		<?php
		$songIdArray = $genre->getSongId();

		$i = 1;
		foreach($songIdArray as $songId) {

			$genreSong = new Song($con, $songId);
			$genreArtist = $genreSong->getArtist();

			echo "<li class='tracklistRow'>
					<div class='trackCount'>
						<img class='play' src='assets/images/icons/play-white.png' onclick='setTrack(\"" . $genreSong->getId() . "\", tempPlaylist, true)'>
						<span class='trackNumber'>$i</span>
					</div>


					<div class='trackInfo'>
						<span class='trackName'>" . $genreSong->getTitle() . "</span>
						
					</div>

					<div class='trackOptions'>
						<input type='hidden' class='songId' value='" . $genreSong->getId() . "'>
						<img class='optionsButton' src='assets/images/icons/more.png' onclick='showOptionsMenu(this)'>
					</div>

					<div class='trackDuration'>
						<span class='duration'>" . $genreSong->getDuration() . "</span>
					</div>


				</li>";

			$i = $i + 1;
		}

		?>

		<script>
			var tempSongIds = '<?php echo json_encode($songIdArray); ?>';
			tempPlaylist = JSON.parse(tempSongIds);
		</script>

	</ul>
</div>


<nav class="optionsMenu">
	<input type="hidden" class="songId">
	<?php echo Playlist::getPlaylistsDropdown($con, $userLoggedIn->getUsername()); ?>
</nav>







