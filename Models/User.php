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
    $db = new Database();
    try {
      $stmt = $db->conn->prepare("DELETE FROM users WHERE id = :id;");
      $stmt->bindParam(":id", $this->id);
      $stmt->execute();

      echo "Deletado com sucesso";

    } catch(PDOException $e) {
      echo "ERRO" . "<br>" . $e->getMessage();
    }
   }

   function update(){
    $db = new Database();
    try {
      $stmt = $db->conn->prepare("UPDATE users SET nome = :name, email = :email, password = :pass WHERE id = :id;");
      $stmt->bindParam(":id", $this->id);
      $stmt->bindParam(":name", $this->name);
      $stmt->bindParam(":email", $this->email);
      $stmt->bindParam(":pass", $this->pass);
      $stmt->execute();

      echo "Editado com sucesso";

    } catch(PDOException $e) {
      echo "ERRO" . "<br>" . $e->getMessage();
    }
   }
}

?>