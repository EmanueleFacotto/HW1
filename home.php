<?php

if(!isset($_COOKIE['username'])){
header("Location: index.php");
}
?>

<?php
if(isset($_POST['send'])){
$msg = $_POST['mex'] ;

$tempo=time();
$user=$_COOKIE['username'];
$conn = mysqli_connect("localhost", "root", "", "hw1") or die("Errore: ".mysqli_connect_error());
$queryChat="INSERT into chat (username,mex,data) VALUES ('$user','$msg','$tempo')" or die(mysql_error());
$result=mysqli_query($conn,$queryChat);


}


?>


<html>
  <head>
    <meta charset = 'utf-8'>
	<link rel = 'stylesheet' href = 'styleChat.css'/>
	<script src='scriptHome.js' defer></script>

   <title>Home</title>
  </head>
  <body>
	<div id = "flex-container">
		<form action="logout.php" class="flex-item" id = 'link' >
		<button class="flex-item" id = 'link' href = 'logout.php'>Logout</button>
</form>
<form action="playlist.php" class="flex-item" id = 'link' >
<button class="showPlaylist" id = 'linkPlaylist' href='playlist.php' >Apri Playlist</button> 
</form>

		<label id='link' class="flex-item" >   Benvenuto 
			<?php echo $_COOKIE['username'] ; ?> 
				</label>
	</div> 


	<form  name = 'formSpotify' method = 'post'>
		<input id = 'ricerca' type = 'text'  name = 'ricerca' placeholder = "Digita il nome di un artista, un gruppo o una canzone">
		<input id = 'linkRicerca' value = 'Ricerca'  type = 'submit'>
	</form>

	<section class="container">
	<div id = 'content'></div>

</section>
<section id="chatStyle">

<h1 id="#title"> CHAT </h1>	
<div id="visualizza_mex" > 
	<?php
	$connessione = mysqli_connect("localhost", "root", "", "hw1") or die("Errore: ".mysqli_connect_error());
	$queryRead="SELECT * FROM chat ORDER BY data DESC" or die(mysql_error());
	$sql=mysqli_query($connessione,$queryRead); 
	if($sql) {
		while ($row= mysqli_fetch_array($sql)){
			$ora= date("H:i", $row['data']);
			echo "<div id='user'> $row[username]  </div>";
			echo "<div id= 'msg'> $row[mex] </div>";
			echo "<div id='ora'> $ora </div>";
		}
	}


	?>
	</div>
<div id="invia_mex" >
<form action="" class="formsend" method="post" name="send">
	<textarea name='mex' id="mex" rows="3"></textArea>
    <input type='submit' id="invia"  value="send" name="send" />
	<label> <div id="errorMessage" ></div> </label>
    </form>

</div>
</section>

  
  <footer> Emanuele Facotto 1000026766 </footer>
</body>

</html>
