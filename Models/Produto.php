<?php 

class Produto{
    //propriedades
   public $id;
   public $value;
   public $discription;
   public $code_bar;

   //Contruct

   function __construct($id, $value, $discription, $code_bar){
       $this->id = $id;
       $this->value = $value;
       $this->discription = $discription;
       $this->code = $code_bar;
   }

   //Métodos
   function create(){
       echo 'Usuario criado'. ' ' . $this->code;
   }

   function delete(){
    echo 'Usuario deletado'. ' ' . $this->id;
}
}

?>