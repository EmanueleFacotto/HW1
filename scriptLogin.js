function validazione(event)
{
var errorBox= document.getElementById("errorMessage");
  if(form.username.value =="" || form.password.value=="" ) {
    errorBox.innerHTML= '<strong>Attenzione!</strong> Inserisci tutti i dati.' + "</div>"
    event.preventDefault();
  } 

}
// Riferimento al form
const form = document.forms['login'];

form.addEventListener('submit', validazione);

