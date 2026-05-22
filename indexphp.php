<!DOCTYPE html>
<html lang="it">
<head>
  
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/png" href="favicon.png">
  <link rel="stylesheet" href="style2.css">
<meta charset="UTF-8">
<title>ABG UPL</title>
<link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
</head>




<body>
   


  <div class="cards"> 
  <div class="card"> 
	  	 <div class="selettore">

<input type="text" id="auto1" placeholder="Cerca auto..." onfocus="pulisciSeVuoto(this)" oninput="filtra('auto1','list1')" autocomplete="off">

 <button type="button" class="lens" onclick="toggleLista('list1')" event.preventDefault()">⌕</button>


  <div class="dropdown" id="list1"></div>
</div>

<div class="img-box">
  <img id="logo1" src="foto auto/logo.jpg">
  <img id="img1" style="display:none;">
</div>
    <h2 id="nome1">Seleziona Auto</h2>



    <h3>Caratteristiche</h3>
    <ul>
      <li id="c1a"></li>
      <li id="c2a"></li>
      <li id="c3a"></li>
      <li id="c4a"></li>
    </ul>

    <h3>Vantaggi</h3>
    <ul>
      <li id="v1a"></li>
      <li id="v2a"></li>
      <li id="v3a"></li>
      <li id="v4a"></li>
    </ul>
  </div>



  <div class="card">
		 <div class="selettore">
<input type="text" id="auto2" placeholder="Cerca auto..." onfocus="pulisciSeVuoto(this)" oninput="filtra('auto2','list2')" autocomplete="off">

 <button type="button" class="lens" onclick="toggleLista('list2')" event.preventDefault()">⌕</button>


  <div class="dropdown" id="list2"></div>
</div>


  <div class="img-box">
  <img id="logo2" src="foto auto/logo.jpg">
  <img id="img2" style="display:none;">
</div>


    <h2 id="nome2">Seleziona Auto</h2>


    <h3 data-translate>Caratteristiche</h3>
    <ul>
      <li data-translate id="c1b"></li>
      <li data-translate id="c2b"></li>
      <li data-translate id="c3b"></li>
      <li data-translate id="c4b"></li>
    </ul>

    <h3 data-translate>Vantaggi</h3>
    <ul>
      <li data-translate id="v1b"></li>
      <li data-translate id="v2b"></li>
      <li data-translate id="v3b"></li>
      <li data-translate id="v4b"></li>
    </ul>
  </div>
</div>

<script>

let lingua = "it";


<?php include 'auto.php'; ?>

// Popola menu
const s1 = document.getElementById("auto1");
const s2 = document.getElementById("auto2");


// Popola suggerimenti
for (let nome in auto) {
  lista1.innerHTML += `<option value="${nome}">`;
  lista2.innerHTML += `<option value="${nome}">`;
}

// Valori iniziali
s1.value = "Seleziona Auto";
s2.value = "Seleziona Auto";




function pulisciSeVuoto(el){
  el.value = "";
}








function renderLista(id){
  const box = document.getElementById(id);
  box.innerHTML = "";

  for (let nome in auto){
    let div = document.createElement("div");
    div.innerText = nome;

    div.onclick = function(){
      if(id === "list1"){
        document.getElementById("auto1").value = nome;
      } else {
        document.getElementById("auto2").value = nome;
      }
      box.style.display = "none";
      aggiorna();
    };

    box.appendChild(div);
  }
}

function filtra(inputId, listId){
  const valore = document.getElementById(inputId).value.toLowerCase();
  const box = document.getElementById(listId);

  box.innerHTML = "";

  for (let nome in auto){
    if(nome.toLowerCase().includes(valore)){
      let div = document.createElement("div");
      div.innerText = nome;

      div.onclick = function(){
        document.getElementById(inputId).value = nome;
        box.style.display = "none";
        aggiorna();
      };

      box.appendChild(div);
    }
  }

  box.style.display = "block";
}



function toggleLista(id){
  const box = document.getElementById(id);
  box.style.display = box.style.display === "block" ? "none" : "block";
  if(box.style.display === "block") renderLista(id);
}








function aggiorna() {

  const a = auto[s1.value] || auto["Seleziona Auto"];
  const b = auto[s2.value] || auto["Seleziona Auto"];

const datiA = a[lingua] || a;
const datiB = b[lingua] || b;


  // =====================
  // CARD 1
  // =====================
  document.getElementById("nome1").innerText =
    s1.value || "Seleziona Auto";

document.getElementById("c1a").innerText = datiA.c1;
document.getElementById("c2a").innerText = datiA.c2;
document.getElementById("c3a").innerText = datiA.c3;
document.getElementById("c4a").innerText = datiA.c4;

document.getElementById("v1a").innerText = datiA.v1;
document.getElementById("v2a").innerText = datiA.v2;
document.getElementById("v3a").innerText = datiA.v3;
document.getElementById("v4a").innerText = datiA.v4;

  const logo1 = document.getElementById("logo1");
  const img1 = document.getElementById("img1");

  if (s1.value === "Seleziona Auto" || !auto[s1.value]) {
    logo1.style.display = "block";
    img1.style.display = "none";
  } else {
    logo1.style.display = "none";
    img1.src = a.img;
    img1.style.display = "block";
  }

  // =====================
  // CARD 2
  // =====================
  document.getElementById("nome2").innerText =
    s2.value || "Seleziona Auto";

  document.getElementById("c1b").innerText = datiB.c1;
document.getElementById("c2b").innerText = datiB.c2;
document.getElementById("c3b").innerText = datiB.c3;
document.getElementById("c4b").innerText = datiB.c4;

document.getElementById("v1b").innerText = datiB.v1;
document.getElementById("v2b").innerText = datiB.v2;
document.getElementById("v3b").innerText = datiB.v3;
document.getElementById("v4b").innerText = datiB.v4;

  const logo2 = document.getElementById("logo2");
  const img2 = document.getElementById("img2");

  if (s2.value === "Seleziona Auto" || !auto[s2.value]) {
    logo2.style.display = "block";
    img2.style.display = "none";
  } else {
    logo2.style.display = "none";
    img2.src = b.img;
    img2.style.display = "block";
  }
}




function cambiaLingua(lang){

  lingua = lang;

  aggiorna();
}
      

</script>


<div class="logo">

<button onclick="cambiaLingua('it')"><img alt="Italiano" id="bandiera" src="it.jpg"></button>
<button onclick="cambiaLingua('en')"><img alt="English" id="bandiera" src="uk.jpg"></button>
<button onclick="cambiaLingua('it')"><img alt="Française" id="bandiera" src="fr.jpg"></button>
<button onclick="cambiaLingua('en')"><img alt="Española" id="bandiera" src="sp.jpg"></button>

  <img src="foto auto/logo.jpg" alt="Logo">
</div> 

</body>
</html>
