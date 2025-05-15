var tables = {
    /* clef = places de la table, 
    valeur = quantité */
    2 : 20,
    4 : 10
}

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


function ajoute(nb_gen){

}

resto = creerMatrice(12, 12);
afficheMatrice(resto);