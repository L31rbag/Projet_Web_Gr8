const NB_CHAISE_MAX = 40;

const LIBRE = '.';
const OCCUPE = '/';
const CHAISE = 'c';
const TABLE = 't' ;
/*
'.' = vide
'nb' = table
'x' = chaise
*/

const GAUCHE = 0;
const DROITE = 1;
const HAUT = 2;
const BAS = 3;

const TAILLE_MATRICE = 15;

/** renvoie une matrice nbLignes x NbColonnes */
function creerMatrice(nbLignes, nbColonnes) {
  const matrice = [];

  for (let i = 0; i < nbLignes; i++) {
    const ligne = [];

    for (let j = 0; j < nbColonnes; j++) {
      ligne.push(LIBRE); // Valeur par défaut, ici 0
    }

    matrice.push(ligne);
  }

  return matrice;
}

/** affiche une matrice dans la console */
function afficheMatrice(matrice) {
  const nbLignes = matrice.length;
  const nbColonnes = matrice[0].length;

  for (let i = 0; i < nbLignes; i++) {
    let ligneStr = '|';

    for (let j = 0; j < nbColonnes; j++) {
      ligneStr += ` ${matrice[i][j]} |`;
    }

    console.log(ligneStr);

    // Ajouter une ligne de séparation sauf après la dernière ligne
    if (i < nbLignes - 1) {
      let separation = '';
      for (let j = 0; j < nbColonnes; j++) {
        separation += '____'; // ou ajuster selon la largeur souhaitée
      }
      console.log(separation);
    }
  }
}



/** teste si il y a l'espace pour poser une table */
function estLibreEspaceTable(matrice, x ,y){
  const nbLignes = matrice.length;
  const nbColonnes = matrice[0].length;


  for (let i = -1; i <= 1; i++) {
    for (let j = -1; j <= 1; j++) {
      const xi = x + i;
      const yj = y + j;

      // Vérifie que la position n'est hors de la matrice
      if (xi >= 0 && xi < nbColonnes && yj >= 0 && yj < nbLignes) {
        //verifie que le point est bien libre
        if (matrice[yj][xi] != LIBRE) {
          return false;
        }
      }else{
        return false;
      }
    }
  }

  return true;
}

/** teste si il y a la place pour poser des tables pour un groupe */
function estPosable(matrice, tables){
  let res = true;
  for (let i = 0; i < tables.length; i++){
    let x = tables[i][0];
    let y = tables[i][1];
    res = res && (estLibreEspaceTable(matrice,x,y));
  }

  return res;
}

/** renvoie le nomble de tables nécessaires pour un groupe */
function nbTables(nb_pers){
  let res = -1;
  if(nb_pers <= 4){
    res = 1;
  }else if(nb_pers <= 6){
    res = 2;
  }else if(nb_pers <= 8){
    res = 4;
  }
  return res;
}

/**renvoie une liste d'arrangement de coordonnées possible pour placer un groupe de personnes */
function arrangementTablePossibles(nb_pers, x_start, y_start){
  let nb_t = nbTables(nb_pers);
  let res = [];
  if(nb_t == 1){
    res.push([[x_start, y_start]]);
  }else if (nb_t == 2){
    res.push([
      [x_start, y_start], 
      [x_start+1, y_start]
    ]);

    res.push([
      [x_start, y_start], 
      [x_start, y_start+1]
    ])
  }else{
    res.push([
      [x_start, y_start],
      [x_start+1, y_start],
      [x_start+1, y_start+1],
      [x_start, y_start+1]
    ]);
  }
  return res;
}

