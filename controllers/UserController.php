<?php 

if(isset($route[1]) && $route[1] != ''){
    
    if($route[1] == 'create'){
         // Adiciona a variavel os atributos da classe
         $name = $_POST['name'];
         $email = $_POST['email'];
         $pass = $_POST['pass'];
         $user = new User(NULL, $name, $email, $pass);
        // Chama a função de create
       $user->create();  
    }elseif($route[1] == 'delete'){
        $id = $_POST['id'];
         // Adiciona a variavel os atributos da classe
        $user = new User($id,NULL, NULL, NULL);
        //Chama a função de delete  
        $user->delete();  
    }else{
        echo "404 Página não encontrada";
    }
}else{
    echo "404 Página não encontrada";
}

?>