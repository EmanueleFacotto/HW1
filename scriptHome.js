
const form = document.forms['send'];
form.addEventListener('submit', checkMex);

function checkMex(event)
{
var errorBox= document.getElementById("errorMessage");

  if( form.mex.value == "" ) {
    errorBox.innerHTML= '<strong>Attenzione!</strong> Il campo messaggio non può essere vuoto' + "</div>";
    event.preventDefault();
  } 
}



function onJson(json) { 
	if(formSpotify.ricerca.value.length === 0) {
		alert("Non hai scritto niente");
	}
	console.log(json);
	result.innerHTML = "";
	let i=0;
	for(it of json.tracks.items) {
		if(i<13){
			const elemento = document.createElement("div");
			result.appendChild(elemento);
			const image = document.createElement("img");
			image.src = it.album.images["0"].url;
			const title = document.createElement("p");
			title.innerHTML = it.name;
		
			const artists = it.artists;
			const artis = document.createElement("p");
			for(t of artists) {    
				const artisti = t.name;
				artis.innerHTML = artis.innerHTML + " " + artisti;
			}
			const form1 = document.createElement("form");
				form1.name = "select";
				form1.method = "post";
				const add = document.createElement("button");

	     	    add.innerHTML = "Aggiungi";
			elemento.appendChild(title);
			elemento.appendChild(artis);
			elemento.appendChild(image);
			elemento.appendChild(form1);
     	    form1.appendChild(add);

			result.appendChild(elemento);
     	   
			elemento.addEventListener("click", aggiungiPlaylist);
	
			i++;
		}
	}
	
	
	
}	
function aggiungiPlaylist(event){
	event.preventDefault();
	
	const elemento = event.currentTarget;
	const button= elemento.querySelector("form");
	button.innerHTML="";
	const add= document.createElement("h1");
	add.innerHTML = "Aggiunto";
	add.classList.add("aggiunto");
	elemento.appendChild(add);


	let formdata = new FormData();
	formdata.append("titolo", elemento.childNodes[0].innerHTML);
	formdata.append("artista", elemento.childNodes[1].innerHTML);
	fetch("http://localhost/addSong.php",{method: "POST", body: formdata}); 
	console.log("c");
}
function onJsonResponse(response) {	

	return response.json();
}

function ricerca(event) { 
	let formData = new FormData();
    formData.append("textToSearch", formSpotify.ricerca.value);
    event.preventDefault();
	fetch("http://localhost/do_search.php",{method: "POST", body: formData}).then(onJsonResponse).then(onJson);
}

const searchform = document.forms["formSpotify"];
searchform.addEventListener("submit", ricerca);
const result = document.querySelector("#content");








