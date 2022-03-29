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
        echo "404 Página não encontrada";
    }
}else{
    echo "404 Página não encontrada";
}

?>