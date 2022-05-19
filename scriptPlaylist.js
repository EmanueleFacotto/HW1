
const pulsanteApri= document.querySelector('.apriPlaylist');
pulsanteApri.addEventListener('click', apri);

function onJsonPlaylist(json){
    const playlist= document.querySelector('.song');
    playlist.innerHTML='';

  for (row of json){
    
    const box= document.createElement("p");
    box.innerHTML='';
    const title = document.createElement("p");
    title.innerHTML = row.titolo;
		const artista = document.createElement("p");
		artista.innerHTML=row.artista;
    const rem = document.createElement("button");
    rem.innerHTML = "Rimuovi";
    box.appendChild(title);
    box.appendChild(artista);
    box.appendChild(rem);
    box.classList.add("border");
    playlist.appendChild(box);
    playlist.classList.add("songadd");
    box.addEventListener("click", rimuoviSong);

  }

}
function onJsonResponsePlaylist(response) {	
	return response.json();
}

function apri(){
    pulsanteApri.classList.add("hidden");
  fetch("http://localhost/getPlaylist.php").then(onJsonResponsePlaylist).then(onJsonPlaylist);
}





function rimuoviSong(event){
	event.preventDefault();
	const elemento = event.currentTarget;
	let formdata2 = new FormData();
	formdata2.append("titolo", elemento.childNodes[0].innerHTML);
	formdata2.append("artista", elemento.childNodes[1].innerHTML);
	fetch("http://localhost/removeSong.php",{method: "POST", body: formdata2});

    apri();
    apri();

}