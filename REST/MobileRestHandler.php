
<?php
require_once('../config.php');

require_once(DBAPI);
require_once("SimpleRest.php");
require_once("Mobile.php");


class MobileRestHandler extends SimpleRest {

    function getClientes() {

        //RETORNA O SELECT DA TABALA 'GASTRONOMIA' EM FORMATO DE ARRAY;
        $result = Execute('gastronomia');
        if(empty($result)) {
            $statusCode = 404;
            $result = array('error' => 'Nenhum cliente encontrado!!');
        } else {
            $statusCode = 200;
        }

        //IMPRIME O CONTEUDO ANTES DA CONVERSAO
        echo print_r($result, true);

        //AQ ERA PARA IMPRIMIR O JSON NA TELA COM O RESULTADO CONVERTIDO.
        echo print_r(json_encode($result), true);

        $requestContentType = $_SERVER['HTTP_ACCEPT'];
        $this ->setHttpHeaders($requestContentType, $statusCode);

        if(strpos($requestContentType,'application/json') !== false){
            $response = $this->encodeJson($result);
            echo $response;
        } else if(strpos($requestContentType,'text/html') !== false){
            $response = $this->encodeHtml($result);
            echo $response;
        } else if(strpos($requestContentType,'application/xml') !== false){
            $response = $this->encodeXml($result);
            echo $response;
        }
    }

    public function encodeHtml($responseData) {

        $htmlResponse = "<table border='1'>";
        foreach($responseData as $key=>$value) {
            $htmlResponse .= "<tr><td>". $key. "</td><td>". $value. "</td></tr>";
        }
        $htmlResponse .= "</table>";
        return $htmlResponse;
    }

    public function encodeJson($responseData) {
        $jsonResponse = json_encode($responseData);
        return $jsonResponse;
    }

    public function encodeXml($responseData) {
        // creating object of SimpleXMLElement
        $xml = new SimpleXMLElement('<?xml version="1.0"?><mobile></mobile>');
        foreach($responseData as $key=>$value) {
            $xml->addChild($key, $value);
        }
        return $xml->asXML();
    }

    public function getMobile($id) {

        $mobile = new Mobile();
        $rawData = $mobile->getMobile($id);

        if(empty($rawData)) {
            $statusCode = 404;
            $rawData = array('error' => 'No mobiles found!');
        } else {
            $statusCode = 200;
        }
        //
        $requestContentType = $_SERVER['HTTP_ACCEPT'];
        $this ->setHttpHeaders($requestContentType, $statusCode);

        if(strpos($requestContentType,'application/json') !== false){
            $response = $this->encodeJson($rawData);
            echo $response;
        } else if(strpos($requestContentType,'text/html') !== false){
            $response = $this->encodeHtml($rawData);
            echo $response;
        } else if(strpos($requestContentType,'application/xml') !== false){
            $response = $this->encodeXml($rawData);
            echo $response;
        }
    }

    function sql2json($query) {
        $data_sql = mysqli_query($query) or die("'';//" . mysql_error());// If an error has occurred,
        //    make the error a js comment so that a javascript error will NOT be invoked
        $json_str = ""; //Init the JSON string.

        if($total = mysql_num_rows($data_sql)) { //See if there is anything in the query
            $json_str .= "[\n";

            $row_count = 0;
            while($data = mysqli_fetch_assoc($data_sql)) {
                if(count($data) > 1) $json_str .= "{\n";

                $count = 0;
                foreach($data as $key => $value) {
                    //If it is an associative array we want it in the format of "key":"value"
                    if(count($data) > 1) $json_str .= "\"$key\":\"$value\"";
                    else $json_str .= "\"$value\"";

                    //Make sure that the last item don't have a ',' (comma)
                    $count++;
                    if($count < count($data)) $json_str .= ",\n";
                }
                $row_count++;
                if(count($data) > 1) $json_str .= "}\n";

                //Make sure that the last item don't have a ',' (comma)
                if($row_count < $total) $json_str .= ",\n";
            }

            $json_str .= "]\n";
        }

        //Replace the '\n's - make it faster - but at the price of bad redability.
        $json_str = str_replace("\n","",$json_str); //Comment this out when you are debugging the script

        //Finally, output the data
        return $json_str;
    }
}
?>