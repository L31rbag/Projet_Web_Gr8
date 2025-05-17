const NB_CHAISE_MAX = 40;

const VIDE = '.';
const CHAISE = 'x';
/*
'.' = vide
'nb' = table
'x' = chaise
*/

const GAUCHE = 0;
const DROITE = 1;
const HAUT = 2;
const BAS = 3;

/** renvoie une matrice nbLignes x NbColonnes */
function creerMatrice(nbLignes, nbColonnes) {
  const matrice = [];

  for (let i = 0; i < nbLignes; i++) {
    const ligne = [];

    for (let j = 0; j < nbColonnes; j++) {
      ligne.push(VIDE); // Valeur par défaut, ici 0
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

      // Vérifie que la position est dans la matrice
      if (xi >= 0 && xi < nbColonnes && yj >= 0 && yj < nbLignes) {
        if (matrice[yj][xi] !== VIDE) {
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
function estPosable(matrice, liste_tables){
  let res = true;
  for (let i = 0; i < liste_tables.length; i++){
    let x = liste_tables[i][0];
    let y = liste_tables[i][1];
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
  if (x_table > 0 && matrice[y_table][x_table - 1] === VIDE) {
    res[GAUCHE] = true;
  }

  // droite
  if (x_table < nbColonnes - 1 && matrice[y_table][x_table + 1] === VIDE) {
    res[DROITE] = true;
  }

  // haut
  if (y_table > 0 && matrice[y_table - 1][x_table] === VIDE) {
    res[HAUT] = true;
  }

  // bas
  if (y_table < nbLignes - 1 && matrice[y_table + 1][x_table] === VIDE) {
    res[BAS] = true;
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
function ajouteUneChaise(matrice, coo_tables) {
  let est_ajoute = false;
  let ind_table = 0;

  while (!est_ajoute && ind_table < coo_tables.length) {
    let x_table = coo_tables[ind_table][0];
    let y_table = coo_tables[ind_table][1];
    let place_autour_table = espaceChaiseAutourTable(matrice, x_table, y_table);

    if (auMoinsUnePlace(place_autour_table)) {
      if (place_autour_table[GAUCHE]) {
        matrice[y_table][x_table - 1] = CHAISE;
      } else if (place_autour_table[DROITE]) {
        matrice[y_table][x_table + 1] = CHAISE;
      } else if (place_autour_table[HAUT]) {
        matrice[y_table - 1][x_table] = CHAISE;
      } else if (place_autour_table[BAS]) {
        matrice[y_table + 1][x_table] = CHAISE;
      }
      est_ajoute = true;
    } else {
      ind_table++;
    }
  }

  return matrice;
}


/** Place les tables et les chaises pour une réservation */
function placeTablesChaises(matrice, coo_tables, nb_personnes, id){
  for(let i=0; i< coo_tables.length; i++){
    let x = coo_tables[i][0];
    let y = coo_tables[i][1];
    matrice[y][x] = id;
  }

  let cpt = nb_personnes
  while(cpt != 0){
    matrice = ajouteUneChaise(matrice, coo_tables);
    cpt--;
  }
  return matrice
}

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

    let mat = creerMatrice(12,12);
    for (let i = 0; i < data_reservation.length; i++){
        let id = data_reservation[i]["id"]
        let nb_pers = data_reservation[i]["nb_pers"]
        mat = ajouteGroupe(mat, id, nb_pers);
    }
    return mat;
}



// $.ajax({
//   url: 'data.php',
//   success: function(data) {
//     var name = data.name;
//     var age = data.age;
//     var city = data.city;
//     console.log(name, age, city);
//   }
// });
