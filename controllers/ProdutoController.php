<?php 

if(isset($route[1]) && $route[1] != ''){
    
    if($route[1] == 'create'){
         // Adiciona a variavel os atributos da classe
       $user = new Produto(1, '', ' ', '123456');
       // Chama a função de create
       $user->create();
    }elseif($route[1] == 'delete'){
        // Adiciona a variavel os atributos da classe
        $user = new Produto(1, '', ' ', ' ');
        // Chama a função de delete
        $user->delete();
    }else{
        $result['Mensage'] = "404 - Rota da api não encontrada";
        $response = new Output();
        $reaponse = out($result, 404);
    }
}else{
    $result['Mensage'] = "404 - Rota da api não encontrada";
    $response = new Output();
    $reaponse = out($result, 404);
}

?>