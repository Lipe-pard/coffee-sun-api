<?php 

require('helpers/database.php');

class User{
    //propriedades
   public $id;
   public $nome;
   public $email;
   public $pass;

   //Contruct

   function __construct($id, $name, $email, $pass){
       $this->id = $id;
       $this->nome = $name;
       $this->email = $email;
       $this->pass = $pass;
   }

   //Métodos
   function create(){
      $db = new Database();
      try {
        $stmt = $db->conn->prepare("INSERT INTO users (nome, email, password) VALUES (:nome, :email, :pass)");
        $stmt->bindParam(":nome", $this->nome);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":pass", $this->pass);
        $stmt->execute();

        echo "Cadastrado com sucesso";

      } catch(PDOException $e) {
        echo "ERRO" . "<br>" . $e->getMessage();
      }
   }

   function delete(){
    echo 'Usuario deletado' . $this->name;
}
}

?>