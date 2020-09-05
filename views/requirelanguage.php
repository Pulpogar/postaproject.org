<?php

if (empty($_SESSION["language"])) {

    $lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
    $_SESSION["language"]=$lang;
    if ($lang!="es")
    {
     $_SESSION["language"]="it";   
    }
}
if (isset($_SESSION["language"]))
    
{
$lang=$_SESSION["language"]; 
}
switch ($lang){
    case "fr":
        //echo "PAGE FR";
        include("language/fr.php");//include check session FR
        break;
    case "it":
        //echo "PAGE IT";
        include("language/it.php");
        break;
    case "es":
        //echo "PAGE ES";
        include("language/es.php");
        break;
    case "en":
        //echo "PAGE EN";
        include("language/en.php");
        break;
    case "br":
        //echo "PAGE BR";
        include("language/br.php");
        break;        
    default:
        //echo "PAGE EN - Setting Default";
        include("language/es.php");//include EN in all other cases of different lang detection
        break;
}

?>