/** renvoie un tableau représentant l'espace disponible autour d'une table */
function espaceChaiseAutourTable(matrice, x_table, y_table){
  const nbLignes = matrice.length;
  const nbColonnes = matrice[0].length;
  let res = [false, false, false, false];

  // gauche
  if (x_table > 0){
    let car = matrice[y_table][x_table - 1];
    if (car == LIBRE || car == OCCUPE ) {
      res[GAUCHE] = true;
    }
  } 

  // droite
  if (x_table < nbColonnes-1){
    let car = matrice[y_table][x_table + 1];
    if (car == LIBRE || car == OCCUPE ) {
      res[DROITE] = true;
    }
  }

  // haut
  if (y_table > 0){
    let car = matrice[y_table - 1][x_table];
    if (car == LIBRE || car == OCCUPE ) {
      res[HAUT] = true;
    }
  }

  // bas
  if (y_table < nbLignes - 1){
    let car = matrice[y_table + 1][x_table];
    if (car == LIBRE || car == OCCUPE ) {
      res[BAS] = true;
    }
  }

  return res;
}


/** teste si il y a au moins un espace pour poser une chaise sur une table */
function auMoinsUnePlace(espace_autour_table){
  return (espace_autour_table[GAUCHE] 
    || espace_autour_table[DROITE]
    || espace_autour_table[HAUT]
    || espace_autour_table[BAS]);
}

/** ajoute une chaise sur une table en renvoyant le plan du restaurant*/
function ajouteUneChaise(matrice, coo_tables, id) {
  let est_ajoute = false;
  let ind_table = 0;
  const chaise_id = CHAISE.concat(id);

  while (!est_ajoute && ind_table < coo_tables.length) {
    let x_table = coo_tables[ind_table][0];
    let y_table = coo_tables[ind_table][1];
    let place_autour_table = espaceChaiseAutourTable(matrice, x_table, y_table);

    if (auMoinsUnePlace(place_autour_table)) {
      if (place_autour_table[GAUCHE]) {
        matrice[y_table][x_table - 1] = chaise_id;
      } else if (place_autour_table[DROITE]) {
        matrice[y_table][x_table + 1] = chaise_id;
      } else if (place_autour_table[HAUT]) {
        matrice[y_table - 1][x_table] = chaise_id;
      } else if (place_autour_table[BAS]) {
        matrice[y_table + 1][x_table] = chaise_id;
      }
      est_ajoute = true;
    } else {
      ind_table++;
    }
  }

  return matrice;
}

/** rend le tour de la table innoccupable */
function occupeAutourTable(matrice, table){
  const nbLignes = matrice.length;
  const nbColonnes = matrice[0].length;
  let x = table[0];
  let y = table[1];


  for (let i = -1; i <= 1; i++) {
    for (let j = -1; j <= 1; j++) {
      const xi = x + i;
      const yj = y + j;

      // Vérifie que la position est dans la matrice
      if (xi >= 0 && xi < nbColonnes && yj >= 0 && yj < nbLignes) {
        if (!(i == 0 && j == 0) && matrice[yj][xi] == LIBRE) {
          matrice[yj][xi] = OCCUPE;
        }
      }
    }
  }

  return matrice;
}


/** Place les tables et les chaises pour une réservation */
function placeTablesChaises(matrice, coo_tables, nb_personnes, id){
  //TABLES
  coo_tables.forEach( table => {
    let x = table[0];
    let y = table[1];
    matrice[y][x] = TABLE.concat(id);
    matrice = occupeAutourTable(matrice,table); 
  })

  //CHAISES
  let cpt = nb_personnes
  while(cpt != 0){
    matrice = ajouteUneChaise(matrice, coo_tables, id);
    cpt--;
  }
  return matrice
}

/** rajoute un groupe de gens dans un plan de table et le renvoi */
function ajouteGroupe(matrice, id, nb_personnes){
    const nbLignes = matrice.length;
    const nbColonnes = matrice[0].length;
    let x = 0, y = 0;
    let placement_choisi = [];

    while(x < nbLignes && placement_choisi.length == 0){
      y = 0;
      while(y < nbColonnes && placement_choisi.length == 0){
        let possibilites = arrangementTablePossibles(nb_personnes, x, y);
        for (let id = 0; id < possibilites.length; id++){
          if( estPosable(matrice, possibilites[id])){
            placement_choisi = possibilites[id];
            break;
          }
        }
        y++;
      }
      x++;
    }

    matrice = placeTablesChaises(matrice, placement_choisi, nb_personnes, id);
    return matrice;
}


