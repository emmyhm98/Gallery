<?php

class database
{
   private $RDBTYPE= "mysql";
   private $RDBHOST= "localhost";
   private $RDBUSER= "root";
   private $RDBPASS= "";
   private $RDBNAME= "HandmadeGallery";


    function   __construct()
    {
      $this->pdo= new PDO($this->RDBTYPE.":host=".$this->RDBHOST.";dbname=".$this->RDBNAME,$this->RDBUSER,
      $this->RDBPASS,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES UTF8"));
    }

    public function Disconnect()
    {
       $this->pdo= null;
       $this->isConnected=false;

    }

     public function getRows($query,$params=array())
     {
        $stm=$this->pdo->prepare($query);
        $stm->execute($params);
        return $stm->fetchAll();
     }
     public function getRow($query,$params=array())
     {
        $stm=$this->pdo->prepare($query);
        $stm->execute($params);
        return $stm->fetch();
     }
     public function insertRow($query,$params)
     {
       $stm=$this->pdo->prepare($query);
       $stm->execute($params);
       return $stm->rowCount();
     }
      public function updateRow($query,$params)
     {
       return  $this->insertRow($query,$params);
     }
       public function deleteRow($query,$params=array())
     {
       return  $this->insertRow($query,$params);
     }

};
$db= new database;


?>
