<?php
/* 
 * VUE: Composants de l'interface graphique.
 */



/** 
 * Tableau des paragraphes
 */
function html_table_paragraphe($paragraphes){
	$html="<table>\n" ; 

	//creation des lignes 
	foreach($paragraphes as $paragraphe){
		$html.=html_tr_paragraphe($paragraphe) ; 	
	}

	$html.="</table>\n" ; 
	return $html ; 
}

/**
 * Ligne du tableau: paragraphe
 */
function html_tr_paragraphe($paragraphe){
	$html="\t<tr>\n" ; 
	
	$id 	= $paragraphe["id"] ; 
	$texte 	= $paragraphe["texte"] ; 


	// $html.="\t\t<td>$id</td>\n" ;
	$html.="\t\t<td>$texte</td>\n" ;

	$a_update=html_a_update_paragraphe($id) ; 
	$html.="\t\t<td>$a_update</td>\n" ;
	
	// $a_delete=html_a_delete_paragraphe($id) ; 
	// $html.="\t\t<td>$a_delete</td>\n" ;
	
	$html.="\t</tr>\n" ; 
	return $html ;
}

/**
 * Lien de suppression
 */
// function html_a_delete_paragraphe($id){
// 	$href="index.php?page=texte&action=delete&table=paragrapheMenu&id=$id" ; 
// 	$html="<a href='$href' ><img src='admin/img/trash_bin.png' width='30px'></a>" ;
//        	return $html ; 	
// }

/**
 * Lien de maj
 */
function html_a_update_paragraphe($id){
	$href="index.php?page=texte&action=update&table=paragrapheMenu&id=$id" ; 
	$html="<a href='$href' ><img src='admin/img/modif_icon.png' width='30px'></a>" ;
       	return $html ; 	
}

/*
 * Formulaire de maj d'un paragraphe
 */
function html_form_maj($paragraphe){
	$id 	= $paragraphe["id"] ; 
	$texte 	= $paragraphe["texte"] ; 

	
	$html="<form action='index.php?page=texte' method='POST'>\n" ; 
	$html.="<label for='texte'>Texte</label>\n" ;
	$html.="\t<input type='text' name='texte' value='$texte'>\n" ; 
	$html.="\t<input type='hidden' name='id' value='$id'>\n" ; 
	$html.="\t<input type='hidden' name='action' value='update'>\n" ; 
	$html.="\t<input type='submit'>\n" ; 
	$html.="</form>\n";

	return $html ; 
}

/**
 * Formulaire de creation d'un etudiant
 */
function html_form_create(){
	
	$html="<form action='index.php?page=texte' method='POST'>\n" ; 
	$html.="<label for='texte'>Texte</label>\n" ;
	$html.="\t<input type='text' name='texte' >\n" ; 
	$html.="\t<input type='hidden' name='action' value='create'>\n" ; 
	$html.="\t<input type='hidden' name='id'>\n" ; 
	$html.="\t<input type='submit'>\n" ; 
	$html.="</form>\n";

	return $html ; 
}
?>