/*  le parse a été fait  en amont */
function range(data_reservation /* id: str, nb_pers:int */){

    let mat = creerMatrice(TAILLE_MATRICE,TAILLE_MATRICE);

    data_reservation.forEach((element) =>{
      let id = element["id"];
      let nb_pers = element["nb_pers"];
      mat = ajouteGroupe(mat, id, nb_pers);
    });
    return mat;
}

/** creer une nouvelle balise sur un conteneur */
function create(tag, container, text=null) {
    const element = document.createElement(tag)
    if (text)
        element.innerText = text
    container.appendChild(element)
    return element
}

let service = 1;
const divRestaurant = document.querySelector("#restaurant");
divRestaurant.addEventListener("click", change_plan);

/** change la selection entre midi et soir pour le plan */
function change_service(service){
  if(service==0){
    service = 1;
  }
  else{
    service = 0;
  }
  return service;
}

/** chaines correspondant au service  */
function quel_service(service){
  let res ="";
  if(service==0){
    res="Midi";
  }
  else{
    res="Soir";
  }
  return res;
}

/** affiche le plan sur le site */
function afficher_plan(mat,service) {
    let text = create("p", divRestaurant,quel_service(service));
    text.id = "texte_service";

    let divMatrice = create("div", divRestaurant)
    divMatrice.id = 'matrice';
    
    let matTable = create("table", divMatrice)
    matTable.id = 'mat_table'

    for (let i = 0; i < TAILLE_MATRICE; i++) {

        let tr = create("tr", matTable)
        tr.id = i.toString()

        for (let y = 0; y < TAILLE_MATRICE; y++) {
            let td = create("td", tr, mat[i][y])
            td.id = i.toString() + "," + y.toString()

            if (mat[i][y].charAt(0) == CHAISE) {
                td.classList.add("chaise");

            } else if (mat[i][y] == LIBRE || mat[i][y] == OCCUPE ) { 
                td.classList.add("vide");

            } else {
                td.classList.add("table")
            }

        }
    }

}

/** collecte les données des réservations pour le plan de table */
async function appel_reservations(service){ //fonction asynchrone renvoyant une promesse
  const response = await axios.get("./src/model/resa_mat_crud.php");
  let liste_resa = [];
  let id_table = 1; //ID de la table qui sera affiché sur le plan pour partir de 1 à n
  response.data.forEach( res => {
    if(res["date"]==jour && res["service"]==service){ // récupére ceux dont le service est pour le midi/soir sur le jour chargé sur la page
    let elem = {"id" : id_table.toString(), 
      "nb_pers" : parseInt(res["nbPersonne"]), 
      "nom" : res["nom"]};
    liste_resa.push(elem);
    id_table++;
    }
  })
  return liste_resa;
}

function clean_matrice(){ // on supprime l'affichage actuel 
  if(document.querySelector("#matrice")){
      let mat = document.querySelector("#matrice");
      mat.remove();}
}

function clean_text_service(){
  if(document.querySelector("#texte_service")){
    let p = document.querySelector("#texte_service");
      p.remove();}
}

/** actualisation de l'affichage du plan sur le site */
async function change_plan(){ //pour remplacer la matrice affiché par une autre
  service = change_service(service);
  const data = await appel_reservations(service); ///Met en pause l'exécution de la fonction jusqu'à ce que la promesse soit résolue
  const plan = range(data);
  clean_matrice();
  clean_text_service();
  afficher_plan(plan,service);
};


change_plan(); //appel par défaut