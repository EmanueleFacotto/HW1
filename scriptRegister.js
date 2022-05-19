function validazione(event)
{
var errorBox= document.getElementById("errorMessage");
  if( form.nome.value== "" || form.username.value =="" || form.pass1.value=="" || form.pass2.value=="" || form.mail.value=="" ) {
    errorBox.innerHTML= '<strong>Attenzione!</strong> Inserisci tutti i dati.' + "</div>"
    event.preventDefault();

  } else{
   
    if (form.pass1.value != form.pass2.value) {
      errorBox.innerHTML= '<strong>Attenzione Password!</strong>  Le password non coincidono!' + "</div>"
      event.preventDefault();

    }else{
    
    if (form.pass1.value.length < 8){
      errorBox.innerHTML= '<strong>Attenzione Password!</strong>  Utilizzare almeno 8 caratteri' + "</div>"
      event.preventDefault();
    } else{
      if (form.pass1.value.length > 15){
        errorBox.innerHTML= '<strong>Attenzione Password!</strong>  Utilizzare una password con caratteri<15' + "</div>"
        event.preventDefault();
      } else{
       
        if ((form.pass1.value.match(/[A-Z]/)) && (form.pass1.value.match(/[a-z]/)) && (form.pass1.value.match(/[0-9]/))) {
          return true;
          }
          else {
            errorBox.innerHTML= '<strong>Attenzione Password!</strong> Usa almeno un carattere maiuscolo, uno minuscolo e una cifra' + "</div>"
            event.preventDefault();

          }
          }
         
      }

    }
  }
  }

const form = document.forms['register'];
form.addEventListener('submit', validazione);

