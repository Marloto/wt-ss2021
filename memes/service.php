<?php
require("start.php");


function listMemes() {
    global $memes;
    $list = $memes->list();
    echo json_encode($list);
    http_response_code(200);
}

function getMeme($id) {
    global $memes;
    $entry = $memes->get($id);
    if(isset($entry)) {
        echo json_encode($entry);
        http_response_code(200);
    } else {
        http_response_code(404);
    }
}

function addMeme($data) {
    global $memes;
    $memes->add($data->memeUrl, $data->upperText, $data->lowerText);
    http_response_code(204);
}

function deleteMeme($id) {
    global $memes;
    if($memes->delete($id)) {
        http_response_code(204);
    } else {
        http_response_code(404);
    }
}

function updateMeme($id, $data) {
    global $memes;
    error_log("Data " . print_r($data, true));
    if($memes->update($id, $data->memeUrl, $data->upperText, $data->lowerText)) {
        http_response_code(204);
    } else {
        http_response_code(404);
    }
}

/*
 * Hilfsfunktionen
 */

// sollte ein Cross Origin Resource Sharing (CORS) request als OPTION call kommen,
// wird einfach alles erlaubt...
// ruft man einen fremden Server auf, so schickt der Browser einen OPTIONS request vorweg,
// um die Erlaubnis zu erlangen, den eigentlichen Aufruf durchzuführen
function handleCORS($requestType, $url, $body) {
    header("Access-Control-Allow-Origin: *");
}

// ungültige Anfrage
function badRequest($requestType, $url, $body) {
 	http_response_code(400);
    die('Ungültiger Request: '.$requestType.' '.$url.' '.$body);        
}

/*
 * Service Dispatcher: zerlegt die Anfrage und ruft die passende
 * Service-Implementierung auf
 */
$url = $_REQUEST['_url'];
$requestType = $_SERVER['REQUEST_METHOD'];
//$headers = getallheaders();
$body = file_get_contents('php://input'); 

try {
    handleCORS($requestType, $url, $body);
    $match = null;
    if ($requestType === "OPTIONS") { // CORS: OPTIONS request kommt vor eig. request
        http_response_code(200);
        header("Access-Control-Allow-Methods: GET, POST, DELETE, PUT, OPTIONS");
        header("Access-Control-Allow-Headers: Pragma, Cache-Control");
    } else if (preg_match("/.*?\/meme\/?$/", $url)) { // ist es /meme
        if ($requestType === 'GET') {
            listMemes();


            
        } else if ($requestType === 'POST') {
            addMeme(json_decode($body));



        } else {
            throw new Exception('bad request');
        }
    } else if (preg_match("/.*?\/meme\/([0-9]+)$/", $url, $match)) { // ist es /meme/<id>
        $memeId = intval($match[1]);
        if ($requestType === 'GET') {
            getMeme($memeId);
            


        } else if ($requestType === 'PUT') {
            updateMeme($memeId, json_decode($body));



        } else if ($requestType === 'DELETE') {
            deleteMeme($memeId);



        } else {
            throw new Exception('bad request');
        }
    } else {
        throw new Exception('bad request');
    }
} catch (Exception $e) {
    error_log($e);
    badRequest($requestType, $url, $body);
}

?>