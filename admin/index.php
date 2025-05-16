<?php

if(isset($_GET["page"])){
    if($_GET["page"]=="menu"){ 
        include("./src/view/page/admin_menu.php");}
    else if($_GET["page"]=="resa"){ 
        include("./src/view/page/admin_resa.php");}
    else if($_GET["page"]=="texte"){ 
        include("./src/view/page/admin_texte.php");}
}
else{
    include("./src/view/page/admin_log.php");}


?>