<?php
require_once("MobileRestHandler.php");

$view = "";
if(isset($_GET["view"]))
    $view = $_GET["view"];
/*
controls the RESTful services
URL mapping
*/
switch($view){

    case "all":
        // to handle REST Url /clientes/list/
        $mobileRestHandler = new MobileRestHandler();
        $mobileRestHandler->getClientes();
        break;

    case "nome":
        $mobileRestHandler = new MobileRestHandler();
        $mobileRestHandler->getListClientes();
        break;

    case "single":
        // to handle REST Url /mobile/show/<id>/
        $mobileRestHandler = new MobileRestHandler();
        $mobileRestHandler->getMobile($_GET["id"]);
        break;

    case "" :
        //404 - not found;
        echo "deu merda";
        break;
}
?>
