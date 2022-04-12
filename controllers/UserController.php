<?php 
class UserController{

   function create(){
        // Adiciona a variavel os atributos da classe
        $name = $_POST['name'];
        $email = $_POST['email'];
        $pass = $_POST['pass'];
        $user = new User(NULL, $name, $email, $pass);
        // Chama a função de create
        $id = $user->create();  

        $result['Mensage'] = "Criado com sucesso";
        $result['user']['id'] = $id;
        $result['user']['name'] = $name;
        $result['user']['email'] = $email;
        $result['user']['pass'] = $pass;
        $response = new Output();
        $response->out($result);
    }
    
    function delete(){
        $id = $_POST['id'];
        // Adiciona a variavel os atributos da classe
        $user = new User($id, NULL, NULL, NULL);
        //Chama a função de delete  '
        $user->delete();  

        $result['Mensage'] = "Deletado com Sucesso";
        $result['user']['id'] = $id;
        $response = new Output();
        $response->out($result);
    }

    function update(){
        $id = $_POST['id'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $pass = $_POST['pass'];

        $user = new User($id, $name, $email, $pass);
        $user->update();

        $result['Mensage'] = "Editado com sucesso";
        $result['user']['id'] = $id;
        $result['user']['name'] = $name;
        $result['user']['email'] = $email;
        $result['user']['pass'] = $pass;
        $response = new Output();
        $response->out($result);
    }

    function selectAll(){
        $user = new User(NULL, NULL, NULL, NULL);
        $result = $user->selectAll();
        $response = new Output();
        $response->out($result);
    }

    function selectId(){
        $id = $_POST['id'];
        $user = new User($id, NULL, NULL, NULL);
        $result = $user->selectId();
        $response = new Output();
        $response->out($result);
    }
}
?>