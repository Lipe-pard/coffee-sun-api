<?php 

define('FOLDER', "/Aula_LP2/api/"); // Cria uma constate para o inicio da url

$url = $_SERVER['REQUEST_URI']; // Pega a url digitado pelo usuario 
$lengthStrForlder = strlen(FOLDER); // Verifica o tamanho da constante
$url_clean = substr($url, $lengthStrForlder); // Retira a parte da constante da url

$route = explode("/", $url_clean); // Separa a parte selecionada da url em varios partes

//Carrega o autoloaders
require('helpers/autoloaders.php');

//Os ifs indentican o que foi digitado e redireciona para a pagina certa
if($route[0] == 'user'){
    require('controllers/UserController.php');
}elseif($route[0] == 'produto'){
    require('controllers/ProdutoController.php');
}else{
    $result['Mensage'] = "404 - Rota da api não encontrada";
    $response = new Output();
    $reaponse = out($result, 404);
}

?>