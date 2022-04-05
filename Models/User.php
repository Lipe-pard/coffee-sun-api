<?php 

class User{
    //propriedades
   public $id;
   public $name;
   public $email;
   public $pass;

   //Contruct

   function __construct($id, $name, $email, $pass){
       $this->id = $id;
       $this->name = $name;
       $this->email = $email;
       $this->pass = $pass;
   }

   //Métodos
   function create(){
      $db = new Database();
      try {
        $stmt = $db->conn->prepare("INSERT INTO users (name, email, password) VALUES (:name, :email, :pass)");
        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":pass", $this->pass);
        $stmt->execute();

        $id = $db->conn->lastInsertId();

        $result['Mensage'] = "cadastrado com sucesso";
        $result['user']['id'] = $id;
        $result['user']['name'] = $this->name;
        $result['user']['email'] = $this->email;
        $result['user']['pass'] = $this->pass;
        $response = new Output();
        $response->out($result, 200);

      } catch(PDOException $e) {
        $result['Mensage'] = "Erro Create" . $e-> getMenssage();
        $response = new Output();
        $response->out($result, 500);
      }
   }

   function delete(){
    $db = new Database();
    try {
      $stmt = $db->conn->prepare("DELETE FROM users WHERE id = :id;");
      $stmt->bindParam(":id", $this->id);
      $stmt->execute();

        $result['Mensage'] = "Deletado com Sucesso";
        $result['user']['id'] = $this->id;
        $response = new Output();
        $response->out($result, 200);

    } catch(PDOException $e) {
      $result['Mensage'] = "Erro no Delete" . $e-> getMenssage();
      $response = new Output();
      $response = out($result, 500);
    }
   }

   function update(){
    $db = new Database();
    try {
      $stmt = $db->conn->prepare("UPDATE users SET name=:name, email=:email, password=:pass WHERE id=:id;");
      $stmt->bindParam(':id', $this->id);
      $stmt->bindParam(':name', $this->name);
      $stmt->bindParam(':email', $this->email);
      $stmt->bindParam(':pass', $this->pass);
      $stmt->execute();

      $result['Mensage'] = "Editado com sucesso";
      $result['user']['id'] = $this->id;
      $result['user']['name'] = $this->name;
      $result['user']['email'] = $this->email;
      $result['user']['pass'] = $this->pass;
      $response = new Output();
      $response->out($result, 200);


    } catch(PDOException $e) {
      $result['Mensage'] = "Erro de Update" . $e-> getMenssage();
      $response = new Output();
      $reaponse = out($result, 500);
    }
   }

   function selectAll(){
    $db = new Database();
    try {
      $stmt = $db->conn->prepare("SELECT * FROM users");
      $stmt->execute();

      $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

      $response = new Output();
      $response->out($result);

    } catch(PDOException $e) {
      $result['Mensage'] = "Erro de Select" . $e-> getMenssage();
      $response = new Output();
      $reaponse = out($result, 500);
    }
   }

   function selectId(){
    $db = new Database();
    try {
      $stmt = $db->conn->prepare("SELECT name, email, password FROM users WHERE id = :id");
      $stmt->bindParam(":id", $this->id);
      $stmt->execute();

      $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

      $response = new Output();
      $response->out($result);

    } catch(PDOException $e) {
      $result['Mensage'] = "Erro Select id" . $e-> getMenssage();
      $response = new Output();
      $reaponse = out($result, 500);
    }
   }
}

?>