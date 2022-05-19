<?php 
            $avviso="";

        if(isset($_POST['invia_dati'])){
        $username = $_POST['username'];
        $nome = $_POST['nome'];
        $password= $_POST['pass1'];
        $mail= $_POST['mail'];
        $conn = mysqli_connect("localhost", "root", "", "hw1") or die("Errore: ".mysqli_connect_error());
        $queryControl="SELECT username FROM utenti WHERE username ='$username'";
        $result=mysqli_query($conn,$queryControl); 
        
       if(mysqli_num_rows($result) > 0){
     $avviso="Username già presente";    
    }
       else {
            $query= "INSERT into utenti (username,nome,password,email) VALUES ('$username',' $nome ', '$password',' $mail')";
            $res = mysqli_query($conn, $query)or die("Errore: ".mysqli_error($conn));;
           if($res) {
           sleep(2);    
          header("Location: index.php");
          exit;
           }
        }
        }

    ?>  

<html>
    <head>
        <title>Registrazione</title>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap">
        <link rel="stylesheet" href="style.css">
        <script src='scriptRegister.js' defer></script>

    </head>
    <body>
       
            
     
        <div id="containerRegister">
        <div id="titolologin"><label>Registrazione</label></div>

        <form action="" method="post" class="formregister" name='register'  >

        <p>  
        <label> Username:</label> <input type="text" class="testo" name="username" placeholder="Inserisci username" /> 
            </p>
            <p>
        <label> Nome e cognome :</label> <input type="text" class="testo" name="nome" placeholder="Inserisci nome completo" /> 
            </p>
            
        
            <p>  
        <label> Password: </label><input type="password" class="testo" name="pass1" placeholder="Inserisci password"/>
            </p><p>  
        <label> Ripeti password: </label><input type="password" class="testo" name="pass2" placeholder="Inserisci di nuovo la password"/>
            </p>
            <p>  
        <label> E-mail: </label><input type="text" class="testo" name="mail" placeholder="Inserisci e-mail"/>
            </p>
            <label> <div id="errorMessage"></div> </label>
            <p ><?php echo $avviso; ?></p>
            <label>&nbsp;<input type='submit' class='button' name= "invia_dati"> </label>

        </form>

     
            </div>      
    </body>
</html>