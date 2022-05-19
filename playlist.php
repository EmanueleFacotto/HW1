<?php

if(!isset($_COOKIE['username'])){
header("Location: index.php");
}
?>
<html>
  <head>
    <meta charset = 'utf-8'>
	<link rel = 'stylesheet' href = 'styleChat.css'/>
	<script src='scriptPlaylist.js' defer></script>
   <title>Home</title>
  </head>
  <body>
  <div id = "flex-container">

  <form action="logout.php" class="flex-item" id = 'link' >
		<button class="flex-item" id = 'link' href = 'logout.php'>Logout</button>
</form>
    <form action="home.php" class="flex-item" id = 'link' >
        <button class="flex-item" id = 'link' href = 'home.php'>Home</button> </form>
        <button class="apriPlaylist flex-item " id = 'linkPlaylist'   >Richiedi Playlist</button> 
</div>

</form>
	<section class="Playlist ">
	<div class="song"  ></div>
	</section>

  </body>
</html>
