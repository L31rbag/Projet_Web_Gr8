<?php
/* 
 * VUE: Composants de l'interface graphique.
 */

 //Permet d'écrire dans le code html soir ou midi selon le service passé en paramètre 
function which_service($serv){
    $html = "\t\t<td>";
    if($serv == 0){
        $html.= "Midi";
    }
    else{
        $html.= "Soir";
    }
    $html .= "</td>\n";
    return $html;
}

/** 
 * Tableau des resa
 */
function html_table_resa($resas){
    $html="<table id='t_res'>\n"; 
    
    $html.="<thead>\n";
    $html.="<tr>\n";

    $html.="<th>Nom</th>\n"; 
    $html.="<th>Téléphone</th>\n"; 
    $html.="<th>Mail</th>\n";
    $html.="<th>Nb Personne</th>\n"; 
    $html.="<th>Date</th>\n"; 
    $html.="<th>Heure du service</th>\n";
    $html.="<th>Note</th>\n"; 
    $html.="<th>Modifier</th>\n"; 
    $html.="<th>Supprimer</th>\n"; 

    $html.="</tr>\n";
    $html.="</thead>\n";

	//creation des lignes 
	foreach($resas as $resa){
		$html.=html_tr_resa($resa) ; 	
	}

	$html.="</table>\n" ; 
	return $html ; 
}

/**
 * Ligne du tableau: resa
 */
function html_tr_resa($resa){
	$html="\t<tr>\n" ; 
	
	$id = $resa["id"] ; 
    $nom = $resa["nom"] ; 
    $tel = $resa["telephone"];
    $mail = $resa["email"];
    $nbPers = $resa["nbPersonne"];
    $date = $resa["date"];
    $serv = $resa["service"];
    $note = $resa["message"];


	//$html.="\t\t<td>$id</td>\n" ;
    $html.="\t\t<td>$nom</td>\n" ;
    $html.="\t\t<td>$tel</td>\n" ;
    $html.="\t\t<td>$mail</td>\n" ;
    $html.="\t\t<td>$nbPers</td>\n" ;
    $html.="\t\t<td>$date</td>\n" ;
    //$html.="\t\t<td>"which_service($serv)"</td>\n" ;
    $html.= which_service($serv);
    $html.="\t\t<td>$note</td>\n" ;

	$a_update=html_a_update_resa($id,$date) ; 
	$html.="\t\t<td>$a_update</td>\n" ;
	
	$a_delete=html_a_delete_resa($id,$date) ; 
	$html.="\t\t<td>$a_delete</td>\n" ;
	
	$html.="\t</tr>\n" ; 
	return $html ;
}

/**
 * Lien de suppression
 */
function html_a_delete_resa($id,$date){
	$href="index.php?page=resa&action=delete&table=resa&id=$id&date=$date" ; 
	$html="<a href='$href' ><img src='./img/trash_bin.png' width='30px'></a>" ;
       	return $html ; 	
}

/**
 * Lien de maj
 */
function html_a_update_resa($id,$date){
	$href="index.php?page=resa&action=update&table=resa&id=$id&date=$date" ; 
	$html="<a href='$href' ><img src='./img/modif_icon.png' width='30px'></a>" ;
       	return $html ; 	
}

/*
 * Formulaire de maj d'une resa
 */
function html_form_maj($resa){
	$id = $resa["id"] ; 
    $nom = $resa["nom"] ; 
    $tel = $resa["telephone"];
    $mail = $resa["email"];
    $nbPers = $resa["nbPersonne"];
    $date = $resa["date"];
    $serv = $resa["service"];
    $note = $resa["message"]; 


    $html="<form action='index.php?page=resa' method='POST'>\n" ; 
    
    $html.="<label for='nom'>Nom</label>\n" ;
    $html.="\t<input type='text' name='nom' value='$nom'>\n" ;

    $html.="<label for='tel'>Téléphone</label>\n" ;
    $html.="\t<input type='number' name='telephone' value='$tel'>\n" ;

    $html.="<label for='mail'>Email</label>\n" ; 
    $html.="\t<input type='email' name='email' value='$mail'>\n" ; 

    $html.="<label for='nbPers'>Nb Personne</label>\n" ;
    $html.="\t<input type='number' name='nbPersonne' value='$nbPers'>\n" ; 

    $html.="<label for='date'>Date</label>\n" ;
    $html.="\t<input type='date' name='date' value='$date'>\n" ;

    $html.="<label for='serv'>Service</label>\n" ;
    $html.="\t<input type='number' name='service' value='$serv'>\n" ;

    $html.="<label for='message'>Note</label>\n" ;
    $html.="\t<input type='text' name='message' value='$note'>\n" ;

	$html.="\t<input type='hidden' name='id' value='$id'>\n" ; 
	$html.="\t<input type='hidden' name='action' value='update'>\n" ; 
	$html.="\t<input type='submit' value='Modifier'>\n" ; 
	$html.="</form>\n";

	return $html ; 
}

/**
 * Formulaire de creation d'un resarvation
 */
function html_form_create(){
	
    $html="<form action='index.php?page=resa' method='POST'>\n" ; 
    
	$html.="<label for='texte'>Nom</label>\n" ;
    $html.="\t<input type='text' name='nom' required>\n" ;

    $html.="<label for='texte'>Téléphone</label>\n" ;
    $html.="\t<input type='number' name='telephone' required>\n" ;

    $html.="<label for='texte'>Email</label>\n" ; 
    $html.="\t<input type='email' name='email' required>\n" ; 

    $html.="<label for='texte'>Nb Personne</label>\n" ;
    $html.="\t<input type='number' min='1' max='8' name='nbPersonne' value='1' required>\n" ; 

    $html.="<label for='texte'>Date</label>\n" ;
    $html.="\t<input type='date' name='date'>\n" ;

    $html.="<label for='texte'>Service</label>\n" ;
    $html.="\t<input type='number' min='0' max='1' name='service' value='0' required>\n" ;

    $html.="<label for='texte'>Note</label>\n" ;
    $html.="\t<input type='text' name='message' value='Aucun' required>\n" ;
    
	$html.="\t<input type='hidden' name='action' value='create' required>\n" ; 
    $html.="\t<input type='hidden' name='id'>\n" ; 
    
	$html.="\t<input type='submit'>\n" ; 
	$html.="</form>\n";

	return $html ; 
}
?>
