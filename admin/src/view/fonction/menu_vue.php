<?php
/* 
 * VUE: Composants de l'interface graphique.
 */

function which_type($type){
	$html = "\t\t<td>";
	if($type == 1){
		$html.= "Entrée";
	}
	else if($type == 2){
		$html.= "Plat";
	}
	else{
		$html.= "Dessert";
	}
	$html.= "</td>\n";
	return $html;
}

/** 
 * Tableau des menu
 */
function html_table_menu($menus){
	$html="<table>\n" ; 

	$html.="<thead>\n";
    $html.="<tr>\n";

    $html.="<th>Nom</th>\n"; 
    $html.="<th>Igredients</th>\n"; 
    $html.="<th>Prix</th>\n"; 
	$html.="<th>Type</th>\n"; 
	$html.="<th>Modifier</th>\n"; 
    $html.="<th>Supprimer</th>\n"; 

    $html.="</tr>\n";
    $html.="</thead>\n";

	//creation des lignes 
	foreach($menus as $menu){
		$html.=html_tr_menu($menu) ; 	
	}

	$html.="</table>\n" ; 
	return $html ; 
}

/**
 * Ligne du tableau: menu
 */
function html_tr_menu($menu){
	$html="\t<tr>\n" ; 
	
	$id 	= $menu["id"] ; 
    $nom 	= $menu["nom"] ; 
    $descr 	= $menu["description"] ; 
    $prix 	= $menu["prix"] ; 
    $type 	= $menu["type"] ; 

	//$html.="\t\t<td>$id</td>\n" ;
    $html.="<td>$nom</td>\n" ;
    $html.="\t\t<td>$descr</td>\n" ;
    $html.="\t\t<td>$prix €</td>\n" ;
    $html.=which_type($type);

	$a_update=html_a_update_menu($id) ; 
	$html.="\t\t<td>$a_update</td>\n" ;
	
	$a_delete=html_a_delete_menu($id) ; 
	$html.="\t\t<td>$a_delete</td>\n" ;
	
	$html.="\t</tr>\n" ; 
	return $html ;
}

/**
 * Lien de suppression
 */
function html_a_delete_menu($id){
	$href="index.php?page=menu&action=delete&table=menu&id=$id" ; 
	$html="<a href='$href' ><img src='admin/img/trash_bin.png' width='30px'></a>" ;
       	return $html ; 	
}

/**
 * Lien de maj
 */
function html_a_update_menu($id){
	$href="index.php?page=menu&action=update&table=menu&id=$id" ; 
	$html="<a href='$href' ><img src='admin/img/modif_icon.png' width='30px'></a>" ;
       	return $html ; 	
}

/*
 * Formulaire de maj d'un menu
 */
function html_form_maj($menu){
	$id 	= $menu["id"] ; 
    $nom 	= $menu["nom"] ;
    $descr 	= $menu["description"] ; 
    $prix 	= $menu["prix"] ; 
    $type 	= $menu["type"] ; 

	
	$html="<form action='index.php?page=menu' method='POST'>\n" ; 
	$html.="<label for='texte'>Nom</label>\n" ;
    $html.="\t<input type='text' name='nom' value='$nom'>\n" ;
    $html.="<label for='texte'>Description</label>\n" ;
    $html.="\t<input type='text' name='description' value='$descr'>\n" ;
    $html.="<label for='texte'>Prix</label>\n" ; 
    $html.="\t<input type='text' name='prix' value='$prix'>\n" ; 
    $html.="<label for='texte'>Type</label>\n" ;
    $html.="\t<input type='text' name='type' value='$type'>\n" ; 
	$html.="\t<input type='hidden' name='id' value='$id'>\n" ; 
	$html.="\t<input type='hidden' name='action' value='update'>\n" ; 
	$html.="\t<input type='submit'>\n" ; 
	$html.="</form>\n";

	return $html ; 
}

/**
 * Formulaire de creation d'un plat
 */
function html_form_create(){
	
	$html="<form action='index.php?page=menu' method='POST'>\n" ; 
	$html.="<label for='texte'>Nom</label>\n" ;
    $html.="\t<input type='text' name='nom' >\n" ;
    $html.="<label for='texte'>Description</label>\n" ;
    $html.="\t<input type='text' name='description'>\n" ;
    $html.="<label for='texte'>Prix</label>\n" ;
    $html.="\t<input type='text' name='prix'>\n" ;
    $html.="<label for='texte'>Type</label>\n" ;
	$html.="\t<input type='text' name='type'>\n" ;
	$html.="\t<input type='hidden' name='action' value='create'>\n" ; 
	$html.="\t<input type='hidden' name='id'>\n" ; 
	$html.="\t<input type='submit'>\n" ; 
	$html.="</form>\n";

	return $html ; 
}
?>
