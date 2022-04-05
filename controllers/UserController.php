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
    }elseif($route[1] == 'update'){
       $id = $_POST['id'];
       $name = $_POST['name'];
       $email = $_POST['email'];
       $pass = $_POST['pass'];

       $user = new User($id,$name,$email,$pass);

       $user->update();

    }elseif($route[1] == 'select_all'){
      $user = new User('', ' ', ' ', ' ');
      $user->selectAll();

    }elseif($route[1] == 'select_id'){
        $id = $_POST['id'];
        $user = new User($id, ' ', ' ', ' ');
        $user->selectId();
      }
    
    else{
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