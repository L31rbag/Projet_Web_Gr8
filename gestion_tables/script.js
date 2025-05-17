
function creerMatrice(nbLignes, nbColonnes) {
  const matrice = [];

  for (let i = 0; i < nbLignes; i++) {
    const ligne = [];

    for (let j = 0; j < nbColonnes; j++) {
      ligne.push("."); // Valeur par défaut, ici 0
    }

    matrice.push(ligne);
  }

  return matrice;
}

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

function nbTables(nb_pers){
    res = 0;
    if(nb_pers <= 4){
      res = 1;
    }else if(nb_pers <= 6){
      res = 2;
    }else{
      res = 3;
    }
    return res;
}


const VIDE = '.'
const CHAISE = 'x'
/*
'.' = vide
'nb' = table
'x' = chaise
*/

function estLibreAutour(matrice, x ,y){
    const nbLignes = matrice.length;
    const nbColonnes = matrice[0].length;
    let g = false, d = false, h = false, b = false;

    //gauche
    if (x > 0 && matrice[x-1][y] == VIDE){
      g = true
    }
    //droite
    if (x < nbColonnes-1 && matrice[x+1][y] == VIDE){
      d = true
    }
    //haut
    if (y > 0 && matrice[x][y-1] == VIDE){
      h = true
    }
    //bas
    if (y < nbLignes-1 && matrice[x][y+1] == VIDE){
      b = true
    }
    return (g && d && b && h);
}

function ajouteGroupe(matrice, id, nb_personnes){
    const nbLignes = matrice.length;
    const nbColonnes = matrice[0].length;
    nb_table = nbTables(nb_personnes);

    for (let i = 0; i < nbLignes; i++) {
        for (let j = 0; j < nbColonnes; j++) {
        
        }
    }
    return matrice
}


/*  le parse a été fait  en amont */
function range(data /* id, nom, nb_pers */){

    mat = creerMatrice(12,12);
    for (let i = 1; i < data.length; i++){
        let id = data[i]["id"]
        let nb_pers = data[i]["nb_pers"]
        mat = ajouteGroupe(mat, id, nb_pers);


    }
    return mat;
}
