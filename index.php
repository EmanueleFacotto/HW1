
  <?php
 $avviso="";

 if(isset($_COOKIE["username"]))
 {
     header("Location: home.php");
     exit;
 }

if(isset($_POST['login'])){
    $username = $_POST['username'] ;
    $password = $_POST['password'] ;
    $conn = mysqli_connect("localhost", "root", "", "hw1") or die("Errore: ".mysqli_connect_error());
    $queryControl="SELECT username FROM utenti WHERE username ='$username'";
    $result=mysqli_query($conn,$queryControl); 
    if(mysqli_num_rows($result) > 0){
    $queryControlPass="SELECT username,password FROM utenti WHERE username ='$username'and password='$password'";
    $resultpass=mysqli_query($conn,$queryControlPass); 
    if(mysqli_num_rows($resultpass)  ==0){
    $errore="Password errata";
    }else {
         setcookie("username", $_POST["username"]);
         header("Location: home.php");
         exit;
    }
 }else {
     $errore="Username non trovato";
 }   
    }
    

?>
<html>
<head>
<title>Form-Login</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap">
<link rel="stylesheet" href="style.css"></head>
<script src='scriptLogin.js' defer></script>

<body>
<div id="login">
    <div id="titolologin"><label>Login</label></div>
 
            <form action="" class="formlogin" method="post" name="login">

    <label>Username:</label>
    <input type="text" name="username" class="testo" placeholder="Inserisci username" /><br>


    <label>Password:</label>
    <input type="password" name="password" class="testo" placeholder="Inserisci password" /><br>
    <label> <div id="errorMessage" ></div> </label>
    <label><?php echo $errore; ?> </label>
    <a href="register.php"><input type="button" class="button" id="register" name="Register" value="Register" /></a>


    <input type='submit' class="button" value="Login" name="login" />
    
</form>
</div>
</body>
</html>