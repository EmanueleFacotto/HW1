<?php
if (isset($_POST['titolo'])  && isset($_POST['artista'])) {
  $user=$_COOKIE['username'];
  $titolo = $_POST['titolo'];
  $artista = $_POST['artista'];
  $connessione = mysqli_connect("localhost", "root", "", "hw1") or die("Errore: ".mysqli_connect_error());
  $queryPlaylist="DELETE FROM playlist WHERE  username='$user' and artista = '$artista' and titolo = '$titolo' " or die(mysql_error());
  $res = mysqli_query($connessione, $queryPlaylist);
  mysqli_free_result($res);
  mysqli_close($connessione);
}

?>