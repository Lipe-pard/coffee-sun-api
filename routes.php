<?php 
define('FOLDER', "/Aula_LP2/api/"); // Cria uma constate para o inicio da url

$url = $_SERVER['REQUEST_URI']; // Pega a url digitado pelo usuario 
$lengthStrForlder = strlen(FOLDER); // Verifica o tamanho da constante
$url_clean = substr($url, $lengthStrForlder); // Retira a parte da constante da url

$route = explode("/", $url_clean); // Separa a parte selecionada da url em varios partes

//Carrega o autoloaders
require('helpers/autoloaders.php');

//criar o objeto de resposat da api
$response = new Output();
//Ve se o arquivo do controller existe
if(!isset($route[0]) || !isset($route[1])){
    $result['Mensage'] = "404 - Rota da api não encontrada";
    $response->out($result, 404);
}

$controller_name = $route[0];
$action = str_replace('-', '', $route[1]);
$action = str_replace('_', '', $action);

//ve se o controler existe
$controller_path = 'controllers/' . $controller_name . 'Controller.php';

if(file_exists($controller_path)){
   $controller_class_name = $controller_name . "Controller";
   $controller = new $controller_class_name();
   // Ve se a action existe
    if(method_exists($controller, $action)){
        $controller->$action();
    }

}

$result['Mensage'] = "404 - Rota da api não encontrada";
$response->out($result, 404);

?>