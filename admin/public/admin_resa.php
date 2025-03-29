<?php
include("../../db/db_connect.php");
include("../src/crud/admin_index_crud.php");

session_start();
if(!$_SESSION["admin"]){
    header("Location: admin_log.php");
  }

?>

<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Admin</title>
  <link rel="stylesheet" href="../style/style.css">
</head>

<header>
    <a href="./admin_texte.php">AdminTexte</a>
    <h1>Admin</h1>
    <img class="img_logo" src="../src/image/Ziravene_logo.jpg"/>
</header>

<body>
<div id="restaurant">

    <img class="img_restau" src="../src/image/restau.jpg"/>

</div>


<div id="barre">

</div>

<div id="rdv">
    
  <div id="tab">
    <ul>
      <li>
      Nom
      Téléphone
      Mail
      Nombre de personnes
      Date/Heure
      Nombre d'enfants
      Numéro de table
      Modifier
      Suprimer
      </li>
    </ul>

    <ul>
      <li v-for="res in ress">
        {{ res.nom }}
        {{ res.tel }}
        {{ res.mail }}
        {{ res.nb_pers }}
        {{ res.date }}
        {{ res.nb_enf }}
        {{ res.num_table }}
        <button class="Modifier" type="button">Modifier</button>
        <button class="Supprimer" type="button">Supprimer</button>
      </li>
    </ul>

  </div>

  <div id="input_tab">
      <p>Nom : </p>
      <input v-model="newRes.nom"/>
      <p>Telephone : </p>
      <input v-model="newRes.tel"/>
      <p>Mail : </p>
      <input v-model="newRes.mail"/>
      <p>Nombre de personnes : </p>
      <input v-model="newRes.nb_pers"/>
      <p>Date/Heure : </p>
      <input v-model="newRes.date"/>
      <p>Nombre d'enfants : </p>
      <input v-model="newRes.nb_enf"/>
      <p>Numero de table : </p>
      <input v-model="newRes.num_table"/>

      <button @click="add"> Ajouter </button>
  </div>

</div>
</body>


<script src="../src/js/script_index.js" defer></script>
<script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>

</html>